@extends('layouts.app')

@section('content')
    <div class="grid-container">
        <div class="edit_container">
        <h1 class="edit_header">Create a advertisement</h1>

        {!! Form::open(['url' => 'advertisements', 'method' => 'POST']) !!}
        {!! Form::token() !!}
            <div class="edit_container">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', '', ['class' => 'form_title']) !!}
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', '', ['class' => 'form_description']) !!}
            </div>
            @include('layouts.errors')

            <div>
                {!! Form::submit('Create', ['class' => 'edit_button-two']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="back">
        <a href="{{ url('advertisements') }}" class="back_button">Back</a>
    </div>
@endsection

