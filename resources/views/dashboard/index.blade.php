@extends('dashboard.layouts.master')

    @section('title')
        test
    @endSection

    @section('css')
        <!-- Toastr -->
	    <link rel="stylesheet" href="\plugins/toastr/toastr.css">
    @endsection

    @section('content-header')

    @endSection

    @section('content')
        <!-- top tiles -->

        <div class="row small-spacing">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="box-content bg-success text-white">
                    <div class="statistics-box with-icon">
                        <i class="ico small fa fa-diamond"></i>
                        <p class="text text-white">Transactions</p>
                        <h2 class="counter">{{ $transactions->count() }}</h2>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-lg-3 col-md-6 col-xs-12 -->
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="box-content bg-info text-white">
                    <div class="statistics-box with-icon">
                        <i class="ico small fa fa-download"></i>
                        <p class="text text-white">DOWNLOAD</p>
                        <h2 class="counter">6382</h2>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-lg-3 col-md-6 col-xs-12 -->
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="box-content bg-danger text-white">
                    <div class="statistics-box with-icon">
                        <i class="ico small fa fa-envelope"></i>
                        <p class="text text-white">Notification</p>
                        <h2 class="counter">{{--$unReadMessages->count() --}}</h2>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-lg-3 col-md-6 col-xs-12 -->
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="box-content bg-warning text-white">
                    <div class="statistics-box with-icon">
                        <i class="ico small">₦</i>
                        <p class="text text-white">Balance</p>
                        <h2 class="counter">{{ Auth::user()->balance }}</h2>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-lg-3 col-md-6 col-xs-12 -->
        </div>
        <!-- .row -->
        <div class="row small-spacing">
            <div class="col-lg-4 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">Instructions</h4>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="bar bg-primary">
                                <div class="dot bg-primary"></div>
                                <!-- /.dot -->
                            </div>
                            <!-- /.bar -->
                            <div class="content">
                                <div class="date">MTN</div>
                                <!-- /.date -->
                                <div class="text text-bold">
                                    <img src="\images/networks/mtn.png"  class="inline img-icon">
                                    MTN >> *461*2*3*1#
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.content -->
                        </div>
                        <!-- /.activity-item -->
                        <div class="activity-item">
                            <div class="bar bg-danger">
                                <div class="dot bg-danger"></div>
                                <!-- /.dot -->
                            </div>
                            <!-- /.bar -->
                            <div class="content">
                                <div class="date">9mobile</div>
                                <!-- /.date -->
                                <div class="text text-bold">
                                    <img src="\images/networks/9mobile.png"  class="inline img-icon">
                                    9mobile >> *228#
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.content -->
                        </div>
                        <!-- /.activity-item -->
                        <div class="activity-item">
                            <div class="bar bg-success">
                                <div class="dot bg-success"></div>
                                <!-- /.dot -->
                            </div>
                            <!-- /.bar -->
                            <div class="content">
                                <div class="date">Glo</div>
                                <!-- /.date -->
                                <div class="text text-bold">
                                    <img src="\images/networks/glo.png"  class="inline img-icon">
                                    GLO >> *127*0#
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.content -->
                        </div>
                        <!-- /.activity-item -->
                        <div class="activity-item">
                            <div class="bar bg-violet">
                                <div class="dot bg-violet"></div>
                                <!-- /.dot -->
                            </div>
                            <!-- /.bar -->
                            <div class="content">
                                <div class="date">AIRTEL</div>
                                <!-- /.date -->
                                <div class="text text-bold">
                                    <img src="\images/networks/airtel.png"  class="inline img-icon">
                                    Airtel >> *140#
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.content -->
                        </div>
                    </div>
                    <!-- /.activity-list -->
                    <a href="#" class="activity-link">View all Instructions <i class="fa fa-angle-down"></i></a>
                </div>
            </div>

            <div class="col-lg-8 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">Purchases | <small>Recent Transactions</small></h4>
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
                                    <td class="text-right">@naira($transaction->amount)</td>
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
        <!-- /page content -->

    @endSection

    @section('modals')

        @foreach ($transactions as $transaction)
            <!-- Modal -->
            <div id="{{ $transaction->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View transaction</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="font-size: 20px;">
                            <div class="col-md-5 col-xs-11  col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small>Transaction Reference :</small>
                                <p class=""><b> {{ '7e38yrb8383hnfj8f8' }} </b></p>
                            </div>
                            <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small>Transaction Type : </small>
                                <p class=""><b> {{ $transaction->class->type }} </b></p>

                            </div>
                            <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Transaction Amount : </small>
                                <p class=""><b>@naira($transaction->amount) </b></p>
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
    @endsection


    @section('scripts')
        <!-- Toastr -->
	    <script src="\plugins/toastr/toastr.min.js"></script>
        <!--script src="\js/toastr.demo.min.js"></script-->
        <!-- Sparkline Chart -->
        <script src="\plugins/chart/sparkline/jquery.sparkline.min.js"></script>
        <script src="\js/chart.sparkline.init.min.js"></script>

        <script>
            setTimeout(function(){
                $('#toast-container').fadeIn();
            }, 1000);
            setTimeout(function(){
                $('#toast-container').hide();
            }, 7000);
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

