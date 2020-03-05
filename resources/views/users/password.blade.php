@extends('users.layouts.master')

@section('title')
    {{ config('constants.site.name') }} | Change Password
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
            @include('errors')

            @if(session('response'))
                <div class="alert alert-{{ session('status') ? 'success' : 'danger' }} alert-dismissible">
                    <!--a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a-->
                    {{ session('response') }}
                </div>
            @endif
            @isset($response)
                <div class="alert alert-{{ $response['status'] ? 'success' : 'danger' }} alert-dismissible">
                    <!--a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a-->
                    {{ $response['message'] }}
                </div>
            @endif

            <form action="{{ route('user.password.reset.change', ['email' => $email, 'token' => $token ]) }}" method="post">
                @csrf @method('patch')
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-flat pull-right">Change Password</button>
                </div>
                <!-- /.col -->
            </div>
            </form>

            <div class="social-auth-links text-center">
                <div class="">
                    <a href="{{ route('user.login') }}" class="pull-left"><strong>Login</strong></a>
                    - OR -
                    <a href="{{ route('user.register') }}" class="text-success pull-right"><strong>Register</strong></a>
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
