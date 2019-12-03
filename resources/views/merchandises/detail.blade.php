<div class="container">
    <div class="col-md-8 offset-md2">
        <h2>Show merchandise</h2>
        <hr>
        <div class="form-group">
            <h2>{{ $merchandise->title }}</h2>
        </div>

        <div class="form-group">
            <h2>{{ $merchandise->description }}</h2>
        </div>

        <a class="btn btn-xs btn-danger" href="javascript:ajaxLoad('{{ url('merchandises') }}')">Back</a>
    </div>
</div>