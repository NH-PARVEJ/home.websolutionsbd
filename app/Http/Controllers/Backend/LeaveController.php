<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Leave;


class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin_leave()
    {
        $leaves = Leave::orderBy('id','asc')->get();
        $users  = User::orderBy('id','asc')->get();
        return view('backend.pages.leave.manage', compact('leaves', 'users'));
    }


        /**
     * Display a listing of the resource.
     */
    public function user_leave()
    {
        $leaves = Leave::orderBy('id','asc')->get();
        $users  = User::orderBy('id','asc')->get();

        return view('frontend.pages.leave.manage', compact('leaves', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $leave = new Leave;

        $leave->start_date    = $request->start_date;
        $leave->end_date      = $request->end_date;
        $leave->total_day     = $request->total_day;
        $leave->reason        = $request->reason;
        $leave->type          = $request->type;
        $leave->status        = $request->status;
        $leave->user_id       = $request->user_id;

        $leave->save();
        Alert::success('Thank you!', 'your Leave Application has been Successfully Submitted.');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function user_edit(string $id)
    {
        $leave = Leave::find($id);
        if(!is_null($leave)){
        return view('frontend.pages.leave.edit',compact('leave'));
        }
    }


        /**
     * Show the form for editing the specified resource.
     */
    public function admin_edit(string $id)
    {
        $leave = Leave::find($id);
        if(!is_null($leave)){
        return view('backend.pages.leave.edit',compact('leave'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function user_update(Request $request, string $id)
    {
        $leave = Leave::find($id);
        if(!is_null($leave)){

            $leave->start_date    = $request->start_date;
            $leave->end_date      = $request->end_date;
            $leave->total_day     = $request->total_day;
            $leave->reason        = $request->reason;
            $leave->type          = $request->type;    
            $leave->save();

            Alert::info('Thank you!', 'your Leave Application has been Successfully Updated.');

            return redirect()->route('user.leave.manage');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function admin_update(Request $request, string $id)
    {
        $leave = Leave::find($id);
        if(!is_null($leave)){

            $leave->start_date    = $request->start_date;
            $leave->end_date      = $request->end_date;
            $leave->total_day     = $request->total_day;
            $leave->reason        = $request->reason;
            $leave->type          = $request->type; 
            $leave->status        = $request->status;    
            $leave->save();
            Alert::info('Thank you!', 'Leave Application has been Successfully Updated.');
            return redirect()->route('admin.leave.manage');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function user_destroy(string $id)
    {
        $leave = Leave::find($id);
        if(!is_null($leave)){
            $leave->delete();

            Alert::warning('Successfully Deleted', 'Your Leave Application has been Successfully Deleted.');
            return redirect()->route('user.leave.manage');
        }
        
    }

        /**
     * Remove the specified resource from storage.
     */
    public function admin_destroy(string $id)
    {
        $leave = Leave::find($id);
        if(!is_null($leave)){
            $leave->delete();
            Alert::warning('Successfully Deleted', 'Leave Application has been Successfully Deleted.');
            return redirect()->back();
        }
    }
}
