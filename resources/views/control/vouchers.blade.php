@extends('dashboard.layouts.master')

    @section('title') Voucher Fundings @endsection

    @section('content-header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Voucher <small>Fundings</small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Voucher Funding</li>
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
                            <h3 class="box-title">Voucher Fundings</h3>
                            <span class="pull-right"> &nbsp;&nbsp;&nbsp;<a href="{{ route('admin.voucher.view') }}" class="btn btn-flat btn-info pull-right">Generate New</a></span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
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
                                            <td>{{ $transaction->amount }}</td>
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
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </section>
        <!-- /.content -->
    @endSection

    @foreach ($transactions as $transaction)
        <!-- Modal -->
        <div id="{{ $transaction->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                @php
                    $details = json_decode($transaction->class->details,true);
                @endphp
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">View transaction</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="font-size: 20px;">
                            <div class="col-md-5 col-xs-5 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small>User : </small>
                                <p class="text-olive h4"> {{ str_limit($transaction->user->name, 8, '..') }}</p>
                            </div>
                            <div class="col-md-5 col-xs-6 col-sm-offset-1 col-md-offset-1">
                                <small>Type : </small>
                                <p class="text-olive h4"> {{ $transaction->class->type}} </p>
                            </div>
                            <div class="col-md-5 col-xs-5 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small> Amount : </small>
                                <p class=""><b>@naira($transaction->amount)</b></p>
                            </div>
                            <div class="col-md-5 col-xs-6 col-sm-offset-1 col-md-offset-1">
                                <small> Status </small>
                                <p class=""><b> {{ getStatus($transaction->status) }} </b></p>
                            </div>
                            <div class="col-md-5 col-xs-5 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small> Before : </small>
                                <p class=""><b>@naira($transaction->balance_before) </b></p>
                            </div>
                            <div class="col-md-5 col-xs-6 col-sm-offset-1 col-md-offset-1">
                                <small>Balance After : </small>
                                <p class=""><b>@naira($transaction->balance_after)</b></p>
                            </div>
                            <div class="col-md-11 col-xs-11 text-center">
                                <p class="text-bold">Transaction Reference :</p>
                                <p class="h4"><b> {{ $transaction->reference }} </b></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->
    @endforeach
