<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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





    
}
