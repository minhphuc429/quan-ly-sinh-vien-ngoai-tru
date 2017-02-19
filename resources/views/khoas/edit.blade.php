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
<form action="{{ route('khoas.update', $khoa->id) }}" method="POST" role="form">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <legend>Form title</legend>

    <div class="form-group">
        <label for="makhoa" class="col-md-2 control-label">Mã Khoa</label>

        <div class="col-md-10">
            <input type="text" class="form-control" id="makhoa" name="makhoa" placeholder=""
                   value="@if(old('makhoa')){{ old('makhoa') }}@else{{ $khoa->MaKhoa }}@endif">
        </div>
    </div>

    <div class="form-group">
        <label for="tenkhoa" class="col-md-2 control-label">Ten Khoa</label>

        <div class="col-md-10">
            <input type="text" class="form-control" id="tenkhoa" name="tenkhoa" placeholder=""
                   value="@if(old('tenkhoa')){{ old('tenkhoa') }}@else{{ $khoa->TenKhoa }}@endif">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2">
            <a href="{{ route('khoas.index') }}" class="btn btn-default">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>