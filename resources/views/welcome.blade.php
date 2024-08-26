
<!DOCTYPE html>

<html lang="en" class="light-style  layout-navbar-fixed" dir="ltr" data-theme="theme-default" data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/" data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1" data-framework="laravel" data-template="front-menu-theme-default-light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Membership</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('_backend/_images/favicon.ico') }}">



<link rel="stylesheet" href="{{ asset('_backend/_css/boxicons.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/fontawesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/flag-icons.css') }}" />
<!-- Core CSS -->
    <!-- Core CSS -->
	<link rel="stylesheet" href="{{ asset('_backend/_css/core.css') }}" class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/theme-default.css') }}" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('_backend/_css/perfect-scrollbar.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/typeahead.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/custom.css') }}" />

<style>
  .mt-100{
    margin-top: 100px;
  }
  .layout-navbar{
    height: auto;
  }
</style>

</head>

<body>
<!-- Navbar: Start -->
<nav class="layout-navbar shadow-none py-0">
  <div class="container">
    <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4 ">
      <!-- Menu logo wrapper: Start -->
      <div class="navbar-brand app-brand demo d-flex py-0 me-4">
        <!-- Mobile menu toggle: Start-->
        <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="tf-icons bx bx-menu bx-sm align-middle"></i>
        </button>
        <!-- Mobile menu toggle: End-->
        <a href="{{ url('') }}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
              <img src="{{ asset('_backend/_images/logo.png') }}" >
  </span>
            <span class="app-brand-text demo menu-text fw-bold">𝕄embership</span>
          </a>
      </div>
      <!-- Menu logo wrapper: End -->
      <!-- Menu wrapper: Start -->
      <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
        <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="tf-icons bx bx-x bx-sm"></i>
        </button>
       
      </div>
      <div class="landing-menu-overlay d-lg-none"></div>
      <!-- Menu wrapper: End -->
      <!-- Toolbar: Start -->
      <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Style Switcher -->
        <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <i class='bx bx-sm'></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                <span class="align-middle"><i class='bx bx-sun me-2'></i>Light</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                <span class="align-middle"><i class="bx bx-moon me-2"></i>Dark</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                <span class="align-middle"><i class="bx bx-desktop me-2"></i>System</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- / Style Switcher-->
        
        <!-- navbar button: Start -->
        @if (Route::has('login'))
          @auth
          <li>
            <a href="{{ url('dashboard') }}" class="btn btn-primary"><span class="tf-icons bx bx-home me-md-1"></span><span class="d-none d-md-block">Dashboard</span></a>
          </li>
          @else
          <li>
            <a href="{{ url('login') }}" class="btn btn-primary"><span class="tf-icons bx bx-user me-md-1"></span><span class="d-none d-md-block">Login</span></a>
          </li>
          @endauth
        @endif
        
        <!-- navbar button: End -->
      </ul>
      <!-- Toolbar: End -->
    </div>
  </div>
</nav>
<!-- Navbar: End -->

<!-- Sections:Start -->
<div data-bs-spy="scroll" class="scrollspy-example">
  <!-- Contact Us: Start -->
  <section id="landingContact" class="section-py bg-body landing-contact">
    <div class="mt-100"></div>
    <div class="container"> 
      <div class="row">
        <div class="col-lg-3">
        
        </div>
        <div class="col-lg-6">
          <div class="contact-img-box position-relative border p-2 h-100 mt-10">
            <img src="{{ asset('_backend/_images/cover.svg')}}" alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid" />
            <div class="pt-3 px-4 pb-1">
              <div class="row gy-3 gx-md-4">
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="d-flex align-items-center">
                    <div class="badge bg-label-primary rounded p-2 me-2"><i class="bx bx-envelope bx-sm"></i></div>
                    <div>
                      <p class="mb-0">Email</p>
                      <h5 class="mb-0">
                        <a href="mailto:info@royalx.net" class="text-heading">info@royalx.net</a>
                      </h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="d-flex align-items-center">
                    <div class="badge bg-label-success rounded p-2 me-2">
                      <i class="bx bx-phone-call bx-sm"></i>
                    </div>
                    <div>
                      <p class="mb-0">Phone</p>
                      <h5 class="mb-0"><a href="tel:+959779888688" class="text-heading">+95 9779888688</a></h5>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-2 mb-md-0">
                    Royal Express © <script>
                    document.write(new Date().getFullYear())
                    </script>
                    , made with ❤️ by <a href="javascript:void();" class="footer-link fw-bolder">Business Support Team</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
        
        
      </div>
       
    </div>
   
  </section>
  <!-- Contact Us: End -->
</div>
<!-- / Sections:End -->

<!-- Footer: Start -->

<!-- Footer: End -->
  <!--/ Layout Content -->

  



</body>

</html>
