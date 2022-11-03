<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ExpertController extends Controller
{
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
                'shift' => 'required',
                'location' => 'required',
            ],
            [

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

                'location.required' => 'Salon location is required!',
            ]
        );
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
            $user->name = $request->salon_name_en;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = 'Salon';
            $user->salon_name_en = $request->salon_name_en;
            $user->salon_name_ar = $request->salon_name_ar;
            $user->commercial_registration_number = $request->commercial_registration_number;
            if ($request->hasfile('certificate')) {
                $imageName = time() . '.' . $request->certificate->extension();
                $user->certificate = $imageName;
                $request->certificate->move(public_path('images/certificates'), $imageName);
            }
            $user->category = $request->category;
            $user->iban = $request->iban;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->average_orders = $request->average_orders;
            $user->service_type = $request->service_type;
            $user->shift = $request->shift;
            $user->location = $request->location;
            $user->password = Hash::make($request->password);
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
}
