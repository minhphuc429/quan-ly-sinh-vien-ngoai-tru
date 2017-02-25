@extends('layouts.app')

@section('title', 'Update Permission')

@section('content-header', 'Permission')

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
                    <h3 class="box-title">Update Permission</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('PermissionController@update', $permission->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="@if(old('name')){{ old('name') }}@else{{ $permission->name }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="displayname" class="col-sm-2 control-label">Display Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="displayname" name="displayname" value="@if(old('displayname')){{ old('displayname') }}@else{{ $permission->display_name }}@endif">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description" value="@if(old('description')){{ old('description') }}@else{{ $permission->description }}@endif">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('permissions.index') }}" class="btn btn-default ripple">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right ripple">Update</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection