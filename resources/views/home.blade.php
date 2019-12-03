@extends('layouts.layout')
@include('layouts.errors')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                        <br><a href="{{ URL::to('home/'.$userId = Auth::id(). '/edit') }}"><button class="btn btn-edit">Edit </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
