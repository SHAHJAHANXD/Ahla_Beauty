@extends('front.layout')
@section('title')
    Ahla Beauty and care app
@endsection
@section('content')
    <div class="map">
        <img src="{{ asset('assets/images/contact.png') }}" alt="Image" class="img-fluid slider_img">
    </div>
    <div class="container" style="margin-top: 70px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Contact us</h1>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 70px;">
        <div class="row" style="    margin-bottom: 100px;
        ">
            <div class="col-lg-8">
                <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">We would love to hear from
                    you.</h1>
                    <form action="">
                       <div class="row">
                        <div class="col-lg-6">
                            <label for="name">Name</label>
                            <input type="text" placeholder="" id="name" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email</label>
                            <input type="text" placeholder="" id="email" class="form-control">
                        </div>
                        <div class="col-lg-12">
                            <label for="Message">Message</label>
                            <input type="text" placeholder="" id="Message" class="form-control" style="    height: 140px;">
                        </div>
                        <div class="col-lg-12">
                            <p style="margin-top: 40px;">
                                <a href="{{ route('book') }}" class="visit_btn"
                                    style="    padding: 10px 70px; margin-left: 30px;">Book Now</a>
                            </p>
                        </div>
                       </div>

                    </form>
            </div>
            <div class="col-lg-4">
                <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Visit Us</h1>
                <p>UET Lahore, Punjab, Pakistan
                    <br>
                    Phone: +923039898987
                </p>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Get In Touch</h1>
                        <p>You can get in touch with us on this provided email.
                            <br>
                            Email: hmjawad087@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
