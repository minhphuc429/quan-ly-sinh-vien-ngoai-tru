@extends('layouts.app')

@section('title', 'Cập Nhật Lớp')

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
                    <h3 class="box-title">Cập Nhật Thông Tin Lớp</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('LopController@update', $lop->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="malop" class="col-md-2 control-label">Mã Lớp</label>

                        <div class="col-md-10">
                            <input type="text" class="form-control" id="malop" name="malop" placeholder="" value="@if(old('malop')){{ old('malop') }}@else{{ $lop->MaLop }}@endif">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tenlop" class="col-md-2 control-label">Tên Lớp</label>

                        <div class="col-md-10">
                            <input type="text" class="form-control" id="tenlop" name="tenlop" placeholder="" value="@if(old('tenlop')){{ old('tenlop') }}@else{{ $lop->TenLop }}@endif">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="makhoa" class="col-md-2 control-label">Mã Khoa</label>

                        <div class="col-md-10">
                            <select id="makhoa" name="makhoa" class="form-control">
                                @foreach($khoas as $khoa)
                                    <option value="{{$khoa->MaKhoa}}">{{$khoa->TenKhoa}} - {{$khoa->MaKhoa}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('lops.index') }}" class="btn btn-default">Trở lại</a>
                        <button type="submit" class="btn btn-success pull-right">Cập Nhật</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection