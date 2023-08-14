<?php

namespace App\Http\Controllers\Backend;

use Phattarachai\LaravelMobileDetect\Agent;

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
        $attendances = Attendance::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'asc')->get();
        return view('backend.pages.attendance.manage', compact('attendances','users'));
    }

}
