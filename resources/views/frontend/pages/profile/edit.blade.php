@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Contacts App- Add New Contact-->
      <div class="row g-7">
         <!--begin::Content-->
         <div class="col-xl-12">
            <!--begin::Contacts-->
            <div class="card card-flush h-lg-100" id="kt_contacts_main">
               <!--begin::Card header-->
               <div class="card-header pt-7" id="kt_chat_contacts_header">
                  <!--begin::Card title-->
                  <div class="card-title">
                     <i class="ki-outline ki-badge fs-1 me-2"></i>
                     <h2>Update Your Profile</h2>
                  </div>
                  <!--end::Card title-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body pt-5">
                  <!--begin::Form-->
                  <form action="{{route('user.profile.update',$user_profile->id)}}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_settings_general_form" class="form">
                     @csrf
                    <!--begin::Input group-->
                     <div class="mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold mb-3">
                        <span>Profile Picture</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg.">
                        <i class="ki-outline ki-information fs-7"></i>
                        </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image input wrapper-->
                        <div class="mt-1">
                           <!--begin::Image placeholder-->
                           <style>.image-input-placeholder { background-image: url('{{asset("backend/assets/media/svg/files/blank-image.svg")}}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('asset("backend/assets/media/svg/files/blank-image-dark.svg")'); }</style>
                           <!--end::Image placeholder-->
                           <!--begin::Image input-->
                           <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty" data-kt-image-input="true">
                              <!--begin::Preview existing avatar-->
                              <div class="image-input-wrapper w-100px h-100px" style="background-image: url('')"></div>
                              <!--end::Preview existing avatar-->
                              <!--begin::Edit-->
                              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                 <i class="ki-outline ki-pencil fs-7"></i>
                                 <!--begin::Inputs-->
                                 <input type="file" name="image" accept=".png, .jpg, .jpeg, .webp, .svg" />
                                 <input type="hidden" name="avatar_remove" />
                                 <!--end::Inputs-->
                              </label>
                              <!--end::Edit-->
                              <!--begin::Cancel-->
                              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                              <i class="ki-outline ki-cross fs-2"></i>
                              </span>
                              <!--end::Cancel-->
                              <!--begin::Remove-->
                              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                              <i class="ki-outline ki-cross fs-2"></i>
                              </span>
                              <!--end::Remove-->
                           </div>
                           <!--end::Image input-->
                        </div>
                        <!--end::Image input wrapper-->
                     </div>
                     <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Name</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="name">
                        <i class="ki-outline ki-information fs-7"></i>
                        </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="name" value="{{$user_profile->name}}" />
                        <!--end::Input-->
                     </div>
                     <!--end::Input group-->
                     <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Email</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="email">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="email" class="form-control form-control-solid" name="email" value="{{$user_profile->email}}"/>
                           <!--end::Input-->
                        </div>
                        <!--end::Input group--> 
                        <!--begin::Col-->
                        <div class="col">
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span>Phone</span>
                              <span class="ms-1" data-bs-toggle="tooltip" title="phone">
                              <i class="ki-outline ki-information fs-7"></i>
                              </span>
                              </label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <input type="tel" class="form-control form-control-solid" name="phone" value="{{$user_profile->phone}}"/>
                              <!--end::Input-->
                           </div>
                           <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                     </div>
                     <!--begin::Row-->
                     <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span>New Password</span>
                              <span class="ms-1" data-bs-toggle="tooltip" title="password">
                              <i class="ki-outline ki-information fs-7"></i>
                              </span>
                              </label>
                              <!--begin::Input-->
                              <input type="password" autocomplete="false" class="form-control form-control-solid" name="password" placeholder="****"/>
                              <!--end::Input-->
                           </div>
                           <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span>Repeat Password</span>
                              <span class="ms-1" data-bs-toggle="tooltip" title="password">
                              <i class="ki-outline ki-information fs-7"></i>
                              </span>
                              </label>
                              <!--begin::Input-->
                              <input type="password" autocomplete="off" class="form-control form-control-solid" name="repeat_password" placeholder="****"/>
                              <!--end::Input-->
                           </div>
                           <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                     </div>
                     <!--end::Row-->
                     <!--begin::Row-->
                     <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="fv-row">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Address</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Address">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="address" value="{{$user_profile->address}}"/>
                           <!--end::Input-->
                        </div>
                     </div>
                     <!--end::Row-->
                     <!--end::Input group-->
                     <!--begin::Separator-->
                     <div class="mt-5 separator mb-6"></div>
                     <!--end::Separator-->
                     <!--begin::Action buttons-->
                     <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Cancel</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">Save</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                     </div>
                     <!--end::Action buttons-->
                  </form>
                  <!--end::Form-->
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Contacts-->
         </div>
         <!--end::Content-->
      </div>
      <!--end::Contacts App- Add New Contact-->
   </div>
   <!--end::Content container-->
</div>
@endsection