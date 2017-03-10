@extends('layouts.auth')

@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Reset Password</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

            <form method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error animated shake' : '' }} has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                    <span class="fa fa-id-card-o form-control-feedback"></span>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error animated shake' : '' }} has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                    <span class="fa fa-id-card-o form-control-feedback"></span>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error animated shake' : '' }} has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif

                    <span class="fa fa-id-card-o form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary ripple">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
    </div>
    <!-- /.login-box-body -->
@endsection