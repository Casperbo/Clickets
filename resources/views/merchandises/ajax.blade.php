@extends('merchandises.master')

@section('content')
    <div id="content">
        @include('merchandises.index')
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/ajaxcrud.js') }}"></script>
@endsection
