@extends('backend.layout.template')
@section('body_content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
   <!--begin::Content wrapper-->
   <div class="d-flex flex-column flex-column-fluid">
      <!--begin::Content-->
      <div id="kt_app_content" class="app-content flex-column-fluid">
         <!--begin::Content container-->
         <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xxl-8">
               <div class="card-body pt-9 pb-5">
                  <!--begin::Details-->
                  <div class="d-flex flex-wrap flex-sm-nowrap">
                     <!--begin: Pic-->
                     <div  class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                           @if(!empty(Auth::user()->image))
                           <img src="{{asset('backend/assets/media/user/'. Auth::user()->image)}}" alt="user" />
                           @else
                           <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
                           @endif
                        </div>
                     </div>
                     <!--end::Pic-->
                     <!--begin::Info-->
                     <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                           <!--begin::User-->
                           <div class="d-flex flex-column">
                              <!--begin::Name-->
                              <div class="d-flex align-items-center mb-2">
                                 <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                 @php
                                 $time = date("H");
                                 $timezone = date("e");
                                 @endphp
                                 @if ($time < "12")
                                 Good morning 
                                 <span class="text-danger">@php echo ucfirst(strtolower(Auth::user()->name)); @endphp</span>
                                 @elseif ($time >= "12" && $time < "17")
                                 Good afternoon
                                 <span class="text-danger">@php echo ucfirst(strtolower(Auth::user()->name)); @endphp</span>
                                 @elseif ($time >= "17" && $time < "19")
                                 Good evening
                                 <span class="text-danger">@php echo ucfirst(strtolower(Auth::user()->name)); @endphp</span>
                                 @elseif ($time >= "19")
                                 Good night
                                 <span class="text-danger">@php echo ucfirst(strtolower(Auth::user()->name)); @endphp</span>
                                 @endif   
                                 </a>
                                 <a href="#">
                                 <i class="ki-outline ki-verify fs-1 text-primary"></i>
                                 </a>
                              </div>
                              <!--end::Name-->
                              <!--begin::Info-->
                              <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                 <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                 <i class="ki-outline ki-profile-circle fs-4 me-1"></i>
                                 {{Auth::user()->designation}}
                                 </a>
                                 <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                 <i class="ki-outline ki-geolocation fs-4 me-1"></i>{{Auth::user()->address}}</a>
                                 <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                 <i class="ki-outline ki-sms fs-4 me-1"></i>{{Auth::user()->email}}</a>
                              </div>
                              <!--end::Info-->
                           </div>
                           <!--end::User-->
                           <!--begin::Actions-->
                           <div class="d-flex my-4">
                              <!--begin::Follow-->
                              <form action="{{route('user.attendance.store')}}" method="POST">
                                 @csrf
                                 @php
                                 $time = date('H:i:s');
                                 @endphp
                                 <input type="radio" value="1" name="status" id="option-1">
                                 <input type="radio" value="2" name="status" id="option-2">
                                 <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                 <span>
                                    @if($time >= '10:00:00' AND $time < '22:00:00')
                                    <label for="option-1"  class="btn btn-sm btn-primary me-3 btn btn-sm btn-primary btn-flex btn-center">
                                       <div class="dot"></div>
                                       <span>Clock In</span>
                                    </label>
                                    <label for="option-2" class="btn btn-sm btn-primary me-3 btn btn-sm btn-danger btn-flex btn-center">
                                       <div class="dot"></div>
                                       <span>Clock Out</span>
                                    </label>
                                    @else
                                    <span class="alert alert-danger border-dashed border-danger">Check-in and check-out are currently not permitted at this time.</span>
                                    @endif
                                 </span>
                              </form>
                              <!--end::Follow--> 
                           </div>
                           <!--end::Actions-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack">
                           <!--begin::Wrapper-->
                           <div class="d-flex flex-column flex-grow-1 pe-8">
                              <!--begin::Stats-->
                              <div class="d-flex flex-wrap">
                                 <!--begin::Label-->
                                 <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                       <i class="ki-outline ki-check fs-3 text-success me-2"></i>
                                       <div class="fs-2 fw-bold">
                                          @if(!empty($latest->created_at))
                                          {{Carbon\Carbon::parse($latest->created_at)->format('h:i:s A')}}
                                          @else
                                          00 : 00
                                          @endif
                                       </div>
                                    </div>
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-400">Your Last Attendance</div>
                                    <!--end::Label-->
                                 </div>
                                 <!--begin::Stat-->
                                 <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                       <i class="ki-outline fa-percent fs-3 text-success mb-1 me-2"></i>
                                       <div class="fs-2 fw-bold">
                                          @php
                                          $total_project = 0;
                                          $complete_project = 0;
                                          @endphp
                                          @foreach($projects as $project)
                                          @if(Auth::user()->id == $project->assign_to)
                                          @php
                                          $total_project++;
                                          @endphp
                                          @if($project->status == 4)
                                          @php 
                                          $complete_project++; 
                                          @endphp
                                          @endif
                                          @endif
                                          @endforeach
                                          @php
                                          if(!empty($total_project)){
                                          $complete = 100 / $total_project * $complete_project;
                                          echo $complete;
                                          }
                                          else{
                                          echo '00';
                                          }
                                          @endphp
                                       </div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-400">Completed Project</div>
                                    <!--end::Label-->
                                 </div>
                                 <!--end::Stat-->
                                 <!--begin::Stat-->
                                 <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                       <i class="ki-outline fa-percent fs-3 text-danger mb-1 me-2"></i>
                                       <div class="fs-2 fw-bold">
                                          @php
                                          $total_project = 0;
                                          $cancel_project = 0;
                                          @endphp
                                          @foreach($projects as $project)
                                          @if(Auth::user()->id == $project->assign_to)
                                          @php
                                          $total_project++;
                                          @endphp
                                          @if($project->status == 3)
                                          @php 
                                          $cancel_project++; 
                                          @endphp
                                          @endif
                                          @endif
                                          @endforeach
                                          @php
                                          if(!empty($total_project)){
                                          $cancel = 100 / $total_project * $cancel_project;
                                          echo $cancel;
                                          }
                                          else{
                                          echo '00';
                                          }
                                          @endphp
                                       </div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-400">Cancel Project</div>
                                    <!--end::Label-->
                                 </div>
                                 <!--end::Stat-->
                              </div>
                              <!--end::Stats-->
                           </div>
                           <!--end::Wrapper-->
                        </div>
                        <!--end::Stats-->
                     </div>
                     <!--end::Info-->
                  </div>
                  <!--end::Details-->
               </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Row-->
            <div class="row g-6 g-xl-9">
               <!--begin::Col-->
               <div class="col-lg-6">
                  <!--begin::Summary-->
                  <div class="card card-flush h-lg-100">
                     <!--begin::Card header-->
                     <div class="card-header mt-6">
                        <!--begin::Card title-->
                        <div class="card-title flex-column">
                           <h3 class="fw-bold mb-1">Project Summary</h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                           <a href="{{route('user.project.manage')}}" class="btn btn-light btn-sm">View Project</a>
                        </div>
                        <!--end::Card toolbar-->
                     </div>
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body p-9 pt-5">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-wrap">
                           <!--begin::Chart-->
                           <div class="position-relative d-flex flex-center h-175px w-175px me-15 mb-7">
                              <div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
                                 <span class="fs-2qx fw-bold">
                                 @php
                                 $total = 0;
                                 @endphp
                                 @foreach($projects as $project)
                                 @if(Auth::user()->id == $project->assign_to)
                                 @php 
                                 $total++; 
                                 @endphp
                                 @endif
                                 @endforeach
                                 {{$total}}
                                 </span>
                                 <span class="fs-6 fw-semibold text-gray-400">Total Project</span>
                              </div>
                              <canvas id="project_overview_chart"></canvas>
                           </div>
                           <!--end::Chart-->
                           <!--begin::Labels-->
                           <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                              <!--begin::Label-->
                              <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                 <div class="bullet bg-primary me-3"></div>
                                 <div class="text-gray-400">Active</div>
                                 <div class="ms-auto fw-bold text-gray-700">
                                    @php 
                                    $active = 0; 
                                    @endphp
                                    @foreach($projects as $project)
                                    @if(Auth::user()->id == $project->assign_to)
                                    @if($project->status == 1 OR $project->status == 2)
                                    @php 
                                    $active++; 
                                    @endphp
                                    @endif
                                    @endif
                                    @endforeach
                                    <div class="badge rounded-pill text-white bg-primary">{{$active}}</div>
                                 </div>
                              </div>
                              <!--end::Label-->
                              <!--begin::Label-->
                              <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                 <div class="bullet bg-warning me-3"></div>
                                 <div class="text-gray-400">Revision</div>
                                 <div class="ms-auto fw-bold text-gray-700">
                                    @php 
                                    $revision = 0; 
                                    @endphp
                                    @foreach($projects as $project)
                                    @if(Auth::user()->id == $project->assign_to)
                                    @if($project->status == 2)
                                    @php 
                                    $revision++; 
                                    @endphp
                                    @endif
                                    @endif
                                    @endforeach
                                    <div class="badge rounded-pill text-white bg-warning">{{$revision}}</div>
                                 </div>
                              </div>
                              <!--end::Label-->
                              <!--begin::Label-->
                              <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                 <div class="bullet bg-danger me-3"></div>
                                 <div class="text-gray-400">Cancel</div>
                                 <div class="ms-auto fw-bold text-gray-700">
                                    @php 
                                    $cancel = 0; 
                                    @endphp
                                    @foreach($projects as $project)
                                    @if(Auth::user()->id == $project->assign_to)
                                    @if($project->status == 3)
                                    @php 
                                    $cancel++; 
                                    @endphp
                                    @endif
                                    @endif
                                    @endforeach
                                    <div class="badge rounded-pill text-white bg-danger">{{$cancel}}</div>
                                 </div>
                              </div>
                              <!--end::Label-->
                              <!--begin::Label-->
                              <div class="d-flex fs-6 fw-semibold align-items-center">
                                 <div class="bullet bg-success me-3"></div>
                                 <div class="text-gray-400">Completed</div>
                                 <div class="ms-auto fw-bold text-gray-700">
                                    @php 
                                    $completed = 0; 
                                    @endphp
                                    @foreach($projects as $project)
                                    @if(Auth::user()->id == $project->assign_to)
                                    @if($project->status == 4)
                                    @php 
                                    $completed++; 
                                    @endphp
                                    @endif
                                    @endif
                                    @endforeach
                                    <div class="badge rounded-pill text-white bg-success">{{$completed}}</div>
                                 </div>
                              </div>
                              <!--end::Label-->
                           </div>
                           <!--end::Labels-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                           <!--begin::Wrapper-->
                           <div class="d-flex flex-stack flex-grow-1">
                              <!--begin::Content-->
                              <div class="fw-semibold">
                                 <div class="fs-6 text-gray-700">
                                    <a href="#" class="fw-bold me-1"></a>Your outstanding performance deserves heartfelt compliments.
                                 </div>
                              </div>
                              <!--end::Content-->
                           </div>
                           <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                     </div>
                     <!--end::Card body-->
                  </div>
                  <!--end::Summary-->
               </div>
               <!--end::Col-->
               <!--begin::Col-->
               <div class="col-lg-6">
                  <!--begin::List widget 20-->
                  <div class="card h-xl-100">
                     <!--begin::Header-->
                     <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                           <span class="card-label fw-bold text-dark">Profile Info</span>
                        </h3>
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                           <a href="{{route('user.profile.edit', Auth::user()->id)}}" class="btn btn-sm btn-light">Update Your Profile</a>
                        </div>
                        <!--end::Toolbar-->
                     </div>
                     <!--end::Header-->
                     <!--begin::Body-->
                     <div class="card-body pt-6">
                        <!--end::Item-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-4"></div>
                        <!--end::Separator-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                           <!--begin::Symbol-->
                           <div class="symbol symbol-40px me-4">
                              <div class="symbol-label fs-2 fw-semibold bg-warning text-inverse-warning">D</div>
                           </div>
                           <!--end::Symbol-->
                           <!--begin::Section-->
                           <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                              <!--begin:Author-->
                              <div class="flex-grow-1 me-2">
                                 <a class="text-gray-800 text-hover-primary fs-6 fw-bold">Department</a>
                                 <span class="text-muted fw-semibold d-block fs-7">
                                 {{Auth::user()->department}}
                                 </span>
                              </div>
                              <!--end:Author-->
                              <!--begin::Actions-->
                              <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                              <i class="ki-outline ki-category fs-2"></i>
                              </a>
                              <!--begin::Actions-->
                           </div>
                           <!--end::Section-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-4"></div>
                        <!--end::Separator-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                           <!--begin::Symbol-->
                           <div class="symbol symbol-40px me-4">
                              <div class="symbol-label fs-2 fw-semibold bg-info text-inverse-info">A</div>
                           </div>
                           <!--end::Symbol-->
                           <!--begin::Section-->
                           <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                              <!--begin:Author-->
                              <div class="flex-grow-1 me-2">
                                 <a class="text-gray-800 text-hover-primary fs-6 fw-bold">Address</a>
                                 <span class="text-muted fw-semibold d-block fs-7">{{Auth::user()->address}}</span>
                              </div>
                              <!--end:Author-->
                              <!--begin::Actions-->
                              <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                              <i class="ki-outline ki-geolocation fs-2"></i>
                              </a>
                              <!--begin::Actions-->
                           </div>
                           <!--end::Section-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-4"></div>
                        <!--end::Separator-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                           <!--begin::Symbol-->
                           <div class="symbol symbol-40px me-4">
                              <div class="symbol-label fs-2 fw-semibold bg-success text-inverse-success">P</div>
                           </div>
                           <!--end::Symbol-->
                           <!--begin::Section-->
                           <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                              <!--begin:Author-->
                              <div class="flex-grow-1 me-2">
                                 <a href="{{Auth::user()->phone}}" class="text-gray-800 text-hover-primary fs-6 fw-bold">Phone</a>
                                 <span class="text-muted fw-semibold d-block fs-7">{{Auth::user()->phone}}</span>
                              </div>
                              <!--end:Author-->
                              <!--begin::Actions-->
                              <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                              <i class="ki-outline ki-phone fs-2"></i>
                              </a>
                              <!--begin::Actions-->
                           </div>
                           <!--end::Section-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-4"></div>
                        <!--end::Separator-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                           <!--begin::Symbol-->
                           <div class="symbol symbol-40px me-4">
                              <div class="symbol-label fs-2 fw-semibold bg-dark text-inverse-dark">G</div>
                           </div>
                           <!--end::Symbol-->
                           <!--begin::Section-->
                           <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                              <!--begin:Author-->
                              <div class="flex-grow-1 me-2">
                                 <a class="text-gray-800 text-hover-primary fs-6 fw-bold">Gender</a>
                                 <span class="text-muted fw-semibold d-block fs-7">
                                 @if(Auth::user()->gender == 1)
                                 Male
                                 @elseif(Auth::user()->gender == 2)
                                 Female
                                 @endif
                                 </span>
                              </div>
                              <!--end:Author-->
                              <!--begin::Actions-->
                              <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                              <i class="ki-outline ki-user fs-2"></i>
                              </a>
                              <!--begin::Actions-->
                           </div>
                           <!--end::Section-->
                        </div>
                        <!--end::Item-->
                     </div>
                     <!--end::Body-->
                  </div>
                  <!--end::List widget 20-->
               </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="row g-6 mt-2 g-xl-9">
               <div class="col-lg-12 g-6">
                  <!--begin::Table widget 6-->
                  <div class="card card-flush h-md-100">
                     <!--begin::Card body-->
                     <div class="card-body">
                        <!--begin::Table-->
                        <table id="datatable" class="table table-hover table-striped table-bordered" style="width:100%">
                           <thead>
                              <tr>
                                 <th>#SL</th>
                                 <th>Name</th>
                                 <th>Date</th>
                                 <th>Time</th>
                                 <th>Status</th>
                                 <th>IP Address</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                              $x = 1;
                              @endphp
                              @foreach ($attendances as $attendance)
                              @if(!empty(Auth::user()->id == $attendance->user_id))
                              <tr>
                                 <td>
                                    <span class="fw-bold">{{$x++}}</span>
                                 </td>
                                 <td>
                                    <span class="fw-bold ms-3">
                                    @if(Auth::user()->id == $attendance->user_id)
                                    {{Auth::user()->name}}
                                    @else
                                    @endif
                                    </span>
                                 </td>
                                 <td>
                                    {{$attendance->created_at->format('d-F-Y')}}
                                 </td>
                                 <td>
                                    @if($attendance->status == 1)
                                    @if($attendance->created_at->format('h:i:s') <= '11:00:00')
                                    {{$attendance->created_at->format('h:i:s A')}}
                                    @elseif($attendance->created_at->format('h:i:s') <= '11:15:00')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($attendance->created_at->format('h:i:s') <= '11:30:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @else
                                    {{$attendance->created_at->format('h:i:s A')}}
                                    @endif
                                    @else
                                    {{$attendance->created_at->format('h:i:s A')}}
                                    @endif
                                 </td>
                                 <td>
                                    <!-- office_in_time time -->
                                    @php
                                    $office_in_time = "11:00:00";
                                    // diffrent time               
                                    $in_count       = new DateTime($office_in_time); 
                                    $count_diff     = $in_count->diff(new DateTime($attendance->created_at->format('h:i:s'))); 
                                    @endphp
                                    @if($attendance->status == 1)
                                    @if($attendance->created_at->format('h:i:s') <= $office_in_time AND $attendance->created_at->format('a') == 'am')
                                    <div class="text-success">
                                       <strong class="badge badge-success"> In - on time</strong>
                                    </div>
                                    @else
                                    <div class="text-danger">
                                       <strong class="badge badge-danger"> In - Late </strong>
                                       <span class="badge badge-light-danger">
                                       @php
                                       echo $count_diff->h.'h-'; 
                                       echo $count_diff->i.'m-'; 
                                       echo $count_diff->s.'s';
                                       @endphp
                                       </span>
                                    </div>
                                    @endif
                                    @endif
                                    <!-- office out time-->
                                    @php
                                    $office_out_time = "07:00:00";
                                    // diffrent time 
                                    $out_count = new DateTime($office_out_time); 
                                    $out_diff  = $out_count->diff(new DateTime($attendance->created_at->format('h:i:s'))); 
                                    @endphp
                                    @if($attendance->status == 2)
                                    @if($attendance->created_at->format('h:i:s') >= $office_out_time)
                                    <div class="text-success">
                                       <strong class="badge badge-success"> Leave - on time  </strong>
                                    </div>
                                    @else
                                    <div class="text-danger">
                                       <strong class="badge badge-danger"> Early Leave </strong>
                                       <span class="badge badge-light-danger">
                                       @php
                                       echo $out_diff->h.'h-'; 
                                       echo $out_diff->i.'m-'; 
                                       echo $out_diff->s.'s';
                                       @endphp
                                       </span>
                                    </div>
                                    @endif
                                    @endif
                                 </td>
                                 <td>
                                    <div class="badge badge-light-primary">{{$attendance->ip_address}}</div>
                                 </td>
                              </tr>
                              @else
                              @endif
                              @endforeach
                           </tbody>
                        </table>
                        <!--end::Table-->
                     </div>
                     <!--end::Card body-->
                  </div>
                  <!--end::Content-->
                  <!--end::Table widget 6-->
               </div>
            </div>
            <!--end::Col-->
         </div>
         <!--end::Row-->
      </div>
      <!--end::Content container-->
   </div>
   <!--end::Content-->
</div>
<!--end::Content wrapper-->
</div>
@endsection