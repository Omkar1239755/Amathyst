<?php
namespace App\Http\Controllers;
use App\Models\{User,EmailOtp};
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\{Hash,Mail,Log,Auth,DB}; 

class GoogleController extends Controller
{
   
    public function redirectToGoogle(){
      return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
    try {
        $googleUser = Socialite::driver('google')->user();
        $findUser = User::where('google_id', $googleUser->id)->first();
        if ($findUser) {
               
                 Auth::login($findUser);
                if ($findUser->user_type == 0) {
                    return redirect()->route('signup');
                } elseif ($findUser->user_type == 1) {
                    return redirect()->route('associatedashboard')->with('success', 'Logged in successfully!');
                } elseif ($findUser->user_type == 2) {
                    return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
                }
        } 
     
        else {
              
           $newUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
            ]);
                 $newUser->email_status = 1;
                 $newUser->save();
                 Auth::login($newUser);
                 return redirect()->route('signup');
         }
    } catch (Exception $e) {
        \Log::error('Google OAuth error: ' . $e->getMessage());
        return redirect()->route('login')->with('error', 'An error occurred during Google login. Please try again.');
    }
}
   
}