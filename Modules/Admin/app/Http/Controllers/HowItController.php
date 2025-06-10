<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Howit;
class HowItController extends Controller
{
    
    public function index() {
         $howits = Howit::all();
         return view('admin::howit.index',compact('howits'));
    }
    
    
    public function create()
    {
        return view('admin::howit.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
           'description' => 'required|min:5|max:100',
        ]);
        
        Howit::create([
           'description' =>$request->description,
        ]);
    
        return redirect()->route('howIt.index')->with('success','How it Created Successfully');
    }
    
    
    public function delete($id)
    {
      Howit::find($id)->delete();
      return redirect()->route('howIt.index')->with('success','How it Deleted Successfully');
    }
    
    public function edit(Request $request)
    {
        $howit= Howit::findOrFail($request->id);
        return view('admin::howit.edit',compact('howit'));
    }
    
    public function update(Request $request,$id)
    {
        $request->validate([
            'description' => 'required|string|min:5|max:100',
        ]);

        
        Howit::find($request->id)->update([
            'description' => $request->description
        ]);
    
        return redirect()->route('howIt.index')->with('success','How it Updated Successfully');
    }
    
}
