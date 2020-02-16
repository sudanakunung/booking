<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="GARO is a real-estate template">
    <meta name="author" content="Kimarotec">
    <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

    <!-- Place favicon.ico and apple-touch-icon.png') }} in the root directory -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/fontello.css') }}">
    <link href="{{ asset('vendors/hehehe/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/hehehe/assets/fonts/icon-7-stroke/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/hehehe/assets/css/animate.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/bootstrap-select.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/icheck.min_all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/price-range.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/owl.carousel.css') }}">  
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/responsive.css') }}">
    <style>
        .navbar-default .navbar-nav > li > a::after {
            background-color: #FC6E51;
        }
        .navbar-default .navbar-nav > li > a.active:after {
            background-color: #FC6E51;
        }

        .nav-button:hover {
            background-color: #37BC9B;
        }
        .nav-button.login {
            background-color: #FC6E51;
        }
        .nav-button {
            background-color: #48CFAD;
        }
        .proerty-th .proerty-item .item-entry h5::after {
            display: none;
        }
    </style>
    @yield('css')
</head>
<body>

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Body content -->

    @include('frnt.nav')
    @include('sweetalert::alert')

    @yield('content')

    @include('frnt.footer')
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/jquery-1.10.2.min.js') }}"></script> 
    <script src="{{ asset('vendors/hehehe/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/bootstrap-hover-dropdown.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/wow.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/icheck.min.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/price-range.js') }}"></script>
    <script src="{{ asset('vendors/hehehe/assets/js/main.js') }}"></script>
    @yield('js')
</body>
</html>