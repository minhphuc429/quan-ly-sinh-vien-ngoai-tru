@extends('layouts.app')

@section('stylesheet')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/select2.min.css') }}">
@endsection

@section('title', 'Thêm Lớp')

@section('content-header', 'Lớp')

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
                    <h3 class="box-title">Nhập Thông Tin Lớp</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('LopController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="malop" class="col-md-2 control-label">Mã Lớp</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="malop" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tenlop" class="col-md-2 control-label">Tên Lớp</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tenlop" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="makhoa" class="col-md-2 control-label">Mã Khoa</label>

                            <div class="col-sm-10">
                                <select name="makhoa" class="form-control select2">
                                    @foreach($khoas as $khoa)
                                        <option value="{{$khoa->MaKhoa}}">{{$khoa->TenKhoa}} - {{$khoa->MaKhoa}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ action('LopController@index') }}" class="btn btn-default">Trở lại</a>
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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>
@endsection