@extends('layouts.app')

@section('title', 'Bảng điều khiển')

@section('content-header', 'Control panel')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $khoa }}</h3>

                    <p>Khoa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-apps"></i>
                </div>
                <a href="{{ action('KhoaController@index') }}" class="small-box-footer">Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $lop }}</h3>

                    <p>Lớp</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="{{ action('LopController@index') }}" class="small-box-footer">Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $sinhvien }}</h3>

                    <p>Sinh Viên</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ action('SinhVienController@index') }}" class="small-box-footer">Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $ngoaitru }}</h3>

                    <p>Ngoại Trú</p>
                </div>
                <div class="icon">
                    <i class="ion ion-map"></i>
                </div>
                <a href="{{ action('NgoaiTruController@index') }}" class="small-box-footer">Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
