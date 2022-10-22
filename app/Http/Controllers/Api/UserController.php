<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {

            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $code = mt_rand(000000, 999999);
        $mail = Mail::send('emails.verifyemail', ['code' => $code], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Verify Email');
        });
        if ($mail == true) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->code = $code;
            $user->save();
            if ($user == true) {
                $response = ['status' => true, 'data' => null, 'message' => "Account created successfully. Please check your email to verify your account. Thank you!"];
                return response($response, 200);
            }
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|  ',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {

            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $data = User::where('email', $request->email)->first();
            if ($data->status == 0) {
                $response = ['status' => false, 'data' => null, 'message' => "Your account is not verified. Please verify your account. Thank you!"];
                return response($response, 400);
            } else {
                $response = ['status' => true, 'data' => $data, 'message' => "Account login successfully!"];
                return response($response, 200);
            }
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function verify_code(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'code' => 'required|max:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $user = User::where('email', $request->email)->count();
        if ($user == 0) {
            $response = ['status' => false, 'data' => null, 'message' => "Email address is not found."];
            return response($response, 400);
        } else {
            $code = User::where('email', $request->email)->first();
            if ($code->status == 1) {
                $response = ['status' => false, 'data' => null, 'message' => "Email is already verified. Thank you!"];
                    return response($response, 400);
            } else {
                if ($code->code == $request->code) {
                    $user_update = User::where('email', $request->email)->first();
                    $user_update->status = '1';
                    $user_update->code = 'Verified';
                    $user_update->save();
                    $response = ['status' => true, 'data' => null, 'message' => "Account verified successfully!"];
                    return response($response, 200);
                } else {
                    $response = ['status' => false, 'data' => null, 'message' => "Code is Invalid!"];
                    return response($response, 400);
                }
            }
        }
    }
}
