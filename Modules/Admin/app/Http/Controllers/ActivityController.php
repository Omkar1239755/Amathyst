<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    
    public function index() {
     $activities = Activity::all();
     return view('admin::activity.index',compact('activities'));
    }
    
    
    public function create()
    {
        return view('admin::activity.create');
    }
    

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'activity' => 'required|string|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/activity'), $imageName);
        }
    
        Activity::create([
            'activity' => $validatedData['activity'],
            'image' => $imageName ?? null,
        ]);
    
        return redirect()->route('activtiy.index')->with('success','Activity Created Successfully');
    }
    
    
    public function delete($id)
    {
        $activity=Activity::find($id);
        if ($activity && $activity->image) {
         $imagePath = public_path('uploads/hobbies/' . $activity->image);
         if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
       Activity::find($id)->delete();
       return redirect()->route('activtiy.index')->with('success','Activity Deleted Successfully');
    }
    
    public function edit(Request $request)
    {
        $activity= Activity::findOrFail($request->id);
        return view('admin::activity.edit',compact('activity'));
    }
    
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
           'activity' => 'required|string|min:5',
        ]);
       
        $activity = Activity::findOrFail($request->id);
        if($activity->image){
            $oldImagePath = public_path('uploads/activity/' . $activity->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
      
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/activity'), $imageName);
        }
        
       $activity ->update([
            'activity' => $validatedData['activity'],
            'image' => $imageName ?? $activity->image,
        ]);
    
        return redirect()->route('activtiy.index')->with('success','Activity Updated Successfully');
    }
    
}
