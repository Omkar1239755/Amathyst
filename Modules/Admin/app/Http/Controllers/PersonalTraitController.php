<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonalTrait;

class PersonalTraitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}

        public function personaltraitsView() {
            $data = PersonalTrait::all();

            return view('admin::admin.personal-trait',compact('data'));       
            }
    
        public function personaltraitsViewStore(Request $request)
        {  
            // Validate the incoming data
            $validatedData = $request->validate([
                'trait_name' => 'required'
                
            ]);
    
            // Check if the request has a file and process the image
            if ($request->hasFile('trait_image')) {
                $image = $request->file('trait_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/personaltrait'), $imageName);
            }
        
    
            // Save data to database
            PersonalTrait::create([
                'personal_trait' => $validatedData['trait_name'],
                'image' => $imageName ?? null,
            ]);
        
            // Return a success response
            return response()->json([
                'success' => true,
                'message' => 'Personal Traits added successfully!',
            ]);
        }
        
    



}
