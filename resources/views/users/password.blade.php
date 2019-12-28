@extends('users.layouts.master')

    @section('title')
        {{ config('constants.site.name') }} | Change Password
    @endsection

    @section('content')

        <div id="single-wrapper">
            <form method="post" action="{{ route('user.password.reset.change', ['email' => $email, 'token' => $token ]) }}" class="frm-single">
                @csrf @method('patch')
                <div class="inside">
                    <div class="title">
                        <strong><a href="{{ route('index') }}"><img src="{{ config('constants.site.logo') }}" class="img-fluid"></a></strong>
                    </div>
                    <!-- /.title -->
                    <div class="frm-title">Change Password</div>
                    <!-- /.frm-title -->
                    {{-- <p class="text-center margin-bottom-20">Enter your email address and we'll send you an email with instructions to reset your password.</p> --}}

                    @include('errors')

                    @if(session('response'))
                        <div class="alert alert-{{ session('status') ? 'success' : 'danger' }} alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('response') }}
                        </div>
                    @endif
                    @isset($response)
                        <div class="alert alert-{{ $response['status'] ? 'success' : 'danger' }} alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $response['message'] }}
                        </div>
                    @endif

                    <div class="frm-input">
                        <input type="password" name="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i>
                    </div>

                    <div class="frm-input">
                        <input type="password" name="password_confirmation" placeholder="Retype Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i>
                    </div>
                    <!-- /.frm-input -->
                    <button type="submit" class="frm-submit">Change Password<i class="fa fa-arrow-circle-right"></i></button>

                    <a href="{{ route('user.login') }}" class="a-link"><i class="fa fa-sign-in"></i>Already have account? Login.</a>

                    <a href="{{ route('user.login') }}" class="a-link"><i class="fa fa-sign-up"></i>Dont have an account? Register.</a>

                    <div class="frm-footer text-center">{{ config('constants.site.name') }} © {{ config('constants.site.year') }}.</div>
                    <!-- /.footer -->
                </div>
                <!-- .inside -->
            </form>
            <!-- /.frm-single -->
        </div><!--/#single-wrapper -->
    @endSection

