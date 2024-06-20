<!DOCTYPE html>
<html lang="en">
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
    <title>CodeZone - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/images/favicon.png') }}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
</head>
<body>

<div id="main-wrapper">
    @include('admin.blocks.header')
    @include('admin.blocks.sidebar')
    <div class="content-body">
        @yield('content')
    </div>
    @include('admin.blocks.footer')
</div>

<script src="{{ asset('admin_assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/deznav-init.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/morris/morris.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/peity/jquery.peity.min.js') }} "></script>

<script src="{{ asset('admin_assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- <script src="{{ asset('admin_assets/js/dashboard/dashboard-2.js') }} "></script> -->
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>

<script src="{{ asset('admin_assets/vendor/svganimation/vivus.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/svganimation/svg.animation.js') }}"></script>
@yield('scripts')
</body>
</html>
