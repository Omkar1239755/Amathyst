<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Earning;

class WithdrawnController extends Controller
{
    
    public function index()
    {
     $earnings = Earning::all();
     return view('admin::withdrawn.index',compact('earnings'));
    }
    
    public function status(Request $request)
    {
        Earning::find($request->earningId)->update([
            'status' => $request->status
        ]);
    
        if ($request->ajax()) {
            return response()->json(['success' => 'Status changed successfully!']);
        }
    
        return redirect()->route('companion.withdrawn')->with('success','Status changed Successfully');
    }

}
