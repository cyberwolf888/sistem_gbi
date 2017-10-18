<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>
    @stack('plugin_css')
    <!-- morris -->
    <link href="{{ url('assets/backend') }}/css/morris.css" rel="stylesheet">
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

    <style>
        .page-header.navbar .page-logo .logo-default {
            height: 50px;
            width: 50px;
            margin: 3px 50px 0;
        }
    </style>

    <!-- demo  -->
    <link href="{{ url('assets/backend') }}/css/appdemo.css" rel="stylesheet">
    <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <!--[if lt IE 9]> <script src="dist/html5shiv.js"></script> <![endif]-->
</head>

<body class="page-header-fixed page-sidebar-menu-border  page-sidebar-fixed ">
<div class="page-header navbar aqua-bg fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ route('home') }}"> <img class="logo-default" alt="logo" src="{{ url('assets/backend') }}/images/logo.png"> </a>
        </div>
        <div class="sidebar-close-logo">
            <a href="{{ route('home') }}"> <img class="logo-default" alt="logo" src="{{ url('assets/backend') }}/images/sidebar-close-logo.png"> </a>
        </div>
        <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div>
        <a class="mobile-sub-link hidden-md-up"><i class="fa fa-ellipsis-v"></i></a>
        <!-- END LOGO -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <div class="hor-menu hidden-sm-down">
                <ul class="nav">
                    <li class="nav-item"> <a onclick="toggleFullScreen()" href="javascript:;" class="nav-link fullscreen"><span class="glyphicon glyphicon-fullscreen"> </span></a>
                    </li>
                </ul>
            </div>


            <ul class="nav navbar-nav pull-right hidden-sm-down">

                <!-- START USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                        @if(Auth::user()->img != null)
                            <img src="{{ url('assets/profile/'.Auth::user()->img) }}" class="rounded-circle" alt="">
                        @else
                            <img src="{{ url('assets/backend') }}/images/teem/a10.jpg" class="rounded-circle" alt="">
                        @endif
                        <span class="username username-hide-on-mobile"> {{ Auth::user()->name }}</span>
                    </a>

                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<div class="clearfix"> </div>
<div class="page-container">
    <!-- Start page sidebar wrapper -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar sidebar-light">
            <ul class="page-sidebar-menu  page-header-fixed ">
                @can('admin-access')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"> <i class="fa fa-th-large"></i> <span class="title">Dashboard</span> </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.penyerahananak.manage') }}"> <i class="fa fa-flash"></i> <span class="title">Penyerahan Anak</span> </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.baptisan.manage') }}"> <i class="fa fa-magic"></i> <span class="title">Baptisan</span> </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.pemberkatannikah.manage') }}"> <i class="fa fa-magic"></i> <span class="title">Pemberkatan Pernikahan</span> </a></li>
                <li class="nav-item">
                    <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-user"></i> <span class="title">Users</span> <span class="arrow"></span> </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.member.manage') }}" > <span class="title">Member</span> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.admin.manage') }}"> <span class="title">Admin</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.profile.manage') }}"> <i class="fa fa-user"></i> <span class="title">Profile</span> </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.laporan.index') }}"> <i class="fa fa-file"></i> <span class="title">Laporan</span> </a></li>
                @endcan

                @can('member-access')
                    <li class="nav-item"><a class="nav-link" href="{{ route('member.dashboard') }}"> <i class="fa fa-th-large"></i> <span class="title">Dashboard</span> </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('member.penyerahananak.manage') }}"> <i class="fa fa-flash"></i> <span class="title">Penyerahan Anak</span> </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('member.baptisan.manage') }}"> <i class="fa fa-magic"></i> <span class="title">Baptisan</span> </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('member.pemberkatannikah.manage') }}"> <i class="fa fa-magic"></i> <span class="title">Pemberkatan Pernikahan</span> </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('member.profile.manage') }}"> <i class="fa fa-user"></i> <span class="title">Profile</span> </a></li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-reply"></i> <span class="title">Logout</span> </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            </ul>
        </div>
    </div>
    <!-- End page sidebar wrapper -->
    <!-- Start page content wrapper -->
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')
            <!-- start footer -->
            <div class="footer">
                <div> <strong>Copyright</strong> STMIK STIKOM Bali &copy; 2017 </div>
            </div>
        </div>
    </div>
</div>
<!-- Go top -->
<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
<!-- Go top -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ url('assets/backend') }}/js/vendor/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="{{ url('assets/backend') }}/js/vendor/tether.min.js"></script>
<script src="{{ url('assets/backend') }}/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/dataTables.bootstrap4.min.js"></script>
<!-- slimscroll js -->
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/jquery.slimscroll.js"></script>
@stack('plugin_scripts')
<!-- pace js -->
<script src="{{ url('assets/backend') }}/js/vendor/pace/pace.min.js"></script>
<!-- main js -->
<script src="{{ url('assets/backend') }}/js/main.js"></script>
<!-- demo  -->
<script src="{{ url('assets/backend') }}/js/appdemo.js"></script>

@stack('scripts')

</body>

</html>