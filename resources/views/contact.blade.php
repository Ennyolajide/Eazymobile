
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
                    <li><a href="{{ route('index') }}#about">About Us</a></li>
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
    <div class="page-head section row-vm light has-bg-image">
        <div class="imagebg bg-image-loaded" style="background-image: url(&quot;\home/images/page-inside-bg.jpg&quot;);">
            <img src="\home/images/page-inside-bg.jpg" alt="page-head">
        </div>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2>Contact Us</h2>
                    <div class="page-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li class="active"><span>Contact Us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-6 res-m-bttm">
                    <div class="contact-information">
                        <h4>Contact Information</h4>
                        <div class="row">
                            <div class="col-sm-4 col-xs-4 res-m-bttm">
                                <div class="contact-entry">
                                    <h6>{{ config('constants.site.name') }}</h6>
                                    <p>{!! config('constants.site.address') !!}</p>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-4 res-m-bttm">
                                <div class="contact-entry">
                                    <h6>contact number</h6>
                                    <p>{{  str_replace(' ', '', config('constants.site.phone'))  }}  <br> {{ str_replace(' ', '', config('constants.site.phone')) }}</p>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-4 res-m-bttm">
                                <div class="contact-entry">
                                    <h6>office hours</h6>
                                    <p>monday - friday<br>8:30am - 5:00pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form">
                        <p>Complete and submit the form below</p>
                        <form id="contact-form" class="form-message" action="form/contact.php" method="post" novalidate="novalidate">
                            <div class="form-results"></div>
                            <div class="form-group row">
                                <div class="form-field col-sm-6 form-m-bttm">
                                    <input name="contact-name" type="text" placeholder="Full Name *" class="form-control required" aria-required="true">
                                </div>
                                <div class="form-field col-sm-6">
                                    <input name="contact-email" type="email" placeholder="Email *" class="form-control required email" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-field col-sm-6 form-m-bttm">
                                    <input name="contact-phone" type="text" placeholder="Phone Number *" class="form-control required" aria-required="true">
                                </div>
                                <div class="form-field col-sm-6">
                                    <input name="contact-subject" type="text" placeholder="Subject *" class="form-control required" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-field col-md-12">
                                    <textarea name="contact-message" placeholder="Messages *" class="txtarea form-control required" aria-required="true" style="height: 155px;"></textarea>
                                </div>
                            </div>
                            <input type="text" class="hidden" name="form-anti-honeypot" value="">
                            <button type="submit" class="btn btn-alt" disabled>Submit</button>
                        </form>
                    </div>
                </div><!-- .col  -->
                <div class="col-md-6">
                    <br/><br/>
                    <iframe src="{{ config('constants.site.googleMap') }}" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <!--a href="#" class="map-link">View on google map <span class="fa fa-caret-right"></span></a-->
                </div><!-- .col  -->
            </div>
        </div>
    </div>
@endSection
