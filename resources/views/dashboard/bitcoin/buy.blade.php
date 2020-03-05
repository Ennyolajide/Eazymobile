@extends('dashboard.layouts.master')

    @section('content-header')
        <section class="content-header">
            <h1>Purchase Bitcoin</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="active">Purchase Bitcoin</li>
            </ol>
        </section>
    @endsection

    @section('content')
        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-purple">
                        <div class="box-header with-border">
                            <h3 class="box-title">Purchase Bitcoin</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <section class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                                        @include('dashboard.layouts.errors')
                                        <div class="row">
                                            <div class="hidden-xs col-sm-3 col-md-3"></div>
                                            <div class="col-xs-9 col-sm-6 col-md-6">
                                                <br/>
                                                <span class="text-danger text-center h4"><strong>Rate : @naira($rate) / $</strong></span>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <img src="\images/coins/bitcoin.png" style="height: 60px; width:50px; margin-right:5px;" class="img-responsive pull-right">
                                            </div>
                                        </div>
                                        <br/>
                                        <form id="bitcoin-purchase-form" class="form-horizontal" action="{{ route('bitcoin.purchase') }}" method="post">
                                            @csrf
                                            <div class="">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Bitcoin Wallet Address</label>
                                                    <div class="col-sm-9 form-grouping">
                                                        <input type="text" class="form-control" name="wallet" placeholder="Please Enter Bitcoin Wallet Address" {{ $rate ? '' : 'disabled' }}>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Amount($)</label>
                                                    <div class="col-sm-9 form-grouping">
                                                        <input type="text" id="amount" class="form-control" name="amount" placeholder="Please Enter Amount($)" {{ $rate ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="hidden-xs col-sm-3 col-md-3"></div>
                                                    <div class="col-xs-12 col-sm-9 col-md-9">
                                                        <h4 class="text-primary text-bold">Naira Equivalet(Payable) : ₦ <span class="localAmount"></span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12 col-sm-12">
                                                    <button type="submit" class="btn btn-success btn-flat pull-right" {{ $rate ? '' : 'disabled' }}>Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                         <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- .box-footer -->
                    @include('dashboard.layouts.box-footer')
                    <!-- /.box-footer -->
                </div>
            </div>
        </section>
    @endSection

    @section('modal')
        <!-- .modal -->
        <div class="modal fade" id="info-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9 col-sm-9 col-xs-10">
                                <h4 class="text-center text-danger">
                                    <i class="block-center fa fa-exclamation-triangle"></i>
                                    &nbsp;&nbsp;
                                    <em>Exchange Rate is not available at the moment</em>
                                </h4>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-2">
                                <h4 class="text-right text-danger">
                                    <button type="button" class="text-danger" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-close text-right"></i>
                                    </button>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endsection

    @section('scripts')
        <script src="\js/jquery-number.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>

        <script>
            $(document).ready(function(){
                const limit = [
                    '{{ config("constants.bitcoin.purchase.min") }}',
                    '{{ config("constants.bitcoin.purchase.max") }}'
                ];
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
                $('#bitcoin-purchase-form').validate({
                    rules: {
                        wallet : {required : true, minlength: 26, maxlength: 35 },
                        amount: { required: true, number: true, range: limit }
                    },
                    messages: {
                        wallet: {
                            required: "Please enter your bitcoin wallet address",
                            minlength: $.validator.format("Minimum of {0} characters required."),
                            maxlength: $.validator.format("Maximum {0} characters.")
                        },
                        amount: {
                            required: "Please enter an amount.",
                            number:  "Please enter a valid amount",
                            range: jQuery.validator.format("Minimum of ${0} Maximum of ${1}"),
                        }

                    }
                });

                $('#amount').keyup(function(){
                    $('.localAmount').text($.number($('#amount').val() * '{{ $rate }}'));
                })



            });

        </script>

        @if(!$rate && !session('notification'))
            <script>
                $(document).ready(function() {
                    $('#info-modal').modal('show');
                });
            </script>
        @endif
    @endSection
