<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'date' => 'required',
                'distance_cost' => 'required',
                'availablity' => 'required',
                'category' => 'required',
            ],
            [
                'name.required' => 'Services name is required',
                'date.required' => 'Services date is required',
                'distance_cost.required' => 'Services distance cost is required',
                'availablity.required' => 'Availablity title is required',
                'category.required' => 'Services category is required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $id = Auth::user()->id;
        $Services = Services::create($request->all() + ['user_id' => $id]);
        if ($Services == true) {
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
        $Services = Services::where('user_id', $id)->get();
        if ($Services == true) {
            $response = ['status' => true, 'data' => $Services, 'message' => "Record Fetched Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Edit(Request $request)
    {
        $count =  Services::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $id = Auth::user()->id;
        $Services = Services::where('id', $request->id)->update($request->all() + ['user_id' => $id]);
        if ($Services == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Edited Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Delete(Request $request)
    {
        $count =  Services::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $Services = Services::where('id', $request->id)->delete();
        if ($Services == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Deleted Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Active(Request $request)
    {
        $count =  Services::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $Services = Services::where('id', $request->id)->update(['status' => 1]);
        if ($Services == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Updated Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Block(Request $request)
    {
        $count =  Services::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $Services = Services::where('id', $request->id)->update(['status' => 0]);
        if ($Services == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Updated Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
}
