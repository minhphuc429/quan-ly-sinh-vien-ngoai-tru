@extends('layouts.app')

@section('title', 'Cập Nhật Thông Tin')

@section('content-header', 'Hồ Sơ Sinh Viên')

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

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Cập Nhật Thông Tin Sinh Viên</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ action('ThongTinController@update', Auth::user()->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="DienThoai" class="col-md-2 control-label">Điện Thoại</label>

                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="DienThoai" placeholder="01272070675" value="@if(old('DienThoai')){{ old('DienThoai') }}@else{{ $sinhvien->DienThoai }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label">Email</label>

                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" value="@if(old('email')){{ old('email') }}@else{{ Auth::user()->email }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="HTChuNha" class="col-sm-2 control-label">Họ Tên Chủ Nhà</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="HTChuNha" value="@if(old('HTChuNha')){{ old('HTChuNha') }}@else{{ $ngoaitru->HTChuNha }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="SoNha" class="col-sm-2 control-label">Số Nhà</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="SoNha" value="@if(old('SoNha')){{ old('SoNha') }}@else{{ $ngoaitru->SoNha }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Duong" class="col-sm-2 control-label">Đường</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="Duong" value="@if(old('Duong')){{ old('Duong') }}@else{{ $ngoaitru->Duong }}@endif">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ToDanPho" class="col-sm-2 control-label">Tổ Dân Phố</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ToDanPho" value="@if(old('ToDanPho')){{ old('ToDanPho') }}@else{{ $ngoaitru->ToDanPho }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Phuong" class="col-sm-2 control-label">Phường</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="Phuong" value="@if(old('Phuong')){{ old('Phuong') }}@else{{ $ngoaitru->Phuong }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="QuanHe" class="col-sm-2 control-label">Quan Hệ</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="QuanHe" value="@if(old('QuanHe')){{ old('QuanHe') }}@else{{ $ngoaitru->QuanHe }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="DTChuNha" class="col-sm-2 control-label">SĐT Chủ Nhà</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="DTChuNha" value="@if(old('DTChuNha')){{ old('DTChuNha') }}@else{{ $ngoaitru->DTChuNha }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="HTToTruong" class="col-sm-2 control-label">Họ Tên Tổ Trưởng</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="HTToTruong" value="@if(old('HTToTruong')){{ old('HTToTruong') }}@else{{ $ngoaitru->HTToTruong }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="DTToTruong" class="col-sm-2 control-label">SĐT Tổ Trưởng</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="DTToTruong" value="@if(old('DTToTruong')){{ old('DTToTruong') }}@else{{ $ngoaitru->DTToTruong }}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ action('ThongTinController@show', Auth::user()->id) }}" class="btn btn-default">Trở lại</a>
                        <button type="submit" class="btn btn-success pull-right">Cập Nhật</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- InputMask -->
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script>
        $(function () {

            //Datemask dd/mm/yyyy
            $("#ngaysinh").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        });
    </script>
@endsection