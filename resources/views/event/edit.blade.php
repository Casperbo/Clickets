@extends('layouts.layout')

@section('content')
    <div class="jumbotron">
        <div class="layout-container">
            {!! Form::open(['url' => 'event/'.$event->id, 'method' => 'PATCH']) !!}
            {!! Form::token() !!}
            <div class="form-group">
                {{FORM::label('name', 'Name')}}
                {!! Form::text('name', $event->name, ['class' => 'form-control']) !!}

                {{FORM::label('location', 'Location')}}
                {!! Form::text('location', $event->location, ['class' => 'form-control']) !!}

                {{FORM::label('date', 'Date')}}
                {!! Form::date('date', $event->date, ['class' => 'form-control']) !!}

                {{FORM::label('starttime', 'Start time')}}
                {!! Form::text('starttime', $event->starttime, ['class' => 'form-control']) !!}

                {{FORM::label('endtime', 'End time')}}
                {!! Form::text('endtime', $event->endtime, ['class' => 'form-control']) !!}

                {{FORM::label('agerestriction', 'Age restriction')}}
                {!! Form::number('agerestriction', $event->agerestriction, ['class' => 'form-control']) !!}
            </div>
            @include('layouts.errors')
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'form-control']) !!}
            </div>
            {!! Form::close() !!}
            <div class="form-group">
                <a href="{{ url('event') }}">Back</a>
            </div>
        </div>
    </div>
@endsection