@extends('layouts.public-layout')
@section('content')
    <section id="about" class="about section mb-5">
        <img class="w-100" src="{{ asset('assets/img/Header.png') }}" alt="">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <h1>GIVERZO COMMERCIAL</h1>
                    <p>Visually Create The Very Versace Of Your Brand</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5 pt-3">
        <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-5">
                <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}" alt="About 1">
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="row justify-content-xl-center">
                    <div class="col-12 col-xl-11 about-text">
                        <h1 class="mb-3 fw-bold display-3">Our Story</h1>
                        <p class="mb-5">Giverzo Commercial, a newly established subsidiary of Giverzo, was founded in
                            July 2022. With over seven years of experience in photography and videography, Giverzo has
                            expanded into the commercial sector. Our focus is on providing a comprehensive social media
                            agency that caters to the needs of brand owners. We enhance visual quality on social media
                            platforms to elevate and legitimize the marketing efforts of each brand. Additionally,
                            Giverzo Commercial offers commercial video production services for owners seeking to create
                            impactful videos or campaigns. Adhering to unique principles and unparalleled standards,
                            Giverzo Commercial delivers a distinctive and personalized touch that sets us apart from
                            other agencies.</p>
                        <div class="row gy-4 gy-md-0 gx-xxl-5X">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 pt-3 ">
        <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 about-text">
                <h1 class="display-5 fw-bold text-center">Why Choose Us</h1>
                <div class="row container justify-content-center py-5">
                    <div class="col-6">
                        <div class="card about-text">
                            <h5 class="fw-bold">Unparalleled Quality</h5 class="fw-bold">
                            <p>Giverzo Commercial maintains the highest standards of quality, evidenced by our extensive
                                portfolio and client satisfaction testimonials.
                            </p>
                        </div>
                        <div class="card about-text">
                            <h5 class="fw-bold">Constantly Updated </h5 class="fw-bold">
                            <p>We stay ahead of trends, ensuring our strategies and content are always current and effective
                                in the ever-evolving social media landscape.
                            </p>
                        </div>
                        <div class="card about-text">
                            <h5 class="fw-bold">Sophistication and Personalization
                            </h5 class="fw-bold">
                            <p>
                                Every project we undertake is infused with sophistication and a unique personal touch,
                                making each brand’s presence truly one-of-a-kind.
                            </p>
                        </div>
                        <div class="card about-text">
                            <h5 class="fw-bold">Expert Team
                            </h5 class="fw-bold">
                            <p>Our team comprises experts in their respective fields, dedicated to delivering exceptional
                                results and exceeding client expectations.
                            </p>
                        </div>
                        <div class="card about-text">
                            <h5 class="fw-bold">Comprehensive Services
                            </h5 class="fw-bold">
                            <p>From strategic planning and content creation to commercial video production, we offer a full
                                suite of services tailored to your brand’s needs.</p>
                        </div>
                    </div>

                    <div class="col-6">
                        <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}"
                            alt="About 1">
                    </div>
                </div>
                <a href="#get-started" class="btn-contact-about ms-3">Let's Collaborate </a>
            </div>
        </div>
    </div>
@endsection
