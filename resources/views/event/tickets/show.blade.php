@extends('layouts.layout')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $ticket->name }}</div>
                    <div class="card-body">
                        <p class="card-text">Begin time: {{ $ticket->begintime }}</p>
                        <p class="card-text">End time: {{ $ticket->endtime }}</p>
                        <p class="card-text">Age: {{ $ticket->age }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{ url('tickets') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection