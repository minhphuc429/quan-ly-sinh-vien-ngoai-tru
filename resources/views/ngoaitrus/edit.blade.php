@extends('layouts.app')

@section('title', 'Cập Nhật Ngoại Trú')

@section('content-header', 'Ngoại Trú')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="fa-ul">
                @foreach ($errors->all() as $error)
                    <li><i class="fa-li fa fa-chevron-circle-right"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('ngoaitrus.update', $lop->id) }}" method="POST" role="form">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <legend>Form title</legend>

        <div class="form-group">
            <label for="malop" class="col-md-2 control-label">Mã Lớp</label>

            <div class="col-md-10">
                <input type="text" class="form-control" id="malop" name="malop" placeholder="" value="@if(old('malop')){{ old('malop') }}@else{{ $lop->MaLop }}@endif">
            </div>
        </div>

        <div class="form-group">
            <label for="tenlop" class="col-md-2 control-label">Tên Lớp</label>

            <div class="col-md-10">
                <input type="text" class="form-control" id="tenlop" name="tenlop" placeholder="" value="@if(old('tenlop')){{ old('tenlop') }}@else{{ $lop->TenLop }}@endif">
            </div>
        </div>

        <div class="form-group">
            <label for="makhoa" class="col-md-2 control-label">Mã Khoa</label>

            <div class="col-md-10">
                <input type="text" class="form-control" id="makhoa" name="makhoa" placeholder="" value="@if(old('makhoa')){{ old('makhoa') }}@else{{ $lop->MaKhoa }}@endif">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2">
                <a href="{{ route('ngoaitrus.index') }}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection