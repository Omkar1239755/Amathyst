<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonalTrait;
class PersonalTraitController extends Controller
{
    
    public function index() {
       $traits = PersonalTrait::all();
       return view('admin::personal-trait.index',compact('traits'));
    }
    
    public function create()
    {
      return view('admin::personal-trait.create');
    }
    

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'personal_trait' => 'required',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
      if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/personaltrait'), $imageName);
        }
    
        PersonalTrait::create([
            'personal_trait' => $validatedData['personal_trait'],
            'image' => $imageName ?? null,
        ]);
    
        return redirect()->route('personal-trait.index')->with('success','Trait Created Successfully');
    }
    
    
    public function delete($id)
    {
        $trait=PersonalTrait::find($id);
        if ($trait && $trait->image) {
         $imagePath = public_path('uploads/personaltrait/' . $trait->image);
         if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
       PersonalTrait::find($id)->delete();
       return redirect()->route('personal-trait.index')->with('success','Trait Deleted Successfully');
    }
    
    public function edit(Request $request)
    {
        $trait= PersonalTrait::findOrFail($request->id);
        return view('admin::personal-trait.edit',compact('trait'));
    }
    
    public function update(Request $request,$id)
    {
       
        $validatedData = $request->validate([
            'personal_trait' => 'required',
        ]);
       
        $trait = PersonalTrait::findOrFail($request->id);
        if ($trait->image) {
            $oldImagePath = public_path('uploads/personaltrait/' . $trait->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/personaltrait'), $imageName);
        }
        
           $trait->update([
            'personal_trait' => $validatedData['personal_trait'],
            'image' => $imageName ??$trait->image,
        ]);
    
        return redirect()->route('personal-trait.index')->with('success','Trait Updated Successfully');
    }
    
}
