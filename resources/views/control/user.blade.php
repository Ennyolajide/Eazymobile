@extends('dashboard.layouts.master')

    @section('title') Profile @endsection

    @section('css')
        <!-- Form Wizard -->
        <link rel="stylesheet" href="\plugins/form-wizard/prettify.css">
    @endSection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <br/>
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left text-center">
                            <div class="profile_img text-center">
                                <div id="crop-avatar">
                                    <img class="avatar-view" src="\images/avatar/{{ $user->avatar }}" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{ $user->name }}</h3>
                            <ul class="list-unstyled user_data">
                                <li><h4><i class="fa fa-map-marker user-profile-icon"></i> {{ $user->email }}</h4></li>
                                <li><h4><i class="fa fa-briefcase user-profile-icon"></i> {{ $user->number }}</h4></li>
                                <li><h4><i class="fa fa-card user-profile-icon"></i> @naira($user->balance)</h4></li>
                            </ul>

                            <form action="{{ route('admin.toggle.user.status',['user' => $user->id]) }}" method="post">
                                @method('patch') @csrf
                                <input type="hidden" name="action" value="{{ $user->active ? 0 : 1 }}">
                                <button class="btn {{ $user->active ? 'btn-danger' : 'btn-success' }}"><i class="fa fa-edit m-right-xs"></i>{{ $user->active ? 'Block User' : 'Unblock User' }}</button>
                            </form>
                            <br />
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div id="tabsleft" class="tabbable tabs-left">
                                <ul>
                                    <li><a href="#balance" data-toggle="tab">Balance</a></li>
                                    <li><a href="#payments" data-toggle="tab">Payments</a></li>
                                    <li><a href="#transactions" data-toggle="tab">Transactions</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="balance">
                                        <div class="table-responsive">
                                            <br/><br/>
                                            <form action="{{ route('admin.alter.user.balance', ['user' => $user->id]) }}" method="POST">
                                                @method('patch') @csrf
                                                <div class="col-sm-9 col-xs-12  text-default">
                                                    <div class="input-group" style="color:aliceblue;">
                                                        <span class="input-group-btn">
                                                            <button type="submit" name="debit" value="1" class="btn btn-danger btn-rounded"><small>Debit User</small></button>
                                                        </span>
                                                        <input type="text" name="amount" class="form-control">
                                                        <span class="input-group-btn">
                                                            <button type="submit" name="credit" value="1" class="btn btn-success btn-rounded"><small>Credit User</small></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                            <br/><br/>
                                        </div>
                                    </div>
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

                                                    @foreach ($user->transactions as $item)
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
                                </div>
                                @include('dashboard.layouts.errors')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">.</div>
        </div>
    @endsection

    <!-- Modal -->
    <div class="modal fade" id="myRefUrl" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">My Referral Link</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><a href="{{ route('user.register',['referrer' => $user->wallet_id]) }}"><span class="h3">{{ route('user.register',['referrer' => $user->wallet_id]) }}</span></a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <!-- Form Wizard -->
        <script src="\plugins/form-wizard/prettify.js"></script>
        <script src="\plugins/form-wizard/jquery.bootstrap.wizard.min.js"></script>

        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script src="\js/form.wizard.init.min.js"></script>
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

                //$('a[href="' + window.location.hash + '"]').click();
                /* var hash = location.hash, hashPieces = hash.split('?') , activeTab = $('[href=' + hashPieces[0] + ']');
                activeTab && activeTab.tab('show'); */


            });
        </script>
    @endSection
