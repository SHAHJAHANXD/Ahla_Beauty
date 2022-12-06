<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OfferCategories;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'required',
                'title' => 'required',
                'discount' => 'required',
                'description' => 'required',
                'publish_date' => 'required',
                'expiry_date' => 'required',
                'category' => 'required',
            ],
            [
                'image.required' => 'Offer image is required',
                'title.required' => 'Offer title is required',
                'discount.required' => 'Offer discount is required',
                'description.required' => 'Offer description is required',
                'publish_date.required' => 'Offer publish date is required',
                'expiry_date.required' => 'Offer expiry date is required',
                'category.required' => 'Offer category is required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $id = Auth::user()->id;
        $offer = new Offers();
        $offer->user_id = Auth::user()->id;
        $offer->image = $request->image;
        $offer->title = $request->title;
        $offer->discount = $request->discount;
        $offer->description = $request->description;
        $offer->publish_date = $request->publish_date;
        $offer->expiry_date = $request->expiry_date;
        $offer->save();

        if ($request->category == true) {
            foreach ($request->category as $categorys) {
                $time = new OfferCategories();
                $time->offer_id = $offer->id;
                $time->category_id = $categorys['id'];
                $time->save();
            }
        }

        if ($offer == true) {
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
        $offer = Offers::where('user_id', $id)->get();
        if ($offer == true) {
            $response = ['status' => true, 'data' => $offer, 'message' => "Record Fetched Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Edit(Request $request)
    {
        $count =  Offers::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $id = Auth::user()->id;
        $offer = Offers::where('id', $request->id)->update($request->all() + ['user_id' => $id]);
        if ($offer == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Edited Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Delete(Request $request)
    {
        $count =  Offers::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $offer = Offers::where('id', $request->id)->delete();
        if ($offer == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Deleted Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Active(Request $request)
    {
        $count =  Offers::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $offer = Offers::where('id', $request->id)->update(['status' => 1]);
        if ($offer == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Updated Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Block(Request $request)
    {
        $count =  Offers::where('id', $request->id)->count();
        if ($count == 0) {
            $response = ['status' => true, 'data' => null, 'message' => "Record ID not found!"];
            return response($response, 200);
        }
        $offer = Offers::where('id', $request->id)->update(['status' => 0]);
        if ($offer == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Updated Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
}
