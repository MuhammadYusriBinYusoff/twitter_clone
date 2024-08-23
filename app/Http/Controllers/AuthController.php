<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',  //means users table and column email
                'password' => 'required|confirmed|min:8'
            ]
        );

        User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );
        
        return redirect()->route('dashboard')->with('success','Account created successsfully');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate(
            [
                'email' => 'required|email',  //means users table and column email
                'password' => 'required|min:8'
            ]
        );

        if(auth()->attempt($validated)){
            request()->session()->regenerate(); ///to remove all session

            return redirect()->route('dashboard')->with('success','Logged in Succesfully');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching',
        ]);

    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();


        return redirect()->route('dashboard')->with('success','Log out created successsfully');
    }
}
