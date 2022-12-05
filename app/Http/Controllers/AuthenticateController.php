<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function email()
    {
        return view('emails.password');
    }
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
    public function reset_password()
    {
        return view('front.reset_password');
    }

    public function send_forget_password(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
            ],
            [
                'email.required' => 'Email is required...',
            ]
        );
        $email = $request->email;
        $found = User::where('email', $email)->count();
        if ($found == 0) {
            return redirect()->back()->with('error', 'Email address not found!');
        }
        $code = mt_rand(000000, 999999);
        // $mail = Mail::send('emails.forgetEmail', ['code' => $code], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Forget Password');
        // });
        if ($code == $code) {
            $user = User::where('email', $email)->first();
            $user->password_code = $code;
            $user->save();
            if ($user == true) {
                return redirect()->route('user.reset_password')->with('success', 'An email with a reset code sent successfully!');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later. Thank you!');
        }
    }
    public function verify_reset_password(Request $request)
    {
        $request->validate(
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
        $email = $request->email;
        $found = User::where('email', $email)->count();
        if ($found == 0) {
            return redirect()->back()->with('error', 'Email address not found!');
        } else {
            $code = User::where('email', $email)->first();
            if ($code->password_code == $request->code) {
                $user = User::where('email', $email)->first();
                $user->password = Hash::make($request->password);
                $user->password_code = null;
                $user->save();
                return redirect()->route('user.login')->with('success', 'Password changed successfully!');
            } else {
                return redirect()->back()->with('error', 'Code is invalid!');
            }
        }
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
        // $mail = Mail::send('emails.verifyemail', ['code' => $code], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Verify Email');
        // });
        if ($code == $code) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = 'User';
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
        $data = User::where('email', $request->email)->first();
        $found = User::where('email', $request->email)->count();
        if ($found == 0) {
            return redirect()->back()->with('error', 'Email or password is invalid!');
        }
        if($data->role == 'User')
        {
            $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if ($data->status == 0) {
                return redirect()->route('user.verify_account')->with('error', 'Your account is not verified. Please verify your account. Thank you!');
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('error', 'Email or password is invalid!');
        }
        }
        else
        {
            return redirect()->back()->with('error', 'User role is invalid!');
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
                'code.min' => 'Code must be atleast 6 characters...',
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
    public function ResendVerificationCode(Request $request)
    {
        $email = Auth::user()->email;
        $code = mt_rand(000000, 999999);
        $mail = Mail::send('emails.verifyemail', ['code' => $code], function ($message) use ($request) {
            $message->to(Auth::user()->email);
            $message->subject('Verify Email');
        });
        if ($mail == true) {
            $user = User::where('email', $email)->first();
            $user->code = $code;
            $user->save();
            if ($user == true) {
                return redirect()->route('user.login')->with('success', 'Resend code sent successfully!');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later. Thank you!');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
