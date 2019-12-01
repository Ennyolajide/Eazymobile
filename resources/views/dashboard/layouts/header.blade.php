@php

$unReadMessages = Auth::user()->messages->where('read',0)->sortByDesc('id');

@endphp

<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title">@yield('title')</h1>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
	<div class="pull-right">
        <!-- /.ico-item -->
        <a href="#" class="ico-item ti-email notice-alarm js__toggle_open" data-target="#message-popup">
            <span class="info-number bg-warning">{{ $unReadMessages->count() }}</sup>
        </a> &nbsp;&nbsp;
        <a class="text-bold text-white">@naira(Auth::user()->balance)</a>
        <input type="hidden" id="unread" value="{{ $unReadMessages->count() }}">
    </div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="message-popup" class="notice-popup js__toggle" data-space="75">
    <h2 class="popup-title">Recent Messages<a href="#" class="pull-right text-danger">New message</a></h2>
    <!-- /.popup-title -->
    <div class="content">
        <ul class="notice-list">
            @foreach ($unReadMessages as $unReadMessage)
                <li>
                    <a href="{{ route('messages.message',$unReadMessage->id) }}">
                        <span class="avatar"><img src="https://placehold.it/80x80" alt=""></span>
                        <span class="name">{{ $unReadMessage->sender->name }}</span>
                        <span class="desc">{{ str_limit($unReadMessage->content, 12, '...') }}</span>
                        <span class="time">{{ $unReadMessage->created_at->diffForHumans() }}</span>
                    </a>
                </li>
                @if($loop->iteration >= 5)
                    @break;
                @endif
            @endForeach
        </ul>
        <!-- /.notice-list -->
        <a href="{{ route('messages.inbox') }}" class="notice-read-more">
            See more messages <i class="fa fa-angle-down"></i>
        </a>
    </div>
    <!-- /.content -->
</div>
<!-- /#message-popup -->

<!-- /top navigation -->
