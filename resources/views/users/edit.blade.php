@extends('layouts.app')

@section('title', 'Cập Nhật User')

@section('content-header', 'User')

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
                    <h3 class="box-title">Cập Nhật User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('UserController@update', $user->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">User Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" value="@if(old('username')){{ old('username') }}@else{{ $user->username }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm-password" class="col-sm-2 control-label">Confirm Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirm-password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="roles[]" class="col-sm-2 control-label">Role</label>

                            <div class="col-sm-10">
                                @foreach($roles as $role)
                                    <div class="checkbox">
                                        <label> <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if(Entrust::hasRole($role->name)) {!! 'checked' !!} @endif>
                                            {{ $role->display_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('users.index') }}" class="btn btn-default">Trở lại</a>
                        <button type="submit" class="btn btn-success pull-right">Cập Nhật</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection