<table class="table">
    <tr>
        <th>Ticket Name:</th>
        <th>Begin date and time:</th>
        <th>End date and time:</th>
        <th>Age restriction:</th>
    </tr>
    @foreach($tickets as $ticket)
        <tr>
            <td>
                <a href="tickets/{{ $ticket->id }}">
                    {{$ticket->name}}
                </a>
            </td>
            <td>{{$ticket->begintime}}</td>
            <td>{{$ticket->endtime}}</td>
            <td>{{$ticket->age}}</td>
            @role('verified-company')
            @if($ticket->user_id == Auth::user()->id)
            <td>
                {{ Form::open(['method' => 'GET', 'route' => ['tickets.edit', $ticket->id]]) }}
                {{ Form::submit('Edit', ['class' => 'btn btn-edit']) }}
                {{ Form::close() }}
            </td>@endrole
            @endif
            @role('verified-company')
            @if($ticket->user_id == Auth::user()->id)
            <td>
                {{ Form::open(['method' => 'DELETE', 'route' => ['tickets.destroy', $ticket->id]]) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-destroy']) }}
                {{ Form::close() }}
            </td>@endrole
            @endif
        </tr>
    @endforeach
</table>