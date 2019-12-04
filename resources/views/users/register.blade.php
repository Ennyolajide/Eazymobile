@extends('users.layouts.master')

    @section('title')
        {{ config('constants.site.name') }} | Register
    @endsection

    @section('content')
        <div id="single-wrapper">
            <form action="{{ route('user.register') }}" class="frm-single" method="POST">
                @csrf
                <div class="inside">
                    <div class="title"><strong>{{ config('constants.site.name') }}</strong></div>
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

                    @if($referrer)
                        <div class="frm-input">
                            <input type="text" value="Referred By {{ ucwords($referrer->name) }}" class="frm-inp"  disabled="true"><i class="fa fa-user frm-ico"></i>
                            <input type="hidden" name="referrerId" value="{{ $referrer->wallet_id }}" class="frm-inp"><i class="fa fa-users frm-ico"></i>
                        </div>
                    @else
                        <div class="frm-input">
                            <input type="text" name="referrerId" placeholder="Referrer Wallet Id" class="frm-inp"><i class="fa fa-users frm-ico"></i>
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
                        <div class="checkbox primary"><input type="checkbox" name="terms" id="accept" required><label for="accept">I accept Terms and Conditions</label></div>
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
                        <div class="col-sm-6"><a href="{{ route('facebook.login') }}" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></a></div>
                        <!-- /.col-sm-6 -->
                        <div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
                        <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->
                    <a href="{{ route('user.login') }}" class="a-link"><i class="fa fa-sign-in"></i>Already have account? Login.</a>
                    <div class="frm-footer text-center">{{ config('constants.site.name') }} © {{ config('constants.site.year') }}.</div>
                    <!-- /.footer -->
                </div>
                <!-- .inside -->
            </form>
            <!-- /.frm-single -->
        </div><!--/#single-wrapper -->
    @endSection

    @section('scripts')
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                const characterPerPage = 160;

                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function(element) {
                        $(element)
                            .closest('.frm-input')
                            .addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element)
                            .closest('.frm-input')
                            .removeClass('has-error');
                    }
                });

                $('#send-bulk-sms-form').validate({
                    rules: {
                        name: { required: true, minlength: 7, maxlength: 50 },
                        email: { required: true, email: true, minlength: 7, maxlength: 50 },
                        phone: { required: true, minlength: 11, maxlength: 13},
                        password: { required: true },
                        password_confirmation: { equalTo: "#password" },
                        terms: { required: true }
                    },
                    messages: {
                        name: {
                            minlength: $.validator.format("Minimum of {0} characters required."),
                            maxlength: $.validator.format("Maximum {0} characters.")
                        },
                        email: {
                            minlength: $.validator.format("Minimum of {0} characters required."),
                            maxlength: $.validator.format("Maximum {0} characters.")
                        },
                        phone: {
                            minlength: $.validator.format("Minimum of {0} characters required."),
                            maxlength: $.validator.format("Maximum {0} characters.")
                        },
                        password_confirmation: {
                            equalTo: 'Password does not match',
                        },

                    }
                });

            });
        </script>

    @endsection

