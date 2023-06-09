<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <style type="text/css">/* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor, .chartjs-size-monitor-expand, .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand > div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink > div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }</style>
</head>
<body class="sidebar-mini layout-fixed sidebar-closed sidebar-collapse" style="height: auto;">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"
             style="display: none;">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.applications.new') }}" class="brand-link">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div
            class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
            <div class="os-resize-observer-host observed">
                <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
            </div>
            <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                <div class="os-resize-observer"></div>
            </div>
            <div class="os-content-glue" style="margin: 0px -8px;"></div>
            <div class="os-padding">
                <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                    <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">

                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-header">Кошельки</li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.wallets.create') }}" class="nav-link">
                                        <i class="nav-icon fa fa-plus"></i>
                                        <p>
                                            Добавить
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.wallets.list') }}" class="nav-link">
                                        <i class="nav-icon fa fa-list"></i>
                                        <p>
                                            Список
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-header">Заявки</li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.applications.new') }}" class="nav-link">
                                        <p>
                                            Новые
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.applications.blocked') }}" class="nav-link">
                                        <p>
                                            Заблокированые
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.applications.processed') }}" class="nav-link">
                                        <p>
                                            Обработаные
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-header">Отзывы</li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.reviews.new') }}" class="nav-link">
                                        <p>
                                            Новые
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.reviews.all') }}" class="nav-link">
                                        <p>
                                            Одобреные
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.reviews.add') }}" class="nav-link">
                                        <p>
                                            Добавить
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="height: 41.2357%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 844px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
{{--                        <h1 class="m-0">Dashboard</h1>--}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">Dashboard v1</li>--}}
{{--                        </ol>--}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>

{{--    <!-- Control Sidebar -->--}}
{{--    <aside class="control-sidebar control-sidebar-dark" style="display: none; top: 57px; height: 886px;">--}}
{{--        <!-- Control sidebar content goes here -->--}}
{{--        <div--}}
{{--            class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition"--}}
{{--            style="height: 886px;">--}}
{{--            <div class="os-resize-observer-host observed">--}}
{{--                <div class="os-resize-observer" style="left: 0px; right: auto;"></div>--}}
{{--            </div>--}}
{{--            <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">--}}
{{--                <div class="os-resize-observer"></div>--}}
{{--            </div>--}}
{{--            <div class="os-content-glue" style="margin: -16px; width: 0px; height: 0px;"></div>--}}
{{--            <div class="os-padding">--}}
{{--                <div class="os-viewport os-viewport-native-scrollbars-invisible">--}}
{{--                    <div class="os-content" style="padding: 16px; height: 100%; width: 100%;"><h5>Customize--}}
{{--                            AdminLTE</h5>--}}
{{--                        <hr class="mb-2">--}}
{{--                        <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Dark Mode</span></div>--}}
{{--                        <h6>Header Options</h6>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1"--}}
{{--                                                 class="mr-1"><span>Dropdown Legacy Offset</span></div>--}}
{{--                        <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>No border</span></div>--}}
{{--                        <h6>Sidebar Options</h6>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Collapsed</span></div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" checked="checked"--}}
{{--                                                 class="mr-1"><span>Fixed</span></div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" checked="checked" class="mr-1"><span>Sidebar Mini</span>--}}
{{--                        </div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini MD</span>--}}
{{--                        </div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini XS</span>--}}
{{--                        </div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Flat Style</span>--}}
{{--                        </div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Legacy Style</span>--}}
{{--                        </div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Compact</span></div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Indent</span>--}}
{{--                        </div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1"--}}
{{--                                                 class="mr-1"><span>Nav Child Hide on Collapse</span></div>--}}
{{--                        <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Disable Hover/Focus Auto-Expand</span>--}}
{{--                        </div>--}}
{{--                        <h6>Footer Options</h6>--}}
{{--                        <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>--}}
{{--                        <h6>Small Text Options</h6>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Body</span></div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Navbar</span></div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Brand</span></div>--}}
{{--                        <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Nav</span></div>--}}
{{--                        <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Footer</span></div>--}}
{{--                        <h6>Navbar Variants</h6>--}}
{{--                        <div class="d-flex"><select class="custom-select mb-3 text-light border-0 bg-white">--}}
{{--                                <option class="bg-primary">Primary</option>--}}
{{--                                <option class="bg-secondary">Secondary</option>--}}
{{--                                <option class="bg-info">Info</option>--}}
{{--                                <option class="bg-success">Success</option>--}}
{{--                                <option class="bg-danger">Danger</option>--}}
{{--                                <option class="bg-indigo">Indigo</option>--}}
{{--                                <option class="bg-purple">Purple</option>--}}
{{--                                <option class="bg-pink">Pink</option>--}}
{{--                                <option class="bg-navy">Navy</option>--}}
{{--                                <option class="bg-lightblue">Lightblue</option>--}}
{{--                                <option class="bg-teal">Teal</option>--}}
{{--                                <option class="bg-cyan">Cyan</option>--}}
{{--                                <option class="bg-dark">Dark</option>--}}
{{--                                <option class="bg-gray-dark">Gray dark</option>--}}
{{--                                <option class="bg-gray">Gray</option>--}}
{{--                                <option class="bg-light">Light</option>--}}
{{--                                <option class="bg-warning">Warning</option>--}}
{{--                                <option class="bg-white">White</option>--}}
{{--                                <option class="bg-orange">Orange</option>--}}
{{--                            </select></div>--}}
{{--                        <h6>Accent Color Variants</h6>--}}
{{--                        <div class="d-flex"></div>--}}
{{--                        <select class="custom-select mb-3 border-0">--}}
{{--                            <option>None Selected</option>--}}
{{--                            <option class="bg-primary">Primary</option>--}}
{{--                            <option class="bg-warning">Warning</option>--}}
{{--                            <option class="bg-info">Info</option>--}}
{{--                            <option class="bg-danger">Danger</option>--}}
{{--                            <option class="bg-success">Success</option>--}}
{{--                            <option class="bg-indigo">Indigo</option>--}}
{{--                            <option class="bg-lightblue">Lightblue</option>--}}
{{--                            <option class="bg-navy">Navy</option>--}}
{{--                            <option class="bg-purple">Purple</option>--}}
{{--                            <option class="bg-fuchsia">Fuchsia</option>--}}
{{--                            <option class="bg-pink">Pink</option>--}}
{{--                            <option class="bg-maroon">Maroon</option>--}}
{{--                            <option class="bg-orange">Orange</option>--}}
{{--                            <option class="bg-lime">Lime</option>--}}
{{--                            <option class="bg-teal">Teal</option>--}}
{{--                            <option class="bg-olive">Olive</option>--}}
{{--                        </select><h6>Dark Sidebar Variants</h6>--}}
{{--                        <div class="d-flex"></div>--}}
{{--                        <select class="custom-select mb-3 text-light border-0 bg-primary">--}}
{{--                            <option>None Selected</option>--}}
{{--                            <option class="bg-primary">Primary</option>--}}
{{--                            <option class="bg-warning">Warning</option>--}}
{{--                            <option class="bg-info">Info</option>--}}
{{--                            <option class="bg-danger">Danger</option>--}}
{{--                            <option class="bg-success">Success</option>--}}
{{--                            <option class="bg-indigo">Indigo</option>--}}
{{--                            <option class="bg-lightblue">Lightblue</option>--}}
{{--                            <option class="bg-navy">Navy</option>--}}
{{--                            <option class="bg-purple">Purple</option>--}}
{{--                            <option class="bg-fuchsia">Fuchsia</option>--}}
{{--                            <option class="bg-pink">Pink</option>--}}
{{--                            <option class="bg-maroon">Maroon</option>--}}
{{--                            <option class="bg-orange">Orange</option>--}}
{{--                            <option class="bg-lime">Lime</option>--}}
{{--                            <option class="bg-teal">Teal</option>--}}
{{--                            <option class="bg-olive">Olive</option>--}}
{{--                        </select><h6>Light Sidebar Variants</h6>--}}
{{--                        <div class="d-flex"></div>--}}
{{--                        <select class="custom-select mb-3 border-0">--}}
{{--                            <option>None Selected</option>--}}
{{--                            <option class="bg-primary">Primary</option>--}}
{{--                            <option class="bg-warning">Warning</option>--}}
{{--                            <option class="bg-info">Info</option>--}}
{{--                            <option class="bg-danger">Danger</option>--}}
{{--                            <option class="bg-success">Success</option>--}}
{{--                            <option class="bg-indigo">Indigo</option>--}}
{{--                            <option class="bg-lightblue">Lightblue</option>--}}
{{--                            <option class="bg-navy">Navy</option>--}}
{{--                            <option class="bg-purple">Purple</option>--}}
{{--                            <option class="bg-fuchsia">Fuchsia</option>--}}
{{--                            <option class="bg-pink">Pink</option>--}}
{{--                            <option class="bg-maroon">Maroon</option>--}}
{{--                            <option class="bg-orange">Orange</option>--}}
{{--                            <option class="bg-lime">Lime</option>--}}
{{--                            <option class="bg-teal">Teal</option>--}}
{{--                            <option class="bg-olive">Olive</option>--}}
{{--                        </select><h6>Brand Logo Variants</h6>--}}
{{--                        <div class="d-flex"></div>--}}
{{--                        <select class="custom-select mb-3 border-0">--}}
{{--                            <option>None Selected</option>--}}
{{--                            <option class="bg-primary">Primary</option>--}}
{{--                            <option class="bg-secondary">Secondary</option>--}}
{{--                            <option class="bg-info">Info</option>--}}
{{--                            <option class="bg-success">Success</option>--}}
{{--                            <option class="bg-danger">Danger</option>--}}
{{--                            <option class="bg-indigo">Indigo</option>--}}
{{--                            <option class="bg-purple">Purple</option>--}}
{{--                            <option class="bg-pink">Pink</option>--}}
{{--                            <option class="bg-navy">Navy</option>--}}
{{--                            <option class="bg-lightblue">Lightblue</option>--}}
{{--                            <option class="bg-teal">Teal</option>--}}
{{--                            <option class="bg-cyan">Cyan</option>--}}
{{--                            <option class="bg-dark">Dark</option>--}}
{{--                            <option class="bg-gray-dark">Gray dark</option>--}}
{{--                            <option class="bg-gray">Gray</option>--}}
{{--                            <option class="bg-light">Light</option>--}}
{{--                            <option class="bg-warning">Warning</option>--}}
{{--                            <option class="bg-white">White</option>--}}
{{--                            <option class="bg-orange">Orange</option>--}}
{{--                            <a href="#">clear</a></select></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">--}}
{{--                <div class="os-scrollbar-track">--}}
{{--                    <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden">--}}
{{--                <div class="os-scrollbar-track">--}}
{{--                    <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="os-scrollbar-corner"></div>--}}
{{--        </div>--}}
{{--    </aside>--}}
    <!-- /.control-sidebar -->
    <div id="sidebar-overlay"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>


<div class="daterangepicker ltr show-ranges opensright">
    <div class="ranges">
        <ul>
            <li data-range-key="Today">Today</li>
            <li data-range-key="Yesterday">Yesterday</li>
            <li data-range-key="Last 7 Days">Last 7 Days</li>
            <li data-range-key="Last 30 Days">Last 30 Days</li>
            <li data-range-key="This Month">This Month</li>
            <li data-range-key="Last Month">Last Month</li>
            <li data-range-key="Custom Range">Custom Range</li>
        </ul>
    </div>
    <div class="drp-calendar left">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-calendar right">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-buttons"><span class="drp-selected"></span>
        <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
        <button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button>
    </div>
</div>
<div class="jqvmap-label" style="display: none;"></div>
</body>
</html>
{{--<html lang="en" style="height: auto;">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Dashboard</title>--}}

{{--    <!-- Google Font: Source Sans Pro -->--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">--}}
{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">--}}
{{--    <!-- Ionicons -->--}}
{{--    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">--}}
{{--    <!-- Tempusdominus Bootstrap 4 -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">--}}
{{--    <!-- iCheck -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">--}}
{{--    <!-- JQVMap -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">--}}
{{--    <!-- Theme style -->--}}
{{--    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">--}}
{{--    <!-- overlayScrollbars -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">--}}
{{--    <!-- Daterange picker -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">--}}
{{--    <!-- summernote -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">--}}
{{--    <style type="text/css">/* Chart.js */--}}
{{--        @keyframes chartjs-render-animation {--}}
{{--            from {--}}
{{--                opacity: .99--}}
{{--            }--}}
{{--            to {--}}
{{--                opacity: 1--}}
{{--            }--}}
{{--        }--}}

