@extends('layouts.app')

@section('stylesheet')
<!-- Bootstrap datepicker -->
<link rel="stylesheet" type="text/css" href="{{ asset('adminlte/plugins/datepicker/datepicker3.css') }}">
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
<form class="form-horizontal" action="{{ url('sinhviens') }}" method="POST" role="form">

    {{ csrf_field() }}

    <div class="form-group">
        <legend>Thông tin sinh viên</legend>
    </div>

    <div class="form-group">
        <label for="tensv" class="col-md-2 control-label">Tên Sinh Viên</label>

        <div class="col-md-10">
            <input type="text" class="form-control" id="tensv" name="tensv" placeholder="Nguyễn Minh Phúc">
        </div>
    </div>

    <div class="form-group">
        <label for="idsv" class="col-md-2 control-label">ID Sinh Viên</label>

        <div class="col-md-10">
            <input type="text" class="form-control" id="idsv" name="idsv" placeholder="33205">
        </div>
    </div>

    <div class="form-group">
        <label for="gioitinh" class="col-md-2 control-label">Giới Tính</label>

        <div class="col-md-10 radio">
            <label>
                <input type="radio" name="gioitinh" id="nam" value="1" checked="checked">Nam
            </label>

            <label>
                <input type="radio" name="gioitinh" id="nu" value="0">Nữ
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="ngaysinh" class="col-md-2 control-label">Ngày Sinh</label>

        <div class="col-md-10">
            <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="diachi" class="col-md-2 control-label">Địa Chỉ</label>

        <div class="col-md-10">
            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Quảng Nam">
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
                <input type="text" class="form-control" id="lop" name="lop" placeholder="CT14A.11">
            </div>
        </div>

        <div class="form-group">
            <label for="dt" class="col-md-2 control-label">Điện Thoại</label>

            <div class="col-md-10">
                <input type="text" class="form-control" id="sdt" name="sdt" placeholder="01272070675">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-2 control-label">Email</label>

            <div class="col-md-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="minhphuc429@gmail.com">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-default ripple">Submit</button>
            </div>
        </div>
    </form>

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