<html lang="en">
   <!--begin::Head-->
   <head>
      @include('backend.include.header')
      @include('backend.include.css')
   </head>
   <!--end::Head-->
   <!--begin::Body-->
   <body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
      <!--begin::Root-->
      <div class="d-flex flex-column flex-root" id="kt_app_root">
         <!--begin::Page bg image-->
         <style>body { background-image: url("{{asset('backend/assets/media/auth/bg4.jpg')}}"); } [data-bs-theme="dark"] body { background-image: url('{{asset("backend/assets/media/auth/bg4-dark.jpg")}}'); }</style>
         <!--end::Page bg image-->
         <!--begin::Authentication - Sign-in -->
         <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
               <!--begin::Aside-->
               <div class="d-flex flex-center flex-lg-start flex-column">
                  <!--begin::Logo-->
                  <a href="" class="mb-7">
                  <img alt="Logo" width="200px" src="{{asset('backend/assets/media/settings/logo.png')}}" />
                  </a>
                  <!--end::Logo-->
               </div>
               <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
               <!--begin::Card-->
               <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                     <!--begin::Form-->
                     <!--begin::Form-->
                     <!-- Session Status -->
                     <form method="POST" action="{{ route('password.email') }}" class="form w-100" novalidate="novalidate" id="kt_password_reset_form" >
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                           <!--begin::Title-->
                           <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
                           <!--end::Title-->
                           <!--begin::Link-->
                           <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
                           <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                           <!--begin::Email-->
                           <input id="email" type="email" placeholder="Email" name="email"  required="required" value="{{old('email')}}" autocomplete="off" class="form-control bg-transparent" />
                           <x-input-error :messages="$errors->get('email')" class="mt-2" />
                           <!--end::Email-->
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                           <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
                              <!--begin::Indicator label-->
                              <span class="indicator-label">{{ __('Submit') }}</span>
                              <!--end::Indicator label-->
                              <!--begin::Indicator progress-->
                              <span class="indicator-progress">Please wait...
                              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                              <!--end::Indicator progress-->
                           </button>
                           <a href="{{route('login')}}" class="btn btn-light">{{ __('Cancel') }}</a>
                        </div>
                        <!--end::Actions-->
                     </form>
                     <!--end::Form-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Card-->
            </div>
            <!--end::Body-->
         </div>
         <!--end::Authentication - Sign-in-->
      </div>
      <!--end::Root-->
      <!--begin::Javascript-->
      <script>var hostUrl = "assets/";</script>
      <!--begin::Global Javascript Bundle(mandatory for all pages)-->
      <script src="{{asset('backend/assets/plugins/global/plugins.bundle.js')}}"></script>
      <script src="{{asset('backend/assets/js/scripts.bundle.js')}}"></script>
      <!--end::Global Javascript Bundle-->
      <!--begin::Custom Javascript(used for this page only)-->
      <script src="{{asset('backend/assets/js/custom/authentication/sign-in/general.js')}}"></script>
      <!--end::Custom Javascript-->
      <!--end::Javascript-->
   </body>
   <!--end::Body-->
</html>