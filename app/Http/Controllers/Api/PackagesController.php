<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Optional;
use App\Models\OtherImages;
use App\Models\Package;
use App\Models\Required;
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
                'discount' => 'required',
                'description' => 'required',
                'publish_date' => 'required',
                'expiry_date' => 'required',
            ],
            [
                'name.required' => 'Package name is required',
                'price.required' => 'Package price is required',
                'image.required' => 'Package image is required',
                'publish_date.required' => 'Package publish date is required',
                'expiry_date.required' => 'Package expiry date is required',
                'discount.required' => 'Package discount rate is required',
                'description.required' => 'Package description is required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $id = Auth::user()->id;
        $package = Package::create($request->all() + ['user_id' => $id]);
        if ($request->image == true) {
            foreach ($request->image as $image) {
                $data = new OtherImages();
                $data->package_id = $package->id;
                $data->image_path = $image['url'];
                $data->save();
            }
        }
        if ($request->optional == true) {
            foreach ($request->optional as $optionals) {
                $data = new Optional();
                $data->package_id = $package->id;
                $data->title = $optionals['title'];
                $data->price = $optionals['item_price'];
                $data->save();
            }
        }
        if ($request->required == true) {
            foreach ($request->required as $require) {
                $data = new Required();
                $data->package_id = $package->id;
                $data->title = $require['title'];
                $data->price = $require['item_price'];
                $data->save();
            }
        }
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
        $sss = Package::where('user_id', $id)->with('Optional')->with('Required')->with('Images')->get();
        foreach ($sss as $Optional) {
            $data = $sss;
        }
        if ($data == true) {
            $response = ['status' => true, 'data' => $data, 'message' => "Record Fetched Successfully!"];
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
        Optional::where('package_id', $request->id)->delete();
        Required::where('package_id', $request->id)->delete();
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
