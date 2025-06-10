<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personality;
class PersonalityController extends Controller
{
    
    public function index()
    {
      $data=Personality::get();
      return view('admin::personality-prefrences.index',compact('data'));
    }
    
    public function create(){
        return view('admin::personality-prefrences.create');
    }
    
    public function store(request $request){
        
        $request->validate([
            'Personality' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            
            $image->move(public_path('uploads/personalities'), $imageName);
        
            
            Personality::create([
                'personality_preferences' => $request->Personality,
                'image' => $imageName,
            ]);
        }
        
        return redirect()->route('personality.index')->with('success', 'Personality added successfully');
    }
    
    
    
    public function delete($id)
    {
        $personality=Personality::find($id);
        if ($personality && $personality->image) {
         $imagePath = public_path('uploads/personalities/' . $personality->image);
         if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
       Personality::find($id)->delete();
       return redirect()->route('personality.index')->with('success','Personality deleted successfully');
    }
    
    
    
    public function edit(Request $request)
    {
        $personality= Personality::findOrFail($request->id);
        return view('admin::personality-prefrences.edit',compact('personality'));
    }
    
    
    
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
             'Personality' => 'required',
         ]);
       
        $personality = Personality::findOrFail($request->id);
        if ($personality->image) {
            $oldImagePath = public_path('uploads/personalities/' . $personality->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
      
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/personalities'), $imageName);
        }
        
        $personality->update([
            'personality_preferences' => $validatedData['Personality'],
            'image' => $imageName ?? $personality->image,
        ]);
    
        return redirect()->route('personality.index')->with('success','Personality updated successfully');
    }
    
}
