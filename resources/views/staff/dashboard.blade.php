<!DOCTYPE html>
<html lang="en" class="light-style layout-compact  layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-base-url="" data-framework="laravel" data-template="horizontal-menu-theme-default-light">
<head>
  	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	  <meta name="csrf-token" content="{{ csrf_token() }}">
  	<title>Membership |  Dashboard</title>


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
					@include('layouts.staff-aside')
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
            <span class="avatar-initial rounded bg-label-warning"><i class='bx bxs-user'></i></span>
          </div>
          <h4 class="ms-1 mb-0 pending-count">{{ member_status('all')['pending']? member_status('all')['pending']->total:0 }}</h4>
        </div>
        <p class="mb-1">Pending Members</p>
        <p class="mb-0">
          <span class="fw-medium me-1">{{ member_status('today')['pending']? member_status('today')['pending']->total:0 }}</span>
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
            <span class="avatar-initial rounded bg-label-success"><i class='bx bxs-user'></i></span>
          </div>
          <h4 class="ms-1 mb-0 approved-count">{{ member_status('all')['approved']? member_status('all')['approved']->total:0 }}</h4>
        </div>
        <p class="mb-1">Approved Members</p>
        <p class="mb-0">
          <span class="fw-medium me-1">{{ member_status('today')['approved']? member_status('today')['approved']->total:0 }}</span>
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
            <span class="avatar-initial rounded bg-label-danger"><i class='bx bxs-user'></i></span>
          </div>
          <h4 class="ms-1 mb-0 rejected-count">{{ member_status('all')['rejected']? member_status('all')['rejected']->total:0 }}</h4>
        </div>
        <p class="mb-1">Rejected Members</p>
        <p class="mb-0">
          <span class="fw-medium me-1">{{ member_status('today')['rejected']? member_status('today')['rejected']->total:0 }}</span>
          <small class="text-muted">(Today)</small>
        </p>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <!-- Vehicles overview -->
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
                <th class="text-start pe-0 text-nowrap">Icode</th>
                <th class="text-start pe-0 text-nowrap">Mobile</th>
                <th class="text-end pe-0">Status</th>
              </tr>
              @foreach(latest_member_lists(10) as $member)
              <tr>
                <td class="w-50 ps-0">
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-2">
                      <i class="bx bxs-user"></i>
                    </div>
                    <h6 class="mb-0 fw-normal">{{ $member->name }}</h6>
                  </div>
                </td>
                <td class="text-start pe-0 text-nowrap">
                  <h6 class="mb-0">{{ $member->icode }}</h6>
                </td>
                <td class="text-start pe-0 text-nowrap">
                  <h6 class="mb-0">{{ $member->mobile }}</h6>
                </td>
                <td class="text-end pe-0">
                  <span class="fw-medium">{!! status($member->status) !!}</span>
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
  <!--/ Vehicles overview -->


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

    var firebaseConfig = {
        // apiKey: "XXXXXXXXXXX",
        // authDomain: "XXXXXXXX",
        // projectId: "XXXXXXXX",
        // storageBucket: "XXXXXXXXXX",
        // messagingSenderId: "XXXXXXXXX",
        // appId: "XXXXXXXXXXXXX",
        // measurementId: "G-XXXXX"
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
                console.log(token);

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

   
      $(document).ready(function(){
        total = 0;
        pending     = parseInt($(".pending-count").text());
        approved    = parseInt($(".approved-count").text());
        rejected    = parseInt($(".rejected-count").text());
        total       = pending + approved + rejected;

        console.log(total);
        $(".total-count").text(total);
      });

</script>

	
</body>
</html>
