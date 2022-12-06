<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ExpertController extends Controller
{
    public function get(Request $request)
    {
        try {

            $user = User::where('id', Auth::user()->id)->get();

            if ($user == true) {
                $response = ['status' => true, 'data' => $user, 'message' => "Account Updated successfully. Thank you!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function update(Request $request)
    {
        try {
            $count = User::where('email', $request->email)->count();
            if ($count == 1) {
                $response = ['status' => true, 'data' => null, 'message' => "Email is already taken. Thank you!"];
                return response($response, 200);
            }
            $user = User::where('id', Auth::user()->id)->update($request->all());
            $user = User::where('id', Auth::user()->id)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'latitude', 'longitude', 'created_at', 'updated_at']);
            if ($user == true) {
                $response = ['status' => true, 'data' => $user, 'message' => "Account Updated successfully. Thank you!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function register(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [

                    'name' => 'required',
                    'email' => 'required|unique:users',
                    'phone' => 'required|unique:users',
                    'shift' => 'required',
                    'expertise' => 'required',
                    'level' => 'required',
                    'salon_id' => 'required',
                ],
                [
                    'name.required' => 'Name is required!',
                    'email.required' => 'Email is required!',
                    'phone.required' => 'Phone number is required!',
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
            // $mail = Mail::send(
            //     'emails.password',
            //     $data,
            //     function ($message) use ($data) {
            //         $message->to($data['email'])->subject('Your account details');
            //     }
            // );
            // if ($mail == true) {
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
                $user->monday = 'Yes';
                $user->tuesday = 'Yes';
                $user->wednesday = 'Yes';
                $user->thursday = 'Yes';
                $user->friday = 'Yes';
                $user->saturday = 'Yes';
                $user->sunday = 'Yes';
                $user->save();
                if ($user == true) {
                    $response = ['status' => true, 'data' => null, 'message' => "Account created successfully. Please check your email to verify your account. Thank you!"];
                    return response($response, 200);
                }
            // } else {
            //     $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            //     return response($response, 400);
            // }
        } catch (Exception $e) {
            $response = ['status' => false, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function authenticate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|  ',
                'password' => 'required|min:8',
            ]);
            if ($validator->fails()) {

                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            }
            $credentials = $request->only('email', 'password');
            if (!auth()->attempt($credentials)) {
                $response = ['status' => false, 'message' => "Email or password is invalid. Thank you!"];
                return response($response, 400);
            } else {
                $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'latitude', 'longitude', 'created_at', 'updated_at']);
                $data['profile_image'] =  env('APP_URL') . 'images/users/' . $data->profile_image;
                $email_status = User::where('email', $request->email)->first(['id', 'email_status' , 'code']);
                if ($data->email_status == 0) {
                    $response = ['status' => false, 'data' => $email_status, 'message' => "Your account is not verified. Please verify your account. Thank you!"];
                    return response($response, 400);
                } else {
                    $data['token'] = auth()->user()->createToken('API Token')->accessToken;
                    $response = ['status' => true, 'data' => $data, 'message' => "Account login successfully!"];
                    return response($response, 200);
                }
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
}
