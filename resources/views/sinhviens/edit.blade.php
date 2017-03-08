@extends('layouts.app')

@section('title', 'Cập Nhật Thông Tin')

@section('stylesheet')
    <!-- Bootstrap datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content-header', 'Sinh Viên')

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
                    <h3 class="box-title">Cập Nhật Thông Tin</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('SinhVienController@update', $sinhvien->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Họ Tên</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="MaSV" class="col-md-2 control-label">Mã SV</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="MaSV" value="@if(old('MaSV')){{ old('MaSV') }}@else{{ $sinhvien->MaSV }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="MaLop" class="col-md-2 control-label">Mã Lớp</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="MaLop" value="@if(old('MaLop')){{ old('MaLop') }}@else{{ $sinhvien->MaLop }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="GioiTinh" class="col-md-2 control-label">Giới Tính</label>

                            <div class="col-md-10 radio">
                                <label> <input type="radio" name="GioiTinh" value="1"
                                    @if ( $sinhvien->GioiTinh ) {!! 'checked' !!} @endif>Nam </label>

                                <label> <input type="radio" name="GioiTinh" value="0" @if ( !$sinhvien->GioiTinh ) {!! 'checked' !!} @endif>Nữ </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="NgaySinh" class="col-md-2 control-label">Ngày Sinh</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="NgaySinh" name="NgaySinh" value="@if(old('NgaySinh')){{ old('NgaySinh') }}@else{{ $sinhvien->NgaySinh }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="DiaChi" class="col-md-2 control-label">Địa Chỉ</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="DiaChi" value="@if(old('DiaChi')){{ old('DiaChi') }}@else{{ $sinhvien->DiaChi }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="DienThoai" class="col-md-2 control-label">Điện Thoại</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="DienThoai" value="@if(old('DienThoai')){{ old('DienThoai') }}@else{{ $sinhvien->DienThoai }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Họ Tên</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="email" value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ action('SinhVienController@index') }}" class="btn btn-default">Trở lại</a>
                        <button type="submit" class="btn btn-success pull-right">Cập Nhật</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- InputMask -->
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script>
        $(function () {

            //Datemask dd/mm/yyyy
            $("#NgaySinh").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        });
    </script>
@endsection