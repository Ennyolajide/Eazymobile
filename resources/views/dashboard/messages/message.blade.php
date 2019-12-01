@extends('dashboard.layouts.master')

    @section('title')Read messages @endsection

    @section('content')
        <!-- Main content -->
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <a href="#" class="btn btn-danger btn-mail-main btn-block margin-bottom-20 waves-effect waves-light disabled">COMPOSE</a>
                <div class="box box-solid">
                    <div class="box-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="{{ route('messages.inbox') }}"><i class="fa fa-inbox"></i> Inbox
                                <span class="label-text-right pull-right">{{ $messages->where('read',0)->count() }}</span></a>
                            </li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Sent</a></li>

                            <li><a href="#"><i class="fa fa-trash"></i> Trash</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                <div class="box box-solid">
                    <div class="box-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><i class="fa fa-circle-o text-primary"></i> Important</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-success"></i> Promotions</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Social</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-md-3 col-xs-12 -->
            <div class="col-md-9 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Read messages</h3>
                        <div class="box-tools pull-right">
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3>{{ $message->subject }}</h3>
                            <h5 class="text-success">From: {{ $message->sender->name }}
                                <span class="mailbox-read-time pull-right">{{ $message->created_at->diffForHumans() }}</span>
                            </h5>
                        </div>
                        <div class="mailbox-read-message">
                            To : me <br/><br/><br/>
                            {!! $message->content !!}
                            <br/><br/><br/>
                        </div>

                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="box-footer">
                                <form method="POST" action="{{ route('messages.delete',$message->id) }}">
                                    @method('DELETE') @csrf
                                    <button type="submit" class="btn btn-default btn-sm waves-effect waves-light" data-toggle="tooltip" data-container="body" title="Delete">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-toggle="tooltip" data-container="body" title="Reply"><i class="fa fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-toggle="tooltip" data-container="body" title="Forward"><i class="fa fa-share"></i></button>
                                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
                                </form>
                            </div>

                        </div>
                        <!-- /.mailbox-controls -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    @endSection

    @section('scripts')

        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script>

        </script>

    @endsection

