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

    <div class="row" style="margin-bottom: 20px; ">
        <div class="col-sm-2">
            <a class="btn btn-primary ripple" href="{{ url('home/thongbaos') }}">Trở Lại</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline item -->
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{ date('d/m/Y', strtotime($thongbao->created_at)) }}</span>

                            <h3 class="timeline-header">{{ $thongbao->title }}</h3>

                            <div class="timeline-body">
                                {{ $thongbao->noidung }}
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->

            <!-- ./ -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>
        <!-- /.col -->
    </div>
@endsection