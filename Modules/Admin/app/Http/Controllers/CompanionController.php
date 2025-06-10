<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Rate,Booking,UserProfileImage,Earning,Rating};

class CompanionController extends Controller
{
    public function index() {
      $companions = User::where('user_type','2')->orderBy('id','desc')->get();
      return view('admin::companions.index',compact('companions'));
    }
    
    
    public function updateStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
       return response()->json(['success'=>'Status change successfully.']);
    }
    
    public function featuredupdateStatus(Request $request)
    {
        if ($request->status == 1) {
       
        $featuredCount = User::where('featured_status', 1)->count();
        
        
        if ($featuredCount >= 4) {
            return response()->json([
                'error' => 'Only 4 companions can be selected.'
            ], 422);
        }
       }
        
        $user = User::find($request->user_id);
        $user->featured_status = $request->status;
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);
     
    }
    
    
    public function delete($id)
    {
       User::find($id)->delete();
       return redirect()->route('companion.index');
    }
    
    public function view(Request $request,$id)
    {
        $companion = User::findOrfail($id);
        $rates =Rate::where('user_id',$id)->get();
        $bookings=Booking::where('companion_id',$id)->where('completed',1)->get();
        $earnings = Booking::where('companion_id',$id)->orderBy('id','desc')->get();
        $withdrawans=Earning::where('companion_id',$id)->where('status',1)->orderBy('id','desc')->get();
        $document=User::where('id',$id)->first();
        $averageRate = Rating::where('companion_id', $companion->id)->avg('rate');
        $images = UserProfileImage::where('user_id', $id)->get();
        return view('admin::companions.view',compact('companion','averageRate','rates','bookings','document','images','earnings','withdrawans'));
    }
    
}
