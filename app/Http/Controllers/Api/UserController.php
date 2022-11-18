<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Countries;
use App\Models\Location;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Locale;

class UserController extends Controller
{
    public function userProfile()
    {

        $id = Auth::guard('api')->user()->id;
        $Users = User::where('id', $id)->get();
        $User = User::where('id', $id)->first();
        if ($Users->count() == 0) {
            $response = ['status' => false, 'data' => null, 'message' => "User id is not valid. Thank you!"];
            return response($response, 400);
        } elseif ($User->role == 'Expert') {
            $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'location', 'created_at', 'updated_at']);
            $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
            return response($response, 200);
        } elseif ($User->role == 'Salon') {
            $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'location', 'created_at', 'updated_at']);
            $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
            return response($response, 200);
        } elseif ($User->role == 'User') {
            $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'code', 'email_status', 'profile_image', 'role', 'created_at', 'updated_at']);
            $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "User Role is not valid. Thank you!"];
            return response($response, 400);
        }
    }
    public function Location(Request $request)
    {
        $id = Auth::guard('api')->user()->id;
        $location = new Location();
        $location->user_id = $id;
        $location->lat = $request->lat;
        $location->lng = $request->lng;
        $location->address = $request->address;
        $location->save();
        if ($location == true) {
            $response = ['status' => true, 'data' => $location, 'message' => "Record Saved Successfully. Thank you!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function UserLocation(Request $request)
    {
        $id = Auth::guard('api')->user()->id;
        $location = Location::where('user_id', $id)->get();
        if ($location == true) {
            $response = ['status' => true, 'data' => $location, 'message' => "Record Fetched Successfully. Thank you!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function DeleteLocation($id)
    {

        $found = Location::where('id', $id)->count();
        if ($found == 0) {
            $response = ['status' => true, 'data' => false, 'message' => "Record not found!"];
            return response($response, 422);
        }
        $location = Location::where('id', $id)->delete();
        if ($location == true) {
            $response = ['status' => true, 'data' => null, 'message' => "Record Deleted Successfully. Thank you!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
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
                'profile_image' => 'required|max:4096',
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
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = 'User';
            $user->password = Hash::make($request->password);
            $user->code = $code;
            $user->latitude = $request->latitude;
            $user->longitude = $request->longitude;
            if ($request->hasfile('profile_image')) {
                $imageName = time() . '.' . $request->profile_image->extension();
                $user->profile_image = $imageName;
                $request->profile_image->move(public_path('images/users'), $imageName);
            }
            $user->save();
            $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'code', 'email_status', 'profile_image', 'role', 'created_at', 'updated_at']);
            $data['profile_image'] =  env('APP_URL') . 'images/users/' . $data->profile_image;

            if ($user == true) {
                $response = ['status' => true, 'data' => $data, 'message' => "Account created successfully. Please check your email to verify your account. Thank you!"];
                return response($response, 200);
            }
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function categories()
    {

        $categories = Category::get();

        if ($categories == true) {
            $response = ['status' => true, 'categories' => $categories, 'message' => "Categories fetched successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'categories' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function Api_countries()
    {

        $Countries = Countries::get();
        $cities = Countries::with('cities')->get();
        foreach ($cities as $cities) {
            $Countries = [
                $cities,
            ];
        }
        if ($Countries == true) {
            $response = ['status' => true, 'Countries' => $Countries, 'message' => "Countries fetched successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'Countries' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }

    public function get_frequ_saloon()
    {
        $salon = User::where('role', 'Salon')->first();
        if ($salon == true) {
            $response = ['status' => true, 'data' => $salon, 'message' => "Record fetched successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function get_saloon($id)
    {
        $salon = User::where('role', 'Salon')->where('id', $id)->first();
        if ($salon == true) {
            $response = ['status' => true, 'data' => $salon, 'message' => "Record fetched successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
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
            $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'email_status', 'role', 'created_at', 'updated_at']);
            $email_status = User::where('email', $request->email)->first(['id', 'email_status']);
            $data['profile_image'] =  env('APP_URL') . 'images/users/' . $data->profile_image;
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
    // public function authenticate(Request $request)
    // {
    // $validator = Validator::make($request->all(), [
    //     'email' => 'required|  ',
    //     'password' => 'required|min:8',
    // ]);
    // if ($validator->fails()) {

    //     return response()->json(['status' => false, 'errors' => $validator->errors()]);
    // }

    // $credentials = $request->only('email', 'password');

    // if (Auth::guard('api')->attempt($credentials)) {
    //     $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'email_status', 'role', 'created_at', 'updated_at']);
    //     $data['profile_image'] =  env('APP_URL') . 'images/users/' . $data->profile_image;
    //     if ($data->email_status == 0) {
    //         $response = ['status' => false, 'data' => null, 'message' => "Your account is not verified. Please verify your account. Thank you!"];
    //         return response($response, 200);
    //     } else {
    //         $data['token'] = Auth::user()->createToken('API Token')->accessToken;
    //         // $data['token'] = $data->createToken('mytoken')->plainTextToken;
    //         $response = ['status' => true, 'data' => $data, 'message' => "Account login successfully!"];
    //         return response($response, 200);
    //     }
    // } else {
    //     $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
    //     return response($response, 200);
    // }


    //   $validator = Validator::make($request->all(), [
    //         'email' => 'required|  ',
    //         'password' => 'required|min:8',
    //     ]);
    //     if ($validator->fails()) {

    //         return response()->json(['status' => false, 'errors' => $validator->errors()]);
    //     }

    //     $credentials = $request->only('email', 'password');
    //     try {
    //         $authGuard = Auth::guard('api');
    //         if(!$authGuard->attempt($credentials)){
    //             $response = ['status' => true, 'data' => [], 'message' => "Email or password is invalid!"];
    //             return response($response, 400);

    //         } else {
    //             $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'email_status', 'role', 'created_at', 'updated_at']);
    //             if ($data->email_status == 0) {
    //                 $response = ['status' => false, 'data' => null, 'message' => "Your account is not verified. Please verify your account. Thank you!"];
    //                 return response($response, 200);
    //             } else {
    //                 $user = $authGuard->user();
    //                 $user['profile_image'] =  env('APP_URL') . 'images/users/' . $user->profile_image;

    //                 $code = 200;
    //                 $data['token'] = $user->createToken('user')->accessToken;
    //                 // $data['token'] = $data->createToken('mytoken')->plainTextToken;
    //                 $response = ['status' => true, 'data' => $data, 'message' => "Account login successfully!"];
    //                 return response($response, 200);
    //             }
    //         }
    //     } catch (Exception $e) {
    //         $data = ['error' => $e->getMessage()];
    //     }
    //     return response()->json($data, $code);
    // }
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
            if ($code->email_status == 1) {
                $response = ['status' => false, 'data' => null, 'message' => "Email is already verified. Thank you!"];
                return response($response, 400);
            } else {
                if ($code->code == $request->code) {
                    $user_update = User::where('email', $request->email)->first();
                    $user_update->email_status = '1';
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
            return response($response, 400);
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
            return response($response, 400);
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
            return response($response, 400);
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
                return response($response, 400);
            }
        }
    }
}
