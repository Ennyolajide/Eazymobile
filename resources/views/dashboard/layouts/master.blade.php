<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="_token" content="{{ csrf_token() }}" />
        <meta name="description" content="">
        <meta name="author" content="Eniseyin Olajide">
        <title>@yield('title') | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <!-- Theme style -->
        <link href="\styles/style.min.css" rel="stylesheet">
        <!-- Themify Icon -->
        <link rel="stylesheet" href="\plugins/fonts/themify-icons/themify-icons.css">
        <!-- mCustomScrollbar -->
	    <link rel="stylesheet" href="\plugins/mCustomScrollbar/jquery.mCustomScrollbar.min.css">
	    <!-- Waves Effect -->
	    <link rel="stylesheet" href="\plugins/waves/waves.min.css">
        <!-- Animate.css -->
        <!--link href="\css/animate.min.css" rel="stylesheet"-->
        <!-- Sweet Alert -->
	    <link rel="stylesheet" href="\plugins/sweet-alert/sweetalert.css">
        <!-- Custom Theme Style -->
        <link href="\styles/custom.min.css" rel="stylesheet">

        <!-- Additional css -->
        @yield('css')
        <!-- Custom styles -->
        @yield('style')

        @yield('js')

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5cb5be96c1fe2560f3ff1308/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    </head>

    <body>
        <div class="main-menu">
            <header class="header">
                <a href="index.html" class="logo"><i class="ico ti-rocket"></i>Gent</a>
                <button type="button" class="button-close fa fa-times js__menu_close"></button>
            </header>
            <!-- /.header -->
            <div class="content">
                @include('dashboard.layouts.sidebar')
            </div>
            <!-- /.content -->
        </div>
        <!-- /.main-menu -->



        @include('dashboard.layouts.header')


        <!-- page content -->
        <div id="wrapper">
            <div class="main-content">
                <!-- loader-->
                @include('dashboard.layouts.loader')
                <!-- Main content -->
                @yield('content')
                <!-- /.content  -->

            </div>

            <!-- /.main-content -->
        </div>
        @include('dashboard.layouts.footer')

        <!-- Notifier -->
        {{-- simple modal without header and footer to display response form server to client --}}
        @include('dashboard.layouts.notifier')
        <!-- /.Notifier -->

        @yield('modals')

        <!-- jQuery -->
        <script src="\js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="\js/modernizr.min.js"></script>
        <script src="\js/bootstrap.min.js"></script>
        <!-- mCustomScroller -->
        <script src="\plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- NProgress -->
        <script src="\plugins/nprogress/nprogress.js"></script>
        <!-- Sweet-alert -->
        <script src="\plugins/sweet-alert/sweetalert.min.js"></script>
        <!-- Waves -->
        <script src="\plugins/waves/waves.min.js"></script>

        <!-- Notify -->
        @if( session('notification'))
            <script>
                $('#notification-modal').modal('show');
            </script>
        @endif
        @if( session('modal'))
            <script>
                $('#response-modal').modal('show');
            </script>
        @endif

        @yield('scripts')

        <!-- Custom Theme Scripts -->
        <script src="\js/main.min.js"></script>
    </body>
</html>
