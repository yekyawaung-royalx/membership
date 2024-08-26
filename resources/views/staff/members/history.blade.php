<!DOCTYPE html>
<html lang="en" class="light-style layout-compact  layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-base-url="" data-framework="laravel" data-template="horizontal-menu-theme-default-light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Membership | View Member</title>
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="">
    <!-- Favicon -->
   
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
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

    <link rel="stylesheet" href="{{ asset('_backend/_css/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('_backend/_css/animate.css') }}" />

    <script src="{{ asset('_backend/_js/helpers1.js') }}"></script>
    <script src="{{ asset('_backend/_js/template-customizer-cdn.js') }}"></script>
    <script src="{{ asset('_backend/_js/config.js') }}"></script>
    <script src="{{ asset('_backend/_js/customizer.js') }}"></script>
</head>
<body>
    <!-- Layout Content -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
                <!-- Navbar -->
            @include('layouts.navbar')
            <!-- / Navbar -->

                <!-- Layout page -->
                <div class="layout-page">
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        @include('layouts.staff-aside')
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="py-2 mb-2">
                                        <a href="{{ url('dashboard') }}" class="text-primary fw-light">Dashboard </a> 
										<a href="{{ url('members/all') }}" class="text-primary fw-light">> Members </a> 
                                        <a href="{{ url('members/view/'.$member->id) }}" class="text-primary fw-light">> {{ $member->name }} </a> 
                                        <span class="text-muted fw-light">> Histories<span class="fw-bolder"></span></span> 
                                    </h5>
                                </div>
                                <div class="col-md-4">
															
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
                                    <div class="card card-border-shadow-primary h-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="text-center" cursorshover="true">
                                                        <img src="{{ asset('_backend/_images/user.png') }}" alt="Avatar" class="rounded-circle selfie {{ $member->user_level == 1? 'silver-badge':'gold-badge'}}" cursorshover="true">
                                                        <span class="user-level text-primary">Level <span class="label-user-level">{{ $member->user_level }}</span></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Gender</small>
                                                        <h6 class="mb-0 text-primary">{{ $member->gender }}&nbsp;</h6>
                                                    </div>
                                                    <div class="me-2 mt-4">
                                                        <small class="text-muted d-block mb-1">Date Of Birth</small>
                                                        <h6 class="mb-0 text-primary">{{ $member->dob }}&nbsp;</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="p-0 m-0">
                                                <li class="list-unstyled my-3 pb-1">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                <div class="me-2">
                                                                    <small class="text-muted d-block mb-1">Name</small>
                                                                    <h6 class="mb-0">{{ $member->name }}&nbsp;</h6>
                                                                </div>
                                                            </div>
                                                            <hr class="mb-2">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                <div class="me-2">
                                                                    <small class="text-muted d-block mb-1">Mobile</small>
                                                                    <h6 class="mb-0">{{ $member->mobile }}&nbsp;</h6>
                                                                </div>
                                                            </div>
                                                            <hr class="mb-2">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-unstyled my-3 pb-1">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                <div class="me-2">
                                                                    <small class="text-muted d-block mb-1">Icode</small>
                                                                    <h6 class="mb-0 label-icode">{{ $member->icode }}&nbsp;</h6>
                                                                </div>
                                                            </div>
                                                            <hr class="mb-2">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                <div class="me-2">
                                                                    <small class="text-muted d-block mb-1">NRC</small>
                                                                    <h6 class="mb-0 ">{{ $member->nrc }}&nbsp;</h6>
                                                                </div>
                                                            </div>
                                                            <hr class="mb-2">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-unstyled my-3 pb-1">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                <div class="me-2">
                                                                    <small class="text-muted d-block mb-1">state</small>
                                                                    <h6 class="mb-0">{{ $member->state_name }}&nbsp;</h6>
                                                                </div>
                                                            </div>
                                                            <hr class="mb-2">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                <div class="me-2">
                                                                    <small class="text-muted d-block mb-1">City</small>
                                                                    <h6 class="mb-0">&nbsp;</h6>
                                                                </div>
                                                            </div>
                                                            <hr class="mb-2">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex my-3 pb-1">
                                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                        <div class="me-2">
                                                            <small class="text-muted d-block mb-1">Township</small>
                                                            <h6 class="mb-0">{{ $member->township_name }}&nbsp;</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-unstyled">
                                                    <hr class="m-0">
                                                </li>
                                                <li class="d-flex my-3 pb-1">
                                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                        <div class="me-2">
                                                            <small class="text-muted d-block mb-1">Address</small>
                                                            <h6 class="mb-0">{{ $member->address }}&nbsp;</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-unstyled">
                                                    <hr class="m-0">
                                                </li>
                                                <label class="form-check-label custom-option-content form-check-primary mt-2" for="customCheckTemp'">
                                                    <input class="form-check-input member-active" type="checkbox" {{ $member->active == 1? 'checked':'' }} disabled/>
                                                    <span class="custom-option-header">
                                                    <span class="h6">Active</span>
                                                    </span>
                                                </label>
                                            </ul>

					                    </div>
					                </div>
				                </div>

                                <div class="col-md-6">
                                    <div class="accordion accordion-header-primary" id="accordionStyle1">
                                        @foreach($histories as $key => $history)
                                            <div class="accordion-item card {{$key == 0? 'active':''}}">
                                            <h2 class="accordion-header">
                                                <button type="button" class="accordion-button {{$key == 0? '':'collapsed'}}" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-{{$key}}" aria-expanded="true" cursorshover="true">
                                                {{ $history->created_at }} 
                                                </button>
                                            </h2>
                                    
                                            <div id="accordionStyle1-{{$key}}" class="accordion-collapse collapse {{$key==0? 'show':''}}" data-bs-parent="#accordionStyle1" style="">
                                                <div class="accordion-body">
                                                    <div class="table-responsive text-nowrap">
                                                        <table class="table table-bordered custom-table">
                                                          <thead>
                                                            <tr>
                                                              <th>Field</th>
                                                              <th>Value</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                                <td class="text-muted">Name</td>
                                                                <td>{{ $history->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">ICode</td>
                                                                <td>{{ $history->icode }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">DOB</td>
                                                                <td>{{ $history->dob }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Gender</td>
                                                                <td>{{ $history->gender }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Passcode</td>
                                                                <td>{{ $history->passcode }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">NRC</td>
                                                                <td>{{ $history->nrc }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Level</td>
                                                                <td>{{ $history->user_level }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">State</td>
                                                                <td>{{ $history->state_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Township</td>
                                                                <td>{{ $history->township_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Address</td>
                                                                <td>{{ $history->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">NRC Front Photo</td>
                                                                <td>{{ $history->nrc_front_photo }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">NRC Back Photo</td>
                                                                <td>{{ $history->nrc_back_photo }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Selfie Photo</td>
                                                                <td>{{ $history->selfie_photo }}</td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                </div>
                                            </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div> 
					        </div>
					    </div>
					    <!-- / Content -->

					    <input type="hidden" id="url" value="{{ url('') }}">
					    <input type="hidden" id="token" value="{{ csrf_token() }}">
						<input type="hidden" id="item" value="{{ $member->id }}">
						<input type="hidden" id="user" value="{{ profile()->name }}">
												
					    <!-- Footer -->
					    @include('layouts.footer')
					    <!-- / Footer -->
					    <div class="content-backdrop fade"></div>
					</div>
				<!--/ Content wrapper -->
				</div>
				<!-- / Layout page -->
			</div>

			<!-- Overlay -->
			<div class="layout-overlay layout-menu-toggle"></div>
			<!-- Drag Target Area To SlideIn Menu On Small Screens -->
			<div class="drag-target"></div>
		</div>
		<!--/ Layout Content -->

	<!-- BEGIN: Vendor JS-->
	<script src="{{ asset('_backend/_js/jquery.js') }}"></script>
	<script src="{{ asset('_backend/_js/popper.js') }}"></script>
	<script src="{{ asset('_backend/_js/bootstrap.js') }}"></script>
	<script src="{{ asset('_backend/_js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('_backend/_js/hammer.js') }}"></script>
	<script src="{{ asset('_backend/_js/typeahead.js') }}"></script>
	<script src="{{ asset('_backend/_js/menu.js') }}"></script>
	<script src="{{ asset('_backend/_js/ui-toasts.js') }}"></script>
	<!-- END: Page Vendor JS-->
	<!-- BEGIN: Theme JS-->
	<script src="{{ asset('_backend/_js/main.js') }}"></script>
	<!-- END: Page JS-->

	<script type="text/javascript">
		$(document).ready(function(){
			var url        = $("#url").val();
			var token      = $("#token").val();
		});
	</script>
</body>
</html>
