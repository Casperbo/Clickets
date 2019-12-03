@extends('layouts.layout')
@include('layouts.errors')

@section('content')
    <div class="layout-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        <form action="{{ route('admin.search') }}" method="POST" class="ajaxSearch">
                            <input type="search" name="query" placeholder="Type something to search" autocomplete="off" class="search_bar">
                            <input type="submit" value="Search" class="search_button">
                        </form>
                        <div id="results" class="grid-container">

                        </div>

                        <a href="admin/create">
                            {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
