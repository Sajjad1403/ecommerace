<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Mar 2023 18:59:27 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Minia - Minimal Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('page_css')

</head>

<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layout.backend.header')
        @include('layout.backend.sidebar')

        <div class="main-content">
            <div class="page-content">
                @yield('content')
            </div>
            @include('layout.backend.footer')
        </div>
    </div>
  
    <!-- /Right-bar -->
    @include('layout.backend.right-sidebar')


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }} "></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }} "></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }} "></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }} "></script>
    <!-- pace js -->
    <script src="{{ asset('assets/libs/pace-js/pace.min.js') }} "></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }} "></script>

    <!-- Plugins js-->
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }} "></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }} ">
    </script>
    <!-- dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }} "></script>

    <script src="{{ asset('assets/js/app.js') }} "></script>
    @yield('page_js')

</body>


<!-- Mirrored from themesbrand.com/minia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Mar 2023 18:59:55 GMT -->

</html>
