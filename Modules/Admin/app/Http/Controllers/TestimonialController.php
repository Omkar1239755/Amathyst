<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
class TestimonialController extends Controller
{
    
    public function index() {
     $testimonials = Testimonial::all();
     return view('admin::testimonial.index',compact('testimonials'));
    }
    
    
    public function create()
    {
        return view('admin::testimonial.create');
    }
    

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name'=> 'required',
            'position'=> 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/testimonial'), $imageName);
        }
    
        Testimonial::create([
            'description' => $validatedData['description'],
            'image' => $imageName ?? null,
        ]);
    
        return redirect()->route('testimonial.index')->with('success','Testimonial Created Successfully');
    }
    
    
    public function delete($id)
    {
        $testimonial=Testimonial::find($id);
        if ($testimonial && $testimonial->image) {
         $imagePath = public_path('uploads/testimonial/' . $testimonial->image);
         if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
       Testimonial::find($id)->delete();
       return redirect()->route('testimonial.index')->with('success','Testimonial Deleted Successfully');
    }
    
    public function edit(Request $request)
    {
        $testimonial= Testimonial::findOrFail($request->id);
        return view('admin::testimonial.edit',compact('testimonial'));
    }
    
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
            'position'=> 'required',
            'description' => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($request->id);
        if ($testimonial->image) {
            $oldImagePath = public_path('uploads/testimonial/' . $testimonial->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
      
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/testimonial'), $imageName);
        }
        
        $testimonial->update([
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'description' => $validatedData['description'],
            'image' => $imageName ?? $testimonial->image,
        ]);

        return redirect()->route('testimonial.index')->with('success','Testimonial Updated Successfully');
    }
    
}
