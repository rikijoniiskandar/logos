<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giverzo admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Admin CMS</span>
            </a>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" > <span>{{ Auth::user()->name}}</span>
                    </a>
                </li><!-- End Profile Nav -->

            </ul>
        </nav>

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav">
            <li class="{{ request()->is('dashboard') ? 'active' : ''}} ">
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>   
    <!-- End Dashboard Nav -->

            <li class="nav-heading">Page Content</li>

            <li class="{{ request()->is('clients') ? 'active' : ''}} ">
                <a class="nav-link" href="{{url('clients')}}">
                    <i class="bi bi-house-add"></i>
                    <span>Client</span>
                </a>
            </li>

            <li class="{{ request()->is('featured-products') ? 'active' : ''}} ">
                <a class="nav-link" href="{{url('featured-products')}}" >
                    <i class="bi bi-star"></i>
                    <span>Featured Product</span>
                </a>
            </li>

            {{-- <li class="{{ request()->is('abouts') ? 'active' : ''}} ">
                <a class="nav-link" href="{{url('abouts')}}">
                    <i class="bi bi-file-earmark-person"></i>
                    <span>About</span>
                </a>
            </li> --}}

            <li class="{{ request()->is('portofolios') ? 'active' : ''}} ">
                <a class="nav-link" href="{{url('portofolios')}}" >
                    <i class="bi bi-bag-check"></i>
                    <span>Portofolio</span>
                </a>
            </li>

            <li class="{{ request()->is('teams') ? 'active' : ''}} ">
                <a class="nav-link" href="{{url('teams')}}">
                    <i class="bi bi-people"></i>
                    <span>Team</span>
                </a>
            </li>
            
            
            



            <li class="nav-item"> <a class="nav-link collapsed mt-5" href="{{url('logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a></li>
            <!-- End Blank Page Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->

    <main id="main" >
        <section>
            <div class="row">
                @yield('content')
            </div>
        </section>

    </main>
    <!-- End #main -->

</body>

</html>
