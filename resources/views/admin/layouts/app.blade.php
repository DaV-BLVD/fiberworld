<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fiber World Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/logo-icon.svg') }}" type="image/x-icon">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Dashboard CSS -->
    <link href="{{ asset('admin/css/dashboard.css') }}" rel="stylesheet">

    <!-- Tabs CSS -->
    <link href="{{ asset('admin/plugins/tabs/style.css') }}" rel="stylesheet">

    <!-- jvectormap CSS -->
    <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />

    <!-- Custom scrollbar CSS -->
    <link href="{{ asset('admin/plugins/customscroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!-- Sidebar CSS -->
    <link href="{{ asset('admin/plugins/toggle-sidebar/css/sidemenu.css') }}" rel="stylesheet">
</head>

<body class="app sidebar-mini rtl">

    <div class="page">
        <!-- Sidebar -->
        @include('admin.components.sidebar')

        <!-- Main content -->
        <div class="app-content">
            <div class="side-app">

                <!-- Top navbar -->
                @include('admin.components.topbar')

                <!-- Page Content -->
                <div class="container-fluid pt-4">
                    @yield('content')
                </div>

                @yield('scripts')

            </div>
        </div>
    </div>

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Scripts -->
    <script src="{{ asset('admin/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/chart-echarts/echarts.js') }}"></script>
    <script src="{{ asset('admin/plugins/toggle-sidebar/js/sidemenu.js') }}"></script>
    <script src="{{ asset('admin/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/peitychart/peitychart.init.js') }}"></script>

    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/dashboard-sales.js') }}"></script>

    @stack('scripts')

</body>

</html>