@extends('layouts.layout')
@include('layouts.errors')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin register</div>

                    <div class="card-body">
                            {!! Form::open(['url' => route('admin.index'), 'method' => 'POST']) !!}
                            {!! Form::token() !!}
                            @csrf
                            {{FORM::label('name', 'Name')}}
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}

                            {{FORM::label('email', 'Email')}}
                            {!! Form::text('email', '', ['class' => 'form-control']) !!}

                            {{ Form::label('company', 'Company')}}<br>
                            <label>{!! Form::radio('company', 1, ['class' => 'form-control']) !!} Yes</label><br>
                            <label>{!! Form::radio('company', 0, ['class' => 'form-control']) !!} No</label><br>

                            {{ Form::label('verified', 'Verified')}}<br>
                            <label>{!! Form::radio('verified', 1, ['class' => 'form-control']) !!} Yes</label><br>
                            <label>{!! Form::radio('verified', 0, ['class' => 'form-control']) !!} No</label><br>

                            {{FORM::label('password', 'Password')}}
                            {!! Form::password('password', ['class' => 'form-control']) !!}

                            {{FORM::label('password-confirm', 'Confirm Password')}}
                            {!! Form::password('password-confirm', ['class' => 'form-control', 'name' => 'password_confirmation']) !!}

                            <div class="form-group">
                                {!! Form::submit('Create', ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                            <div class="form-group">
                                <a href="{{ url('admin') }}">Back</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
