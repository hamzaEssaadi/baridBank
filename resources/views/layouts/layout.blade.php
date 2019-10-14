<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Barid bank</title>

    <!-- Bootstrap -->

    <link href="{{asset('template/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    {{--<link src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}
    <link href="{{asset('template/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/custom.min.css')}}" rel="stylesheet">
    @yield('css')

</head>
<body class="nav-md">
@php $user=\Illuminate\Support\Facades\Auth::user(); @endphp
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    {{--<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>CMMS</span></a>--}}
                    <center>
                        <img src="{{asset('logo.jpg')}}" class="img-responsive img-circle" style="width:70%; height: 70%;border:5px white solid; "/>
                    </center>
                </div>
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{asset('admin.png')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenue,</span>
                        <h2>{{$user->name}}</h2>
                    </div>
                </div>
                <br/>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Menu</h3>
                        <ul class="nav side-menu">

                            <li {{\Illuminate\Support\Facades\Route::getFacadeRoot()->current()->uri()=='/'?'class=current-page':''}} ><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>Tableau de bord</a></li>
                            <li><a href="{{route('clients.index')}}"><i class="fa fa-users"></i>Clients</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                               {{$user->name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">

                                <li>
                                    <a href="{{route('user.edit',['user'=>$user->id])}}"><i class="fa fa-user pull-right"></i>Profil</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i>
                                        Déconnecter</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>@yield('title','title page')</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                @yield('location-nav')
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                @yield('x_title')
                            </div>
                            <div class="x_content">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                <b>Barid bank - Gestionnaire du Crédit</b>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('template/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/js/custom.min.js')}}"></script>

@yield('script')

</body>
