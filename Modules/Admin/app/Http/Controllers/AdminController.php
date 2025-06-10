<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AdminController extends Controller
{
    
    public function index(){
       return view('admin::admin.login');
    }
    
    public function logincheck(Request $request)
    {
        $request->validate([
              'email' =>'required',
              'password' =>'required'
          ]);
          
        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials)){
                return redirect()->route('admin.dashboard');
            }

        return redirect()->route('admin.login')->with('success','Invalid Credentials');
         
    }
    
    public function dashboard(){
        $countassociates = User::where('user_type',1)->count();
        $countcompanions = User::where('user_type',2)->count();
        return view('admin::admin.dashboard',compact('countassociates','countcompanions'));
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.logout');
    }
        
}
