@extends('layouts.master')
    @section('script')
        <script src="https://widgets.bitcoin.com/widget.js" id="btcwdgt"></script>
    @endsection


    @section('header')
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="social">
                            <li><a href="{{ config('constants.site.facebook') }}"><em class="fa fa-facebook"></em></a></li>
                            <li><a href="{{ config('constants.site.twitter') }}"><em class="fa fa-twitter"></em></a></li>
                            <li><a href="{{ config('constants.site.linkedin') }}"><em class="fa fa-linkedin"></em></a></li>
                            <li><a href="{{ config('constants.site.google') }}"><em class="fa fa-google-plus"></em></a></li>
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
                    <div class="quote-btn hidden-xs hidden-sm"><a class="btn" href="{{ route('user.register') }}"><span>get started</span></a></div>
                </div>
                <!-- MainNav -->
                <nav class="navbar-collapse collapse" id="mainnav">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="{{ route('index') }}" class="dropdown-toggle">Home <b class="caret"></b></a>
                        </li>
                        <li><a href="{{ route('index') }}#services">Services</a></li>
                        <li><a href="{{ route('buy-sell') }}">Buy &amp; Sell</a></li>
                        <li><a href="{{ config('constants.site.api.url') }}">Api</a></li>
                        <li><a href="{{ route('index') }}#dataPlans">Data Plans</a></li>
                        <li><a href="{{ route('contact-us') }}">Contact</a></li>
                        <li><a href="{{ route('user.register') }}">Signup</a></li>
                        <li><a href="{{ route('user.login') }}">Login</a></li>
                    </ul>
                    </ul>
                </nav>
                <!-- #end MainNav -->
            </div>
        </div>
        <!-- End Navbar -->
    @endsection

    @section('slider')
        <div class="page-head section row-vm light">
            <div class="imagebg">
                <img src="\home/images/page-bitcoin-bg.jpg" alt="page-head">
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2>Buy &amp; Sell Bitcoin</h2>
                        <div class="page-breadcrumb">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="active"><span>Buy &amp; Sell Bitcoin</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #end Banner/Slider -->
        <!-- BTC Ticker -->
      	<div class="btc-ticker">
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="usd"></div>
			</div>
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="eur"></div>
			</div>
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="jpy"></div>
			</div>
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="gbp"></div>
			</div>
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="chf"></div>
			</div>
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="aud"></div>
			</div>
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="cad"></div>
			</div>
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="nzd"></div>
			</div>
			<div class="ticker-item">
				<div class="btcwdgt-price" bw-cur="nzd"></div>
			</div>
      	</div>
      	<!-- End BTC Ticker -->
    @endsection

    @section('content')
        <!-- Features Box -->
      	<div class="features-box section section-pad no-pb">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 res-m-bttm">
                        <div class="box round shadow-alt">
                            <img src="\home/images/icons/box-icon-a.png" alt="box-icon" class="box-icon">
                            <h6 class="ucap">We sell bitcoin</h6>
                            <p class="small">Compliant with dolorts adipis sit <br/> ametcon sectetur.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 res-m-bttm">
                        <div class="box round shadow-alt">
                            <img src="\home/images/icons/box-icon-e.png" alt="box-icon" class="box-icon">
                            <h6 class="ucap">Buy with credit card</h6>
                            <p class="small">Lorem ipsum dolor sit amet cont <br/> etur adipiscing eli.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                        <div class="box round shadow-alt">
                            <img src="\home/images/icons/box-icon-c.png" alt="box-icon" class="box-icon">
                            <h6 class="ucap">Fast-track transaction</h6>
                            <p class="small">Dolore magna aliqa. Ut enim ad <br/> minim venim quis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Features Box -->

        <!--HR Line -->
    	<div class="container hr-line"></div>

    	<!--Section -->
    	<div class="section section-pad">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-8">
    					<div class="text-block">
							<h3>Buy Bitcoin Instantly from a Safe Exchange</h3>
							<p>Many services nowadays offer their users to buy Bitcoins, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et lorem nec felis finibus laoreet. The company is officially registered in the UK, has a Money Services Busialiquam tellus, sit amet tristique ipsum. </p>
							<p>Many services nowadays offer their users to buy Bitcoins, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et lorem nec felis finibus laoreet. The company is officially registered in the UK has a Money Services Business status.</p>
						</div>
    				</div>
    				<div class="col-md-4">
    					<div class="icon-block">
    						<div class="icon-image">
    							<img src="\home/images/icons/icon-a.png" alt="icon">
    						</div>
    						<p>Many services nowadays offer their users to buy Bitcoins, Lorem ipsum dolor sit</p>
    						<ul>
    							<li>Lorem ipsum dolor sit amet.</li>
    							<li>Many services nowadays offer.</li>
    							<li>Busialiquam tellus, sit amet.</li>
    						</ul>
    					</div>
    				</div>
    			</div>
    			<div class="gaps size-2x"></div>
    			<div class="row">
    				<div class="col-md-8">
    					<div class="text-block">
							<h3>Buy Bitcoin Instantly from a Safe Exchange</h3>
							<p>Many services nowadays offer their users to buy Bitcoins, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et lorem nec felis finibus laoreet. The company is officially registered in the UK, has a Money Services Busialiquam tellus, sit amet tristique ipsum. </p>
							<p>Many services nowadays offer their users to buy Bitcoins, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et lorem nec felis finibus laoreet. The company is officially registered in the UK has a Money Services Business status.</p>
						</div>
    				</div>
    				<div class="col-md-4">
    					<div class="icon-block">
    						<div class="icon-image">
    							<img src="\home/images/icons/icon-b.png" alt="icon">
    						</div>
    						<p>Many services nowadays offer their users to buy Bitcoins, Lorem ipsum dolor sit</p>
    						<p>Nowadays offer their Many services users to buy Bitcoins, Lorem ipsum dolor sit amet Many services nowadays offer their users to buy Bitcoins, Lorem ipsum dolor sit amet</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div><!-- End Section -->
    	<div class="section section-pad cta-section">
    		<div class="imagebg has-parallax">
				<img src="\home/images/cta-light-bg.jpg" alt="cta-light">
			</div>
    		<div class="container">
    			<div class="row text-center">
    				<div class="col-md-8 col-md-offset-2">
    					<h3>Are you searching for a quick, cheap, and safe way to buy Bitcoins? </h3>
    					<a href="{{ route('user.login') }}" class="btn btn-md btn-alt">buy &amp; Sell bitcoin Now</a>
    				</div>
    			</div>
    		</div>
    	</div>
    @endsection

    @section('scripts')
        <script>
            (function(b,i,t,C,O,I,N) {
            window.addEventListener('load',function() {
                if(b.getElementById(C))return;
                I=b.createElement(i),N=b.getElementsByTagName(i)[0];
                I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
            },false)
            })(document,'script','https://widgets.bitcoin.com/widget.js','btcwdgt');
        </script>
    @endsection

