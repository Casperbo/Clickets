@extends('layouts.layout')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User info</div>
                    <div class="card-body">
                        <p class="card-text">Name: {{ $user->name }}</p>
                        <p class="card-text">Email: {{ $user->email }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{ url('admin') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection