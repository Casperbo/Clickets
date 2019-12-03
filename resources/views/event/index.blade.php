@extends('layouts.layout')
@include('layouts.errors')

@section('content')
    <div class="layout-container">
        <form action="{{ route('event.search') }}" method="POST" class="ajaxSearch">
            <input type="search" name="query" placeholder="Type something to search" autocomplete="off" class="search_bar">
            <input type="submit" value="Search" class="search_button">
        </form>
        <div id="results" class="grid-container">

        </div>
        @role('verified-company')
        <div class="container">
            <a href="event/create">
                {{ Form::submit('Create', ['class' => 'btn btn-create']) }}
            </a>
        </div>
        @endrole
        <div class="form-group">
            <a href="{{ url('/') }}">Back</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection