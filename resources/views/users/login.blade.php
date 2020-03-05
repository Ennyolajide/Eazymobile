@extends('users.layouts.master')

@section('title')
   {{ config('constants.site.name') }} | Login
@endsection

@section('bodyClass')
    login-page
@endsection

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('index') }}">
                <img class="img-responsive" src="{{ config('constants.site.logo') }}">
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @if(session('response'))
                <div class="alert alert-danger text-center">
                    <i class="fa-exclamation-triangle"></i>
                    {{ session('response') }}
                </div>
            @else
                <p class="login-box-msg">Sign in to start your session</p>
            @endif

            <form action="{{ route('user.login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <div class="">
                    <a href="{{ route('user.register') }}" class="pull-left"><strong>Register</strong></a>
                    - OR -
                    <a href="{{ route('user.password.reset') }}" class="text-danger pull-right"><strong>Forgot password?</strong></a>
                </div>
                <br/>
                <a href="{{ route('facebook.login') }}" class="btn btn-block btn-social btn-facebook btn-flat">
                    <i class="fa fa-facebook"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endSection

@section('scripts')

@endsection
