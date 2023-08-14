<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use RealRashid\SweetAlert\Facades\Alert;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function designation()
    {
        $designations = Designation::orderBy('id', 'asc')->get();
        return view('backend.pages.designation.manage', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $designations = new Designation;

        $designations->designation  =  $request->designation;

        $designations->save();
        Alert::success('Thank you!', 'Designation has been Successfully Added.'); 
        return redirect()->route('designation.manage');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $designation = Designation::find($id);
        if(!is_null($designation)){
        return view('backend.pages.designation.edit',compact('designation'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $designation_update = Designation::find($id);

        if(!is_null($designation_update)){

            $designation_update->designation  =  $request->designation;

            $designation_update->save();
            Alert::info('Thank you!', 'Designation has been Successfully Updated.');
            return redirect()->route('designation.manage');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $designation = Designation::find($id);
        if(!is_null($designation)){
            $designation->delete();
            Alert::warning('Successfully Deleted', 'Designation has been Successfully Deleted.');
            return redirect()->back();
        }
    }
}
