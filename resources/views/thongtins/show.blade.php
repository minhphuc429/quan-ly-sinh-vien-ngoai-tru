@extends('layouts.app')

@section('title', 'Hồ Sơ Sinh Viên')

@section('content-header', 'Hồ Sơ Sinh Viên')

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
        <div class="col-md-12" style="margin-bottom: 20px;">
            <a href="{{ action('ThongTinController@edit', Auth::user()->id) }}" class="btn btn-primary ripple"><b>Sửa Thông Tin</b></a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-rounded" src="http://cbgv.donga.edu.vn/QLSV/ANHSV/{{ Auth::user()->username }}.jpg" alt="Ảnh Sinh Viên">

                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Họ Tên</b> <a class="pull-right">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Giới Tính</b> <a class="pull-right">@if( $sinhvien->GioiTinh )
                                    {!! 'Nam' !!}
                                @else
                                    {!! 'Nữ' !!}
                                @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Ngày Sinh</b>
                            <a class="pull-right">{{ date('d/m/Y', strtotime($sinhvien->NgaySinh)) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Địa Chỉ:</b> <a class="pull-right">{{ $sinhvien->DiaChi }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Điện Thoại:</b> <a class="pull-right">{{ $sinhvien->DienThoai }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email:</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-eye"></i>

                    <h3 class="box-title">Thông Tin Ngoại Trú</h3>
                </div>
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Họ Tên Chủ Nhà:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->HTChuNha }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Số Nhà:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->SoNha }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Đường:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->Duong }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tổ Dân Phố:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->ToDanPho }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phường:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->Phuong }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Quan Hệ:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->QuanHe }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Điện Thoại Chủ Nhà:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->DTChuNha }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Họ Tên Tổ Trưởng:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->HTToTruong }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Điện Thoại Tổ Trưởng:</b>
                            <a class="pull-right"> @if( !$ngoaitru == null ) {{ $ngoaitru->DTToTruong }} @endif</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.col -->
    </div>

@endsection