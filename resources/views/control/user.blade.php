@extends('dashboard.layouts.master')

    @section('title') Profile @endsection

    @section('content-header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>User <small>{{ $user->name }}</small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{ $user->name }}</li>
            </ol>
        </section>
    @endSection

    @section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box-primary text-center">
                        <div class="box-body box-profile">
                            <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->
                            <img  class="profile-user-img img-responsive " src="\images/avatar/{{ $user->avatar ?? 'default.png' }}" alt="User profile picture" title="Change the avatar">
                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center" style="font-size:16px;"><span class="fa fa-envelope">   {{ $user->email }}</span></p>
                            <p class="text-muted text-center" style="font-size:16px;"><span class="fa fa-phone"> {{ $user->number }}</span></p>
                            <p class="text-muted text-center" style="font-size:16px;"><span class="fa fa-card user-profile-icon"> @naira($user->balance)</span></p>

                            <form action="{{ route('admin.toggle.user.status',['user' => $user->id]) }}" method="post">
                                @method('patch') @csrf
                                <input type="hidden" name="blocked" value="{{ $user->blocked ? 0 : 1 }}">
                                <button class="btn {{ !$user->blocked ? 'btn-danger' : 'btn-success' }}"><i class="fa fa-edit m-right-xs"></i>{{ !$user->blocked ? 'Block User' : 'Unblock User' }}</button>
                            </form>
                            <br />
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active" id=""><a href="#balance" id="" data-toggle="tab" aria-expanded="false">Balance</a></li>
                            <li class="" id=""><a href="#payments" id="" data-toggle="tab" aria-expanded="false">Payments</a></li>
                            <li class="" id=""><a href="#transactions" id="" data-toggle="tab" aria-expanded="false">Transactions</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- .tab-pane 1 -->
                            <div class="tab-pane" id="balance">
                                <br/><br/>
                                <form action="{{ route('admin.alter.user.balance', ['user' => $user->id]) }}" method="POST">
                                    @method('patch') @csrf
                                    <div class="col-sm-9 col-xs-12  text-default">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="submit" name="debit" value="1" class="btn btn-danger btn-rounded"><small>Debit</small></button>
                                            </span>
                                            <input type="text" name="amount" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="submit" name="credit" value="1" class="btn btn-success btn-rounded"><small>Credit</small></button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <br/><br/>
                            </div>
                            <!-- /.tab-pane 1 -->
                            <!-- .tab-pane 2 -->
                            <div class="tab-pane" id="payments">
                                <br/>
                                <div class="table-responsive">
                                    <table class="table table-small-font table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="hidden-xs">#</th>
                                                <th>Reference</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th class="hidden-xs">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                function getStatus($status){
                                                    $array = ['Declined','Pending','Success','Canceled'];
                                                    return $status === NULL ? 'Pending' : $array[$status];
                                                }
                                            @endphp
                                            @foreach ($user->payments as $item)
                                                <tr>
                                                    <td class="hidden-xs">{{ $item->iteration }}</div>
                                                    <td>{{ $item->reference }}</td>
                                                    <td>@naira($item->amount)</td>
                                                    <td>{{ $item->type }}</td>

                                                    <td>{{ getStatus($item->status) }}</td>
                                                    <td class="hidden-xs">{{ $item->created_at }}</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#{{ $item->id }}">
                                                            <i class="fa fa-eye"></i>view
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- .tab-pane 2 -->
                            <div class="tab-pane" id="transactions">
                                <br/>
                                <div class="table-responsive">
                                    <table  class="table table-small-font table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Reference</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th class="hidden-xs">Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($user->transactions()->orderBy('id', 'desc')->get() as $item)
                                                <tr>
                                                    <td>{{ str_limit($item->reference, 10, '') }}</td>
                                                    <td>@naira($item->amount)</td>
                                                    <td>{{ $item->class->type }}</td>
                                                    <td>{{ getStatus($item->status) }}</td>
                                                    <td class="hidden-xs">{{ $item->created_at }}</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#{{ $item->id }}">
                                                            <i class="fa fa-eye"></i>view
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @include('dashboard.layouts.errors')
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">.</div>
        </section>
    @endsection

    @section('scripts')

        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function(){

                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function (element) {
                        $(element)
                            .closest('.form-grouping')
                            .addClass('has-error');
                    },
                    unhighlight: function (element) {
                        $(element)
                            .closest('.form-grouping')
                            .removeClass('has-error');
                    }
                });

            });
        </script>
    @endSection


    @foreach ($user->transactions as $transaction)
        <!-- Modal -->
        <div id="{{ $transaction->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View transaction</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="font-size: 20px;">
                        <div class="col-md-5 col-xs-11  col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Transaction Reference :</small>
                            <p class="text-justify" style="font-size: 15px;"><b> {{ $transaction->reference }} </b></p>
                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Transaction Type : </small>
                            <p class=""><b> {{ $transaction->class->type }} </b></p>

                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                        <small>Transaction Amount : </small>
                            <p class=""><b>@naira($transaction->amount) </b></p>
                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small> Before : </small>
                            <p class=""><b>@naira($transaction->balance_before) </b></p>
                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Balance After : </small>
                            <p class=""><b>@naira($transaction->balance_after)</b></p>
                        </div>
                        <div class="col-md-5 col-xs-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <small>Transaction Status </small>
                            <p class=""><b> {{ getStatus($transaction->status) }} </b></p>
                        </div>
                        <div class="col-md-11 col-xs-11 text-center">
                            <small class="text-bold">Transaction Reference :</small>
                            <p class="h4"><b> {{ $transaction->reference }} </b></p>
                        </div>
                    </div>
                </div>
                <!--div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div-->
            </div>

            </div>
        </div>
        <!-- /Modal -->
    @endforeach
