@extends('dashboard.layouts.master')

    @section('content-header')
        <section class="content-header">
            <h1>Transact Bitcoins</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="active">Transact Bitcoins</li>
            </ol>
        </section>
    @endsection

    @section('content')
        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-purple">
                        <div class="box-header with-border">
                            <h3 class="box-title">Transact Bitcoins</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <section class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-7">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 text-center">
                                                <a href="{{ route('bitcoin.buy') }}">
                                                    <img class="img-reponsive" src="\images/coins/buy-button.jpg" style="max-height:150px;">
                                                    <h4 class="text-primary text-bold">Bitcoin : @naira($rates['sell_rate']) / $</h4>
                                                </a>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 text-center">
                                                <a href="{{ route('bitcoin.sell') }}">
                                                    <img class="img-reponsive" src="\images/coins/sell-button.jpg" style="max-height:150px;">
                                                    <h4 class="text-danger text-bold">Bitcoin : @naira($rates['buy_rate']) / $ </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </section>


                        </div>
                    </div>
                     <!-- .box-footer -->
                     @include('dashboard.layouts.box-footer')
                     <!-- /.box-footer -->
                 </div>
                 <!-- /.box -->
            </div>
        </section>
    @endSection

    @section('scripts')

        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>

    @endSection
