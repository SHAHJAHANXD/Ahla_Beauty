@extends('front.layout')
@section('title')
    Ahla Beauty Services
@endsection
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Billing details</h1>
                </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <div class="col-lg-6">
                    <form action="">
                        <label>Full Name <span style="color: red">*</span></label>
                        <input type="text" name="name" class="form-control">
                        <label>Street address<span style="color: red">*</span></label>
                        <input type="text" id="Street address" name="name" class="form-control"
                            placeholder="House number and street name">
                        <label>Town / City <span style="color: red">*</span></label>
                        <input type="text" id="Town" name="name" class="form-control">
                        <label>Phone <span style="color: red">*</span></label>
                        <input type="text" name="name" class="form-control">
                        <label>Email address*<span style="color: red">*</span></label>
                        <input type="text" name="name" class="form-control">
                    </form>
                </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <div class="col-lg-12">
                    <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Your order</h1>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12">
                    <table class="table" style="    border: 1px solid #EBEBEB;">
                        <tbody>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Total</th>
                            </tr>
                            <tr>
                                <td scope="row">Cucumber Facial</td>
                                <td colspan="2">SAR 59.00</td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td>SAR 59.00</td>
                            </tr>
                            <tr>
                                <td scope="row">Total</td>
                                <td>SAR 59.00</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <div class="col-lg-12">
                    <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Payment Method</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 border_setting">
                    <img src="{{ asset('assets/images/Rectangle.png') }}" alt="" style="height: 25px;">
                   <span>Cash on visit</span>
                </div>
                <div class="col-lg-5 border_setting offset-lg-1">
                    <img src="{{ asset('assets/images/card2.png') }}" alt="" style="height:25px;">
                    <span>Debit Card</span>
                </div>
                <div class="col-lg-5 border_setting">
                    <img src="{{ asset('assets/images/card3.PNG') }}" alt="" style="height:25px;">
                    <span>My Wallet</span>
                </div>
                <div class="col-lg-5 border_setting offset-lg-1">
                    <img src="{{ asset('assets/images/card4.svg') }}" alt="" style="height: 25px;     border-radius: 5px;">
                    <span>Apply Pay</span>
                </div>
               <div class="col-12 a_bdr_stng"">
                <a href="" >
                    Cash on Visit.  Please contact us if you require assistance or wish to make alternate arrangements.
                </a>
               </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <div class="col-lg-12">
                    <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Payment Card Details</h1>
                </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <div class="col-lg-7">
                    <form action="">
                        <label for=""></label>
                        <input type="text" name="name" class="form-control" placeholder="Account holder Name" style="padding: 25px;}">
                        <label for=""></label>
                        <input type="text" id="Street address" name="name" class="form-control"
                            placeholder="Account Number" style="padding: 25px;}">
                            <label for=""></label>
                        <input type="text" id="Town" name="name" class="form-control" placeholder="CVV" style="padding: 25px;}">
                    </form>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('assets/images/discover.png') }}" alt="" style="height: 250px;">
                </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <p style="margin-top: 40px;"><a class="visit_btn">Confirm Payment</a></p>
            </div>
        </div>
    </div>
@endsection
