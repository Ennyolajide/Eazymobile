@extends('layouts.master')

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
                        <li><a href="{{ route('index') }}#about">About Us</a></li>
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
        <div class="page-head section row-vm light">
            <div class="imagebg">
                <img src="\home/images/page-inside-bg.jpg" alt="page-head">
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2>Frequent Questions</h2>
                        <div class="page-breadcrumb">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li class="active"><span>Frequent Questions</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #end Banner/Slider -->
    @endsection

    @section('content')

        <!-- Section -->
        <div class="section section-pad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Frequently Asked <span>Questions</span></h4>
                        <div class="gaps size-1x"></div>
                    </div>
                </div>
                <div class="faq-one row">
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">What does EAZY MOBILE do?</h5>
                            <p>EAZY MOBILE is an online platform to buy cheap data plans across all networks in Nigeria, bill payment and cable subscriptions, cryptocurrency trading such as bitcoin among others, and all other telecom needs.</p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">How do I register?</h5>
                            <p>
                                <li>Click REGISTER button from the homepage and enter the required details A notification will be sent to your email.</li>
                                <li>Go to your email click on the link sent to your email and you are done, Registration is free.</li>
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">How do i fund my {{ config('constants.site.bussinessName') }} wallet?</h5>
                            <p>
                                The {{ config('constants.site.bussinessName') }} wallet gives you the avenue to deposit enough funds to cater for your future needs, you have no need to be paying each time for any services , all you have to do is to choose your wallet as payment method once you have the enough funds in your wallet.
                                <li>To fund your wallet: Login and click Fundwallet at side menu profile or top left corner of your dashboard</li>
                                <li>Choose mode of payment either Card, Bank or Airtime, E-pin, Bitcoin.</li>
                                <li>Enter necessary info. And wait while the request is being processed</li>
                                <li>Minimum funding amount is NGN 100</li>
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">ARE MY CARD DETAILS SAFE?</h5>
                            <p>
                                <li>Yes, Your card details are safe. Your payment is handled by Paystack secured Webpay payment gateway.</li>
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">HOW CAN I BUY DATA BUNDLES?</h5>
                            <p>
                                <li>Login to your account, Go to Buy data on services</li>
                                <li>Choose the network, Enter the correct Phone number.</li>
                                <li>Choose if you want the plan to auto renew and click on SUBMIT</li>
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">CAN I SELL MY AIRTIME ON EAZY MOBILE ?</h5>
                            <p>
                                <li>Yes, go to Airtime to Cash on your Dashboard</li>
                                <li>Choose network.</li>
                                <li>Enter your airtime value</li>
                                <li>Copy out the phone number you are instructed to transfer it to and then Proceed</li>
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">HOW CAN I BUY AIRTIME?</h5>
                            <p>
                                <li>Login to your account</li>
                                <li>Go to airtime Topup</li>
                                <li>Choose the network</li>
                                <li>Enter the correct Phone number.</li>
                                <li>Choose if you want the plan to auto renew click TOPUP</li>
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">HOW CAN I PAY BILLS/CABLE SUBSCRIPTION?</h5>
                            <p>
                                <li>Login to your account</li>
                                <li>Go to pay bills on services</li>
                                <li>Choose decoder</li>
                                <li>Choose your subscription package</li>
                                <li>Enter your correct IUC/Smart number</li>
                                <li>The account details will be displayed for your verification</li>
                                <li>Click on continue upon verification</li>
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">WHAT HAPPENS WHEN I MISTAKENLY RECHARGE A WRONG NUMBER?</h5>
                            <p>Contact your service provider for any reconciliation</p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">HOW AM I SURE THAT I WON’T BE SWINDLED (scammed)?</h5>
                            <p>We’ve being in business for years and have made reputation from our happy clients. We love to keep
                                feedbacks. Hence, you can check our testimonials page for people’s comment about us.
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">HOPE THE DATA WON’T GET EXHAUSTED QUICKLY OR DISAPPEAR?</h5>
                            <p>Our data plans are sourced from Network providers. Therefore, consumption rate is similar to the data
                                you get directly from them(i.e data charges are based on usage).<br>
                                <li>✅ Restrict background data</li>
                                <li>✅Use data saving browser</li>
                                <li>✅Compress videos before streaming</li>
                                <li>✅Turn off data when not in use</li>
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">HOW AM I SURE THIS IS NOT A CHEAT OR TWEAK THAT COULD BE BLOCKED ANYTIME?</h5>
                            <p>This is not a cheat or tweak, we are third-party agents and we legally purchase huge amounts of data.
                                from network providers and Sell in bit.
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">I MADE A PAYMENT BUT I HAVE NOT BEEN CREDITED?</h5>
                            <p>This happen on very rear occasion but if it does kindly contact us so we can check the status of your
                                payment.
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">HOW CAN I REACH OUT TO YOU?</h5>
                            <p>Yes, you can reach out to us on Telegram or email support@eazymobile.net
                            </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>

                    <div class="col-md-6">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">How could any one make a support request?</h5>
                            <p>Perspiciatis fugiat nam odit blanditiis corporis ad reiciendis ratione voluptatem ullam sunt consectetur commodi. Consectetur adipisicing elit. Cupiditate, adipisci magni in explicabo facilis deleniti vel </p>
                        </div>
                        <div class="gaps size-x2"></div>
                    </div>
                    <div class="col-md-6 res-m-bttm">
                        <div class="single-faq mr-x2">
                            <h5 class="faq-heading">How to make a passive income with bitcoin mining ?</h5>
                            <p>Consectetur adipisicing elit. Cupiditate, adipisci magni in explicabo facilis deleniti vel perspiciatis fugiat nam odit blanditiis corporis ad reiciendis ratione voluptatem ullam sunt consectetur commodi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Section -->

        <!-- Section -->
        {{-- <div class="section section-pad bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 res-m-bttm">
                        <h4>Pre Answered <span>Questions</span></h4>
                        <!-- Accordion -->
                        <div class="panel-group accordion" id="another" role="tablist" aria-multiselectable="true">
                            <!-- each panel for accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="accordion-i1">
                                    <h6 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#another" href="faqs.html#accordion-pane-i1" aria-expanded="false">
                                            Is this app free to use for business or commercial use ?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h6>
                                </div>
                                <div id="accordion-pane-i1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="accordion-i1">
                                    <div class="panel-body">
                                            <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- each panel for accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="accordion-i2">
                                    <h6 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="faqs.html#accordion-pane-i2" aria-expanded="false">
                                            How do i make a support request with this app?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h6>
                                </div>
                                <div id="accordion-pane-i2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i2">
                                    <div class="panel-body">
                                            <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- each panel for accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="accordion-i3">
                                    <h6 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="faqs.html#accordion-pane-i3" aria-expanded="false">
                                            How and where can we download latest update ?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h6>
                                </div>
                                <div id="accordion-pane-i3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i3">
                                    <div class="panel-body">
                                            <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- each panel for accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="accordion-i4">
                                    <h6 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="faqs.html#accordion-pane-i4" aria-expanded="false">
                                            Is there any premium version with extended features ?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h6>
                                </div>
                                <div id="accordion-pane-i4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i4">
                                    <div class="panel-body">
                                            <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
                                    </div>
                                </div>
                            </div><!-- end each panel -->
                            <!-- each panel for accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="accordion-i5">
                                    <h6 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="faqs.html#accordion-pane-i5" aria-expanded="false">
                                            Where do i find any details documentation ?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h6>
                                </div>
                                <div id="accordion-pane-i5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i5">
                                    <div class="panel-body">
                                            <p>Internal audit is an independent, objective assurance and consulting activity designed to add value and improve an organization an independent, objective assurance and consulting activity.</p>
                                    </div>
                                </div>
                            </div><!-- end each panel -->
                        </div><!-- Accordion #end -->
                    </div>
                    <!--div class="col-md-4 col-md-offset-1">
                        <div class="sidebar-right wgs-box bg-white pd-x3">
                            <div class="wgs-menu mb-x2">
                                <h5 class="wgs-title">Imaportant Pages</h5>
                                <div class="wgs-content">
                                    <ul class="menu">
                                        <li><a href="faqs.html#">How it Works</a></li>
                                        <li><a href="faqs.html#">Buy and Sell</a></li>
                                        <li><a href="faqs.html#">Wallet Features</a></li>
                                        <li><a href="faqs.html#">Market Data</a></li>
                                        <li><a href="faqs.html#">Pricing</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wgs-contact-info">
                                <div class="wgs-content boxed">
                                    <div class="contact-information">
                                        <div class="contact-entry">
                                            <h6>Crypto<span>Coin</span></h6>
                                            <p>34 south franklin road<br/>Santa ana,ca 8975,usa</p>
                                        </div>
                                        <div class="gaps size-1x"></div>
                                        <div class="contact-entry">
                                            <h6>Contact number</h6>
                                            <p>Phone:  781-123-9865<br/>Toll free: 800-123-5689</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div-->
                </div>
            </div>
        </div> --}}
        <!-- End Section -->
    @endsection



