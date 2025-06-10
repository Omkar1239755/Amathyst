<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rate;
class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::where('user_id',Auth::User()->id)->get();
        return view('companion.rate.index',compact('rates'));
    }
    
    public function create()
    {
        if(Auth::user()->doc_status == 0 ||Auth::user()->doc_status == 2)
        {
           return redirect()->back()->with('danger','Your documents are not Verfied'); 
        }
        return view('companion.rate.create');
    }
    
    public function store(Request $request)
    {
      
        
         
          $request->validate([
              'title' => 'required|string',
              'gem' => 'required|integer|min:1',
              'hour'=>'required',
          ]);
          
          
          Rate::create([
           'title' =>$request->title,
           'user_id' =>Auth::User()->id,
           'gem' =>$request->gem,
           'hours'=>$request->hour
          ]);
          
          return redirect()->route('rate.index');
          
    }
    
    public function edit(Request $request,$id)
    {
          $rate = Rate::findOrfail($id);
          return view('companion.rate.edit',compact('rate'));
    }
    
    public function update(Request $request,$id)
    {
            $request->validate([
              'title' =>'required',
              'gem' =>'required',
              'hour'=>'required',
           ]);
          Rate::find($id)->update([
           'title' =>$request->title,
           'gem' =>$request->gem,
           'hours'=>$request->hour
          ]);
          
          return redirect()->route('rate.index');
    }    
}
