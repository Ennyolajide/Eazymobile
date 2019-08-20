@extends('dashboard.layouts.master')

    @section('title') Configuration @endsection


    @section('content')
        <!-- Main content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <h3 class="box-title">Settings</h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <fieldset>
                                <legend>
                                    Data Plans
                                </legend>
                                <div class="row">
                                    @foreach ($networks as $item)
                                        <div class="col-sm-3 col-xs-3 cursor text-center">
                                            <a href="{{ route('admin.dataplan', ['network' => $item->id ]) }}">
                                                <img src="\images/networks/{{ strtolower($item->network).'.png' }}" class="img-thumbnail" style="max-height: 50px; display:inline-block;">
                                                <p class="text-bold">{{ $item->network }}</p>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                            <hr>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <fieldset>
                                <legend>
                                    Bills
                                </legend>

                                    @foreach($bills as $item)
                                        <div class="col-sm-3 col-xs-3 cursor text-center">
                                            <a href="{{ route('admin.bills.config', ['product' => $item->id]) }}">
                                                <img src="\images/bills/{{ strtolower($item->logo) }}" class="img-thumbnail" style="max-height: 50px; display:inline-block;">
                                                <p class="text-bold">{{ $item->name }}</p>
                                            </a>
                                        </div>
                                    @endforeach
                            </fieldset>
                            <hr>
                            <br/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <fieldset>
                                <legend>
                                    Airtime
                                </legend>
                                <div class="row">
                                    @foreach ($networks as $item)
                                        <div class="col-sm-3 col-xs-3 cursor text-center">
                                            <a href="{{ route('admin.airtime.config') }}">
                                                <img src="\images/networks/{{ strtolower($item->network).'.png' }}" class="img-thumbnail" style="max-height: 50px; display:inline-block;">
                                                <p class="text-bold">{{ $item->network }}</p>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                            <hr>
                            <br/>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <fieldset>
                                <legend>
                                    Others
                                </legend>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-4 text-center">
                                        <a href="{{ route('admin.charges.config') }}"><i class="fa fa-envelope fa-3x"></i></a>
                                        <p class="">SMS</p>
                                    </div>
                                    <div class="col-sm-4 col-xs-4 text-center">
                                        <a href="{{ route('admin.charges.config') }}"><i class="fa fa-money fa-3x"></i></a>
                                        <p class="">Charges</p>
                                    </div>
                                    <div class="col-sm-4 col-xs-4 text-center">
                                        <a href="{{ route('admin.charges.config') }}"><i class="fa fa-bank fa-3x"></i></a>
                                        <p class="">Banks</p>
                                    </div>
                                </div>

                            </fieldset>
                            <hr>
                            <br/>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    @include('dashboard.layouts.errors')
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.content -->

    @endSection


