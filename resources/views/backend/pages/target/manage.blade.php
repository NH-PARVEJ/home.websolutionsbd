@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->

      <!--end::Row-->
      <!--begin::Row-->
      <div class="row g-5 g-xl-10">

        <div class="card">
            <!--begin::Body-->
            <div class="card-header">
               <h2 class="card-title fw-bold">Target</h2>
               <div class="card-toolbar">
                  <a href="" class="btn btn-primary btn-sm flex-shrink-0 me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_target">Add New Target</a>
               </div>
            </div>
         </div>


      <!--begin::Modal - New Target-->
		<div class="modal fade" id="kt_modal_target" tabindex="-1" aria-hidden="true">
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
                  <form action="{{route('target.store')}}" method="POST" enctype="multipart/form-data" class="form">
                     @csrf
                     <!--begin::Heading-->
							<div class="mb-13 text-center">
								<!--begin::Title-->
								<h1 class="mb-3">Add New Target</h1>
								<!--end::Description-->
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
                              <input type="date" class="form-control form-control-solid" name="month" value="{{old('month')}}"/>
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
                              <input type="number" class="form-control form-control-solid" name="target" value="{{old('target')}}"/>
                              <!--end::Input-->
                        </div>
                        <!--end::Col-->
                     </div>
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
						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - New Target-->

         <!--end::Col-->
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
                           <th>Month name</th>
                           <th>Target</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php 
                        $x = 1;
                        @endphp
                        @foreach ($targets as $target)
                        <tr>
                           <td>
                              <span class="fw-bold">{{$x++}}</span>
                           </td>
                           <td>
                              {{Carbon\Carbon::parse($target->month)->format('M-Y')}}
                           </td>
                           <td>
                              ${{number_format($target->target, 2)}}
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
                                    <a href="{{route('target.edit',$target->id)}}" class="menu-link px-3">Edit</a>
                                 </div>
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                    <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$target->id}}">Delete</a>
                                 </div>
                                 <!--end::Menu item-->
                              </div>
                           </td>
                           <!--begin::Modal - New Target-->
                           <div class="modal fade" id="kt_modal_delete{{$target->id}}" tabindex="-1" aria-hidden="true">
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
                                       <form action="{{route('target.destroy',$target->id)}}" method="POST" enctype="multipart/form-data" class="form">
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