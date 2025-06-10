<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Booking,Transaction};

class AssociateController extends Controller
{
    public function index() {
      $associates = User::where('user_type','1')->withTrashed()->orderBy('id','desc')->get();
      return view('admin::associates.index',compact('associates'));
    }
    
     public function updateStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
    
    
    public function view(Request $request,$id)
    {
         $associate = User::findOrfail($id);
         $bookings=Booking::where('associate_id',$id)->where('completed',1)->get();
         $transactions=Transaction::where('user_id',$id)->get();
         return view('admin::associates.view',compact('associate','bookings','transactions'));
    }
    
    
    public function delete($id)
    {
       User::find($id)->delete();
       return redirect()->route('associate.index')->with('success','Associate Deleted successfully');
    }
}
