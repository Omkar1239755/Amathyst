<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    
    public function index() {
     $faqs = Faq::all();
     return view('admin::faq.index',compact('faqs'));
    }
    
    
    public function create()
    {
        return view('admin::faq.create');
    }
    

    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|min:5',
            'description' => 'required|min:5',
        ]);
        
        Faq::create([
            'title' => $request->title,
            'description' =>$request->description,
        ]);
    
        return redirect()->route('faq.index')->with('success','Faq Created Successfully');
    }
    
    
    public function delete($id)
    {
      Faq::find($id)->delete();
      return redirect()->route('faq.index')->with('success','Faq Deleted Successfully');
    }
    
    public function edit(Request $request)
    {
        $faq= Faq::findOrFail($request->id);
        return view('admin::faq.edit',compact('faq'));
    }
    
    public function update(Request $request,$id)
    {
         $request->validate([
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:5',
        ]);

        
        Faq::find($request->id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
    
        return redirect()->route('faq.index')->with('success','Faq Updated Successfully');
    }
    
}
