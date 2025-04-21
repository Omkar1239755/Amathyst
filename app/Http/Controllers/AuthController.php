<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use Auth;       


class AuthController extends Controller
{

public function loginView(){
return view('login');
}

public function loginCheck(request $request){

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if(Auth::attempt($request->only('email','password'))){


        return redirect()->route('verify'); // or wherever you want


    }
    return back()->withErrors([
        'email' => 'Invalid credentials provided.',
    ])->withInput($request->only('email'));


}

public function registerView(){
return view('register');
}


public function Storeregister(request $request){

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'country' => 'nullable',
        'birthday' => 'nullable',
        'heard_about_us' => 'nullable',
        'password' => 'required|confirmed|min:6',
        'terms' => 'accepted',
    ], [
        'terms.accepted' => 'You must accept the Terms & Conditions to register.',
    ]);

    
        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'country'=>$request->country,
        'birthday'=>$request->birthday,
        'heard_about_us'=>$request->heard_about,
        'password'=>Hash::make($request->password)

        ]);

        return redirect()->route('login'); // or wherever you want



}


public function verifyEmail(){

    return view('verifymail');
    
}



public function SingUp(){

    return view('signup');
    
}


}
