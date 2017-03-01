@extends('layouts.app')

@section('title', 'Xem User')

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
        <div class="col-md-4 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-eye"></i>

                    <h3 class="box-title">Show User</h3>
                </div>
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Name:</b> <a> {{ $user->name }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>User Name:</b> <a>{{ $user->username }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email:</b> <a>{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Permissions:</b> <a>
                                @if(!empty($user->roles))
                                    @foreach($user->roles as $v)
                                        <label class="label label-success">{{ $v->display_name }}</label>
                                    @endforeach
                                @endif
                            </a>
                        </li>
                    </ul>
                    <a href="{{ action('UserController@index') }}" class="btn btn-primary pull-left ripple"><b>Back</b></a>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection