@extends('layouts.app')

@section('content')
    <div class="">
    <div class="show_container">
    <table>
        <tr class="table_header">
            <th>Title:</th>
            <th>Occupation:</th>
            <th>Description:</th>
        </tr>
            <tr class="table_info">
                <td>{{$vacancy->title}}</td>

                <td>{{$vacancy->occupation->occupationName}}</td>

                <td>{{$vacancy->description}}</td>
            </tr>
    </table>
    </div>
    </div>
    <div class="back">
    <a href="{{ url('vacancies') }}" class="back_button">Back</a>
    </div>
@endsection