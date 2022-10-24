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
            return response($response, 200);
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
                return response($response, 200);
            } else {
                $data['token'] = $data->createToken('mytoken')->plainTextToken;

                $response = ['status' => true, 'data' => $data, 'message' => "Account login successfully!"];
                return response($response, 200);
            }
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 200);
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
            return response($response, 200);
        } else {
            $code = User::where('email', $request->email)->first();
            if ($code->status == 1) {
                $response = ['status' => false, 'data' => null, 'message' => "Email is already verified. Thank you!"];
                return response($response, 200);
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
                    return response($response, 200);
                }
            }
        }
    }
    public function forget_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $email = $request->email;
        $found = User::where('email', $email)->count();
        if ($found == 0) {
            $response = ['status' => false, 'data' => null, 'message' => "Email address not found!"];
            return response($response, 200);
        }
        $code = mt_rand(000000, 999999);
        $mail = Mail::send('emails.forgetEmail', ['code' => $code], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Forget Password');
        });
        if ($mail == true) {
            $user = User::where('email', $email)->first();
            $user->password_code = $code;
            $user->save();
            if ($user == true) {
                $response = ['status' => true, 'data' => null, 'message' => "An email with a reset code sent successfully!"];
                return response($response, 200);
            }
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 200);
        }
    }
    public function update_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'code' => 'required|min:6|max:254',
                'password' => 'required|min:8|max:254',
            ],
            [
                'email.required' => 'Email is required...',

                'code.required' => 'Code is required...',
                'code.min' => 'Code must be atleast 6 characters...',
                'code.max' => 'Code must be less then 254 characters...',

                'password.required' => 'Password is required...',
                'password.min' => 'Password must be atleast 8 characters...',
                'password.max' => 'Password must be less then 254 characters...',

            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $email = $request->email;
        $found = User::where('email', $email)->count();
        if ($found == 0) {
            $response = ['status' => false, 'data' => null, 'message' => "Email address not found!"];
            return response($response, 200);
        } else {
            $code = User::where('email', $email)->first();
            if ($code->password_code == $request->code) {
                $user = User::where('email', $email)->first();
                $user->password = Hash::make($request->password);
                $user->password_code = null;
                $user->save();
                $response = ['status' => false, 'data' => null, 'message' => "Password changed successfully!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'data' => null, 'message' => "Code is invalid!"];
                return response($response, 200);
            }
        }
    }
}
