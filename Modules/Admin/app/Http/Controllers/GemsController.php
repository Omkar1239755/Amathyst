<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gem;
use App\Models\GemPackage;


class GemsController extends Controller
{
  
    public function GemsView(){
       $gem = Gem::first();  
       return view('admin::gems.gems',compact('gem'));
        
    }
    
    public function GemsStore(request $request){
        $request->validate([
        'dollar' => 'required|numeric|min:1',
        'gems' => 'required|integer|min:1',
    ]);

        $gem = Gem::first(); 
        if($gem) {
            $gem->Dollar = $request->dollar;
            $gem->gems = $request->gems;
            $gem->save();
        } else {
            Gem::create([
                'Dollar' => $request->dollar,
                'gems' => $request->gems,
            ]);
        }

    return redirect()->back()->with('success', 'Gem value updated successfully.');
        
    }
    
    
    //********************************************************gems package*********************************************************************************************************
    
    
    public function GemsPackage(){
        $data= GemPackage::all();
        return view('admin::gems-package.gemspackage', compact('data'));
    }
    
    public function createGemsPackage(){
 
    return view('admin::gems-package.create-gemspackage');
        
    }
    
    public function gemsPackageStore(request $request){
     
       $request->validate([
            'Gemscount' => 'required',
            'Amount' => 'required',
        ]);
          
         
        GemPackage::create([
            'No of gems' => $request->Gemscount,
            'Amount' =>$request->Amount,
        ]);
        
         return redirect()->route('gemsPackage')->with('success','Package Created Successfully');
    }
    
    public function edit(Request $request){
    $data = GemPackage::findOrFail($request->id);
    
    return view('admin::gems-package.edit',compact('data'));
        
    }
    
     public function update(Request $request,$id)
    {
         $request->validate([
            'gemscount' => 'required',
            'Amount' => 'required',
        ]);

        
        GemPackage::find($request->id)->update([
            'No of gems' => $request->gemscount,
            'Amount' => $request->Amount
        ]);
    
        return redirect()->route('gemsPackage')->with('success','Package Updated Successfully');
    }
    
    
    
}
