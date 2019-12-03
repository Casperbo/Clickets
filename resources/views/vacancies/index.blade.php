@extends('layouts.app')

@section('content')
    <div class="main_content">
        <form action="{{ route('vacancies.search') }}" method="POST" class="ajaxSearch">
            <input type="search" name="query" placeholder="Type something to search" autocomplete="off" class="search_bar">
            <input type="submit" value="Search" class="search_button">
        </form>
        <div id="results" class="grid-container">

        </div>
        @include('layouts.errors')
        @role('verified-company')
        <a href="vacancies/create" class="create_field">
            {{ Form::submit('Create', ['class' => 'create_button']) }}
        </a>
        @endrole
    </div>
    <div class="back">
        <a href="{{ url('/') }}" class="back_button">Back</a>
    </div>

@endsection

@section('scripts')
    <script>
        var csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection