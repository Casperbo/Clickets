<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecondHandTicketsPost;
use App\Http\Requests\UpdateSecondHandTicketsPost;
use Illuminate\Support\Facades\Auth;
use App\secondhandticket;
use Illuminate\Http\Request;

class SecondHandTicketsController extends Controller
{
    public function index()
    {
        $secondhandtickets = secondhandticket::orderBy('created_at', 'asc')->get();

        return view('event.secondhandtickets.index', compact('secondhandtickets'));
    }

    public function create(secondhandticket $secondhandticket)
    {
        return view('event.secondhandtickets.create', compact('secondhandticket'));
    }

    public function store(StoreSecondHandTicketsPost $request)
    {
        $secondhandticket = new secondhandticket();
        $secondhandticket->name = request('name');
        $secondhandticket->begintime = request('begintime');
        $secondhandticket->endtime = request('endtime');
        $secondhandticket->age = request('age');
        $secondhandticket->user_id =           Auth::user()->id;
        $secondhandticket->save();

        return redirect()->action('SecondHandTicketsController@index')->with('Succes', 'tweedehands ticket geplaatst.');
    }

    public function show(secondhandticket $secondhandticket)
    {

        return view('event.secondhandtickets.show', compact('secondhandticket'));

    }

    public function edit(secondhandticket $secondhandticket)
    {
        if($secondhandticket->user_id == Auth::user()->id){
            return view('event.secondhandtickets.edit', compact('ticket'));
        }
        else {
            return redirect()->route('secondhandtickets.index');
        }
    }

    public function update(UpdateSecondHandTicketsPost $request, secondhandticket $secondhandticket)
    {
        $secondhandticket->name = $request->name;
        $secondhandticket->begintime = $request->begintime;
        $secondhandticket->endtime = $request->endtime;
        $secondhandticket->age = $request->age;
        $secondhandticket->save();

        return redirect()->action('SecondHandTicketsController@index')->with('Correct', 'tweedehands ticket Updated');
    }

    public function destroy($id)
    {
        $secondhandticket = secondhandticket::findOrFail($id);
        $secondhandticket->delete();

        return redirect()->action('SecondHandTicketsController@index');
    }

    public function postSearch(Request $request)
    {
        if($request->has('query')) {
            $secondhandtickets = SecondHandTicket::where('name', 'LIKE', '%' . $request->get('query') .  '%')
                ->get();
            return view('event.secondhandtickets.searchresults', compact('secondhandtickets'));
        } else {
            return abort(400);
        }
    }
}
