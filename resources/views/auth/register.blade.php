@extends('layouts.auth')

@section('content')
    <div class="login-box-body animated bounceIn">
        <p class="login-box-msg">Đăng ký thành viên</p>

        <form action="{{ url('/register') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error animated shake' : '' }} has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <span class="fa fa-user form-control-feedback"></span>
            </div>

            {{--<div class="form-group{{ $errors->has('username') ? ' has-error animated shake' : '' }} has-feedback">
                <input type="text" name="name" class="form-control" placeholder="ID" value="{{ old('username') }}" required autofocus>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif

                <span class="fa fa-id-card-o form-control-feedback"></span>
            </div>--}}

            <div class="form-group{{ $errors->has('email') ? ' has-error animated shake' : '' }} has-feedback">
                <input type="email" name="email" class="form-control" placeholder="E-Mail Address" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <span class="fa fa-envelope form-control-feedback"></span>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error animated shake' : '' }} has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <span class="fa fa-key form-control-feedback"></span>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error animated shake' : '' }} has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>

                <span class="fa fa-sign-out form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-7">
                    {{--<div class="checkbox icheck">
                        <label class="">
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            I agree to the <a href="#">terms</a> </label>
                    </div>--}}
                </div>
                <!-- /.col -->

                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat ripple">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        {{--<a href="{{ url('/login') }}" class="ripple">Đăng nhập?</a>--}}
    </div>
    <!-- /.login-box-body -->
@endsection
