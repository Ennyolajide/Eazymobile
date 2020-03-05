@extends('dashboard.layouts.master')

    @section('title')
        Airtime Settings
    @endsection

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
                            <h3 class="box-title">Airtime Setings</h3>
                            <div class="row">
                                @include('dashboard.layouts.errors')
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-small-fonttable-bordered table-striped">
                                        <thead class="bg-blue">
                                            <tr>
                                                <th class="hidden-xs">id</th>
                                                <th>Network</th>
                                                <th>Swap %</th>
                                                <th>Topup %</th>
                                                <th class="hidden-xs">Transfer Code</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($networks as $item)
                                                <tr>
                                                    <td class="hidden-xs">{{ $item->id }}</td>
                                                    <td><img src="\images/networks/{{ strtolower($item->network).'.png'  }}" style="max-height: 50px; display:inline-block;"></td>
                                                    <td>{{ $item->airtime_swap_percentage }}%</td>
                                                    <td>{{ $item->airtime_topup_percentage }}%</td>
                                                    <td class="hidden-xs text-primary">{{ $item->transfer_code }}</td>
                                                    <td><a href="" data-toggle="modal" data-target="#{{ $item->id }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    @endSection

    @foreach ($networks as $item)
        <!--Modal-->
        <div id="{{ $item->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                            Edit {{ $item->network }} settings
                            <img src="\images/networks/{{ strtolower($item->network).'.png'  }}" style="max-height: 40px; display:inline-block;">
                        </h4>
                    </div>
                    <form method="POST" action="{{ route('admin.airtime.config.edit',['network' => $item->id ] ) }}">
                        @method('patch') @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">

                                    <label>
                                        Swap
                                        <div class="switch pink"><input type="checkbox" name="swapStatus" {{ $item->airtime_swap_percentage_status ? 'checked' : '' }} id="switch-8"><label for="switch-8"></label></div>
                                    </label>
                                </div>
                                <div class="col-md-5 col-sm-6 col-xs-6">
                                    <label class="pull-right">
                                        Cash
                                        <div class="switch purple"><input type="checkbox" name="cashStatus" {{ $item->airtime_to_cash_percentage_status ? 'checked' : '' }} id="switch-9"><label for="switch-9"></label></div>
                                    </label>
                                </div>

                            </div>
                            <br/>

                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" style="vertical-align: middle;">Swap %</label>
                                        <div class="col-sm-6 form-grouping">
                                            <input type="text" class="form-control" name="percentage" value="{{ $item->airtime_swap_percentage }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Process Time(mins)</label>
                                        <div class="col-sm-6 form-grouping">
                                            <input type="text" class="form-control" name="processTime" value="{{ $item->process_time }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-xs-10 control-label">Airtime Topup %</label>
                                        <div class="col-sm-8 col-xs-12 form-grouping">
                                            <input type="text" class="form-control" name="topupPercentage" value="{{ $item->airtime_topup_percentage }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                @foreach (json_decode($item->airtime_to_cash_phone_numbers) as $swapNumber)
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="col-sm-3 col-xs-12 control-label"><small>Swap Number {{ $loop->iteration }}</small></label>
                                            <div class="col-sm-8 col-xs-12 form-grouping">
                                                <input type="text" class="form-control" name="swapNumber{{ $loop->iteration }}" value="{{ $swapNumber }}" {{ $loop->first ? 'required' : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-xs-12 control-label">Transfer Code </label>
                                        <div class="col-sm-8 col-xs-12 form-grouping">
                                            <input type="text" class="form-control" name="transferCode" value="{{ $item->transfer_code }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  data-dismiss="modal" class="btn btn-danger pull-left">Deline</button>
                            <button type="submit" name="completed" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modal -->
    @endforeach

