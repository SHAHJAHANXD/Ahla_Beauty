<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $order = Booking::create($request->all() + ['user_id' => Auth::user()->id]);
        if ($order == true) {
            $response = ['status' => true, 'data' => $order, 'message' => "Record saved Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function getByUser()
    {
        $order = Booking::where('user_id',  Auth::user()->id)->get();
        if ($order == true) {
            $response = ['status' => true, 'data' => $order, 'message' => "Record fetched Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function getBySalon()
    {
        $order = Booking::where('salon_id', 1)->get();
        if ($order == true) {
            $response = ['status' => true, 'data' => $order, 'message' => "Record fetched Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
}
