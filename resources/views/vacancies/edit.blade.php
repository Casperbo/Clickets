@extends('layouts.app')

@section ('content')
    <div class="grid-container">
        <div class="edit_container">
            <h1 class="edit_header">Edit a vacancy</h1>

            {!! Form::open(['url' => 'vacancies/'.$vacancy->id, 'method' => 'PATCH']) !!}
            {!! Form::token() !!}
            <div class="edit_container">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', $vacancy->title, ['class' => 'form_title']) !!}
                {!! Form::label('occupation_id', 'Occupation') !!}
                {!! Form::select('occupation_id', $occupations, $vacancy->occupation_id, ['class' => 'form_occupation']) !!}
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', $vacancy->description, ['class' => 'form_description']) !!}
            </div>
            @include('layouts.errors')
            <div>
                {!! Form::submit('Edit', ['class' => 'edit_button-two']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="back">
        <a href="{{ url('vacancies') }}" class="back_button">Back</a>
    </div>
@endsection

