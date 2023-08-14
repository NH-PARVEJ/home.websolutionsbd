<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function department()
    {
        $departments = Department::orderBy('id', 'asc')->get();
        return view('backend.pages.department.manage', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departments = new Department;

        $departments->department  =  $request->department;

        $departments->save();
        Alert::success('Thank you!', 'Department has been Successfully Added.'); 
        return redirect()->route('department.manage');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::find($id);
        if(!is_null($department)){
        return view('backend.pages.department.edit',compact('department'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department_update = Department::find($id);

        if(!is_null($department_update)){

            $department_update->department  =  $request->department;

            $department_update->save();
            Alert::info('Thank you!', 'Department has been Successfully Updated.');
            return redirect()->route('department.manage');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::find($id);
        if(!is_null($department)){
            $department->delete();
            Alert::warning('Successfully Deleted', 'Department has been Successfully Deleted.');
            return redirect()->back();
        }
    }
}
