@extends('dashboard.layouts.master')

    @section('title')Inbox @endsection

    @section('css')
        <!-- iCheck -->
	    <link rel="stylesheet" href="\plugins/iCheck/skins/square/blue.css">
    @endsection


    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
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
                        <h3 class="box-title">Inbox</h3>
                        <div class="box-tools">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
					<div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            {{-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button> --}}
                            <button type="button" class="btn btn-default btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button>
                            {{-- <button type="button" class="btn btn-default btn-sm waves-effect waves-light"><i class="fa fa-exclamation-circle"></i></button> --}}
                            <button type="button" class="btn btn-default btn-sm waves-effect waves-light"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                @if ($messages->hasPages())
                                    <span class="inbox-text">
                                        {{ $messages->firstItem() }} - {{ $messages->lastItem() }}/{{ $messages->total() }}
                                    </span>
                                    <div class="btn-group">
                                        {{-- Previous Page Link --}}
                                        @if (!$messages->onFirstPage())
                                            <button type="button" class="previousPage btn btn-default btn-sm waves-effect waves-light">
                                                <i class="fa fa-angle-left"></i>
                                            </button>
                                        @endif
                                        {{-- Next Page Link --}}
                                        @if ($messages->hasMorePages())
                                            <button type="button" class="nextPage btn btn-default btn-sm waves-effect waves-light">
                                                <i class="fa fa-angle-right"></i>
                                            </button>
                                        @endif
                                    </div>
                                    <!-- /.btn-group -->
                                @endif
                            </div>
                            <!-- /.pull-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr class="">
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td class="mailbox-star">
                                                <a href="{{ route('messages.message',$message->id) }}">
                                                    <i class="{{ $message->read ? 'fa fa-star-o' : 'fa fa-star' }} text-warning"></i>
                                                </a>
                                            </td>

                                            <td class="mailbox-name">
                                                <a href="{{ route('messages.message',$message->id) }}" class="submit" type="submit">
                                                    {{ $message->sender->name }}
                                                </a>
                                            </td>
                                            <td class="mailbox-subject">
                                                <span class="mailbox-subject-title">
                                                    <a href="{{ route('messages.message',$message->id) }}" class="text-success">
                                                        <b>{{ $message->subject }}</b>
                                                    </a> -
                                                    <a href="{{ route('messages.message',$message->id) }}">{{ str_limit($message->content,85,'...') }}</a></td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date"><small>{{ $message->created_at->diffForHumans() }}</small></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            {{-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button> --}}
                            <button type="button" class="btn btn-default btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button>
                            {{-- <button type="button" class="btn btn-default btn-sm waves-effect waves-light"><i class="fa fa-exclamation-circle"></i></button> --}}
                            <button type="button" class="btn btn-default btn-sm waves-effect waves-light"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                @if ($messages->hasPages())
                                    <span class="inbox-text">
                                        {{ $messages->firstItem() }} - {{ $messages->lastItem() }}/{{ $messages->total() }}
                                    </span>
                                    <div class="btn-group">
                                        {{-- Previous Page Link --}}
                                        @if (!$messages->onFirstPage())
                                            <button type="button" class="previousPage btn btn-default btn-sm waves-effect waves-light">
                                                <i class="fa fa-angle-left"></i>
                                            </button>
                                        @endif
                                        {{-- Next Page Link --}}
                                        @if ($messages->hasMorePages())
                                            <button type="button" class="nextPage btn btn-default btn-sm waves-effect waves-light">
                                                <i class="fa fa-angle-right"></i>
                                            </button>
                                        @endif
                                    </div>
                                    <!-- /.btn-group -->
                                @endif
                            </div>
                            <!-- /.pull-right -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endSection

    @section('scripts')
        <!-- iCheck -->
        <script src="\plugins/iCheck/icheck.min.js"></script>
        <script src="\js/mailbox.init.min.js"></script>

        <script>
            $(function() {
                $('.previousPage').click( function(){
                    window.location.href='{{ $messages->previousPageUrl() }}';
                });

                $('.nextPage').click( function(){
                    window.location.href='{{ $messages->nextPageUrl() }}';
                });
            });
        </script>

    @endSection
