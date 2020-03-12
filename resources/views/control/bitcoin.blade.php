@extends('dashboard.layouts.master')

    @section('title') Bitcoin Settings @endSection

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
                            <h3 class="box-title">Bitcoin Settings</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            @include('dashboard.layouts.errors')
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="bg-blue">
                                    <tr>
                                        <th>id</th>
                                        <th>&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;</th>
                                        <th>Buy Rate(₦) -ve</th>
                                        <th>Sell Rate(₦) +ve</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coins as $item)
                                        <form action="{{ route('admin.coins.config.edit', ['route' => $item->id])  }}"method="POST">
                                            @method('patch') @csrf
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ strtoupper($item->name) }}</td>
                                                <td><input type="text" style="max-width: 50px;" name="buyRate" value="{{ $item->buy_rate }}" required></td>
                                                <td><input type="text" style="max-width: 50px;" name="sellRate" value="{{ $item->sell_rate }}" required></td>
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
            <!-- /.row -->
        </section>
        <!-- /.content -->
    @endSection

