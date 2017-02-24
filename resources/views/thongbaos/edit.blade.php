@extends('layouts.app')

@section('stylesheet')
    <!-- Bootstrap datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
@endsection

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
                    <h3 class="box-title">Cập Nhật Thông Tin Sinh Viên</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('SinhVienController@update', $sinhvien->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tensv" class="col-md-2 control-label">Tên Sinh Viên</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="tensv" name="tensv" placeholder="Nguyễn Minh Phúc" value="@if(old('tensv')){{ old('tensv') }}@else{{ $sinhvien->HoTen }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="idsv" class="col-md-2 control-label">ID Sinh Viên</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="idsv" name="idsv" placeholder="33205" value="@if(old('tensv')){{ old('tensv') }}@else{{ $sinhvien->MaSV }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gioitinh" class="col-md-2 control-label">Giới Tính</label>

                            <div class="col-md-10 radio">
                                <label> <input type="radio" name="gioitinh" id="nam" value="1" checked="checked">Nam </label>

                                <label> <input type="radio" name="gioitinh" id="nu" value="0">Nữ </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ngaysinh" class="col-md-2 control-label">Ngày Sinh</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="" value="@if(old('tensv')){{ old('tensv') }}@else{{ $sinhvien->NgaySinh }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="diachi" class="col-md-2 control-label">Địa Chỉ</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Quảng Nam" value="@if(old('tensv')){{ old('tensv') }}@else{{ $sinhvien->DiaChi }}@endif">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="dantoc" class="col-md-2 control-label">Dân Tộc</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="dantoc" name="dantoc" placeholder="Kinh">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cmnd" class="col-md-2 control-label">CMND</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="Nguyễn Minh Phúc">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ngaycap" class="col-md-2 control-label">Ngày Cấp</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="ngaycap" name="ngaycap" placeholder="Nguyễn Minh Phúc">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="noicap" class="col-md-2 control-label">Nơi Cấp</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="noicap" name="noicap" placeholder="Quảng Nam">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="khoa" class="col-md-2 control-label">Khóa</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="khoa" name="khoa" placeholder="2014 - 2018">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nganh" class="col-md-2 control-label">Ngành</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="nganh" name="nganh" placeholder="Công nghệ phần mềm">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bac">Bậc</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="bac" name="bac" placeholder="Đại học chính quy">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="lop" class="col-md-2 control-label">Lớp</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="lop" name="lop" placeholder="CT14A.11" value="@if(old('tensv')){{ old('tensv') }}@else{{ $sinhvien->MaLop }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dt" class="col-md-2 control-label">Điện Thoại</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="sdt" name="sdt" placeholder="01272070675" value="@if(old('tensv')){{ old('tensv') }}@else{{ $sinhvien->DienThoai }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Email</label>

                            <div class="col-md-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="minhphuc429@gmail.com" value="@if(old('tensv')){{ old('tensv') }}@else{{ $sinhvien->Email }}@endif">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ action('SinhVienController@index') }}" class="btn btn-default">Hủy</a>
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
            $("#ngaysinh").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        });
    </script>
@endsection