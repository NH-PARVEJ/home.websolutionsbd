@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
         <div class="card">
            <div class="card-body">
               <!--begin:Form-->
               <form action="{{route('admin.loan.update',$loan->id)}}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_settings_general_form" class="form">
                  @csrf
                  <!--begin::Heading-->
                  <div class="mb-13 text-center">
                     <!--begin::Title-->
                     <h1 class="mb-3">Edit Loan</h1>
                  </div>
                  <!--end::Heading-->
                  <!--begin::Input group-->
                  <!--begin::Row-->
                  <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                     <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Loan Type</span>
                        </label>
                        <!--end::Label-->
                        <div class="w-100">
                           <!--begin::Select2-->
                           <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="type" data-kt-ecommerce-settings-type="select2_flags">
                              <option>Select Type</option>
                              <option value="1" @if($loan->type == 1) selected @endif >Intertainment</option>
                              <option value="2" @if($loan->type == 2) selected @endif >Cash</option>
                           </select>
                           <!--end::Select2-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <!--begin::Col-->
                     <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Instalment</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="instalment">
                        <i class="ki-outline ki-information fs-7"></i>
                        </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" value="{{$loan->instalment}}" name="instalment"/>
                        {{-- <!--end::Input-->
                        <!--begin::Input-->
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="status" value="1" />
                        <!--end::Input--> --}}
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Row-->
                  <!--begin::Row-->
                  <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                     <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Each Instalment Pay</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="">
                        <i class="ki-outline ki-information fs-7"></i>
                        </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" value="{{$loan->each_instalment_pay}}" class="form-control form-control-solid" name="each_instalment_pay"/>
                        <!--end::Input-->
                     </div>
                     <!--begin::Col-->
                     <!--begin::Input group-->
                     <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Money</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="">
                        <i class="ki-outline ki-information fs-7"></i>
                        </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" value="{{$loan->money}}" placeholder="৳" class="form-control form-control-solid" name="money"/>
                        <!--end::Input-->
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Row-->

                  <!--begin::Row-->
                  <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                     <!--begin::Row-->
                     <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Payment Terms</span>
                        </label>
                        <!--end::Label-->
                        <div class="w-100">
                           <!--begin::Select2-->
                           <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="payment_terms" data-kt-ecommerce-settings-type="select2_flags">
                              <option>Select Payment Terms</option>
                              <option value="1" @if($loan->payment_terms == 1) selected @endif>Day</option>
                              <option value="2" @if($loan->payment_terms == 2) selected @endif>Month</option>
                           </select>
                           <!--end::Select2-->
                        </div>
                     </div>
                        <!--end::Input group-->

                     <!--begin::Input group-->
                     <div class="fv-row">
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Status</span>
                        </label>
                        <!--end::Label-->
                        <div class="w-100">
                           <!--begin::Select2-->
                           <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="status" data-kt-ecommerce-settings-type="select2_flags">
                              <option>Select Status</option>
                              <option value="1" @if($loan->status == 1) selected @endif >Panding</option>
                              <option value="2" @if($loan->status == 2) selected @endif >Approved</option>
                              <option value="3" @if($loan->status == 3) selected @endif >Completed</option>
                              <option value="4" @if($loan->status == 4) selected @endif >Cancelled</option>
                           </select>
                           <!--end::Select2-->
                        </div>
                        <!--end::Input group-->
                     </div>
                  </div>
                     <!--end::Col-->
                  <!--end::Row-->

                     <!--begin::Row-->
                     <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Note</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="">
                        <i class="ki-outline ki-information fs-7"></i>
                        </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea  rows="4" cols="50" class="form-control form-control-solid" name="note">{{$loan->money}}</textarea>
                        <!--end::Input-->
                   </div>
                   <!--begin::Col-->
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