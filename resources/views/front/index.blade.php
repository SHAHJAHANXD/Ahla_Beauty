@extends('front.layout')
@section('title')
    Ahla Beauty and care app
@endsection
@section('content')
    <div class="hero">
        <div class="map">
            <img src="{{ asset('assets/images/ahla/slider.png') }}" alt="Image" class="img-fluid slider_img">
        </div>
        <div class="container" style="    margin-top: 20px;">
            <div class="row justify-content-center">
                <div class="col-lg-7 d-all-block">
                    <h1 class="heading" data-aos="fade-up">LOOK BETTER FEEL BETTER</h1>
                    <p class="lead" data-aos="fade-up" data-aos-delay="100" style="font-weight: 400;">Radiant beauty from
                        the inside out.</p>
                    <form action="#" class="form-search d-flex align-items-stretch mb-5" data-aos="fade-up"
                        data-aos-delay="200" style="justify-content: center;">

                        <button type="submit" class="btn btn-primary" style="font-weight: 600;">Explore</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" data-aos="fade-up" data-aos-delay="0" style="z-index: 1">
                    <div class="feature box-shadow">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/Ellipse 205.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 10px;">
                                    <h3 class="heading m-b-30">Men</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/Ellipse 206.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 10px;">
                                    <h3 class="heading m-b-30">Women</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/Ellipse 207.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 10px;">
                                    <h3 class="heading m-b-30">Both</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <h1 class="heading" data-aos="fade-up" style="text-align: center;font-weight: 600; ">Latest- <span
                style="color: #22C9B8">Discount Offers</span></h1>
    </section>
    <div class="section pt-0" style="    padding-top: 50px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 order-lg-2" data-aos="fade-left">
                    <img src="{{ asset('assets/images/ahla/Rectangle 4272.png') }}" alt="Image"
                        class="img-fluid rounded m-b-50">
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="feature d-flex mb-5" data-aos="fade-right" data-aos-delay="200">
                        <img src="{{ asset('assets/images/ahla/Rectangle 4270.png') }}" alt="Image" class="img-fluid img-height-330"
                            style="">
                    </div>
                    <div class="feature d-flex" data-aos="fade-right" data-aos-delay="300">
                        <img src="{{ asset('assets/images/ahla/Rectangle 4271.png') }}" alt="Image" class="img-fluid img-height-330"
                            style="">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <h1 class="heading" data-aos="fade-up" style="text-align: center;font-weight: 600; ">Services- <span
                style="color: #22C9B8"> We Offer</span></h1>
    </section>
    <div>
        <div class="container" style="    margin-top: 50px;">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" data-aos="fade-up" data-aos-delay="0" style="z-index: 1">
                    <div class="feature">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/services/Ellipse 215.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 40px;">
                                    <h3 class="heading m-b-30">Hair</h3>
                                </div>
                            </div>
                             <div class="col-lg-2 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/services/Ellipse 216.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 40px;">
                                    <h3 class="heading m-b-30">Nails</h3>
                                </div>
                            </div>
                             <div class="col-lg-2 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/services/Ellipse 217.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 40px;">
                                    <h3 class="heading m-b-30">Feets</h3>
                                </div>
                            </div>
                             <div class="col-lg-2 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/services/Ellipse 218.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 40px;">
                                    <h3 class="heading m-b-30">Hands</h3>
                                </div>
                            </div>
                             <div class="col-lg-2 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/services/Ellipse 219.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 40px;">
                                    <h3 class="heading m-b-30">Bride</h3>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-2 text-center">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ahla/services/Ellipse 220.png') }}" alt="Image"
                                        class="img-fluid img-radius">
                                </div>
                                <div class="text" style="margin-top: 40px;">
                                    <h3 class="heading m-b-30">Facial & Spa</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section style="margin-top: 90px;">
        <h1 class="heading" data-aos="fade-up" style="text-align: center;font-weight: 600; ">Experience the <span
                style="color: #22C9B8"> Best Beauty Services</span></h1>
    </section>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('product') }}" class="media-thumb rounded">
                        <img src="{{ asset('assets/images/ahla/beauty/Rectangle 4273.png') }}" alt="Image"
                            class="img-fluid">
                    </a>
                    <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Big Tease Saloon</a>
                    </h3>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span style="color: red; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                    <p style="text-align: center;margin-top: 30px;"><a href="{{ route('salon') }}" class="visit_btn">Visit
                            Salon</a></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('product') }}" class="media-thumb rounded">
                        <img src="{{ asset('assets/images/ahla/beauty/Rectangle 4274.png') }}" alt="Image"
                            class="img-fluid">
                    </a>
                    <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Hair Pantry</a>
                    </h3>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span style="color: red; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                    <p style="text-align: center;margin-top: 30px;"><a href="{{ route('salon') }}" class="visit_btn">Visit
                            Salon</a></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('product') }}" class="media-thumb rounded">
                        <img src="{{ asset('assets/images/ahla/beauty/Rectangle 4275.png') }}" alt="Image"
                            class="img-fluid">
                    </a>
                    <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store</a>
                    </h3>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span style="color: red; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                    <p style="text-align: center;margin-top: 30px;"><a href="{{ route('salon') }}" class="visit_btn">Visit
                            Salon</a></p>
                </div>
            </div>
        </div>
    </div>
    <section style="margin-top: 90px;">
        <div class="div text-center">
            <a href="{{ route('services') }}" class="view_btn">View More</a>
        </div>
    </section>

    <section style="margin-top: 100px; margin-bottom: 100px;">
        <h1 class="heading" data-aos="fade-up" style="text-align: center;font-weight: 600; ">About-<span
                style="color: #22C9B8">Ahla Beauty & Care</span></h1>
    </section>
    <section style="    margin-bottom: 150px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center d-all-block">
                    <img src="{{ asset('assets/images/ahla/Rectangle 4278.png') }}" alt="image">
                </div>
                <div class="col-lg-7 text-center d-all-block">
                    <img src="{{ asset('assets/images/ahla/Rectangle 4276.png') }}" alt="image" class="m-t-200">
                </div>
                <div class="col-lg-5 col-sm-12" style="margin-top: 100px;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it .

                    It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                    of letters, as opposed to using 'Content here, content here', making it look like readable English.
                </div>
            </div>
            <div class="row d-all-block">
                <div class="col-lg-2  text-center d-all-block">
                    <img src="{{ asset('assets/images/ahla/Rectangle 4277.png') }}" alt="image" style="margin-top: -100px;" class="d-all-block">
                </div>
            </div>
        </div>
    </section>
@endsection
