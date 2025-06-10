<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MyAvailibility;
use Illuminate\Support\Facades\Validator;

class MyavailabilityController extends Controller
{
    public function index()
    {
         $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
         return view('companion.availablity.index',compact('days'));
    }
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'starttime' => 'required',
            'endtime' => 'required',
            'status' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill all required fields.',
                
            ], 422);
        }

                   
          
          
         $record = MyAvailibility::where('day',$request->day)->where('user_id',Auth::User()->id)->first();
         if($record) {
             MyAvailibility::where('user_id', Auth::User()->id)->where('day',$request->day)->update([
                'start_time' => $request->starttime,
                'end_time' => $request->endtime,
                'status' =>  $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Availability saved successfully!',
            ]);

        }
           
        MyAvailibility::create([
            'day' =>$request->day,
            'user_id'=>Auth::User()->id,
            'start_time'=>$request->starttime,
            'end_time'=>$request->endtime,
            'status'=>$request->status,
           
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Availability saved successfully!',
        ]);

    }
    public function allstatus(Request $request)
    {
            if($request->common_status == 1)
            {
                 MyAvailibility::where('user_id',Auth::User()->id)->update([
                     'status' => 1
                 ]);
            }
            
            if($request->common_status == 0)
            {
                 MyAvailibility::where('user_id',Auth::User()->id)->update([
                     'status' => 0
                 ]);
            }
            
            return response()->json([
            'success' => true,
            'message' => 'Availability saved successfully!',
           ]);
    }
}
