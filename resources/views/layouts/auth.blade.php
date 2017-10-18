<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Sep 2017 05:28:29 GMT -->
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Bootstrap -->
    <link href="{{ url('assets/backend') }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- slimscroll -->
    <link href="{{ url('assets/backend') }}/css/jquery.slimscroll.css" rel="stylesheet">
    <!-- Fontes -->
    <link href="{{ url('assets/backend') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('assets/backend') }}/css/glyphicons.css" rel="stylesheet">
    <link href="{{ url('assets/backend') }}/css/simple-line-icons.css" rel="stylesheet">
    <!-- all buttons css -->
    <link href="{{ url('assets/backend') }}/css/buttons.css" rel="stylesheet">
    <!-- animate css -->
    <link href="{{ url('assets/backend') }}/css/animate.css" rel="stylesheet">
    <!-- The Wolf main css -->
    <link href="{{ url('assets/backend') }}/css/main.css" rel="stylesheet">
    <!-- theme css -->
    <link href="{{ url('assets/backend') }}/css/theme.css" rel="stylesheet">
    <!-- media css for responsive  -->
    <link href="{{ url('assets/backend') }}/css/main.media.css" rel="stylesheet">

    <!-- demo  -->
    <link href="{{ url('assets/backend') }}/css/appdemo.css" rel="stylesheet">
    <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <!--[if lt IE 9]> <script src="dist/html5shiv.js"></script> <![endif]-->
</head>

<body class="login">
<div class="middle-box text-center loginscreen ">
    @yield('content')
</div>
<!-- demo  -->
<script src="{{ url('assets/backend') }}/js/appdemo.js"></script>
</body>
</html>