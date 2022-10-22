@extends('front.layout')
@section('title')
    Ahla Beauty Services
@endsection
@section('content')
    <div class="container">
        <div class="hero">
            <div class="map">
                <img src="{{ asset('assets/images/ahla/Rectangle 4296.png') }}" alt="Image" class="img-fluid" style="margin-top: 120px;">
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Light Ash Salon</h1>
                  <div style="margin-top: 10px;">
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                  </div>
                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4 text-end">
                    <h1 class="" style="font-weight: 600; color: white; margin-top: 20px;"><a href="" class="open_btn" > Open</a></h1>
                    <br>
                    <b class="" style="font-weight: 600; color: black; margin-top: 20px;">Timings : 1 pm -8 pm</b>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                @include('front.layouts.sidebar')
                <div class="col-sm-6 col-md-3 col-lg-9 blog-entry">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4298.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4299.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store</a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4300.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4301.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store</a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4302.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4299.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                    <a class="visit_btn">Visit
                                        Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4298.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4299.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store</a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4300.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4301.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store</a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4302.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4299.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                    <a class="visit_btn">Visit
                                        Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4298.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4299.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store</a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4300.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4301.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store</a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4302.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                <a class="visit_btn">Visit
                                    Salon</a></p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 blog-entry" data-aos="fade-up" data-aos-delay="300" style="    margin-top: 20px;">
                            <a class="media-thumb rounded">
                                <img src="{{ asset('assets/images/ahla/pics/Rectangle 4299.png') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <h3 class="post-title mb-0"><a href="{{ route('product') }}">The Nail Art Store <span style="color: red">15 % OFF</span></a>
                            </h3>
                            <span style="color: #22C9B8; position: absolute; right: 40px; font-weight: 600;">SAR 198</span>
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn" style="background: #263238;">Add to cart</a>
                                    <a class="visit_btn">Visit
                                        Salon</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
