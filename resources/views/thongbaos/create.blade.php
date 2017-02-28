@extends('layouts.app')

@section('stylesheet')
@endsection

@section('title', 'Tạo Thông Báo')

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


@endsection

@section('script')

@endsection