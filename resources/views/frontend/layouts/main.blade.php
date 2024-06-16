<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{secure_asset('assets/images/iconk3.png')}}">
    <link href="{{secure_asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{secure_asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body data-topbar="light" data-layout="horizontal">
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="/" class="logo logo-dark">
                            <span class="logo-sm">
                                <h3 class="logo mr-auto"><a href="/">Company Safety Report<span>.</span></a></h3>
                            </span>
                        </a>
                    </div>
                    <div class="col text-end">
                        <button type="button"
                            class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                            data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                    role="button">
                                    <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Dashboards</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                    <a href="{{url('user/home')}}" class="dropdown-item" key="t-default">Default</a>

                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                    <i class="bx bx-customize me-2"></i><span key="t-apps">Reports</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                    <a href="{{route('report')}}" class="dropdown-item" key="t-calendar">List
                                        Reports</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                    <i class="bx bx-customize me-2"></i><span key="t-apps">Add Reports</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                    <a href="{{route('add_report')}}" class="dropdown-item" key="t-calendar">Add
                                        Reports</a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="main-content">
            @yield('content')
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                            document.write(new Date().getFullYear())
                            </script> © Ogie Kukuh Yuwono.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Ogie Kukuh Yuwono
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <script src="{{secure_asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{secure_asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{secure_asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{secure_asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{secure_asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{secure_asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{secure_asset('assets/js/pages/dashboard.init.js')}}"></script>
    <script src="{{secure_asset('assets/js/app.js')}}"></script>
</body>
@stack('script')

</html>