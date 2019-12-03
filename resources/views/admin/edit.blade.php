@extends('layouts.layout')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit profile</div>

                    <div class="card-body">
                        {!! Form::open(['url' => 'admin/'.$user->id, 'method' => 'PATCH']) !!}
                        {!! Form::token() !!}

                        <div class="form-group">
                            {{ Form::label('name', 'Name')}}
                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}

                            {{ Form::label('email', 'Email')}}
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}

                            {{ Form::label('company', 'Company')}}<br>
                            <label>{!! Form::radio('company', 1, $user->company, ['class' => 'form-control']) !!} Yes</label><br>
                            <label>{!! Form::radio('company', 0, !$user->company, ['class' => 'form-control']) !!} No</label><br>

                            {{ Form::label('verified', 'Verified')}}<br>
                            <label>{!! Form::radio('verified', 1, $user->verified, ['class' => 'form-control']) !!} Yes</label><br>
                            <label>{!! Form::radio('verified', 0, !$user->verified, ['class' => 'form-control']) !!} No</label>

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
