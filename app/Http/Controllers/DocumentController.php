<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Document,User};
use Illuminate\Support\Facades\Auth;
class DocumentController extends Controller
{
   public function index()
   {
       return view('companion.document.index');
   }
   public function reupload(Request $request)
   {
       return view('companion.document.reupload');
   }
   public function reuploadstore(Request $request)
   {
        $request->validate([
          'id_image' =>'required',
          'id_selfie_image'  =>'required',
        ]);
        
        if($request->hasFile('id_image')) {
            $image = $request->file('id_image');
            $idimage = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/id_documents'), $idimage);
        }
        
        
         if($request->hasFile('id_selfie_image')) {
            $image = $request->file('id_selfie_image');
            $selfieimage = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/selfies'), $selfieimage);
        }
        
        User::find(Auth::User()->id)->update([
          'id_image' =>$idimage,
          'id_selfie_image' =>$selfieimage,
          'doc_status' =>'0'
        ]);
            
        return redirect()->route('document.index')->with('success','Document Uploaded Successfully');   
   }
}
