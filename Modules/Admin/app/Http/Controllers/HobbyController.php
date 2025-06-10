<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hobbie;
class HobbyController extends Controller
{
    
    public function index() {
     $hobbies = Hobbie::all();
     return view('admin::hobbie.index',compact('hobbies'));
    }
    
    
    public function create()
    {
        return view('admin::hobbie.create');
    }
    

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'hobby_name' => 'required|string',
            'hobby_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('hobby_image')) {
            $image = $request->file('hobby_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/hobbies'), $imageName);
        }
    
        Hobbie::create([
            'hobbie' => $validatedData['hobby_name'],
            'image' => $imageName ?? null,
        ]);
    
        return redirect()->route('hobbie.index')->with('success','Hobbie Created Successfully');
    }
    
    
    public function delete($id)
    {
        $hobbie=Hobbie::find($id);
        if ($hobbie && $hobbie->image) {
         $imagePath = public_path('uploads/hobbies/' . $hobbie->image);
         if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
       Hobbie::find($id)->delete();
       return redirect()->route('hobbie.index')->with('success','Hobbie Deleted Successfully');
    }
    
    public function edit(Request $request)
    {
        $hobbie= Hobbie::findOrFail($request->id);
        return view('admin::hobbie.edit',compact('hobbie'));
    }
    
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'hobby_name' => 'required|string|min:5',
        ]);

        $hobbie = Hobbie::findOrFail($request->id);
        if ($hobbie->image) {
            $oldImagePath = public_path('uploads/hobbies/' . $hobbie->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
      
        if ($request->hasFile('hobby_image')) {
            $image = $request->file('hobby_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/hobbies'), $imageName);
        }
        
        $hobbie->update([
            'hobbie' => $validatedData['hobby_name'],
            'image' => $imageName ?? $hobbie->image,
        ]);

        return redirect()->route('hobbie.index')->with('success','Hobbie Updated Successfully');
    }
    
}
