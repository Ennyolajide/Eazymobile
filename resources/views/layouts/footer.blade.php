<!-- Section Footer -->
<div class="footer-section section section-pad-md light bg-footer">
    <div class="imagebg footerbg">
        <img src="\home/images/footer-bg.png" alt="footer-bg">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 hidden-xs wgs-box res-m-bttm-lg">
                <!-- Each Widget -->
                <div class="wgs-footer wgs-menu">
                    <h5 class="wgs-title ucap">Services</h5>
                    <div class="wgs-content">
                        <ul class="menu">
                        <li><a href="{{ route('user.login') }}">Buy Data</a></li>
                            <li><a href="{{ route('user.login') }}">Airtime Topup</a></li>
                            <li><a href="{{ route('user.login') }}">Airtime To Cash</a></li>
                            <li><a href="{{ route('user.login') }}">Bitcoin Trading</a></li>
                            <li><a href="{{ route('user.login') }}">Bill Payments</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Widget -->
            </div>
            <div class="col-md-4 col-sm-6 hidden-xs wgs-box res-m-bttm-lg">
                <!-- Each Widget -->
                <div class="wgs-footer wgs-menu">
                    <h5 class="wgs-title ucap">Information</h5>
                    <div class="wgs-content">
                        <ul class="menu">
                            <li><a href="#">Airtime Swap</a></li>
                            <li><a href="#">Bulk Sms </a></li>
                            <li><a href="{{ route('user.register') }}">Getting Started</a></li>
                            <li><a href="index.html#">Bill Payments</a></li>
                            <li><a href="#">Data Reselling Guide</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Widget -->
            </div>

            <div class="col-md-4 col-sm-6 wgs-box res-m-bttm">
                <!-- Each Widget -->
                <div class="wgs-footer wgs-contact">
                    <h5 class="wgs-title ucap">get in touch</h5>
                    <div class="wgs-content">
                        <ul class="wgs-contact-list">
                            <li><span class="pe pe-7s-map-marker"></span></li>
                            <li><span class="pe pe-7s-call"></span>Telephone : {{ config('constants.site.phone') }} <br/>Telephone : {{ config('constants.site.phone2') }}</li>
                            <li><span class="pe pe-7s-global"></span>Email : <a href="mailto:{{ config('constants.site.email') }}">{{ config('constants.site.email') }}</a> <br/>Web : <a href="http://{{ config('constants.site.url') }}">{{ config('constants.site.url') }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Widget -->
            </div>
        </div>
    </div>
</div>
<!-- End Section -->

<!-- Copyright -->
<div class="copyright light">
    <div class="container">
        <div class="row">
            <div class="site-copy col-sm-7">
                <p>
                    {!! config('constants.site.about') !!}
                    <script type="text/javascript">
                        <!--
                        eval(unescape('%66%75%6e%63%74%69%6f%6e%20%65%35%34%61%61%39%61%36%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%31%37%34%35%30%38%35%30%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%37%32%32%33%38%33%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%39%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
                        eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%65%35%34%61%61%39%61%36%28%27') + '%4f%65%62%5c%17%39%76%10%31%5a%14%57%6a%59%58%3d%19%5f%6b%6d%60%68%33%25%2e%5e%5d%5f%55%59%66%66%64%22%58%64%67%2e%33%64%5d%6a%66%58%5b%6c%1e%37%4b%5f%53%3c%63%6f%62%5c%69%33%20%5f%3717450850%35%35%39%30%30%30%36' + unescape('%27%29%29%3b'));
                        // -->
                    </script>
                </p>
            </div>
            <div class="col-sm-5 text-right mobile-left">
                <ul class="social">
                    <li><a href="{{ config('constants.site.facebook') }}"><em class="fa fa-facebook"></em></a></li>
                    <li><a href="{{ config('constants.site.twitter') }}"><em class="fa fa-twitter"></em></a></li>
                    <li><a href="{{ config('constants.site.instagram') }}"><em class="fa fa-instagram"></em></a></li>
                    <li><a href="{{ config('constants.site.telegram') }}"><em class="fa fa-telegram"></em></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Copyright -->

<!-- Preloader !remove please if you do not want -->
<div id="preloader"><div id="status">&nbsp;</div></div>
<!-- Preloader End -->
