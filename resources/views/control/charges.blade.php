@extends('dashboard.layouts.master')

    @section('title') Charge Settings @endSection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <h3 class="box-title">Bulk Sms Charges Settings</h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-small-font table-bordered table-striped">
                                <thead class="bg-green">
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


                <div class="box-content">
                    <h3 class="box-title">Service Charges Setings</h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-small-font table-bordered table-striped">
                                <thead class="bg-green">
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
                            @include('dashboard.layouts.errors')
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.content -->
    @endSection

