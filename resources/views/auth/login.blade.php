<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đại Học Đông Á | Đăng Nhập</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">

    <style>
        body {
            font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: #2f4050;
            font-size: 13px;
            color: black;
            overflow-x: hidden;
        }

        @media (min-width: 768px) {
            .navbar {
                border-radius: 0px;
            }
        }

        .navbar-default {
            background-color: green;
            border-color: #025215;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #025215;
        }

        footer {
            margin: 0 0;
        }

        .footer > .container {
            padding-top: 10px;
        }

        .container .text-muted {
            margin: 15px 0;
            text-align: center;
            vertical-align: middle;
        }

        .text-muted {
            color: White;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="hold-transition login-page">

<nav class="navbar navbar-default navbar-fixed">
    <div class="container">
        <div class="row">
            {{--<div>
                <img src="{{ asset('images/logo.png') }}" --}}{{--class="img-responsive"--}}{{-- alt="" --}}{{--style="margin: 0 auto"--}}{{-->
                <img src="{{ asset('images/donga.png') }}" height="" width="">
            </div>--}}
            <div class="col-md-7" style="text-align:center">
                <img src="{{ asset('images/da.png') }}" height="" width="">
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</nav>

<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Đại Học Đông Á</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập hệ thống</p>

        <form action="{{ url('/login') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
                <input type="text" name="username" class="form-control" placeholder="ID" value="{{ old('username') }}" required autofocus>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif

                <span class="fa fa-id-card-o form-control-feedback"></span>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <span class="fa fa-key form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        {{--<label> <input type="checkbox"> Duy trì trạng thái đăng nhập </label>--}}
                        <a href="{{ url('/password/reset') }}">Quên tài khoản?</a><br>
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        {{--<a href="{{ url('/password/reset') }}">Quên tài khoản?</a><br>--}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<footer class="footer">
    <div class="container">
        <p class="text-muted">© 2017 Quản Lý Sinh Viên Ngoại Trú -
            <a href="http://donga.edu.vn" target="_blank" style="color: #ffffff;">Trường Đại học Đông Á</a>
        </p>
    </div>
</footer>

<!-- jQuery 2.2.3 -->
<script src="{{ asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
{{--<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>--}}
{{--<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>--}}
</body>
</html>
