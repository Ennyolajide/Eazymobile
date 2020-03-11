<!DOCTYPE html>
<html lang="en" class="js">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Eniseyin Olajide">
		<meta name="description" content="{{ config('constants.site.description') }}">
		<!-- Fav Icon  -->
        <link rel="apple-touch-icon" sizes="57x57" href="\images/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="\images/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="\images/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="\images/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="\images/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="\images/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="\images/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="\images/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="\images/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="\images/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="\images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="\images/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="\images/favicons/favicon-16x16.png">
        <link rel="manifest" href="\images/favicons/manifest.json">
        <meta name="msapplication-TileColor" content="#159fff">
        <meta name="msapplication-TileImage" content="\images/favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#159fff">
        <!-- /Fav Icon  -->
		<!-- Site Title  -->
		<title>{{ config('constants.site.name') }} - {{ config('constants.site.description') }}</title>
		<!-- Vendor Bundle CSS -->
		<link rel="stylesheet" href="\home/assets/css/vendor.bundle.css" >
		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="\home/assets/css/style.css?ver=1.0">
        <link rel="stylesheet" id="layoutstyle" href="\home/assets/css/theme.css?ver=1.0">
        <!-- additional css-->
        @yield('css')
        <!-- additional script-->
        @yield('head-scripts')

	</head>
	<body id="content">
        <!-- Header -->
        <header class="site-header header-s1 is-sticky">
            @yield('header')
            @yield('slider')
        </header>
        <!-- End Header -->

        @yield('btcTracker')

        @yield('content')

        @include('layouts.footer')

        <script src="\home/assets/js/jquery.bundle.js"></script>
		<script src="\home/assets/js/script.js"></script>

        @yield('scripts')
    </body>
</html>


