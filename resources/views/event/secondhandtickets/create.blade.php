@extends('layouts.layout')
@include('layouts.errors')

@section('content')
    <div class="jumbotron">
        <div class="layout-container">
            <h1>Create a Second-Hand Ticket</h1>

            {!! Form::open(['url' => 'secondhandtickets', 'method' => 'POST']) !!}
            {!! Form::token() !!}
            <div class="form-group">
                {{FORM::label('name', 'Ticket name:')}}
                {!! Form::text('name', '', ['class' => 'form-control']) !!}
                {{FORM::label('begintime', 'Begin date and time:')}}
                {!! Form::dateTime('begintime', '', ['class' => 'form-control']) !!}
                {{FORM::label('endtime', 'End date and time:')}}
                {!! Form::dateTime('endtime', '', ['class' => 'form-control']) !!}
                {{FORM::label('age', 'Age restriction:')}}
                {!! Form::number('age', '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create', ['class' => 'form-control']) !!}
            </div>
            {!! Form::close() !!}
            <div class="form-group">
                <a href="{{ url('secondhandtickets') }}">Back</a>
            </div>
        </div>
    </div>
@endsection