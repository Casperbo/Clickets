<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
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

        $companies = new Company();
        $companies = $companies->where('title', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);
        if ($request->ajax()) {
            return view('companies.index', compact('companies'));
        } else {
            return view('companies.ajax', compact('companies'));
        }
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('companies.form');

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

        $company = new Company();
        $company->title = $request->title;
        $company->description = $request->description;
        $company->user_id =           Auth::user()->id;
        $company->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('companies')
        ]);
    }

    public function show(Request $request, $id)
    {
        if($request->isMethod('get')) {
            return view('companies.detail',['company' => Company::find($id)]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('companies.form',['company' => Company::find($id)]);

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

        $company = Company::find($id);
        $company->title = $request->title;
        $company->description = $request->description;
        $company->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('companies')
        ]);
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('companies');
    }
}