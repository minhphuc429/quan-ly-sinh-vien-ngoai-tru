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

    <form action="{{ action('KhoaController@store') }}" method="POST" class="form-horizontal" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <legend>Mã Khoa</legend>
        </div>

        <div class="form-group">
            <label for="makhoa" class="col-md-2 control-label">Mã Khoa</label>

            <div class="col-md-10">
                <input type="text" class="form-control" id="makhoa" name="makhoa" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label for="tenkhoa" class="col-md-2 control-label">Ten Khoa</label>

            <div class="col-md-10">
                <input type="text" class="form-control" id="tenkhoa" name="tenkhoa" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <a href="{{ route('khoas.index') }}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection