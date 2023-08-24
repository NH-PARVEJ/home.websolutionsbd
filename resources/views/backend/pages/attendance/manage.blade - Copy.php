@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <div class="row g-10">
         <div class="card card-flush">
            <div class="card-body">
               <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Profile</th>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>IP Address</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($users as $user)
                     @foreach ($attendances as $attendance)
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
                        </td>
                        <td>
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
            </div>
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
      </div>
   </div>
</div>
</div>
@endsection