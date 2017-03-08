@extends('layouts.app')

@section('stylesheet')
    <!-- Bootstrap datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/plugins/datepicker/datepicker3.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/select2.min.css') }}">
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
                    <h3 class="box-title">Thêm Thông Tin Sinh Viên</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('SinhVienController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="MaSV" class="col-md-2 control-label">ID Sinh Viên</label>

                            <div class="col-md-10">
                                <select name="MaSV" class="form-control select2" style="width: 100%;">
                                    @foreach($users as $user)
                                        <option value="{{$user->username}}">{{$user->username}} - {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="GioiTinh" class="col-md-2 control-label">Giới Tính</label>

                            <div class="col-md-10 radio">
                                <label> <input type="radio" name="GioiTinh" value="1">Nam </label>

                                <label> <input type="radio" name="GioiTinh" value="0">Nữ </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="NgaySinh" class="col-md-2 control-label">Ngày Sinh</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="NgaySinh" name="NgaySinh" value="{{ old('NgaySinh') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="DiaChi" class="col-md-2 control-label">Địa Chỉ</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="DiaChi" value="{{ old('DiaChi') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="MaLop" class="col-md-2 control-label">Lớp</label>

                            <div class="col-md-10">
                                <select name="MaLop" class="form-control">
                                    @foreach($lops as $lop)
                                        <option value="{{$lop->MaLop}}">{{$lop->TenLop}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="DienThoai" class="col-md-2 control-label">Điện Thoại</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="DienThoai" value="{{ old('DienThoai') }}">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ action('SinhVienController@index') }}" class="btn btn-default">Trở lại</a>
                        <button type="submit" class="btn btn-success pull-right">Thêm</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Datemask dd/mm/yyyy
            $("#NgaySinh").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        });
    </script>
@endsection