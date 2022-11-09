<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{


    public function index(){
        return view('user.index');
    }

    public function login(){
        return view('user.login');
    }

    public function handleLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//            $request->session()->put('user_email', Auth::user()->email);
//            return redirect()->intended('profile');
//        }

        if(Auth::attempt($request->only(['email', 'password'])))
        {
            $request->session()->put('user_email', Auth::user()->email);
            return redirect()->route('user.profile');
        }

        return back()->withErrors([
            'error_message' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registration(){
        return view('user.registration');
    }

    public function handleRegistration(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6), 'max:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', "Registration successful!!");
    }

    public function profile(){
        return view('user.profile');
    }

    public function logout(Request $request){
        Auth::logout();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
        session()->forget('user_email');
        return redirect('/');
    }
}
