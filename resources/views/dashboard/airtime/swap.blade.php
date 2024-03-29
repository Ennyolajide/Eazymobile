@extends('dashboard.layouts.master')

    @section('content-header')
        <section class="content-header">
            <h1>Airtime Swap</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#" ><i class="fa fa-dashboard"></i> Airtime</a>
                </li>
                <li class="active">Airtime Swap</li>
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
                            <h3 class="box-title">Airtime Swap</h3>

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
                                        <form id="airtime-swap-form" class="form-horizontal" method="post" action="{{ route('airtime.swap') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label hidden-xs">&nbsp;</label>
                                                <div class="col-sm-10 form-grouping">
                                                    <div class="row">
                                                        <div class="swap-from-network-image col-xs-4 col-sm-3 col-md-3 col-lg-3" style="display:none;">
                                                            <img class="img-responsive">
                                                        </div>
                                                        <div class="swap-from-network-image col-xs-4 col-sm-6 col-md-6 col-lg-6 text-center" style="display:none;">
                                                            <br/><br/>
                                                            <i class="fa fa-arrow-right fa-3x"></i>
                                                        </div>
                                                        <div id="swapToNetworkImage" class="col-xs-4 col-sm-3 col-md-3 col-lg-3  pull-right" style="display:none;">
                                                            <img class="img-responsive">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" >Network</label>
                                                <div class="col-sm-10 form-grouping">
                                                    <div id="swap-from-network" data-networks="{{ $networks }}">
                                                        <select class="form-control" name="network" id="network">
                                                            <option value="" disabled selected>Choose Network</option>
                                                            @foreach ($networks as $network)
                                                                <option value="{{ $network->id }}">
                                                                    {{ $network->network }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <p class="help-block">Select the network you want to swap airtime from.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Phone Number</label>
                                                <div class="col-sm-10 form-grouping">
                                                    <input type="text" class="form-control" name="swapFromPhone">
                                                    <p class="help-block">The phone number you want to swap airtime from</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Amount</label>
                                                <div class="col-sm-10 form-grouping">
                                                    <input type="text" id="amount" class="form-control" name="amount" placeholder="Enter amount you want to fund" disabled="true">
                                                    <!--p class="help-block">Enter amount you want to fund.</p-->
                                                    <label id="amount-info" style="font-size:15px; display:none;" class="text-primary" for="amount"></label>
                                                </div>
                                            </div>
                                            <div id="wallet-amount" class="form-group" style="display:none;">
                                                <label class="col-sm-2 control-label">Amount To Wallet</label>
                                                <div class="col-sm-10 form-grouping">
                                                    <input type="text" class="form-control" disabled="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Network</label>
                                                <div class="col-sm-10 form-grouping">
                                                    <div id="swap-to-network" >
                                                        <select class="form-control" name="swapToNetwork" id="swapToNetwork">
                                                            <option value="" disabled selected>Choose Network</option>
                                                        </select>
                                                        <p class="help-block">Select the network you want to swap airtime to.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Phone Number</label>
                                                <div class="col-sm-10 form-grouping">
                                                    <input type="text" class="form-control" name="swapToPhone">
                                                    <p class="help-block">The phone number you want to swap to</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-rounded btn-success form-prevent-multiple-submits pull-right">Swap</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    @include('dashboard.layouts.box-footer')
                    <!-- /.box-footer -->
                </div>
            </div>
        </section>
    @endSection

    @if(session('modal'))
        <!-- /Modal -->
        @php $imgSrc = "\images/networks/".session('modal')->swapFromNetwork.".png"; @endphp
        <div id="response-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Airtime Swap</h4>
                    </div>
                    <div class="modal-body">
                        <p class="h3 text-center text-success"><i class="fa fa-check"></i>Airtime Swap Request Accepted</p>
                        <section class="content">

                            <h4 class="text-justify text-info">
                                To complete the Airtime Swap Send @naira(session('modal')->amount) airtime from
                                {{ session('modal')->swapFromPhone }} to any of the {{ ucfirst(session('modal')->swapFromNetwork) }}
                                numbers listed below and then click the completed button
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
                                <p class="text-primary text-bold visible-xs">{{ session('modal')->transferCode }}</p>
                            </p>
                            <p class="h4 text-center text-danger">
                                You will receive @naira(session('modal')->swapedAmount) on {{ session('modal')->swapToPhone}}
                                within {{ session('modal')->processTime }} minutes
                            </p>
                            <p class="h4 text-center text-danger">
                                Please use/click the Completed button only after you have transfered the airtime to avoid been baned
                            </p>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('airtime.swap.completed', ['airtimeRecord' => session('modal')->airtimeRecordId ]) }}" method="post">
                            @csrf @method('patch')
                            <button type="button" class="btn btn-rounded btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-rounded btn-primary">Completed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->
    @endif

    @section('scripts')

        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function(){

                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function (element) {
                        $(element).closest('.form-grouping').addClass('has-error');
                    },
                    unhighlight: function (element) {
                        $(element).closest('.form-grouping').removeClass('has-error');
                    }
                });



                $('#amount').keyup(function(){
                    let amount = $('#amount').val();
                    let networks = @json($networks);
                    let network = $('#network').val();
                    let returnAmount = networks[(network-1)].airtime_swap_percentage / 100 * amount;
                    amount.length > 2 ? $('#wallet-amount').show().find('input').val(returnAmount) : false;
                });

                $('#network').change(function(){
                    $('.networkList').remove();
                    let network = $(this).val();
                    let networks = @json($networks);
                    $('#amount').removeAttr('disabled');
                    $('#airtime-swap-form').validate().destroy();
                    let fromNetwork = networks.splice((network-1),1)[0];
                    let fromNetworkName = fromNetwork.network.toLowerCase();
                    validateAirtimeSwap([fromNetwork.airtime_to_cash_min, fromNetwork.airtime_to_cash_max]);
                    $('.swap-from-network-image').show().find('img').attr('src', '/images/networks/'+fromNetworkName+'.png');
                    $('#amount-info').text(`Minimum of ₦${fromNetwork.airtime_to_cash_min}, Maximum of ₦${fromNetwork.airtime_to_cash_max} for ${fromNetwork.network} to other networks`).show();
                    $.each(networks,function(i, val){
                        $('#swapToNetwork').append('<option class="networkList">'+val.network+'</option>');
                    });
                })

                $('#swapToNetwork').change(function(){
                    let networkImage = $(this).val().toLowerCase();
                    $('#swapToNetworkImage').show().find('img').attr('src', '/images/networks/'+networkImage+'.png');
                })

                let validateAirtimeSwapDefault = () => {
                    $('#airtime-swap-form').validate({
                        rules: { network: {required : true },},
                        messages: { network: { required: "Please select a network to swap from."} },
                    });
                }


                let validateAirtimeSwap = (limit) => {
                    $('#airtime-swap-form').validate({
                        rules: {
                            network: {required : true },
                            swapFromPhone: { required : true, number : true, minlength:10, maxlength:13 },
                            amount: { required : true, number : true , range : limit },
                            swapToNetwork: { required : true },
                            swapToPhone: { required: true, number : true, minlength:10, maxlength:13}
                        },
                        messages: {
                            network: {
                                required: "Please select a network to swap from.",
                            },
                            swapFromPhone: {
                                required: "Please enter phone number to swap airtime from.",
                                number:  "Valid phone numbers only ",
                                minlength: jQuery.validator.format("Minimum of {0} characters required."),
                                maxlength: jQuery.validator.format("Maximum {0} characters."),
                            },
                            amount: {
                                required: "Please enter swap amount",
                                number : "Invalid swap amount",
                                range: jQuery.validator.format("Minimum of ₦{0} Maximum of ₦{1}"),
                            },
                            swapToNetwork: {
                                required: "Please select a network to swap to",
                            },
                            swapToPhone: {
                                required: "Please enter phone number to swap airtime to.",
                                number:  "Valid phone numbers only ",
                                minlength: jQuery.validator.format("Minimum of {0} characters required."),
                                maxlength: jQuery.validator.format("Maximum {0} characters."),
                            }
                        }
                    });
                }

                validateAirtimeSwapDefault();
            });

        </script>
    @endSection
