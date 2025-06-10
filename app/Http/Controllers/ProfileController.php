<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Storage,Mail};
use Carbon\Carbon;
use App\Models\{
    User,
    Hobbie,
    AdditionalHobbie,
    PersonalTrait,
    Activity,
    GemPackage,
    UserGem,
    EmailOtp,
    Booking,
    Earning,
    Personality,
    AssociateRating,
    UserProfileImage,
    Rating
};


 class ProfileController extends Controller{

        public function companionProfile(){
            $user =  Auth::user();
            $data = Hobbie::all();
            $data1= AdditionalHobbie::all();
            $data2=PersonalTrait::all();
            $data3=Activity::all();
            $personality=Personality::all();
            return view('companion-profile',compact('data','data1','data2','data3','personality'));
        }
        
 
        public function completeCompanionProfile(Request $request){
        $user = Auth::user();
        
                 if ($user->user_type == 1) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User type is already set as Asociate and cannot be changed.'
                    
                ], 403);
                        }

        
        $user = User::find($user->id);
        $user->user_name = $request->username;
        
             if ($request->hasFile('profile_image')){
                $image = $request->file('profile_image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/profilecompanion'), $imageName);
                
                
                $user->profile_picture =  $imageName;
               }
                $user->bio = $request->bio;
                
           if ($request->filled('interests')) {
                $user->hobbie = $request->interests; // store as comma separated string
           }
           if($request->filled('additional_hobbie')){
              $user->additional_hobbie = $request->additional_hobbie;
           }
           if($request->filled('trait')){
               $user->personal_trait = $request->trait ;
            }
          if($request->filled('activities')){
           $user->activitie = $request->activities;
            }
            
             if($request->filled('personality')){
                 
           $user->personality = $request->personality;
            }
            
           
            if ($request->hasFile('idimage')) {
            $idImage = $request->file('idimage');
            $idImageName = time() . '_id_' . $idImage->getClientOriginalName();
            $idImage->move(public_path('uploads/id_documents'), $idImageName);
             $user->id_image = $idImageName;
             }
        
           
            if ($request->hasFile('selfieimage')) {
                $selfieImage = $request->file('selfieimage');
                $selfieImageName = time() . '_selfie_' . $selfieImage->getClientOriginalName();
                $selfieImage->move(public_path('uploads/selfies'), $selfieImageName);
                $user->id_selfie_image=  $selfieImageName;
            }
        
            $user->user_type=2;
            $user->save();
            
        for ($i = 1; $i <= 6; $i++) {
            $field = 'upload' . $i;
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $filename = time() . "_{$field}_" . $file->getClientOriginalName();
                    $file->move(public_path('uploads/companion_profile_images'), $filename);
                    $userProfile = new UserProfileImage();
                    $userProfile->user_id = $user->id;
                    $userProfile->images = 'uploads/companion_profile_images/' . $filename;
                    $userProfile->save();
               }
      }
       return response()->json(['status' => 'success', 'message' => 'Profile completed.', 'name' => $user->name]);
 }
 

// *****************************************************************companion dahsboard *************************************************************************************
   public function dashboardProfile(){
      $user = Auth::user();
          if($user->email_status==0){
                  $otp = rand(100000,999999);
                   $emaildata= EmailOtp::create([
                            'user_id'=>$user->id,
                            'otp'=>$otp,
                            'expires_at' => now()->addMinutes(5),
                            ]);
                            
                      Mail::send('email_theme', ['otp' => $otp, 'name' => $user->name], function ($message) use ($user) {
                        $message->to($user->email)->subject('Your New OTP');
                    });      
                 return redirect()->route('verify');
              }
         elseif($user->user_type==0){
             return redirect()->route('signup'); 
           }
      else{ 
           $hobbies = Hobbie::whereIn('id', explode(',', $user->hobbie))->get();
           $additionalhobbie= AdditionalHobbie::whereIn('id',explode(',' , $user->additional_hobbie ))->get();
           $trait = PersonalTrait::whereIn('id',explode(',',$user->personal_trait))->get();
           $activity =Activity ::whereIn('id',explode(',',$user->activitie ))->get();
           $personality = Personality::whereIn('id',explode(',',$user->personality))->get();
           $images = UserProfileImage::where('user_id', $user->id)->get();
          return view('dashboard', compact('user','hobbies','additionalhobbie','trait','activity','images','personality'));
      }
      
    }
// *****************************************************************************signup************************************************************************
    public function signup(){
    return view('signup');
    }
 // **************************************************************************logout************************************************************************************************************
    public function logout(request $request){
      
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenrateToken();
        return redirect('/')->with('success', 'You have been logged out.');
    }
    
