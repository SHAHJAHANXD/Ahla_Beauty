<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:4096',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        if ($request->has('file')) {
            $image = $request->file('file');
            $rand = rand(000000000000000 , 999999999999999);
            foreach ($image as $index => $files) {
                $file_name =  $rand . $index . "." . $files->getClientOriginalExtension();
                $files->move('storage/images/', $file_name);
                $imagepath = url('/') . '/' . 'storage/images/' . $file_name;
                $user = new Images();
                $user->image_path = $imagepath;
                $user->rand = $rand;
                $user->save();
            }
            $image = Images::where('rand', $rand)->get();
            if ($user == true) {
                $response = ['status' => true, 'data' => $image[0], 'message' => "Image is uploaded successfully!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        }
    }
}
