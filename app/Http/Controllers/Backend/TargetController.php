<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Target;
use DB;


class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function target()
    {
        $targets = Target::orderBy('id', 'asc')->get();
        return view('backend.pages.target.manage', compact('targets',));
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $target = new Target;
        $target->month  = $request->month;
        $target->target = $request->target;

        $target->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $target = Target::find($id);
       if(!is_null($target)){
        return view('backend.pages.target.edit', compact('target'));
       }
       else{
        // 404
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Target::find($id);

        $target->month  = $request->month;
        $target->target = $request->target;

        $target->save();
        return redirect()->route('target.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Target::find($id);
        if(!is_null($target)){
            $target->delete();
            return redirect()->back();
        }
    }
}
