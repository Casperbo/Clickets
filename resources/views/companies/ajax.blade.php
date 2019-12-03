@extends('companies.master')

@section('content')
    <div id="content">
        @include('companies.index')
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/ajaxcrud.js') }}"></script>
@endsection
