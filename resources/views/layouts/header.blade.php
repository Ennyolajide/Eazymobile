    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="social">
                        <li><a href="{{ config('constants.site.facebook') }}"><em class="fa fa-facebook"></em></a></li>
                        <li><a href="{{ config('constants.site.twitter') }}"><em class="fa fa-twitter"></em></a></li>
                        <li><a href="{{ config('constants.site.linkedin') }}"><em class="fa fa-instagram"></em></a></li>
                        <li><a href="{{ config('constants.site.google') }}"><em class="fa fa-telegram"></em></a></li>
                    </ul>
                </div>
                <div class="col-sm-6 al-right">
                    <ul class="top-nav">
                        <li><a href="{{ route('faq') }}">Help</a></li>
                        <li><a href="{{ route('faq') }}">Support</a></li>
                        <li><a href="{{ route('user.login') }}">Login</a></li>
                        <li><a href="{{ route('user.register') }}">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Navbar -->
    <div class="navbar navbar-primary">
        <div class="container relative">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="logo logo-dark" alt="logo" src="\images/logo.png">
                <!--img class="logo logo-light" alt="logo" src="\home/images/logo_white.png"-->
            </a>
            <!-- #end Logo -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="quote-btn"><a class="btn" href="{{ route('user.register') }}"><span>get started</span></a></div>
            </div>
            <!-- MainNav -->
            <nav class="navbar-collapse collapse" id="mainnav">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="{{ route('index') }}" class="dropdown-toggle">Home <b class="caret"></b></a>
                    </li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="{{ route('buy-sell') }}">Buy &amp; Sell</a></li>
                    <li><a href="#l">Api</a></li>
                    <li><a href="#dataPlans">Data Plans</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact</a></li>
                    <li class="quote-btn hidden-xs hidden-sm"><a class="btn" href="{{ route('user.register') }}">get started</a></li>
                </ul>
            </nav>
            <!-- #end MainNav -->
        </div>
    </div>
    <!-- End Navbar -->


