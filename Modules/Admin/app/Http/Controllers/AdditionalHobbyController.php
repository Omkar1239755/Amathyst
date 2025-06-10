<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdditionalHobbie;
class AdditionalHobbyController extends Controller
{
    
    public function index() {
     $hobbies = AdditionalHobbie::all();
     return view('admin::additional-hobbie.index',compact('hobbies'));
    }
    
    
    public function create()
    {
      return view('admin::additional-hobbie.create');
    }
    

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'additional_hobbie' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
      if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/additional_hobbies'), $imageName);
        }
    
        AdditionalHobbie::create([
            'additional_hobbie' => $validatedData['additional_hobbie'],
            'image' => $imageName ?? null,
        ]);
    
        return redirect()->route('additionalHobbie.index')->with('success','Addional Hobbie Created Successfully');
    }
    
    
    public function delete($id)
    {
        $hobbie=AdditionalHobbie::find($id);
        if ($hobbie && $hobbie->image) {
         $imagePath = public_path('uploads/additional_hobbies/' . $hobbie->image);
         if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
       AdditionalHobbie::find($id)->delete();
       return redirect()->route('additionalHobbie.index')->with('success','Addional Hobbie Delete Successfully');
    }
    
    public function edit(Request $request)
    {
        $hobbie= AdditionalHobbie::findOrFail($request->id);
        return view('admin::additional-hobbie.edit',compact('hobbie'));
    }
    
    public function update(Request $request,$id)
    {
       
        
       $validatedData = $request->validate([
            'additional_hobbie' => 'required|string',
            
        ]);
       
        $hobbie = AdditionalHobbie::findOrFail($request->id);
        if ($hobbie->image) {
            $oldImagePath = public_path('uploads/additional_hobbies/' . $hobbie->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
      
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/additional_hobbies'), $imageName);
        }
        
        $hobbie->update([
            'additional_hobbie' => $validatedData['additional_hobbie'],
            'image' => $imageName ?? $hobbie->image,
        ]);
    
        return redirect()->route('additionalHobbie.index')->with('success','Additional Hobbie Updated Successfully');
    }
    
}
