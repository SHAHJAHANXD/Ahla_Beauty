<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
    public function services()
    {
        return view('front.services');
    }
    public function salon()
    {
        return view('front.salon');
    }
    public function product()
    {
        return view('front.product');
    }
    public function book()
    {
        return view('front.book');
    }
    public function cart()
    {
        return view('front.cart');
    }
    public function billing()
    {
        return view('front.billing');
    }
    public function payments()
    {
        return view('front.payments');
    }
    public function about()
    {
        return view('front.about');
    }
    public function contact()
    {
        return view('front.contact');
    }

}
