@extends('dashboard.layouts.master')

    @section('title')Profile @endsection

    @section('content-header')
        <section class="content-header">
            <h1>My Profile</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="active">Profile</li>
            </ol>
        </section>
    @endsection

    @section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->
                            <img  class="profile-user-img img-responsive " src="\images/avatar/{{ Auth::user()->avatar ?? 'default.png' }}" alt="User profile picture" title="Change the avatar">
                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center" style="font-size:16px;"><span class="fa fa-envelope">   {{ Auth::user()->email }}</span></p>
                            <p class="text-muted text-center" style="font-size:16px;"><span class="fa fa-phone"> {{ Auth::user()->number }}</span></p>
                            <a data-toggle="modal" href="#myRefUrl"><pre class="btn btn-block bg-purple">Show My Referral Link</pre></a><br/>
                            <a href="#avatar" data-toggle="tab" aria-expanded="false"><pre class="btn btn-block btn-danger disabled">Change avatar</pre></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="" id=""><a href="#personal" id="" data-toggle="tab" aria-expanded="false">Personal</a></li>
                            <li class="active" id=""><a href="#bank" id="" data-toggle="tab" aria-expanded="false">Bank</a></li>
                            <li class="" id=""><a href="#security" id="" data-toggle="tab" aria-expanded="false">Change Password</a></li>
                        </ul>
                        <div class="tab-content">

                            <!-- /.tab-pane 1-->
                            <div class="tab-pane" id="personal">
                                <form class="form-horizontal">
                                    <br/>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" value="{{ Auth::user()->name }}" disabled >
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}" disabled>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="inputNo" class="col-sm-2 control-label">Mobile number</label>

                                        <div class="col-sm-10 form-grouping">
                                            <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->number }}" disabled>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button class="btn btn-danger btn-flat" disabled="true">Submit</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane 1 -->

                            <!-- .tab-pane 2 -->
                            <div class="tab-pane active" id="bank">
                                <div class="row">
                                    <h4 class="text-danger text-center">
                                        <strong>Charges @naira($addBankCharges) Apply </strong>
                                    </h3>
                                    <div class="col-sm-12 col-md-12" style="display:none;" id="newBankDiv">
                                        <form id="add-bank-details-form" class="form-horizontal" action="{{ route('user.bank.store') }}" method="POST">
                                            @csrf
                                            <br/>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Select Bank</label>
                                                <div class="col-sm-10 form-grouping text-bold">
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
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Account Number</label>

                                                <div class="col-sm-10 form-grouping">
                                                    <input type="text" class="form-control" name="accountNumber" id="accountNumber">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="form-group" id="accountNameField"  style="display: none;">
                                                <label class="col-sm-2 control-label">Account Name</label>

                                                <div class="col-sm-10 form-grouping">
                                                    <input  type="text" class="form-control name-input" name="accountName" id="accountName" disabled="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-3">
                                                    <button  id="resolveBankDetails" class="btn btn-danger btn-flat" disabled="true">Proceed</button>
                                                    <button  id="addBank" type="submit" class="btn btn-danger btn-flat" style="display: none;">Submit</button>
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
                            <!-- /.tab-pane 2 -->

                            <!-- .tab-pane 3 -->
                            <div class="tab-pane" id="security">
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
                                            <button type="submit" class="btn btn-danger btn-flat">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane 3 -->
                        </div>
                        <!-- /.nav-tabs-custom -->

                        @include('dashboard.layouts.errors')

                        <!-- .modal -->
                        <div class="modal fade" id="error-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h4 class="text-center text-danger" id="modal-content">
                                                    <i class="block-center fa fa-exclamation-triangle"></i>&nbsp;&nbsp;
                                                    <em id="modal-content"></em>
                                                </h4>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2">
                                                <h4 class="text-right text-danger">
                                                    <button type="button" class="text-danger" data-dismiss="modal" aria-label="Close">
                                                        <i class="fa fa-close text-right"></i>
                                                    </button>
                                                </h4>
                                            </div>
                                        <div>
                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>

        </section>

    @endsection

    <!-- Modal -->
    <div class="modal fade" id="myRefUrl" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span class="text-danger text-bold">X</span></button>
                    <h4 class="modal-title">My Referral Link</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><a href="{{ route('user.register',['referrer' => Auth::user()->wallet_id]) }}"><span class="h3">{{ route('user.register',['referrer' => Auth::user()->wallet_id]) }}#signup</span></a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /Modal-->

    @section('scripts')
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
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
