@extends('dashboard.layouts.master')

    @section('title')Profile @endsection

    @section('css')
        <!-- Form Wizard -->
        <link rel="stylesheet" href="\plugins/form-wizard/prettify.css">
    @endSection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <br/>
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left text-center">
                            <div class="profile_img text-center">
                                <div id="crop-avatar">
                                    <img class="avatar-view" src="{{ Auth::user()->avatar ?? '\images/avatar/default.png' }}" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{ Auth::user()->name }}</h3>
                            <ul class="list-unstyled user_data">
                                <li><h5><i class="fa fa-map-marker user-profile-icon"></i> {{ Auth::user()->email }}</h5></li>
                                <li><h3><i class="fa fa-briefcase user-profile-icon"></i> {{ Auth::user()->number }}</h3></li>
                                <li class="m-top-xs">

                                    <a data-toggle="modal" href="#myRefUrl" class="btn btn-primary">
                                        <i class="fa fa-external-link user-profile-icon"></i><small> My Referral Link</small>
                                    </a>
                                </li>
                                <li class="margin-top-20 margin-bottom-20"><h4>Wallet ID : <span class="text-primary">{{ Auth::user()->wallet_id }}</span></h4></li>

                            </ul>
                            <a href="#passwords" data-toggle="tab" class="btn btn-success btn-rounded"><i class="fa fa-edit m-right-xs"></i>Edit Password</a>
                            <br />
                            <br/>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div id="tabsleft" class="tabbable tabs-left">
                                <ul>
                                    <li><a href="#info" data-toggle="tab">Profile</a></li>
                                    <li><a href="#passwords" data-toggle="tab">Password</a></li>
                                    <li><a href="#mybanks" data-toggle="tab">Banks</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="info">
                                        <form id="change-info-form" class="form-horizontal" action="{{-- route('user.profile.edit') --}}" method="post">
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
                                    <div class="tab-pane" id="mybanks">
                                        <div class="row">
                                            <h4 class="text-danger text-center"><strong>Charges @naira($addBankCharges) Apply </strong></h3>

                                            <div class="col-xs-12 col-sm-12 col-md-12" style="display:none;" id="newBankDiv">
                                                <form id="add-bank-details-form" class="form-horizontal" action="{{ route('user.bank.store') }}" method="POST">
                                                    @csrf
                                                    <br/>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-xs-12 control-label">Select Bank</label>
                                                        <div class="col-sm-9 col-xs-12 form-grouping text-bold">
                                                            <select style="height: 40px;" class="form-control" id="banks">
                                                                <option value="" disabled selected><strong>Choose Bank</strong></option>
                                                                @foreach ($banks as $bank)
                                                                    <option value="{{ json_encode($bank) }}">
                                                                        {{ $bank->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input type="hidden" id="bankCode" name="bankCode">
                                                        <input type="hidden" id="bankName" name="bankName">
                                                    </div>
                                                    <br/>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-xs-12 control-label">Account Number</label>

                                                        <div class="col-sm-9 col-xs-12 form-grouping">
                                                            <input type="text" class="form-control" name="accountNumber" id="accountNumber">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="form-group row" id="accountNameField"  style="display: none;">
                                                        <label class="col-sm-3 col-xs-12 control-label">Account Name</label>

                                                        <div class="col-sm-9 col-xs-12 form-grouping">
                                                            <input  type="text" class="form-control name-input" name="accountName" id="accountName" disabled="true">
                                                            <br/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <button  id="resolveBankDetails" class="btn btn-danger btn-rounded pull-right" disabled="true">Proceed</button>
                                                            <button  id="addBank" type="submit" class="btn btn-danger btn-rounded pull-right" style="display: none;">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-12 col-xs-12" id="bankListDiv">
                                                @if($myBanks->count())
                                                    <table class="reponsive data table table-striped no-margin">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">#</th>
                                                                <th>Bank</th>
                                                                <th>Account No.</th>
                                                                <th class="hidden-phone">Account Name</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($myBanks as $bank)
                                                                <tr>
                                                                    <form action="{{ route('user.bank.delete',['bank' => $bank->id]) }}" method="POST">
                                                                        @method('patch') @csrf
                                                                        <td class="hidden-xs">{{ $loop->iteration }}</td>
                                                                        <td>{{ $bank->bank_name }}</td>
                                                                        <td>{{ $bank->acc_no }}</td>
                                                                        <td class="hidden-phone">{{ $bank->acc_name }}</td>
                                                                        <td>
                                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                                <i class="fa fa-times"></i>
                                                                            </button>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif
                                                <br/>
                                                <div class="text-center">
                                                    @if(!$myBanks->count())
                                                        <img src="\images/bank.jpeg" class="img-reponsive" alt="">
                                                    @endif
                                                    <button id="addNewBankAccount" class="btn btn-primary btn-rounded margin">
                                                        <i class="fa fa-bank"></i>
                                                        Add {{ $myBanks->count() > 0 ? 'More' : 'New' }} Bank Account
                                                    </button>
                                                </div>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @include('dashboard.layouts.errors')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

    @endsection

    <!-- Modal -->
    <div class="modal fade" id="myRefUrl" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">My Referral Link</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><a href="{{ route('user.register',['referrer' => Auth::user()->wallet_id]) }}#signup"><span class="h3">{{ route('user.register',['referrer' => Auth::user()->wallet_id]) }}#signup</span></a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

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

                $('#addNewBankAccount').click(function(){
                    $('#bankListDiv').hide();
                    $('#newBankDiv').show();
                })

                $('#banks').change(function() {
                    $('#addBank,#accountNameField').hide();
                    $('#resolveBankDetails').show();
                    $('#bankCode').val(JSON.parse($(this).val()).code);
                    $('#bankName').val(JSON.parse($(this).val()).name);
                });

                $('#accountNumber').keyup(function(d){
                    ($(this).val().length >= 10) ? $('#resolveBankDetails').removeAttr('disabled') : $('#resolveBankDetails').attr('disabled',true);
                })


                $('#resolveBankDetails').click(function(e){
                    e.preventDefault();
                    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') } });
                    $('.overlay').show();
                    let timeOut = setTimeout(function(){ notifyError(); },10000);
                    $.ajax({
                        type:'POST',
                        url:'{{ route("paystack.bankDetails") }}',
                        data:{ bankCode : JSON.parse($('#banks').val()).code, bankName : JSON.parse($('#banks').val()).name, accountNumber : $('#accountNumber').val() },
                        success:function(data){
                            //console.log(data);
                            clearTimeout(timeOut);
                            data ? addBank(data) : notifyError();
                        }
                    });

                    function addBank(data){
                        $('#accountName').val(data.data.account_name);
                        $('#resolveBankDetails,.overlay').hide();
                        $('#accountNameField,#addBank').show();
                    }

                    function notifyError(){
                        $('#modal-content').text('Invalid acccount details');
                        $('#error-modal').modal('show');
                        $('.overlay').hide();
                    }
                });

                $('a[href="' + window.location.hash + '"]').click();

            });

        </script>
    @endSection
