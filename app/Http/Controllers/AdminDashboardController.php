<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    function dashboard(){
        return view('admin.index');
    }

    function login(){
        return view('admin.login');
    }

    function loginAdmin(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::guard('admin')->attempt($request->only(['email', 'password'])))
        {
            $request->session()->regenerate();
            return redirect()->route('admin.profile');
        }

        return back()->with('error', "The provided credentials do not match our records.!!");
    }

    function register(){
        return view('admin.register');
    }

    function registerStore(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'password' => ['required', 'min:6', 'max:8'],
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', "Registration successful!!");
    }

    function profile(){
        return view('admin.profile');
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
