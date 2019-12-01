@extends('dashboard.layouts.master')

    @section('title')Transactions @endsection

    @section('css')
        <!-- Data Tables -->
        <link rel="stylesheet" href="\plugins/datatables/media/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="\plugins/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
    @endsection


     @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <h3 class="box-title">My Transcations</h2>
                    <div>
                        <table id="transactions-table" class="table table-bordered">
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
                                    function getStatus($transaction){
                                        $array = ['Declined','Pending','Success','Canceled'];
                                        $status = $transaction->status === NULL ? 'Pending' : $array[$transaction->status];
                                        if($transaction->class->type == 'Data Topup'){
                                            $status = $transaction->class->network == '9mobile Gifting' ? $status : str_replace('Pending', 'Success', $status);
                                        }
                                        return $status;

                                    }
                                @endphp

                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="hidden-xs">{{ str_limit($transaction->reference, 10, '...') }}</td>
                                        <td class="">@naira($transaction->amount)</td>
                                        <td><small>{{ $transaction->class->type }}</small></td>

                                        <td>{{ getStatus($transaction) }}</td>
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
                        <div class="col-md-12 col-xs-12">
                            @php $paginator = $transactions; @endphp
                            <span class="hidden-xs text-bold" style="font-size:16px;">
                                {{ $transactions->firstItem() }} - {{ $transactions->lastItem() }}/{{ $transactions->total() }}
                            </span>
                            <span class="pull-right">
                                @include('dashboard.layouts.pagination')
                            </span>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.box-footer')
            </div>
            <!-- /.box -->
        </div>
        <!-- /.row -->
      <!-- /.content -->

    @endSection

    @foreach ($transactions as $transaction)
        <!-- Modal -->
        <div id="{{ $transaction->id }}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">View transaction</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="font-size: 20px;">
                            <div class="col-md-5 col-xs-11  col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small>Transaction Type : </small>
                                <p class=""><b> {{ $transaction->class->type }}  </b></p>
                            </div>
                            <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                                <small>Transaction {{ $transaction->class->type == 'Data Topup' ? 'Object' : 'Method' }} </small>
                                <p class="">
                                    <b>{{ $transaction->class->type == 'Data Topup'
                                            ? $transaction->class->phone : $transaction->method }}
                                    </b>
                                </p>
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
                                <p class=""><b> {{ getStatus($transaction) }} </b></p>
                            </div>
                            <div class="col-md-12 col-xs-12 text-center">
                                <small>Transaction Reference </small>
                                <p class="" style="font-size: 15px;"><b> {{ $transaction->reference }} </b></p>
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


    @endSection
