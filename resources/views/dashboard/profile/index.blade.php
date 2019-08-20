@extends('dashboard.layouts.master')

    @section('css')
        <!-- Form Wizard -->
        <link rel="stylesheet" href="\plugins/form-wizard/prettify.css">
    @endSection

    @section('title')Profile @endsection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left text-center">
                        <div class="profile_img text-center">
                            <div id="crop-avatar">
                                <img class="avatar-view" src="\images/avatar/{{ Auth::user()->avatar }}" alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        <h3>{{ Auth::user()->name }}</h3>
                        <ul class="list-unstyled user_data">
                            <li><h4><i class="fa fa-map-marker user-profile-icon"></i> {{ Auth::user()->email }}</h4></li>
                            <li><h3><i class="fa fa-briefcase user-profile-icon"></i> {{ Auth::user()->number }}</h3></li>
                            {{--<li class="m-top-xs">

                                <a data-toggle="modal" href="#myRefUrl" class="btn btn-primary">
                                    <i class="fa fa-external-link user-profile-icon"></i>Show My Referral Link
                                </a>
                            </li>--}}
                        </ul>
                        <a href="#password" data-toggle="tab" class="btn btn-success btn-rounded"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        <br />
                        <br/>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div id="tabsleft" class="tabbable tabs-left">
                            <ul>
                                <li><a href="#info" data-toggle="tab">Profile</a></li>
                                <li><a href="#passwords" data-toggle="tab">Password</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="info">
                                    <form id="change-info-form" class="form-horizontal" action="{{ route('user.profile.edit') }}" method="post">
                                        @csrf @method('patch')
                                        <br/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10 form-grouping">
                                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10 form-grouping">
                                                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" disabled="true">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="inputNo" class="col-sm-2 control-label">Phone</label>

                                            <div class="col-sm-10 form-grouping">
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->number }}">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger btn-rounded">Submit</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="passwords">
                                    <form id="change-password-form" class="form-horizontal" action="{{ route('user.password.edit') }}" method="post">
                                        @csrf
                                        <br/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Current Password</label>

                                            <div class="col-sm-10 form-grouping">
                                                <input type="password" class="form-control" name="currentPassword">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">New Password</label>

                                            <div class="col-sm-10 form-grouping">
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="inputNo" class="col-sm-2 control-label">Comfirm Password</label>

                                            <div class="col-sm-10 form-grouping">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger btn-rounded">Submit</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @include('dashboard.layouts.errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/><br/><br/><br/>
    @endsection












    @section('scripts')
        <!-- Form Wizard -->
        <script src="\plugins/form-wizard/prettify.js"></script>
        <script src="\plugins/form-wizard/jquery.bootstrap.wizard.min.js"></script>

        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script src="\js/form.wizard.init.min.js"></script>
        <script>
            $(document).ready(function(){

                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function (element) {
                        $(element)
                            .closest('.form-grouping')
                            .addClass('has-error');
                    },
                    unhighlight: function (element) {
                        $(element)
                            .closest('.form-grouping')
                            .removeClass('has-error');
                    }
                });

                $('#change-password-form').validate({
                    rules: {
                        currentPassword: {
                            required: true,
                        },
                        password: {
                            required: true,
                        },
                        password_confirmation: {
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        password_confirmation: {
                            equalTo: 'Password does not match',
                        }

                    }

                });

            });

        </script>
    @endSection
