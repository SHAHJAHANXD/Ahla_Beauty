<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ExpertController extends Controller
{

    public function update()
    {
        return Auth::user();
    }
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'name' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|min:8',
                'shift' => 'required',
                'expertise' => 'required',
                'level' => 'required',
                'salon_id' => 'required',
            ],
            [
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'phone.required' => 'Phone number is required!',
                'password.required' => 'Password is required!',
                'shift.required' => 'Shift is required!',
                'expertise.required' => 'Expertise is required!',
                'level.required' => 'Level is required!',
                'salon_id.required' => 'Salon id is required!',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $password = Str::random(10);
        $code = mt_rand(000000, 999999);
        $data = ['email' => $request->email, 'password' => $password, 'name' => $request->name, 'code' => $code];
        $mail = Mail::send(
            'emails.password',
            $data,
            function ($message) use ($data) {
                $message->to($data['email'])->subject('Your account details');
            }
        );
        if ($mail == true) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = 'Staff';
            $user->salon_id = $request->salon_id;
            $user->shift = $request->shift;
            $user->expertise = $request->expertise;
            $user->level = $request->level;
            $user->password = Hash::make($password);
            $user->code = $code;
            if ($request->monday == true) {
                $user->monday = 'Yes';
            }
            if ($request->tuesday == true) {
                $user->tuesday = 'Yes';
            }
            if ($request->wednesday == true) {
                $user->wednesday = 'Yes';
            }
            if ($request->thursday == true) {
                $user->thursday = 'Yes';
            }
            if ($request->friday == true) {
                $user->friday = 'Yes';
            }
            if ($request->saturday == true) {
                $user->saturday = 'Yes';
            }
            if ($request->sunday == true) {
                $user->sunday = 'Yes';
            }


            if ($request->monday == true && $request->tuesday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
            }
            if ($request->monday == true && $request->wednesday == true) {
                $user->monday = 'Yes';
                $user->wednesday = 'Yes';
            }
            if ($request->monday == true && $request->thursday == true) {
                $user->monday = 'Yes';
                $user->thursday = 'Yes';
            }
            if ($request->monday == true && $request->friday == true) {
                $user->monday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->monday == true && $request->saturday == true) {
                $user->monday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->monday == true && $request->sunday == true) {
                $user->monday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->tuesday == true && $request->wednesday == true) {
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
            }
            if ($request->tuesday == true && $request->thursday == true) {
                $user->tuesday = 'Yes';
                $user->thursday = 'Yes';
            }
            if ($request->tuesday == true && $request->friday == true) {
                $user->tuesday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->tuesday == true && $request->saturday == true) {
                $user->tuesday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->tuesday == true && $request->sunday == true) {
                $user->tuesday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->wednesday == true && $request->thursday == true) {
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
            }
            if ($request->wednesday == true && $request->friday == true) {
                $user->wednesday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->wednesday == true && $request->saturday == true) {
                $user->wednesday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->wednesday == true && $request->sunday == true) {
                $user->wednesday = 'Yes';
                $user->sunday = 'Yes';
            }




            if ($request->thursday == true && $request->friday == true) {
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->thursday == true && $request->saturday == true) {
                $user->thursday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->thursday == true && $request->sunday == true) {
                $user->thursday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->friday == true && $request->saturday == true) {
                $user->friday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->friday == true && $request->sunday == true) {
                $user->friday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->saturday == true && $request->saturday == true) {
                $user->saturday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->saturday == true && $request->sunday == true) {
                $user->saturday = 'Yes';
                $user->sunday = 'Yes';
            }


            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->thursday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->thursday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->friday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->saturday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->sunday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->tuesday == true && $request->wednesday == true && $request->thursday == true) {
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
            }
            if ($request->tuesday == true && $request->wednesday == true && $request->friday == true) {
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->tuesday == true && $request->wednesday == true && $request->saturday == true) {
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->tuesday == true && $request->wednesday == true && $request->sunday == true) {
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->wednesday == true && $request->thursday == true && $request->friday == true) {
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->wednesday == true && $request->thursday == true && $request->saturday == true) {
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->wednesday == true && $request->thursday == true && $request->sunday == true) {
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->thursday == true && $request->friday == true && $request->saturday == true) {
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->thursday == true && $request->friday == true && $request->sunday == true) {
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->thursday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->friday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->saturday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->sunday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->thursday == true  && $request->friday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->thursday == true  && $request->saturday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->thursday == true  && $request->sunday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->thursday == true  && $request->friday == true && $request->saturday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
                $user->saturday = 'Yes';
            }
            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->thursday == true  && $request->friday == true && $request->sunday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
                $user->sunday = 'Yes';
            }



            if ($request->monday == true && $request->tuesday == true && $request->wednesday == true && $request->thursday == true  && $request->friday == true && $request->saturday == true && $request->sunday == true) {
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
                $user->saturday = 'Yes';
                $user->sunday = 'Yes';
            }
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

        if (Auth::guard('api')->attempt($credentials)) {
            $data = User::where('email', $request->email)->first();
            if ($data->status == 0) {
                $response = ['status' => false, 'data' => null, 'message' => "Your account is not verified. Please verify your account. Thank you!"];
                return response($response, 200);
            } else {
                $data['token'] = $data->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['status' => true, 'data' => $data, 'message' => "Account login successfully!"];
                return response($response, 200);
            }
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 200);
        }
    }
}
