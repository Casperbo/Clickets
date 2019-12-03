<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketsPost;
use App\Http\Requests\UpdateTicketsPost;
use Illuminate\Support\Facades\Auth;
use App\ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = ticket::orderBy('created_at', 'asc')->get();

        return view('event.tickets.index', compact('tickets'));
    }

    public function create(ticket $ticket)
    {
        return view('event.tickets.create', compact('ticket'));
    }

    public function store(StoreTicketsPost $request)
    {
        $ticket = new ticket();
        $ticket->name = request('name');
        $ticket->begintime = request('begintime');
        $ticket->endtime = request('endtime');
        $ticket->age = request('age');
        $ticket->user_id =           Auth::user()->id;
        $ticket->save();

        return redirect()->action('TicketsController@index')->with('Succes', 'ticket geplaatst.');
    }

    public function show(ticket $ticket)
    {

        return view('event.tickets.show', compact('ticket'));

    }

    public function edit(ticket $ticket)
    {
        if($ticket->user_id == Auth::user()->id){
            return view('event.tickets.edit', compact('ticket'));
        }
        else {
            return redirect()->route('tickets.index');
        }
    }

    public function update(UpdateTicketsPost $request, ticket $ticket)
    {
        $ticket->name = $request->name;
        $ticket->begintime = $request->begintime;
        $ticket->endtime = $request->endtime;
        $ticket->age = $request->age;
        $ticket->save();

        return redirect()->action('TicketsController@index')->with('Correct', 'tickets Updated');
    }

    public function destroy($id)
    {
        $ticket = ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->action('TicketsController@index');
    }

    public function postSearch(Request $request)
    {
        if($request->has('query')) {
            $tickets = Ticket::where('name', 'LIKE', '%' . $request->get('query') .  '%')
                ->get();
            return view('event.tickets.searchresults', compact('tickets'));
        } else {
            return abort(400);
        }
    }
}
