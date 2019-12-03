@extends('layouts.app')

@section('content')
    <div class="show_container">
    <div class="show_header_row">
        <h1 class="show_header">Vacancy</h1>
    </div>
        <form>
            <ul class="flex-outer">
                <li>
                    <label for="title">Title:</label>
                    <p>{{$vacancy->title}}</p>
                </li>
                <li>
                    <label for="occupation">Occupation:</label>
                    <p>{{$vacancy->occupation->occupationName}}</p>
                </li>
                <li>
                    <label for="description">Description:</label>
                    <p>{{$vacancy->description}}</p>
                </li>
            </ul>
        </form>
    </div>
    <div class="back">
    <a href="{{ url('vacancies') }}" class="back_button">Back</a>
    </div>
@endsection