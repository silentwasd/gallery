<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Meta -->
    <meta name="description" content="Ruby - Responsive Bootstrap 5 Dashboard Template"/>
    <meta name="author" content="Bootstrap Gallery"/>
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="/control/images/favicon.svg"/>

    <!-- Title -->
    <title>Control panel</title>

    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="/control/css/bootstrap.min.css"/>

    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="/control/fonts/bootstrap/bootstrap-icons.css"/>

    <!-- Main css -->
    <link rel="stylesheet" href="/control/css/main.min.css"/>

    <!-- *************
        ************ Vendor Css Files *************
    ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="/control/vendor/overlay-scroll/OverlayScrollbars.min.css"/>
</head>

<body>

<!-- Page wrapper start -->
<div class="page-wrapper">

    <!-- Page header starts -->
    <div class="page-header">

        <div class="toggle-sidebar" id="toggle-sidebar">
            <i class="bi bi-list"></i>
        </div>

        @include('includes.control.header-actions')

    </div>
    <!-- Page header ends -->

    <!-- Main container start -->
    <div class="main-container">

        @include('includes.control.sidebar')

        <!-- Content wrapper scroll start -->
        <div class="content-wrapper-scroll">

            <!-- Main header starts -->
            <div class="main-header">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="page-icon">
                        @yield('icon')
                    </div>
                    <div class="page-title d-none d-md-block">
                        @yield('title')
                    </div>
                </div>

                @yield('header')
            </div>
            <!-- Main header ends -->

            <!-- Content wrapper start -->
            <div class="content-wrapper">

                @yield('content')

            </div>
            <!-- Content wrapper end -->

        </div>
        <!-- Content wrapper scroll end -->

        <!-- App Footer start -->
        <div class="app-footer">
            <span>© Bootstrap Gallery 2023</span>
        </div>
        <!-- App footer end -->

    </div>
    <!-- Main container end -->

</div>
<!-- Page wrapper end -->

<!-- *************
    ************ Required JavaScript Files *************
************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="/control/js/jquery.min.js"></script>
<script src="/control/js/bootstrap.bundle.min.js"></script>
<script src="/control/js/modernizr.js"></script>
<script src="/control/js/moment.js"></script>

<!-- *************
    ************ Vendor Js Files *************
************* -->

<!-- Overlay Scroll JS -->
<script src="/control/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
<script src="/control/vendor/overlay-scroll/custom-scrollbar.js"></script>

<!-- News ticker -->
<script src="/control/vendor/newsticker/newsTicker.min.js"></script>
<script src="/control/vendor/newsticker/custom-newsTicker.js"></script>

<!-- Main Js Required -->
<script src="/control/js/main.js"></script>
</body>
</html>
