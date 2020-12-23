<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN HOTEL</title>

    {{-- @yield('title') --}}

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url("/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url("/adminlte/bower_components/font-awesome/css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url("/adminlte/bower_components/Ionicons/css/ionicons.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url("/adminlte/dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url("/adminlte/dist/css/skins/_all-skins.min.css") }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ url("/adminlte/bower_components/morris.js/morris.css") }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ url("/adminlte/bower_components/jvectormap/jquery-jvectormap.css") }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ url("/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url("/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css") }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ url("/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!--[endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Font Awesome 6 -->
    <script
      src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
      data-auto-a11y="true"
    ></script>
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>H</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Hotel</b>Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">navigation</span>
            </a>
        </nav>
    </header>


    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="/masteruserpage"><i class="fa fa-user"></i> <span>&nbsp;Registered Users</span></a>
            </li>
            <li>
                <a href="/masterbookingpage"><i class="fa fa-book"></i> <span>&nbsp;Bookings</span></a>
            </li>
            <li>
                <a href="/bookedroompage"><i class="fa fa-door-closed"></i> <span>&nbsp;Booked Rooms</span></a>
            </li>
            <li>
                <a href="/masterpromopage"><i class="fa fa-dollar-sign"></i> <span>&nbsp;Promotions</span></a>
            </li>
            <li>
                <a href="/addnewbookingpage"><i class="fa fa-plus-square"></i> <span>&nbsp;Add New Booking</span></a>
            </li>
            <li>
                <a href="/addservicepage"><i class="fas fa-concierge-bell"></i> <span>&nbsp;Add Service</span></a>
            </li>
            <li>
                <a href="/invoice"><i class="fas fa-dollar-sign"></i> <span>&nbsp;INVOICE</span></a>
            </li>
            <li>
                <a href="/adminlogout"><i class="fa fa-power-off"></i> <span>&nbsp;Log Out</span></a>
            </li>
        </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    @yield('content')


    <footer class="main-footer">
        <strong>Copyright &copy; 2020. HILTON PHOTO STUDIO</a></strong> All rights
        reserved.
    </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ url("/adminlte/bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url("/adminlte/bower_components/jquery-ui/jquery-ui.min.js") }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url("/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- Morris.js charts -->
<script src="{{ url("/adminlte/bower_components/raphael/raphael.min.js") }}"></script>
<script src="{{ url("/adminlte/bower_components/morris.js/morris.min.js") }}"></script>
<!-- Sparkline -->
<script src="{{ url("/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js") }}"></script>
<!-- jvectormap -->
<script src="{{ url("/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
<script src="{{ url("/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url("/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js") }}"></script>
<!-- daterangepicker -->
<script src="{{ url("/adminlte/bower_components/moment/min/moment.min.js") }}"></script>
<script src="{{ url("/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
<!-- datepicker -->
<script src="{{ url("/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url("/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
<!-- Slimscroll -->
<script src="{{ url("/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ url("/adminlte/bower_components/fastclick/lib/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ url("/adminlte/dist/js/adminlte.min.js") }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url("/adminlte/dist/js/pages/dashboard.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url("/adminlte/dist/js/demo.js") }}"></script>
</body>
</html>
