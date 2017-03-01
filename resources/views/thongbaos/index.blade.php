@extends('layouts.app')

@section('title', 'Thông Báo')

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

    @if(Entrust::hasRole('admin'))
        <div class="row" style="margin-bottom: 20px; ">
            <div class="col-sm-2">
                <a class="btn btn-primary ripple" href="{{ action('ThongBaoController@create') }}">Tạo thông báo</a>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline item -->
                @foreach( $thongbaos as $thongbao )
                    <li id="{{ $thongbao->id }}">
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{ date('d/m/Y', strtotime($thongbao->created_at)) }}</span>

                            <h3 class="timeline-header">{{ $thongbao->title }}</h3>

                            <div class="timeline-body">
                                {{ $thongbao->description }}
                            </div>
                            <div class="timeline-footer">
                                <a href="{{ url('home/thongbaos', $thongbao->id) }}" class="btn btn-primary btn-xs">Chi Tiết</a>
                                @if(Entrust::hasRole('admin'))
                                    <a href="{{ route('thongbaos.edit',$thongbao->id) }}" class="btn btn-success btn-xs">Sửa</a>
                                    <!-- Trigger the modal with a button -->
                                    <button class="btn btn-danger btn-xs ripple" data-id="{{$thongbao->id}}" data-toggle="modal" data-target="#modal-delete">Xóa</button>
                                @endif
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                @endforeach

                <!-- ./ -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>
        <!-- /.col -->
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
                    <p>Thông báo sẽ bị xóa.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default ripple" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-google ripple" data-id="">Đồng ý</button>
                </div>
            </div>

        </div>
@endsection

@section('script')

    <script>
        $(function () {

            $('#modal-delete').on('show.bs.modal', function (e) {
                var data = $(e.relatedTarget).data();
                $('.btn-google', this).data('id', data.id);
            });

            $('.modal-footer').on('click', '.btn-google', function (e) {
                e.preventDefault();
                $(".btn-google").prop('disabled', true);
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: '{{ action('ThongBaoController@index') }}' + '/' + id,
                    data: {
                        '_method': 'delete',
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (data) {
                        $('#' + id).remove();
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