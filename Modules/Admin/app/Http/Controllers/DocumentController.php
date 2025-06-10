<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class DocumentController extends Controller
{
    
    public function index() {
         $roles = User::where('user_type',2)->get();
         return view('admin::document.index',compact('roles'));
    }
    
    public function status(Request $request)
    {
       
        if ($request->status == 1) {
            $user = User::find($request->user_id);
             if ($user && $user->id_image) {
              $id_documents = public_path('uploads/id_documents/' . $user->id_image);
              if (file_exists($id_documents)) {
                unlink($id_documents);
              }
            }
              
              if ($user && $user->id_selfie_image) {
              $id_selfie_image = public_path('uploads/selfies/' . $user->id_selfie_image);
              if (file_exists($id_selfie_image)) {
                unlink($id_selfie_image);
              }
                  
              }
            $user->id_selfie_image = null;
            $user->id_image = null;
            $user->save();
        }

        User::find($request->user_id)->update([
            'doc_status' =>$request->status
        ]);
        
        return response()->json([
            'success' =>'Status updated successfully'
        ]);
    }
}
