@extends('users.layouts.master')

    @section('title')
        {{ $app['name'] }} | Register
    @endsection


    @section('content')
        <div id="single-wrapper">
            <form action="{{ route('user.register') }}" class="frm-single" method="POST">
                @csrf
                <div class="inside">
                    <div class="title"><strong>{{ $app['name'] }}</strong></div>
                    <!-- /.title -->
                    <div class="frm-title">Register</div>
                    @include('dashboard.layouts.errors')
                    @if(session('response'))
                        <div class="alert alert-{{ session('response')->status ? 'success' : 'danger' }}" role="alert">
                            <h4 class="alert-heading text-center">
                                <i class="{{ session('response')->status ? 'fa fa-check' : 'fa-exclamation-triangle' }}"></i>
                                Registration {{ session('response')->status ? 'successful' : 'failed' }}
                            </h4>
                            @if(session('response')->status)
                                <p>Please check your email inbox or spamfolder to verify email and complete registration.</p>
                            @endif
                            {{-- <p class="mb-0">pxxxl dhdgudd doidoudugugddi</p>--}}
                        </div>
                    @endif
                    <!-- /.frm-title -->
                    <div class="frm-input"><input type="text" name="name" placeholder="Fullname" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
                    <!-- /.frm-input -->
                    <div class="frm-input"><input type="email" name="email" placeholder="Email" class="frm-inp"><i class="fa fa-envelope frm-ico"></i></div>
                    <!-- /.frm-title -->
                    <div class="frm-input"><input type="text" name="phone" placeholder="Phone Number" class="frm-inp"><i class="fa fa-phone frm-ico"></i></div>
                    <!-- /.frm-input -->
                    <div class="frm-input"><input type="password" name="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
                     <!-- /.frm-input -->
                     <div class="frm-input"><input type="password" name="password_confirmation" placeholder="Confirm Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
                    <!-- /.frm-input -->
                    <div class="clearfix margin-bottom-20">
                        <div class="checkbox primary"><input type="checkbox" name="terms" id="accept"><label for="accept">I accept Terms and Conditions</label></div>
                        <!-- /.checkbox -->
                    </div>
                    <!-- /.clearfix -->
                    <button type="submit" class="frm-submit">Register<i class="fa fa-arrow-circle-right"></i></button>
                    <div class="row small-spacing">
                        <div class="col-sm-12">
                            <div class="txt-login-with txt-center">or register with</div>
                            <!-- /.txt-login-with -->
                        </div>
                        <!-- /.col-sm-12 -->
                        <div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></button></div>
                        <!-- /.col-sm-6 -->
                        <div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
                        <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->
                    <a href="{{ route('show.login') }}" class="a-link"><i class="fa fa-sign-in"></i>Already have account? Login.</a>
                    <div class="frm-footer text-center">{{ $app['name'] }} © {{ $app['year'] }}.</div>
                    <!-- /.footer -->
                </div>
                <!-- .inside -->
            </form>
            <!-- /.frm-single -->
        </div><!--/#single-wrapper -->
    @endSection

    @section('scripts')

    @endsection
