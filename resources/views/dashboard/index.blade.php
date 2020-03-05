@extends('dashboard.layouts.master')

    @section('title')
        Dashbaord
    @endSection

    @section('css')
        <!-- Toastr -->
	    <link rel="stylesheet" href="\plugins/toastr/toastr.css">
    @endsection

    @section('content-header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            </ol>
        </section>
    @endSection


    @section('content')
        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Transactions</span>
                            <span class="info-box-number">{{ $transactions->count() }}<small></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Referrals</span>
                            <span class="info-box-number">{{ Auth::user()->referrals->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-android-notifications"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Notifications</span>
                            <span class="info-box-number" id="unread_messages"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-cash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Balance</span>
                            <span class="info-box-number">@naira(Auth::user()->balance)</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Purchases | <small>Recent Transactions</small></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <div class="box-content">
                                        <table class="table table-striped margin-bottom-10">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="hidden-xs">Reference</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th class="hidden-xs">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    function getStatus($status){
                                                        $array = ['Declined','Pending','Success','Canceled'];
                                                        return $status ? $array[$status] : 'Decline';
                                                    }
                                                @endphp

                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td class="hidden-xs">{{ str_limit($transaction->reference, 10, '...') }}</td>
                                                        <td class="text-right">
                                                            @if($transaction->class_type == 'App\CoinTransaction')
                                                                @dollar($transaction->amount)
                                                            @else
                                                                @naira($transaction->amount)
                                                            @endif
                                                        </td>
                                                        <td>{{ $transaction->class->type }}</td>

                                                        <td>{{ getStatus($transaction->status) }}</td>
                                                        <td class="hidden-xs">{{ $transaction->created_at }}</td>
                                                        <td>
                                                        <a href="#" data-toggle="modal" data-target="#{{ $transaction->id }}">
                                                                <i class="fa fa-eye"></i>view
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </section>
    @endSection


    @foreach ($transactions as $transaction)
        <!-- Modal -->
        <div id="{{ $transaction->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger"aria-hidden="true">X</span>
                    </button>
                <h4 class="modal-title">View transaction</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="font-size: 20px;">
                        <div class="col-md-5 col-xs-11  col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Transaction Reference :</small>
                            <p class=""><b><small> {{ $transaction->reference }}</small></b></p>
                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Transaction Type : </small>
                            <p class=""><b> {{ $transaction->class->type }} </b></p>

                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                        <small>Transaction Amount : </small>
                            <p class="">
                                <b>
                                    @if($transaction->class_type == 'App\CoinTransaction')
                                        @dollar($transaction->amount)
                                    @else
                                        @naira($transaction->amount)
                                    @endif
                                </b>
                            </p>
                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small> Before : </small>
                            <p class=""><b>@naira($transaction->balance_before) </b></p>
                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Balance After : </small>
                            <p class=""><b>@naira($transaction->balance_after)</b></p>
                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Transaction Status </small>
                            <p class=""><b> {{ getStatus($transaction->status) }} </b></p>
                        </div>


                    </div>
                </div>
                <!--div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div-->
            </div>

            </div>
        </div>
        <!-- /Modal -->
    @endforeach


    @section('scripts')
        <!-- Toastr -->
	    <script src="\plugins/toastr/toastr.min.js"></script>
        <!--script src="\js/toastr.demo.min.js"></script-->

        <script>
            setTimeout(function(){
                $('#toast-container').fadeIn();
            }, 1000);
            setTimeout(function(){
                $('#toast-container').hide();
            }, 7000);
        </script>

        <script>
            $('#unread_messages').html($('#unread').val());
        </script>

    @endsection

    @if(session('alert'))
        <div id="toast-container" class="toast-top-right">
            <div class="toast toast-success" aria-live="polite" style="">
                <div class="col-xs-8 col-md-9">
                    <div class="toast-title">Welcome</div>
                    <br/>
                    <div class="toast-message text-bold">
                        {{ session('alert')->message }}
                    </div>
                </div>
                <div class="col-xs-4 col-md-3 pull-right">
                    @if(isset(session('alert')->avatar))
                        <img src="{{ session('alert')->avatar }}" class="img-avatar" >
                    @endif
                </div>

            </div>
        </div>
    @endif

