@extends('layouts.layout')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit profile</div>

                    <div class="card-body">
                        {!! Form::open(['url' => 'home/'.$userId = Auth::id(), 'method' => 'PATCH']) !!}
                        {!! Form::token() !!}

                        <div class="form-group">
                            {{ Form::label('name', 'Name')}}
                            {!! Form::text('name', $name = Auth::user()->name, ['class' => 'form-control']) !!}

                            {{ Form::label('email', 'Email')}}
                            {!! Form::text('email', $email = Auth::user()->email, ['class' => 'form-control']) !!}
                        </div>
                        @include('layouts.errors')
                        <div class="form-group">
                            {!! Form::submit('Save', ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
