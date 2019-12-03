<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\StoreEventPost;
use App\Http\Requests\UpdateEventPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventPost $request)
    {
        $event = new Event();
        $event->name =              request('name');
        $event->location =          request('location');
        $event->date =              request('date');
        $event->starttime =         request('starttime');
        $event->endtime =           request('endtime');
        $event->agerestriction =    request('agerestriction');
        $event->user_id =           Auth::user()->id;
        $event->save();

        return redirect()->route('event.store', $event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if($event->user_id == Auth::user()->id){
            return view('event.edit', compact('event'));
        }
        else {
            return redirect()->route('event.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventPost $request, Event $event)
    {
        $event->name =                  $request->name;
        $event->date =                  $request->date;
        $event->location =              $request->location;
        $event->starttime =             $request->starttime;
        $event->endtime =               $request->endtime;
        $event->agerestriction =        $request->agerestriction;
        $event->save();

        return redirect()->route('event.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('event.index');
    }

    public function postSearch(Request $request)
    {
        if($request->has('query')) {
            $events = Event::where('name', 'LIKE', '%' . $request->get('query') .  '%')
                ->Orwhere('location', 'LIKE', '%' . $request->get('query') .  '%')
                ->get();
            return view('event.searchresults', compact('events'));
        } else {
            return abort(400);
        }
    }
}
