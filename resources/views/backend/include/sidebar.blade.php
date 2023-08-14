<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="275px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">
	<!--begin::Logo-->
	<div class="d-flex flex-stack px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">
	   <!--begin::Logo image-->
	   <a href="{{url('/')}}"><img alt="Logo" src="{{asset('backend/assets/media/settings/logo.png')}}" class="h-20px h-lg-30px theme-light-show" /></a>
	   <!--begin::User menu-->  
	   <div class="ms-3">
		  <!--begin::Menu wrapper-->
		  <div class="cursor-pointer position-relative symbol symbol-circle symbol-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
			 @if(!is_Null(Auth::user()->image))
			 <img src="{{asset('backend/assets/media/user/'. Auth::user()->image)}}" alt="user" />
			 @else
			 <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
			 @endif
			 <div class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3"></div>
		  </div>
		  <!--begin::User account menu-->
		  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
			 <!--begin::Menu item-->
			 <div class="menu-item px-3">
				<div class="menu-content d-flex align-items-center px-3">
				   <!--begin::Avatar-->
				   <div class="symbol symbol-50px me-5">
					  @if(!is_Null(Auth::user()->image))
					  <img src="{{asset('backend/assets/media/user/'. Auth::user()->image)}}" alt="user" />
					  @else
					  <img src="{{asset('backend/assets/media/user/user.png')}}" alt="user" />
					  @endif
				   </div>
				   <!--end::Avatar-->
				   <!--begin::Username-->
				   <div class="d-flex flex-column">
					  <div class="fw-bold d-flex align-items-center fs-5">
						 @php echo ucfirst(strtolower(Auth::user()->name)); @endphp
					  </div>
					  <a href="mailto:{{Auth::user()->email}}" class="fw-semibold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
				   </div>
				   <!--end::Username-->
				</div>
			 </div>
			 <!--end::Menu item-->
			 <!--begin::Menu separator-->
			 <div class="separator my-2"></div>
			 <!--end::Menu separator-->
			 <!--begin::Menu item-->
			 <div class="menu-item px-5">
				@if(Auth::user()->role == 1)
				<a href="{{route('admin.dashboard')}}" class="menu-link px-5">Dashboard</a>
				@else
				<a href="{{route('user.dashboard')}}" class="menu-link px-5">Dashboard</a>
				@endif
			 </div>
			 <!--end::Menu item-->
			 <!--begin::Menu separator-->
			 <div class="separator my-2"></div>
			 <!--end::Menu separator-->
			 <!--begin::Menu item-->
			 <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
				<a href="#" class="menu-link px-5">
				<span class="menu-title position-relative">Mode
				<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
				<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
				<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
				</span></span>
				</a>
				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
				   <!--begin::Menu item-->
				   <div class="menu-item px-3 my-0">
					  <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
					  <span class="menu-icon" data-kt-element="icon">
					  <i class="ki-outline ki-night-day fs-2"></i>
					  </span>
					  <span class="menu-title">Light</span>
					  </a>
				   </div>
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   <div class="menu-item px-3 my-0">
					  <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
					  <span class="menu-icon" data-kt-element="icon">
					  <i class="ki-outline ki-moon fs-2"></i>
					  </span>
					  <span class="menu-title">Dark</span>
					  </a>
				   </div>
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   <div class="menu-item px-3 my-0">
					  <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
					  <span class="menu-icon" data-kt-element="icon">
					  <i class="ki-outline ki-screen fs-2"></i>
					  </span>
					  <span class="menu-title">System</span>
					  </a>
				   </div>
				   <!--end::Menu item-->
				</div>
				<!--end::Menu-->
			 </div>
			 <!--end::Menu item-->
			 <!--begin::Menu item-->
			 <div class="menu-item px-5 my-1">
				@if(Auth::user()->role == 1)
				<a href="{{route('user.edit',Auth::user()->id)}}" class="menu-link px-5">Update Profile</a>
				@else
				<a href="{{route('user.profile.edit',Auth::user()->id)}}" class="menu-link px-5">Update Profile</a>
				@endif
			 </div>
			 <!--end::Menu item-->
			 <!--begin::Menu item-->
			 <div class="menu-item px-5">
				<form method="POST" action="{{ route('logout') }}">
				   @csrf
				   <a class="menu-link px-5" href="{{route('logout')}}" onclick="event.preventDefault();
					  this.closest('form').submit();" >{{ __('Log Out') }}</a>
				</form>
			 </div>
			 <!--end::Menu item-->
		  </div>
		  <!--end::User account menu-->
		  <!--end::Menu wrapper-->
	   </div>
	   <!--end::User menu-->
	</div>
	<!--end::Logo-->
	<!--begin::Sidebar nav-->
	<div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">
	   <!--begin::Nav wrapper-->
	   <div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column hover-scroll-y pe-4 me-n4" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_nav" data-kt-scroll-offset="5px">
		  <!--begin::Progress-->
		  <div class="d-flex align-items-center flex-column w-100 mb-6">
			 <div class="d-flex justify-content-between fw-bolder fs-6 text-gray-800 w-100 mt-auto mb-3">
				<span>Your Goal</span>
			 </div>
			 <div class="w-100 bg-light-primary rounded mb-2" style="height: 24px">
				<div class="bg-primary rounded" role="progressbar" style="height: 24px; width: 37%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
			 </div>
			 <div class="fw-semibold fs-7 text-primary w-100 mt-auto">
				<span>reached 37% of your target</span>
			 </div>
		  </div>
		  <!--end::Progress-->
		  <!--begin::Stats-->
		  <div class="d-flex mb-3 mb-lg-6">
			 <!--begin::Stat-->
			 <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6">
				<!--begin::Date-->
				<span class="fs-6 text-gray-500 fw-bold">Target</span>
				<!--end::Date-->
				<!--begin::Label-->
				<div class="fs-2 fw-bold text-success">
				   @if(!empty($latest_target->target))
				   $ {{number_format($latest_target->target, 2)}}
				   @else
				   $ {{number_format(00, 2)}}
				   @endif
				</div>
				<!--end::Label-->
			 </div>
			 <!--end::Stat-->
			 <!--begin::Stat-->
			 <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4">
				<!--begin::Date-->
				<span class="fs-6 text-gray-500 fw-bold">Achieve</span>
				<!--end::Date-->
				<!--begin::Label-->
				<div class="fs-2 fw-bold text-danger">
				   @php
				   $total = 0;
				   @endphp
				   @foreach($project_current_month as $the_month)
				   @if($the_month->status == 4)
				   @php
				   $total = $total + $the_month->project_price;
				   @endphp
				   @endif
				   @endforeach
				   $ {{number_format($total, 2)}}
				</div>
				<!--end::Label-->
			 </div>
			 <!--end::Stat-->
		  </div>
		  <!--end::Stats-->
		  <!--begin::Links-->
		  <div class="mb-6">
			 <!--begin::Row-->
			 <div class="row mt-3 row-cols-3" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
				<!--begin::Col-->
				@if(Auth::User()->role == 1)
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('user.profile', Auth::user()->id)}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-user fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Employee</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@endif
				<!--begin::Col-->
				@if(Auth::User()->role == 1)
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('admin.attendance.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="fa-solid fa-fingerprint fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Attendance</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@else
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('user.attendance.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="fa-solid fa-fingerprint fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Attendance</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@endif
				@if(Auth::user()->role == 1)
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('admin.project.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-abstract-26 fs-2"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Project</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@else
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('user.project.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-abstract-26 fs-2"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Project</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@endif
				<!--end::Col-->
				@if(Auth::user()->role == 1)
				<!--begin::Col-->
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('admin.leave.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-calendar fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Leave</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@else
				<!--begin::Col-->
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('user.leave.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-calendar fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Leave</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@endif
				<!--end::Col-->
				<!--begin::Col-->
				@if(Auth::user()->role == 1)
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('admin.loan.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-chart-line-up-2 fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Loan</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@else
				<!--end::Col-->
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('user.loan.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-chart-line-up-2 fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Loan</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				<!--begin::Col-->
				@endif
				@if(Auth::user()->role == 1)
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-shield-tick fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Expance</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@else
				@endif
				@if(Auth::user()->role == 1)
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('target.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-rocket fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Target</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@else
				@endif
				@if(Auth::User()->role == 1)
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('admin.screenshot.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-screen fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Screenshot</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@else
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('user.screenshot.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-screen fs-1"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Screenshot</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@endif
				@if(Auth::user()->role == 1)
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('department.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="fa-regular fa-chart-bar fs-2"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Department</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('designation.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="far fa-address-card fs-2"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Designation</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				<div class="col mb-4">
				   <!--begin::Link-->
				   <a href="{{route('settings.manage')}}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
					  <!--begin::Icon-->
					  <span class="mb-2">
					  <i class="ki-outline ki-setting-2 fs-2"></i>
					  </span>
					  <!--end::Icon-->
					  <!--begin::Label-->
					  <span class="fs-7 fw-bold">Settings</span>
					  <!--end::Label-->
				   </a>
				   <!--end::Link-->
				</div>
				@else
				@endif
			 </div>
			 <!--end::Row-->
		  </div>
		  <!--end::Links-->
	   </div>
	   <!--end::Nav wrapper-->
	</div>
	<!--end::Sidebar nav-->
	<!--begin::Footer-->
	<!--end::Footer-->
 </div>