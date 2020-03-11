@extends('dashboard.layouts.master')

    @section('title')Fund Wallet @endsection

    @section('content-header')
        <section class="content-header">
            <h1>Fund Wallet</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="active">Fund Wallet</li>
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
                            <h3 class="box-title">Fund Wallet</h3>

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
                                        <form id="fund-wallet-form" class="form-horizontal" method="post">
                                            @csrf
                                            <div class="bitcoin-components" style="display:none;">
                                                <p class="h4 text-danger text-center">$1 = @naira($bitcoinRate)</p>
                                                <input type="hidden" name="funding">
                                            </div>
                                            <br/>
                                            <div id="atmBankBitcoin-form">
                                                <div class="form-group" id="gateway-type">
                                                    <label for="inputWallet" class="col-sm-3 col-xs-12 control-label">Payment Method</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <select class="form-control" id="gateway" name="gateway" required>
                                                            <option value="" disabled selected>Select gateway Method</option>
                                                            @foreach ($gateways as $gateway)
                                                                <option value="{{ $gateway->id }}">
                                                                    {{ $gateway->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <p class="help-block text-olive">Select your desired payment method</p>
                                                    </div>

                                                </div>
                                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                            </div>
                                            <div id="amount-field" style="display:none;">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label">Amount</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping" style="margin-bottom: 5px;">
                                                        <input type="text" class="form-control" name="amount" placeholder="Enter amount you want to fund" required>
                                                        <p id="atm-component" class="help-block text-olive" style="display:none;">
                                                            Payment Advice : Use Bank transfer option for payment above ₦2499
                                                            as payment above ₦2499 will attract ₦100 charges
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div id="bank-transfer" style="display:none;">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label">Depositor</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <input type="text" class="form-control" name="depositor" value="" required>
                                                        <p class="help-block text-olive">Enter depositor name or account name.</p>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="chooseBank">
                                                    <label class="col-sm-3 col-xs-12 control-label">Bank</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <select class="form-control" id="bank" required>
                                                            <option value="" disabled selected>Select Our Bank </option>
                                                            @foreach ($banks as $item)
                                                                <option value="{{ $loop->index }}">
                                                                    {{ $item->bank_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" id="bankId" name="bankId"/>
                                                        <p class="help-block text-olive">Bank to transfer to</p>
                                                    </div>

                                                    <div class="col-sm-9 col-sm-offset-3 col-xs-12 ">
                                                        <div class="radio" style="display:none; border: 2px solid #605ca8;">
                                                            <p class="text-center well no-shadow" style="margin:-6px 0px 0px 0px; padding: 2px 7px;">
                                                                <span class="bankName"></span><br/>
                                                                <strong><span class="accNo"></span></strong><br/>
                                                                <span class="accName"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label">Reference (optional)</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <input type="text" class="form-control" name="reference" value="">
                                                        <p class="help-block text-olive">Enter reference / teller</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label">Remarks (optional)</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <textarea name="remarks" class="form-control" style="height: 80px"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="airtime-form" style="display:none;">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label" >Network</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <div id="percentages" data-networks="{{ $networks }}" class="form-grouping">
                                                            <select class="form-control" name="network" id="network">
                                                                <option value="" disabled selected>Choose Network</option>
                                                                @foreach ($networks as $network)
                                                                    <option value="{{ $loop->index }}">
                                                                        {{ $network->network }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <p class="help-block text-olive">Select the network you want to fund with.</p>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="selectedNetwork" name="selectedNetwork">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label">Phone Number</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <input type="text" class="form-control" name="swapFromPhone" required>
                                                        <p class="help-block text-olive">The phone number you want to transfer the airtime from.</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label">Amount</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <input type="text" id="airtimeAmount" class="form-control" name="airtimeAmount" disabled="true">
                                                        <p class="help-block text-olive">Enter amount you want to fund.</p>
                                                        <p class="help-block text-danger" id="amount-info"></p>
                                                    </div>
                                                </div>
                                                <div id="wallet-amount" class="form-group" style="display:none;">
                                                    <label class="col-sm-3 col-xs-12 control-label">Amount To Wallet</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <input id="wallet_amount" type="text" class="form-control" name="wallet_amount" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="bitcoin-component" style="display:none;">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label">Amount To Wallet</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <input type="text" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="ecard-form" style="display:none;">
                                                <br/>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Voucher Pin</label>
                                                    <div class="col-sm-9 form-grouping">
                                                        <input type="text" class="form-control" name="voucher">
                                                        {{-- <p class="help-block text-olive">Enter the Voucher Pin</p> --}}
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-6 col-sm-offset-3 bitcoin-components" style="display:none;">
                                                    <img src="https://www.coinpayments.net/images/pub/buynow-grey.png" class="img-responsive hidden-xs" width="270" height="90">
                                                </div>
                                                <div class="col-sm-3 col-xs-12 pull-right">
                                                    <br/>
                                                    <button id="submit" class="btn btn-success btn-rounded pull-right">Continue</button>
                                                </div>
                                                <br/>
                                                <div class="col-sm-12 col-xs-12 bitcoin-components" style="display:none;">
                                                    <img src="https://www.coinpayments.net/images/pub/buynow-grey.png" class="mx-auto visible-xs" width="270" height="90">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <br/>
                            </section>
                        </div>
                    </div>

                    @include('dashboard.layouts.box-footer')
                </div>
            </div>
        </section>

    @endSection

    @if(session('modal'))
    <!-- Modal -->
        @if(session('modal')->name == 'AirtimeFunding')
            <!-- AirtimeToWallet-Modal -->
            @php $imgSrc = "\images/networks/".session('modal')->swapFromNetwork.".png"; @endphp
            <div id="response-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Airtime To Wallet</h4>
                        </div>
                        <div class="modal-body">
                            <p class="h3 text-center text-success"><i class="fa fa-check"></i>You are almost there</p>
                            <section class="content">

                                <h4 class="text-justify text-info">
                                    To complete the Airtime wallet funding Send @naira(session('modal')->amount) airtime from
                                    {{ session('modal')->swapFromPhone }} to any of the {{ ucfirst(session('modal')->swapFromNetwork) }}
                                    numbers listed below  and then click the completed button
                                </h4>
                                <ul class="list-inline h3 text-center text-primary">
                                    @foreach (session('modal')->recipients as $recipient)
                                        <li>{{ $recipient }} </li>
                                    @endforeach
                                </ul>
                                <p class="hidden-xs h4 text-center">
                                    <img class="rounded icon-size" src="{{ $imgSrc }}"/> Transfer code
                                    <i class="fa fa-arrow-right"></i>
                                    <span class="text-primary text-bold">{{ session('modal')->transferCode }}</span>
                                </p>
                                <p class="visible-xs h4 text-center ">
                                    <p class="visible-xs h4 text-center"> Transfer code</p>
                                    <p class="text-center visible-xs"><i class="fa fa-arrow-down fa-2x"></i></p>
                                    <p class="text-primary text-center text-bold visible-xs h4">{{ session('modal')->transferCode }}</p>
                                </p>
                                <p class="h4 text-center text-danger">
                                    You will receive @naira(session('modal')->walletAmount) in your wallet within 5 - 15mins
                                </p>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('wallet.fund.airtime.completed', ['airtimeRecord' => session('modal')->airtimeRecordId ]) }}" method="post">
                                @csrf @method('patch')
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Completed</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /AirtimeToWallet-Modal -->
        @elseif(session('modal')->name == 'BankTransfer'))
            <!-- BankTransfer-Modal -->
            <div id="response-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Bank Transfer </h4>
                        </div>
                        <div class="modal-body">
                            <p class="h3 text-center text-success"><i class="fa fa-check"></i>You are almost there</p>
                            <section class="content">

                                <h4 class="text-justify text-primary">
                                    To complete the bank wallet funding transfer/deposit @naira(session('modal')->amount)
                                    to the bank Details below and then click the completed button
                                </h4>

                                <ul class="list h3 text-center text-olive" style="list-style-type: none;">
                                    <li> Depositor : {{ session('modal')->depositor }} </li>
                                    @if(session('modal')->reference)
                                        <li> Reference : {{ session('modal')->reference }} </li>
                                    @endif
                                    @if(session('modal')->remarks)
                                        <li> Remarks : {{ session('modal')->remarks }} </li>
                                    @endif
                                </ul>

                                <p class="text-center"><i class="fa fa-arrow-down fa-2x"></i></p>

                                <div class="radio" style="border: 2px solid #605ca8;">
                                    <p class="text-center well no-shadow" style="margin:-6px 0px 0px 0px; padding: 2px 7px;">
                                        <span >{{ session('modal')->bank->bank_name }}</span><br/>
                                        <strong><span class="text-primary">{{ session('modal')->bank->acc_no }}</span></strong><br/>
                                        <span class="">{{ session('modal')->bank->acc_name }}</span>
                                    </p>
                                </div>

                                <p class="h4 text-center text-danger">
                                    You will receive @naira(session('modal')->amount) in your wallet within 5 - 15mins
                                </p>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('wallet.fund.bank.completed', ['bankTransferRecord' => session('modal')->record->id ]) }}" method="post">
                                @csrf @method('patch')
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Completed</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /AirtimeToWallet-Modal -->
        @endif
        <!-- /Modal -->
    @endif

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

                $('#gateway').change(function() {
                    var gateway = $('#gateway').val();
                    let limit;
                    console.log(gateway);
                    if(gateway == 1){
                        $('#fund-wallet-form').validate().destroy();
                        $('#atmBankBitcoin-form,#amount-field,#atm-component').show();
                        $('#ecard-form,#airtime-form,#bank-transfer,#bitcoin-component,.bitcoin-components').hide();
                        $('#fund-wallet-form').attr('action','{{ route("paystack.pay") }}');
                        limit = validateCardFunding([{{ config('constants.fundings.paystack.min') }},{{ config('constants.fundings.paystack.max') }}]);
                    }else if(gateway == 2){
                        $('#atm-component,#ecard-form,#airtime-form,bitcoin-component,.bitcoin-components').hide();
                        $('#fund-wallet-form').validate().destroy();
                        limit = validateBankTransfer([1000, 50000]);
                        $('#atmBankBitcoin-form,#amount-field,#bank-transfer').show();
                        $('#fund-wallet-form').attr('action','{{ route("wallet.fund.bank") }}').attr('novalidate',true);
                    }else if(gateway == 3){//airtime
                        $('#fund-wallet-form').attr('action',"{{ route('wallet.fund.airtime') }}");
                        $('#amount-field,#atm-component,#ecard-form,#bank-transfer,.bitcoin-components').hide();
                        $('#airtime-form').show();
                        $('#network').change(function(){
                            $('#wallet-amount').hide();
                            $('#airtimeAmount').val('');
                            $('#selectedNetwork').val($(this).val());
                            $('#airtimeAmount').removeAttr('disabled');
                            network = @json($networks).splice(($(this).val()),1)[0];
                            $('#selectedNetwork').val(network.id);
                            limit = [ network.airtime_to_cash_min, network.airtime_to_cash_max ];
                            $('#airtimeAmount').closest('.form-grouping').removeClass('has-error');
                            $('#amount-info').text(`Minimum of ₦${limit[0]}, Maximum of ₦${limit[1]} for ${network.network}`).show();
                        });
                        $('#airtimeAmount').keyup(function(){
                            let amount = $('#airtimeAmount').val()
                            $('#fund-wallet-form').validate().destroy();
                            let network = $('#percentages').data('networks')[$('#network').val()];
                            amount.length ? $('#wallet-amount').show() : $('#wallet-amount').hide();
                            validateAirtimeFunding([network.airtime_to_cash_min, network.airtime_to_cash_max ]);
                            amount.length ? $('#wallet_amount').val(network['airtime_to_cash_percentage'] / 100 * amount) : false;
                        });
                        $('#fund-wallet-form').validate({
                            rules: { network : { required: true }, swapFromPhone: { required: true, number: true } , },
                            messages: {
                                network : { required: "Please choose a network" },
                                swapFromPhone: { required: "Please enter phone number.", number:  "Valid phone numbers only ", },
                            }
                        });

                    }else if(gateway == 4){
                        $('#bank-transfer,#atm-component,#ecard-form,#airtime-form').hide();
                        $('#atmBankBitcoin-form,#amount-field,.bitcoin-components').show();
                        $('#fund-wallet-form').attr('action','{{ route("wallet.fund.bitcoin") }}');
                        $('#amount-field').find('input').keyup(function(){
                            $('#fund-wallet-form').validate().destroy();
                            $(this).val().length ? $('#bitcoin-component').show() : $('#bitcoin-component').hide();
                            validateBitcoinFunding(["{{ config('constants.bitcoin.funding.min') }}","{{ config('constants.bitcoin.funding.max') }}"]);
                            $(this).val().length ? $('#bitcoin-component').find('input').val("{{ $bitcoinRate }}" * $(this).val()) : false;
                        });
                    }else if(gateway == 5){
                        $('#ecard-form').show();
                        $('#amount-field,#atm-component,#airtime-form,#bank-transfer,#bitcoin-component,.bitcoin-components').hide();
                        $('#fund-wallet-form').validate().destroy();
                        limit = validateVoucherFunding($('#fund-wallet-form'));
                        $('#fund-wallet-form').attr('action','{{ route("wallet.fund.voucher") }}');
                    }else{
                        $('#fund-wallet-form').validate().destroy(); location.reload(true);
                    }
                });

                $('#chooseBank').change(function(){
                    let banks = @json($banks);
                    let bankDetails = banks[ $('#bank').val() ];
                    $('#bankId').val(bankDetails.id);
                    $('.radio').find('.bankName').text(bankDetails.bank_name);
                    $('.radio').find('.accNo').text(bankDetails.acc_no);
                    $('.radio').find('.accName').text(bankDetails.acc_name);
                    $('.radio').show();
                });
            });

        </script>

        <script>
            let validateAirtimeFunding = (limit) => {
                $('#fund-wallet-form').validate({
                    rules: {
                        airtimeAmount: { required: true, number: true, range: limit },
                        network : { required: true }, swapFromPhone: { required: true, number: true } ,
                     },
                    messages: {
                        network : { required: "Please choose a network" },
                        airtimeAmount: {
                            required: "Please enter amount.", number: "Please enter a valid amount",
                            range: jQuery.validator.format("Minimum of ₦{0} Maximum of ₦{1}"),
                        },
                        swapFromPhone: { required: "Please enter phone number.", number:  "Valid phone numbers only ", },
                    }
                });
                return limit
            }

            let validateBankTransfer = (limit) => {
                $('#fund-wallet-form').validate({
                    rules: { amount: { required: true, range: limit } },
                    messages: { amount: { required: "Please enter amount.", range: jQuery.validator.format("Minimum of ₦{0} Maximum of ₦{1}"),}}
                });
                return limit
            }

            let validateCardFunding = (limit) => {
                $('#fund-wallet-form').validate({
                    rules: { amount: { required: true, range: limit } },
                    messages: { amount: { required: "Please enter amount.", range: jQuery.validator.format("Minimum of ₦{0} Maximum of ₦{1}"),}}
                });
                return limit
            }

            let validateBitcoinFunding = (limit) => {
                $('#fund-wallet-form').validate({
                    rules: { amount: { required: true, range: limit } },
                    messages: { amount: { required: "Please enter amount.", range: jQuery.validator.format("Minimum of ${0} Maximum of ${1}"),}}
                });
                return limit
            }

            let validateVoucherFunding = ([]) => {
                $('#fund-wallet-form').validate({
                    rules: { voucher: { required: true, minlength: 16, maxlength: 20 } },
                    messages: {
                        voucher: {
                            required: "Please enter the Voucher pin.",
                            minlength: jQuery.validator.format("Minimum of {0} characters required."),
                            maxlength: jQuery.validator.format("Maximum {0} characters.")
                        }
                    }
                });
                return [];
            }


        </script>
    @endSection
