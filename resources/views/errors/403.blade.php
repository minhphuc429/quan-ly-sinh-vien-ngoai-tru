@extends('layouts.app')

@section('title', 'Error 403')

@section('content-header', 'Error 403')

@section('content')
    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Forbidden</h3>

            <p>
                Access to this resource on the server is denied. Meanwhile, you may
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