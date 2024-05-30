@extends('layouts.public-layout')
@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-8 col-xl-8 col-xxl-8  px-5 py-5">
                    <h1 class="fw-bold">Our Services </h1>
                    <p style="font-size: 14px">At Giverzo Commercial, we specialize in delivering comprehensive solutions
                        designed to enhance your brand’s presence and impact in the digital world. Our services are crafted
                        to meet the unique needs of your brand, ensuring effective and engaging communication with your
                        audience.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5 pt-3">
        <div class="row gy-3 gy-md-4 gy-lg-0 ">
            <div class="col-12 col-lg-6 col-xl-5">
                <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}" alt="About 1">
            </div>
            <div class="col-12 col-xl-7">
                <div class="row">
                    <div class="col-lg-3 col-xl-3 col-xxl-3"></div>
                    <div class="col-lg-9 col-xl-9 col-xxl-9 col-sm-12 about-text">
                        <h4 class="mb-3 fw-bold">Social Media Management</h4>
                        <p class="mb-5 fw-lighter lh-base">Our Social Media Management service is an all-inclusive package designed to
                            elevate your brand’s presence across social media platforms. We handle everything from content
                            creation and production to scheduling and audience engagement, ensuring your brand stands out
                            and connects with your target market.</p>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <h4 class="text-center">Recent work</h4>
                <div class="container col-12 text-center">
                    <div class="row">
                        <div class="col-4 py-3">
                            <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}"
                                alt="About 1">
                            <div class="fw-bold">KYRRA</div>
                            <span>Fashion & Clothing</span>
                        </div>
                        <div class="col-4 py-3">
                            <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}"
                                alt="About 1">
                            <div class="fw-bold">KYRRA</div>
                            <span>Fashion & Clothing</span>
                        </div>
                        <div class="col-4 py-3">
                            <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}"
                                alt="About 1">
                            <div class="fw-bold">KYRRA</div>
                            <span>Fashion & Clothing</span>
                        </div>
                        <div class="col-4 py-3">
                            <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}"
                                alt="About 1">
                            <div class="fw-bold">KYRRA</div>
                            <span>Fashion & Clothing</span>
                        </div>
                        <div class="col-4 py-3">
                            <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}"
                                alt="About 1">
                            <div class="fw-bold">KYRRA</div>
                            <span>Fashion & Clothing</span>
                        </div>
                        <div class="col-4 py-3">
                            <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}"
                                alt="About 1">
                            <div class="fw-bold">KYRRA</div>
                            <span>Fashion & Clothing</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row gy-3 gy-md-4 gy-lg-0 py-5 mt-5">
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="row">
                    <div class="col-12 col-xl-11 about-text">
                        <h4 class="mb-3 fw-bold">Commercial Video Production</h4>
                        <p class="mb-5">We help you bring your campaigns to life with our Commercial Video Production
                            service. Whether you need a promotional video, a brand story, or a product showcase, we
                            visualize your campaign in a way that captivates your audience and effectively conveys your
                            brand’s message.</p>
                        <div class="row gy-4 gy-md-0 gx-xxl-5X">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-5">
                <img class="img-fluid rounded" loading="lazy" src="{{ asset('assets/img/about.png') }}" alt="About 1">
            </div>
        </div>
    </div>
@endsection
