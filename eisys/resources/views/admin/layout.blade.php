<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eisys admin</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("admin/plugins/fontawesome-free/css/all.min.css")}}" />
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset("admin/plugins/daterangepicker/daterangepicker.css")}}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset("admin/plugins/select2/css/select2.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("admin/dist/css/adminlte.min.css")}}" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini">

    <!-- wrapper -->
    <div class="wrapper">

        <!-- Header -->
        @include('admin.header')
        <!-- /.Header -->

        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- /.Sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.Content -->

        <!-- Footer -->
        @include('admin.footer')
        <!-- /.Footer -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset("admin/plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- Select2 -->
    <script src="{{asset("admin/plugins/select2/js/select2.full.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("admin/dist/js/adminlte.min.js")}}"></script>
    <!-- InputMask -->
    <script src="{{asset("admin/plugins/moment/moment.min.js")}}"></script>
    <script src="{{asset("admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js")}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset("admin/plugins/daterangepicker/daterangepicker.js")}}"></script>
    <script>
        $(function () {
            //Date range picker
            $('#reservation').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            })
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
</body>

<style>

.form-group .form-control::-webkit-input-placeholder {
	color: #dcdcdc;
}

.form-group .form-control::-moz-placeholder {
	color: #dcdcdc;
}

.form-group .form-control:-ms-input-placeholder {
	color: #dcdcdc;
}

</style>

</html>
