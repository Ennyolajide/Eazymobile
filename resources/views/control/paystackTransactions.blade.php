@extends('dashboard.layouts.master')

    @section('title') Card Transactions @endsection

    @section('content-header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Payments <small>Paystack</small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Paystack</li>
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
                            <h3 class="box-title">Data Transactions</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <br/>
                            <form action="{{ route('paystack.transaction.query') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-xs-3 control-label">Card Payments</label>
                                    <div class="col-sm-9 col-xs-8">
                                        <div class="input-group">
                                            <input type="text" name="reference" class="form-control" placeholder="Enter payment reference......."/>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success btn-rounded">Query Reference</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br/>
                            <table class="table table-small-font table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="hidden-xs">Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $item)
                                        <tr>
                                            <form action="{{ route('paystack.transaction.query') }}" method="post">
                                                @csrf
                                                <td>{{ $item['customer']['email'] }}
                                                <td class="hidden-xs">{{ $item['reference'] }}</td>
                                                <td>@naira(($item['amount'] - $item['fees'])/100)</td>
                                                <td>{{ $item['status'] }}</td>
                                                <td class="hidden-xs">{{ $item['paidAt'] }}</td>
                                                <input type="hidden" name="reference" value="{{ $item['reference'] }}">
                                                <td><button type="submit" class="btn btn-xs btn-primary">Query</button></td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>User</th>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="hidden-xs">Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @include('dashboard.layouts.errors')
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </section>
        <!-- /.content -->
    @endSection
