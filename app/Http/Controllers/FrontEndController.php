<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontEndController extends Controller
{
    function home(){
        return view('frontend.index');
    }

    function login(){
        return view('frontend.login');
    }

    function loginUser(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($request->only(['email', 'password'])))
        {
            $request->session()->regenerate();
            return redirect()->route('user.profile');
        }

        return back()->with('error', "The provided credentials do not match our records.!!");
    }

    function register(){
        return view('frontend.register');
    }

    function registerStore(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', "Registration successful!!");
    }

    function profile(){
        return view('frontend.profile');
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
