@extends('front.layout')
@section('title')
    Ahla Beauty Services
@endsection
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">My Cart</h1>
                </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center" scope="col"></th>
                        <th class="text-center" scope="col"></th>
                        <th class="text-center"  scope="col">Service </th>
                        <th class="text-center"  scope="col">Price</th>
                        <th class="text-center"  scope="col">Person</th>
                        <th class="text-center"  scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center" >x</td>
                        <td class="text-center" ><img src="{{ asset('assets/images/Rectangle 4306.png') }}" alt="" style="    height: 40px;"></td>
                        <td class="text-center" >Cucumber Facial</td>
                        <td class="text-center" >SAR 59.00</td>
                        <td class="text-center" >1</td>
                        <td class="text-center" >SAR 59.00</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="row" style="margin-top: 60px;">
                <div class="col-lg-4">
                    <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Cart Totals</h1>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
              <div class="col-lg-4">
                <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-left" >Subtotal</td>
                        <td class="text-left" >SAR 59.00</td>
                      </tr>
                      <tr>
                        <td class="text-left" >Shipping Free</td>
                        <td class="text-left" >FREE!!</td>
                      </tr>
                      <tr>
                        <th class="text-left" >Total</th>
                        <th class="text-left" >SAR 59.00</th>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <p style="margin-top: 40px;"><a href="{{ route('billing') }}" class="visit_btn" style="background: #263238;">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
@endsection
