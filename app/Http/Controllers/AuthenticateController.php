<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function signup()
    {
        return view('front.signup');
    }
    public function login()
    {
        return view('front.signin');
    }
    public function verify_account()
    {
        return view('front.verifyaccount');
    }
    public function forget_password()
    {
        return view('front.forget');
    }
    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:254',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|min:8|max:254',
            ],
            [
                'name.required' => 'Name is required...',
                'name.max' => 'Name must be less then 254 characters...',

                'email.required' => 'Email is required...',

                'phone.required' => 'Phone number is required...',

                'password.required' => 'Password is required...',
                'password.min' => 'Password must be atleast 8 characters...',
                'password.max' => 'Password must be less then 254 characters...',
            ]
        );
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
                return redirect()->route('user.login')->with('success', 'Account created successfully!');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later. Thank you!');
        }
    }
    public function authenticate(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required|min:8|max:254',
            ],
            [
                'email.required' => 'Email is required...',

                'password.required' => 'Password is required...',
                'password.min' => 'Password must be atleast 8 characters...',
                'password.max' => 'Password must be less then 254 characters...',
            ]
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $data = User::where('email', $request->email)->first();
            if ($data->status == 0) {
                return redirect()->route('user.verify_account')->with('error', 'Your account is not verified. Please verify your account. Thank you!');
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later. Thank you!');
        }
    }
    public function verify_code(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|min:6',
            ],
            [
                'code.required' => 'Code is required...',
                'code.min' => 'Code must be atleast 8 characters...',
            ]
        );


        if (Auth::user()->status == 1) {
            return redirect('/')->with('success', 'Account is already verified. Thank you!');
        } else {
            if (Auth::user()->code == $request->code) {
                $user_update = User::where('email', Auth::user()->email)->first();
                $user_update->status = '1';
                $user_update->code = 'Verified';
                $user_update->save();
                return redirect('/')->with('success', 'Account verified successfully!');
            } else {
                return redirect()->back()->with('error', 'Code is Invalid!');
            }
        }
    }
}
