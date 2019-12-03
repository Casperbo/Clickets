<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacanciesPost;
use App\Http\Requests\UpdateVacanciesPost;
use App\Occupation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\vacancy;

class VacanciesController extends Controller
{
    public function index()
    {
        $vacancies = vacancy::orderBy('created_at', 'asc')->get();
        return view('vacancies.index', compact('vacancies'));
    }

    public function create(Vacancy $vacancy)
    {
        $occupations = [];
        foreach (Occupation::all() as $occupation) {
            $occupations[$occupation->id] = $occupation->occupationName;
        }

        return view('vacancies.create', compact('vacancy', 'occupations'));
    }

    public function store(StoreVacanciesPost $request)
    {
        $vacancy = new Vacancy();
        $vacancy->title = request('title');
        $vacancy->occupation_id = request('occupation_id');
        $vacancy->description = request('description');
        $vacancy->user_id =           Auth::user()->id;
        $vacancy->save();

        return redirect()->action('VacanciesController@index')->with('Succes', 'advertentie geplaatst.');
    }

    public function show(vacancy $vacancy)
    {

        return view('vacancies.show', compact('vacancy'));

    }

    public function edit(vacancy $vacancy)
    {
        $occupations = [];
        foreach (Occupation::all() as $occupation) {
            $occupations[$occupation->id] = $occupation->occupationName;
        }

        if($vacancy->user_id == Auth::user()->id){
            return view('vacancies.edit', compact('vacancy','occupations'));
        }
        else {
            return redirect()->route('vacancies.index');
        }
    }

    public function update(UpdateVacanciesPost $request, vacancy $vacancy)
    {
        $vacancy->title = $request->title;
        $vacancy->occupation_id = $request->occupation_id;
        $vacancy->description = $request->description;
        $vacancy->save();

        return redirect()->action('VacanciesController@index')->with('Correct', 'Vacancy Updated');
    }

    public function destroy($id)
    {
        $vacancy = vacancy::findOrFail($id);
        $vacancy->delete();

        return redirect()->action('VacanciesController@index');
    }

    public function postSearch(Request $request)
    {
        if($request->has('query')) {
            $vacancies = vacancy::join('occupations', 'occupation_id', '=', 'occupations.id')
                ->where('title', 'LIKE', '%' . $request->get('query') .  '%')
                ->Orwhere('occupations.occupationName', 'LIKE', '%' . $request->get('query') .  '%')
                ->select('vacancies.*')
                ->get();
            return view('vacancies.searchresults', compact('vacancies'));
        } else {
            return abort(400);
        }
    }

//    public function postSearch(Request $request)
//    {
//        if($request->has('query')) {
//            $vacancies = vacancy::join('')where('title', 'LIKE', '%' . $request->get('query') .  '%')->get();
//            return view('vacancies.searchresults', compact('vacancies'));
//        } else {
//            return abort(400);
//        }
//    }
}
