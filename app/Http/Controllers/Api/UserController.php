<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Countries;
use App\Models\FavUnFav;
use App\Models\Location;
use App\Models\Offers;
use App\Models\Package;
use App\Models\Services;
use App\Models\Shifts;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Locale;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function fav_salon($salon_id)
    {
        try {
            $fav = FavUnFav::where('user_id', Auth::user()->id)->where('salon_id', $salon_id)->count();
            if ($fav == 1) {
                $update = FavUnFav::where('user_id', Auth::user()->id)->where('salon_id', $salon_id)->first();
                if ($update->is_fav == 1) {
                    $data = FavUnFav::where('id', $update->id)->first();
                    $data->user_id = Auth::user()->id;
                    $data->salon_id = $salon_id;
                    $data->is_fav = 0;
                    $data->save();
                } elseif ($update->is_fav == 0) {
                    $data = FavUnFav::where('id', $update->id)->first();
                    $data->user_id = Auth::user()->id;
                    $data->salon_id = $salon_id;
                    $data->is_fav = 1;
                    $data->save();
                }
            } else {
                $data = new FavUnFav();
                $data->user_id = Auth::user()->id;
                $data->salon_id = $salon_id;
                $data->is_fav = 1;
                $data->save();
            }

            if ($data == true) {
                $response = ['status' => true, 'data' => $data, 'message' => "Record Updated Successfully!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => true, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 200);
        }
    }
    public function userFavunfav()
    {
        $data = FavUnFav::where('user_id', Auth::user()->id)->get();
        if ($data == true) {
            $response = ['status' => true, 'data' => $data, 'message' => "Record fetched Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function GetAll($id)
    {
        $offer = Offers::where('user_id', $id)->with('Category')->get();
        foreach ($offer as $offers) {
            $data['offers'] = $offers;
        }
        $sss = Package::where('user_id', $id)->with('Optional')->with('Required')->with('Images')->get();
        foreach ($sss as $Optional) {
            $data['packages'] = $sss;
        }
        $Services = Services::where('user_id', $id)->with('Optional')->with('Required')->with('Images')->get();
        foreach ($Services as $Optional) {
            $data['services'] = $Services;
        }
        if ($data == true) {
            $response = ['status' => true, 'data' => $data, 'message' => "Record Fetched Successfully!"];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => "Something went wrong. Please try again later. Thank you!"];
            return response($response, 400);
        }
    }
    public function UpdateProfile(Request $request)
    {
        try {
            $id = Auth::user()->id;
            $found = User::where('email', $request->email)->count();
            if ($found == 1) {
                $response = ['status' => true, 'data' => null, 'message' => "Email already taken. Thank you!"];
                return response($response, 200);
            } else {
                $user = User::where('id', $id)->update($request->all());
                if ($user == true) {
                    $data = User::where('id', Auth::user()->id)->first();
                    if ($data->role == 'Expert') {
                        $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'created_at', 'updated_at']);
                        $admin['locations'] = Location::where('user_id', $admin->id)->get();
                        $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
                        return response($response, 200);
                    } elseif ($data->role == 'Salon') {
                        $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'created_at', 'updated_at']);
                        $admin['shift'] = Shifts::where('user_id', $data->id)->get();
                        $admin['locations'] = Location::where('user_id', $admin->id)->get();
                        $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
                        return response($response, 200);
                    } elseif ($data->role == 'User') {
                        $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'code', 'email_status', 'profile_image', 'role', 'created_at', 'updated_at']);
                        $admin['locations'] = Location::where('user_id', $admin->id)->get();
                        $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
                        return response($response, 200);
                    } else {
                        $response = ['status' => false, 'data' => null, 'message' => "User Role is not valid. Thank you!"];
                        return response($response, 400);
                    }
                    $response = ['status' => true, 'data' => $request->all(), 'message' => "Record Saved Successfully. Thank you!"];
                    return response($response, 200);
                } else {
                    $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
                    return response($response, 400);
                }
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function userProfile()
    {
        try {
            $id = Auth::guard('api')->user()->id;
            $Users = User::where('id', $id)->get();
            $User = User::where('id', $id)->first();
            if ($Users->count() == 0) {
                $response = ['status' => false, 'data' => null, 'message' => "User id is not valid. Thank you!"];
                return response($response, 400);
            } elseif ($User->role == 'Expert') {
                $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'created_at', 'updated_at']);
                $admin['locations'] = Location::where('user_id', $admin->id)->get();
                $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
                return response($response, 200);
            } elseif ($User->role == 'Salon') {
                $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'created_at', 'updated_at']);
                $admin['locations'] = Location::where('user_id', $admin->id)->get();
                $admin['shift'] = Shifts::where('user_id', $admin->id)->get();
                $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
                return response($response, 200);
            } elseif ($User->role == 'User') {
                $admin = User::where('id', $id)->first(['id', 'name', 'email', 'phone', 'code', 'email_status', 'profile_image', 'role', 'created_at', 'updated_at']);
                $admin['locations'] = Location::where('user_id', $admin->id)->get();
                $response = ['status' => true, 'data' => $admin, 'message' => "User data fetched successfully. Thank you!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'data' => null, 'message' => "User Role is not valid. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function Location(Request $request)
    {
        try {
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
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function EditUserLocation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            }
            $location =  Location::where('id' , $request->id)->first();
            $location->lat = $request->lat;
            $location->lng = $request->lng;
            $location->address = $request->address;
            $location->save();
            if ($location == true) {
                $response = ['status' => true, 'data' => $location, 'message' => "Record Updated Successfully. Thank you!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function UserLocation(Request $request)
    {
        try {
            $id = Auth::guard('api')->user()->id;
            $location = Location::where('user_id', $id)->get();
            if ($location == true) {
                $response = ['status' => true, 'data' => $location, 'message' => "Record Fetched Successfully. Thank you!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function DeleteLocation($id)
    {
        try {
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
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
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
                    'password' => 'required|min:8',
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
            // if ($mail == true) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = 'User';
            $user->password = Hash::make($request->password);
            $user->code = $code;
            $user->latitude = $request->latitude;
            $user->longitude = $request->longitude;

            $user->save();
            $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'code', 'email_status', 'account_status', 'profile_image', 'role', 'created_at', 'updated_at']);
            // $data['profile_image'] =  env('APP_URL') . 'images/users/' . $data->profile_image;

            if ($user == true) {
                $response = ['status' => true, 'data' => $data, 'message' => "Account created successfully. Please check your email to verify your account. Thank you!"];
                return response($response, 200);
            }
            // } else {
            //     $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            //     return response($response, 400);
            // }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function categories()
    {
        try {
            $categories = Category::get();

            if ($categories == true) {
                $response = ['status' => true, 'categories' => $categories, 'message' => "Categories fetched successfully!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'categories' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function Api_countries()
    {
        try {
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
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }

    public function get_saloon_service_type($type)
    {
        try {
            $salon = User::where('role', 'Salon')->where('service_type', $type)->where('email_status', 1)->where('account_status', 1)->with('location')->get();


            foreach ($salon as $salons) {
                $response = [
                    'salon' => $salons,
                    'rating' => "5"
                ];
            }


            if ($salon == true) {
                $response = ['status' => true, 'data' => $response, 'message' => "Record fetched successfully!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function get_frequ_saloon()
    {
        try {
            $salon = User::where('role', 'Salon')->where('email_status', 1)->where('account_status', 1)->get();
            if ($salon == true) {
                $response = ['status' => true, 'data' => $salon, 'message' => "Record fetched successfully!"];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
                return response($response, 400);
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function get_saloon($id)
    {
        try {
            $salon = User::where('role', 'Salon')->where('id', $id)->first();
            $data['salon'] = $salon;
            $discount = Offers::where('user_id', $salon->id)->max('discount');
            $data['discount'] = $discount;
            $offer = Offers::where('user_id', $salon->id)->with('Category')->get();
            $data['offer'] = $offer;
            $Package = Package::where('user_id', $salon->id)->with('Optional')->with('Required')->with('Images')->get();
            $data['Package'] = $Package;
            $Service = Services::where('user_id', $salon->id)->with('Optional')->with('Required')->with('Images')->get();
            $data['Service'] = $Service;

            $response = ['status' => true, 'data' => $data, 'message' => "Record fetched successfully!"];
            return response($response, 200);
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
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
                $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'email_status', 'role', 'created_at', 'updated_at']);

                // $data['profile_image'] =  env('APP_URL') . 'images/users/' . $data->profile_image;
                $email_status = User::where('email', $request->email)->first(['id', 'email_status', 'code']);
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
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function verify_code(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'code' => 'required|max:6',
                'password' => 'required',
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
                        $credentials = $request->only('email', 'password');
                        if (!auth()->attempt($credentials)) {
                            $response = ['status' => false, 'message' => "Email or password is invalid. Thank you!"];
                            return response($response, 400);
                        } else {
                            $user_update = User::where('email', $request->email)->first();
                            if ($code->role == "User") {
                                $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'email_status', 'role', 'created_at', 'updated_at']);
                            }
                            if ($code->role == "Salon") {
                                $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'latitude', 'longitude', 'created_at', 'updated_at']);
                            }
                            if ($code->role == "Staff") {
                                $data = User::where('email', $request->email)->first(['id', 'name', 'email', 'phone', 'profile_image', 'code', 'role', 'account_status', 'email_status', 'salon_name_en', 'salon_name_ar', 'commercial_registration_number', 'certificate', 'category', 'iban', 'country', 'city', 'average_orders', 'service_type', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'shift', 'latitude', 'longitude', 'created_at', 'updated_at']);
                            }
                            $data['token'] =  Auth::user()->createToken('API Token')->accessToken;
                            $user_update->email_status = '1';
                            $user_update->code = 'Verified';
                            $user_update->save();
                            $response = ['status' => true, 'data' => $data, 'message' => "Account verified successfully!"];
                            return response($response, 200);
                        }
                    } else {
                        $response = ['status' => false, 'data' => null, 'message' => "Code is Invalid!"];
                        return response($response, 400);
                    }
                }
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function resend_code(Request $request)
    {
        try {
            $found = User::where('email', $request->email)->count();
            if ($found == 0) {
                $response = ['status' => false, 'data' => null, 'message' => "Email address is not found."];
                return response($response, 400);
            }
            $code = User::where('email', $request->email)->first();
            if ($code->email_status == 1) {
                $response = ['status' => false, 'data' => null, 'message' => "Email is already verified. Thank you!"];
                return response($response, 400);
            } else {
                $code = mt_rand(000000, 999999);
                // $mail = Mail::send('emails.verifyemail', ['code' => $code], function ($message) use ($request) {
                //     $message->to($request->email);
                //     $message->subject('Verify Email');
                // });
                // if ($mail == true) {
                $user = User::where('email', $request->email)->first();
                $user->code = $code;
                $user->save();
                if ($user == true) {
                    $response = ['status' => true, 'data' => $code, 'message' => "Code sent successfully. Please check your email to verify your account. Thank you!"];
                    return response($response, 200);
                }
                // } else {
                //     $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
                //     return response($response, 400);
                // }
            }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function forget_password(Request $request)
    {
        try {
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
            // $mail = Mail::send('emails.forgetEmail', ['code' => $code], function ($message) use ($request) {
            //     $message->to($request->email);
            //     $message->subject('Forget Password');
            // });
            // if ($mail == true) {
            $user = User::where('email', $email)->first();
            $user->password_code = $code;
            $user->save();
            if ($user == true) {
                $response = ['status' => true, 'data' => $code, 'message' => "An email with a reset code sent successfully!"];
                return response($response, 200);
            }
            // } else {
            //     $response = ['status' => false, 'data' => null, 'message' => "Something went wrong. Please try again later. Thank you!"];
            //     return response($response, 400);
            // }
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
    public function update_password(Request $request)
    {
        try {
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
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => null, 'message' => $e->getMessage()];
            return response($response, 400);
        }
    }
}
