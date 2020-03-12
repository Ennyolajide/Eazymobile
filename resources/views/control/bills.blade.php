@extends('dashboard.layouts.master')

    @section('title')
        {{ $product->name }} Settings
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
                            <h3 class="box-title">{{ $product->name }} Settings</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table class="table table-striped table-hover table-bordered table-responsive">
                                <thead class="bg-blue">
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Buy</th>
                                        <th>Sell(₦)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productList as $item)
                                        <form action="{{ route('admin.bill.config.edit', ['subProduct' => $item->id])  }}"method="POST">
                                            @method('patch') @csrf
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>@naira($item->ringo_price)</td>
                                                <td><input type="text" style="max-width: 50px;" name="amount" value="{{ $item->selling_price }}" required></td>
                                                <td><button type="submit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button></td>
                                            </tr>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    @endSection

