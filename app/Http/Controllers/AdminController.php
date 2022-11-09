<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{

    public function index(){
        return view('admin.index');
    }

    public function login(){
        return view('admin.login');
    }

    public function handleLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

//        if (Auth::guard('webadmin')->attempt($credentials)) {
//            $request->session()->regenerate();
//            $request->session()->put('admin_email', $request->email);
//            return redirect()->intended('admin/profile');
//        }

        if(Auth::guard('webadmin')->attempt($request->only(['email', 'password'])))
        {
            $request->session()->put('admin_email', $request->email);
            return redirect()->route('admin.profile');
        }

        return back()->withErrors([
            'error_message' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registration(){
        return view('admin.registration');
    }

    public function handleRegistration(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6), 'max:8'],
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', "Registration successful!!");
    }

    public function profile(){
        return view('admin.profile');
    }

    public function logout(){
        Auth::guard('webadmin')->logout();
        session()->forget('admin_email');
        return redirect()->route('admin.login');
    }
}
