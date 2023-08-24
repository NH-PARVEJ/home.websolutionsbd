<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use DB;
use File;
use Image;
use Auth;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {

        if(!empty(Auth::Check())){

            $attendances    = Attendance::orderBy('id', 'asc')->get();
            $users          = User::orderBy('id', 'asc')->get();
            $latest         = DB::table('attendances')->latest('id')->first();
            $projects       = Project::orderBy('id', 'asc')->get();     
            $designations   = Designation::orderBy('id', 'asc')->get();     
            $departments    = Department::orderBy('id', 'asc')->get();     
            return view('frontend.pages.dashboard', compact('attendances', 'latest', 'projects', 'users', 'designations', 'departments'));

        }
        else{
            return redirect()->route('login');
        }

   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_profile = User::find($id);
        return view('frontend.pages.profile.edit', compact('user_profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_profile = User::find($id);

        if(!is_null($user_profile)){

            if(empty($request->password)){

                    $user_profile->name         = $request->name;
                    $user_profile->email        = $request->email;
                    $user_profile->phone        = $request->phone;
                    $user_profile->address      = $request->address;
        

                    if(!empty($request->image)){
                     // delete image 
                    if(File::exists(public_path('backend/assets/media/user/' . $user_profile->image))){
                        File::delete(public_path('backend/assets/media/user/' . $user_profile->image));
                       }

                        if($request->image){
                            $image = $request->file('image');
                            $img = time() . '.' . $image->getClientOriginalExtension();
                            $location = public_path('backend/assets/media/user/' . $img);
                            Image::make($image)->save($location);
                            $user_profile->image = $img;
                        }
                    }
                    
               
            
                    $user_profile->save();  
                    return redirect()->route('user.dashboard');
        
                }


            
            else{
                if($request->password == $request->repeat_password){
                    $user_profile->password     = Hash::make($request->password);
                    
                    $user_profile->name         = $request->name;
                    $user_profile->email        = $request->email;
                    $user_profile->phone        = $request->phone;
                    $user_profile->address      = $request->address;
        
                    if(!empty($request->image)){
                        // delete image 
                       if(File::exists(public_path('backend/assets/media/user/' . $user_profile->image))){
                           File::delete(public_path('backend/assets/media/user/' . $user_profile->image));
                          }
   
                           if($request->image){
                               $image = $request->file('image');
                               $img = time() . '.' . $image->getClientOriginalExtension();
                               $location = public_path('backend/assets/media/user/' . $img);
                               Image::make($image)->save($location);
                               $user_profile->image = $img;
                           }
                       }
               
            
                    $user_profile->save();  
                    return redirect()->route('user.dashboard');
        
                }
            }
        }


    else{

        // 404 Page
    }
}

}
