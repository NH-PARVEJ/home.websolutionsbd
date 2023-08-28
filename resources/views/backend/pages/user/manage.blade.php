@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <div class="row g-7">
         <!--end::Contact groups-->
         <div class="card">
            <!--begin::Body-->
            <div class="card-header">
               <h2 class="card-title fw-bold">Employee</h2>
               <div class="card-toolbar">
                  <a href="{{route('user.create')}}">
                  <button class="btn btn-flex btn-primary" data-kt-calendar="add">
                  <i class="ki-outline ki-plus fs-2"></i>Add New Employee</button>
                  </a>
               </div>
            </div>
         </div>
         <!--begin::Search-->
         <div class="col-lg-6 col-xl-3">
            <!--begin::Contacts-->
            <div class="card card-flush" id="kt_contacts_list">
               <!--begin::Card header-->
               <div class="card-header pt-7" id="kt_contacts_list_header">
                  <!--begin::Form-->
                  <form class="d-flex align-items-center position-relative w-100 m-0" autocomplete="off">
                     <!--begin::Icon-->
                     <i class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"></i>
                     <!--end::Icon-->
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid ps-13" name="search" value="" placeholder="Search contacts" />
                     <!--end::Input-->
                  </form>
                  <!--end::Form-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body pt-5" id="kt_contacts_list_body">
                  <!--begin::List-->
                  @foreach ($users as $user)
                  <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header" data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body" data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px">
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-40px symbol-circle">
                              @if(!empty($user->image))
                              <img alt="Pic" src="{{asset('backend/assets/media/user/'. $user->image)}}" />
                              @else
                              <img alt="Pic" src="{{asset('backend/assets/media/user/user.png')}}" />
                              @endif
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-4">
                              <a href="{{route('user.profile',$user->id)}}" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">@php echo ucfirst(strtolower($user->name)); @endphp</a>
                              <div class="fw-semibold fs-7 text-muted">{{$user->email}}</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                     </div>
                     <!--end::User-->
                     <!--begin::Separator-->
                     <div class="separator separator-dashed d-none"></div>
                     <!--end::Separator-->
                     <!--end::User-->
                  </div>
                  @endforeach
                  <!--end::List-->
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Contacts-->
         </div>
         <!--end::Search-->
         <!--begin::Content-->
         <div class="col-xl-9">
            <!--begin::Contacts-->
            <div class="card card-flush h-lg-100" id="kt_contacts_main">
               <!--begin::Card header-->
               <div class="card-header pt-7" id="kt_chat_contacts_header">
                  <!--begin::Card title-->
                  <div class="card-title">
                     <i class="ki-outline ki-badge fs-1 me-2"></i>
                     <h2>Employee Details</h2>
                  </div>
                  <!--end::Card title-->
                  <!--begin::Card toolbar-->
                  <div class="card-toolbar gap-3">
                     <!--begin::Action menu-->
                     <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                     <i class="ki-outline ki-dots-square fs-2"></i>
                     </a>
                     <!--begin::Menu-->
                     <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                           <a href="{{route('user.edit', $single_user->id)}}" class="menu-link px-3">Edit</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                           <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_user_delete{{$single_user->id}}">Delete</a>
                        </div>
                        <!--end::Menu item-->
                     </div>
                     <!--end::Menu-->
                     <!--end::Action menu-->
                  </div>
                  <!--end::Card toolbar-->
                  <!--begin::Modal - New Target-->
                  <div class="modal fade" id="kt_user_delete{{$single_user->id}}" tabindex="-1" aria-hidden="true">
                     <!--begin::Modal dialog-->
                     <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content rounded">
                           <!--begin::Modal header-->
                           <div class="modal-header pb-0 border-0 justify-content-end">
                              <!--begin::Close-->
                              <div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
                                 <i class="ki-outline ki-cross fs-1"></i>
                              </div>
                              <!--end::Close-->
                           </div>
                           <!--begin::Modal header-->
                           <!--begin::Modal body-->
                           <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                              <!--begin:Form-->
                              <form action="{{route('user.destroy',$single_user->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                 @csrf
                                 <!--begin::Heading-->
                                 <div class="mb-13 text-center">
                                    <h1 class="mb-3">Delete User</h1>
                                    <div class="text-muted fw-semibold fs-5">Are you sure to 
                                       <a class="link-danger fw-bold">delete ?</a>
                                    </div>
                                 </div>
                                 <!--begin::Actions-->
                                 <div class="text-center mt-3">
                                    <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                                    <button type="submit" class="btn btn-danger" data-kt-modal-action-type="submit">
                                    <span class="indicator-label">Delete</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                 </div>
                              </form>
                              <!--end:Form-->
                           </div>
                           <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                     </div>
                     <!--end::Modal dialog-->
                  </div>
                  <!--end::Modal - New Target-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body pt-5">
                  <!--begin::Profile-->
                  <div class="d-flex gap-7 align-items-center">
                     <!--begin::Avatar-->
                     <div class="symbol symbol-circle symbol-100px">
                        @if(!empty($single_user->image))
                        <img alt="Pic" src="{{asset('backend/assets/media/user/'. $single_user->image)}}" />
                        @else
                        <img alt="Pic" src="{{asset('backend/assets/media/user/user.png')}}" />
                        @endif
                     </div>
                     <!--end::Avatar-->
                     <!--begin::Contact details-->
                     <div class="d-flex flex-column gap-2">
                        <!--begin::Name-->
                        {{-- @if(user->id == $) --}}
                        <h3 class="mb-0">@php echo ucfirst(strtolower($single_user->name)); @endphp</h3>
                        <!--end::Name-->
                        <!--begin::Email-->
                        <div class="d-flex align-items-center gap-2">
                           <i class="ki-outline ki-sms fs-2"></i>
                           <a href="#" class="text-muted text-hover-primary">{{$single_user->email}}</a>
                        </div>
                        <!--end::Email-->
                        <!--begin::Phone-->
                        <div class="d-flex align-items-center gap-2">
                           <i  class="ki-outline ki-screen fs-2"></i>
                           <a href="#" class="text-muted text-hover-primary">
                           @foreach($designations as $designation)
                           @if($single_user->designation == $designation->designation)
                           {{$designation->designation}}
                           @endif
                           @endforeach    
                           </a>
                        </div>
                        <!--begin::Phone-->
                        <div class="d-flex align-items-center gap-2">
                           <i class="ki-outline ki-dollar fs-2"></i>
                           <a class="text-muted text-hover-primary">
                           @php
                           $total = 0;
                           @endphp
                           @foreach($project_current_month as $the_month)
                           @if($single_user->id == $the_month->assign_to)
                           @if($the_month->status == 4)
                           @php
                           $total = $total + $the_month->project_price;
                           @endphp
                           @endif
                           @endif
                           @endforeach
                           {{Carbon\Carbon::now()->format('M,Y')}} $ {{number_format($total, 2)}}
                           </a>
                        </div>
                        <!--end::Phone-->
                     </div>
                     <!--end::Contact details-->
                  </div>
                  <!--end::Profile-->
                  <!--begin:::Tabs-->
                  <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8 gap-2">
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-4 active" data-bs-toggle="tab" href="#kt_contact_view_general">
                        <i class="ki-outline ki-home fs-4 me-1"></i>General</a>
                     </li>
                     <!--end:::Tab item-->
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_attendance">
                        <i class="ki-outline ki-calendar-8 fs-4 me-1"></i>Attendance</a>
                     </li>
                     <!--end:::Tab item-->
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_project">
                        <i class="ki-outline ki-screen fs-4 me-1"></i>Project</a>
                     </li>
                     <!--end:::Tab item-->
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_leave">
                        <i class="ki-outline ki-save-2 fs-4 me-1"></i>Leave</a>
                     </li>
                     <!--end:::Tab item-->
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_loan">
                        <i class="ki-outline ki-save-2 fs-4 me-1"></i>Loan</a>
                     </li>
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_screenshot">
                        <i class="ki-outline ki-screen fs-4 me-1"></i>Screenshot</a>
                     </li>
                     <!--end:::Tab item-->
                     <!--end:::Tab item-->
                  </ul>
                  <!--end:::Tabs-->
                  <!--begin::Tab content-->
                  <div class="tab-content">
                     <!--begin:::Tab pane-->
                     <div class="tab-pane fade show active" id="kt_contact_view_general" role="tabpanel">
                        <!--begin::Additional details-->
                        {{-- 
                        <div class="d-flex flex-column gap-5 mt-7">
                           <!--end::Country-->
                           <div class="row g-6 g-xl-9">
                              <!--begin::Tab Content-->
                              <div class="tab-content">
                                 <!--begin::Tap pane-->
                                 <div class="tab-pane fade show active" id="kt_chart_widgets_22_tab_content_1" role="tabpanel" aria-labelledby="#kt_chart_widgets_22_tab_1">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-wrap flex-md-nowrap">
                                       <!--begin::Items-->
                                       <div class="me-md-5 w-100">
                                          <!--begin::Item-->
                                          <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                             <!--begin::Block-->
                                             <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-4">
                                                   <span class="symbol-label">
                                                   <i class="ki-outline ki-timer fs-2qx text-primary"></i>
                                                   </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Section-->
                                                <div class="me-2">
                                                   <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Project</a>
                                                   <span class="text-gray-400 fw-bold d-block fs-7">Current Month Total Project</span>
                                                </div>
                                                <!--end::Section-->
                                             </div>
                                             <!--end::Block-->
                                             <!--begin::Info-->
                                             <div class="d-flex align-items-center">
                                                <span class="text-dark fw-bolder fs-2x">
                                                @php
                                                $current_project = 0;
                                                @endphp
                                                @foreach($project_current_month as $project)
                                                @if($single_user->id == $project->assign_to)
                                                @if($project->status == 4)
                                                @php 
                                                $current_project++; 
                                                @endphp
                                                @endif
                                                @endif
                                                @endforeach
                                                {{$current_project}}
                                                </span>
                                                <span class="text-gray-600 fw-semibold fs-6 me-3 pt-2"></span>
                                                <span class="badge badge-lg badge-light-success align-self-center px-2">
                                                {{Carbon\Carbon::now()->format('M,Y')}}
                                                </span>
                                             </div>
                                             <!--end::Info-->
                                          </div>
                                          <!--end::Item-->
                                          <!--begin::Item-->
                                          <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                             <!--begin::Block-->
                                             <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-4">
                                                   <span class="symbol-label">
                                                   <i class="ki-outline ki-element-11 fs-2qx text-primary"></i>
                                                   </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Section-->
                                                <div class="me-2">
                                                   <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Leave</a>
                                                   <span class="text-gray-400 fw-bold d-block fs-7">Current Month Total Leave</span>
                                                </div>
                                                <!--end::Section-->
                                             </div>
                                             <!--end::Block-->
                                             <!--begin::Info-->
                                             <div class="d-flex align-items-center">
                                                <span class="text-dark fw-bolder fs-2x">
                                                @php
                                                $total_leave = 0;
                                                @endphp
                                                @foreach($leave_current_month as $the_month_leave)
                                                @if($single_user->id == $the_month_leave->user_id)
                                                @if($the_month_leave->status == 2)
                                                @php
                                                $total_leave = $total_leave + $the_month_leave->total_day;
                                                @endphp
                                                @endif
                                                @endif
                                                @endforeach
                                                {{$total_leave}}
                                                </span>
                                                <span class="text-gray-600 fw-semibold fs-5 me-3 pt-2"></span>
                                                <span class="badge badge-lg badge-light-success align-self-center px-2">
                                                {{Carbon\Carbon::now()->format('M,Y')}}
                                                </span>
                                             </div>
                                             <!--end::Info-->
                                          </div>
                                          <!--end::Item-->
                                          <!--begin::Item-->
                                          <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                             <!--begin::Block-->
                                             <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-4">
                                                   <span class="symbol-label">
                                                   <i class="ki-outline ki-abstract-24 fs-2qx text-primary"></i>
                                                   </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Section-->
                                                <div class="me-2">
                                                   <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Attendance</a>
                                                   <span class="text-gray-400 fw-bold d-block fs-7">Current Month Total Attendance</span>
                                                </div>
                                                <!--end::Section-->
                                             </div>
                                             <!--end::Block-->
                                             <!--begin::Info-->
                                             <div class="d-flex align-items-center">
                                                <span class="text-dark fw-bolder fs-2x">
                                                @php
                                                $attendance = 0;
                                                @endphp
                                                @foreach($attendance_current_month as $the_month_attendance)
                                                @if($single_user->id == $the_month_attendance->user_id)
                                                @php 
                                                $attendance++; 
                                                @endphp
                                                @endif
                                                @endforeach
                                                @php
                                                $percent = 100 / 52 * $attendance;
                                                @endphp
                                                {{number_format($percent)}}
                                                </span>
                                                <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">%</span>
                                                <span class="badge badge-lg badge-light-success align-self-center px-2">
                                                {{Carbon\Carbon::now()->format('M,Y')}}
                                                </span>
                                             </div>
                                             <!--end::Info-->
                                          </div>
                                          <!--end::Item-->
                                       </div>
                                       <!--end::Items-->
                                    </div>
                                    <!--end::Wrapper-->
                                 </div>
                                 <!--end::Tap pane-->
                              </div>
                              <!--end::Tab Content-->
                           </div>
                           <!--end::Row-->
                        </div>
                        --}}
                        <!--end::Additional details-->
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                           <!--begin::ToDay Attendance Start-->
                           <div class="tab-pane fade active show" id="kt_stats_widget_6_tab_1" role="tabpanel">
                              <!--begin::Table container-->
                              <!--begin::Table-->
                              <div class="table-responsive">
                                 <!--begin::Table-->
                                 <table class="table align-middle table-bordered table-striped table-hover table-row-bordered table-row-solid gy-4 gs-9">
                                    <!--begin::Thead-->
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                       <tr>
                                          <th class="min-w-250px">chart</th>
                                          <th class="min-w-250px">
                                          This Month 
                                           {{-- <span class="badge badge-primary fs-7 fw-bold">@php echo date("F"); @endphp</span>  --}}
                                          </th>
                                          <th class="min-w-100px">
                                          Last Month
                                          {{-- <span class="badge badge-primary fs-7 fw-bold">@php echo date('F', strtotime('-1 month', time())); @endphp</span> --}}
                                          </th>
                                          <th class="min-w-150px">
                                          This Year 
                                             {{-- <span class="badge badge-primary fs-7 fw-bold">@php echo date("Y"); @endphp</span> --}}
                                          </th>
                                       </tr>

                                    </thead>
                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                    <tbody class="fw-6 fw-semibold text-gray-600">

                                       <!--Current Month Late Attendance Count Start-->
                                       @php 
                                       $late_attendance_current_month = 0;
                                       @endphp
                                       @foreach($attendance_current_month as $current_month)
                                       @if($single_user->id == $current_month->user_id AND $current_month->created_at->format('h:i:s') > '11:00:00')
                                       @php 
                                       $late_attendance_current_month++;
                                       @endphp
                                       @endif  
                                       @endforeach
                                       <!--Current Month Late Attendance Count End-->

                                       <!--Last Month Late Attendance Count Start-->
                                       @php 
                                       $late_attendance_last_month = 0;
                                       @endphp
                                       @foreach($last_month_attendances as $last_month)
                                       @if($single_user->id == $last_month->user_id AND $last_month->created_at->format('h:i:s') > '11:00:00')
                                       @php 
                                       $late_attendance_last_month++;
                                       @endphp
                                       @endif  
                                       @endforeach
                                       <!--Last Month Late Attendance Count End-->
                                       <!--This Year Late Attendance Count Start-->
                                       @php 
                                       $late_attendance_this_year = 0;
                                       @endphp
                                       @foreach($This_Year_attendances as $This_Year)
                                       @if($single_user->id == $This_Year->user_id AND $This_Year->created_at->format('h:i:s') > '11:00:00')
                                       @php 
                                       $late_attendance_this_year++;
                                       @endphp
                                       @endif  
                                       @endforeach
                                       <!--This Year Late Attendance Count End-->


                                       <!--Current Month Leave Count Start-->
                                       @php 
                                       $leave_this_month = 0;
                                       @endphp
                                       @foreach($leave_current_month as $leave_current)
                                       @if($single_user->id == $leave_current->user_id)
                                       @if($leave_current->status == 2)

                                       @php
                                       $leave_this_month = $leave_this_month + $leave_current->total_day;
                                       @endphp

                                       @endif  
                                       @endif  
                                       @endforeach
                                       <!--Current Month leave Count End-->

                                       <!--Last Month Leave Count Start-->
                                       @php 
                                       $leave_lst_month = 0;
                                       @endphp
                                       @foreach($leave_last_month as $leave_last)
                                       @if($single_user->id == $leave_last->user_id)
                                       @if($leave_last->status == 2)
                                       @php
                                       $leave_lst_month = $leave_lst_month + $leave_last->total_day;
                                       @endphp
                                       @endif  
                                       @endif  
                                       @endforeach
                                       <!--Last Month Leave Count End-->

                                       <!--This Year Leave Count Start-->
                                       @php 
                                       $leave_current_year = 0;
                                       @endphp
                                       @foreach($leave_this_year as $leave_year)
                                       @if($single_user->id == $leave_year->user_id)
                                       @if($leave_year->status == 2)
                                       @php
                                       $leave_current_year = $leave_current_year + $leave_year->total_day;
                                       @endphp
                                       @endif  
                                       @endif  
                                       @endforeach
                                       <!--This Year Leave Count End-->






