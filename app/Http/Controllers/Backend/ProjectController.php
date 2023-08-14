<?php

namespace App\Http\Controllers\Backend;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function user_project()
    {    $users     = User::orderBy('id', 'asc')->get();
        $projects   = Project::orderBy('id', 'asc')->get();
        return view('frontend.pages.project.manage',compact('users','projects'));//
    }

        /**
     * Display a listing of the resource.
     */
    public function admin_project()
    {
        $users     = User::orderBy('id', 'asc')->get();
        $projects  = Project::orderBy('id', 'asc')->get();

        return view('backend.pages.project.manage',compact('users','projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users  = User::orderBy('id', 'asc')->get();
        return view('backend.pages.project.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = new Project;

        $project->website_login_url     = $request->website_login_url;
        $project->user_name             = $request->user_name;
        $project->password              = $request->password;
        $project->server_url            = $request->server_url;
        $project->server_user_name      = $request->server_user_name;
        $project->server_password       = $request->server_password;
        $project->reference_website     = $request->reference_website;
        $project->requirements          = $request->requirements;
        $project->start_date            = $request->start_date;
        $project->delivery_date         = $request->delivery_date;
        $project->project_price         = $request->project_price;
        $project->source                = $request->source;
        $project->handle_by             = $request->handle_by;
        $project->assign_to             = $request->assign_to;
        $project->complete_date         = $request->complete_date;
        $project->client_name           = $request->client_name;
        $project->status                = $request->status;

        $project->save();
        Alert::success('Thank you!', 'Project has been Successfully Added.'); 
        return redirect()->route('admin.project.manage');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users    = User::orderBy('id', 'asc')->get();
        $project  = Project::find($id);
        if(!is_null($project)){
            return view('backend.pages.project.edit', compact('project', 'users'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project  = Project::find($id);

        if(!is_null($project)){

            $project->website_login_url     = $request->website_login_url;
            $project->user_name             = $request->user_name;
            $project->password              = $request->password;
            $project->server_url            = $request->server_url;
            $project->server_user_name      = $request->server_user_name;
            $project->server_password       = $request->server_password;
            $project->reference_website     = $request->reference_website;
            $project->requirements          = $request->requirements;
            $project->start_date            = $request->start_date;
            $project->delivery_date         = $request->delivery_date;
            $project->project_price         = $request->project_price;
            $project->source                = $request->source;
            $project->handle_by             = $request->handle_by;
            $project->assign_to             = $request->assign_to;
            $project->complete_date         = $request->complete_date;
            $project->client_name           = $request->client_name;
            $project->status                = $request->status;
    
            $project->save();
            Alert::info('Thank you!', 'Project has been Successfully Updated.'); 
            return redirect()->route('admin.project.manage');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if(!is_null($project)){
            $project->delete();
            Alert::warning('Successfully Deleted', 'Project has been Successfully Deleted.');
            return redirect()->back();
        }
    }
}
