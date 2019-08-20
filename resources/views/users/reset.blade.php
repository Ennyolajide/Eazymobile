@extends('users.layouts.master')

    @section('title')
        {{ $app['name'] }} | Password Reset
    @endsection

    @section('content')

        <div id="single-wrapper">
            <form action="#" class="frm-single">
                <div class="inside">
                    <div class="title"><strong>{{ $app['name'] }}</strong></div>
                    <!-- /.title -->
                    <div class="frm-title">Reset Password</div>
                    <!-- /.frm-title -->
                    <p class="text-center">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                    <div class="frm-input"><input type="email" name="email" placeholder="Enter Email" class="frm-inp"><i class="fa fa-envelope frm-ico"></i></div>
                    <!-- /.frm-input -->
                    <button type="submit" class="frm-submit">Send Email<i class="fa fa-arrow-circle-right"></i></button>
                    <a href="{{ route('show.login') }}" class="a-link"><i class="fa fa-sign-in"></i>Already have account? Login.</a>
                    <div class="frm-footer text-center">{{ $app['name'] }} © {{ $app['year'] }}.</div>
                    <!-- /.footer -->
                </div>
                <!-- .inside -->
            </form>
            <!-- /.frm-single -->
        </div><!--/#single-wrapper -->
    @endSection

