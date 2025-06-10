<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{
    User,
    EmailOtp,
    GemPackage,
    Faq,Hobbie,
    AdditionalHobbie,
    PersonalTrait,
    Activity,
    Rate,
    UserProfileImage,
    MyAvailibility,
    Booking,
    UserGem,
    Personality,
    Rating,
    Testimonial,
    Transaction,
    Earning
   
};
use Illuminate\Support\Facades\{Hash,Mail,Log,Auth,DB}; 
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function index()
    {        
            $featuredcompanions=User::where('featured_status',1)->get();
            $data= GemPackage::get();
            $personality=Personality::get();
            $faqs =Faq::all();
            $testimonials=Testimonial::all();
            return view('web.index',compact('data','personality','faqs','testimonials','featuredcompanions'));
    }
       
       
       
        
    public function loginView(){
            return view('web.login');
        }
        
    public function loginCheck(request $request){
     
          $request->validate([
            'email' => 'required|email',
            'password' => 'required',
          ]);
       
            if(Auth::attempt($request->only('email','password'))){
                    $user = Auth::user();
                 
                if($user->email_status==0){
                    
                            $otp = rand(100000,999999);
                            $emaildata= EmailOtp::create([
                            'user_id'=>$user->id,
                            'otp'=>$otp,
                            'expires_at' => now()->addMinutes(5),
                            ]);
                 
                             Mail::send('email_theme', ['otp' => $otp, 'name' => $user->name] ,function($message) use ($user){
                             $message->to($user->email)->subject('Verify your Email - OTP ');
                             
                             Log::info('OTP mail sent', [
                            'email' => $user->email,
                            'subject' => 'Verify your Email - OTP'
                           ]);
                        });
                     session(['email' => $user->email]);
                     return redirect()->route('verify')->with('success','Your email address hasnt been verified yet. Kindly verify it to continue.');
                 }     
                
                else{
       
                     if($user->user_type == 0){
                      return redirect()->route('signup');
                     }
                     elseif($user->user_type == 1){
                         return redirect()->route('associatedashboard');
                         }
                     elseif($user->user_type == 2){
                         return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
                         }
               
              }
                
          }        
            
            
             return back()->withErrors([
                    'email' => 'Invalid credentials provided.',
                ])->withInput($request->only('email'));
            
            
                
     }
        
    public function registerView(){
             return view('web.register');
        }
    public function Storeregister(request $request){
        
          $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'country' => 'nullable',
            'birthday' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d')],
            'heard_about_us' => 'nullable',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).+$/',
            ],
            'confirm' => 'required|same:password',
            'terms' => 'accepted',
        ], [
            'terms.accepted' => 'You must accept the Terms & Conditions to register.',
            'birthday.before' => 'You must be at least 18 years old to register.',
            'password.regex' => 'Password must be at least 6 characters and include at least one uppercase letter, one number, and one special character.',
        ]);

            $birthday = \Carbon\Carbon::parse($request->birthday);
            
            
            $user =    User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'country'=>$request->country,
                 'day'  => $birthday->day,
                'month' => $birthday->format('m'),
                'year'  => $birthday->year,
                'heard_about_us'=>$request->heard_about,
                'password'=>Hash::make($request->password)
        
                ]);
               
                 Auth::login($user);
               
                $otp = rand(100000,999999);
        
            
               $emaildata= EmailOtp::create([
                'user_id'=>$user->id,
                'otp'=>$otp,
                'expires_at' => now()->addMinutes(5),
                ]);
         
           
                   Mail::send('email_theme', ['otp' => $otp, 'name' => $user->name] ,function($message) use ($user){
                     $message->to($user->email)->subject('Verify your Email - OTP ');
                     
                     Log::info('OTP mail sent', [
                    'email' => $user->email,
                    'subject' => 'Verify your Email - OTP'
                ]);
                 
                });
        
            session(['email' => $user->email]);
                return redirect()->route('verify'); 
         }
    public function verifyEmail(){
                return view('web.verifyotp');
             }
    public function login(){
             return view('login');
          }
    public function loginStore(request $request){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            $credentials = $request->only('email', 'password');
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
              
                     return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
                 
            }
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->onlyInput('email');
            
        }
    public function resendOtp(request $request){
           $email = session('email');
     
           if (!$email) {
            return redirect()->route('register')->withErrors(['email' => 'Session expired. Please register again.']);
            }
           $user = User::where('email',$email)->first();
    
             if (!$user) {
            return redirect()->back()->withErrors(['otp' => 'User not found.']);
           }
           
           EmailOtp::where('user_id',$user->id)->delete();
           
           $otp = rand(100000,999999);
           
           $emaildata= EmailOtp::create([
                    'user_id'=>$user->id,
                    'otp'=>$otp,
                    'expires_at' => now()->addMinutes(5),
                    ]);
                    
              Mail::send('email_theme', ['otp' => $otp, 'name' => $user->name], function ($message) use ($user) {
                $message->to($user->email)->subject('Your New OTP');
            });      
             
          return redirect()->back()->with('success', 'A new OTP has been sent to your email.');  
       
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
                $user->email_status=1;
                $user->save();
                return redirect()->route('signup')->with('success', 'Email verified successfully. ');
            }
            return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP']);
         }
    public function Settings(){
               $user = Auth::user();
               if($user->email_status==0){
                     return redirect()->route('verify');
                   }
                elseif($user->user_type==0){
                     return redirect()->route('signup'); 
                  }
                else{
                    return view('web.settingdasboard'); 
                 }
          }
    public function SaveSettings(request $request){
             $request->validate([
                 'oldpass'=>'required',
                 'newpass'=>'required|min:6',
                 'confirmpass' => 'required|same:newpass',
                 ]); 
                 
            $user=Auth::user();
          
            if(!Hash::check($request->oldpass,$user->password)){
               return back()->withErrors(['oldpass' => 'Old password is incorrect'])->withInput();
              }
              
            $user->password = Hash::make($request->newpass);
            $user->save();
            return back()->with('success', 'Password changed successfully!');
           }
    public function forgotPass(){
    return view('web.forgot_password');   
    } 
    public function forgotPassCheck(request $request){
             
          $request->validate(['email' => 'required|email|exists:users,email']);   
          
          $token = Str::random(64);
            DB::table('password_reset_tokens')->updateOrInsert(
                
            ['email' => $request->email],
            
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
          );
          
          $resetLink = url("/reset-password/{$token}?email=" . urlencode($request->email));
                        
            Mail::send('reset_password_email_template', ['resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Your Password');
            
           });                
                            
           
         return back()->with('success', 'Reset link has been sent to your email.');
        
         }
    public function showResetForm (string $token,request $request){
              return view('reset_password',[
                    'token' => $token,
                    'email' => $request->email,
                ]);
    }
    public function reset(request $request){
        
            $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6', 
            ]); 
        
             $record = DB::table('password_reset_tokens')->where('email', $request->email)->where('token', $request->token)->first();
                
                 if (!$record || Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
                    return back()->withErrors(['email' => 'Invalid or expired token']);
                   }
            
                 DB::table('users')->where('email', $request->email)->update([
                    'password' => Hash::make($request->password),
                ]);
   
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return redirect()->route('login')->with('success', 'Password has been reset successfully!');
        }
    public function logout(request $request){
        Auth::logout(); 
        return redirect('/')->with('success', 'You have been logged out.');
    }
    public function companionlist(Request $request)
    {
        $query = User::where('user_type', 2);
    
        if ($request->name && $request->name != 'all') {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
    
        $applyOrWhere = function ($column, $values) use (&$query) {
        $values = is_array($values) ? $values : [$values]; 
        $query->where(function ($q) use ($column, $values) {
            foreach ($values as $value) {
                $q->orWhere($column, 'LIKE', '%' . $value . '%');
            }
        });
    };
    
        if ($request->has('hobbie')) {
            $applyOrWhere('hobbie', $request->hobbie);
        }
    
        if ($request->has('additional_hobbie')) {
           $applyOrWhere('additional_hobbie', $request->additional_hobbie);
        }
    
        if ($request->has('personal_trait')) {
            $applyOrWhere('personal_trait', $request->personal_trait);
        }
    
        if ($request->has('activity')) {
            $applyOrWhere('activitie', $request->activity);
        }
    
        $companions = $query->paginate(8);
        
       
    
     
        if ($request->ajax()) {
            $html = view('home.companion.partials._companions', compact('companions'))->render();
            return response()->json(['html' => $html]);
        }
    
        
        $hobbies = Hobbie::all();
        $additionalhobbies = AdditionalHobbie::all();
        $activities = Activity::all();
        $traits = PersonalTrait::all();
        return view('home.companion.index', compact('companions', 'hobbies', 'additionalhobbies', 'activities', 'traits'));
    }
    public function viewprofile($id){
            if (!Auth::check() || Auth::user()->user_type != 1) {
                return redirect()->back();
            }
        $bookingdata = Rate::where('user_id',$id)->get();
        $data = User::where('id', $id)->first();
        $timeslots = MyAvailibility::where('user_id',$id)->get();
        $companion = MyAvailibility::where('user_id',$id)->first();
        $hobbies = Hobbie::whereIn('id', explode(',', $data->hobbie))->get();
        $additionalhobbie= AdditionalHobbie::whereIn('id',explode(',' , $data->additional_hobbie ))->get();
        $trait = PersonalTrait::whereIn('id',explode(',',$data->personal_trait))->get();
        $activity =Activity ::whereIn('id',explode(',',$data->activitie ))->get();
        $personality = Personality::whereIn('id',explode(',',$data->personality))->get();
        $ratings=Rating::where('companion_id',$id)->get();
        $totalcount=Rating::where('companion_id',$id)->count();
        $ratecount=Rating::where('companion_id',$id)->sum('rate');
        $usergem = UserGem::where('user_id', Auth::User()->id)->first();
        $gempurchased =Booking::where('associate_id',Auth::User()->id)->sum('gem');
        
        $onetarcount=Rating::where('companion_id',$id)->where('rate',1)->count();
        $twostarcount=Rating::where('companion_id',$id)->where('rate',2)->count();
        $threestarcount=Rating::where('companion_id',$id)->where('rate',3)->count();
        $fourstarcount=Rating::where('companion_id',$id)->where('rate',4)->count();
        $fivestarcount=Rating::where('companion_id',$id)->where('rate',5)->count();
        $average = $totalcount> 0 ? $ratecount /$totalcount : 0;
        $average == 0 ? 0 : number_format($average, 1) ;
        $images = UserProfileImage::where('user_id', $data->id)->get();
        return view('home.companion.viewprofile',compact('data','hobbies','additionalhobbie','trait','activity','bookingdata','images','timeslots','companion','personality','ratings','totalcount','average','onetarcount','twostarcount','threestarcount','fourstarcount','fivestarcount','usergem','gempurchased'));
    } 
    public function bookingstore(Request $request)
    {
   
    if (!Auth::check() || Auth::user()->user_type != 1) {
        return response()->json(['status' => 'error', 'message' => 'Only associates can make bookings'], 401);
    }

    $request->validate([
        'companion' => 'required|integer',
        'gem' => 'required|integer|min:1',
        'title' => 'required|string|max:255',
        'hours' => 'required|integer|min:1',
    ]);

        $userId = Auth::id();
        $userGem = UserGem::where('user_id', $userId)->first();
        if (!$userGem) {
         return response()->json(['status' => 'error', 'message' => 'Please purchase  gems for booking'], 404);
        }   
   
       $gempurchased =Booking::where('associate_id',Auth::User()->id)->where('status',1)->sum('gem');
      
        if($request->gem >   $userGem->intial_gem - $gempurchased) {
        return response()->json(['status' => 'error', 'message' => 'Please purchase more gems for booking'], 400);
        }
        try {
        DB::beginTransaction();
       // $userGem->no_of_gems -= $request->gem;
        $userGem->save();
       
        $booking = Booking::create([
            'companion_id' => $request->companion,
            'associate_id' => $userId,
            'gem' => $request->gem,
            'date' => now()->format('Y-m-d'),
            'title' => $request->title,
            'hours' => $request->hours,
            'status' => 1
        ]);
        
      $gemnowpurchased =Booking::where('associate_id',Auth::User()->id)->sum('gem');
        
        Booking::find($booking->id)->update([
             'gem_remaining'=>$userGem->intial_gem -  $gemnowpurchased,
        ]);

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking done successfully',
            'booking_id' => $booking->id
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
}



  public function deleteaccount()
  {
           die('work is in progress');
        if(Auth::User()->user_type == 1){
          $bookings = Booking::where('associate_id', Auth::User()->id)->whereDate('date', Carbon::now()->format('Y-m-d'))->first();
          if($bookings)
          {
              return redirect()->back()->with('danger','You have made bookings today. You are not allowed to delete your account today.');
          }
          else{
              Booking::where('associate_id',Auth::User()->id)->delete();
              Rating::where('associate_id',Auth::User()->id)->delete();
              UserGem::where('user_id',Auth::User()->id)->delete();
              Transaction::where('user_id',Auth::User()->id)->delete();
              User::findOrfail(Auth::User()->id)->delete();
              return redirect()->route('index')->with('success','Account deleted Successfully');
          }
      }
      else
      {
          $bookings = Booking::where('companion_id', Auth::User()->id)->whereDate('date', Carbon::now()->format('Y-m-d'))->first();
          if($bookings)
          {
              return redirect()->back()->with('danger','You have  bookings today. You are not allowed to delete your account today.');
          }
          else{
               Booking::where('companion_id',Auth::User()->id)->delete();
               Rate::where('user_id',Auth::User()->id)->delete(); 
               Rating::where('companion_id',Auth::User()->id)->delete();
               Earning::where('companion_id',Auth::User()->id)->delete(); 
               User::findOrfail(Auth::User()->id)->delete();
               return redirect()->route('index')->with('success','Account deleted Successfully');
          }
      }
      
  }
       
  


   public function webfaq()
   {
      $faqs=Faq::all();
      return view('web.faq',compact('faqs'));
   }
    
}
