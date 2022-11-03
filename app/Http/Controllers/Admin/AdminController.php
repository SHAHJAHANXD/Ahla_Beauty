<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('role', 'User')->take(8)->get();
        $Shop = User::where('role', 'Salon')->take(8)->get();
        return view('admin.dashboard.index', compact('users','Shop'));
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function allSalons()
    {
        $salon = User::where('role','Salon')->get();
        return view('admin.salons.table', compact('salon'));
    }
    public function allUsers()
    {
        $users = User::where('role','User')->get();
        return view('admin.users.table', compact('users'));
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
        if ($data->role == 'Admin') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', 'Email or password is invalid!');
            }
        } else {
            return redirect()->back()->with('error', 'Admin role is invalid!');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('admin.login');
    }
}
