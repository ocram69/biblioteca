
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel') )</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">

        {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
        <!-- Theme style  toastr-->
        <link rel="stylesheet" href="{{asset("assets/adminLte/plugins/toastr/toastr.min.css")}}">
        <!-- Theme style  sweetalert2-->
        <link rel="stylesheet" href="{{asset("assets/adminLte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}">
        <!-- Styles para varias paginas-->
        <link rel="stylesheet" href="{{asset("assets/pages/css/pages.css")}}">
        <!-- Styles por paginas-->
        @yield('styles')
        <!-- Theme style adminlte -->
        <link rel="stylesheet" href="{{asset("assets/$theme/css/adminLte.min.css")}}">
    </head>
    <body class="hold-transition sidebar-mini accent-navy text-sm">
    <div class="wrapper">

        <!-- Navbar -->
        @include("themes.$theme.navbar")
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include("themes.$theme.nav")

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include("themes.$theme.header")
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content" id="app">
                <div class="container-fluid">
                    @include('themes.adminLte.mensaje')
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include("themes.$theme.aside")
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include("themes.$theme.footer")
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery v3.4.1 -->
    <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap v4.3.1 -->
    <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("assets/$theme/js/adminlte.min.js")}}"></script>
    <!-- toastr -->
    <script src="{{asset("assets/adminLte/plugins/toastr/toastr.min.js")}}"></script>
    <!-- sweetalert2 -->
    <script src="{{asset("assets/adminLte/plugins/sweetalert2/sweetalert2.all.min.js")}}"></script>
    <!-- Scripts de validacion-->
    <script src="{{asset("assets/adminLte/plugins/jquery-validation/jquery.validate.min.js")}}"></script>
    <script src="{{asset("assets/adminLte/plugins/jquery-validation/localization/messages_es.js")}}"></script>
    {{-- <script src="{{asset("assets/jquery-validation-bootstrap-tooltip/jquery-validate.bootstrap-tooltip.min.js")}}"></script> --}}
     <!-- Scripts funciones-->
     <script src="{{asset("assets/pages/js/funciones.js")}}"></script>
    <!-- Scripts todas las paginas-->
    <script src="{{asset("assets/pages/js/pages.js")}}"></script>
    <!-- Scripts por pagina-->
    @yield('scripts')
    </body>
</html>

