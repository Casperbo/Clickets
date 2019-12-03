<div class="container">

    <div class="wrapper">
        <div class="col-sm-7">
            <h3>Companies</h3>
        </div>
        <div class="col-sm-5">
            <div class="pull-right">
                <div class="input-group">
                    <input class="form-control" id="search"
                           value="{{ request()->session()->get('search') }}"
                           onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('companies')}}?search='+this.value)"
                           placeholder="Search Title" name="search"
                           type="text" id="search"/>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"
                                onclick="ajaxLoad('{{url('companies')}}?search='+$('#search').val())">
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
            <th><a href="javascript:ajaxLoad('{{url('companies?field=title&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Company Title</a>
                {{request()->session()->get('field')=='title'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('companies?field=description&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Description
                </a>
                {{request()->session()->get('field')=='description'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('companies?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Created At
                </a>
                {{request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('companies?field=updated_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Update At
                </a>
                {{request()->session()->get('field')=='updated_at'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            @role('verified-company')
            <th width="160px" style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('companies/create')}}')"
                   class="btn btn-primary btn-xs"> <i class="fa fa-plus" aria-hidden="true"></i> New Company</a>
            </th>
            @endrole
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($companies as $company)
            <tr>
                <th>{{$i++}}</th>
                <td>{{ $company->title }}</td>
                <td >{{ $company->description }}</td>
                <td>{{ $company->created_at }}</td>
                <td>{{ $company->updated_at }}</td>
                <td>
                    <a class="btn btn-info btn-xs" title="Show"
                       href="javascript:ajaxLoad('{{url('companies/show/'.$company->id)}}')">
                        Show</a>
                    @role('verified-company')
                    @if($company->user_id == Auth::user()->id)
                    <a class="btn btn-warning btn-xs" title="Edit"
                       href="javascript:ajaxLoad('{{url('companies/update/'.$company->id)}}')">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete"
                       href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('{{url('companies/delete/'.$company->id)}}','{{csrf_token()}}')">
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
        {{ $companies->links() }}
    </ul>
</div>
