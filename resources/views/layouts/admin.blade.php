<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('header')

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <link href="{{asset('css/app.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <!-- /.navbar-header -->


        <ul class="nav navbar-top-links navbar-right">


            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> Profil Utilizator</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Setări</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Ieșire</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->


        </ul>


        {{--<ul class="nav navbar-nav navbar-right">--}}
        {{--@if(auth()->guest())--}}
        {{--@if(!Request::is('auth/login'))--}}
        {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
        {{--@endif--}}
        {{--@if(!Request::is('auth/register'))--}}
        {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
        {{--@endif--}}
        {{--@else--}}
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
        {{--<li><a href="{{ url('/auth/logout') }}">Logout</a></li>--}}

        {{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endif--}}
        {{--</ul>--}}


        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    {{--<li class="sidebar-search">--}}
                    {{--<div class="input-group custom-search-form">--}}
                    {{--<input type="text" class="form-control" placeholder="Search...">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default" type="button">--}}
                    {{--<i class="fa fa-search"></i>--}}
                    {{--</button>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--<!-- /input-group -->--}}
                    {{--</li>--}}
                    <li>
                        <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Panou de control</a>
                    </li>

                    {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-wrench fa-fw"></i>Utilizatori<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                    {{--<a href="/users">Toți Utilizatorii</a>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                    {{--<a href="/users/create">Creare Utilizator</a>--}}
                    {{--</li>--}}

                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    @if(Auth::user()->isAdmin())
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> NOMENCLATOR<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.producers.index')}}">PRODUCĂTORI</a>
                                </li>

                                <li>
                                    <a href="{{route('admin.products.index')}}">PRODUSE</a>
                                </li>

                                <li>
                                    <a href="/posts/create">CLIENȚI</a>
                                </li>

                                <li>
                                    <a href="/posts/create">FURNIZORI</a>
                                </li>

                                <li>
                                    <a href="/posts/create">DIRECTORI DE VÂNZĂRI</a>
                                </li>

                                <li>
                                    <a href="{{route('admin.categories.index')}}">CATEGORII DE PRODUSE</a>
                                </li>


                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> DEFINIRE<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="{{route('admin.users.index')}}">ADMINISTRARE UTILIZATORI</a>
                                </li>

                                <li>
                                    <a href="/categories">TIPIZAT CONTRACT</a>
                                </li>

                                <li>
                                    <a href="/categories/create">ANEXA</a>
                                </li>

                                <li>
                                    <a href="/categories/create">AVIZ</a>
                                </li>

                                <li>
                                    <a href="/categories/create">SETARI / NIVEL DE AUTORITATE </a>
                                </li>

                                <li>
                                    <a href="/categories/create">TIPOLOGIE FERMIERI</a>
                                </li>

                                <li>
                                    <a href="/categories/create">CALCUL DISCOUNT</a>
                                </li>

                                <li>
                                    <a href="/categories/create">LIMITA DE CREDIT</a>
                                </li>

                                <li>
                                    <a href="/categories/create">COD DE LEGATURA</a>
                                </li>

                                <li>
                                    <a href="/categories/create">FISA DE CLIENT</a>
                                </li>

                                <li>
                                    <a href="/categories/create">NOTA DE COMANDA</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    @endif
                    @if(Auth::user()->isAdmin() || Auth::user()->isOperator())
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> OPERAȚIONAL<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">ACHIZIȚII <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">CONTRACT FURNIZOR</a>
                                    </li>

                                    <li>
                                        <a href="#">RECEPȚIE</a>
                                    </li>

                                    <li>
                                        <a href="#">NIR</a>
                                    </li>

                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                            <li>
                                <a href="#">VÂNZARE <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">CONTRACT CLIENT</a>
                                    </li>
                                    <li>
                                        <a href="#">ANEXĂ</a>
                                    </li>
                                    <li>
                                        <a href="#">AVIZ</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    @endif

                    @if(Auth::user()->isAdmin())
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> RAPORTARE<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">ACHIZIȚII <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">LISTĂ RECEPȚII</a>
                                        </li>
                                        <li>
                                            <a href="#">MARJA PE CONTRACT</a>
                                        </li>
                                        <li>
                                            <a href="#">LIVRAT / REST DE LIVRAT</a>
                                        </li>
                                        <li>
                                            <a href="#">MARJA / FURNIZOR</a>
                                        </li>
                                        <li>
                                            <a href="#">MARJA / PRODUS</a>
                                        </li>
                                        <li>
                                            <a href="#">RAPORT SCADENȚE</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">VÂNZĂRI <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">LISTĂ ANEXE</a>
                                        </li>
                                        <li>
                                            <a href="#">MARJA PE CONTRACT</a>
                                        </li>
                                        <li>
                                            <a href="#">LIVRAT / REST DE LIVRAT</a>
                                        </li>
                                        <li>
                                            <a href="#">MARJA / DV</a>
                                        </li>
                                        <li>
                                            <a href="#">MARJA / TIP FERMIER</a>
                                        </li>
                                        <li>
                                            <a href="#">RAPORT SCADENȚE</a>
                                        </li>
                                        <li>
                                            <a href="#">LISTĂ LIMITĂ DE CREDIT</a>
                                        </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">RAPORT CORELARE RECEPTII CU ANEXE </a>
                                </li>
                                <li>
                                    <a href="#">PREVIZIUNE MARJA FINALA (DIFERENTA DINTRE ACHIZITIE SI VANZARE)</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    @endif


                    {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                    {{--<a href="flot.html">Flot Charts</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="morris.html">Morris.js Charts</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                    {{--<a href="panels-wells.html">Panels and Wells</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="buttons.html">Buttons</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="notifications.html">Notifications</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="typography.html">Typography</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="icons.html"> Icons</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="grid.html">Grid</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                    {{--<a href="#">Second Level Item</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">Second Level Item</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">Third Level <span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-third-level">--}}
                    {{--<li>--}}
                    {{--<a href="#">Third Level Item</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">Third Level Item</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">Third Level Item</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">Third Level Item</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-third-level -->--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li class="active">--}}
                    {{--<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                    {{--<a class="active" href="blank.html">Blank Page</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="login.html">Login Page</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>


    {{--<div class="navbar-default sidebar" role="navigation">--}}
    {{--<div class="sidebar-nav navbar-collapse">--}}
    {{--<ul class="nav" id="side-menu">--}}
    {{--<li>--}}
    {{--<a href="/profile"><i class="fa fa-dashboard fa-fw"></i>Profile</a>--}}
    {{--</li>--}}




    {{--<li>--}}
    {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>--}}
    {{--<ul class="nav nav-second-level">--}}
    {{--<li>--}}
    {{--<a href="">All Posts</a>--}}
    {{--</li>--}}

    {{--<li>--}}
    {{--<a href="">Create Post</a>--}}
    {{--</li>--}}

    {{--</ul>--}}
    {{--<!-- /.nav-second-level -->--}}
    {{--</li>--}}





    {{--</ul>--}}

    {{--</div>--}}

    {{--</div>--}}

</div>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>


@yield('footer')


</body>

</html>
