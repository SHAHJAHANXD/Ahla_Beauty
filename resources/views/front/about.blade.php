@extends('front.layout')
@section('title')
    Ahla Beauty Services
@endsection
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">About us</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/aboutus1.PNG') }}" alt="" style="    height: 370px;">
            </div>
            <div class="col-lg-6">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                    software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
        <div class="row" style="margin-top: 70px;margin-bottom: 70px;">
            <div class="col-lg-6">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                    software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/about2.png') }}" alt="" style="    height: 370px;">
            </div>
        </div>
    </div>
</div>
@endsection
