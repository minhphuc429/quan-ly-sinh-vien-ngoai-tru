@extends('layouts.app')

@section('title', 'Thêm Thông Tin Ngoại Trú')

@section('content-header', 'Ngoại Trú')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="fa-ul">
                @foreach ($errors->all() as $error)
                    <li class="fa-li fa fa-chevron-circle-right">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection