@extends('layouts.app')

@section('title', 'Thông Báo')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

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

    <div class="row" style="margin-bottom: 20px; ">
        <div class="col-sm-2">
            <a class="btn btn-primary ripple" href="{{ action('ThongBaoController@create') }}">Tạo thông báo</a>
        </div>
    </div>

@endsection

@section('script')

    <script>

    </script>

@endsection