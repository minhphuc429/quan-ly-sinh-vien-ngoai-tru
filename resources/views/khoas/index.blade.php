@extends('layouts.app')

@section('title', 'Lớp')

@section('content-header', 'Lớp')

@section('content')

    @if	(session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif

    @if (count($errors) >0 )
        <div class="alert alert-danger">
            <ul class="fa-ul">
                @foreach ($errors->all() as $error)
                    <li class="fa-li fa fa-chevron-circle-right">{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row" style="margin-bottom: 20px; ">
        <div class="col-sm-2">
            <a class="btn btn-info" href="{{ action('KhoaController@create') }}">Thêm Khoa</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Mã Khoa</th>
                <th>Tên Khoa</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($khoas->all() as $khoa)
                <tr>
                    <td>{{ $khoa->id }}</td>
                    <td>{{ $khoa->MaKhoa }}</td>
                    <td>{{ $khoa->TenKhoa }} </td>
                    <td>
                        <a href="{{ route('khoas.show', $khoa->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('khoas.edit', $khoa->id) }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection