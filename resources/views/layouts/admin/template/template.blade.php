<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('admin/images/logo.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{asset('admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="{{asset('admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{asset('admin/plugins/waitme/waitMe.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{asset('admin/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('admin/css/style.css') }}" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="{{asset('admin/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('admin/css/themes/all-themes.css') }}" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="{{asset('admin/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- validasi -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/validasi.css') }}">

    <!-- Select2  -->
    <link href="{{asset('admin/select2/dist/css/select2.min.css') }}" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="{{asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- IziToastAlert -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/alert/css/iziToast.min.css')}}">
    <!-- IziToastAlert -->
    <script src="{{asset('admin/alert/js/iziToast.min.js') }}"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{url('')}}">Web Dinas Kehutanan</a>
            </div>
        </div>
    </nav>

    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('admin/images/user.png') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->email}}</div>
                    <!-- <div class="email">john.doe@example.com</div> -->
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li> -->
                            <li><a href="{{ route('logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="@yield('beranda')">
                        <a href="{{route('admin.beranda')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="@yield('berita')">
                        <a href="{{route('berita.index')}}">
                            <i class="material-icons">article</i>
                            <span>Berita</span>
                        </a>
                    </li>
                    <li class="@yield('pengaduan')">
                        <a href="{{route('pengaduan.index')}}">
                            <i class="material-icons">article</i>
                            <span>Pengaduan</span>
                        </a>
                    </li>
                    <li class="@yield('slide')">
                        <a href="{{route('slide.index')}}">
                            <i class="material-icons">perm_media</i>
                            <span>Slide Gambar</span>
                        </a>
                    </li>
                    <li class="@yield('halaman_web')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">local_activity</i>
                            <span>Halaman Web</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('profil')">
                                <a href="{{route('profil.index')}}">Profil</a>
                            </li>
                            <li class="@yield('bidang')">
                                <a href="{{route('bidang.index')}}">Bidang</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y') ?>
                    <!-- <a href="javascript:void(0);">AdminBSB - Material Design</a>. -->
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    @yield('content')

    <!-- Bootstrap Core Js -->
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('admin/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="{{asset('admin/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-steps/jquery.steps.js') }}"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="{{asset('admin/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('admin/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Autosize Plugin Js -->
    <script src="{{asset('admin/plugins/autosize/autosize.js') }}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{asset('admin/plugins/momentjs/moment.js') }}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{asset('admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{asset('admin/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{asset('admin/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{asset('admin/plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>

    <!-- TinyMCE -->
    <!-- <script src="{{asset('admin/plugins/tinymce/tinymce.js')}}"></script> -->

    <!-- Custom Js -->
    <script src="{{asset('admin/js/admin.js') }}"></script>
    <script src="{{asset('admin/js/pages/forms/basic-form-elements.js') }}"></script>
    <script src="{{asset('admin/js/pages/forms/advanced-form-elements.js') }}"></script>
    <script src="{{asset('admin/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{asset('admin/js/pages/forms/editors.js') }}"></script>
    <script src="{{asset('admin/js/pages/index.js') }}"></script>

    <!-- inputmask -->
    <script src="{{asset('admin/inputmask/jquery.inputmask.bundle.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{asset('admin/select2/dist/js/select2.min.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{asset('admin/js/demo.js') }}"></script>

    <!-- Alert -->
    <link rel="stylesheet" type="text/css" href="{{asset('alert/css/iziToast.min.css')}}">
    <!-- Alert -->
    <script src="{{asset('alert/js/iziToast.min.js') }}"></script>
</body>

</html>