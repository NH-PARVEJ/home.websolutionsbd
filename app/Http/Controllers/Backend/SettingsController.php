<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
Use Image;
Use File;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function settings()
    {
        $all_settings = Settings::orderBy('id', 'asc')->get(); 
        return view('backend.layout.template', compact('all_settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $settings = new Settings;

        if(File::exists(public_path('backend/assets/media/settings/' . $settings->logo))){
           File::delete(public_path('backend/assets/media/settings/' . $settings->logo));
            }
            if($request->logo){
                $image = $request->file('logo');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/assets/media/settings/' . $img);
                Image::make($image)->save($location);
                $settings->logo = $img;
            }
            
        $settings->save();  
        return redirect()->back();
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
