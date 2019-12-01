@extends('users.layouts.master')

    @section('title')
        {{ config('constants.site.name') }} | Login
    @endsection

    @section('content')
        <div id="single-wrapper">
            <form method="post" action="{{ route('user.login') }}" class="frm-single">
                @csrf
                <div class="inside">
                    <div class="title">
                        <strong><a href="{{ route('index') }}"><img src="{{ config('constants.site.logo') }}" class="img-fluid"></a></strong>
                    </div>
                    <!-- /.title -->
                    <div class="frm-title">Login</div>
                    <!-- /.frm-title -->
                    @include('dashboard.layouts.errors')

                    @if(session('response'))
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading text-center">
                                <i class="fa-exclamation-triangle"></i>
                                {{ session('response') }}
                            </h4>
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
                        <div class="pull-right"><a href="{{ route('user.password.reset') }}" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
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
                    <a href="{{ route('user.register') }}" class="a-link"><i class="fa fa-key"></i>New to {{ config('constants.site.name') }}? Register.</a>
                    <div class="frm-footer text-center">{{ config('constants.site.name') }} © {{ config('constants.site.year') }}.</div>
                    <!-- /.footer -->
                </div>
                <!-- .inside -->
            </form>
            <!-- /.frm-single -->
        </div><!--/#single-wrapper -->
    @endSection