<!----------------------------------------Current Month working day count Start---------------------------------------->
                                       @php
                                       $current_month =  date('t');
                                       $friday        =  4;
                                       $total_working_day_this = $current_month - $friday;
                                       @endphp
<!----------------------------------------Current Month working day count End---------------------------------------->


<!----------------------------------------Current Month working day count Start---------------------------------------->
                                       @php
                                       $last_month =  date('t', strtotime('-1 month', time()));
                                       $friday     =  4;
                                       $total_working_day_last = $last_month - $friday;
                                       @endphp
<!----------------------------------------Current Month working day count End---------------------------------------->


<!----------------------------------------One Month Present count Start---------------------------------------->
                                       @php 
                                       $present_month = 0;
                                       @endphp
                                       @foreach($attendance_current_month as $current_month)
                                       @if($single_user->id == $current_month->user_id)
                                       @if($current_month->status == 1)
                                       @php 
                                       $present_month++;
                                       @endphp
                                       @endif  
                                       @endif  
                                       @endforeach
<!----------------------------------------One Month Present count End---------------------------------------->



<!----------------------------------------One Month Present count Start---------------------------------------->
                                       @php 
                                       $present_last = 0;
                                       @endphp
                                       @foreach($last_month_attendances as $last_month)
                                       @if($single_user->id == $last_month->user_id)
                                       @if($last_month->status == 1)
                                       @php 
                                       $present_last++;
                                       @endphp
                                       @endif  
                                       @endif  
                                       @endforeach
