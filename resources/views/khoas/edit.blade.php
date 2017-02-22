@extends('layouts.app')

@section('title', 'Cập Nhật Khoa')

@section('content-header', 'Khoa')

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

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Cập Nhật Thông Tin Khoa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('KhoaController@update', $khoa->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="makhoa" class="col-sm-2 control-label">Mã Khoa</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="makhoa" name="makhoa" placeholder="CNTT" value="@if(old('makhoa')){{ old('makhoa') }}@else{{ $khoa->MaKhoa }}@endif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tenkhoa" class="col-sm-2 control-label">Tên Khoa</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tenkhoa" name="tenkhoa" placeholder="CNTT" value="@if(old('tenkhoa')){{ old('tenkhoa') }}@else{{ $khoa->TenKhoa }}@endif">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('khoas.index') }}" class="btn btn-default">Hủy</a>
                        <button type="submit" class="btn btn-success pull-right">Cập Nhật</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection