<!DOCTYPE html>
<html lang="en" class="light-style layout-compact  layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-base-url="" data-framework="laravel" data-template="horizontal-menu-theme-default-light">
<head>
  	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
  	<title>Membership |  Dashboard</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('_backend/_images/favicon.ico') }}">

  	<!-- BEGIN: Theme CSS-->
	<!-- Fonts -->
	<link rel="stylesheet" href="{{ asset('_backend/_css/boxicons.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/fontawesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/flag-icons.css') }}" />
	<!-- Core CSS -->
	<link rel="stylesheet" href="{{ asset('_backend/_css/core.css') }}" class="template-customizer-core-css1" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/theme-default.css') }}" class="template-customizer-theme-css1" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/demo.css') }}" />
	<!-- Vendors CSS -->
	<link rel="stylesheet" href="{{ asset('_backend/_css/perfect-scrollbar.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/typeahead.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/custom.css') }}" />

	<script src="{{ asset('_backend/_js/helpers1.js') }}"></script>
	<script src="{{ asset('_backend/_js/template-customizer-cdn.js') }}"></script>
 	<script src="{{ asset('_backend/_js/config.js') }}"></script>
 	<script src="{{ asset('_backend/_js/customizer.js') }}"></script>
</head>
<body onload="initFirebaseMessagingRegistration()">
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
					@include('layouts.admin-aside')
        				<!-- Content -->
		                  	<div class="container-xxl flex-grow-1 container-p-y">
		                  		<div class="row">
                                    <div class="col-md-4">
                                        <h5 class="py-2 mb-2">
                                            <span class="text-muted fw-light"> Dashboard</span> 
                                        </h5>
                                    </div>
                                    <div class="col-md-8">
                                                            
                                    </div>
                                </div>
						<div class="row">
							<div class="col-sm-6 col-lg-3 mb-4">
							    	<div class="card card-border-shadow-primary h-100">
								      	<div class="card-body">
									        <div class="d-flex align-items-center mb-2 pb-1">
									          	<div class="avatar me-2">
									            		<span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
									          	</div>
									          	<h4 class="ms-1 mb-0 total-count">--</h4>
									        </div>
									        <p class="mb-1">Total Members</p>
									        <p class="mb-0">
									          	<span class="fw-medium me-1">0</span>
									          	<small class="text-muted">(Today)</small>
									        </p>
									</div>
							    	</div>
							</div>
							<div class="col-sm-6 col-lg-3 mb-4">
							    	<div class="card card-border-shadow-warning h-100">
								      	<div class="card-body">
									        <div class="d-flex align-items-center mb-2 pb-1">
										        <div class="avatar me-2">
										            	<span class="avatar-initial rounded bg-label-danger"><i class='bx bxs-user'></i></span>
										        </div>
									          	<h4 class="ms-1 mb-0 unverified-count">{{ member_status('all')['unverified']? member_status('all')['unverified']->total:0 }}</h4>
									        </div>
									        <p class="mb-1">Unverified Members</p>
									        <p class="mb-0">
									          	<span class="fw-medium me-1">{{ member_status('today')['unverified']? member_status('today')['unverified']->total:0 }}</span>
									          	<small class="text-muted">(Today)</small>
									        </p>
							      		</div>
							    	</div>
							</div>
							<div class="col-sm-6 col-lg-3 mb-4">
							    	<div class="card card-border-shadow-success h-100">
								      	<div class="card-body">
									        <div class="d-flex align-items-center mb-2 pb-1">
									          	<div class="avatar me-2">
									            		<span class="avatar-initial rounded bg-label-warning"><i class='bx bxs-user'></i></span>
									          	</div>
									          	<h4 class="ms-1 mb-0 processing-count">{{ member_status('all')['processing']? member_status('all')['processing']->total:0 }}</h4>
									        </div>
								        	<p class="mb-1">Processing Members</p>
								        	<p class="mb-0">
								          		<span class="fw-medium me-1">{{ member_status('today')['processing']? member_status('today')['processing']->total:0 }}</span>
								          		<small class="text-muted">(Today)</small>
								        	</p>
								      	</div>
							    	</div>
							</div>
							<div class="col-sm-6 col-lg-3 mb-4">
							    	<div class="card card-border-shadow-danger h-100">
								      	<div class="card-body">
									        <div class="d-flex align-items-center mb-2 pb-1">
									          	<div class="avatar me-2">
									            		<span class="avatar-initial rounded bg-label-success"><i class='bx bxs-user'></i></span>
									          	</div>
									          	<h4 class="ms-1 mb-0 verified-count">{{ member_status('all')['verified']? member_status('all')['verified']->total:0 }}</h4>
									        </div>
								        	<p class="mb-1">Verified Members</p>
								        	<p class="mb-0">
								          		<span class="fw-medium me-1">{{ member_status('today')['verified']? member_status('today')['verified']->total:0 }}</span>
								          		<small class="text-muted">(Today)</small>
								        	</p>
								      	</div>
							    	</div>
							</div>
						</div>
						<div class="row">
						  	<div class="col-xxl-8 mb-4 order-5 order-xxl-0">
							    	<div class="card h-100">
								      	<div class="card-header">
									        <div class="card-title mb-0">
									          	<h5 class="m-0">Latest Member Registered</h5>
									        </div>
								      	</div>
								      	<div class="card-body">
									        <div class="table-responsive">
									          	<table class="table card-table">
										            	<tbody class="table-border-bottom-0">
											              	<tr>
											                	<th class="w-50 ps-0">Username</th>
											                	<th class="text-start pe-0 text-nowrap">Ref</th>
											                	<th class="text-start pe-0 text-nowrap">Mobile</th>
											                	<th class="text-end pe-0">Status</th>
											              	</tr>
											              	@foreach(latest_member_lists(10) as $member)
											              	<tr>
												                <td class="w-50 ps-0">
													                <div class="d-flex justify-content-start align-items-center">
													                    	<div class="me-2">
													                      		<img src="{{ asset('_backend/_images/card.png') }}" class="avatar">
													                    	</div>
													                    	<h6 class="mb-0 fw-normal"><a href="{{ url('members/view/'.$member->id) }}" class="text-primary fw-semibold">{{ $member->name }}</a><br><small class="text-muted">{{ $member->registered_at }}</small></h6>
																			
													                </div>
												                </td>
												                <td class="text-start pe-0 text-nowrap">
												                  	<h6 class="mb-0">{{ $member->ref }}</h6>
												                </td>
												                <td class="text-start pe-0 text-nowrap">
												                  	<h6 class="mb-0">{{ $member->mobile }}</h6>
												                </td>
												                <td class="text-end pe-0">
												                  	<span class="fw-medium">{!! kyc_status($member->status) !!}</span>
												                </td>
											              	</tr>
											              	@endforeach
									            		</tbody>
									          	</table>
									          	@if(latest_member_lists(10)->isEmpty())
									          		<div class="alert alert-warning" role="alert">
									                                No data available.
									                        </div>
									          	@else
									          	<a href="{{ url('members/all') }}" class="btn btn-primary v-top w-100" cursorshover="true">
									            		<span class="tf-icons bx bx-show me-2" cursorshover="true"></span> View All Members
									          	</a>
									          	@endif
									        </div>
							      		</div>
							    	</div>
						  	</div>
						</div>
		               		</div>
		          		<!-- / Content -->

		      			<input type="hidden" id="url" value="{{ url('') }}">
			            	<input type="hidden" id="json-regions" value="{{ url('json/regions') }}">
			            	<input type="hidden" id="token" value="{{ csrf_token() }}">
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
	<!-- END: Page Vendor JS-->
	<!-- BEGIN: Theme JS-->
	<script src="{{ asset('_backend/_js/main.js') }}"></script>
	<!-- END: Page JS-->
	<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
	<script>
        $(document).ready(function(){
                total = 0;
                unverified     = parseInt($(".unverified-count").text());
                processing    = parseInt($(".processing-count").text());
                verified    = parseInt($(".verified-count").text());
                total       = unverified + processing + verified;

                $(".total-count").text(total);
            });
	    	var firebaseConfig = {
		        apiKey: "AIzaSyBMOs7y9LpkUM0fgqs34aVQogeh-qt0njg",
		  	authDomain: "vue-store-4651d.firebaseapp.com",
		  	databaseURL: "https://vue-store-4651d.firebaseio.com",
		  	projectId: "vue-store-4651d",
		  	storageBucket: "vue-store-4651d.appspot.com",
		  	messagingSenderId: "812944361809",
		  	appId: "1:812944361809:web:002d72bcd720aed357ab70"
	    	};

    		firebase.initializeApp(firebaseConfig);
    		const messaging = firebase.messaging();

    		function initFirebaseMessagingRegistration() {
	            	messaging
		            	.requestPermission()
		            	.then(function () {
		                	return messaging.getToken()
		            	})
	            		.then(function(token) {
	                //console.log(token);

	                $.ajaxSetup({
	                    headers: {
	                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                    }
	                });

	                $.ajax({
	                    url: '{{ route("save-token") }}',
	                    type: 'POST',
	                    data: {
	                        token: token
	                    },
	                    dataType: 'JSON',
	                    success: function (response) {
	                        console.log('Token saved successfully.');
	                    },
	                    error: function (err) {
	                        console.log('User Chat Token Error'+ err);
	                    },
	                });
	            	}).catch(function (err) {
	                	console.log('User Chat Token Error'+ err);
	            	});
    	 	}

	    	messaging.onMessage(function(payload) {
		        const noteTitle = payload.notification.title;
		        const noteOptions = {
		            body: payload.notification.body,
		            icon: payload.notification.icon,
		        };
	        	new Notification(noteTitle, noteOptions);
	    	});

   
      		
	</script>
</body>
</html>
