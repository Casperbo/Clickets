@extends('layouts.app')

@section('content')
    <div class="show_container">
        <div class="show_header_row">
            <h1 class="show_header">Advertisement</h1>
        </div>
        <form>
            <ul class="flex-outer">
                <li>
                    <label for="title">Title:</label>
                    <p>{{$advertisement->title}}</p>
                </li>
                <li>
                    <label for="description">Description:</label>
                    <p>{{$advertisement->description}}</p>
                </li>
            </ul>
        </form>
    </div>
    <div class="back">
        <a href="{{ url('vacancies') }}" class="back_button">Back</a>
    </div>
@endsection