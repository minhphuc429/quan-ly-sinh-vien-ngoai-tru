@extends('layouts.app')

@section('title', 'Thêm Khoa')

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
                    <h3 class="box-title">Nhập Thông Tin Khoa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('KhoaController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="makhoa" class="col-sm-2 control-label">Mã Khoa</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control"name="makhoa" value="@if(old('makhoa')){{ old('makhoa') }}@endif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tenkhoa" class="col-sm-2 control-label">Tên Khoa</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tenkhoa" value="@if(old('tenkhoa')){{ old('tenkhoa') }}@endif">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('khoas.index') }}" class="btn btn-default">Trở lại</a>
                        <button type="submit" class="btn btn-success pull-right">Thêm</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection