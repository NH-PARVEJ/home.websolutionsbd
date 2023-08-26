<?php

namespace App\Http\Controllers\Backend;

use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Auth;



class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function attendance()
    {
        $all_attendances         = Attendance::orderBy('id', 'asc')->get();
        $users                   = User::orderBy('id', 'asc')->get();
        $today_attendances       = Attendance::whereDate('created_at', now()->today())->get();
        $this_month_attendances  = Attendance::whereMonth('created_at', now()->month)->get();
        $last_month_attendances  = Attendance::query()->whereDate('created_at', now()->subMonth())->get();
        

        return view('backend.pages.attendance.manage', compact('all_attendances', 'today_attendances', 'last_month_attendances', 'this_month_attendances' ,'users'));
    }


    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance = Attendance::find($id);
        if(!is_null($attendance)){
            $attendance->delete();
            Alert::warning('Successfully Deleted', 'Attendance has been Successfully Deleted.');
            return redirect()->back();
        }
    }

}