<!----------------------------------------One Month Present count End---------------------------------------->



<!----------------------------------------One Year Present count Start---------------------------------------->
                                       @php 
                                       $present_year = 0;
                                       @endphp
                                       @foreach($This_Year_attendances as $This_Year)
                                       @if($single_user->id == $This_Year->user_id)
                                       @if($This_Year->status == 1)
                                       @php 
                                       $present_year++;
                                       @endphp
                                       @endif  
                                       @endif  
                                       @endforeach
<!----------------------------------------One Year Present count End---------------------------------------->

                                       <tr>
                                          <td>
                                             <a class="text-hover-primary text-gray-600">Working Days</a>
                                          </td>
                                          <td>

                                          {{$total_working_day_this}} Day <!-----1 Month Working Day---->

                                          </td>

                                          <td>
                                             {{$total_working_day_last}} Day <!-----1 Month Working Day---->
                                          </td>

                                          <td>
                                             312 Day <!-----1 Year Working Day---->
                                          </td>

                                       </tr>

                                       <tr>
                                          <td>
                                             <a class="text-hover-primary text-gray-600">Present</a>
                                          </td>
                                          <td>
                                             {{$present_month}} Day
                                          </td>
                                          <td>
                                             {{$present_last}} Day
                                          </td>
                                          <td>
                                             {{$present_year}} Day
                                          </td>
                                       </tr>

