<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;

class ProfileController extends Controller
{

public function associateProfile(){

return view('associateprofile');

}


public function companionProfile(){

return view('companionprofile');

}


public function dashboardProfile(){
return view('dashboard');
}


public function signup(){

return view('signup');
}


//  public function updateProfileAssociate(){

//     $email = session('email');
//     $user = User::where('email', $email)->first();
//     $user->user_type=1;
//     $user->save();
//     return redirect()->route('associate'); 


//  }



    
}
