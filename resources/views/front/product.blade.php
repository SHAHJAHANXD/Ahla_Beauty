@extends('front.layout')
@section('title')
    Ahla Beauty Services
@endsection
@section('content')
    <style>
        .counter {
            width: 150px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #BFFFF9;
            border-radius: 5px;
        }

        .counter input {
            width: 50px;
            border: 0;
            line-height: 30px;
            font-size: 20px;
            text-align: center;
            color: black;
            appearance: none;
            background: #BFFFF9;
            outline: 0;
        }

        .counter span {
            display: block;
            font-size: 25px;
            padding: 0 10px;
            cursor: pointer;
            color: black;
            user-select: none;
        }
    </style>
    <div class="container">
        <div class="hero">
            <div class="map">
                <img src="{{ asset('assets/images/ahla/Rectangle 4296.png') }}" alt="Image" class="img-fluid"
                    style="margin-top: 120px;">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Light Ash Salon</h1>
                        <div style="margin-top: 10px;">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">

                    </div>
                    <div class="col-lg-4 col-sm-12 text-end">
                        <h1 class="" style="font-weight: 600; color: white; margin-top: 20px;"><a href=""
                                class="open_btn"> Open</a></h1>
                        <br>
                        <b class="" style="font-weight: 600; color: black; margin-top: 20px;">Timings : 1 pm -8 pm</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-9 blog-entry">
                    <b style="font-size: 25px;">Services</b>
                    <p>Home <b>></b> Services <b>></b>Light Ash Salon <b>></b> Skin <b>></b> Cucumber Facial</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 blog-entry" data-aos="fade-up" data-aos-delay="300"
                    style="margin-top: 20px;">
                    <a class="media-thumb rounded">
                        <img src="{{ asset('assets/images/ahla/pics/Rectangle 4302.png') }}" alt="Image"
                            class="img-fluid " style=" height: 600px;">
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 blog-entry" data-aos="fade-up" data-aos-delay="300"
                    style="margin-top: 20px;">

                    <h3 class="post-title mb-0" style="margin-top: 20px;font-size: 30px;">Cucumber Facial
                    </h3>
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="post-title mb-0" style="margin-top: 20px; color: red;">Exclusive Discount 15 % OFF

                            </h3>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="post-title mb-0" style="margin-top: 20px; color: #22C9B8;">SAR 165
                            </h3>
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="post-title mb-0" style="margin-top: 20px;">Description
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 20px;">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it .
                                <br>
                                It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                here', making it look like readable English.
                            </p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-3">
                            <h3 class="post-title mb-0">Persons
                            </h3>
                        </div>
                        <div class="col-lg-3">
                            <div class="counter">
                                <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                <input type="text" value="1">
                                <span class="up" onClick='increaseCount(event, this)'>+</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p style="text-align: center;margin-top: 40px;"><a class="visit_btn"
                                    style="background: #263238; padding: 10px 70px;">Add to cart</a>
                                <a href="{{ route('book') }}" class="visit_btn"
                                    style="    padding: 10px 70px; margin-left: 30px;">Book Now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p style="margin-top: 40px;"><a class="desc_btn" style=" ">Description</a>
                        <a class="desc_btn" style=" ">Reviews (3)</a>

                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p style="margin-top: 40px;">
                        A key objective is engaging digital marketing customers and allowing them to interact with the brand
                        through servicing and delivery of digital media. Information is easy to access at a fast rate
                        through the use of digital communications.
                        <br>
                        <br>
                        <br>
                        Users with access to the Internet can use many digital mediums, such as Facebook, YouTube, Forums,
                        and Email etc. Through Digital communications it creates a Multi-communication channel where
                        information can be quickly exchanged around the world by anyone without any regard to whom they
                        are.[28] Social segregation plays no part through social mediums due to lack of face to face
                        communication and information being wide spread instead to a selective audience.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p style="margin-top: 40px;"><a class="review_btn" style=" ">All</a>
                        <a class="review_btn" style=" ">1 <span
                                class="icon-star"></span></a>
                        <a class="review_btn" style=" ">2 <span
                                class="icon-star"></span></a>
                        <a class="review_btn" style=" ">3 <span
                                class="icon-star"></span></a>
                        <a class="review_btn" style=" ">4 <span
                                class="icon-star"></span></a>
                        <a class="review_btn" style=" ">5 <span
                                class="icon-star"></span></a>

                    </p>
                </div>
            </div>
            <div class="row" style="padding: 30px; margin-bottom: 50px; border: 2px solid;  border-radius: 10px;margin-top: 20px;">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ asset('assets/images/Ellipse 7.png') }}" alt="User Image">
                        </div>
                        <div class="col-lg-8">
                            <p style="font-weight: 600; margin-bottom: 0;">Scarlet Rommanof</p>
                            <p>29 Aug 2021</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4" style="text-align: end;">
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <br>
                    <img src="{{ asset('assets/images/Vector (3).png') }}" alt="User Image" style="    margin-right: 12px;">
                    <span style="color: #22C9B8">7</span>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 30px; margin-bottom: 50px; border: 2px solid;  border-radius: 10px;margin-top: 20px;">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ asset('assets/images/Ellipse 7.png') }}" alt="User Image">
                        </div>
                        <div class="col-lg-8">
                            <p style="font-weight: 600; margin-bottom: 0;">Scarlet Rommanof</p>
                            <p>29 Aug 2021</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4" style="text-align: end;">
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <br>
                    <img src="{{ asset('assets/images/Vector (3).png') }}" alt="User Image" style="    margin-right: 12px;">
                    <span style="color: #22C9B8">7</span>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 30px; margin-bottom: 50px; border: 2px solid;  border-radius: 10px;margin-top: 20px;">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ asset('assets/images/Ellipse 7.png') }}" alt="User Image">
                        </div>
                        <div class="col-lg-8">
                            <p style="font-weight: 600; margin-bottom: 0;">Scarlet Rommanof</p>
                            <p>29 Aug 2021</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4" style="text-align: end;">
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <br>
                    <img src="{{ asset('assets/images/Vector (3).png') }}" alt="User Image" style="    margin-right: 12px;">
                    <span style="color: #22C9B8">7</span>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 30px; margin-bottom: 50px; border: 2px solid;  border-radius: 10px;margin-top: 20px;">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ asset('assets/images/Ellipse 7.png') }}" alt="User Image">
                        </div>
                        <div class="col-lg-8">
                            <p style="font-weight: 600; margin-bottom: 0;">Scarlet Rommanof</p>
                            <p>29 Aug 2021</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4" style="text-align: end;">
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <span class="icon-star" style="font-size: 30px;"></span>
                    <br>
                    <img src="{{ asset('assets/images/Vector (3).png') }}" alt="User Image" style="    margin-right: 12px;">
                    <span style="color: #22C9B8">7</span>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
               <form action="">
                <div class="row" style="    margin-bottom: 70px;">
                    <div class="col-lg-8">
                        <input type="text" name="" id="" class="form-control" placeholder="Add your review.." style="    height: 130px;">
                    </div>
                    <div class="col-lg-4" style="margin-top: auto;
                    margin-bottom: auto;">
                        <button class="btn btn-success">Submit Review</button>
                    </div>
                </div>
               </form>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        function increaseCount(a, b) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        }

        function decreaseCount(a, b) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        }
    </script>
@endsection
