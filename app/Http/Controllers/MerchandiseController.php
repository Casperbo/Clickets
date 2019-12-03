<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchandise;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class MerchandiseController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));

        $request->session()->put('field', $request
            ->has('field') ? $request->get('field') : ($request->session()
            ->has('field') ? $request->session()->get('field') : 'title'));

        $request->session()->put('sort', $request
            ->has('sort') ? $request->get('sort') : ($request->session()
            ->has('sort') ? $request->session()->get('sort') : 'asc'));

        $merchandises = new Merchandise();
        $merchandises = $merchandises->where('title', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);
        if ($request->ajax()) {
            return view('merchandises.index', compact('merchandises'));
        } else {
            return view('merchandises.ajax', compact('merchandises'));
        }
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('merchandises.form');

        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json([
                'fail' =>true,
                'errors' => $validator->errors()
            ]);

        $merchandise = new Merchandise();
        $merchandise->title = $request->title;
        $merchandise->description = $request->description;
        $merchandise->user_id =           Auth::user()->id;
        $merchandise->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('merchandises')
        ]);
    }

    public function show(Request $request, $id)
    {
        if($request->isMethod('get')) {
            return view('merchandises.detail',['merchandise' => Merchandise::find($id)]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('merchandises.form',['merchandise' => Merchandise::find($id)]);

        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json([
                'fail' =>true,
                'errors' => $validator->errors()
            ]);

        $merchandise = Merchandise::find($id);
        $merchandise->title = $request->title;
        $merchandise->description = $request->description;
        $merchandise->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('merchandises')
        ]);
    }

    public function destroy($id)
    {
        Merchandise::destroy($id);
        return redirect('merchandises');
    }
}