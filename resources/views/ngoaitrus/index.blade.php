@extends('layouts.app')

@section('title', 'Thông Tin Ngoại Trú')

@section('content-header', 'Ngoại Trú')

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
            <a class="btn btn-info" href="{{ action('NgoaiTruController@create') }}">Thêm thông tin ngoại trú</a>
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
            @foreach ($ngoaitrus->all() as $ngoaitru)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $ngoaitru->Mangoaitru }}</td>
                    <td>{{ $ngoaitru->Tenngoaitru }}</td>
                    <td>{{ $ngoaitru->MaKhoa }}</td>
                    <td>
                        <a href="{{ route('ngoaitrus.show', $ngoaitru->id) }}" class="btn btn-info">View Task</a>
                        <a href="{{ route('ngoaitrus.edit', $ngoaitru->id) }}" class="btn btn-primary">Edit Task</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection