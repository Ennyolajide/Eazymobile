<div class="navigation">
    <h5 class="title">Navigation</h5>
    <!-- /.title -->
    <ul class="menu js__accordion">



        @if(Auth::user()->permission)
            <li><a href="{{ route('admin.users') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
            <li><a href="{{ route('admin.settings') }}"><i class="fa fa-wrench"></i> <span>Settings</span></a></li>
            <!--li><a href="{{-- route('admin.paystack.transactions') --}}"><i class="fa fa-credit-card"></i> <span>Paystack</span></a></li-->
            <li><a href="{{ route('admin.transactions') }}"><i class="fa fa-gears"></i> <span>Transactions</span></a></li>
            <li><a href="{{ route('admin.airtimes') }}"><i class="fa fa-gear"></i> <span>Airtimes</span></a></li>
            <li><a href="{{ route('admin.datas') }}"><i class="fa fa-gear"></i> <span>Data</span></a></li>
            <li><a href="{{ route('admin.fundings') }}"><i class="fa fa-gear"></i> <span>Fundings</span></a></li>
            <li><a href="{{ route('admin.withdrawals') }}"><i class="fa fa-gear"></i> <span>Withdrawals</span></a></li>
        @else
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a></li>
            <li><a href="{{ route('wallet.fund') }}"><i class="fa fa-google-wallet"></i> <span>Fund Wallet</span></a></li>
            <li><a href="{{ route('wallet.withdraw') }} "><i class="fa fa-money custom"></i> <span>Withdrawal</span></a></li>
            <li><a href="{{ route('airtime.topup') }}"><i class="fa fa-volume-control-phone"></i> <span>Airtime Topup</span></a></li>
            <li><a href="{{ route('airtime.swap') }}"><i class="fa fa-exchange"></i> <span>Airtime Swap</span></a></li>
            <li><a href="{{ route('airtime.cash') }}"><i class="fa fa-bank"></i> <span>Airtime To Cash</span></a></li>
            <li><a href="{{ route('data.buy') }}"><i class="fa fa-wifi"></i> <span>Buy Data</span></a></li>
            <li><a href="{{ route('sms.bulk') }}"><i class="fa fa-envelope-o"></i> <span>Bulk Sms</span></a></li>
            <li><a href="{{ route('bills') }} "><i class="fa fa-credit-card custom"></i> <span>Pay Bills</span></a></li>
            <li>
                <a href="{{ route('messages.inbox') }}">
                    <i class="fa fa-envelope"></i> <span>Inbox</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-yellow">12</small>
                        <small class="label pull-right bg-green"></small>
                        <small class="label pull-right bg-red">5</small>
                    </span>
                </a>
            </li>

            <li><a href="{{ route('user.transactions') }}"><i class="fa fa-shopping-cart"></i> <span>Transactions</span></a></li>
        @endif
        <li><a href="{{ route('user.profile') }}"><i class="fa fa-wrench"></i> <span>Account Settings</span></a></li>
        <li><a href="{{ route('user.logout') }}"><i class="fa fa-power-off js__logout"></i> <span>Logout</span></a></li>
    </ul>
</div>
<!-- /.navigation -->
