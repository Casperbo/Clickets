<div class="container">
    <div class="col-md-8 offset-md2">
        <h2>Show Company</h2>
        <hr>
        <div class="form-group">
            <h2>{{ $company->title }}</h2>
        </div>

        <div class="form-group">
            <h2>{{ $company->description }}</h2>
        </div>

        <a class="btn btn-xs btn-danger" href="javascript:ajaxLoad('{{ url('companies') }}')">Back</a>
    </div>
</div>