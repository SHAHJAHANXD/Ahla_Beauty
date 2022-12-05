<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shifts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SalonController extends Controller
{

    public function getStaff($salon_id)
    {
        $user = User::where('salon_id', $salon_id)->get(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status',  'level',  'expertise', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'latitude', 'longitude', 'created_at', 'updated_at']);
        if ($user->count() == 0) {
            $response = ['status' => false, 'data' => null, 'message' => "ID is not valid. Thank you!"];
            return response($response, 400);
        } else {
            $response = ['status' => true, 'data' => $user, 'message' => "Data fetched successfully. Thank you!"];
            return response($response, 200);
        }
    }
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'salon_name_en' => 'required',
                'salon_name_ar' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|min:8',
                'commercial_registration_number' => 'required',
                'certificate' => 'required|max:4096',
                'category' => 'required',
                'iban' => 'required',
                'country' => 'required',
                'city' => 'required',
                'average_orders' => 'required',
                'service_type' => 'required',
                'services_for' => 'required',

                'shift' => 'required',
                'profile_image' => 'required|max:4096',
            ],
            [
                'profile_image.required' => 'Image is required!',
                'profile_image.max' => 'The maximum size of Image must be less than 4MB. Thank you!',
                'email.required' => 'Email is required!',
                'phone.required' => 'Phone number is required!',
                'password.required' => 'Password is required!',
                'salon_name_en.required' => 'Salon english name is required!',
                'salon_name_ar.required' => 'Salon arabic name is required!',
                'commercial_registration_number.required' => 'Commercial registration number is required!',
                'certificate.required' => 'Certificate image is required!',
                'category.required' => 'Category is required!',
                'iban.required' => 'IBAN number is required!',
                'country.required' => 'Country is required!',
                'city.required' => 'City is required!',
                'average_orders.required' => 'Avergae orders is required!',
                'service_type.required' => 'Service type is required!',
                'shift.required' => 'Shift is required!',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $code = mt_rand(000000, 999999);
        // $mail = Mail::send('emails.verifyemail', ['code' => $code], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Verify Email');
        // });
        if ($code == $code) {
            $user = User::create($request->all());
            // $shift = $request->shift;
            // dd($shift);
            if ($request->shift == true) {
                foreach ($request->shift as $shift) {
                    dd($shift);
                    $time = new Shifts();
                    $time->user_id = $user->id;

                    // $time->shift_name = $shift['shift_name'];
                    // $time->shift_start_time = $shift['shift_start_time'];
                    // $time->shift_end_time = $shift['shift_end_time'];
                    $time->save();
                }
            }
            $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'latitude', 'longitude', 'created_at', 'updated_at']);
            $data['profile_image'] =  env('APP_URL') . 'images/users/' . $data->profile_image;
            if ($user == true) {
                $response = ['status' => true, 'data' => $data, 'message' => "Account created successfully. Please check your email to verify your account. Thank you!"];
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
        if (!auth()->attempt($credentials)) {
            $response = ['status' => false, 'message' => "Email or password is invalid. Thank you!"];
            return response($response, 400);
        } else {
            $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'latitude', 'longitude', 'created_at', 'updated_at']);
            $data['profile_image'] =  env('APP_URL') . 'images/users/' . $data->profile_image;
            $data['shift'] = Shifts::where('user_id', $data->id)->get();
            $email_status = User::where('email', $request->email)->first(['id', 'email_status']);
            if ($data->email_status == 0) {
                $response = ['status' => false, 'data' => $email_status, 'message' => "Your account is not verified. Please verify your account. Thank you!"];
                return response($response, 400);
            } else {
                $data['token'] = auth()->user()->createToken('API Token')->accessToken;
                $response = ['status' => true, 'data' => $data, 'message' => "Account login successfully!"];
                return response($response, 200);
            }
        }
    }
}
