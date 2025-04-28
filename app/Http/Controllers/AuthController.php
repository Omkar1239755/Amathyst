<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use App\Models\EmailOtp;
use Illuminate\Support\Facades\Mail;

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


        return redirect()->route('signup'); // or wherever you want


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
        'email' => 'required|string|email',
        'country' => 'nullable',
        'birthday' => 'nullable',
        'heard_about_us' => 'nullable',
        'password' => 'required|min:6',
        'terms' => 'accepted',
    ], [
        'terms.accepted' => 'You must accept the Terms & Conditions to register.',
    ]);

    
    $user =    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'country'=>$request->country,
        'birthday'=>$request->birthday,
        'heard_about_us'=>$request->heard_about,
        'password'=>Hash::make($request->password)

        ]);


        // Log in the user
         Auth::login($user);
        // genrate otp
        $otp = rand(100000,999999);

    
       $emaildata= EmailOtp::create([
        'user_id'=>$user->id,
        'otp'=>$otp,
        'expires_at' => now()->addMinutes(5),
        ]);
 
// SEND Mail
       Mail::raw("Your Otp is:$otp", function($message) use ($user){
         $message->to($user->email)->subject('Verify your Email - OTP ');
        });

            // Store email in session
    session(['email' => $user->email]);
        return redirect()->route('verify'); 
 }



 public function verifyEmail(){

        // $email = Auth::user()->email;
        return view('verifyotp');
 }




    public function verifyOtp(request $request){

 
        $email = session('email');

        if (!$email) {
            return redirect()->route('register')->withErrors(['email' => 'Session expired. Please register again.']);
        }
    
      $user = User::where('email', $email)->first();
      $userid=$user->id;

        if (!$userid) {
            return redirect()->back()->withErrors(['otp' => 'User not found.']);
        }

        $otpEntry = EmailOtp::where('user_id', $userid)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();
     

        if ($otpEntry) {
            
            $otpEntry->delete();
    
            return redirect()->route('signup')->with('success', 'Email verified successfully. Please login.');
        }
    
        return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP']);
   

   }

 public function login(){

    return view('login');

    }


public function loginStore(request $request){

        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        // If login fails
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }






    }








