@extends('dashboard.layouts.master')

    @section('title')
        {{ $product->name }} Settings
    @endsection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <h3 class="box-title">{{ $product->name }} Settings</h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-small-font table-bordered table-striped">
                                <thead class="bg-green">
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
        </div>
        <!-- /.content -->
    @endSection

