@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
         <div class="card">
            <div class="card-body">
               <!--begin:Form-->
               <form action="{{route('target.update',$target->id)}}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_settings_general_form" class="form">
                  @csrf
                  <!--begin::Heading-->
                  <div class="mb-13 text-center">
                     <!--begin::Title-->
                     <h1 class="mb-3">Edit target</h1>
                  </div>
                  <!--end::Heading-->
                  <!--begin::Input group-->
                  <!--begin::Row-->
                  <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                     <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Month Name</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Month Name">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="date" class="form-control form-control-solid" name="month" value="{{$target->month}}"/>
                           <!--end::Input-->
                     </div>
                     <!--begin::Col-->
                     <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Target</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Target">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="number" class="form-control form-control-solid" name="target" value="{{$target->target}}"/>
                           <!--end::Input-->
                     </div>
                  </div>
                     <!--end::Col-->
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