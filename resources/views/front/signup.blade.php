@extends('front.layout')
@section('title')
Ahla Beauty Services | User Sign Up
@endsection
@section('extra-heads')
<link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/login-form-17/css/A.style.css.pagespeed.cf.PgCMkVC7B9.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<style>
    .form-control {
        border-radius: 5px;
        background: white;
        border: 1px solid gray;
    }

    .btn-white:hover {
        color: black !important;
    }

</style>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last" style="    background: #212429;">
                        <div class="text w-100">
                            <h2>Welcome to Sign Up</h2>
                            <p>Already have an account?</p>
                            <a href="{{ route('user.login') }}" class="btn btn-white btn-outline-white bg-dark-btn" style="color: white !important;">Sign In</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    {{-- <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a> --}}
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('user.register') }}" class="signin-form" method="POST">
                            @if (Session::has('success'))
                            <div class="alert alert-success m-4" style="width: 90%;">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="alert alert-danger m-4" style="width: 90%;">
                                {{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" name="phone" required>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3" style="    background: #212429; border: none;">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
