<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}




    public function adminLogin(request $request){

        if($request->isMethod('post')){
            $data = $request->all();

        $credentiall = $request->validate([
            
        'email'=>'required|email',
        'password'=>'required'
    
        ]);
            
        if (Auth::guard('admin')->attempt($credentiall)) {
    
            // Remember admin email and password with cookies
            if (isset($data['remember']) && ! empty($data['remember'])) {
                // set cookie for email
                setcookie('email', $data['email'], time() + 86400);
    
                // set cookie for password
                setcookie('password', $data['password'], time() + 86400);
            } else {
                setcookie('email', '');
                setcookie('password', '');
            }
            return redirect('adminstrator/dashboard');
            
        } else {

            return back()->with('error_message', 'Invalid Credentials!');
        }
        }
    
        return view('admin::admin.login');
    
    }
    

    
    
    public function dashboard(){
       

        $count = User::count();

   
        return view('admin::admin.dashboard',compact('count'));
        
        }
        








}
