@extends('layouts.layout')
@include('layouts.errors')

@section('content')
    <div class="jumbotron">
        <div class="layout-container">

            {!! Form::open(['url' => 'tickets', 'method' => 'POST']) !!}
            {!! Form::token() !!}
            <div class="form-group">
                <h1>Create a Ticket</h1>
                {{FORM::label('name', 'Ticket name')}}
                {!! Form::text('name', '', ['class' => 'form-control']) !!}
                {{FORM::label('begintime', 'Begin date and time')}}
                {!! Form::dateTime('begintime', '', ['class' => 'form-control']) !!}
                {{FORM::label('endtime', 'End date and time')}}
                {!! Form::dateTime('endtime', '', ['class' => 'form-control']) !!}
                {{FORM::label('age', 'Age restriction')}}
                {!! Form::number('age', '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create', ['class' => 'form-control']) !!}
            </div>
            {!! Form::close() !!}
            <div class="form-group">
                <a href="{{ url('tickets') }}">Back</a>
            </div>
        </div>
    </div>

@endsection