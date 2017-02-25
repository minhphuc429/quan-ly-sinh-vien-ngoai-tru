@extends('layouts.app')

@section('title', 'Thêm Role')

@section('content-header', 'Role')

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
                    <h3 class="box-title">Nhập Thông Tin Role</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('RoleController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="@if(old('name')){{ old('name') }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="display_name" class="col-sm-2 control-label">Display Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="display_name" name="display_name" value="@if(old('display_name')){{ old('display_name') }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description" value="@if(old('description')){{ old('description') }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="permissions[]" class="col-sm-2 control-label">Display Name</label>

                            <div class="col-sm-10">
                                @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                            {{ $permission->display_name }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('roles.index') }}" class="btn btn-warning ripple">Hủy</a>
                        <button type="submit" class="btn btn-success pull-right ripple">Thêm</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection