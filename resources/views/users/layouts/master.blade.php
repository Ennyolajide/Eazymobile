<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>
        <link rel="stylesheet" href="\styles/style.min.css">

        <!-- Waves Effect -->
        <link rel="stylesheet" href="\plugins/waves/waves.min.css">
        @yield('css')

    </head>

    <body>
        @yield('content')

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="\js/jquery.min.js"></script>
        <script src="\js/modernizr.min.js"></script>
        <script src="\plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="\plugins/nprogress/nprogress.js"></script>
        <script src="\plugins/waves/waves.min.js"></script>

        <script src="\js/main.min.js"></script>
        @yield('scripts')
    </body>
</html>


