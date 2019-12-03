@extends('layouts.layout')
@include('layouts.errors')

@section ('content')
    <div class="jumbotron">
        <div class="layout-container">
            <h1>Edit a Ticket</h1>

            {!! Form::open(['url' => 'tickets/'.$ticket->id, 'method' => 'PATCH']) !!}
            {!! Form::token() !!}
            <div class="form-group">
                {!! Form::label('name', 'Ticket name:') !!}
                {!! Form::text('name', $ticket->name, ['class' => 'form-control']) !!}
                {!! Form::label('begintime', 'Begin date and time:') !!}
                {!! Form::dateTime('begintime', $ticket->begintime, ['class' => 'form-control']) !!}
                {!! Form::label('endtime', 'End date and time:') !!}
                {!! Form::dateTime('endtime', $ticket->endtime, ['class' => 'form-control']) !!}
                {!! Form::label('age', 'Age restriction:') !!}
                {!! Form::text('age', $ticket->age, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit', ['class' => 'form-control']) !!}
            </div>
            {!! Form::close() !!}
            <div class="form-group">
                <a href="{{ url('tickets') }}">Back</a>
            </div>
        </div>
    </div>
@endsection
