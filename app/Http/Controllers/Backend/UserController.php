<?php

namespace App\Http\Controllers\Backend;

use Auth;
use File;
use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Models\Loan;
use App\Models\Project;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{


    
    /**
     * Show the form for creating a new resource.
     */
    public function user_control_panel()
    {
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return redirect('admin/dashboard');
            }
            else{
                return redirect('user/dashboard');
            }
        }
        else{
            return redirect('login');
        }


    }


        
    /**
     * Show the form for creating a new resource.
     */
    public function user_profile($id)
    {
        $single_user  = User::find($id);
        $users        = User::orderBy('id', 'asc')->get();
        $leaves       = Leave::orderBy('id', 'asc')->get();
        $loans        = Loan::orderBy('id', 'asc')->get();
        $projects     = Project::orderBy('id', 'asc')->get();
        $attendances  = Attendance::orderBy('id', 'asc')->get();
        $designations = Designation::orderBy('id', 'asc')->get();
        $departments  = Department::orderBy('id', 'asc')->get();

        $project_current_month      = Project::whereMonth('complete_date', Carbon::now())->get();
        $project_last_month         = Project::query()->whereDate('complete_date', now()->subMonth())->get();
        $project_this_year          = Project::whereYear('complete_date', date('Y'))->get();

        $leave_current_month        = Leave::whereMonth('end_date', Carbon::now())->get();
        $leave_last_month           = Leave::query()->whereDate('end_date', now()->subMonth())->get();
        $leave_this_year            = Leave::whereYear('end_date', date('Y'))->get();

        $attendance_current_month   = Attendance::whereMonth('created_at', Carbon::now())->get();
        $last_month_attendances     = Attendance::query()->whereDate('created_at', now()->subMonth())->get();
        $This_Year_attendances      = Attendance::whereYear('created_at', date('Y'))->get();

        if(!is_null($single_user)){
        $This_Year_attendances      = Attendance::whereYear('created_at', date('Y'))->get();
            return view('backend.pages.user.manage', compact('single_user', 'users' ,'attendances', 'leaves', 'loans', 'projects', 'project_current_month', 'project_last_month', 'project_this_year', 'leave_current_month', 'leave_last_month', 'leave_this_year', 'attendance_current_month', 'last_month_attendances', 'This_Year_attendances', 'designations', 'departments'));
        }

    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments  = Department::orderBy('id', 'asc')->get();
        $designations = Designation::orderBy('id', 'asc')->get();
        return view('backend.pages.user.create', compact('departments','designations'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        
        if($request->password == $request->repeat_password){

            $user->password     = Hash::make($request->password);
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone        = $request->phone;
            $user->gender       = $request->gender;
            $user->role         = $request->role;
            $user->address      = $request->address;
            $user->status       = $request->status;
            $user->designation  = $request->designation;
            $user->department   = $request->department;

            if($request->image){
                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/assets/media/user/' . $img);
                Image::make($image)->save($location);
                $user->image = $img;
            }
    
            $user->save();
            Alert::success('Thank you!', ' New Employee Successfully Registered.');

            return redirect()->back();

        }



       }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user         = User::find($id);
        $departments  = Department::orderBy('id', 'asc')->get();
        $designations = Designation::orderBy('id', 'asc')->get();

        if(!is_null($user)){
            return view('backend.pages.user.edit', compact('user', 'departments', 'designations'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if(!is_null($user)){

            if(empty($request->password)){

                    $user->name         = $request->name;
                    $user->email        = $request->email;
                    $user->phone        = $request->phone;
                    $user->gender       = $request->gender;
                    $user->role         = $request->role;
                    $user->address      = $request->address;
                    $user->status       = $request->status;
                    $user->designation  = $request->designation;
                    $user->department   = $request->department;

                    // image action Start
                    if(!empty($request->image)){
                    // delete image 
                    if(File::exists(public_path('backend/assets/media/user/' . $user->image))){
                        File::delete(public_path('backend/assets/media/user/' . $user->image));
                       }
                        if($request->hasFile('image')){
                            $image = $request->file('image');
                            $img = time() . '.' . $image->getClientOriginalExtension();
                            $location = public_path('backend/assets/media/user/' . $img);
                            Image::make($image)->save($location);
                            $user->image = $img;
                        }
                    }
                     // image action End
    
                     $user->save();
                     Alert::info('Thank you!', 'Successfully Updated.'); 
                     return redirect()->route('admin.dashboard');
            }  
                     
            else{

                    if($request->password == $request->repeat_password){
                        $user->password     = Hash::make($request->password); 
            
                        $user->name         = $request->name;
                        $user->email        = $request->email;
                        $user->phone        = $request->phone;
                        $user->gender       = $request->gender;
                        $user->role         = $request->role;
                        $user->address      = $request->address;
                        $user->status       = $request->status;
                        $user->designation  = $request->designation;
                        $user->department   = $request->department;
            
                          // image action Start
                          if(!empty($request->image)){
                          // delete image 
                          if(File::exists(public_path('backend/assets/media/user/' . $user->image))){
                            File::delete(public_path('backend/assets/media/user/' . $user->image));
                           }
                            if($request->hasFile('image')){
                                $image = $request->file('image');
                                $img = time() . '.' . $image->getClientOriginalExtension();
                                $location = public_path('backend/assets/media/user/' . $img);
                                Image::make($image)->save($location);
                                $user->image = $img;
                            }
                          }
                         // image action End
                        }             

                }
                
                        $user->save();
                        Alert::info('Thank you!', 'Successfully Updated.'); 
                        return redirect()->route('admin.dashboard');
                        
                    
                

            }
        

      

else{
    // 404 page 
}

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!is_null($user)){
            $user->delete();
            Alert::warning('Successfully Deleted', 'User has been Successfully Deleted.');
            return redirect()->back();
        }
    }
}
