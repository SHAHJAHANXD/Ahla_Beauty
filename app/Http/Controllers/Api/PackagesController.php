<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PackagesController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'price' => 'required',
                'image' => 'required',
                'title' => 'required',
                'discount' => 'required',
                'publish_date' => 'required',
                'expiry_date' => 'required',
                'category' => 'required',
            ],
            [
                'name.required' => 'Package name is required',
                'price.required' => 'Package price is required',
                'image.required' => 'Package image is required',
                'title.required' => 'Package title is required',
                'publish_date.required' => 'Package publish date is required',
                'expiry_date.required' => 'Package expiry date is required',
                'category.required' => 'Package category is required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $id = Auth::user()->id;
        $package = Package::create($request->all() + ['user_id' => $id]);
        if ($package == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Stored Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function get()
    {
        $id = Auth::user()->id;
        $package = Package::where('user_id', $id)->get();
        if ($package == true) {
            $response = ['status' => true, 'data' => $package, 'message' => "Record Fetched Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Edit(Request $request)
    {
        $count =  Package::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $id = Auth::user()->id;
        $Package = Package::where('id', $request->id)->update($request->all() + ['user_id' => $id]);
        if ($Package == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Edited Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Delete(Request $request)
    {
        $count =  Package::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $Package = Package::where('id', $request->id)->delete();
        if ($Package == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Deleted Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Active(Request $request)
    {
        $count =  Package::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $Package = Package::where('id', $request->id)->update(['status' => 1]);
        if ($Package == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Updated Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Block(Request $request)
    {
        $count =  Package::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $Package = Package::where('id', $request->id)->update(['status' => 0]);
        if ($Package == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Updated Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
}