//********************************************************************* edit companion********************************************************
 public function EditCompanion(){
    $user = Auth::user();
    $hobbies = Hobbie::whereIn('id', explode(',', $user->hobbie))->get();
   $images = UserProfileImage::where('user_id', $user->id)->get();
    $data1 = Hobbie::all();
    $additionalhobbie= AdditionalHobbie::whereIn('id',explode(',' , $user->additional_hobbie ))->get();
    $data3= AdditionalHobbie::all();
    $traits=PersonalTrait::whereIn('id',explode(',',$user->personal_trait))->get();
    $data4=PersonalTrait::all();
    $activity =Activity ::whereIn('id',explode(',',$user->activitie ))->get();
    $data5=Activity::all();
    return view('editprofiledashboard', [
        'user' => $user,
        'day' => $user->day,
        'year' => $user->year,
        'hobbies'=>$hobbies,
        'data'=>$data1,
        'images'=>$images,
        'additionalhobbie'=>$additionalhobbie,
        'data2'=>$data3,
        'traits'=>$traits,
        'data3'=>$data4,
        'activity'=>$activity,
        'data4'=>$data5
        ]);
  }
 
 public function StoreEditCompanion(request $request){
                $user = auth()->user();
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'user_name' => 'required',
                    'bio' => 'nullable',
                    'profile_image' => 'nullable',
                ]);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->user_name = $request->input('user_name');
                $user->bio = $request->input('bio');
            
                    if ($request->hasFile('profile_image')) {
                        $file = $request->file('profile_image');
                        $filename = time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads/profilecompanion'), $filename);
                        $user->profile_picture = $filename;
                    }
                    
               $user->hobbie = $request->input('selected_hobbies');
               $user->additional_hobbie = $request->input('additional_hobbie');
               $user->personal_trait = $request->input('traits');
               $user->activitie = $request->input('activitie');
               $user->day = $request->day;
               $user->month = $request->month;
               $user->year = $request->year;
               $user->save();
               return response()->json(['message' => 'Profile updated successfully']);
     }
     
 



