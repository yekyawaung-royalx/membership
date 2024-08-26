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
                    @include('layouts.aside')
                        <!-- Content -->
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="py-2 mb-2">
                                            <a href="{{ url('dashboard') }}" class="text-primary fw-light">Dashboard </a> 
                                            <span class="text-muted fw-light">> View User # <span class="fw-bolder">{{ $user->name }}</span></span> 
                                        </h5>
                                    </div>
                                    <div class="col-md-8">
                                                                
                                    </div>
                                </div>
                        <div class="row">
                        	
                        <div class="col-md-6">
                            <div class="card card-border-shadow-primary h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center" cursorshover="true">
                                                <img src="{{ asset('_backend/_images/user.png') }}" alt="Avatar" class="rounded-circle selfie" cursorshover="true">
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
                                                    <h6 class="mb-0 text-primary">{{ $user->name }}&nbsp;</h6>
                                                </div>
                                                </div>
                                                <hr class="mb-2">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Email</small>
                                        <h6 class="mb-0 text-primary">{{ $user->email }}&nbsp;</h6>
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
                                        <small class="text-muted d-block mb-1">User Role</small>
                                        <h6 class="mb-0 text-primary label-icode">{{ $user->role }}&nbsp;</h6>
                                    </div>
                                    </div>
                                    <hr class="mb-2">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">NRC</small>
                                        <h6 class="mb-0 text-primary">{{ $user->created_at }}&nbsp;</h6>
                                    </div>
                                    </div>
                                    <hr class="mb-2">
                                        </div>
                                    </div>
                                </li>
                                
                                </ul>
                                <div class="mt-4">
                                    <button type="button" class="btn btn-warning" cursorshover="true">Edit</button>
                                </div>

                                </div>
                            </div>
				        </div>

                        <div class="col-md-6">
                            <div class="card card-border-shadow-primary h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                        </div>
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


							<div class="bs-toast toast toast-placement-ex toast-top-right fade bg-secondary" id="successToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
								<div class="toast-header">
										<i class="bx bx-bell me-2"></i>
										<div class="me-auto fw-medium">Success</div>
										<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" cursorshover="true"></button>
								</div>
								<div class="toast-body">
										<span id="success-message">...</span>
								</div>
						</div>

						<div class="bs-toast toast toast-placement-ex toast-top-right fade  bg-danger" id="errorToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
							<div class="toast-header">
									<i class="bx bx-bell me-2"></i>
									<div class="me-auto fw-medium">Error</div>
									<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" cursorshover="true"></button>
							</div>
							<div class="toast-body">
									<span id="error-message"></span>
							</div>
					</div>







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
					                var url                 = $("#url").val();
					                var json_regions    = $("#json-regions").val();

					                var regions             = json_regions;
					                var token               = $("#token").val();


					                var fetched_data = function(){
					                        $.ajax({
					                            url: regions,
					                            type: 'GET',
					                            data: {},
					                            success: function(data){
					                                $.each(data.data, function (i, item) {
					                                    $("#fetched-data").append('<tr>'
					                                        +'<td class="text-muted">'+item.id+'</td>'
					                                        +'<td class="text-primary">'+item.mm_name+'<br>'+item.en_name+'</td>'
					                                        +'<td><span class="badge bg-label-primary">'+item.postal_code+'</span></td>'
					                                        +'<td><span class="badge bg-primary">'+item.total_townships+'</span></td>'
					                                        +'<td>'
					                                            +'<button type="button" class="btn btn-icon btn-primary btn-sm me-1" cursorshover="true">'
					                                                +'<span class="tf-icons bx bx-pencil" cursorshover="true"></span>'
					                                            +'</button>'
					                                            +'<button type="button" class="btn btn-icon btn-danger btn-sm" cursorshover="true">'
					                                                +'<span class="tf-icons bx bx-trash" cursorshover="true"></span>'
					                                            +'</button>'
					                                        +'</td>'
					                                    +'</tr>');
					                                });

					                                $(".data-loading").hide();

					                                $("#to-records").text(data.to);
					                                $("#total-records").text(data.total);
					                                $(".current-page").text(data.current_page);
					                                            
					                                if(data.prev_page_url === null){
					                                    $("#prev-btn").attr('disabled',true);
					                                }else{
					                                    $("#prev-btn").attr('disabled',false);
					                                }
					                                if(data.next_page_url === null){
					                                    $("#next-btn").attr('disabled',true);
					                                }else{
					                                    $("#next-btn").attr('disabled',false);
					                                }
					                                $("#prev-btn").val(data.prev_page_url);
					                                $("#next-btn").val(data.next_page_url);

					                                $.each(data.links, function( key, value ) {
					                                        $("#links").append('<button type="button" class="btn btn-primary btn-sm pagination-btn me-1 mb-1 '+(data.current_page == value.label ? 'disabled':(value.url == null ? 'disabled':''))+'" cursorshover="true" value="'+value.url+'">'+value.label+'</button>');
					                                });
					                            }
					                        });
					                };

					                $('body').delegate(".pagination-btn","click",function () {
					                        //clicked url json data
					                        $(".data-loading").show();
					                        $("#fetched-data").empty();
					                        $("#links").empty();

					                        var clicked_url = $(this).val();
					                        
					                        $(this).siblings().removeClass('active')
					                        $(this).addClass('active');
					                        $.ajax({
					                                url: clicked_url,
					                                type: 'GET',
					                                data: {},
					                                success: function(data){
					                                    $.each(data.data, function (i, item) {
					                                        $("#fetched-data").append('<tr>'
					                                                +'<td class="text-muted">'+item.Id+'</td>'
					                                                +'<td class="text-primary">'+item.MmName+'<br>'+item.EnName+'</td>'
					                                                +'<td><span class="badge bg-label-primary">'+item.PostalCode+'</span></td>'
					                                                +'<td><span class="badge bg-primary">'+item.TotalTownships+'</span></td>'
					                                                +'<td>'
					                                                        +'<button type="button" class="btn btn-icon btn-primary btn-sm me-1" cursorshover="true">'
					                                                            +'<span class="tf-icons bx bx-pencil" cursorshover="true"></span>'
					                                                        +'</button>'
					                                                        +'<button type="button" class="btn btn-icon btn-danger btn-sm" cursorshover="true">'
					                                                            +'<span class="tf-icons bx bx-trash" cursorshover="true"></span>'
					                                                        +'</button>'
					                                                +'</td>'
					                                            +'</tr>');
					                                    });

					                                    $(".data-loading").hide();
					                                        

					                                    $("#to-records").text(data.to);
					                                    $(".current-page").text(data.current_page);

					                                    if(data.prev_page_url === null){
					                                        $("#prev-btn").attr('disabled',true);
					                                    }else{
					                                        $("#prev-btn").attr('disabled',false);
					                                    }
					                                    if(data.next_page_url === null){
					                                        $("#next-btn").attr('disabled',true);
					                                    }else{
					                                        $("#next-btn").attr('disabled',false);
					                                    }
					                                    $("#prev-btn").val(data.prev_page_url);
					                                    $("#next-btn").val(data.next_page_url);

					                                    $.each(data.links, function( key, value ) {
					                                        $("#links").append('<button type="button" class="btn btn-primary btn-sm pagination-btn me-1 mb-1 '+(data.current_page == value.label ? 'disabled':(value.url == null ? 'disabled':''))+'" cursorshover="true" value="'+value.url+'">'+value.label+'</button>');
					                                    });
					                                }
					                        });
			});

			$('body').delegate(".btn-confirm","click",function () {
				uid = $(this).val();
				$('#ApprovedModal').modal('hide');

				$.ajax({
					url: url+'/api/approved-user-level',
					type: 'POST',
					data: {
						'uid':uid
					},
					success: function(data){
						if(data.success == 1){
							$("#success-message").text(data.message);
							$("#successToast").toast("show");
							$(".label-user-level").text(data.level);
							$(".selfie").removeClass('silver-badge');
							$(".selfie").addClass('gold-badge');
						}else{
							$("#error-message").text(data.message);
							$("#errorToast").toast("show");
							$(".label-user-level").text(data.level);
							$(".selfie").removeClass('silver-badge');
							$(".selfie").addClass('gold-badge');
						}

						$(".show-btn-approved").addClass('hide');
					}
				});

			});




			$('body').delegate(".btn-register","click",function () {
				id = $("#item").val();
				$('#RegisterModal').modal('hide');

				$.ajax({
		        	url: url+'/api/digital-register',
		            type: 'POST',
		            data: {
						id:id
					},
		            success: function(data){
						if(data.success == 1){
							$("#success-message").text(data.message);
							$("#successToast").toast("show");
							$(".label-icode").text(data.login);
							$(".show-btn-register").addClass('hide');
						}else{
							$("#error-message").text(data.message);
							$("#errorToast").toast("show");
							$(".show-btn-approved").removeClass('hide');
						}

						$(".show-btn-register").addClass('hide');
					}
				});
			});
										
			fetched_data();   


		});

	</script>
</body>
</html>
