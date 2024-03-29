@extends('admin.layout')
@section('title')
Admin | Add City
@endsection
@section('extra-heads')
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add City</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add City</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="justify-content: center;">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">City</h3>
                        </div>
                        <div class="card-body">
                            <form action="/administrator/post-cities" enctype="multipart/form-data" method="POST">
                                @csrf
                                <label for="country_name">Country name</label>
                                <input type="text" class="form-control" hidden name="country" value="{{ $countries->id }}" readonly>
                                <input type="text" class="form-control" value="{{ $countries->name }}" placeholder="{{ $countries->name }}" readonly>
                                <label for="city_name">Add City name</label>
                                <input type="text" class="form-control" id="city_name" name="city" placeholder="Enter City Name">
                                @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                                <div class="div" style="margin-top: 20px; ">
                                    <button type="submit" class="btn btn-primary form-control">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
