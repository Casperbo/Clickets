@extends('layouts.app')

@section('content')
        <div class="main_content">
            <div class="grid-container">
            <table>
                <tr class="table_header">
                    <th>Title:</th>
                    <th>Description:</th>
                </tr>
                @foreach($advertisements as $advertisement)
                    <tr>
                        <div class="table_info">
                        <td class="table_title">
                            <a href="advertisements/{{ $advertisement->id }}">
                                {{$advertisement->title}}
                            </a>
                        </td>
                        <td>{{$advertisement->description}}</td>
                        </div>
                        @role('verified-company')
                        @if($advertisement->user_id == Auth::user()->id)
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['advertisements.destroy', $advertisement->id]]) }}
                            {{ Form::submit('Delete', ['class' => 'delete_button']) }}
                            {{ Form::close() }}
                            @endrole
                        </td>
                        @endif
                        @role('verified-company')
                            @if($advertisement->user_id == Auth::user()->id)
                        <td>
                            {{ Form::open(['method' => 'GET', 'route' => ['advertisements.edit', $advertisement->id]]) }}
                            {{ Form::submit('Edit', ['class' => 'edit_button']) }}
                            {{ Form::close() }}
                            @endrole
                        </td>
                        @endif
                    </tr>
                @endforeach
            </table>
                @include('layouts.errors')
            </div>
            @role('verified-company')
            <a href="advertisements/create">
                {{ Form::submit('Create', ['class' => 'create_button']) }}
            </a>
            @endrole
        </div>
        <div class="back">
            <a href="{{ url('/') }}" class="back_button">Back</a>
        </div>
@endsection