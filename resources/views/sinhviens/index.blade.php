@extends('layouts.app')

@section('title', 'Thông tin sinh viên')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content-header', 'Sinh Viên')

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
            <a class="btn btn-primary" href="{{ action('SinhVienController@create') }}">Thêm Sinh Viên</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Danh Sách Khoa </h3>
                </div>

                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>ID</th>
                            <th>Giới Tính</th>
                            <th>Ngày Sinh</th>
                            <!-- <th>Dân Tộc</th> -->
                            <th>Địa Chỉ</th>
                            <!-- <th>CMND</th>
                            <th>Ngày Cấp</th>
                            <th>Nơi Cấp</th>
                            <th>Khóa</th>
                            <th>Ngành</th>
                            <th>Bậc</th> -->
                            <th>Lớp</th>
                            <th>Điện Thoại</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $sinhviens as $sinhvien)
                            <tr>
                                <td>{{ $sinhvien->HoTen }}</td>
                                <td>{{ $sinhvien->MaSV }}</td>
                                <td>@if($sinhvien->GioiTinh == 1)
                                        {{ 'Nam' }}
                                    @else
                                        {{ 'Nữ' }}
                                    @endif
                                </td>
                                <td>{{ $sinhvien->NgaySinh }}</td>
                                <!-- <td>{{ $sinhvien->DanToc }}</td> -->
                                <td>{{ $sinhvien->DiaChi }}</td>
                                <!-- <td>{{ $sinhvien->CMND }}</td>
                                <td>{{ $sinhvien->NgayCap }}</td>
                                <td>{{ $sinhvien->NoiCap }}</td>
                                <td>{{ $sinhvien->Khoa }}</td>
                                <td>{{ $sinhvien->Nganh }}</td>
                                <td>{{ $sinhvien->Bac }}</td> -->
                                <td>{{ $sinhvien->MaLop }}</td>
                                <td>{{ $sinhvien->DienThoai }}</td>
                                <td>{{ $sinhvien->Email }}</td>
                                <td>
                                    <a href="{{ action('SinhVienController@show', $sinhvien->id) }}" class="btn btn-info ripple">Xem</a>
                                    <a href="{{ action('SinhVienController@edit', $sinhvien->id) }}" class="btn btn-success ripple">Sửa</a>
                                    <!-- Trigger the modal with a button -->
                                    <button class="btn btn-danger ripple" data-id="{{$sinhvien->id}}" data-name="{{$sinhvien->HoTen}}" data-message="{{ $sinhvien->HoTen }}" data-toggle="modal" data-target="#modal-delete">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>ID</th>
                            <th>Giới Tính</th>
                            <th>Ngày Sinh</th>
                            <!-- <th>Dân Tộc</th> -->
                            <th>Địa Chỉ</th>
                            <!-- <th>CMND</th>
                            <th>Ngày Cấp</th>
                            <th>Nơi Cấp</th>
                            <th>Khóa</th>
                            <th>Ngành</th>
                            <th>Bậc</th> -->
                            <th>Lớp</th>
                            <th>Điện Thoại</th>
                            <th>Email</th>
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