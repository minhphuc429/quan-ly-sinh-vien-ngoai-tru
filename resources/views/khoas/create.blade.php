@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (count($errors) >0)
    <div class="alert alert-danger">
        <ul class="fa-ul">
            @foreach ($errors->all() as $error)
                <li class="fa-li fa fa-chevron-circle-right">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('khoas.store') }}" method="POST" class="form-horizontal" role="form">
    {{ csrf_field() }}
    <div class="form-group">
        <legend>Mã Khoa</legend>
    </div>

    <div class="form-group">
        <label for="makhoa" class="col-md-2 control-label">Mã Khoa</label>

        <div class="col-md-10">
            <input type="text" class="form-control" id="makhoa" name="makhoa" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="tenkhoa" class="col-md-2 control-label">Ten Khoa</label>

        <div class="col-md-10">
            <input type="text" class="form-control" id="tenkhoa" name="tenkhoa" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <a href="{{ route('khoas.index') }}" class="btn btn-default">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>