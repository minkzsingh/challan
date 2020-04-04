<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Challan</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- CSS Files -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatable.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstra/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- 
        <link href="{{ asset('assets/handsontable/dist/handsontable.full.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/handsontable/dist/handsontable.full.js') }}" type="text/javascript"></script> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/datatable_service.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/helper_functions.js') }}" type="text/javascript"></script>

    <!-- toaster -->
    <link href="{{  asset('assets/toastr/toastr.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/toastr/toastr.min.js') }}" type="text/javascript"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            @include('paper.masters.sidebar')
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                @include('paper.masters.navbar')
            </nav>
            <!-- End Navbar -->
            <!-- <div class="panel-header panel-header-lg">
                
  <canvas id="bigDashboardChart"></canvas>
  
  
</div> -->
            <div class="content">
                @yield('content')
            </div>
            <footer class="footer footer-black  footer-white ">
                @include('paper.masters.footer')
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstra/js/bootstrap.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/validation/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/validation/additional-methods.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        });
    </script>
</body>

</html>