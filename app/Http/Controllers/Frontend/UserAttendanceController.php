<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class UserAttendanceController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function attendance()
    {
        $attendances = Attendance::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'asc')->get();
        return view('frontend.pages.attendance.manage', compact('attendances','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attendance = new Attendance;
        $userIP     = request()->ip();

        $attendance->status              = $request->status;
        $attendance->user_id             = $request->user_id;
        $attendance->ip_address          = $userIP;
        // $attendance->device               = $device;
        
        $attendance->save(); 
        Alert::success('Thank you!', 'Your Attendance Verification has been Submitted.'); 
        return redirect()->back();

    }
}
