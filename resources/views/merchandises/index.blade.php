<div class="container">

    <div class="wrapper">
        <div class="col-sm-7">
            <h3>merchandise</h3>
        </div>
        <div class="col-sm-5">
            <div class="pull-right">
                <div class="input-group">
                    <input class="form-control" id="search"
                           value="{{ request()->session()->get('search') }}"
                           onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('merchandises')}}?search='+this.value)"
                           placeholder="Search Title" name="search"
                           type="text" id="search"/>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"
                                onclick="ajaxLoad('{{url('merchandises')}}?search='+$('#search').val())">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>

            <th width="60px">No</th>
            <th><a href="javascript:ajaxLoad('{{url('merchandises?field=title&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Merchandise Title</a>
                {{request()->session()->get('field')=='title'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('merchandises?field=description&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Description
                </a>
                {{request()->session()->get('field')=='description'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('merchandises?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Created At
                </a>
                {{request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('merchandises?field=updated_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Update At
                </a>
                {{request()->session()->get('field')=='updated_at'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            @role('verified-company')
            <th width="160px" style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('merchandises/create')}}')"
                   class="btn btn-primary btn-xs"> <i class="fa fa-plus" aria-hidden="true"></i> New Merchandise</a>
            </th>
            @endrole
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($merchandises as $merchandise)
            <tr>
                <th>{{$i++}}</th>
                <td>{{ $merchandise->title }}</td>
                <td >{{ $merchandise->description }}</td>
                <td>{{ $merchandise->created_at }}</td>
                <td>{{ $merchandise->updated_at }}</td>
                <td>
                    <a class="btn btn-info btn-xs" title="Show"
                       href="javascript:ajaxLoad('{{url('merchandises/show/'.$merchandise->id)}}')">
                        Show</a>
                    @role('verified-company')
                    @if($merchandise->user_id == Auth::user()->id)
                    <a class="btn btn-warning btn-xs" title="Edit"
                       href="javascript:ajaxLoad('{{url('merchandises/update/'.$merchandise->id)}}')">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete"
                       href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('{{url('merchandises/delete/'.$merchandise->id)}}','{{csrf_token()}}')">
                        Delete
                    </a>
                    @endrole
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <ul class="pagination">
        {{ $merchandises->links() }}
    </ul>
</div>
