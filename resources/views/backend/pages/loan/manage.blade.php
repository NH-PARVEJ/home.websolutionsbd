@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-10">
         <!--begin::Col-->
         <div class="col-xl-12 mb-5 mb-xl-10">
            <!--begin::Table widget 6-->
            <div class="card card-flush">
               <!--begin::Card body-->
               <div class="card-body">
                  <!--begin::Table-->
                  @php 
                  $x = 1;
                  @endphp
                  <table id="datatable" class="table table-hover table-striped table-bordered" style="width:100%">
                     <thead>
                        <tr>
                           <th>#Id</th>
                           <th>Image</th>
                           <th>Name</th>
                           <th>Loan Type</th>
                           <th>Instalment</th>
                           <th>Each Instalment Pay</th>
                           <th>Money</th>
                           <th>Note</th>
                           <th>Status</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($loans as $loan)
                        @foreach ($users as $user)
                        @if($user->id == $loan->user_id)
                        <tr>
                           <td><span class="fw-bold">{{$x++}}</span></td>
                           <td>
                              <div class="symbol symbol-circle symbol-45px me-5">
                                 @if(!is_Null($user->image))
                                 <img src="{{asset('backend/assets/media/user/'. $user->image)}}" alt="user" />
                                 @else
                                 <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
                                 @endif
                              </div>
                           </td>
                           <td>{{$user->name}}</td>
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
                                    <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$loan->id}}">Delete</a>
                                 </div>
                                 <!--end::Menu item-->
                              </div>
                           </td>
                                    <!--begin::Modal - New Target-->
                           <div class="modal fade" id="kt_modal_delete{{$loan->id}}" tabindex="-1" aria-hidden="true">
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
                        @endforeach
                     </tbody>
                  </table>
                              
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