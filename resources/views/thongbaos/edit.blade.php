@extends('layouts.app')

@section('title', 'Cập Nhật Thông Báo')

@section('content-header', 'Thông Báo')

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
                    <h3 class="box-title">Cập Nhật Thông Báo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('ThongBaoController@update', $thongbao->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Title</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="@if(old('title')){{ old('title') }}@else{{ $thongbao->title }}@endif">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-2 control-label">Description</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="description">@if(old('description')){{ old('description') }}@else{{ $thongbao->description }}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-md-2 control-label">Content</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="noidung">@if(old('description')){{ old('description') }}@else{{ $thongbao->noidung }}@endif</textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('thongbaos.index') }}" class="btn btn-default">Trở lại</a>
                        <button type="submit" class="btn btn-success pull-right">Cập Nhật</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection