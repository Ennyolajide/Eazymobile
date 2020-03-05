@extends('users.layouts.master')

    @section('title')
        {{ config('constants.site.name') }} | Login
    @endsection

    @section('bodyClass')
        register-page
    @endsection

    @section('content')
        <div class="register-box" style="margin: 3% auto;">
            <div class="register-logo">
                <a href="{{ route('index') }}">
                    <img class="img-responsive" src="{{ config('constants.site.logo') }}">
                </a>
            </div>
            <div class="register-box-body">
                @include('users.layouts.errors')
                @if(session('response'))
                    <div class="alert alert-{{ session('response') ? 'success' : 'danger' }} alert-dismissible text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <i class="{{ session('response') ? 'fa fa-check' : 'fa-exclamation-triangle' }}"></i>
                        Registration {{ session('response') ? 'successful' : 'failed' }}
                        @if(session('response'))
                            <p>Please check your email inbox or spamfolder to verify email and complete registration.</p>
                        @endif
                    </div>
                @else
                    <p class="login-box-msg">Register a new membership</p>
                @endif

            <form id="register-form" action="{{ route('user.register.create') }}" method="post">
                @csrf
                @if($referrer)
                    <div class="form-group has-feedback">
                        <label class="text-center">Referred By</label>
                        <input type="text" value="{{ ucwords($referrer->name) }}" class="form-control" disabled="true">
                        <input type="hidden" name="referrerId" value="{{ $referrer->wallet_id }}" class="form-control">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                @else
                    <div class="form-group has-feedback">
                        <label class="text-center">Referrer Wallet id</label>
                        <input type="text" name="referrerId" placeholder="Referrer Wallet Id" class="form-control">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                @endif

                <div class="form-group has-feedback">
                    <input type="text" name="name" class="form-control" placeholder="Full name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck form-group">
                            <label>
                                <input type="checkbox" name="terms" required > I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ route('facebook.login') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
            </div>

            <a href="{{ route('user.login') }}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->
    @endSection

    @section('scripts')
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function(){

                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function (element) {
                        $(element)
                            .closest('.form-group')
                            .addClass('has-error');
                    },
                    unhighlight: function (element) {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-error');
                    }
                });

                $('#register-form').validate({

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
