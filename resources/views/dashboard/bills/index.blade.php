@extends('dashboard.layouts.master')

    @section('title')Bills @endsection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <h3 class="box-title">Pay Bills</h2>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <br />
                            @foreach ($products->chunk(5) as $chunk)
                                <div class="row visible-md visible-lg">
                                    @foreach ($chunk as $product)
                                        <div class="col-md-2 col-lg-2" style="margin-left: 10px; margin-right: 10px;">
                                            <div class="biller img-rounded">
                                                <a href="{{ route('bills').'/'.strtolower($product->service) }}/{{ $product->id }}" class="bill-link-lg-md center-block">
                                                    <img class="img-responsive" src="/images/bills/{{ $product->logo }}">
                                                </a>
                                                <p class="text-center">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr class="visible-md visible-lg">
                            @endforeach


                            @foreach ($products->chunk(3) as $chunk)
                                <div class="row visible-xs visible-sm">
                                    @foreach ($chunk as $product)
                                        <div class="col-xs-4 col-sm-4">
                                            <div class="biller img-rounded">
                                                <a href="{{ route('bills').'/'.strtolower($product->service)}}/{{ $product->id }}" class="bill-link-sm-xs center-block">
                                                    <img class="img-responsive" src="/images/bills/{{ $product->logo }}">
                                                </a>
                                                <p class="text-center">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr class="visible-xs visible-sm">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endSection

