<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    public function SaveBanner(Request $request)
    {
        $id = Auth::guard('api')->user()->id;
        $Banner = new Banner();
        if ($request->hasfile('Image')) {
            $imageName = url('/') . '/' . 'images/banners/' . time() . '.' . $request->Image->extension();
            $Banner->Image = $imageName;
            $request->Image->move(public_path('images/banners'), $imageName);
        }
        $Banner->save();
        if ($Banner == true) {
            $response = ['status' => true, 'data' => $Banner, 'message' => "Record Saved Successfully. Thank you!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function GetBanner()
    {

        $Banner = Banner::get();
        if ($Banner == true) {
            $response = ['status' => true, 'data' => $Banner, 'message' => "Record Saved Successfully. Thank you!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function DeleteBanner($id)
    {

        $Banner = Banner::where('id', $id)->delete();
        if ($Banner == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Deleted Successfully. Thank you!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
}
