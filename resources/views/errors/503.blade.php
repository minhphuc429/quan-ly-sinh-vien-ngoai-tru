@extends('layouts.app')

@section('title', 'Error 503')

@section('content-header', 'Error 503')

@section('content')
    <div class="error-page">
        <h2 class="headline text-yellow"> 503</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Server Error</h3>

            <p>
                The service you requested is not available yet. Please try again in 30 seconds. Meanwhile, you may
                <a href="{{ url('home') }}">return to dashboard</a> or try using the search form. </p>

            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">

                    <div class="input-group-btn">
                        <button type="button" name="submit" class="btn btn-warning btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
@endsection