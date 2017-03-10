@extends('layouts.auth')

@section('content')
    <div class="login-box-body animated bounceIn">
        <p class="login-box-msg">Reset Password</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('username') ? ' has-error animated shake' : '' }} has-feedback">
                <input type="email" name="email" class="form-control" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <span class="fa fa-id-card-o form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-3 col-xs-offset-9">
                    <button type="submit" class="btn btn-primary btn-block btn-flat ripple">Send</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
@endsection