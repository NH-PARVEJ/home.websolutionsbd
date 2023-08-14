@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
         <div class="card">
            <div class="card-body">
               <!--begin:Form-->
               <form action="{{route('user.leave.update',$leave->id)}}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <!--begin::Heading-->
                       <div class="mb-13 text-center">
                           <!--begin::Title-->
                           <h1 class="mb-3">Edit Leave</h1>
                           <!--end::Title-->
                       </div>
                       <!--end::Heading-->
                  <!--begin::Input group-->
               <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                   <div class="fv-row">
                      <!--begin::Label-->
                      <label class="fs-6 fw-semibold form-label mt-3">
                         <span class="required">Start Date</span>
                         <span class="ms-1" data-bs-toggle="tooltip" title="Enter the contact's name.">
                         <i class="ki-outline ki-information fs-7"></i>
                         </span>
                         </label>
                         <!--end::Label-->
                         <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" name="start_date" value="{{$leave->start_date}}" />
                         <!--end::Input-->
                   </div>
                   <!--begin::Col-->
                   <div class="fv-row">
                      <!--begin::Label-->
                      <label class="fs-6 fw-semibold form-label mt-3">
                         <span class="required">End Date</span>
                         <span class="ms-1" data-bs-toggle="tooltip" title="Enter the contact's name.">
                         <i class="ki-outline ki-information fs-7"></i>
                         </span>
                         </label>
                         <!--end::Label-->
                         <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" name="end_date" value="{{$leave->end_date}}" />
                         <!--end::Input-->
                   </div>
                   <!--end::Col-->
                </div>
                <!--end::Row-->


                   <!--begin::Row-->
                   <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                         <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                               <span class="required">Total Day</span>
                               <span class="ms-1" data-bs-toggle="tooltip" title="Enter the contact's name.">
                               <i class="ki-outline ki-information fs-7"></i>
                               </span>
                               </label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input type="number" class="form-control form-control-solid" name="total_day" value="{{$leave->total_day}}"/>
                               <!--end::Input-->
                         </div>
                      <!--begin::Col-->
                         <!--begin::Input group-->
                         <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Types of leave</span>
                            </label>
                            <!--end::Label-->
                            <div class="w-100">
                               <!--begin::Select2-->
                               <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="type" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="Select a country">
                                  <option>Select leave Types</option>
                                  <option value="1"@if($leave->type == 1) selected @endif>Full Day</option>
                                  <option value="2"@if($leave->type == 2) selected @endif>Half Day</option>
                               </select>
                               <!--end::Select2-->
                         </div>
                         <!--end::Input group-->
                      </div>
                      <!--end::Col-->
                   </div>
                   <!--end::Row-->

                   <!--begin::Row-->
                   <div class="fv-row">
                         <!--begin::Label-->
                         <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Reason</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter the contact's name.">
                            <i class="ki-outline ki-information fs-7"></i>
                            </span>
                            </label>
                            <!--begin::Input-->
                            <textarea  rows="4" cols="50" class="form-control form-control-solid" name="reason">{{$leave->reason}}</textarea>
                            <!--end::Input-->
                      </div>
                   <!--begin::Col-->
                       <!--begin::Actions-->
                       <div class="text-center mt-3">
                           <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                           <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                               <span class="indicator-label">Submit</span>
                               <span class="indicator-progress">Please wait...
                               <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                           </button>
                       </div>

                </form>
          </div>
        </div>
      </div>
   </div>
   <!--end::Content container-->
</div>
@endsection