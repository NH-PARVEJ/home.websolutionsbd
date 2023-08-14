<!DOCTYPE html>
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
                     <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                           <!--begin::Title-->
                           <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                           <!--end::Title-->
                           <!--begin::Subtitle-->
                           <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                           <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Login options-->
                        <div class="row g-3 mb-9">
                           <!--begin::Col-->
                           <div class="col-md-6">
                              <!--begin::Google link=-->
                              <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                              <img alt="Logo" src="{{asset('backend/assets/media/svg/brand-logos/google-icon.svg')}}" class="h-15px me-3" />Sign in with Google</a>
                              <!--end::Google link=-->
                           </div>
                           <!--end::Col-->
                           <!--begin::Col-->
                           <div class="col-md-6">
                              <!--begin::Google link=-->
                              <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                              <img alt="Logo" src="{{asset('backend/assets/media/svg/brand-logos/apple-black.svg')}}" class="theme-light-show h-15px me-3" />
                              <img alt="Logo" src="{{asset('backend/assets/media/svg/brand-logos/apple-black-dark.svg')}}" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
                              <!--end::Google link=-->
                           </div>
                           <!--end::Col-->
                        </div>
                        <!--end::Login options-->
                        <!--begin::Separator-->
                        <div class="separator separator-content my-14">
                           <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                        </div>
                        <!--end::Separator-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                           <!--begin::Email-->
                           <input id="email" type="email" required="required" value="{{old('email')}}" for="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                           <x-input-error :messages="$errors->get('email')" class="mt-2" />
                           <!--end::Email-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3">
                           <!--begin::Password-->
                           <input id="password" required="required" type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
                           <x-input-error :messages="$errors->get('password')" class="mt-2" />
                           <!--end::Password-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                           <div></div>
                           <!--begin::Link-->
                           @if (Route::has('password.request'))
                           <a class="link-primary" href="{{ route('password.request') }}">
                           {{ __('Forgot your password?') }}
                           </a>
                           @endif
                           <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                           <button type="submit"  class="btn btn-primary">
                              <!--begin::Indicator label-->
                              <span class="indicator-label">Sign In</span>
                              <!--end::Indicator label-->
                              <!--begin::Indicator progress-->
                              <span class="indicator-progress">Please wait...
                              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                              <!--end::Indicator progress-->
                           </button>
                        </div>
                        <!--end::Submit button-->
                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                           <a href="{{ route('register') }}" class="link-primary">Sign up</a>
                        </div>
                        <!--end::Sign up-->
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