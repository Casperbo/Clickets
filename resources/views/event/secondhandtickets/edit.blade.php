@extends('layouts.layout')
@include('layouts.errors')

@section ('content')
    <div class="jumbotron">
        <div class="layout-container">
            <h1>Edit a Second-Hand Ticket</h1>

            {!! Form::open(['url' => 'secondhandtickets/'.$secondhandticket->id, 'method' => 'PATCH']) !!}
            {!! Form::token() !!}
            <div class="form-group">
                {!! Form::label('name', 'Ticket name:') !!}
                {!! Form::text('name', $secondhandticket->name, ['class' => 'form-control']) !!}
                {!! Form::label('begintime', 'Begin date and time:') !!}
                {!! Form::dateTime('begintime', $secondhandticket->begintime, ['class' => 'form-control']) !!}
                {!! Form::label('endtime', 'End date and time:') !!}
                {!! Form::dateTime('endtime', $secondhandticket->endtime, ['class' => 'form-control']) !!}
                {!! Form::label('age', 'Age restriction:') !!}
                {!! Form::text('age', $secondhandticket->age, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit', ['class' => 'form-control']) !!}
            </div>
            {!! Form::close() !!}
            <div class="form-group">
                <a href="{{ url('secondhandtickets') }}">Back</a>
            </div>
        </div>
    </div>
@endsection
