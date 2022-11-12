<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function getUploadedImage($id)
    {
        $image = Images::where('user_id', $id)->get();
        if ($image->count() == 0) {
            $response = ['status' => false, 'data' => null, 'message' => "User id is not valid. Thank you!"];
            return response($response, 200);
        } else {
            $response = ['status' => true, 'data' => $image, 'message' => "User id is not valid. Thank you!"];
            return response($response, 401);
        }
    }
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:4096',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        if ($request->has('file')) {
            $image = $request->file('file');
            foreach ($image as $index => $files) {
                $file_origninl_name =  $files->getClientOriginalName();
                $file_name = $file_origninl_name . time() . $index . "." . $files->getClientOriginalExtension();
                $files->move('storage/images/', $file_name);
                $imagepath = url('/') . '/' . 'storage/images/' . $file_name;
                $user = new Images();
                $user->user_id = $request->id;
                $user->image_path = $imagepath;
                $user->save();
            }
            if ($user == true) {
                $response = ['status' => true, 'data' => null, 'message' => "Image is uploaded successfully!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 401);
            }
        }
    }
}
