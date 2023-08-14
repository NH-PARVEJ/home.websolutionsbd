@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
         <!--begin::Col-->
         <div class="col-xl-12 mb-5 mb-xl-10">
            <!--begin::Table widget 6-->
            <div class="card card-flush">
               <!--begin::Card body-->
               <div class="card-body">
                  <!--begin::Table-->
                  <table id="datatable" class="table table-hover table-striped table-bordered" style="width:100%">
                     <thead>
                        <tr>
                           <th>#SL</th>
                           <th>image</th>
                           <th>Name</th>
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
                        @foreach($users as $user)
                        @if($user->id == $leave->user_id)
                        <tr>
                           <td>
                              <span class="fw-bold">{{$x++}}</span>
                           </td>
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
                              {{$user->name}}
                           </td>
                           <td>
                              {{$leave->start_date}}
                           </td>
                           <td>
                              {{$leave->end_date}}
                           </td>
                           <td>
                              @if($leave->type == 1)
                              Full Day
                              @elseif($leave->type == 2)
                              Half Day
                              @else
                              @endif
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
                                    <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$leave->id}}">Delete</a>
                                 </div>
                                 <!--end::Menu item-->
                              </div>
                           </td>

                           <!--begin::Modal - New Target-->
                           <div class="modal fade" id="kt_modal_delete{{$leave->id}}" tabindex="-1" aria-hidden="true">
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
         <!--end::Col-->
      </div>
      <!--end::Row-->
   </div>
   <!--end::Content container-->
</div>
@endsection