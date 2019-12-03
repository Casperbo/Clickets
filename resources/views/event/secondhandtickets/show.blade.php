@extends('layouts.layout')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $secondhandticket->name }}</div>
                    <div class="card-body">
                        <p class="card-text">Begin time: {{ $secondhandticket->begintime }}</p>
                        <p class="card-text">End time: {{ $secondhandticket->endtime }}</p>
                        <p class="card-text">Age: {{ $secondhandticket->age }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{ url('secondhandtickets') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection