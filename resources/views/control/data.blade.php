@extends('dashboard.layouts.master')
    @section('title')
        Data Settings
    @endsection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <h3 class="box-title">Data Settings</h3>
                    <div class="row">
                        <div class="table-responsive">
                            @include('dashboard.layouts.errors')
                            <table class="table table-small-font table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>Phone</td>
                                        <td class="text-bold">{{ $network->notification_phone }}</td>
                                        <td>
                                            <label>
                                                <div class="switch pink">
                                                    <input type="checkbox" {{ $network->phone_notification_status ? 'checked' : '' }} id="phoneNotificationStatusDisplay">
                                                    <label for="phoneNotificationStatusDisplay"></label>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>Email</td>
                                        <td class="text-bold">{{ $network->notification_email }}</td>
                                        <td>
                                            <label>
                                                <div class="switch success">
                                                    <input type="checkbox" {{ $network->email_notification_status ? 'checked' : '' }} id="emailNotificationStatusDisplay">
                                                    <label for="emailNotificationStatusDisplay"></label>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>Availability</td>
                                        <td class="text-bold">{{ $network->available ? 'Available' : 'Unavailable' }}</td>
                                        <td>
                                            <label>
                                                <div class="switch success">
                                                    <input type="checkbox" {{ $network->available ? 'checked' : '' }} id="availabilityStatusDisplay">
                                                    <label for="availabiltyStatusDisplay"></label>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="box-content">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-small-font table-bordered table-striped">
                                <thead class="bg-blue">
                                    <tr>
                                        <th>id</th>
                                        <th>Network</th>
                                        <th>Volume</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><img src="\images/networks/{{ strtolower($item->network).'.png'  }}" style="max-height: 50px; display:inline-block;"></td>
                                            <td>{{ $item->volume }}</td>
                                            <td>@naira($item->amount)</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#{{ $item->id }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <form action="{{ route('admin.dataplan.delete', ['plan' => $item->id ]) }}" method="POST">
                                                    @csrf @method('patch')
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-delete"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <!-- .box-footer -->
                    <div class="box-footer clearfix">
                        <a href="#" data-toggle="modal" data-target="#editPhoneNotification" class="btn btn-sm btn-success btn-flat pull-left">Settings</a>
                        <a href="#" data-toggle="modal" data-target="#newDataPlan" class="btn btn-sm btn-primary btn-flat pull-right">Add New Data Plan</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.content -->
    @endSection

    @foreach ($plans as $item)
        <!--Modal-->
        <div id="{{ $item->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                            Edit Data Plan
                            <img src="\images/networks/{{ strtolower($item->network).'.png'  }}" style="max-height: 40px; display:inline-block;">
                        </h4>
                    </div>
                    <form method="POST" action="{{ route('admin.dataplan.edit',['network' => $item->id ] ) }}">
                        @method('patch') @csrf
                        <div class="modal-body block-center">
                            <br/>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Volume</label>
                                <div class="col-sm-8 form-grouping">
                                    <input type="text" class="form-control" name="volume" value="{{ $item->volume }}" required>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Amount</label>
                                <div class="col-sm-8 form-grouping">
                                    <input type="text" class="form-control" name="amount" value="{{ $item->amount }}" required>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Notification</label>
                                <div class="col-sm-8 form-grouping">
                                    <input type="text" class="form-control" name="notification" value="{{ $item->notification_content }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  data-dismiss="modal" class="btn btn-danger pull-left">Deline</button>
                            <button type="submit" name="completed" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modal -->
    @endforeach

    <!--Modal-->
    <div id="newDataPlan" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        New Data Plan
                        <img src="\images/networks/{{ strtolower($network->network).'.png'  }}" style="max-height: 40px; display:inline-block;">
                    </h4>
                </div>
                <form method="POST" action="{{ route('admin.dataplan.new',['network' => $network->id ] ) }}">
                    @csrf
                    <div class="modal-body block-center">
                        <br/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-offset-1 control-label">Volume</label>
                            <div class="col-sm-8 form-grouping">
                                <input type="text" class="form-control" name="volume" required>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-offset-1 control-label">Amount</label>
                            <div class="col-sm-8 form-grouping">
                                <input type="text" class="form-control" name="amount" required>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-offset-1 control-label">Notification</label>
                            <div class="col-sm-8 form-grouping">
                                <input type="text" class="form-control" name="notification" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  data-dismiss="modal" class="btn btn-danger pull-left">Deline</button>
                        <button type="submit" name="completed" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal -->

    <!--Modal-->
    <div id="editPhoneNotification" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        Edit Notification Number
                        <img src="\images/networks/{{ strtolower($network->network).'.png'  }}" style="max-height: 40px; display:inline-block;">
                    </h4>
                </div>
                <form method="POST" action="{{ route('admin.data.edit',['network' => $network->id ] ) }}">
                    @method('patch') @csrf
                    <div class="modal-body block-center">
                        <br/>
                        <div class="form-group row text-center">
                            <label class="col-sm-2 control-label">Availability : </label>
                            <div class="col-sm-3 form-grouping">
                                <div class="switch pink">
                                    <input type="checkbox" name="availabilityStatus" {{ $network->available ? 'checked' : '' }} id="availabilityStatus">
                                    <label for="availabilityStatus"></label>
                                </div>
                                <span class="help-block text-bold">Availability</p>
                            </div>
                        </div>
                        <div class="form-group row notification-status">
                            <label class="col-sm-2 control-label">Phone : </label>
                            <div class="col-sm-5 form-grouping text-input">
                                <input type="text" class="form-control" name="phone" value="{{ $network->notification_phone }}" {{ $network->phone_notification_status ? '' : 'disabled' }} required>
                                <span class="help-block text-bold">Phone to receive Data orders</p>
                            </div>
                            <label class="col-sm-2 control-label">Status : </label>
                            <div class="col-sm-3 form-grouping">
                                <div class="switch pink">
                                    <input type="checkbox" name="phoneNotificationStatus" {{ $network->phone_notification_status ? 'checked' : '' }} id="phoneNotificationStatus">
                                    <label for="phoneNotificationStatus"></label>
                                </div>
                               {{--  <input type="checkbox" name="phoneNotificationStatus" class="js-switch" {{ $network->phone_notification_status ? 'checked' : '' }} data-switchery="true" style="display: none;"> --}}
                                <span class="help-block text-bold">Phone Notification status</p>
                            </div>
                        </div>
                        <div class="form-group row notification-status">
                            <label class="col-sm-2 control-label">Phone : </label>
                            <div class="col-sm-5 form-grouping text-input">
                                <input type="text" class="form-control" name="email" value="{{ $network->notification_email }}" {{ $network->email_notification_status ? '' : 'disabled' }} required>
                                <span class="help-block text-bold">Email to receive Data orders</p>
                            </div>
                            <label class="col-sm-2 control-label">Status : </label>
                            <div class="col-sm-3 form-grouping">
                                <div class="switch pink">
                                    <input type="checkbox" name="emailNotificationStatus" {{ $network->email_notification_status ? 'checked' : '' }} id="emailNotificationStatus">
                                    <label for="emailNotificationStatus"></label>
                                </div>
                                {{-- <input type="checkbox" name="emailNotificationStatus" class="js-switch" {{ $network->email_notification_status ? 'checked' : '' }} data-switchery="true" style="display: none;"> --}}
                                <span class="help-block text-bold">Email Notification status</p>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button"  data-dismiss="modal" class="btn btn-danger pull-left">Deline</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal -->


    @section('scripts')
        <script>
            $('.notification-status').find(':checkbox').change(function(){
                $(this).parent().parent().siblings('.text-input').find(':text').attr('disabled', !$(this).is(':checked'));
            });
        </script>
    @endSection
    });
