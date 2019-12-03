<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAdminPost;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminPost;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.index', compact('user'));
    }

    public function create ()
    {
        return view('admin.create');
    }

    protected function store(StoreAdminPost $request)
    {

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'company' => $request['company'],
            'verified' => $request['verified'],
            'password' => Hash::make($request['password']),
        ]);

        if ($user['company'] && $user['verified'] == 1) {
            $user->assignRole('verified-company');
        }
        elseif ($user['company'] == 1 && $user['verified'] == 0){
            $user->assignRole('company');
        }
        else {
            $user->assignRole('user');
        }

        return redirect()->route('admin.index', $user);
    }

    public function show(User $user)
    {
        return view('admin.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(UpdateAdminPost $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->company = $request->company;
        $user->verified =$request->verified;
        $user->save();

        if ($user['company'] && $user['verified'] == 1) {
            $user->syncRoles('verified-company');
        }
        elseif ($user['company'] == 1 && $user['verified'] == 0){
            $user->syncRoles('company');
        }
        else {
            $user->syncRoles('user');
        }

        return redirect()->route('admin.index', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.index');
    }

    public function postSearch(Request $request)
    {
        if($request->has('query')) {
            $user = User::where('name', 'LIKE', '%' . $request->get('query') .  '%')
                ->Orwhere('email', 'LIKE', '%' . $request->get('query') .  '%')
                ->get();
            return view('admin.searchresults', compact('user'));
        } else {
            return abort(400);
        }
    }
}
