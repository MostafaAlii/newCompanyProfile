<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>لوحة التحكم | @yield('pageTitle')</title>
    @if(getSetting('site_favicon') != null)
        <link rel="shortcut icon" href="{{ URL::asset('uploads/setting_images/'.getSetting('site_favicon')) }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ URL::asset('uploads/setting_images/no_favicon_found.png') }}" type="image/x-icon">
    @endif
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/material-icons/material-icons.css') }}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/material-vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/material.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/material-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/material-colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/custom-rtl.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/material-vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/colors/material-palette-gradient.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}">
    <!-- END: Custom CSS-->
    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

@include('admin.includes._header')
@include('admin.includes._sidebar')
<!-- BEGIN: Content-->
<div class="app-content content">
    @include('admin.includes._partials.messages')
    @yield('content')
</div>
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@include('admin.includes._footer')
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/material-vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/morris.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('app-assets/data/jvector/visitor-data.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/pages/material-app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/dashboard-sales.js') }}"></script>
<script src="{{ asset('app-assets/js/customFun.js') }}"></script>

<script>
    $(function(){
        // Categories Select
        $(".select2").select2({});
        // Product Image
    });
</script>
<!-- END: Page JS-->
@yield('js')
</body>
<!-- END: Body-->

</html>