<!DOCTYPE html>
<html lang="en" class="light-style layout-compact layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-base-url="" data-framework="laravel" data-template="horizontal-menu-theme-default-light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Membership | View Member</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('_backend/_images/favicon.ico') }}">
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
	<link rel="stylesheet" href="{{ asset('_backend/_css/spinkit.css') }}" />
	

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
                    	@include('layouts.admin-aside')
                        	<!-- Content -->
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="py-2 mb-2">
                                            <a href="{{ url('dashboard') }}" class="text-primary fw-light">Dashboard </a> 
											<a href="{{ url('members/all') }}" class="text-primary fw-light">> Members </a> 
                                            <span class="text-muted fw-light">> View Member # <span class="fw-bolder">{{ $member->name }}</span></span> 
                                        </h5>
                                    </div>
                                    <div class="col-md-4">
										<div class="pull-right">
											<a href="{{ url('members/'.$member->id.'/histories')}}" class="btn btn-primary v-top btn-sm" cursorshover="true" >
												<span class="tf-icons bx bx-history me-1" cursorshover="true"></span> Member Histories
											</a>
										</div>
                                    </div>
                                </div>

                        		<div class="row" id="section-block">
									<div class="col-md-6">
										<div class="card card-border-shadow-primary h-100">
											<div class="acc-message {{ $member->active == 0? '':'hide' }}">
												<div class="alert bg-danger fs-18 text-white" role="alert">
													This account has been suspended.
												</div>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-6">
														<div class="text-center" cursorshover="true">
															@if($member->selfie_photo != '')
															<img src="{{ $member->selfie_photo }}" alt="Selfie Photo" class="rounded-circle selfie {{ $member->user_level == 1? 'silver-badge':'gold-badge'}}" cursorshover="true">
															@else
															<img src="{{ asset('/_backend/_images/avatar.png') }}" alt="Selfie Photo" class="rounded-circle selfie {{ $member->user_level == 1? 'silver-badge':'gold-badge'}}" cursorshover="true">
															@endif
															<h5 class="user-level text-primary">Level <span class="label-user-level">{{ $member->user_level }}</span><br><small class="text-capitalize text-warning">{{ check_customer_type($member->ref) }}</small></h5>
														</div>
													</div>
													<div class="col-md-6">
														<div class="me-2">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <small class="text-muted d-block mb-1"><i class="tf-icons bx bx-wallet"></i> Points</small>
                                                                    <h6 class="mb-0 text-capitalize fs-18 text-primary">0.00 &nbsp;</h6>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted d-block mb-1"><i class="tf-icons bx bx-wallet"></i> Status</small>
                                                                    <p>{!! kyc_status($member->status) !!}</p>
                                                                </div>
                                                            </div>
														</div>
														<div class="me-2 mt-4">
															<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-calendar"></i> Member Since</small>
															<span class="mb-0 text-capitalize fs-16">{{ $member->registered_at }} &nbsp;</span>
														</div>
													</div>
												</div>
												<ul class="p-0 m-0">
													<li class="list-unstyled my-3 pb-1">
														<div class="row mb-4">
															<div class="col-md-6">
																<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
																	<div class="me-2">
																		<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-user"></i> Name</small>
																		<span class="mb-0 fs-16">{{ $member->name }}&nbsp;</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
																	<div class="me-2">
																		<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-phone"></i> Mobile</small>
																		<span class="mb-0 fs-16">{{ $member->mobile }}&nbsp;</span>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class="list-unstyled my-3 pb-1">
														<div class="row mb-4">
															<div class="col-md-6">
																<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
																	<div class="me-2">
																		<small class="text-muted d-block mb-1"><i class="tf-icons bx {{ $member->gender == 'မ'? 'bx-female':($member->gender == 'ကျား'? 'bx-male':'bx-infinite') }}"></i>Gender</small>
																		<span class="mb-0 text-capitalize fs-16">{{ $member->gender==''? 'အခြား':$member->gender }}&nbsp;</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
																	<div class="me-2">
																		<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-calendar"></i> Date Of Birth</small>
																		<span class="mb-0 fs-16">{{ $member->dob }}&nbsp;</span>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class="list-unstyled my-3 pb-1">
														<div class="row mb-4">
															<div class="col-md-6">
																<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
																	<div class="me-2">
																		<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-code-alt"></i> Ref <small class="mb-0 text-danger">(digital_id: {{ $member->digital_id }})&nbsp;</small></small>
																		<span class="mb-0 fs-16 label-icode">{{ $member->ref }}&nbsp;</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
																	<div class="me-2">
																		<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-id-card"></i> NRC</small>
																		<span class="mb-0 fs-16">{{ $member->nrc }}&nbsp;</span>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class="list-unstyled my-3 pb-1">
														<div class="row mb-4">
															<div class="col-md-6">
																<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
																	<div class="me-2">
																		<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-map"></i> State/Region <small class="mb-0 text-danger">(digital_id: {{ $member->state_id }})&nbsp;</small></small>
																		<span class="mb-0 fs-16">{{ $member->state_name }}&nbsp;</span>
																	</div>
																</div>	
															</div>
															<div class="col-md-6">
																<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
																	<div class="me-2">
																		<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-map"></i> Township <small class="mb-0 text-danger">(digital_id: {{ $member->township_id }})&nbsp;</small></small>
																		<span class="mb-0 fs-16">{{ $member->township_name }}&nbsp;</span>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class="list-unstyled">
													</li>
													<li class="d-flex my-3 pb-1">
														<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
															<div class="me-2">
																<small class="text-muted d-block mb-1"><i class="tf-icons bx bx-map-pin"></i> Address</small>
																<span class="mb-0 fs-16">{{ $member->address }}&nbsp;</span>
															</div>
														</div>
													</li>
													<label class="form-check-label custom-option-content form-check-primary mt-4" for="customCheckTemp'">
														<input class="form-check-input member-active" type="checkbox" {{ $member->active == 1? 'checked':'' }} disabled/>
														<span class="custom-option-header">
														<span class="h6">Active</span>
														</span>
													</label>
												</ul>
												<div class="mt-4">
													<button type="button" class="btn btn-success btn-sm show-btn-register {{ $member->ref == null? '':'hide' }}" data-bs-toggle="modal" data-bs-target="#RegisterModal" cursorshover="true">Register</button>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-danger btn-sm show-btn-reject btn-card-block-custom {{ ($member->user_level == 2 || $member->status == 0 || $member->status == 3)? 'hide':'' }}" data-bs-toggle="modal" data-bs-target="#RejectedModal" cursorshover="true">Rejected</button>
													   <button type="button" class="btn btn-primary btn-sm show-btn-approved btn-card-block-custom {{ ($member->user_level == 2 || $member->status == 0 || $member->status == 3)? 'hide':'' }}" data-bs-toggle="modal" data-bs-target="#ApprovedModal" cursorshover="true">Approved</button>
													</div>
                                                    <button type="button" class="btn btn-danger btn-sm {{ $member->ref != null? 'hide':'' }}" cursorshover="true">Rejected</button>
													<button type="button" class="btn btn-danger btn-sm show-btn-terminate {{ $member->active == 1? '':'hide' }}" data-bs-toggle="modal" data-bs-target="#TerminateModal" cursorshover="true">Suspend</button>
													<button type="button" class="btn btn-success btn-sm show-btn-unlock {{ $member->active == 0? '':'hide' }}" data-bs-toggle="modal" data-bs-target="#UnlockModal" cursorshover="true">Unlock</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="card card-border-shadow-primary h-100">
											<div class="card-body">
												<div class="row">
													<div class="col-md-12 mb-2 text-center">
														@if($member->selfie_photo != '')
														<img src="{{ $member->selfie_photo }}" alt="Selfie Photo" class="card-img selfie-lg" cursorshover="true">
														@else
														<img src="{{ asset('/_backend/_images/avatar.png') }}" alt="Selfie Photo" class="card-img selfie-lg" cursorshover="true">
														@endif
													</div>
													<div class="col-md-12 mb-2">
														<h5 class="mb-1">NRC Front Side</h5>
														<div class="card w-400p">
															@if($member->nrc_front_photo != '')
															<img class="card-img" src="{{ $member->nrc_front_photo }}" alt="NRC Front Photo">
															@else
															<img class="card-img" src="{{ asset('/_backend/_images/nrc_front.webp') }}" alt="NRC Front Photo">
															@endif
														</div>
													</div>
													<div class="col-md-12 mb-2">
														<h5 class="mt-4 mb-1">NRC Back Side</h5>
														<div class="card w-400p">
															@if($member->nrc_front_photo != '')
															<img class="card-img" src="{{ $member->nrc_back_photo }}" alt="NRC Back Photo">
															@else
															<img class="card-img" src="{{ asset('/_backend/_images/nrc_back.webp') }}" alt="NRC Back Photo">
															@endif
														</div>
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


		<div class="bs-toast toast toast-placement-ex toast-top-right fade bg-success" id="successToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
			<div class="toast-header">
				<i class="bx bx-bell me-2"></i>
				<div class="me-auto fw-medium">Success</div>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" cursorshover="true"></button>
			</div>
			<div class="toast-body">
				<span id="success-message">...</span>
			</div>
		</div>

		<div class="bs-toast toast toast-placement-ex toast-top-right fade bg-danger" id="errorToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
			<div class="toast-header">
				<i class="bx bx-bell me-2"></i>
				<div class="me-auto fw-medium">Error</div>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" cursorshover="true"></button>
			</div>
			<div class="toast-body">
				<span id="error-message"></span>
			</div>
		</div>


        <!-- Register Modal -->
                <div class="modal modal-top modal-md fade" id="RegisterModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTopTitle">Are you sure to register member into digital?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Member registered at digital system.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-register" value="{{ $member->digital_id }}">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>  

                <!-- Approved Modal -->
                <div class="modal modal-top modal-md fade" id="ApprovedModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTopTitle">Are you sure to approve for member KYC?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Member approved level 2.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-confirm" value="{{ $member->digital_id }}">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>  

				<!-- Reject Modal -->
				<div class="modal modal-top modal-md fade" id="RejectedModal" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalTopTitle">Are you sure to reject for member KYC?</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
                                Member rejected for KYC.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-danger btn-reject" value="{{ $member->digital_id }}">Confirm</button>
							</div>
						</div>
					</div>
				</div> 	

				<!-- Terminate Modal -->
				<div class="modal modal-top modal-md fade" id="TerminateModal" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalTopTitle">Are you sure to suspend member?</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								We suspend member for member app.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-danger btn-terminate">Confirm</button>
							</div>
						</div>
					</div>
				</div> 

				<!-- Terminate Modal -->
				<div class="modal modal-top modal-md fade" id="UnlockModal" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalTopTitle">Are you sure to unlock member?</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Member account unlock at membership system.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-success btn-unlock">Confirm</button>
							</div>
						</div>
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
						
						<script src="{{ asset('_backend/_js/block-ui.js') }}"></script>
						<script src="{{ asset('_backend/_js/extended-ui-blockui.js') }}"></script>
						
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
				digital_id = $(this).val();
				user = $("#user").val();
				$('#ApprovedModal').modal('hide');

				$("#section-block").block({
					message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
					css:{backgroundColor:"transparent",color:"#fff",border:"0"},
					overlayCSS:{opacity:.5}
				});

				$.ajax({
					url: url+'/api/approved-user-level',
					type: 'POST',
					data: {
						'digital_id':digital_id,
						'user':user
					},
					success: function(data){
						$("#section-block").block({
							message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
							css:{backgroundColor:"transparent",color:"#fff",border:"0"},
							timeout:1e3,
							overlayCSS:{opacity:.5}
						});
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
                        $(".show-btn-reject").addClass('hide');
					}
				});
			});

            $('body').delegate(".btn-reject","click",function () {
                digital_id = $(this).val();
                user = $("#user").val();
                $('#RejectedModal').modal('hide');

                $("#section-block").block({
                    message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
                    css:{backgroundColor:"transparent",color:"#fff",border:"0"},
                    overlayCSS:{opacity:.5}
                });

                $.ajax({
                    url: url+'/api/rejected-user-kyc',
                    type: 'POST',
                    data: {
                        'digital_id':digital_id,
                        'user':user
                    },
                    success: function(data){
                        $("#section-block").block({
                            message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
                            css:{backgroundColor:"transparent",color:"#fff",border:"0"},
                            timeout:1e3,
                            overlayCSS:{opacity:.5}
                        });
                        if(data.success == 1){
                            $("#success-message").text(data.message);
                            $("#successToast").toast("show");
                        }else{
                            $("#error-message").text(data.message);
                            $("#errorToast").toast("show");
                        }
                        $(".show-btn-approved").addClass('hide');
                        $(".show-btn-reject").addClass('hide');
                    }
                });
            });

			$('body').delegate(".btn-register","click",function () {
				id = $("#item").val();
				$('#RegisterModal').modal('hide');
				$("#section-block").block({
					message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
					css:{backgroundColor:"transparent",color:"#fff",border:"0"},
					overlayCSS:{opacity:.5}
				});
				$.ajax({
		        	url: url+'/api/digital-register',
		            type: 'POST',
		            data: {
						id:id
					},
		            success: function(data){
						$("#section-block").block({
							message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
							css:{backgroundColor:"transparent",color:"#fff",border:"0"},
							timeout:1e3,
							overlayCSS:{opacity:.5}
						});
						if(data.success == 1){
							$("#success-message").text(data.message);
							$("#successToast").toast("show");
							$(".label-icode").text(data.login);
							$(".show-btn-register").addClass('hide');
						}else{
                            $(".label-icode").text(data.login);
							$("#error-message").text(data.message);
							$("#errorToast").toast("show");
							$(".show-btn-approved").removeClass('hide');
						}

						$(".show-btn-register").addClass('hide');
					}
				});
			});

			$('body').delegate(".btn-terminate","click",function () {
				id = $("#item").val();
				user = $("#user").val();
				$('#TerminateModal').modal('hide');
				$("#section-block").block({
					message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
					css:{backgroundColor:"transparent",color:"#fff",border:"0"},
					overlayCSS:{opacity:.5}
				});

				$.ajax({
		        	url: url+'/api/terminate-user',
		            type: 'POST',
		            data: {
						id:id,
						user:user
					},
		            success: function(data){
						$("#section-block").block({
							message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
							css:{backgroundColor:"transparent",color:"#fff",border:"0"},
							timeout:1e3,
							overlayCSS:{opacity:.5}
						});
						if(data.success == 1){
							$("#success-message").text(data.message);
							$("#successToast").toast("show");
							//$(".label-icode").text(data.login);
							$(".show-btn-terminate").addClass('hide');
							$(".show-btn-unlock").removeClass('hide');
							$(".member-active").prop('checked', false); 
						}else{
							$("#error-message").text(data.message);
							$("#errorToast").toast("show");
							$(".show-btn-terminate").removeClass('hide');
						}
						$(".acc-message").removeClass('hide');
						$(".show-btn-terminate").addClass('hide');
					}
				});
			});

			$('body').delegate(".btn-unlock","click",function () {
				id = $("#item").val();
                user = $("#user").val();
				$('#UnlockModal').modal('hide');
				$("#section-block").block({
					message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
					css:{backgroundColor:"transparent",color:"#fff",border:"0"},
					overlayCSS:{opacity:.5}
				});

				$.ajax({
		        	url: url+'/api/unlock-user',
		            type: 'POST',
		            data: {
						id:id,
						user:user
					},
		            success: function(data){
						$("#section-block").block({
							message:'<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
							css:{backgroundColor:"transparent",color:"#fff",border:"0"},
							timeout:1e3,
							overlayCSS:{opacity:.5}
						});
						if(data.success == 1){
							$("#success-message").text(data.message);
							$("#successToast").toast("show");
							//$(".label-icode").text(data.login);
							$(".show-btn-terminate").removeClass('hide');
							$(".show-btn-unlock").addClass('hide');
							$(".member-active").prop('checked', true); 
						}else{
							$("#error-message").text(data.message);
							$("#errorToast").toast("show");
						}
						$(".acc-message").addClass('hide');
						$(".show-btn-unlock").addClass('hide');
					}
				});
			});
			
										
			fetched_data();   


		});

	</script>
</body>
</html>
