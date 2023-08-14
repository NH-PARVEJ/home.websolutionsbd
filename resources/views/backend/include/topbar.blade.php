<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
   <!--begin::Header wrapper-->
   <div class="app-header-wrapper d-flex flex-grow-1 align-items-stretch justify-content-between" id="kt_app_header_wrapper">
      <!--begin::Menu wrapper-->

      <!--end::Menu wrapper-->
      <!--begin::Logo wrapper-->
      <div class="d-flex align-items-center">
         <!--begin::Logo wrapper-->
         <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary ms-n3 me-2 d-flex d-lg-none" id="kt_app_sidebar_toggle">
            <i class="ki-outline ki-abstract-14 fs-2"></i>
         </div>
         <!--end::Logo wrapper-->
         <!--begin::Logo image-->
         <a href="" class="d-flex d-lg-none">
            <img src="{{asset('backend/assets/media/settings/logo.png')}}" alt="user" />
         </a>
         <!--end::Logo image-->
      </div>
      <!--end::Logo wrapper-->
      <!--begin::Navbar-->
      <div class="app-navbar flex-shrink-0">
         <!--begin::Chat-->
         <div class="app-navbar-item ms-1 ms-lg-3">
            <!--begin::Menu wrapper-->
            <div class="btn btn-icon btn-circle btn-color-gray-500 btn-active-color-primary btn-custom shadow-xs bg-body" >
               <a href=""><i class="ki-outline ki-message-notif fs-1"></i></a>
            </div>
            <!--end::Menu wrapper-->
         </div>
         <!--end::Chat-->
         <!--begin::Header menu mobile toggle-->
         <div class="app-navbar-item d-lg-none ms-2 me-n1" title="Show header menu">
            <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary" id="kt_app_header_menu_toggle">
               <i class="ki-outline ki-text-align-left fs-2 fw-bold"></i>
            </div>
         </div>
         <!--end::Header menu mobile toggle-->
      </div>
      <!--end::Navbar-->
   </div>
   <!--end::Header wrapper-->
</div>