<!----------------------------------------Current Month working day count Start---------------------------------------->
                                       @php
                                       $current_month =  date('t');
                                       $friday        =  4;
                                       $total_working_day    = $current_month - $friday;
                                       $total_absent_month   = $total_working_day - $present_month;
                                       @endphp
<!----------------------------------------Current Month working day count End---------------------------------------->


<!----------------------------------------Current Month working day count Start---------------------------------------->
                                       @php
                                       $last_month =  date('t', strtotime('-1 month', time()));
                                       $friday     =  4;
                                       $total_working_day_last = $last_month - $friday;
                                       $total_absent_last      = $total_working_day_last - $present_last;
                                       @endphp
<!----------------------------------------Current Month working day count End---------------------------------------->


<!----------------------------------------Current Month working day count Start---------------------------------------->
                                       @php
                                       $working_year_day =  312;
                                       $friday     =  4;
                                       $total_working_day_year = $working_year_day - $friday;
                                       $total_absent_year      = $total_working_day_year - $present_year;
                                       @endphp
<!----------------------------------------Current Month working day count End---------------------------------------->

                                       <tr>
                                          <td>
                                             <a class="text-hover-primary text-gray-600">Absent</a>
                                          </td>

                                          <td>
                                                <span class="badge badge-light-danger fs-7 fw-bold">
                                                {{$total_absent_month}} Day
                                                </span>
                                          </td>

                                          <td>
                                               <span class="badge badge-light-danger fs-7 fw-bold">
                                                {{$total_absent_last}} Day
                                               </span>
                                          </td>


                                          <td>
                                               <span class="badge badge-light-danger fs-7 fw-bold">
                                                {{$total_absent_year}} Day
                                               </span>
                                          </td>
                                       </tr>
                                       
                                       <!--Current Month Leave Count Start-->
                                       <!--This Year Late Attendance Count End-->
                                       <tr>
                                          <td>
                                             <a class="text-hover-warning text-gray-600">Late Attendance</a>
                                          </td>
                                          <td>
                                             <span style="background-color:#ffbf0015;" class="badge badge-light-warning fs-7 fw-bold">{{$late_attendance_current_month}} Day</span>
                                          </td>
                                          <td>
                                             <span style="background-color:#ffbf0015;" class="badge badge-light-warning fs-7 fw-bold">{{$late_attendance_last_month}} Day</span>
                                          </td>
                                          <td>
                                             <span style="background-color:#ffbf0015;" class="badge badge-light-warning fs-7 fw-bold">{{$late_attendance_this_year}} Day</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td>
                                             <a class="text-hover-primary text-gray-600">Leave</a>
                                          </td>
                                          <td>
                                             {{$leave_this_month}} Day
                                          </td>
                                          <td>
                                             {{$leave_lst_month}} Day
                                          </td>
                                          <td>
                                             {{$leave_current_year}} Day
                                          </td>
                                       </tr>


                                       <!--Current Month Leave Count Start-->
                                       @php 
                                       $complete_project_this = 0;
                                       @endphp
                                       @foreach($project_current_month as $project_current)
                                       @if($single_user->id == $project_current->user_id)
                                       @if($project_current->status == 4)
                                       @php 
                                       $complete_project_this++;
                                       @endphp
                                       @endif  
                                       @endif  

                                       @endforeach
                                       @php 
                                       $current_cancel_project = 0;
                                       @endphp
                                       @foreach($project_current_month as $project_current)
                                       @if($single_user->id == $project_current->user_id)
                                       @if($project_current->status == 3)
                                       @php 
                                       $current_cancel_project++;
                                       @endphp
                                       @endif  
                                       @endif  
                                       @endforeach
                                       <!--Current Month leave Count End-->

                                       <!--Last Month Project Count Start-->
                                       @php 
                                       $complete_project_month = 0;
                                       @endphp
                                       @foreach($project_last_month as $project_last)
                                       @if($single_user->id == $project_last->user_id)
                                       @if($project_last->status == 4)
                                       @php 
                                       $complete_project_month++;
                                       @endphp
                                       @endif  
                                       @endif
                                       
                                       @endforeach
                                       @php 
                                       $cancel_project_month = 0;
                                       @endphp
                                       @foreach($project_last_month as $project_last)
                                       @if($single_user->id == $project_last->user_id)
                                       @if($project_last->status == 3)
                                       @php 
                                       $cancel_project_month++;
                                       @endphp
                                       @endif  
                                       @endif  
                                       @endforeach
                                       <!--Last Month Late Attendance Count End-->
                                       
                                       <!--This Year Late Attendance Count Start-->
                                       @php 
                                       $complete_project_year = 0;
                                       @endphp
                                       @foreach($project_this_year as $project_year)
                                       @if($single_user->id == $project_year->user_id)
                                       @if($project_year->status == 4)
                                       @php 
                                       $complete_project_year++;
                                       @endphp
                                       @endif  
                                       @endif
                                         
                                       @endforeach
                                       @php 
                                       $cancel_project_year = 0;
                                       @endphp
                                       @foreach($project_this_year as $project_year)
                                       @if($single_user->id == $project_year->user_id)
                                       @if($project_year->status == 3)
                                       @php 
                                       $cancel_project_year++;
                                       @endphp
                                       @endif  
                                       @endif  
                                       @endforeach
                                       <!--This Year Late Attendance Count End-->
                                       <tr>
                                          <td>
                                             <a class="text-hover-primary text-gray-600">Project</a>
                                          </td>
                                          <td>
                                             <span class="badge badge-light-success fs-7 fw-bold">{{$complete_project_this}} Complete</span>
                                             <span class="badge badge-light-danger fs-7 fw-bold">{{$current_cancel_project}} Cancel</span>
                                          </td>
                                          <td>
                                             <span class="badge badge-light-success fs-7 fw-bold">{{$complete_project_month}} Complete</span>
                                             <span class="badge badge-light-danger fs-7 fw-bold">{{$cancel_project_month}} Cancel</span>
                                          </td>
                                          <td>
                                             <span class="badge badge-light-success fs-7 fw-bold">{{$complete_project_year}} Complete</span>
                                             <span class="badge badge-light-danger fs-7 fw-bold">{{$cancel_project_year}} Cancel</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td>
                                             <a class="text-hover-primary text-black"><strong>Total =</strong></a>
                                          </td>
                                          <td>  
                                             @php
                                               $total_absent_month = $total_absent_month - $leave_this_month;
                                             @endphp
                                             {{$total_absent_month}} Absent
                                          </td>
                                          <td>
                                             @php
                                               $total_absent_last = $total_absent_last - $leave_lst_month;
                                             @endphp
                                             {{$total_absent_last}} Absent
                                          </td>
                                          <td>
                                             @php
                                               $total_absent_year = $total_absent_year - $leave_current_year;
                                             @endphp
                                             {{$total_absent_year}} Absent
                                          </td>
                                       </tr>

                                    </tbody>
                                    <!--end::Tbody-->
                                 </table>
                                 <!--end::Table-->
                              </div>
                           </div>
                           <!--end:::ToDay Attendance End-->
                           <!--begin::Last Month Attendance Start-->
                           <div class="tab-pane fade" id="kt_stats_widget_6_tab_2" role="tabpanel">
                              <!--begin::Table container-->
                              <div class="table-responsive">
                                 <!--begin::Table-->
                                 <table id="leave" class="table table-hover table-striped table-bordered" style="width:100%">
                                    <thead>
                                       <tr>
                                          <th>#SL</th>
                                          <th>Start Date</th>
                                          <th>End Date</th>
                                          <th>Leave Type</th>
                                          <th>No of Day</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @php 
                                       $x = 1;
                                       @endphp
                                       @foreach($leaves as $leave)
                                       @if($single_user->id == $leave->user_id)
                                       <tr>
                                          <td>
                                             <span class="fw-bold">{{$x++}}</span>
                                          </td>
                                          <td>
                                             {{Carbon\Carbon::parse($leave->start_date)->format('d,M,Y')}}
                                          </td>
                                          <td>
                                             {{Carbon\Carbon::parse($leave->end_date)->format('d,M,Y')}}
                                          </td>
                                          <td>
                                             @if($leave->type == 1)
                                             Full Day
                                             @elseif($leave->type == 2)
                                             Half Day
                                             @else
                                             @endif
                                          </td>
                                          <td>
                                             <div class="badge badge-light-primary">{{$leave->total_day}} Day</div>
                                          </td>
                                          <td>
                                             @if($leave->status == 1)
                                             <div class="alert alert-warning">Panding</div>
                                             @elseif($leave->status == 2)
                                             <div class="alert alert-primary">Approved</div>
                                             @elseif($leave->status == 3)
                                             <div class="alert alert-danger">Cancelled</div>
                                             @else
                                             @endif
                                          </td>
                                          <td>
                                             <!--begin::Menu-->
                                             <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                             <i class="ki-outline ki-dots-square fs-1"></i>
                                             </button>
                                             <!--begin::Menu 2-->
                                             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                   <a href="{{route('admin.leave.edit',$leave->id)}}" class="menu-link px-3">Edit</a>
                                                </div>
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                   <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete">Delete</a>
                                                </div>
                                                <!--end::Menu item-->
                                             </div>
                                          </td>
                                          <!--begin::Modal - New Target-->
                                          <div class="modal fade" id="kt_modal_delete" tabindex="-1" aria-hidden="true">
                                             <!--begin::Modal dialog-->
                                             <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content rounded">
                                                   <!--begin::Modal header-->
                                                   <div class="modal-header pb-0 border-0 justify-content-end">
                                                      <!--begin::Close-->
                                                      <div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
                                                         <i class="ki-outline ki-cross fs-1"></i>
                                                      </div>
                                                      <!--end::Close-->
                                                   </div>
                                                   <!--begin::Modal header-->
                                                   <!--begin::Modal body-->
                                                   <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                      <!--begin:Form-->
                                                      <form action="{{route('admin.leave.destroy',$leave->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                         @csrf
                                                         <!--begin::Heading-->
                                                         <div class="mb-13 text-center">
                                                            <h1 class="mb-3">Delete Leave</h1>
                                                            <div class="text-muted fw-semibold fs-5">Are you sure to 
                                                               <a class="link-danger fw-bold">delete ?</a>
                                                            </div>
                                                         </div>
                                                         <!--begin::Actions-->
                                                         <div class="text-center mt-3">
                                                            <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" data-kt-modal-action-type="submit">
                                                            <span class="indicator-label">Delete</span>
                                                            <span class="indicator-progress">Please wait...
                                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                         </div>
                                                      </form>
                                                      <!--end:Form-->
                                                   </div>
                                                   <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                             </div>
                                             <!--end::Modal dialog-->
                                          </div>
                                          <!--end::Modal - New Target-->
                                       </tr>
                                       @else
                                       @endif
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                              <!--end::Table-->
                           </div>
                           <!--end::Last Month Attendance End-->
                           <!--begin::All Attendance Start-->
                           <div class="tab-pane fade" id="kt_stats_widget_6_tab_3" role="tabpanel">
                              <!--begin::Table container-->
                              <div class="table-responsive">
                                 <!--begin::Table-->
                                 <table id="leave" class="table table-hover table-striped table-bordered" style="width:100%">
                                    <thead>
                                       <tr>
                                          <th>#SL</th>
                                          <th>Start Date</th>
                                          <th>End Date</th>
                                          <th>Leave Type</th>
                                          <th>No of Day</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @php 
                                       $x = 1;
                                       @endphp
                                       @foreach($leaves as $leave)
                                       @if($single_user->id == $leave->user_id)
                                       <tr>
                                          <td>
                                             <span class="fw-bold">{{$x++}}</span>
                                          </td>
                                          <td>
                                             {{Carbon\Carbon::parse($leave->start_date)->format('d,M,Y')}}
                                          </td>
                                          <td>
                                             {{Carbon\Carbon::parse($leave->end_date)->format('d,M,Y')}}
                                          </td>
                                          <td>
                                             @if($leave->type == 1)
                                             Full Day
                                             @elseif($leave->type == 2)
                                             Half Day
                                             @else
                                             @endif
                                          </td>
                                          <td>
                                             <div class="badge badge-light-primary">{{$leave->total_day}} Day</div>
                                          </td>
                                          <td>
                                             @if($leave->status == 1)
                                             <div class="alert alert-warning">Panding</div>
                                             @elseif($leave->status == 2)
                                             <div class="alert alert-primary">Approved</div>
                                             @elseif($leave->status == 3)
                                             <div class="alert alert-danger">Cancelled</div>
                                             @else
                                             @endif
                                          </td>
                                          <td>
                                             <!--begin::Menu-->
                                             <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                             <i class="ki-outline ki-dots-square fs-1"></i>
                                             </button>
                                             <!--begin::Menu 2-->
                                             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                   <a href="{{route('admin.leave.edit',$leave->id)}}" class="menu-link px-3">Edit</a>
                                                </div>
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                   <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete">Delete</a>
                                                </div>
                                                <!--end::Menu item-->
                                             </div>
                                          </td>
                                          <!--begin::Modal - New Target-->
                                          <div class="modal fade" id="kt_modal_delete" tabindex="-1" aria-hidden="true">
                                             <!--begin::Modal dialog-->
                                             <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content rounded">
                                                   <!--begin::Modal header-->
                                                   <div class="modal-header pb-0 border-0 justify-content-end">
                                                      <!--begin::Close-->
                                                      <div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
                                                         <i class="ki-outline ki-cross fs-1"></i>
                                                      </div>
                                                      <!--end::Close-->
                                                   </div>
                                                   <!--begin::Modal header-->
                                                   <!--begin::Modal body-->
                                                   <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                      <!--begin:Form-->
                                                      <form action="{{route('admin.leave.destroy',$leave->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                         @csrf
                                                         <!--begin::Heading-->
                                                         <div class="mb-13 text-center">
                                                            <h1 class="mb-3">Delete Leave</h1>
                                                            <div class="text-muted fw-semibold fs-5">Are you sure to 
                                                               <a class="link-danger fw-bold">delete ?</a>
                                                            </div>
                                                         </div>
                                                         <!--begin::Actions-->
                                                         <div class="text-center mt-3">
                                                            <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" data-kt-modal-action-type="submit">
                                                            <span class="indicator-label">Delete</span>
                                                            <span class="indicator-progress">Please wait...
                                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                         </div>
                                                      </form>
                                                      <!--end:Form-->
                                                   </div>
                                                   <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                             </div>
                                             <!--end::Modal dialog-->
                                          </div>
                                          <!--end::Modal - New Target-->
                                       </tr>
                                       @else
                                       @endif
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                              <!--end::Table-->
                           </div>
                           <!--end::All Attendance End-->
                        </div>
                        <!--end::Tab Content-->
                     </div>
                     <!--end:::Tab pane-->
                     {{-- Attendance Table  --}}
                     <div class="tab-pane fade" id="kt_contact_view_attendance" role="tabpanel">
                        <!--begin::Dates-->
                        <!--end::Dates-->
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                           <!--begin::Day-->
                           <table id="datatable" class="table table-hover table-striped table-bordered" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>#Id</th>
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
                                 @if($single_user->id == $attendance->user_id)
                                 <tr>
                                    <td>
                                       <span class="fw-bold">{{$x++}}</span>
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
                        </div>
                        <!--end::Tab Content-->
                     </div>
                     <!--end:::Tab pane-->
                     <!--begin:::Tab pane-->
                     <div class="tab-pane fade" id="kt_contact_view_project" role="tabpanel">
                        <!--begin::Timeline-->
                        <div class="tab-content">
                           <!--begin::Table-->
                           @php 
                           $x = 1;
                           @endphp
                           <table id="project" class="table table-hover table-responsive table-striped table-bordered" style="width:100%;">
                              <thead>
                                 <tr>
                                    <th>#Id</th>
                                    <th>Website_Login_url </th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Server_URL</th>
                                    <th>Server_Username</th>
                                    <th>Server_Password</th>
                                    <th>Reference_Website</th>
                                    <th>Requirements</th>
                                    <th>Start_Date</th>
                                    <th>Delivery_Date</th>
                                    <th>Project_Price</th>
                                    <th>Source</th>
                                    <th>Handle_By</th>
                                    <th>Assign_To</th>
                                    <th>Complete_Date</th>
                                    <th>Client_Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($projects as $project)
                                 @if($single_user->id == $project->assign_to)
                                 <tr>
                                    <td><span class="fw-bold">{{$x++}}</span></td>
                                    <td><a href="{{$project->website_login_url}}">{{$project->website_login_url}}</a></td>
                                    <td>{{$project->user_name}}</td>
                                    <td>{{$project->password}}</td>
                                    <td><a href="{{$project->server_url}}">{{$project->server_url}}</a></td>
                                    <td>{{$project->server_user_name}}</td>
                                    <td>{{$project->server_password}}</td>
                                    <td><a href="{{$project->reference_website}}">{{$project->reference_website}}</a></td>
                                    <td><a href="{{$project->requirements}}">{{$project->requirements}}</a></td>
                                    <td>{{Carbon\Carbon::parse($project->start_date)->format('d,M,Y')}}</td>
                                    <td>{{Carbon\Carbon::parse($project->delivery_date)->format('d,M,Y')}}</td>
                                    <td>{{$project->project_price}}$</td>
                                    <td>
                                       @foreach($users as $user)
                                       @if($user->id == $project->source)
                                       {{$user->name}}
                                       @endif
                                       @endforeach
                                    </td>
                                    <td>
                                       @foreach($users as $user)
                                       @if($user->id == $project->handle_by)
                                       {{$user->name}}
                                       @endif
                                       @endforeach
                                    </td>
                                    <td>
                                       @foreach($users as $user)
                                       @if($user->id == $project->assign_to)
                                       {{$user->name}}
                                       @endif
                                       @endforeach
                                    </td>
                                    <td>{{Carbon\Carbon::parse($project->complete_date)->format('d,M,Y')}}</td>
                                    <td>{{$project->client_name}}</td>
                                    <td>
                                       @if($project->status == 1)
                                       <div class="alert alert-primary">Panding</div>
                                       @elseif($project->status == 2)
                                       <div class="alert alert-warning">Revision</div>
                                       @elseif($project->status == 3)
                                       <div class="alert alert-danger">Cancelled</div>
                                       @elseif($project->status == 4)
                                       <div class="alert alert-success">Completed</div>
                                       @else
                                       @endif
                                    </td>
                                    <td>
                                       <!--begin::Menu-->
                                       <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                       <i class="ki-outline ki-dots-square fs-1"></i>
                                       </button>
                                       <!--begin::Menu 2-->
                                       <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                          <!--begin::Menu item-->
                                          <div class="menu-item px-3">
                                             <a href="{{route('project.edit',$project->id)}}" class="menu-link px-3">Edit</a>
                                          </div>
                                          <!--begin::Menu item-->
                                          <div class="menu-item px-3">
                                             <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete">Delete</a>
                                          </div>
                                          <!--end::Menu item-->
                                       </div>
                                    </td>
                                 </tr>
                                 @endif
                                 @endforeach
                              </tbody>
                           </table>
                           <!--end::Timeline-->
                        </div>
                     </div>
                     <!--begin:::Tab pane-->
                     <div class="tab-pane fade" id="kt_contact_view_leave" role="tabpanel">
                        <!--begin::Timeline-->
                        <div class="tab-content">
                           <!--begin::Day-->
                           <table id="leave" class="table table-hover table-striped table-bordered" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>#SL</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Leave Type</th>
                                    <th>No of Day</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @php 
                                 $x = 1;
                                 @endphp
                                 @foreach($leaves as $leave)
                                 @if($single_user->id == $leave->user_id)
                                 <tr>
                                    <td>
                                       <span class="fw-bold">{{$x++}}</span>
                                    </td>
                                    <td>
                                       {{Carbon\Carbon::parse($leave->start_date)->format('d,M,Y')}}
                                    </td>
                                    <td>
                                       {{Carbon\Carbon::parse($leave->end_date)->format('d,M,Y')}}
                                    </td>
                                    <td>
                                       @if($leave->type == 1)
                                       Full Day
                                       @elseif($leave->type == 2)
                                       Half Day
                                       @else
                                       @endif
                                    </td>
                                    <td>
                                       <div class="badge badge-light-primary">{{$leave->total_day}} Day</div>
                                    </td>
                                    <td>
                                       @if($leave->status == 1)
                                       <div class="alert alert-warning">Panding</div>
                                       @elseif($leave->status == 2)
                                       <div class="alert alert-primary">Approved</div>
                                       @elseif($leave->status == 3)
                                       <div class="alert alert-danger">Cancelled</div>
                                       @else
                                       @endif
                                    </td>
                                    <td>
                                       <!--begin::Menu-->
                                       <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                       <i class="ki-outline ki-dots-square fs-1"></i>
                                       </button>
                                       <!--begin::Menu 2-->
                                       <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                          <!--begin::Menu item-->
                                          <div class="menu-item px-3">
                                             <a href="{{route('admin.leave.edit',$leave->id)}}" class="menu-link px-3">Edit</a>
                                          </div>
                                          <!--begin::Menu item-->
                                          <div class="menu-item px-3">
                                             <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete">Delete</a>
                                          </div>
                                          <!--end::Menu item-->
                                       </div>
                                    </td>
                                    <!--begin::Modal - New Target-->
                                    <div class="modal fade" id="kt_modal_delete" tabindex="-1" aria-hidden="true">
                                       <!--begin::Modal dialog-->
                                       <div class="modal-dialog modal-dialog-centered mw-650px">
                                          <!--begin::Modal content-->
                                          <div class="modal-content rounded">
                                             <!--begin::Modal header-->
                                             <div class="modal-header pb-0 border-0 justify-content-end">
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
                                                   <i class="ki-outline ki-cross fs-1"></i>
                                                </div>
                                                <!--end::Close-->
                                             </div>
                                             <!--begin::Modal header-->
                                             <!--begin::Modal body-->
                                             <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                <!--begin:Form-->
                                                <form action="{{route('admin.leave.destroy',$leave->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                   @csrf
                                                   <!--begin::Heading-->
                                                   <div class="mb-13 text-center">
                                                      <h1 class="mb-3">Delete Leave</h1>
                                                      <div class="text-muted fw-semibold fs-5">Are you sure to 
                                                         <a class="link-danger fw-bold">delete ?</a>
                                                      </div>
                                                   </div>
                                                   <!--begin::Actions-->
                                                   <div class="text-center mt-3">
                                                      <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                                                      <button type="submit" class="btn btn-danger" data-kt-modal-action-type="submit">
                                                      <span class="indicator-label">Delete</span>
                                                      <span class="indicator-progress">Please wait...
                                                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                      </button>
                                                   </div>
                                                </form>
                                                <!--end:Form-->
                                             </div>
                                             <!--end::Modal body-->
                                          </div>
                                          <!--end::Modal content-->
                                       </div>
                                       <!--end::Modal dialog-->
                                    </div>
                                    <!--end::Modal - New Target-->
                                 </tr>
                                 @else
                                 @endif
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                        <!--end::Timeline-->
                     </div>
                     <!--begin:::Tab pane-->
                     <div class="tab-pane fade" id="kt_contact_view_loan" role="tabpanel">
                        <!--begin::Timeline-->
                        <div class="tab-content">
                           <!--begin::Day-->
                           <!--begin::Table-->
                           @php 
                           $x = 1;
                           @endphp
                           <table id="loan" class="table table-hover table-striped table-bordered" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>#Id</th>
                                    <th>Date</th>
                                    <th>Loan_Type</th>
                                    <th>Instalment</th>
                                    <th>Each_Instalment_Pay</th>
                                    <th>Money</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($loans as $loan)
                                 @if($single_user->id == $loan->user_id)
                                 <tr>
                                    <td><span class="fw-bold">{{$x++}}</span></td>
                                    <td>{{Carbon\Carbon::parse($loan->created_at)->format('d,M,Y')}}</td>
                                    <td>
                                       @if($loan->type == 1)
                                       Intertainment
                                       @elseif($loan->type == 2)
                                       Cash
                                       @else
                                       @endif
                                    </td>
                                    <td>{{$loan->instalment}} 
                                       @if($loan->payment_terms == 1)
                                       Day
                                       @elseif($loan->payment_terms == 2)
                                       Month
                                       @else
                                       @endif
                                    </td>
                                    <td>{{$loan->each_instalment_pay}}</td>
                                    <td>{{$loan->money}} ৳</td>
                                    <td>{{$loan->note}}</td>
                                    <td>
                                       @if($loan->status == 1)
                                       <div class="alert alert-warning">Panding</div>
                                       @elseif($loan->status == 2)
                                       <div class="alert alert-primary">Approved</div>
                                       @elseif($loan->status == 3)
                                       <div class="alert alert-success">Completed</div>
                                       @elseif($loan->status == 4)
                                       <div class="alert alert-danger">Cancelled</div>
                                       @else
                                       @endif
                                    </td>
                                    <td>
                                       <!--begin::Menu-->
                                       <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                       <i class="ki-outline ki-dots-square fs-1"></i>
                                       </button>
                                       <!--begin::Menu 2-->
                                       <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                          <!--begin::Menu item-->
                                          <div class="menu-item px-3">
                                             <a href="{{route('admin.loan.edit',$loan->id)}}" class="menu-link px-3">Edit</a>
                                          </div>
                                          <!--begin::Menu item-->
                                          <div class="menu-item px-3">
                                             <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete">Delete</a>
                                          </div>
                                          <!--end::Menu item-->
                                       </div>
                                    </td>
                                    <!--begin::Modal - New Target-->
                                    <div class="modal fade" id="kt_modal_delete" tabindex="-1" aria-hidden="true">
                                       <!--begin::Modal dialog-->
                                       <div class="modal-dialog modal-dialog-centered mw-650px">
                                          <!--begin::Modal content-->
                                          <div class="modal-content rounded">
                                             <!--begin::Modal header-->
                                             <div class="modal-header pb-0 border-0 justify-content-end">
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
                                                   <i class="ki-outline ki-cross fs-1"></i>
                                                </div>
                                                <!--end::Close-->
                                             </div>
                                             <!--begin::Modal header-->
                                             <!--begin::Modal body-->
                                             <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                <!--begin:Form-->
                                                <form action="{{route('admin.loan.destroy',$loan->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                   @csrf
                                                   <!--begin::Heading-->
                                                   <div class="mb-13 text-center">
                                                      <h1 class="mb-3">Delete Loan</h1>
                                                      <div class="text-muted fw-semibold fs-5">Are you sure to 
                                                         <a class="link-danger fw-bold">delete ?</a>
                                                      </div>
                                                   </div>
                                                   <!--begin::Actions-->
                                                   <div class="text-center mt-3">
                                                      <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                                                      <button type="submit" class="btn btn-danger" data-kt-modal-action-type="submit">
                                                      <span class="indicator-label">Delete</span>
                                                      <span class="indicator-progress">Please wait...
                                                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                      </button>
                                                   </div>
                                                </form>
                                                <!--end:Form-->
                                             </div>
                                             <!--end::Modal body-->
                                          </div>
                                          <!--end::Modal content-->
                                       </div>
                                       <!--end::Modal dialog-->
                                    </div>
                                    <!--end::Modal - New Target-->
                                 </tr>
                                 @endif
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                        <!--end::Timeline-->
                     </div>
                     <!--end:::Tab pane-->
                     <div class="tab-pane fade" id="kt_contact_view_screenshot" role="tabpanel">
                        <!--begin::Timeline-->
                        <div class="tab-content">
                        </div>
                        <!--end::Timeline-->
                     </div>
                  </div>
                  <!--end::Tab content-->
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Contacts-->
         </div>
         <!--end::Content-->
      </div>
      <!--end::Content container-->
   </div>
</div>
@endsection