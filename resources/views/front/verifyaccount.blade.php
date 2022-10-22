@extends('front.layout')
@section('title')
Ahla Beauty Services | User Login
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
                            <h2>Verify your account</h2>
                            <p>Don't have an verification code?</p>
                            <a href="{{ route('user.ResendVerificationCode') }}" class="btn btn-white btn-outline-white" style="color: white !important;">Resend Code</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Verify Account</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    {{-- <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a> --}}
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('user.verifyCode') }}" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="code">Code</label>
                                <input type="text" class="form-control" placeholder="Enter Code" name="code">
                                @if ($errors->has('code'))
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3" style="    background: #212429; border: none;">Verify</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
