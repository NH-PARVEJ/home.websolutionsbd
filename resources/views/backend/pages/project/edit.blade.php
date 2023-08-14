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
                     <h2>Edit project</h2>
                  </div>
                  <!--end::Card title-->
               </div>
               <!--begin::Card body-->
               <div class="card-body pt-5">
                  <!--begin::Form-->
                  <form action="{{route('project.update', $project->id)}}" method="POST" enctype="multipart/form-data" class="form">
                     @csrf
                    <!--begin::Input group-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Website Login url</span>
                        <span class="ms-1" data-bs-toggle="tooltip">
                        <i class="ki-outline ki-information fs-7"></i>
                        </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="website_login_url" value="{{$project->website_login_url}}"/>
                        <!--end::Input-->

                    </div>
                     <!--end::Input group-->
                     <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Username</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="user_name">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="user_name" value="{{$project->user_name}}"/>
                           <!--end::Input-->
                        </div>
                        <!--end::Input group--> 
                        <!--begin::Col-->
                        <div class="col">
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span>Password</span>
                              <span class="ms-1" data-bs-toggle="tooltip" title="password">
                              <i class="ki-outline ki-information fs-7"></i>
                              </span>
                              </label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <input type="text" value="{{$project->password}}" class="form-control form-control-solid" name="password"/>
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
                           <span class="required">Server URL</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Server URL">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="server_url" value="{{$project->server_url}}"/>
                           <!--end::Input-->
                        </div>
                        <!--begin::Col-->
                        <div class="fv-row">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Server Username</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Server Username">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="server_user_name" value="{{$project->server_user_name}}"/>
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
                           <span class="required">Server Password</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Server Password">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="server_password" value="{{$project->server_password}}"/>
                           <!--end::Input-->
                        </div>
                        <!--begin::Col-->
                        <div class="fv-row">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Reference Website</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Reference Website">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="reference_website" value="{{$project->reference_website}}"/>
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
                           <span class="required">Requirements</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Requirements">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="requirements" value="{{$project->requirements}}"/>
                           <!--end::Input-->
                        </div>
                        <!--begin::Col-->
                        <div class="fv-row">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Start Date</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Start Date">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="date" class="form-control form-control-solid" name="start_date" value="{{$project->start_date}}"/>
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
                           <span class="required">Delivery Date</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Delivery Date">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="date" class="form-control form-control-solid" name="delivery_date" value="{{$project->delivery_date}}"/>
                           <!--end::Input-->
                        </div>
                        <!--begin::Col-->
                        <div class="fv-row">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Project Price</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Project Price">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="number" class="form-control form-control-solid" name="project_price" value="{{$project->project_price}}"/>
                           <!--end::Input-->
                        </div>
                        <!--end::Col-->
                     </div>
                     <!--end::Row-->
                     <!--begin::Row-->
                     <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Source</span>
                              </label>
                              <!--end::Label-->
                              <div class="w-100">
                                 <!--begin::Select2-->
                                 <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="source" data-kt-ecommerce-settings-type="select2_flags">
                                    @foreach($users as $user)
                                    @if($user->role == 1)
                                    <option @if($user->id == $project->source) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                    @endforeach
                                 </select>
                                 <!--end::Select2-->
                              </div>
                           </div>
                           <!--end::Input group-->
                        <!--begin::Col-->
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Handle By</span>
                              </label>
                              <!--end::Label-->
                              <div class="w-100">
                                 <!--begin::Select2-->
                                 <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="handle_by" data-kt-ecommerce-settings-type="select2_flags">
                                    @foreach($users as $user)
                                    @if($user->role == 1 OR $user->role == 2 OR $user->role == 3)
                                    <option @if($user->id == $project->handle_by) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                    @endforeach
                                 </select>
                                 <!--end::Select2-->
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
                           <span class="required">Complete Date</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Complete Date">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="date" class="form-control form-control-solid" name="complete_date" value="{{$project->complete_date}}"/>
                           <!--end::Input-->
                        </div>
                        <!--begin::Col-->
                        <div class="fv-row">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Client Name</span>
                           <span class="ms-1" data-bs-toggle="tooltip" title="Client Name">
                           <i class="ki-outline ki-information fs-7"></i>
                           </span>
                           </label>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <input type="text" class="form-control form-control-solid" name="client_name" value="{{$project->client_name}}"/>
                           <!--end::Input-->
                        </div>
                        <!--end::Col-->
                     </div>
                     <!--end::Row-->
                     <!--begin::Row-->
                     <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Assign To</span>
                              </label>
                              <!--end::Label-->
                              <div class="w-100">
                                 <!--begin::Select2-->
                                 <select id="kt_ecommerce_select2_country" required class="form-select form-select-solid" name="assign_to" data-kt-ecommerce-settings-type="select2_flags">
                                    @foreach($users as $user)
                                    <option @if($user->id == $project->assign_to) selected @endif value="{{$user->id}}">
                                       {{$user->name}}
                                    </option>
                                    @endforeach
                                 </select>
                                 <!--end::Select2-->
                              </div>
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Status</span>
                              </label>
                              <!--end::Label-->
                              <div class="w-100">
                                 <!--begin::Select2-->
                                 <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="status" data-kt-ecommerce-settings-type="select2_flags">
                                    <option @if($project->status == 1) selected @endif value="1">Panding</option>
                                    <option @if($project->status == 2) selected @endif value="2">Revision</option>
                                    <option @if($project->status == 3) selected @endif value="3">Cancelled</option>
                                    <option @if($project->status == 4) selected @endif value="4">Completed</option>
                                 </select>
                                 <!--end::Select2-->
                              </div>
                           </div>
                           <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                     </div>
                     <!--end::Row-->
                     <!--end::Input group-->
                     <!--begin::Separator-->
                     <div class="separator mb-6"></div>
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