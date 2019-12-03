@extends('layouts.layout')
@include('layouts.errors')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $event->name }}</div>
                    <div class="card-body">
                    <p class="card-text">Date: {{ $event->date }}</p>
                    <p class="card-text">Location: {{ $event->location }}</p>
                    <p class="card-text">Begin time: {{ $event->starttime }}</p>
                    <p class="card-text">End time: {{ $event->endtime }}</p>
                    <p class="card-text">Age restriction: {{ $event->agerestriction }}</p>
                        @if($event->user_id == Auth::user()->id)
                        @role('verified-company')
                        <a href="{{ URL::to('event/'.$event->id. '/edit') }}"><button class="btn btn-primary">Edit </button></a>

                    {{ Form::open(['method' => 'DELETE', 'route' => ['event.destroy', $event->id]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                        @endrole
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{ url('event') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection