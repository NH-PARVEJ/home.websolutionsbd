@extends('backend.layout.template')
@section('body_content')
{{-- <div id="kt_app_content" class="app-content flex-column-fluid">
   <!--begin::Content container-->
   <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->

      <!--end::Row-->
      <!--begin::Row-->
      <div class="row g-5 g-xl-10">

        <div class="card">
            <!--begin::Body-->
            <div class="card-header">
               <h2 class="card-title fw-bold">Leave</h2>
               <div class="card-toolbar">
                  <a href="{{route('leave.create')}}">
                  <button class="btn btn-flex btn-primary" data-kt-calendar="add">
                  <i class="ki-outline ki-plus fs-2"></i>Add New leave</button>
                  </a>
               </div>
            </div>
         </div>
         <!--begin::Col-->
         <div class="col-xl-4 mb-xl-10">
            <!--begin::Contacts-->
            <div class="card card-flush" id="kt_contacts_list">
               <!--begin::Card header-->
               <div class="card-header pt-7" id="kt_contacts_list_header">
                  <!--begin::Form-->
                  <form class="d-flex align-items-center position-relative w-100 m-0" autocomplete="off">
                     <!--begin::Icon-->
                     <i class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"></i>
                     <!--end::Icon-->
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid ps-13" name="search" value="" placeholder="Search contacts" />
                     <!--end::Input-->
                  </form>
                  <!--end::Form-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body pt-5" id="kt_contacts_list_body">
                  <!--begin::List-->
                  @foreach ($users as $user)
                  <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header" data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body" data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px">
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-40px symbol-circle">
                              @if(!empty($user->image))
                              <img alt="Pic" src="{{asset('backend/assets/media/user/'. $user->image)}}" />
                              @else
                              <img alt="Pic" src="{{asset('backend/assets/media/user/user.png')}}" />
                              @endif
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-4">
                              <a href="{{route('user.profile',$user->id)}}" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">{{$user->name}}</a>
                              <div class="fw-semibold fs-7 text-muted">{{$user->email}}</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                     </div>
                     <!--end::User-->
                     <!--begin::Separator-->
                     <div class="separator separator-dashed d-none"></div>
                     <!--end::Separator-->
                     <!--end::User-->
                  </div>
                  @endforeach
                  <!--end::List-->
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Contacts-->
         </div>
         <!--end::Col-->
         <!--begin::Col-->
         <div class="col-xl-8 mb-5 mb-xl-10">
            <!--begin::Table widget 6-->
            <div class="card card-flush">
               <!--begin::Card header-->
               <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                  <!--begin::Card title-->
                  <div class="card-title">
                     <!--begin::Search-->
                     <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                        <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" />
                     </div>
                     <!--end::Search-->
                  </div>
                  <!--end::Card title-->
                  <!--begin::Card toolbar-->
                  <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                     <div class="w-100 mw-150px">
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                           <option></option>
                           <option value="all">All</option>
                           <option value="published">Published</option>
                           <option value="inactive">Inactive</option>
                        </select>
                        <!--end::Select2-->
                     </div>
                  </div>
                  <!--end::Card toolbar-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body pt-0">
                  <!--begin::Table-->
                  <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                     <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                           <th class="w-10px pe-2">
                              <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                 <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                              </div>
                           </th>
                           <th class="min-w-20px">#Id</th>
                           <th class="text-end min-w-100px">NAME</th>
                           <th class="text-end min-w-100px">START TIME</th>
                           <th class="text-end min-w-100px">END TIME</th>
                           <th class="text-end min-w-50px">LEAVE TYPE</th>
                           <th class="text-end min-w-20px">NO OF DAYS</th>
                           <th class="text-end min-w-20px">STATUS</th>
                           <th class="text-end min-w-100px">Actions</th>
                          
                        </tr>
                     </thead>
                     <tbody class="fw-semibold text-gray-600">
                        @foreach($users as $user)
                        @foreach ($attendances as $attendance)
                        @if(!empty($user->id == $attendance->user_id))
                        <tr>
                           <td>
                              <div class="form-check form-check-sm form-check-custom form-check-solid">
                                 <input class="form-check-input" type="checkbox" value="1" />
                              </div>
                           </td>
                           <td>
                              <span class="fw-bold">{{$attendance->id}}</span>
                           </td>
                           <td class="text-end pe-0" data-order="30">
                              <span class="fw-bold ms-3">
                              @if($user->id == $attendance->user_id)
                              {{$user->name}}
                              @else
                              @endif
                              </span>
                           </td>
                           <td class="text-end pe-0">
                              {{Carbon\Carbon::parse($attendance->time)->format('d-F-Y')}}
                           </td>
                           <td class="text-end pe-0">
                              {{Carbon\Carbon::parse($attendance->date)->format('h:i:s A')}}
                           </td>
                           <td class="text-end pe-0">{{$attendance->attendance_status}}</td>
                           <td class="text-end pe-0">
                              <div class="badge badge-light-primary">{{$attendance->ip_address}}</div>
                           </td>
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
</div> --}}
@endsection