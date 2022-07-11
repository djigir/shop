<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="data:image/jpeg;base64,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" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            {{--                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            {{--                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            {{--                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            {{--            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
            <span class="brand-text font-weight-light">Shop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    {{--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="pages/gallery.html" class="nav-link">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>Заказы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tshirt"></i>
                            <p>Товары</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('group.index') }}" class="nav-link">
                            <i class="fas fa-layer-group"></i>
                            <p>Группы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Категории</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tag.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Тэги</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('color.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-palette"></i>
                            <p>Цвета</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Пользователи</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-{{ now()->year }} <a href="{{ route('main.index') }}">Shop</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}} "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
</body>
</html>


<script>
    $(function () {
        $('.tags').select2()
        $('.colors').select2({
            templateResult: function (data, container) {
                if (data.element) {
                    $(container).css({"background-color":data.text});
                }
                return data.text;
            },
            templateSelection: function(option, container) {
                $(container).css({
                    "background-color":option.text,
                    "border-color": 'white',
                });
                return $('<span class="' + ($(option.element).prop('class') || '') + '">' +
                    '' + option.text + '</span>');
            },
        })
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    })
</script>
