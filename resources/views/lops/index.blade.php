@extends('layouts.app')

@section('title', 'Lớp')

@section('content-header', 'Lớp')

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
            <a class="btn btn-info" href="{{ action('LopController@create') }}">Thêm Lớp</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Mã Khoa</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($lops->all() as $lop)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $lop->MaLop }}</td>
                    <td>{{ $lop->TenLop }}</td>
                    <td>{{ $lop->MaKhoa }}</td>
                    <td>
                        <a href="{{ route('lops.show', $lop->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('lops.edit', $lop->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection