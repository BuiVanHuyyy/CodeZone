<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eduzone.dexignzone.com/admin/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 08:58:56 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="EduZone - Bootstrap Admin Dashboard" />
    <meta property="og:title" content="EduZone - Bootstrap Admin Dashboard" />
    <meta property="og:description" content="EduZone - Bootstrap Admin Dashboard" />
    <meta property="og:image" content="https://eduzone.dexignzone.com/xhtml/error-404.html" />
    <meta name="format-detection" content="telephone=no">
    <title>CodeZone - Dashboard </title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/images/favicon.png') }}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
</head>
<body>

<div id="main-wrapper">
    @include('admin.blocks.header')
    <!--Sidebar start-->
    @include('admin.blocks.sidebar')
    <!--Sidebar end-->

    <!--Content body start-->
    <div class="content-body">
        @yield('content')
    </div>
    <!--Content body end-->


    <!--Footer start-->
    @include('admin.blocks.footer')
    <!--Footer end-->
</div>
<!-- Required vendors -->
<script src="{{ asset('admin_assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/deznav-init.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>

<!-- Chart Morris plugin files -->
<script src="{{ asset('admin_assets/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/morris/morris.min.js') }}"></script>


<!-- Chart piety plugin files -->
<script src="{{ asset('admin_assets/vendor/peity/jquery.peity.min.js') }} "></script>

<!-- Demo scripts -->
<script src="{{ asset('admin_assets/js/dashboard/dashboard-2.js') }} "></script>
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
<!-- Svganimation scripts -->
<script src="{{ asset('admin_assets/vendor/svganimation/vivus.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/svganimation/svg.animation.js') }}"></script>
@yield('scripts')
</body>

<!-- Mirrored from eduzone.dexignzone.com/admin/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 08:59:01 GMT -->
</html>
