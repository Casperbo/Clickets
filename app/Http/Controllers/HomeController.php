<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateHomePost;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function show(User $user)
    {
        return view('home', compact('user'));
    }

    public function edit(User $user)
    {
        return view('auth.edit', compact('user'));
    }

    public function update(UpdateHomePost $request, User $user)
    {
        $user = Auth::user();
        $user->name =           $request->name;
        $user->email =          $request->email;
        $user->save();

        return redirect()->action('HomeController@index')->with('Correct', 'User Updated');

    }

}
