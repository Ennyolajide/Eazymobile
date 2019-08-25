@extends('users.layouts.master')

    @section('title')
        {{ $app['name'] }} | Login
    @endsection

    @section('content')
        <div id="single-wrapper">
            <form method="post" action="{{ route('user.login') }}" class="frm-single">
                @csrf
                <div class="inside">
                    <div class="title"><strong>{{ $app['name'] }}</strong></div>
                    <!-- /.title -->
                    <div class="frm-title">Login</div>
                    <!-- /.frm-title -->
                    @include('dashboard.layouts.errors')

                    @if(session('response'))
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading text-center">
                                <i class="{{ session('response')->status ? 'fa fa-check' : 'fa-exclamation-triangle' }}"></i>
                                {{ session('response')->active ? 'Invalid Username/Password' : 'Login failed' }}
                            </h4>
                            @if(session('response')->status == false)
                                <p class="text-center">
                                    Account Inactive, please check your email inbox or spam folder to verify email and complete registration.
                                </p>
                            @endif
                            {{-- <p class="mb-0">pxxxl dhdgudd doidoudugugddi</p>--}}
                        </div>
                    @endif
                    <div class="frm-input"><input type="text" placeholder="Username/email" name="email" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
                    <!-- /.frm-input -->
                    <div class="frm-input"><input type="password" placeholder="Password" name="password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
                    <!-- /.frm-input -->
                    <div class="clearfix margin-bottom-20">
                        <div class="pull-left">
                            <div class="checkbox primary"><input type="checkbox" name="remember" id="rememberme"><label for="rememberme">Remember me</label></div>
                            <!-- /.checkbox -->
                        </div>
                        <!-- /.pull-left -->
                        <div class="pull-right"><a href="{{ route('show.passwordReset') }}" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
                        <!-- /.pull-right -->
                    </div>
                    <!-- /.clearfix -->
                    <button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
                    <div class="row small-spacing">
                        <div class="col-sm-12">
                            <div class="txt-login-with txt-center">or login with</div>
                            <!-- /.txt-login-with -->
                        </div>
                        <!-- /.col-sm-12 -->
                        <div class="col-sm-6"><a href="{{ route('facebook.login') }}" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></a></div>
                        <!-- /.col-sm-6 -->
                        <div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
                        <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->
                    <a href="{{ route('show.register') }}" class="a-link"><i class="fa fa-key"></i>New to {{ $app['name'] }}? Register.</a>
                    <div class="frm-footer text-center">{{ $app['name'] }} © {{ $app['year'] }}.</div>
                    <!-- /.footer -->
                </div>
                <!-- .inside -->
            </form>
            <!-- /.frm-single -->
        </div><!--/#single-wrapper -->
    @endSection

