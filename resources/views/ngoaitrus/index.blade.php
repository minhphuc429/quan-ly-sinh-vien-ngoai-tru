@extends('layouts.app')

@section('title', 'Danh Sách Ngoại Trú')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content-header', 'Ngoại trú')

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
            <a class="btn btn-primary ripple" href="{{ action('NgoaiTruController@create') }}">Thêm Thông Tin Ngoại Trú</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh Sách Ngoại Trú</h3>
                </div>

                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã SV</th>
                            <th>Họ Tên Chủ Nhà</th>
                            <th>SĐT Chủ Nhà</th>
                            <th>Số Nhà</th>
                            <th>Đường</th>
                            <th>Tổ Dân Phố</th>
                            <th>Phường</th>
                            <th>Quan Hệ</th>
                            <th>Họ Tên Tổ Trưởng</th>
                            <th>SĐT Tổ Trưởng</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ngoaitrus->all() as $ngoaitru)
                            <tr id="{{ $ngoaitru->id }}">
                                <td>{{ $ngoaitru->id }}</td>
                                <td>{{ $ngoaitru->MaSV }}</td>
                                <td>{{ $ngoaitru->HTChuNha }}</td>
                                <td>{{ $ngoaitru->DTChuNha }} </td>
                                <td>{{ $ngoaitru->SoNha }} </td>
                                <td>{{ $ngoaitru->Duong }} </td>
                                <td>{{ $ngoaitru->ToDanPho }} </td>
                                <td>{{ $ngoaitru->Phuong }} </td>
                                <td>{{ $ngoaitru->QuanHe }} </td>
                                <td>{{ $ngoaitru->HTToTruong }} </td>
                                <td>{{ $ngoaitru->DTToTruong }} </td>
                                <td>
                                    <a href="{{ route('ngoaitrus.edit', $ngoaitru->id) }}" class="btn btn-success ripple">Sửa</a>
                                    <!-- Trigger the modal with a button -->
                                    <button class="btn btn-danger ripple" data-id="{{$ngoaitru->id}}" data-name="{{$ngoaitru->id}}" data-message="{{ $ngoaitru->MaSV }}" data-toggle="modal" data-target="#modal-delete">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Mã SV</th>
                            <th>Họ Tên Chủ Nhà</th>
                            <th>SĐT Chủ Nhà</th>
                            <th>Số Nhà</th>
                            <th>Đường</th>
                            <th>Tổ Dân Phố</th>
                            <th>Phường</th>
                            <th>Quan Hệ</th>
                            <th>Họ Tên Tổ Trưởng</th>
                            <th>SĐT Tổ Trưởng</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal-delete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận xóa?</h4>
                </div>
                <div class="modal-body">
                    <p>Thông Tin Ngoại Trú Của ID "<b class="message"></b>" sẽ bị xóa.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default ripple" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-google ripple" data-id="">Đồng ý</button>
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

            $('#modal-delete').on('show.bs.modal', function (e) {
                var data = $(e.relatedTarget).data();
                $('.message', this).text(data.message);
                $('.btn-google', this).data('id', data.id);
            });

            $('.modal-footer').on('click', '.btn-google', function (e) {
                e.preventDefault();
                $(".btn-google").prop('disabled', true);
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: '{{ action('NgoaiTruController@index') }}' + '/' + id,
                    data: {
                        '_method': 'delete',
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (data) {
                        $('table#data-table tr#' + id).remove();
                        $('#modal-delete').modal('toggle');
                        $(".btn-google").prop('disabled', false);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>

@endsection