{{--        .chartjs-render-monitor {--}}
{{--            animation: chartjs-render-animation 1ms--}}
{{--        }--}}

{{--        .chartjs-size-monitor, .chartjs-size-monitor-expand, .chartjs-size-monitor-shrink {--}}
{{--            position: absolute;--}}
{{--            direction: ltr;--}}
{{--            left: 0;--}}
{{--            top: 0;--}}
{{--            right: 0;--}}
{{--            bottom: 0;--}}
{{--            overflow: hidden;--}}
{{--            pointer-events: none;--}}
{{--            visibility: hidden;--}}
{{--            z-index: -1--}}
{{--        }--}}

{{--        .chartjs-size-monitor-expand > div {--}}
{{--            position: absolute;--}}
{{--            width: 1000000px;--}}
{{--            height: 1000000px;--}}
{{--            left: 0;--}}
{{--            top: 0--}}
{{--        }--}}

{{--        .chartjs-size-monitor-shrink > div {--}}
{{--            position: absolute;--}}
{{--            width: 200%;--}}
{{--            height: 200%;--}}
{{--            left: 0;--}}
{{--            top: 0--}}
{{--        }</style>--}}
{{--</head>--}}
{{--<body class="sidebar-mini layout-fixed sidebar-open" style="height: auto;">--}}
{{--<div class="wrapper">--}}

