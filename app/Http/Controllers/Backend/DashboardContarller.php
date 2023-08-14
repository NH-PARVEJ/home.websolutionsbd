<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Models\Loan;
use App\Models\User;
use App\Models\Leave;
use App\Models\Project;
use App\Models\Target;
use DB;


class DashboardContarller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {

        $attendances        = Attendance::orderBy('id', 'asc')->get();
        $users              = User::orderBy('id', 'asc')->get();
        $loans              = Loan::orderBy('id', 'asc')->get();
        $leaves             = Leave::orderBy('id', 'asc')->get();
        $project            = Project::orderBy('id', 'asc')->where('status', '=', 1)->orWhere('status', '=', 2)->get();

        $sales_last_month   = Project::whereMonth('complete_date', Carbon::now())->get();

        return view('backend.pages.dashboard', compact('attendances', 'users', 'project', 'loans', 'leaves', 'sales_last_month'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
