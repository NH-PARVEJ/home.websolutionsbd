@extends('backend.layout.template')
@section('body_content')
<div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-10">
         <div class="card">
            <!--begin::Body-->
            <div class="card-header">
               <h2 class="card-title fw-bold">Loan</h2>
               <div class="card-toolbar">
                  <a class="btn btn-primary btn-sm flex-shrink-0 me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_bidding">Add New Loan</a>
               </div>
            </div>
         </div>
         <!--begin::Modal - New Target-->
         <div class="modal fade" id="kt_modal_bidding" tabindex="-1" aria-hidden="true">
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
                     <form action="{{route('loan.store')}}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_settings_general_form" class="form">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                           <!--begin::Title-->
                           <h1 class="mb-3">Add New Loan</h1>
                           <!--end::Description-->
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
                                 <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="type" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="Select a country">
                                    <option selected value="1">Intertainment</option>
                                    <option value="2">Cash</option>
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
                              <input type="text" class="form-control form-control-solid" name="instalment"/>
                              <!--end::Input-->
                              <!--begin::Input-->
                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                              <input type="hidden" name="status" value="1" />
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
                              <span class="required">Each Instalment Pay</span>
                              <span class="ms-1" data-bs-toggle="tooltip" title="">
                              <i class="ki-outline ki-information fs-7"></i>
                              </span>
                              </label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <input type="number" class="form-control form-control-solid" name="each_instalment_pay"/>
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
                              <input type="number" placeholder="৳" class="form-control form-control-solid" name="money"/>
                              <!--end::Input-->
                           </div>
                           <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="fv-row">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold form-label mt-3">
                           <span class="required">Payment Terms</span>
                           </label>
                           <!--end::Label-->
                           <div class="w-100">
                              <!--begin::Select2-->
                              <select id="kt_ecommerce_select2_country" class="form-select form-select-solid" name="payment_terms" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="Select a country">
                                 <option selected value="1">Day</option>
                                 <option value="2">Month</option>
                              </select>
                              <!--end::Select2-->
                           </div>
                           <!--end::Input group-->
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
                              <textarea  rows="4" cols="50" class="form-control form-control-solid" name="note"></textarea>
                              <!--end::Input-->
                           </div>
                           <!--begin::Col-->
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
                           <th>#Id</th>
                           <th>Date</th>
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
                        @php
                        $x = 1;
                        @endphp
                        @foreach ($loans as $loan)
                        @if(!empty(Auth::user()->id == $loan->user_id))
                        <tr>
                           <td><span class="fw-bold">{{$x++}}</span></td>
                           <td>{{\Carbon\Carbon::parse($loan->created_at)->format('F j, Y')}}</td>
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
                              @if($loan->status == 2)
                              <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                              <i class="ki-outline ki-dots-square fs-1"></i>
                              </button>
                              <!--begin::Menu 2-->
                              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                    <a class="menu-link px-3">Once approved, editing or Delete is not possible.</a>
                                 </div>
                                 <!--end::Menu item-->
                              </div>
                              @elseif($loan->status == 3)
                              <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                              <i class="ki-outline ki-dots-square fs-1"></i>
                              </button>
                              <!--begin::Menu 2-->
                              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                    <a class="menu-link px-3">Once Complete, editing or Delete is not possible.</a>
                                 </div>
                                 <!--end::Menu item-->
                              </div>
                              @else
                              <!--begin::Menu-->
                              <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                              <i class="ki-outline ki-dots-square fs-1"></i>
                              </button>
                              <!--begin::Menu 2-->
                              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                    <a href="{{route('user.loan.edit',$loan->id)}}" class="menu-link px-3">Edit</a>
                                 </div>
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                    <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_delete{{$loan->id}}">Delete</a>
                                 </div>
                                 <!--end::Menu item-->
                              </div>
                              @endif
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
                                       <form action="{{route('user.loan.destroy',$loan->id)}}" method="POST" enctype="multipart/form-data" class="form">
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
                        @else
                        @endif
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