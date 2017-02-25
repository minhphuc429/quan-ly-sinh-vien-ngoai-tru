@extends('layouts.app')

@section('stylesheet')
    <!-- Bootstrap datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/plugins/datepicker/datepicker3.css') }}">
@endsection

@section('title', 'Thêm Thông tin sinh viên')

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
                    <h3 class="box-title">Nhập Thông Tin Sinh Viên</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('SinhVienController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tensv" class="col-md-2 control-label">Tên Sinh Viên</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="tensv" name="tensv" value="{{ old('tensv') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="idsv" class="col-md-2 control-label">ID Sinh Viên</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="idsv" name="idsv" value="{{ old('idsv') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gioitinh" class="col-md-2 control-label">Giới Tính</label>

                            <div class="col-md-10 radio">
                                <label> <input type="radio" name="gioitinh" id="nam" value="1" checked="checked">Nam
                                </label>

                                <label> <input type="radio" name="gioitinh" id="nu" value="0">Nữ </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ngaysinh" class="col-md-2 control-label">Ngày Sinh</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="diachi" class="col-md-2 control-label">Địa Chỉ</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="diachi" name="diachi" value="{{ old('diachi') }}">
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
                                <select id="malop" name="malop" class="form-control">
                                    @foreach($lops as $lop)
                                        <option value="{{$lop->MaLop}}">{{$lop->TenLop}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dt" class="col-md-2 control-label">Điện Thoại</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="sdt" name="sdt" value="{{ old('sdt') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Email</label>

                            <div class="col-md-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ action('SinhVienController@index') }}" class="btn btn-default">Trở về</a>
                        <button type="submit" class="btn btn-success pull-right">Thêm</button>
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