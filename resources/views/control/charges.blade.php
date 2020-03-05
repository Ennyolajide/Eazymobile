@extends('dashboard.layouts.master')

    @section('title') Charge Settings @endSection

    @section('content-header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Configuration <small>Settings</small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Configuration</a></li>
                <li class="active">Settings</li>
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
                            <h3 class="box-title">Bulk Sms Settings</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped table-hover table-bordered table-responsive">
                                <thead class="bg-blue">
                                    <tr>
                                        <th>id</th>
                                        <th>&nbsp;&nbsp;Route &nbsp;&nbsp;&nbsp;</th>
                                        <th>Amount(₦)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($smsConfigs as $item)
                                        <form action="{{ route('admin.sms.config.edit', ['route' => $item->id])  }}"method="POST">
                                            @method('patch') @csrf
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->route }}</td>
                                                <td><input type="text" style="max-width: 50px;" name="amount" value="{{ $item->amount_per_unit / 100 }}" required></td>
                                                <td><button type="submit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button></td>
                                            </tr>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                        <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Service Charges Setings</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @include('dashboard.layouts.errors')
                            <table class="table table-striped table-hover table-bordered table-responsive">
                                <thead class="bg-blue">
                                    <tr>
                                        <th>id</th>
                                        <th>Service</th>
                                        <th>Amount(₦)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($charges as $item)
                                        <form action="{{ route('admin.charges.config.edit', ['service' => $item->id])  }}"method="POST">
                                            @method('patch') @csrf
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->service }}</td>
                                                <td><input type="text" style="max-width: 50px;" name="amount" value="{{ $item->amount }}" required></td>
                                                <td><button type="submit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button></td>
                                            </tr>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    @endSection

