@extends('layouts.master')
    @section('css')
        <link rel="stylesheet" href="\home/assets/css/pricing-tables.min.css">
        <link rel="stylesheet" href="\home/assets/css/custom.css">
    @endsection

    @section('head-scripts')
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    @endSection

    @section('header')
        <!-- Topbar -->
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="social">
                                <li><a href="{{ config('constants.site.facebook') }}"><em class="fa fa-facebook"></em></a></li>
                                <li><a href="{{ config('constants.site.twitter') }}"><em class="fa fa-twitter"></em></a></li>
                                <li><a href="{{ config('constants.site.instagram') }}"><em class="fa fa-instagram"></em></a></li>
                                <li><a href="{{ config('constants.site.telegram') }}"><em class="fa fa-telegram"></em></a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 al-right">
                            <ul class="top-nav">
                                <li><a href="{{ route('faq') }}">Help</a></li>
                                <li><a href="{{ route('faq') }}">Faq</a></li>
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
                        <div class="quote-btn hidden-xs"><a class="btn" href="{{ route('user.register') }}"><span>get started</span></a></div>
                    </div>
                    <!-- MainNav -->
                    <nav class="navbar-collapse collapse" id="mainnav">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('index') }}" class="dropdown-toggle">Home <b class="caret"></b></a>
                            </li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="{{ route('buy-sell') }}">Buy &amp; Sell</a></li>
                            <li><a href="{{ config('constants.site.api.url') }}">Api</a></li>
                            <li><a href="#dataPlans">Data Plans</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="{{ route('contact-us') }}">Contact</a></li>
                            <li><a href="{{ route('user.register') }}">Signup</a></li>
                            <li><a href="{{ route('user.login') }}">Login</a></li>
                        </ul>
                    </nav>
                    <!-- #end MainNav -->
                </div>
            </div>
        <!-- End Navbar -->
    @endsection

    @section('slider')
        <!-- Banner/Slider -->
        <div id="header" class="banner header-slider">
            <div class="single-slide light row-vm" style="background-image:url('\home/images/sliders/bg-a.jpg')">
                <div class="container">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <ul class="btns animate-bottom delayms9">
                                    <li><a href="{{ route('user.register') }}" class="btn btn-primary">Get Started</a></li>
                                    <li><a href="{{ route('user.login') }}" class="btn btn-success"><strong>Login</strong></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide light row-vm" style="background-image:url('\home/images/sliders/bg-b.jpg')">
                <div class="container">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <ul class="btns animate-bottom delayms9">
                                    <li><a href="{{ route('user.register') }}" class="btn btn-primary">Get Started</a></li>
                                    <li><a href="{{ route('user.login') }}" class="btn btn-success"><strong>Login</strong></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide light row-vm" style="background-image:url('\home/images/sliders/bg-c.jpg')">
                <div class="container">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <ul class="btns animate-bottom delayms9">
                                    <li><a href="{{ route('user.register') }}" class="btn btn-primary">Get Started</a></li>
                                    <li><a href="{{ route('user.register') }}" class="btn btn-success"><strong>Login</strong></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide light row-vm" style="background-image:url('\home/images/sliders/bg-d.jpg')">
                <div class="container">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <ul class="btns animate-bottom delayms9">
                                    <li><a href="{{ route('user.register') }}" class="btn btn-primary">Get Started</a></li>
                                    <li><a href="{{ route('user.register') }}" class="btn btn-success"><strong>Login</strong></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide light row-vm" style="background-image:url('\home/images/sliders/bg-e.jpg')">
                <div class="container">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <ul class="btns animate-bottom delayms9">
                                    <li><a href="{{ route('user.register') }}" class="btn btn-primary">Get Started</a></li>
                                    <li><a href="{{ route('user.register') }}" class="btn btn-sucess"><strong>Login</strong></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner/Slider -->
    @endsection

    @section('btcTracker')
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
        <!--Section -->
            <div id="services" class="section section-pad">
                <div class="container">
                    <div class="section-head">
                        <div class="row text-center">
                            <div class="col-md-6 col-md-offset-3">
                                <h2 class="heading-section">Services</h2>
                            </div>
                        </div>
                    </div>
                    <div class="gaps size-3x"></div>
                    <div class="row text-center">
                        <div class="col-md-4 col-sm-6">
                            <div class="service-box shadow round">
                                <div class="service-thumb">
                                    <a href="{{ route('user.login') }}"><img src="\home/images/services/data-topup.png" alt="service"></a>
                                </div>
                                <div class="service-entry">
                                    <h5>Data Topup</h5>
                                    <p>We sell cheap internet data plans across all networks in Nigeria.</p>
                                    <a href="{{ route('user.login') }}" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                </div>
                            </div>
                        <div class="gaps size-3x"></div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="service-box shadow round">
                                <div class="service-thumb">
                                    <a href="{{ route('user.login') }}"><img src="\home/images/services/airtime-topup.png" alt="service"></a>
                                </div>
                                <div class="service-entry">
                                    <h5>Airtime Topup</h5>
                                    <p>Talk more pay less. Get discounts on all airtime you buy on our platform.</p>
                                    <a href="{{ route('user.login') }}" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                </div>
                            </div>
                        <div class="gaps size-3x"></div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="service-box shadow round">
                                <div class="service-thumb">
                                    <a href="service-single.html"><img src="\home/images/services/airtime-to-cash.jpg" alt="service"></a>
                                </div>
                                <div class="service-entry">
                                    <h5>Airtime To Cash</h5>
                                    <p>Swiftly convert your airtime to cash with ease anywhere, anytime </p>
                                    <a href="{{ route('user.login') }}" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                </div>
                            </div>
                        <div class="gaps size-3x"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 res-m-bttm-3x">
                            <div class="service-box shadow round">
                                <div class="service-thumb">
                                    <a href="{{ route('user.login') }}"><img src="\home/images/services/airtime-swap.jpg" alt="service"></a>
                                </div>
                                <div class="service-entry">
                                    <h5>Airtime Swap</h5>
                                    <p>Convinietly and Securely Swap your airtime for another network's airtime</p>
                                    <a href="{{ route('user.login') }}" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 res-m-bttm-3x">
                            <div class="service-box shadow round">
                                <div class="service-thumb">
                                    <a href="{{ route('user.login') }}"><img src="\home/images/services/bills-payment{{ rand(1,2) }}.jpg" alt="service"></a>
                                </div>
                                <div class="service-entry">
                                    <h5>Bill Payments</h5>
                                    <p>Buy your Electricity bills, Tv Subscriptions, Spectranet, Smile and other utility bills</p>
                                    <a href="{{ route('user.login') }}" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 res-m-bttm-3x">
                            <div class="service-box shadow round">
                                <div class="service-thumb">
                                    <a href="{{ route('user.login') }}"><img src="\home/images/services/bitcoins.jpg" alt="service"></a>
                                </div>
                                <div class="service-entry">
                                    <h5>Trade Bitcoins</h5>
                                    <p>Buy & sell Bitcoins securely from our platform with ease </p>
                                    <a href="{{ route('user.login') }}" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--End Section -->
        <!--Section -->
        <div class="section section-pad visible-md visible-lg bg-grey">
            <div class="container">
                <div class="section-head">
                    <div class="row text-center">
                        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            <h2 class="heading-section">Why choose Us</h2>
                            <p>
                                EAZY MOBILE is an online platform to buy cheap data plans across all networks in Nigeria, bill payment and cable subscriptions, cryptocurrency trading such as bitcoin among others, and all other telecom needs.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="gaps size-3x"></div>
                <div class="row text-center row-vm">
                    <div class="col-md-4 res-m-bttm-lg">
                        <div class="box-alt">
                            <span class="pe pe-7s-server"></span>
                            <h4>Payment Options</h4>
                            <p>Wide range of payment options.</p>
                        </div>
                        <div class="box-alt">
                            <span class="pe pe-7s-note"></span>
                            <h4>Legal Compliance</h4>
                            <p>We have legal back up for this business and all you do on this site is guaranteed legit.</p>
                        </div>
                        <div class="box-alt">
                            <span class="pe pe-7s-airplay"></span>
                            <h4>Cross-Platform Trading</h4>
                            <p>We venture into diverse of Telecom needs business to make life easier for our customers.</p>
                        </div>
                    </div>
                    <div class="col-md-4 res-m-bttm-lg">
                        <div class="box-alt">
                            <span class="pe pe-7s-lock"></span>
                            <h4>Strong Security</h4>
                            <p>Secure Payments and Transactions.</p>
                        </div>
                        <div class="box-alt img">
                            <img src="\home/images/square-md-a.png" alt="square">
                        </div>
                        <div class="box-alt">
                            <span class="pe pe-7s-cash"></span>
                            <h4>Discounted Rates</h4>
                            <p>We offer Discounted rates on almost all transactions</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-alt">
                            <span class="pe pe-7s-global"></span>
                            <h4>World Coverage</h4>
                            <p>We are covered under the umbrella of corporate affairs commission.</p>
                        </div>
                        <div class="box-alt">
                            <span class="pe pe-7s-graph"></span>
                            <h4>Advanced Reporting</h4>
                            <p>We will keep listening to you to bring more ease to all challenges in having Telecom needs at your pace.</p>
                        </div>
                        <div class="box-alt">
                            <span class="pe pe-7s-graph1"></span>
                            <h4>Swift Processing</h4>
                            <p>Our services and prices gives imaginary difference to others Telecom needs providers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Section -->

        <!-- Section -->
        <div id="dataPlans" class="pricing-tab section-pad section">
            <div class="container">
                <div class="section-head">
                  <div class="row text-center">
                      <div class="col-md-6 col-md-offset-3">
                          <h2 class="heading-section">Data Plans</h2>
                      </div>
                  </div>
                </div>
                <div class="gaps size-3x"></div>

                <div class="row">
                    @foreach ($dataPlans as $networks)

                        @if($loop->iteration > 4 ) @continue @endif
                        <div class="col-xs-6 col-sm-6 col-md-3 res-m-bttm">
                            <div class="block block-pricing">
                                <div class="table table-{{ strtolower($networks[0]->network) }}">
                                    <h6 class="category"></h6>
                                    <h1 class="block-caption">
                                        <img class="logo" src="\images/networks/{{ strtolower($networks[0]->network) }}.png">
                                    </h1>
                                    <ul>
                                        @foreach ($networks as $plan)
                                            <li><strong>{{ $plan->volume }} - @naira($plan->amount)</strong></li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('data.buy') }}" class="btn btn-white btn-raise btn-round">
                                        <i class="fa fa-shopping-cart"></i> Buy Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

              </div>
            </div>
        </div>
        <!--End Section -->
        <!--Section -->
        <div id="about" class="section section-pad bg-grey">
            <div class="container">
                <div class="section-head">
                    <div class="row text-center">
                        <div class="col-md-12 col-sm-12">
                            <h2 class="heading-section text-center">About Us</h2>
                            <p>{{ config('constants.site.name') }} is a subsidiary of EAZY GLOBAL SOLUTIONS (RC 3062123). This facet of the network deals with Telecom Needs.</p>
                            <p>ey differentiator is our customer satisfaction and intimacy positioning.</p>
                            <p>We strongly believe that you DO NOT need our services just for mobile needs but to get satisfaction</p>
                            <p>We take our work seriously and not ourselves because we are not the service but just a medium.</p>
                            <p>To fulfill our role, we work to make the accessibility, usability and renewability of our service as simple as ABC.</p>
                            <p>This we do by constantly listening to you and developing creative solutions to meet your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="gaps size-3x"></div>
            </div>
        </div>
        <!--End Section -->

        <!-- Section -->
		<div class="section section-pad-md bg-white">
			<div class="container">
				<div class="content row">
                    <h2 class="heading-section text-center">Our Partners</h2>
                    @php
                        $partners = collect([
                            'bills/electricity/ekedc.png', 'bills/electricity/ikedc.png', 'bills/internet/smile.png', 'bills/internet/spectranet.png',
                            'bills/misc/waec.png', 'bills/misc/jamb.png', 'bills/tv/dstv.jpg', 'bills/tv/gotv.jpg', 'bills/tv/startimes.jpeg'
                        ]);
                    @endphp
					<div class="owl-carousel has-carousel no-dots"  data-items="8" data-loop="true" data-dots="false" data-auto="false">
                        @foreach ($partners->shuffle() as $partner)
                            <div class="logo-item"><img alt="" width="140" height="60" src="\images/{{ $partner }}"></div>
                        @endforeach
					</div>

				</div>
			</div>
		</div>
		<!-- End Section -->
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
        <script>

        </script>
    @endsection

