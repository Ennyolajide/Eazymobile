<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="\images/avatar/{{ Auth::user()->avatar ?? 'default.png' }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        @if(Auth::user()->permission)
            <li><a href="{{ route('admin.users') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
            <li><a href="{{ route('admin.settings') }}"><i class="fa fa-wrench"></i> <span>Settings</span></a></li>
            <li><a href="{{ route('admin.paystack.transactions') }}"><i class="fa fa-credit-card"></i> <span>Paystack</span></a></li>
            <li><a href="{{ route('admin.transactions') }}"><i class="fa fa-gears"></i> <span>Transactions</span></a></li>
            <li><a href="{{ route('admin.airtimes') }}"><i class="fa fa-gear"></i> <span>Airtimes</span></a></li>
            <li><a href="{{ route('admin.datas') }}"><i class="fa fa-gear"></i> <span>Data</span></a></li>
            <li><a href="{{ route('admin.fundings') }}"><i class="fa fa-gear"></i> <span>Fundings</span></a></li>
            <li><a href="{{ route('admin.bitcoins') }}"><i class="glyphicon glyphicon-bitcoin"></i> <span>Bitcoins</span></a></li>
            <li><a href="{{ route('admin.withdrawals') }}"><i class="fa fa-gear"></i> <span>Withdrawals</span></a></li>
        @else
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a></li>
            <li><a href="{{ route('wallet.fund') }}"><i class="fa fa-google-wallet"></i> <span>Fund Wallet</span></a></li>
            <li><a href="{{ route('wallet.withdraw') }} "><i class="fa fa-money custom"></i> <span>Withdrawal</span></a></li>
            <li><a href="{{ route('airtime.topup') }}"><i class="fa fa-volume-control-phone"></i> <span>Airtime Topup</span></a></li>
            <li><a href="{{ route('airtime.swap') }}"><i class="fa fa-exchange"></i> <span>Airtime Swap</span></a></li>
            <li><a href="{{ route('airtime.cash') }}"><i class="fa fa-bank"></i> <span>Airtime To Cash</span></a></li>
            <li><a href="{{ route('data.buy') }}"><i class="fa fa-wifi"></i> <span>Buy Data</span></a></li>
            <li><a href="{{ route('bitcoin.index') }}"><i class="glyphicon glyphicon-bitcoin"></i> <span>Buy | Sell Coins</span></a></li>
            <li><a href="{{ route('sms.bulk') }}"><i class="fa fa-envelope-o"></i> <span>Bulk Sms</span></a></li>
            <li><a href="{{ route('bills') }} "><i class="fa fa-credit-card custom"></i> <span>Pay Bills</span></a></li>
            <li><a href="{{ route('messages.inbox') }}"><i class="fa fa-envelope"></i> <span>Inbox</span></a></li>
            <li><a href="{{ route('user.transactions') }}"><i class="fa fa-shopping-cart"></i> <span>Transactions</span></a></li>
        @endif
        <li><a href="{{ route('user.profile') }}"><i class="fa fa-wrench"></i> <span>Account Settings</span></a></li>
        <li><a href="{{ route('user.logout') }}"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->
</aside>
