<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giverzo Commercial</title>
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
    <link href="{{ asset('assets/vendor/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

</head>

<body class="p-4">
    <img src="{{ asset('assets/img/cursor.png') }}" id="cursor-icon" alt="Ikon Kursor">
    <!-- ======= Header ======= -->
    <div class="card">
        <div>
            <div class="d-flex align-items-center justify-content-between border-bottom p-2 text-sm px-5">
                <div class="d-flex ms-5 px-2">
                    <i class="bi bi-envelope ms-4"></i>
                    <span class="ms-4"><a href="mailto:HelloGiverzo@gmail.com"
                            class="text-black text-decoration-none">HelloGiverzo@gmail.com</a></span>
                    <span class="border-end ms-4"></span>
                </div>
                <a href="https://instagram.com/giverzocommercial" target="_blank" class="text-black text-decoration-none me-5">
                    <i class="bi bi-instagram"></i>
                </a>

            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-5 ms-5 me-5">
            <div class="container-fluid d-flex align-items-center justify-content-between ">
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    <h1 id="ut-sitebody" class="logo"><img src="{{ asset('assets/img/logo.png') }}"
                            style="height: 60px" alt=""></h1>
                </a>
                <div>
                    <ul class="navbar-nav ml-auto">
                        <li class="{{ request()->is('about-us') ? 'active-nav' : ''}} " class="nav-item">
                            <a  class="nav-link" href="{{ url('/about-us') }}">ABOUT US</a>
                        </li>
                        <li class="{{ request()->is('services') ? 'active-nav' : ''}} " class="nav-item">
                            <a class="nav-link" href="{{ url('/services') }}">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">OUR TEAM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">CONTACT US</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main id="container px-5 ms-5">
            @yield('content')
        </main>
        <!-- ======= Footer ======= -->
        <div class="position-relative">
            {{-- <div class="background">

            </div> --}}
            <footer class="footer">
                <div class="container">
                    <div class="footer-content mt-5">
                        <div class="column">
                            <h3>Giverzo Commercial</h3>
                            <div class="yellow-line"></div>
                            <p>At Giverzo Commercial, we are committed to transforming your brand's social media
                                presence with creativity and precision. Let's bring your vision to life. </p>
                        </div>
                        <div class="column">
                            <h4>Contact information</h4>
                            <p><i class="bi bi-whatsapp"></i> +6282361899086</p>
                            <p> <i class="bi bi-instagram"></i> @giverzocommercial</p>
                            <p><i class="bi bi-envelope"></i> HelloGiverzo@gmail.com</p>
                        </div>
                        <div class="column">
                            <h4>Visit us</h4>
                            <p>Komplek Polonia RiverView No. A27 |<br>Jl. Komodor Muda Adi Sucipto, Suka Damai | <br>
                             Kec. Medan Polonia, Kota Medan, Sumatera Utara 20157
                            </p>
                            <div class="social-icons">
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column d-flex justify-content-end me-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.0898880826785!2d98.68135650983629!3d3.5667847504299317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031304719d98719%3A0xdbb40c7ca61595a4!2sKomplek%20Polonia%20Riverview!5e0!3m2!1sid!2sid!4v1716904228592!5m2!1sid!2sid" width="420" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </footer>
        </div>
    </div>


    <!-- End  Footer -->


    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Script JavaScript -->
    <script>
        document.addEventListener('mousemove', function(e) {
            var cursorIcon = document.getElementById('cursor-icon');
            cursorIcon.style.left = e.pageX + 'px';
            cursorIcon.style.top = e.pageY + 'px';
        });

        document.querySelectorAll('button, a').forEach(function(element) {
            element.addEventListener('mouseenter', function() {
                var cursorIcon = document.getElementById('cursor-icon');
                cursorIcon.style.transform = 'scale(1.5)';
            });
            element.addEventListener('mouseleave', function() {
                var cursorIcon = document.getElementById('cursor-icon');
                cursorIcon.style.transform = 'scale(1)';
            });
        });
    </script>


</body>
