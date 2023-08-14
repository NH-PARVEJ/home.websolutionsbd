@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-10">
         <!--end::Contact groups-->
         <div class="card">
            <!--begin::Body-->
            <div class="card-header">
               <h2 class="card-title fw-bold">Project</h2>
               <div class="card-toolbar">
                  <a href="{{route('project.create')}}">
                  <button class="btn btn-flex btn-primary" data-kt-calendar="add">
                  <i class="ki-outline ki-plus fs-2"></i>Add New Project</button>
                  </a>
               </div>
            </div>
         </div>
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
                  <table id="datatable" class="table table-hover table-responsive table-striped table-bordered" style="width:100%;">
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
                        <div class="bg-danger">
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
                              <td>{{$project->start_date}}</td>
                              <td>{{$project->delivery_date}}</td>
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
                              <td>{{$project->complete_date}}</td>
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
                                       <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$project->id}}">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                 </div>
                              </td>
                              <!--begin::Modal - New Target-->
                              <div class="modal fade" id="kt_modal_delete{{$project->id}}" tabindex="-1" aria-hidden="true">
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
                                          <form action="{{route('project.destroy',$project->id)}}" method="POST" enctype="multipart/form-data" class="form">
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
                        </div>
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