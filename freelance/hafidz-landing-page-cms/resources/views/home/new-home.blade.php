@extends('layouts.public-layout')
@section('content')
        <section id="hero" class="hero section">
            <img class="w-100" src="{{asset('assets/img/Header.png')}}" alt="">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-12">
                            <h1>GIVERZO COMMERCIAL</h1>
                            <p>Visually Create The Very Versace Of Your Brand</p>
                            <a href="#get-started" class="btn-get-started">Contact Us Today</a>
                        </div>
                    </div>
                </div>
        </section>
    <div class="site-section bg-left-half mb-5 mt-5">
        <div class="text-center">
            <p>It’s a cliché but we are your one stop solution. We conceptualise, we curate, we create.</p>
        </div>
        <div class="owl-2-style mt-5">
            <div class="owl-carousel owl-2 text-center">
                <div class="media-29101">
                    <div class="img-container">
                        <img src="{{ asset('assets/img/carousel/We-Analyze.jpg')}}" alt="Image" class="img-thumbnail">
                        
                    </div>
                    <h3><span href="#">We Analize</span></h3>
                    <a href="#" class="text-decoration-none text-carousel">Understanding your brand's 
                        current position and audience</a>
                </div>
                <div class="media-29101">
                    <div class="img-container">
                        <img src="{{ asset('assets/img/carousel/We-Research.jpg')}}" alt="Image" class="img-thumbnail">
                    </div>
                    <h3><span href="#">We Research</span></h3>
                    <a href="#" class="text-decoration-none text-carousel">Gathering insights and data
                        to inform our strategies</a>
                </div>
                <div class="media-29101">
                    <div class="img-container">
                        <img src="{{ asset('assets/img/carousel/We-Plan.jpg')}}" alt="Image" class="img-thumbnail">
                    </div>
                    <h3><span href="#">We Plan</span></h3>
                    <a href="#" class="text-decoration-none text-carousel">Developing tailored strategies
                        to meet your goals</a>
                </div>
                <div class="media-29101">
                    <div class="img-container">
                        <img src="{{ asset('assets/img/carousel/We-Create.jpg')}}" alt="Image" class="img-thumbnail">
                    </div>
                    <h3><span href="#">We Create</span></h3>
                    <a href="#" class="text-decoration-none text-carousel">Crafting compelling content 
                        and campaigns</a>
                </div>
                <div class="media-29101">
                    <div class="img-container">
                        <img src="{{asset('assets/img/carousel/We-Evaluate.jpg') }}" alt="Image" class="img-thumbnail">
                    </div>
                    <h3><span href="#">We Evaluate</span></h3>
                    <a href="#" class="text-decoration-none text-carousel">Measuring results and refining for continuous improvement."</a>
                </div>
            </div>

        </div>
    </div>

    <div class="site-section bg-client mb-5 mt-5">
        <div class="title text-center about-text">
            <h1>Our Recent Client</h1>
        </div>
        <div class="container-fluid d-flex align-content-center justify-content-center flex-wrap py-5">
            <div>
                @foreach ($clients as $client)
                <img src="{{ asset($client->image)}}" class ="px-3 py-2" alt="{{$client->name}}">
                @endforeach
            </div>

          </div>
    </div>
    </div>
@endsection
