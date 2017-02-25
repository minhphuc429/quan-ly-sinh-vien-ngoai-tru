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
                            <b>Giới Tính</b> <a class="pull-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>Ngày Sinh</b> <a class="pull-right"></a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-9">
            <div class="box box-primary">

            </div>
        </div>
        <!-- /.col -->
    </div>

@endsection