{{--    <!-- Preloader -->--}}
{{--    <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">--}}
{{--        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"--}}
{{--             style="display: none;">--}}
{{--    </div>--}}

{{--    <!-- Navbar -->--}}
{{--    <nav class="main-header navbar navbar-expand navbar-white navbar-light">--}}
{{--        <!-- Left navbar links -->--}}
{{--        <ul class="navbar-nav">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--    <!-- /.navbar -->--}}

{{--    <!-- Main Sidebar Container -->--}}
{{--    <aside class="main-sidebar sidebar-dark-primary elevation-4">--}}
{{--        <!-- Brand Logo -->--}}
{{--        <a href="{{ route('admin.applications.new') }}" class="brand-link">--}}
{{--            <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
{{--        </a>--}}

{{--        <!-- Sidebar -->--}}
{{--        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">--}}
{{--            <div class="os-resize-observer-host observed">--}}
{{--                <div class="os-resize-observer" style="left: 0px; right: auto;"></div>--}}
{{--            </div>--}}
{{--            <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">--}}
{{--                <div class="os-resize-observer"></div>--}}
{{--            </div>--}}
{{--            <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 900px;"></div>--}}
{{--            <div class="os-padding">--}}
{{--                <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">--}}
{{--                    <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">--}}
{{--                        <!-- Sidebar Menu -->--}}
{{--                        <nav class="mt-2">--}}
{{--                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">--}}
{{--                                <li class="nav-header">Кошельки</li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.wallets.create') }}" class="nav-link">--}}
{{--                                        <i class="nav-icon fa fa-plus"></i>--}}
{{--                                        <p>--}}
{{--                                            Добавить--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.wallets.list') }}" class="nav-link">--}}
{{--                                        <i class="nav-icon fa fa-list"></i>--}}
{{--                                        <p>--}}
{{--                                            Список--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-header">Заявки</li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.applications.new') }}" class="nav-link">--}}
{{--                                        <p>--}}
{{--                                            Новые--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.applications.blocked') }}" class="nav-link">--}}
{{--                                        <p>--}}
{{--                                            Заблокированые--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.applications.processed') }}" class="nav-link">--}}
{{--                                        <p>--}}
{{--                                            Обработаные--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-header">Отзывы</li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.reviews.new') }}" class="nav-link">--}}
{{--                                        <p>--}}
{{--                                            Новые--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.reviews.all') }}" class="nav-link">--}}
{{--                                        <p>--}}
{{--                                            Одобреные--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.reviews.add') }}" class="nav-link">--}}
{{--                                        <p>--}}
{{--                                            Добавить--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                        <!-- /.sidebar-menu -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">--}}
{{--                <div class="os-scrollbar-track">--}}
{{--                    <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">--}}
{{--                <div class="os-scrollbar-track">--}}
{{--                    <div class="os-scrollbar-handle" style="height: 66.2987%; transform: translate(0px, 0px);"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="os-scrollbar-corner"></div>--}}
{{--        </div>--}}
{{--        <!-- /.sidebar -->--}}
{{--    </aside>--}}

{{--    <!-- Content Wrapper. Contains page content -->--}}
{{--    <div class="content-wrapper" style="min-height: 820px;">--}}
{{--        <!-- Content Header (Page header) -->--}}
{{--        <div class="content-header">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row mb-2">--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <h1 class="m-0">Dashboard</h1>--}}
{{--                    </div><!-- /.col -->--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">Dashboard v1</li>--}}
{{--                        </ol>--}}
{{--                    </div><!-- /.col -->--}}
{{--                </div><!-- /.row -->--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--        </div>--}}
{{--        <!-- /.content-header -->--}}

{{--        <!-- Main content -->--}}
{{--        <section class="content">--}}
{{--            <div class="container-fluid">--}}
{{--                @yield('content')--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <!-- /.content -->--}}
{{--    </div>--}}

{{--    <!-- /.control-sidebar -->--}}
{{--    <div id="sidebar-overlay"></div>--}}
{{--</div>--}}
{{--<!-- ./wrapper -->--}}

{{--<!-- jQuery -->--}}
{{--<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>--}}
{{--<!-- jQuery UI 1.11.4 -->--}}
{{--<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>--}}
{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
{{--<!-- Bootstrap 4 -->--}}
{{--<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<!-- ChartJS -->--}}
{{--<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>--}}
{{--<!-- JQVMap -->--}}
{{--<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>--}}
{{--<!-- jQuery Knob Chart -->--}}
{{--<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>--}}
{{--<!-- daterangepicker -->--}}
{{--<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>--}}
{{--<!-- Tempusdominus Bootstrap 4 -->--}}
{{--<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>--}}
{{--<!-- Summernote -->--}}
{{--<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>--}}
{{--<!-- overlayScrollbars -->--}}
{{--<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="{{ asset('dist/js/adminlte.js') }}"></script>--}}
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="{{ asset('dist/js/demo.js') }}"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>--}}


{{--<div class="daterangepicker ltr show-ranges opensright">--}}
{{--    <div class="ranges">--}}
{{--        <ul>--}}
{{--            <li data-range-key="Today">Today</li>--}}
{{--            <li data-range-key="Yesterday">Yesterday</li>--}}
{{--            <li data-range-key="Last 7 Days">Last 7 Days</li>--}}
{{--            <li data-range-key="Last 30 Days">Last 30 Days</li>--}}
{{--            <li data-range-key="This Month">This Month</li>--}}
{{--            <li data-range-key="Last Month">Last Month</li>--}}
{{--            <li data-range-key="Custom Range">Custom Range</li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="drp-calendar left">--}}
{{--        <div class="calendar-table"></div>--}}
{{--        <div class="calendar-time" style="display: none;"></div>--}}
{{--    </div>--}}
{{--    <div class="drp-calendar right">--}}
{{--        <div class="calendar-table"></div>--}}
{{--        <div class="calendar-time" style="display: none;"></div>--}}
{{--    </div>--}}
{{--    <div class="drp-buttons"><span class="drp-selected"></span>--}}
{{--        <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>--}}
{{--        <button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="jqvmap-label" style="display: none;"></div>--}}
{{--</body>--}}
{{--</html>--}}