public function StoreCompanionImage(Request $request)
{
    $user = auth()->user();
    $newImages = $request->file('images') ?? [];
    $existingImages = $request->input('existing_images') ?? [];
    
    // Get current images from database
    $currentImages = UserProfileImage::where('user_id', $user->id)
                       ->pluck('images', 'id')
                       ->toArray();
    
    $finalImages = [];
    
    // Process each image slot
    foreach ($existingImages as $index => $existingImagePath) {
        if (isset($newImages[$index])) {
            // Handle new image upload
            $file = $newImages[$index];
            $filename = time().'_upload'.($index+1).'_'.$file->getClientOriginalName();
            
            // Store in public/uploads/companion_profile_images
            $file->move(public_path('uploads/companion_profile_images'), $filename);
            $finalImages[] = 'uploads/companion_profile_images/'.$filename;
        } else {
            // Keep existing image path
            $finalImages[] = $existingImagePath;
        }
    }
    
    // Handle deletions
    foreach ($currentImages as $id => $currentImagePath) {
        if (!in_array($currentImagePath, $finalImages)) {
            // Delete physical file
            if (file_exists(public_path($currentImagePath))) {
                unlink(public_path($currentImagePath));
            }
            // Delete database record
            UserProfileImage::where('id', $id)->delete();
        }
    }
    
    // Add new images to database
    foreach ($finalImages as $path) {
        if (!in_array($path, $currentImages)) {
            UserProfileImage::create([
                'user_id' => $user->id,
                'images' => $path
            ]);
        }
    }
    
    return redirect()->route('dashboard')->with('success', 'Images updated successfully');
}

     public function compboooking(){
            // $bookings = Booking::where('companion_id', Auth::user()->id)->where('completed',0)->where('cancel',0)->orderBy('id','desc')->get();
            $bookings = Booking::where('companion_id', Auth::user()->id)
            ->where('completed', 0)
            ->where('cancel', 0)
            ->where('date', '>=', Carbon::now()->toDateString())
            ->orderBy('id', 'desc')
            ->get();
            $ratebookings = Booking ::where('companion_id',Auth::User()->id)->where('completed',1)->orderBy('id', 'desc')->get();
            $cancelbookings = Booking ::where('companion_id',Auth::User()->id)->where('cancel',1)->orderBy('id', 'desc')->get();
           
           return view('companion.booking.index',compact('bookings','ratebookings','cancelbookings'));
      }
      
      
      
      public function bookingstatuss(Request $request)
  {
            $booking=Booking::where('id',$request->bookingId)->first();
            
            Booking::where('id',$request->bookingId)->update([
                 'status' =>0,
                 'associate_rate_status' =>1,
                 'complete_status' =>1,
                 'cancel'=>1
            ]);
            
            
             $usergem = UserGem::where('user_id',$booking->associate_id)->first();
             $gempurchased =Booking::where('associate_id',$booking->associate_id)->sum('gem');
            
             UserGem::where('user_id',$booking->associate_id)->update([
               'cancel_gem' =>$usergem->cancel_gem+ $booking->gem
             ]);
      
        return redirect()->route('companion.booking')->with('success','Status change successfully');
            
  }
      
      
      
      
      
    public function comapnionmark(Request $request){
        Booking::where('id',$request->bookingId)->update([
               'associate_rate_status' =>1,
               'completed' =>1
           ]);
         return response()->json(['success' =>true]);
    }



  
  
  public function rating() {
     $ratings = Rating::where('companion_id',Auth::User()->id)->get();
     $ratingcount= Rating::where('companion_id',Auth::User()->id)->count();
     $totalrate= Rating::where('companion_id',Auth::User()->id)->sum('rate');
     $averagerating = $ratingcount > 0 ? ($totalrate / $ratingcount) : 0;
     $oneStarRatingCount = Rating::where('companion_id', auth()->id())->where('rate', 1)->count();
     $twoStarRatingCount = Rating::where('companion_id', auth()->id())->where('rate', 2)->count();
     $threeStarRatingCount = Rating::where('companion_id', auth()->id())->where('rate', 3)->count();
     $fourStarRatingCount = Rating::where('companion_id', auth()->id())->where('rate', 4)->count();
     $fiveStarRatingCount = Rating::where('companion_id', auth()->id())->where('rate', 5)->count();
     return view('companion.ratings.index',compact('ratings','ratingcount','averagerating','oneStarRatingCount','twoStarRatingCount','threeStarRatingCount','fourStarRatingCount','fiveStarRatingCount','totalrate'));
  }
  
  
  
  public function myearnings()
  {
         $earnings = Booking::where('companion_id',Auth::User()->id)->orderBy('id','desc')->withTrashed()->paginate(5);
         $earningcount=Booking::where('companion_id',Auth::User()->id)->withTrashed()->sum('gem');
         $thisweekearningcount = Booking::where('companion_id', Auth::user()->id)
            ->whereBetween('date', [
                Carbon::now()->startOfWeek(Carbon::MONDAY)->startOfDay(),
                Carbon::now()->endOfWeek(Carbon::SUNDAY)->endOfDay()
            ])
            ->withTrashed()
            ->sum('gem');

        $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY);
        $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek(Carbon::SUNDAY);

        $lastWeekEarningCount = Booking::where('companion_id', Auth::id())
            ->whereBetween('date', [$startOfLastWeek, $endOfLastWeek])
            ->withTrashed()
            ->sum('gem');    
         
        $thisMonthEarningCount = Booking::where('companion_id', Auth::id())
        ->whereBetween('date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        ->withTrashed()
        ->sum('gem'); 
         
            
         $pendings=Earning::where('companion_id',Auth::User()->id)->where('status',0)->orderBy('id','desc')->withTrashed()->paginate(5);
         $withdrawans=Earning::where('companion_id',Auth::User()->id)->where('status',1)->orderBy('id','desc')->withTrashed()->get();
         $withdrawansSum=Booking::where('companion_id',Auth::User()->id)->where('cancel',1)->withTrashed()->sum('gem');
         return view('companion.earnings.index',compact('earnings','earningcount','pendings','withdrawansSum','thisweekearningcount','lastWeekEarningCount','thisMonthEarningCount','withdrawans'));
  }
  
  public function myearningsdrawn(Request $request)
  {
        $request->validate([
            'total_earn' => 'required|integer|',
            'earning_drawn' => 'required|integer|min:10|lte:total_earn',
        ]);
          
      
    Earning::create([
        'total_earn' =>$request->total_earn,
        'earning_drawn'=>$request->earning_drawn,
        'companion_id'=>Auth::User()->id
    ]);
    
    return redirect()->route('myearnings')->with('Amount withdrawn Successfully');
  }
  
  
  
  public function notification()
  {
      Booking::where('companion_id',Auth::User()->id)->where('notification_status',0)->update([
        'notification_status' =>1
      ]);
      return redirect()->route('companion.booking');
  }
  
  
  
  
}
