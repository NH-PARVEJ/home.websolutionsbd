@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <div class="row g-10">
         <div class="card card-flush">
            <!-- Tab links -->
            <div class="card-body">
               <!--begin::Nav-->
               <ul class="nav justify-content-center nav-pills text-center nav-pills-custom mt-3 mb-3" role="tablist">
                  <!--begin::Item-->
                  <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                     <!--begin::Link-->
                     <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-150px h-85px pt-5 pb-2 active" data-bs-toggle="pill" href="#kt_stats_widget_6_tab_1" aria-selected="true" role="tab">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                           <i class="fa-solid fa-fingerprint fs-1"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">ToDay</span>
                        <!--end::Title-->
                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                     </a>
                     <!--end::Link-->
                  </li>
                  <!--end::Item-->
                  <!--begin::Item-->
                  <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                     <!--begin::Link-->
                     <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-150px h-85px pt-5 pb-2" data-bs-toggle="pill" href="#kt_stats_widget_6_tab_2" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                           <i class="ki-outline ki-security-check fs-1"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">This Month</span>
                        <!--end::Title-->
                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-120 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                     </a>
                     <!--end::Link-->
                  </li>
                  <!--end::Item-->
                  <!--begin::Item-->
                  <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                     <!--begin::Link-->
                     <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-150px h-85px pt-5 pb-2" data-bs-toggle="pill" href="#kt_stats_widget_6_tab_3" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                           <i class="ki-outline ki-calendar fs-1"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Last Month</span>
                        <!--end::Title-->
                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-120 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                     </a>
                     <!--end::Link-->
                  </li>
                  <!--end::Item-->
                  <!--begin::Item-->
                  <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                     <!--begin::Link-->
                     <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-150px h-85px pt-5 pb-2" data-bs-toggle="pill" href="#kt_stats_widget_6_tab_4" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                           <i class="ki-outline ki-abstract-26 fs-2"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">All</span>
                        <!--end::Title-->
                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                     </a>
                     <!--end::Link-->
                  </li>
                  <!--end::Item-->
               </ul>
               <!--end::Nav-->
               <!--begin::Tab Content-->
               <div class="tab-content">
                  <!--begin::ToDay Attendance Start-->
                  <div class="tab-pane fade active show" id="kt_stats_widget_6_tab_1" role="tabpanel">
                     <!--begin::Table container-->
                     <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="today_datatable" class="table table-striped table-bordered" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Date</th>
                                 <th>Check In</th>
                                 <th>Check Out</th>
                                 <th>IP Address</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($users as $user)
                              @foreach ($today_attendances as $today_attendance)
                              @if($user->id == $today_attendance->user_id)
                              <tr>
                                 <td>
                                    <div class="symbol symbol-circle symbol-45px me-5">
                                       @if(!is_Null($user->image))
                                       <img src="{{asset('backend/assets/media/user/'. $user->image)}}" alt="user" />
                                       @else
                                       <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
                                       @endif
                                    </div>
                                    <span class="fw-bold ms-3">
                                    {{$user->name}}
                                    </span>
                                 </td>
                                 <td>
                                    {{$today_attendance->created_at->format('d-F-Y')}}
                                 </td>

                                 <td>
                                    <!-- check in -->
                                    @if($today_attendance->status == 1)
                                    @if($today_attendance->created_at->format('h:i:s') <= '11:00:00')
                                    <div class="badge badge-success">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($today_attendance->created_at->format('h:i:s') <= '11:15:00')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($today_attendance->created_at->format('h:i:s') <= '12:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($today_attendance->created_at->format('h:i:s') <= '17:00:00')
                                    <div class="badge badge-danger">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                 </td>

                                 <td>
                                    <!-- check out  -->
                                    @if($today_attendance->status == 2)
                                    @if($today_attendance->created_at->format('h:i:s') <= '18:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($attendance->created_at->format('h:i:s') <= '18:59:59')
                                    <div class="today_attendance text-white" style="background-color:#FFC000;">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($today_attendance->created_at->format('h:i:s') <= '22:00:00')
                                    <div class="badge badge-primary">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                 </td>

                                 <td>
                                    <div class="badge badge-light-primary">{{$today_attendance->ip_address}}</div>
                                 </td>
                                 <td>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                       <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$today_attendance->id}}"><i class="far fa-trash-alt fs-3"></i></a>
                                    </div>
                                    <!--end::Menu item-->
                                 </td>
                                 <!--begin::Modal - New Attendance-->
                                 <div class="modal fade" id="kt_modal_delete{{$today_attendance->id}}" tabindex="-1" aria-hidden="true">
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
                                             <form action="{{route('admin.attendance.destroy',$today_attendance->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                @csrf
                                                <!--begin::Heading-->
                                                <div class="mb-13 text-center">
                                                   <h1 class="mb-3">Delete Attendance</h1>
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
                                 <!--end::Modal - New Attendance-->
                              </tr>
                              @endif
                              @endforeach
                              @endforeach

                              {{-- @foreach($users as $user)
                              @foreach ($today_attendances as $today_attendance)
                              @if($user->id == $today_attendance->user_id)
                              <tr>
                                 <td>
                                    <div class="symbol symbol-circle symbol-45px me-5">
                                       @if(!is_Null($user->image))
                                       <img src="{{asset('backend/assets/media/user/'. $user->image)}}" alt="user" />
                                       @else
                                       <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
                                       @endif
                                    </div>
                                    <span class="fw-bold ms-3">
                                    {{$user->name}}
                                    </span>
                                 </td>
                                 <td>
                                    {{$today_attendance->created_at->format('d-F-Y')}}
                                 </td>

                                 <td>
                                    <!-- check in -->
                                    @if($today_attendance->status == 1)
                                    @if($today_attendance->created_at->format('h:i:s') <= '11:00:00')
                                    <div class="badge badge-success">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($today_attendance->created_at->format('h:i:s') <= '11:15:00')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($today_attendance->created_at->format('h:i:s') <= '12:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($today_attendance->created_at->format('h:i:s') <= '17:00:00')
                                    <div class="badge badge-danger">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                 </td>

                                 <td>
                                    <!-- check out  -->
                                    @if($today_attendance->status == 2)
                                    @if($today_attendance->created_at->format('h:i:s') <= '18:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($attendance->created_at->format('h:i:s') <= '18:59:59')
                                    <div class="today_attendance text-white" style="background-color:#FFC000;">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($today_attendance->created_at->format('h:i:s') <= '22:00:00')
                                    <div class="badge badge-primary">{{$today_attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                 </td>

                                 <td>
                                    <div class="badge badge-light-primary">{{$today_attendance->ip_address}}</div>
                                 </td>
                                 
                                 <td>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                       <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$today_attendance->id}}"><i class="far fa-trash-alt fs-3"></i></a>
                                    </div>
                                    <!--end::Menu item-->
                                 </td>
                                 <!--begin::Modal - New Attendance-->
                                 <div class="modal fade" id="kt_modal_delete{{$today_attendance->id}}" tabindex="-1" aria-hidden="true">
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
                                             <form action="{{route('admin.attendance.destroy',$today_attendance->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                @csrf
                                                <!--begin::Heading-->
                                                <div class="mb-13 text-center">
                                                   <h1 class="mb-3">Delete Attendance</h1>
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
                                 <!--end::Modal - New Attendance-->
                              </tr>
                              @endif
                              @endforeach
                              @endforeach --}}
                           </tbody>
                        </table>
                     </div>
                     <!--end::Table-->
                  </div>
                  <!--end:::ToDay Attendance End-->
                  <!--begin::This Month Attendance Start-->
                  <div class="tab-pane fade" id="kt_stats_widget_6_tab_2" role="tabpanel">
                     <!--begin::Table container-->
                     <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="this_month_datatable" class="table table-striped table-bordered" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Date</th>
                                 <th>Check In</th>
                                 <th>Check Out</th>
                                 <th>IP Address</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($users as $user)
                              @foreach ($this_month_attendances as $this_month_attendance)
                              @if(!empty($user->id == $this_month_attendance->user_id))
                              <tr>
                                 <td>
                                    <div class="symbol symbol-circle symbol-45px me-5">
                                       @if(!is_Null($user->image))
                                       <img src="{{asset('backend/assets/media/user/'. $user->image)}}" alt="user" />
                                       @else
                                       <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
                                       @endif
                                    </div>
                                    <span class="fw-bold ms-3">
                                    {{$user->name}}
                                    </span>
                                 </td>
                                 <td>
                                    {{$this_month_attendance->created_at->format('d-F-Y')}}
                                 </td>
                                 <td>
                                    <!-- check in -->
                                    @if($this_month_attendance->status == 1)
                                    @if($this_month_attendance->created_at->format('h:i:s') <= '11:00:00')
                                    <div class="badge badge-success">{{$this_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($this_month_attendance->created_at->format('h:i:s') <= '11:15:00')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$this_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($this_month_attendance->created_at->format('h:i:s') <= '12:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$this_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($this_month_attendance->created_at->format('h:i:s') <= '17:00:00')
                                    <div class="badge badge-danger">{{$this_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                    <!-- check out  -->
                                    @if($this_month_attendance->status == 2)
                                    @if($this_month_attendance->created_at->format('h:i:s') <= '18:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$this_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($this_month_attendance->created_at->format('h:i:s') <= '18:59:59')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$this_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($this_month_attendance->created_at->format('h:i:s') <= '22:00:00')
                                    <div class="badge badge-primary">{{$this_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                 </td>
                                 <td>
                                 </td>
                                 <td>
                                    <div class="badge badge-light-primary">{{$this_month_attendance->ip_address}}</div>
                                 </td>
                                 <td>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                       <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$this_month_attendance->id}}"><i class="far fa-trash-alt fs-3"></i></a>
                                    </div>
                                    <!--end::Menu item-->
                                 </td>
                                 <!--begin::Modal - New Attendance-->
                                 <div class="modal fade" id="kt_modal_delete{{$this_month_attendance->id}}" tabindex="-1" aria-hidden="true">
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
                                             <form action="{{route('admin.attendance.destroy',$this_month_attendance->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                @csrf
                                                <!--begin::Heading-->
                                                <div class="mb-13 text-center">
                                                   <h1 class="mb-3">Delete Attendance</h1>
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
                                 <!--end::Modal - New Attendance-->
                              </tr>
                              @else
                              @endif
                              @endforeach
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     <!--end::Table-->
                  </div>
                  <!--end::This Month Attendance End-->
                  <!--begin::Last Month Attendance Start-->
                  <div class="tab-pane fade" id="kt_stats_widget_6_tab_3" role="tabpanel">
                     <!--begin::Table container-->
                     <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="Last_month_datatable" class="table table-striped table-bordered" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Date</th>
                                 <th>Check In</th>
                                 <th>Check Out</th>
                                 <th>IP Address</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($users as $user)
                              @foreach ($last_month_attendances as $last_month_attendance)
                              @if(!empty($user->id == $last_month_attendance->user_id))
                              <tr>
                                 <td>
                                    <div class="symbol symbol-circle symbol-45px me-5">
                                       @if(!is_Null($user->image))
                                       <img src="{{asset('backend/assets/media/user/'. $user->image)}}" alt="user" />
                                       @else
                                       <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
                                       @endif
                                    </div>
                                    <span class="fw-bold ms-3">
                                    {{$user->name}}
                                    </span>
                                 </td>
                                 <td>
                                    {{$last_month_attendance->created_at->format('d-F-Y')}}
                                 </td>
                                 <td>
                                    <!-- check in -->
                                    @if($last_month_attendance->status == 1)
                                    @if($last_month_attendance->created_at->format('h:i:s') <= '11:00:00')
                                    <div class="badge badge-success">{{$last_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($last_month_attendance->created_at->format('h:i:s') <= '11:15:00')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$last_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($last_month_attendance->created_at->format('h:i:s') <= '12:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$last_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($last_month_attendance->created_at->format('h:i:s') <= '17:00:00')
                                    <div class="badge badge-danger">{{$last_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                    <!-- check out  -->
                                    @if($last_month_attendance->status == 2)
                                    @if($last_month_attendance->created_at->format('h:i:s') <= '18:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$last_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($last_month_attendance->created_at->format('h:i:s') <= '18:59:59')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$last_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($last_month_attendance->created_at->format('h:i:s') <= '22:00:00')
                                    <div class="badge badge-primary">{{$last_month_attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                 </td>
                                 <td>
                                 </td>
                                 <td>
                                    <div class="badge badge-light-primary">{{$last_month_attendance->ip_address}}</div>
                                 </td>
                                 <td>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                       <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$last_month_attendance->id}}"><i class="far fa-trash-alt fs-3"></i></a>
                                    </div>
                                    <!--end::Menu item-->
                                 </td>
                                 <!--begin::Modal - New Attendance-->
                                 <div class="modal fade" id="kt_modal_delete{{$last_month_attendance->id}}" tabindex="-1" aria-hidden="true">
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
                                             <form action="{{route('admin.attendance.destroy',$last_month_attendance->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                @csrf
                                                <!--begin::Heading-->
                                                <div class="mb-13 text-center">
                                                   <h1 class="mb-3">Delete Attendance</h1>
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
                                 <!--end::Modal - New Attendance-->
                              </tr>
                              @else
                              @endif
                              @endforeach
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     <!--end::Table-->
                  </div>
                  <!--end::Last Month Attendance End-->
                  <!--begin::All Attendance Start-->
                  <div class="tab-pane fade" id="kt_stats_widget_6_tab_4" role="tabpanel">
                     <!--begin::Table container-->
                     <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Date</th>
                                 <th>Check In</th>
                                 <th>Check Out</th>
                                 <th>IP Address</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($users as $user)
                              @foreach ($all_attendances as $attendance)
                              @if(!empty($user->id == $attendance->user_id))
                              <tr>
                                 <td>
                                    <div class="symbol symbol-circle symbol-45px me-5">
                                       @if(!is_Null($user->image))
                                       <img src="{{asset('backend/assets/media/user/'. $user->image)}}" alt="user" />
                                       @else
                                       <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
                                       @endif
                                    </div>
                                    <span class="fw-bold ms-3">
                                    {{$user->name}}
                                    </span>
                                 </td>
                                 <td>
                                    {{$attendance->created_at->format('d-F-Y')}}
                                 </td>
                                 <td>
                                    <!-- check in -->
                                    @if($attendance->status == 1)
                                    @if($attendance->created_at->format('h:i:s') <= '11:00:00')
                                    <div class="badge badge-success">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($attendance->created_at->format('h:i:s') <= '11:15:00')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($attendance->created_at->format('h:i:s') <= '12:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($attendance->created_at->format('h:i:s') <= '17:00:00')
                                    <div class="badge badge-danger">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                    <!-- check out  -->
                                    @if($attendance->status == 2)
                                    @if($attendance->created_at->format('h:i:s') <= '18:00:00')
                                    <div class="badge text-white" style="background-color:#FF7518;">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($attendance->created_at->format('h:i:s') <= '18:59:59')
                                    <div class="badge text-white" style="background-color:#FFC000;">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @elseif($attendance->created_at->format('h:i:s') <= '22:00:00')
                                    <div class="badge badge-primary">{{$attendance->created_at->format('h:i:s A')}}</div>
                                    @endif
                                    @endif
                                 </td>
                                 <td>
                                 </td>
                                 <td>
                                    <div class="badge badge-light-primary">{{$attendance->ip_address}}</div>
                                 </td>
                                 <td>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                       <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$attendance->id}}"><i class="far fa-trash-alt fs-3"></i></a>
                                    </div>
                                    <!--end::Menu item-->
                                 </td>
                                 <!--begin::Modal - New Attendance-->
                                 <div class="modal fade" id="kt_modal_delete{{$attendance->id}}" tabindex="-1" aria-hidden="true">
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
                                             <form action="{{route('admin.attendance.destroy',$attendance->id)}}" method="POST" enctype="multipart/form-data" class="form">
                                                @csrf
                                                <!--begin::Heading-->
                                                <div class="mb-13 text-center">
                                                   <h1 class="mb-3">Delete Attendance</h1>
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
                                 <!--end::Modal - New Attendance-->
                              </tr>
                              @else
                              @endif
                              @endforeach
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
         </div>
      </div>
   </div>
</div>
@endsection