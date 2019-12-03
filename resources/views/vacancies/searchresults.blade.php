<table>
    <tr class="table_header">
        <th>Title:</th>
        <th>Occupation:</th>
        <th>Description:</th>
    </tr>
    @foreach($vacancies as $vacancy)
        <tr>
            <div class="table_info">
            <td class="table_title">
                <a href="vacancies/{{ $vacancy->id }}">
                    {{$vacancy->title}}
                </a>
            </td>

            <td>{{$vacancy->occupation->occupationName}}</td>

            <td>{{$vacancy->description}}</td>
            </div>
            @role('verified-company')
            @if($vacancy->user_id == Auth::user()->id)
            <td>
                {{ Form::open(['method' => 'DELETE', 'route' => ['vacancies.destroy', $vacancy->id]]) }}
                {{ Form::submit('Delete', ['class' => 'delete_button']) }}
                {{ Form::close() }}
                @endrole
            </td>
            @endif
            @role('verified-company')
            @if($vacancy->user_id == Auth::user()->id)
            <td>
                {{ Form::open(['method' => 'GET', 'route' => ['vacancies.edit', $vacancy->id]]) }}
                {{ Form::submit('Edit', ['class' => 'edit_button']) }}
                {{ Form::close() }}
                @endrole
            </td>
            @endif
        </tr>
    @endforeach
</table>