@extends('users.layouts.master')

@section('title')
    {{ config('constants.site.name') }} | Password Reset
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
                <div class="alert alert-{{ session('status') ? 'success' : 'danger' }} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('response') }}
                </div>
            @else
                <p class="login-box-msg">Sign in to start your session</p>
            @endif
            <form action="{{ route('user.password.reset.request') }}" method="post">
                @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-flat pull-right">Reset</button>
                </div>
                <!-- /.col -->
            </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ route('facebook.login') }}" class="btn btn-block btn-social btn-facebook btn-flat">
                    <i class="fa fa-facebook"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <a href="{{ route('user.login') }}">I already have a membership</a><br>
            <a href="{{ route('user.register') }}" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endSection

@section('scripts')

@endsection
