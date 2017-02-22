@extends('layouts.app')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('title', 'Khoa')

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

    <div class="row" style="margin-bottom: 20px; ">
        <div class="col-sm-2">
            <a class="btn btn-info" href="{{ action('KhoaController@create') }}">Thêm Khoa</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Bảng Khoa </h3>
                </div>

                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã Khoa</th>
                            <th>Tên Khoa</th>
                            <th>Action</th>
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
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Mã Khoa</th>
                            <th>Tên Khoa</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- DataTables -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#data-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });
    </script>

@endsection