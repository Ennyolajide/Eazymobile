@extends('dashboard.layouts.master')

    @section('title') Bitcoin Transactions @endsection

    @section('content-header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Bitcoin Transactions</h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Bitcoin Transactions</li>
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
                            <h3 class="box-title">Bitcoin Transaction</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="transactions-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
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
                                            return $status === NULL ? 'Pending' : $array[$status];
                                        }
                                    @endphp

                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td class="hidden-xs">{{ $transaction->reference }}</td>
                                            <td>
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
                                <tfoot>
                                    <tr>
                                        <th class="hidden-xs">Reference</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th class="hidden-xs">Date</th>
                                        <th >Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="col-md-12 col-xs-12">
                                @php $paginator = $transactions; @endphp
                                <span class="hidden-xs text-bold" style="font-size:16px;">
                                    {{ $transactions->firstItem() }} - {{ $transactions->lastItem() }}/{{ $transactions->total() }}
                                </span>
                                <span class="pull-right">
                                    @include('dashboard.layouts.pagination')
                                </span>
                            </div>
                            @include('dashboard.layouts.errors')
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
    @endSection

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
                            @if($transaction->class->transaction_type < 3)
                                <div class="col-md-3 col-xs-3 col-xs-offset-1 col-md-offset-1">
                                    <img class="img-responsive block-center"  style="height:50px;" src="\images/coins/bitcoin.png">
                                    <span class="text-purple text-bold">@dollar($transaction->class->amount)</span>
                                </div>
                                <div class="col-md-3 col-xs-3 text-center">
                                    <i class="fa fa-arrow-right fa-2x" style="height:40px;"></i>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <img class="img-responsive block-center"  style="height:50px;" src="\images/{{ $transaction->class->transaction_type == 1 ? 'wallet.png' :  'bank.png' }}">
                                    <span class="text-success text-bold">@naira($transaction->class->amount * $transaction->class->rate)</span>
                                    <p class=""><b>{{ $transaction->user->name }}</b></p>
                                </div>
                            @endif

                            @if($transaction->class->transaction_type == 3)
                                <div class="col-md-3 col-xs-3 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
                                    <img class="img-responsive block-center"  style="height:50px;" src="\images/wallet.png">
                                    <span class="text-purple text-bold">@naira($transaction->class->amount * $transaction->class->rate)</span>
                                    <p class=""><b>{{ $transaction->user->name }}</b></p>
                                </div>
                                <div class="col-md-3 col-xs-3 text-center">
                                    <i class="fa fa-arrow-right fa-2x" style="height:40px;"></i>
                                </div>
                                <div class="col-md-5 col-xs-5">
                                    <img class="img-responsive block-center"  style="height:50px;" src="\images/coins/bitcoin.png">
                                    <span class="text-success text-bold">@dollar($transaction->class->amount)</span>
                                    <p class=""><b>{{ str_limit($transaction->class->wallet, 10, '...') }}</b></p>
                                </div>
                            @endif
                            <br/>
                            <div class="col-md-5 col-xs-5 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small> Before : </small>
                                <p class=""><b>@naira($transaction->balance_before) </b></p>
                            </div>
                            <div class="col-md-5 col-xs-6 col-sm-offset-1 col-md-offset-1">
                                <small>Balance After : </small>
                                <p class=""><b>@naira($transaction->balance_after)</b></p>
                            </div>
                            <div class="col-md-5 col-xs-5 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small> Type : </small>
                                <p class=""><b> {{ $transaction->class->type }} </b></p>
                            </div>
                            <div class="col-md-5 col-xs-6 col-sm-offset-1 col-md-offset-1">
                                <small> Status </small>
                                <p class=""><b> {{ getStatus($transaction->status) }} </b></p>
                            </div>
                            @if($transaction->class->transaction_type == 3)
                                <div class="col-md-11 col-xs-11 text-center">
                                    <small class="text-bold">Payment Status :</small>
                                    <p class="h4"><b> {{ $transaction->class->wallet }} </b></p>
                                </div>
                            @else
                                @php
                                    $result = json_decode($transaction->class->object)->result;
                                @endphp
                                <div class="col-md-11 col-xs-11 text-center">
                                    <small class="text-bold">Wallet Address :</small>
                                    <p class="h4"><b> <a href="{{ $result->status_url }}" target="_bank">Check Payment Status</a></b></p>
                                </div>
                            @endif

                            <div class="col-md-11 col-xs-11 text-center">
                                <small class="text-bold">Transaction Reference :</small>
                                <p class="h4"><b> {{ $transaction->reference }} </b></p>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        @if($transaction->status == 1)
                            @if($transaction->class->transaction_type < 3)
                                <form method="POST" action="{{ route('admin.bitcoins.fundings',['trans' => $transaction->id] ) }}">
                            @else
                                <form method="POST" action="{{ route('admin.bitcoins.edit',['trans' => $transaction->id] ) }}">
                            @endif
                                @method('patch') @csrf
                                <button type="submit" name="decline" class="btn btn-danger pull-left">Deline</button>
                                <button type="submit" name="completed" class="btn btn-primary">Completed</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->
    @endforeach
