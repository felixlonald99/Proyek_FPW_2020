<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin: 0px">

</body>
</html>

//

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Level HTML Template</title>
<!--

Template 2095 Level

http://www.tooplate.com/view/2095-level

-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ url("/templateweb/font-awesome-4.7.0/css/font-awesome.min.css") }}">                <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url("/templateweb/css/bootstrap.min.css") }}">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="{{ url("/templateweb/slick/slick.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url("/templateweb/slick/slick-theme.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url("/templateweb/css/datepicker.css") }}"/>
    <link rel="stylesheet" href="{{ url("/templateweb/css/tooplate-style.css") }}">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

    <body>
        @include('includes.header')

            @yield('content')

        @include('includes.footer')


        <!-- load JS files -->
        <script src="{{ url("/templateweb/js/jquery-1.11.3.min.js")}}"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="{{ url("/templateweb/js/popper.min.js")}}"></script>                    <!-- https://popper.js.org/ -->
        <script src="{{ url("/templateweb/js/bootstrap.min.js")}}"></script>                 <!-- https://getbootstrap.com/ -->
        <script src="{{ url("/templateweb/js/datepicker.min.js")}}"></script>                <!-- https://github.com/qodesmith/datepicker -->
        <script src="{{ url("/templateweb/js/jquery.singlePageNav.min.js")}}"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="{{ url("/templateweb/slick/slick.min.js")}}"></script>                  <!-- http://kenwheeler.github.io/slick/ -->

    </body>
</html>
