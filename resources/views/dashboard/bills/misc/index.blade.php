@extends('dashboard.layouts.master')

    @section('title'){{ $product->name }}@endsection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <h3 class="box-title">Pay {{ $product->name }} Bills</h3>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <h3 class="text-primary text-center"><strong> {{ $product->name }} </strong></h3>
                                    {{-- <h4 class="text-danger text-center"><strong>Charges @naira(0) Apply </strong></h3> --}}
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  pull-right">
                                    <br/>
                                    <img  src="\images/bills/{{ $product->logo }}" class="img-thumbnail">
                                </div>
                            </div>
                            <div id="form1">
                                <form id="misc-bill-form" class="form-horizontal" action="{{ route('bills.misc.topup') }}" method="POST">
                                    @csrf
                                    <br/>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-xs-12 control-label">Package</label>
                                        <div class="col-sm-10 col-xs-12 form-grouping text-bold">
                                            <select style="height: 40px;" class="form-control" id="package" name="package">
                                                <option value="" disabled selected><strong>Choose Package/Plan</strong></option>
                                                @foreach ($product->productList as $subProduct)
                                                    <option value="{{ $subProduct }}">
                                                        {{ $subProduct->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br/>
                                    <div id="amountDiv" class="form-group" style="display:none;">
                                        <label class="col-sm-2 col-xs-12 control-label">Amount</label>
                                        <div class="col-sm-10 col-xs-12 form-grouping">
                                            <input type="text" id="amount" class="form-control" name="amount" disabled="{{ $product->product_list ? 'true' : 'false'  }}">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-xs-12 control-label">Email</label>
                                        <div class="col-sm-10 col-xs-12 form-grouping">
                                            <input type="text" id="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-xs-12 control-label">Phone Number</label>
                                        <div class="col-sm-10 col-xs-12 form-grouping">
                                            <input type="text" id="phone" class="form-control" name="phone" value="{{ Auth::user()->number }}">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <button id="submit" type="submit" class="btn btn-primary btn-rounded pull-right">Submit</button>
                                        </div>
                                    </div>
                                <form>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.layouts.errors')
                </div>
            </div>
        </div>
    @endSection

    @section('scripts')
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#mtnImage,#airtelImage,#gloImage,#9mobileImage').hide();

                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function(element) {
                        $(element)
                            .closest('.form-grouping')
                            .addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element)
                            .closest('.form-grouping')
                            .removeClass('has-error');
                    }
                });

                $('#misc-bill-form').validate({
                    rules: {
                        package: { required: true },
                        amount: { required: true },
                        email: { required: true, email: true, minlength: 7, maxlength: 50 },
                        phone: { required: true, minlength: 10, maxlength: 13 }
                    },
                    messages: {
                        package: { required: 'Pls choose your prefered package' },
                        amount: { required: 'Bill amount cannot be blank' },
                        email: {
                            minlength: $.validator.format("Minimum of {0} characters required."),
                            maxlength: $.validator.format("Maximum {0} characters.")
                        },
                        phone: {
                            minlength: $.validator.format("Minimum of {0} characters required."),
                            maxlength: $.validator.format("Maximum {0} characters.")
                        }
                    }
                });

                $('#package').change(function() {
                    let package = JSON.parse($(this).val());
                    $('#amountDiv').show().find('#amount').val(package.selling_price);
                });
            });

    </script>
    @endSection
