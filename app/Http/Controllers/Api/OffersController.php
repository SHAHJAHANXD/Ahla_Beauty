<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'offer_image' => 'required',
                'offer_title' => 'required',
                'offer_discount' => 'required',
                'offer_description' => 'required',
                'offer_publish_date' => 'required',
                'offer_expiry_date' => 'required',
                'offer_category' => 'required',
                'user_id' => 'required',
            ],
            [
                'offer_image.required' => 'Offer image is required',
                'offer_title.required' => 'Offer title is required',
                'offer_discount.required' => 'Offer discount is required',
                'offer_description.required' => 'Offer description is required',
                'offer_publish_date.required' => 'Offer publish date is required',
                'offer_expiry_date.required' => 'Offer expiry date is required',
                'offer_category.required' => 'Offer category is required',
                'user_id.required' => 'User id is required',
            ]
        );
        if ($validator->fails()) {

            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $offer = new Offers();
        $offer->user_id = $request->user_id;
        if ($request->hasfile('offer_image')) {
            $imageName = env('APP_URL') . 'images/offers/' . time() . '.' . $request->offer_image->extension();
            $offer->offer_image = $imageName;
            $request->offer_image->move(public_path('images/offers'), $imageName);
        }
        $offer->offer_title = $request->offer_title;
        $offer->offer_discount = $request->offer_discount;
        $offer->offer_description = $request->offer_description;
        $offer->offer_publish_date = $request->offer_publish_date;
        $offer->offer_expiry_date = $request->offer_expiry_date;
        $offer->offer_category = $request->offer_category;
        $offer->save();
        if ($offer == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Offers created successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 401);
        }
    }
}
