@extends('dashboard.layouts.master')

    <style>
        .letter-spacing-2{
            letter-spacing:2px;
        }
        .letter-spacing-1.5{
            letter-spacing:1.5px;
        }
        .letter-spacing-1{
            letter-spacing:1px;
        }
        .blue-border{
            border: solid 1px #00c0ef;
        }

    </style>

    @section('title') Voucher @endsection

    @section('content-header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Vouchers</h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Vouchers</li>
            </ol>
        </section>
    @endSection

    @section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Voucher</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if(empty($vouchers))
                                <section class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                                            @include('dashboard.layouts.errors')
                                            <form id="voucher-generator-form" class="form-horizontal form-prevent-multiple-submits" action="{{ route('admin.voucher.generate') }}" method="post">
                                                @csrf
                                                <br/>
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label" >No. of Voucher(s)</label>
                                                    <div class="col-sm-9 col-xs-12  form-grouping">
                                                        <input type="text" class="form-control" name="number" placeholder="Enter the No of Vouchers to be generated">
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-xs-12 control-label">Amount</label>
                                                    <div class="col-sm-9 col-xs-12 form-grouping">
                                                        <input type="text" class="form-control" name="amount" placeholder="Eneter Voucher amount / value">
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <button  class="btn btn-success btn-flat pull-right button-prevent-multiple-submits">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            @else
                                <div class="row" id="generated-vouchers">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p class="h4 text-center text-primary"><strong>{{ $vouchers->count() }} vouchers generated successfully at {{ date('d M Y H:i:s a') }}</strong>
                                            <button id="print-button" class="btn btn-primary pull-right" onclick="printPdf();"><i class="fa fa-download"></i>Print</button>
                                        </p>
                                        <br/>
                                        @foreach ($vouchers->chunk(4) as $chunk)
                                            <div class="row visible-lg visible-md text-center ">
                                                @foreach ($chunk as $item)
                                                    <div class="col-lg-3 col-md-3 text-center">
                                                        <div class="well well-sm blue-border">
                                                            <p><img class="mx-auto" src="\images/logo.png" style="max-height:30px;"></p>
                                                            <h4 class="letter-spacing-1">PIN : <span class="text-primary letter-spacing-1.5">{{ $item->voucher }}</span></h4>
                                                            <p class="letter-spacing-1.5">Amount : @naira($item->amount)</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        @foreach ($vouchers->chunk(2) as $chunk)
                                            <div class="row visible-sm text-center">
                                                @foreach ($chunk as $item)
                                                    <div class="col-sm-6  text-center">
                                                        <div class="well well-sm blue-border">
                                                            <p><img class="mx-auto" src="\images/logo.png" style="max-height:30px;"></p>
                                                            <h4 class="letter-spacing-1.5">PIN : <span class="text-primary letter-spacing-2">{{ $item->voucher }}</span></h4>
                                                            <p class="letter-spacing-1.5">Amount : @naira($item->amount)</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        @foreach ($vouchers->chunk(1) as $chunk)
                                            <div class="row visible-xs text-center">
                                                @foreach ($chunk as $item)
                                                    <div class="col-xs-12 text-center">
                                                        <div class="well well-sm blue-border">
                                                            <p><img class="mx-auto" src="\images/logo.png" style="max-height:30px;"></p>
                                                            <h4 class="letter-spacing-1.5">PIN : <span class="text-primary letter-spacing-1.5">{{ $item->voucher }}</span></h4>
                                                            <p class="letter-spacing-1.5">Amount : @naira($item->amount)</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
    @endSection

    @section('scripts')
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
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

                $('#voucher-generator-form').validate({
                    rules: {
                        number: { required: true, number: true, range: [1, 20] },
                        amount: { required: true, number: true, range: [100, 100000] },
                    },
                    messages: {
                        number: {
                            required: "Please enter the number of vouchers.",
                            range: jQuery.validator.format("Minimum of {0} voucher Maximum of {1} vouchers"),
                        },
                        amount: {
                            required: "Please enter voucher amount.", number: "Please enter a valid amount",
                            range: jQuery.validator.format("Minimum of ₦{0} Maximum of ₦{1}"),
                        }
                    }
                });

            });

            let printPdf = () => {
                console.log('printed');
                //send the div to PDF
                html2canvas($("#generated-vouchers"), { // DIV ID HERE
                    onrendered: function(canvas) {
                        var imgData = canvas.toDataURL('image/png');
                        var doc = new jsPDF('landscape');
                        doc.addImage(imgData, 'PDF', 10, 10);
                        doc.save("Vochers-{{ date('d-M-Y-H-i-s-a') }}-file.pdf"); //SAVE PDF FILE
                    }
                });
            }
        </script>
    @endsection
