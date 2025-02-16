<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Honda Care - @yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg" style="background-color: #e61b33;"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-result">
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ $nama ?? Auth::user()->nama }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">AHM</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">AHM</a>
                    </div>

                    <ul class="sidebar-menu">
                        <li class="menu-header">Main Menu</li>
                        @if (Auth::check() && Auth::user()->roles == 'admin')
                            <li class="dropdown">
                                <a href="{{ url('/admin') }}" class="nav-link"><i
                                        class="fas fa-fire"></i><span>Dashboard</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Honda
                                        Care</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ url('get-era') }}">Data Honda Care</a></li>
                                    <li><a class="nav-link" href="{{ url('/#') }}">Proses Mekanik</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Data
                                        Survey</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ url('/survey-awareness') }}">Survey Awareness
                                            CC</a></li>
                                    <li><a class="nav-link" href="{{ url('/survey-awarenesshc') }}">Survey Awareness
                                            HC</a></li>
                                    <li><a class="nav-link" href="{{ url('/survey-csathc') }}">Survey CSAT HC</a>
                                    </li>
                                    <li><a class="nav-link" href="{{ url('/survey-csatca') }}">Survey CSAT CA</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                    <span>Report Survey</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ url('/export-awareness') }}">Report Awareness
                                            CC</a></li>
                                    <li><a class="nav-link" href="{{ url('/export-awarenesshc') }}">Report Awareness
                                            HC</a></li>
                                    <li><a class="nav-link" href="{{ url('/export-csathc') }}">Report CSAT HC</a>
                                    </li>
                                    <li><a class="nav-link" href="{{ url('/export-csatca') }}">Report CSAT CA</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                                    <span>Data User</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ url('/get-user') }}">User Survey</a></li>
                                    <li><a class="nav-link" href="{{ url('/get-userera') }}">User Honda Care</a></li>
                                </ul>
                            </li>
                        @endif

                        @if (Auth::guard('era')->user() && Auth::guard('era')->user()->level == 'korlap')
                            {{-- KORLAP LOGIN --}}
                            <li class="dropdown">
                                <a href="{{ url('/korlapmd') }}" class="nav-link"><i
                                        class="fas fa-fire"></i><span>Dashboard</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Honda
                                        Care</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ url('/get-eramd') }}">Data Honda Care</a></li>
                                    <li><a class="nav-link" href="{{ url('/#') }}">Proses Mekanik</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                    <span>Report</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ url('/#') }}">Report Honda Care</a></li>
                                    <li><a class="nav-link" href="{{ url('/#') }}">Report Awareness CC</a></li>
                                    <li><a class="nav-link" href="{{ url('/#') }}">Report Awareness HC</a></li>
                                    <li><a class="nav-link" href="{{ url('/#') }}">Report CSAT HC</a></li>
                                </ul>
                            </li>
                        @endif

                        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                            <a href="#" class="btn btn-danger btn-lg btn-block btn-icon-split">
                                <i class="fas fa-rocket"></i> Honda Care
                            </a>
                        </div>
                </aside>
            </div>

            <!-- Main Content -->
            @yield('content')
            @include('layout.footer')

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    

    <!-- JS Libraies DataTable -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".sidebar-menu .dropdown").click(function() {
                $(".sidebar-menu .dropdown").removeClass("active"); // Menghapus 'active' dari semua menu
                $(this).addClass("active"); // Menambahkan 'active' ke menu yang diklik
            });
        });
    </script>
</body>

</html>
