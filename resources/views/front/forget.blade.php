@extends('front.layout')
@section('title')
Ahla Beauty Services | User Forget Password
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
                            <h2>Forget Password</h2>
                            <p>Password Requested?</p>
                            <a href="{{ route('user.login') }}" class="btn btn-white btn-outline-white" style="color: white !important;">Sign In</a>
                         </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            
                                <h3 class="mb-4">Forget Password</h3>
                           
                           
                        </div>
                        <form action="#" class="signin-form">
                            <div class="form-group mb-3">
                                <label class="label" for="name">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3" style="    background: #212429; border: none;">Request Reset Password</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
