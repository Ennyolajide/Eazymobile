<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Data Topup, Bulk sms, Airtime topups, bill payments, dstv, gotv, startimes, ikeja Electric, Ibadan Electricity destribution company, airtime to cash, airtime swap" name="keywords">
  <meta content="Eniseyin Olajide" name="author">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="\favicon.png" rel="icon">
  <link href="\apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="\home/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="\home/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="\home/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="\home/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="\home/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="\home/lib/animate/animate.min.css" rel="stylesheet">
  <link href="\home/lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="\home/css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="\home/css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="\home/css/responsive.css" rel="stylesheet">
  <link href="\home/css/pricing.css" rel="stylesheet">

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src="{{ config('constants.livechat.tawk') }}";
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
    </script>
    <!--End of Tawk.to Script-->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">

                <!-- Navigation -->
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Brand -->
                    <a class="navbar-brand page-scroll sticky-logo" href="{{ route('index') }}">
                        {{-- <h1>{{ strtoupper(config('constants.site.name')) }}</h1> --}}
                        <!-- Uncomment below if you prefer to use an image logo -->
                        <img src="\images/logo-white.png" height="40px" width="230px" alt="" class="img-auto" title="modelc">
                    </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                        <a class="page-scroll" href="#home">Home</a>
                        </li>
                        <li>
                        <a class="page-scroll" href="#about">About</a>
                        </li>
                        <li>
                        <a class="page-scroll" href="#services">Services</a>
                        </li>
                        <li>
                        <a class="page-scroll" href="#faq">FAQ</a>
                        </li>
                        <li>
                        <a class="page-scroll" href="#pricing">Data Plans</a>
                        </li>

                        <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<span
                            class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href=#>Drop Down 1</a></li>
                            <li><a href=#>Drop Down 2</a></li>
                        </ul>
                        </li> -->
                        <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                        <li>
                        <a class="page-scroll" href="{{ route('user.login') }}">Login</a>
                        </li>
                        <li>
                        <a class="page-scroll" href="{{ route('user.register') }}">Register</a>
                        </li>
                    </ul>
                    </div>
                    <!-- navbar-collapse -->
                </nav>
                <!-- END: Navigation -->
                </div>
            </div>
            </div>
        </div>
        <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="\home/img/slider/slider1.jpg" alt="" title="#slider-direction-1" />
        <img src="\home/img/slider/slider2.jpg" alt="" title="#slider-direction-2" />
        <img src="\home/img/slider/slider3.jpg" alt="" title="#slider-direction-3" />
        <img src="\home/img/slider/slider4.jpg" alt="" title="#slider-direction-4" />
        <img src="\home/img/slider/slider5.jpg" alt="" title="#slider-direction-5" />
      </div>


      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h4 class="title1"> &nbsp;</h4>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Earn amazingly as you refer</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="{{ 'user.register' }}">Register</a>
                  <a class="ready-btn page-scroll" href="{{ route('user.login') }}">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h4 class="title1">&nbsp;</h4>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">We made conversion of airtime to cash easier</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="{{ 'user.register' }}">Register</a>
                  <a class="ready-btn page-scroll" href="{{ 'user.login' }}">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h4 class="title1">&nbsp; </h4>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Helping Business Security  & Peace of Mind for Your Family</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <a class="ready-btn right-btn page-scroll" href="{{ 'user.register' }}">Register</a>
                    <a class="ready-btn page-scroll" href="{{ 'user.login' }}">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- direction 4 -->
       <div id="slider-direction-4" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1"></h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Cheapest yet legitimate</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="{{ 'user.register' }}">Register</a>
                  <a class="ready-btn page-scroll" href="{{ 'user.login' }}">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 5 -->
      <div id="slider-direction-5" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h4 class="title1">&nbsp;</h4>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">We got you covered for paying your TV Subscriptions</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="{{ 'user.register' }}">Register</a>
                  <a class="ready-btn page-scroll" href="{{ 'user.login' }}">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->

    <!-- Start About area -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>About ModelC</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <a href="#">
                                <img src="\home/img/bills.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <a href="#">
                                <h4 class="sec-head">Services</h4>
                            </a>
                            <p>
                                We offer a wid range of services which include
                            </p>
                            <ul>
                                <li>
                                    <i class="fa fa-check"></i>Data & Airtime top up
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Bills payment (Cable, Electricity)
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Airtime 2 Cash
                                </li>
                                <li>
                                    <i class="fa fa-check"></i> Airtime swap
                                </li>
                                <li>
                                    <i class="fa fa-check"></i> Referral option
                                </li>
                                <li>
                                    <i class="fa fa-check"></i> Bulk SMS and More
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div>
    <!-- End About area -->

    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline services-head text-center">
                <h2>Our Services</h2>
                </div>
            </div>
            </div>
            <div class="row text-center">
            <div class="services-contents">
                <!-- Start Left services -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="about-move">
                    <div class="services-details">
                    <div class="single-services">
                        <a class="services-icon" href="#">
                        <i class="fa fa-code"></i>
                        </a>
                        <h4>Data & Airtime top up</h4>
                        <p>We render cheapest data subscription and Airtime top up for all networks with topnotch technology
                        that delivers your data and airtime to you almost instantly. Start enjoying very low rates for all
                        your internet services!
                        </p>
                    </div>
                    </div>
                    <!-- end about-details -->
                </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="about-move">
                    <div class="services-details">
                    <div class="single-services">
                        <a class="services-icon" href="#">
                        <i class="fa fa-camera-retro"></i>
                        </a>
                        <h4>Bills payment (Cable, Electricity)</h4>
                        <p>Renew your cable subscription from the convenience of your home and enjoy great discounts. It’s
                        easy and super-fast!
                        </p>
                    </div>
                    </div>
                    <!-- end about-details -->
                </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                    <div class="services-details">
                    <div class="single-services">
                        <a class="services-icon" href="#">
                        <i class="fa fa-bar-chart"></i>
                        </a>
                        <h4>Airtime 2 Cash</h4>
                        <p>Mistakenly recharged large amount of airtime or you received same as a gift? We got you covered!
                        You can convert excess airtime to cash at amazing rates! [Find out more]
                        </p>
                    </div>
                    </div>
                    <!-- end about-details -->
                </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                    <div class="services-details">
                    <div class="single-services">
                        <a class="services-icon" href="#">
                        <i class="fa fa-ticket"></i>
                        </a>
                        <h4>Airtime swap</h4>
                        <p>We help you swap airtime from one network to another using a fully automated technology. Delivery
                        is fast and secure.
                        </p>
                    </div>
                    </div>
                    <!-- end about-details -->
                </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                    <div class="services-details">
                    <div class="single-services">
                        <a class="services-icon" href="#">
                        <i class="fa fa-wordpress"></i>
                        </a>
                        <h4>Referral option</h4>
                        <p>Unlimited Reward! Earn amazing rewards on our platform for each person you tell about us! </p>
                    </div>
                    </div>
                    <!-- end about-details -->
                </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                    <div class="services-details">
                    <div class="single-services">
                        <a class="services-icon" href="#">
                        <i class="fa fa-camera-retro"></i>
                        </a>
                        <h4>Bulk SMS</h4>
                        <p>Bulk SMS service has never been this cheap! Send Bulk SMS to any number for as low as 50 kobo per
                        unit.
                        </p>
                    </div>
                    </div>
                    <!-- end about-details -->
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- End Service area -->

  <!-- our-skill-area start -->
    <div class="our-skill-area fix hidden-sm">
        <div class="test-overly"></div>
        <div class="skill-bg area-padding-2">
            <div class="container">
            <!-- section-heading end -->
            <div class="row">
                <div class="skill-text">
                <!-- single-skill start -->
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <div class="single-skill">
                    <div class="progress-circular">
                        <input type="text" class="knob" value="0" data-rel="95" data-linecap="round" data-width="175"
                        data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                        <h3 class="progress-h4">Data Sold</h3>
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <div class="single-skill">
                    <div class="progress-circular">
                        <input type="text" class="knob" value="0" data-rel="85" data-linecap="round" data-width="175"
                        data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                        <h3 class="progress-h4">Airtime Purchased</h3>
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <div class="single-skill">
                    <div class="progress-circular">
                        <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="175"
                        data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                        <h3 class="progress-h4">Airtime Swapped</h3>
                    </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <div class="single-skill">
                    <div class="progress-circular">
                        <input type="text" class="knob" value="0" data-rel="65" data-linecap="round" data-width="175"
                        data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                        <h3 class="progress-h4">SMS Unit Sold</h3>
                    </div>
                    </div>
                </div>
                <!-- single-skill end -->
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- our-skill-area end -->

  <!-- Faq area start -->
  <div id="faq" class="faq-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Faq Question</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="faq-details">
            <div class="panel-group" id="accordion">
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                        <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">
                            <span class="acc-icons"></span>How can I fund my Wallet? .
                        </a>
                    </h4>
                </div>
                <div id="check1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p>
                        You can fund your wallet using any of our available payment options.
                        <ol>
                            <li> Online Payment with your ATM card details</li>
                            <li> via Pay stack Payment Gateway</li>
                            <li>. Bank payment.</li>
                            <li>. Payment with airtime.(Using the Airtime To Cash form)</li>
                        </ol>
                            <br/>
                        <ul>
                            <li>STEP 1 : Log In to your account(Create an account if you haven't)</li>
                            <li>STEP 2 : Click on the toggle menu at the Top Left corner.</li>
                            <li>STEP 3 : Click on "Fund Wallet".</li>
                            </li>STEP 4 : Select your Payment Method and fill in the necessary details.</li>
                        </ul>
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check2">
                        <span class="acc-icons"></span> How can I purchase/Vend Data? .
                    </a>
                  </h4>
                </div>
                <div id="check2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        STEP 1: Fund your wallet(If your balance is not sufficient enough)
                        <br/><br/>

                        STEP 2: Go to the Toggle Menu and select "Buy Data".
                        <br/><br>

                        STEP 3: Select Network Type and fill the data order form, proceed to purchase.
                        <br/><br/>
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check3">
                        <span class="acc-icons"></span>Can I share the data I buy from you with another line?

                    </a>
                </h4>
                </div>
                <div id="check3" class="panel-collapse collapse ">
                  <div class="panel-body">
                    <p>
                        You can only share Glo data plans.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->


              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check4">
                        <span class="acc-icons"></span>How can I be your agent?
                    </a>
                </h4>
                </div>
                <div id="check4" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        You can become our Agent, by retailing our products to others. Thereby, making profit.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check5">
                        <span class="acc-icons"></span>Can I send airtime to you for data bundle?
                    </a>
                </h4>
                </div>
                <div id="check5" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        Yes, you can, by simply funding your account with airtime using the airtime payment option. Kindly fill the "Airtime To Cash" form.- "Charges Apply"
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check6">
                        <span class="acc-icons"></span>Are your data plans legit?
                    </a>
                </h4>
                </div>
                <div id="check6" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        Our data plans are absolutely legitimate! We partner with major Telecommunications Companies to make services available to you.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check7">
                        <span class="acc-icons"></span>Is your data plan compatible with all devices?
                    </a>
                </h4>
                </div>
                <div id="check7" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        Yes, it is compatible with all devices.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check8">
                        <span class="acc-icons"></span>How do I check data balance?
                    </a>
                </h4>
                </div>
                <div id="check8" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        Data balance code:
                        <br/>
                        MTN => *461*4#
                        <br/>
                        9mobile[SME] => *917*9# or *229*9#
                        <br/>
                        9mobile[Gifting] => *228#
                        <br/>
                        Glo=> *127*0#
                        <br/>
                        Airtel=> *140#
                        <br/>
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check9">
                        <span class="acc-icons"></span>Does the data get exhausted quickly or disappear?
                    </a>
                </h4>
                </div>
                <div id="check9" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        Our data plans are sourced from Network providers. Therefore, consumption rate is similar to the data you get directly from them(i.e data charges are based on usage).
                    </p>
                    <p>
                        We suggest you kindly do the following to avoid unnecessary data depletion:
                    </p>
                    <ul>
                        <li>Restrict background data</li>
                        <li>Use data saving browser</li>
                        <li>Compress videos before streaming</li>
                        <li>Turn off data when not in use</li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check10">
                        <span class="acc-icons"></span>How am I sure you that I won't be swindled (scammed)?
                    </a>
                </h4>
                </div>
                <div id="check10" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        We've render legitimate services for not less than five years and have made reputation from our happy clients. We love to keep feedbacks. Hence, you can check our testimonials page for people's comment about us.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->

            <!-- Panel Default -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check11">
                        <span class="acc-icons"></span>What if my order has been approved, but not yet received?
                    </a>
                </h4>
                </div>
                <div id="check11" class="panel-collapse collapse">
                    <div class="panel-body">
                    <p>
                        Sincere apologies about that. We regret the inconvenience caused. Kindly reach out to us on Call/SMS/WhatsApp via 08137540652 or email support@modelc.com.ng with the order details.
                    </p>
                    </div>
                </div>
            </div>
                <!-- End Panel Default -->
                                            <!-- Panel Default -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#check12">
                        <span class="acc-icons"></span>What are the products/services you offer?
                    </a>
                </h4>
                </div>
                <div id="check12" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        We offer the best deals in Internet Data Plans, Airtime To cash, VTU, Electricity Bill Payment, GOtv, DStv & Startimes Subscriptions, Bulk SMS amongst others.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Panel Default -->
            <!-- Panel Default -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="check-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#check13">
                            <span class="acc-icons"></span>What's your working period?
                        </a>
                    </h4>
                </div>
                <div id="check13" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            All our products are available 24/7, but our customer support is available as follows: Mon -Saturday : 8am - 8pm, Sunday: 1pm-8pm.
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Panel Default -->

            <!-- Panel Default -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="check-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#check14">
                            <span class="acc-icons"></span>Can I communicate with you in case I have any enquiry?
                        </a>
                    </h4>
                </div>
                <div id="check14" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Yes, you can reach out to us on call/sms/whatsapp via 08137540652 or email support@modelc.com.ng
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Panel Default -->

            </div>
          </div>
        </div>
        {{-- <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="tab-menu">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="active">
                <a href="#p-view-1" role="tab" data-toggle="tab">Project</a>
              </li>
              <li>
                <a href="#p-view-2" role="tab" data-toggle="tab">Planning</a>
              </li>
              <li>
                <a href="#p-view-3" role="tab" data-toggle="tab">Success</a>
              </li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="p-view-1">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Project</h4>
                  <p>
                    Redug Lares dolor sit amet, consectetur adipisicing elit. Animi vero excepturi magnam ducimus adipisci voluptas, praesentium maxime necessitatibus in dolor dolores unde ab, libero quo. Aut, laborum sequi.
                  </p>
                  <p>
                    voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis placeat.
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-2">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Planning</h4>
                  <p>
                    voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis.
                  </p>
                  <p>
                    Redug Lares dolor sit amet, consectetur adipisicing elit. Animi vero excepturi magnam ducimus adipisci voluptas, praesentium maxime necessitatibus in dolor dolores unde ab, libero quo. Aut.
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-3">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Success</h4>
                  <p>
                    voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis placeat.
                  </p>
                  <p>
                    voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      <!-- end Row -->
    </div>
  </div>
  <!-- End Faq Area -->

  <!-- Start Wellcome Area -->
  <div class="wellcome-area">
    <div class="well-bg">
      <div class="test-overly"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="wellcome-text">
              <div class="well-text text-center">
                <h2>Welcome To {{ config('constants.site.name') }}</h2>
                <p>
                  Get connected with with updates from us
                </p>
                <div class="subs-feilds">
                  <div class="suscribe-input">
                    <input type="email" class="email form-control width-80" id="sus_email" placeholder="Email">
                    <button type="submit" id="sus_submit" class="add-btn width-20 btn-primary">Subscribe</button>
                    <div id="msg_Submit" class="h3 text-center hidden"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Wellcome Area -->



{{--   <!-- Start reviews Area -->
  <div class="reviews-area hidden-xs">
    <div class="work-us">
      <div class="work-left-text">
        <a href="#">
            <img src="\home/img/about/2.jpg" alt="">
        </a>
      </div>
      <div class="work-right-text text-center">
        <h2>working with us</h2>
        <h5>Web Design, Ready Home, Construction and Co-operate Outstanding Buildings.</h5>
        <a href="#contact" class="ready-btn">Contact us</a>
      </div>
    </div>
  </div>
  <!-- End reviews Area --> --}}

{{--   <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Our Portfolio</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        <div class="awesome-project-1 fix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="awesome-menu ">
              <ul class="project-menu">
                <li>
                  <a href="#" class="active" data-filter="*">All</a>
                </li>
                <li>
                  <a href="#" data-filter=".development">Development</a>
                </li>
                <li>
                  <a href="#" data-filter=".design">Design</a>
                </li>
                <li>
                  <a href="#" data-filter=".photo">Photoshop</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="awesome-project-content">
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="\home/img/portfolio/1.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="\home/img/portfolio/1.jpg">
                      <h4>Business City</h4>
                      <span>Web Development</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 photo">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="\home/img/portfolio/2.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="\home/img/portfolio/2.jpg">
                      <h4>Blue Sea</h4>
                      <span>Photosho</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="\home/img/portfolio/3.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="\home/img/portfolio/3.jpg">
                      <h4>Beautiful Nature</h4>
                      <span>Web Design</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 photo development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="\home/img/portfolio/4.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="\home/img/portfolio/4.jpg">
                      <h4>Creative Team</h4>
                      <span>Web design</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="\home/img/portfolio/5.jpg" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="\home/img/portfolio/5.jpg">
                      <h4>Beautiful Flower</h4>
                      <span>Web Development</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design photo">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="\home/img/portfolio/6.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="\home/img/portfolio/6.jpg">
                      <h4>Night Hill</h4>
                      <span>Photoshop</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end --> --}}
  <!-- start pricing area -->

  <div id="pricing" class="pricing-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Data Pricing</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($dataPlans as $networks)
         @if($loop->iteration > 4 ) @continue @endif
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="block-pricing table-{{ strtolower($networks[0]->network) }}">
                    <div class="text-center">
                        <span class="saleon">Promo</span>
                        <h6 class="category"></h6>
                        <h1 class="block-caption">
                            <img class="logo  text-center" src="\images/networks/{{ strtolower($networks[0]->network) }}.png">
                        </h1>
                        <ul>
                            @foreach ($networks as $plan)
                                <li>{{ $plan->volume }} - @naira($plan->amount)</li>
                            @endforeach
                        </ul>
                        <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Buy Now</button>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- End pricing table area -->
{{--   <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
              <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
              <!-- start testimonial carousel -->
              <div class="testimonial-carousel">
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Boby</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Jhon</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Fleming</h6>
                  </div>
                </div>
                <!-- End single item -->
              </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials --> --}}
  <!-- Start Blog Area -->
  {{-- <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Latest News</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start Left Blog -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="blog.html">
										<img src="\home/img/blog/1.jpg" alt="">
									</a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
										<i class="fa fa-comment-o"></i>
										<a href="#">13 comments</a>
									</span>
                <span class="date-type">
										<i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
									</span>
              </div>
              <div class="blog-text">
                <h4>
                                        <a href="blog.html">Assumenda repud eum veniam</a>
									</h4>
                <p>
                  Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                </p>
              </div>
              <span>
									<a href="blog.html" class="ready-btn">Read more</a>
								</span>
            </div>
            <!-- Start single blog -->
          </div>
          <!-- End Left Blog-->
          <!-- Start Left Blog -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="blog.html">
										<img src="\home/img/blog/2.jpg" alt="">
									</a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
										<i class="fa fa-comment-o"></i>
										<a href="#">130 comments</a>
									</span>
                <span class="date-type">
										<i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
									</span>
              </div>
              <div class="blog-text">
                <h4>
                                        <a href="blog.html">Explicabo magnam quibusdam.</a>
									</h4>
                <p>
                  Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                </p>
              </div>
              <span>
									<a href="blog.html" class="ready-btn">Read more</a>
								</span>
            </div>
            <!-- Start single blog -->
          </div>
          <!-- End Left Blog-->
          <!-- Start Right Blog-->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="blog.html">
										<img src="\home/img/blog/3.jpg" alt="">
									</a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
										<i class="fa fa-comment-o"></i>
										<a href="#">10 comments</a>
									</span>
                <span class="date-type">
										<i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
									</span>
              </div>
              <div class="blog-text">
                <h4>
                                        <a href="blog.html">Lorem ipsum dolor sit amet</a>
									</h4>
                <p>
                  Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                </p>
              </div>
              <span>
									<a href="blog.html" class="ready-btn">Read more</a>
								</span>
            </div>
          </div>
          <!-- End Right Blog-->
        </div>
      </div>
    </div>
  </div> --}}
  <!-- End Blog -->
  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Need Cheap Data Subscription</h3>
            <a class="sus-btn" href="{{ route('data.buy') }}">Buy Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        {{-- <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Call: {{ config('constants.site.phone') }}<br>
                  <span>Monday-Friday (9am-5pm)</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: {{ config('constants.site.email') }}<br>
                  <span>Web: www.example.com</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  {{ config('constants.site.address') }}
                </p>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
            <iframe src="{{ config('constants.site.googleMap') }}" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" class="btn btn-primary">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2>{{ config('constants.site.name') }}</h2>
                </div>

                <p>
                    Modelc Global Enterprise offers cheapest yet legitimate services which include but not limited to Internet Data Subscriptions, Airtime To Cash, Airtime(VTU), CableTV (DStv, GOtv & Startimes), Electricity Bill Payemnt.
                </p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                    Have enquiries? Please contact us.

                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> {{ config('constants.site.phone') }}</p>
                  <p><span>Email:</span> {{ config('constants.site.email') }}</p>
                  <p><span>Working Hours:</span> 24/7</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="\home/img/portfolio/1.jpg" alt=""></a>
                  <a href="#"><img src="\home/img/portfolio/2.jpg" alt=""></a>
                  <a href="#"><img src="\home/img/portfolio/3.jpg" alt=""></a>
                  <a href="#"><img src="\home/img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="\home/img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="\home/img/portfolio/6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>{{ strtolower(config('constants.site.name')) }}</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Site by <a href="https://facebook.com/9jaloads/">9jaloads</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="\home/lib/jquery/jquery.min.js"></script>
  <script src="\home/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="\home/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="\home/lib/venobox/venobox.min.js"></script>
  <script src="\home/lib/knob/jquery.knob.js"></script>
  <script src="\home/lib/wow/wow.min.js"></script>
  <script src="\home/lib/parallax/parallax.js"></script>
  <script src="\home/lib/easing/easing.min.js"></script>
  <script src="\home/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="\home/lib/appear/jquery.appear.js"></script>
  <script src="\home/lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="\home/contactform/contactform.js"></script>

  <script src="\home/js/main.js"></script>
</body>

</html>
