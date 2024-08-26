<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="" data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Membership |  Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('_backend/_images/favicon.ico') }}">
   <!-- Canonical SEO -->

    <!-- End Google Tag Manager -->
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('_backend/_css/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('_backend/_css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('_backend/_css/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('_backend/_css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('_backend/_css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('_backend/_css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('_backend/_css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('_backend/_css/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('_backend/_css/custom.css') }}" />
    <!-- Vendor -->
<link rel="stylesheet" href="{{ asset('_backend/_css/formValidation.min.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="{{ asset('_backend/_css/page-auth.css') }}">
    <!-- Helpers -->
    <script src="{{ asset('_backend/_js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('_backend/_js/config.js') }}"></script>
</head>

<body>


  
  <!-- Content -->

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
<img src="{{ asset('_backend/_images/logo.png') }}" >


</span>
              <span class="app-brand-text demo text-body fw-bolder text-primary">Membership</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to Membership! 👋</h4>
          <form id="formAuthentication1" class="mb-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="auth-forgot-password-basic.html">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="auth-register-basic.html">
              <span>Create an account</span>
            </a>
          </p>

          <div class="divider my-2">
            <div class="divider-text"></div>
          </div>
 <span>Our Valuable Partners</span>
          <div class="d-flex justify-content-left">
            <!--
            <a href="https://royalsumo.com/" class="btn btn-icon btn-label-facebook me-3" target="_blank">
              <img src="https://royalsumo.com/frontend/images/favicon.png" class="rounded-circle">
            </a>
        -->
          </div>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<!-- / Content -->

  

  

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('_backend/_js/jquery.js') }}"></script>
  <script src="{{ asset('_backend/_js/popper.js') }}"></script>
  <script src="{{ asset('_backend/_js/bootstrap.js') }}"></script>
  <script src="{{ asset('_backend/_js/perfect-scrollbar.js') }}"></script>
  
  <script src="{{ asset('_backend/_js/hammer.js') }}"></script>
  <script src="{{ asset('_backend/_js/i18n.js') }}"></script>
  <script src="{{ asset('_backend/_js/typeahead.js') }}"></script>
  
  <script src="{{ asset('_backend/_js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('_backend/_js/FormValidation.min.js') }}"></script>
<script src="{{ asset('_backend/_js/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('_backend/_js/AutoFocus.min.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('_backend/_js/main.js') }}"></script>

  <!-- Page JS -->
  <script src="{{ asset('backend/js/pages-auth.js') }}"></script>
  
</body>

</html>

<!-- beautify ignore:end -->

