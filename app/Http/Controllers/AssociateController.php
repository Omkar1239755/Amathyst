<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\{User,Hobbie,AdditionalHobbie,PersonalTrait,Activity,GemPackage,UserGem,Booking,Rating,Transaction,AssociateRating};
use Illuminate\Support\Facades\{Auth}; 
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class AssociateController extends Controller
{
  
        public function dashboard(){
           $user = auth()->user();
           $hobbies = Hobbie::whereIn('id', explode(',', $user->hobbie))->get();
           $additionalhobbie= AdditionalHobbie::whereIn('id',explode(',' , $user->additional_hobbie ))->get();
           $trait = PersonalTrait::whereIn('id',explode(',',$user->personal_trait))->get();
           $activity =Activity ::whereIn('id',explode(',',$user->activitie ))->get();
          return view('associate.dashboard',compact('user','hobbies','additionalhobbie','trait','activity'));
        }
        
        
        public function profile(){
            $user =  Auth::user();
            $data = Hobbie::all();
            $data1= AdditionalHobbie::all();
            $data2=PersonalTrait::all();
            $data3=Activity::all();
           return view('associate.profile.index',compact('data','data1','data2','data3'));
        }
        
        
        
        public function completeProfile(Request $request){
            $user = Auth::user();
            $user = User::find($user->id);
            $user->user_name = $request->username;
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/profile'), $imageName);
                $user->profile_picture = $imageName;
            }
    
            if ($request->filled('interests')) {
                $user->hobbie = $request->interests; 
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
            $user->user_type=1;
            $user->save();
            return response()->json(['status' => 'success', 'message' => 'Profile completed.', 'name' => $user->name]);
        }
        
        
        
        public function gemsassociate(){
            $gemdata = GemPackage::all();
            $usergem = UserGem::where('user_id', Auth::User()->id)->first();
            $bookings = Booking::where('associate_id', Auth::user()->id)->withTrashed()->get();
            $gempurchased =Booking::where('associate_id',Auth::User()->id)->withTrashed()->sum('gem');
            return view('associate.gem.index',compact('gemdata','usergem','bookings','gempurchased')); 
        }
        
        
        
       public function buyGems(request $request)
        { 
          $user= Auth()->user();
          $record=UserGem::where('user_id',Auth::User()->id)->first();
          if($record)
          {
            UserGem::findOrfail($record->id)->update([
                'intial_gem'=>$record->intial_gem+ $request->count,  
                'amount' => $record->amount+ $request->amount,  
            ]);
          }
          else
          {
              UserGem::create([
              'user_id' => $user->id,
            // 'no_of_gems'=>$request->count,
              'intial_gem' =>$request->count,
              'amount' => $request->amount,
             ]); 
         }
        return redirect()->back()->with('success', 'Gems purchased successfully!');
    }
     
   //method for a payment gateway stripe  
 public function checkout(request $request){
     
     $user = Auth::user();
     session([
        'gem_count' => $request->count,
        'gem_amount' => $request->amount
    ]);
    Stripe::setApiKey(config('services.stripe.secret'));

    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $request->count . ' Gems',
                ],
                'unit_amount' => $request->amount * 100, // amount in cents
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
         'customer_email' => $user->email,
        'success_url' => route('payment.success') .  '?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('payment.cancel'),
    ]);

    return response()->json(['checkout_url' => $session->url]); }
 
 public function paymentSuccess(request $request) {

     $gemCount = session('gem_count'); 
     $amount = session('gem_amount');
     $sessionId = $request->get('session_id');
     
     Stripe::setApiKey(config('services.stripe.secret'));
    $session = \Stripe\Checkout\Session::retrieve($sessionId);
    $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
    $stripeTransactionId = $paymentIntent->id;
     
     
     if ($gemCount && auth()->check()) {
        $user = auth()->user();
        
        $userGem = UserGem::firstOrNew(['user_id' => $user->id]);
        $userGem->intial_gem += $gemCount;
        $userGem->save();
        
        Transaction::create([
          'user_id'=> $user->id,
          'transaction_id'=>$stripeTransactionId,
          'Gems'=>$gemCount,
          'Amount'=>$amount,
          'status'=>1
            ]);
     }
        return view('payment-sucess'); 
        
  }
    
    
 public function paymentCancel(request $request)
    {
        
        $user = auth()->user();
        
        Transaction::create([
          'user_id'=> $user->id,
          'status'=>2
            ]);
        
        return view('payment_cancell'); 
    }



 public function editassociate(){
        $user = Auth::user();
        $hobbies = Hobbie::whereIn('id', explode(',', $user->hobbie))->get();
        $data1 = Hobbie::all();
        $additionalhobbie= AdditionalHobbie::whereIn('id',explode(',' , $user->additional_hobbie ))->get();
        $data3= AdditionalHobbie::all();
        $traits=PersonalTrait::whereIn('id',explode(',',$user->personal_trait))->get();
        $data4=PersonalTrait::all();
        $activity =Activity ::whereIn('id',explode(',',$user->activitie ))->get();
        $data5=Activity::all();
        return view('associate.profile.edit', [
            'user' => $user,
            'day' => $user->day,
            'year' => $user->year,
            'hobbies'=>$hobbies,
            'data'=>$data1,
            'additionalhobbie'=>$additionalhobbie,
            'data2'=>$data3,
            'traits'=>$traits,
            'data3'=>$data4,
            'activity'=>$activity,
            'data4'=>$data5
            ]);
    }
    
    
    
       public function StoreEditassociate(request $request){
        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'user_name' => 'required',
            'profile_image' => 'nullable',
        ]);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_name = $request->input('user_name');
     
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/profile'), $filename);
   
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
   
   
      public function booking()
      {
        
          $bookings = Booking::where('associate_id', Auth::user()->id)->where('completed', 0)->where('cancel', 0)->where('date', '>=', Carbon::now()->toDateString())->orderBy('id', 'desc')->withTrashed()->get();
          $ratebookings = Booking ::where('associate_id',Auth::User()->id)->where('completed',1)->orderBy('id', 'desc')->withTrashed()->get();
          $cancelbookings = Booking ::where('associate_id',Auth::User()->id)->where('cancel',1)->orderBy('id', 'desc')->withTrashed()->get();
          return view('associate.booking.index',compact('bookings','ratebookings','cancelbookings'));
     }
  
      
       public function bookingstatus(Request $request)
       {
            $booking=Booking::where('id',$request->bookingId)->first();
            
                    Booking::where('id',$request->bookingId)->update([
                     'status' =>0,
                     'associate_rate_status' => 1,
                     'complete_status'=>1,
                     'cancel'=>1
                    
                ]);
            
             $usergem = UserGem::where('user_id',Auth::User()->id)->first();
             $gempurchased =Booking::where('associate_id',$booking->associate_id)->sum('gem');
             UserGem::where('user_id',Auth::User()->id)->update([
               'cancel_gem' =>$usergem->cancel_gem+$request->gem
             ]);
             
            return redirect()->route('associate.booking')->with('success','Status change successfully');
           
       }
       
       
       
       
       
      public function markascomplete(Request $request)
      {
           $booking=Booking::where('id',$request->bookingId)->update([
                 'complete_status' =>1,
                 'completed' =>1
                 
           ]);
           
            
         return response()->json(['success' =>true]);
      }
      
       
       
      public function associateCompanionrating(request $request)
      {
             $request->validate([
                 'rating' =>'required',
                 'review' => 'required|string|min:10',
             ]);
          
           
            Rating::create([
               'rate' =>$request->rating,
               'reviews'=>$request->review,
               'companion_id' =>$request->companion_id,
               'associate_id'=>Auth::User()->id
            ]);
            
                 Booking::where('id',$request->booking_id)->update([
                 'rate_status' =>1   
                 ]);
            return redirect()->back()->with('success','Rating Done Successfully');
           
      }
      
      
    
      
    
      
}