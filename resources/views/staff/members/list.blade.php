<!DOCTYPE html>
<html lang="en" class="light-style layout-compact layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-base-url="" data-framework="laravel" data-template="horizontal-menu-theme-default-light">
<head>
  	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  	<title>Membership | Members</title>
  	<meta name="csrf-token" content="{{ csrf_token() }}">

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
				                <div class="col-md-4">
				                    <h5 class="py-2 mb-2">
				                  		<a href="{{ url('admin/dashboard') }}" class="text-primary fw-light">Dashboard </a> 
                                    	<span class="text-muted fw-light text-capitalize">> {{$status}} Members </span> 
				              		</h5>
				                </div>
				                <div class="col-md-8">
									<div class="pull-right">
										<input type="text" class="form-control form-inline border-secondary me-1" id="search" placeholder="ရှာရန်" aria-describedby="defaultFormControlHelp">
										<div class="btn-group pull-right" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-primary pagination-btn" id="prev-btn" cursorshover="true"><i class="tf-icon bx bx-chevrons-left"></i></button>
											<button type="button" class="btn btn-outline-primary current-page" data-bs-toggle="modal" data-bs-target="#modalTop">0</button>
											<button type="button" class="btn btn-primary pagination-btn" id="next-btn"><i class="tf-icon bx bx-chevrons-right"></i></button>
											<button type="button" class="btn btn-outline-primary">Records: <span id="to-records">0</span>&nbsp;of&nbsp; <span id="total-records">0</span></button>
										</div>
									</div>
				                </div>
				            </div>
							<div class="card mb-4">
								<div class="card-body loading text-center">
									<h6>Please wait patiently</h6>
									<div class="spinner-grow text-primary" role="status">
										<span class="visually-hidden">Loading...</span>
									</div>
									<div class="spinner-grow text-primary" role="status">
										<span class="visually-hidden">Loading...</span>
									</div>
									<div class="spinner-grow text-primary" role="status">
										<span class="visually-hidden">Loading...</span>
									</div>
								</div>
				                <div class="card-body results hide">
					                <div class="table-responsive text-nowrap">
					                    <table class="table">
					                        <thead>
        					                    <tr>
                                                    <th class="text-muted unset">Registered At</th>
                                                    <th class="text-muted unset">Digital ID</th>
        					                        <th class="text-muted unset">I-Code</th>
        					                        <th class="text-muted unset">Name</th>
        					                        <th class="text-muted unset">Level</th>
        					                        <th class="text-muted unset">NRC</th>
        					                        <th class="text-muted unset">Status</th>
        					                        <th class="text-muted unset">Action</th>
        					                    </tr>
					                        </thead>
					                        <tbody class="table-border-bottom-0" id="fetched-data">
					                              
					                        </tbody>
					                    </table>
										<div class="my-3 empty-data hide">
											<div class="alert alert-warning" role="alert">
												  No data available.
											</div>
										</div>
					                </div>
				                </div>
				            </div>
		               	</div>
		          		<!-- / Content -->

		      			<input type="hidden" id="url" value="{{ url('') }}">
			            <input type="hidden" id="json" value="{{ $json }}">
			            <input type="hidden" id="token" value="{{ csrf_token() }}">
						
						<input type="hidden" id="item" value="">
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


	<!-- Pagination Modal -->
    <div class="modal modal-top modal-lg fade" id="modalTop" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopTitle">Choose Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <div id="links"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

    <!-- Sync Modal -->
    <div class="modal modal-top modal-md fade" id="SyncModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopTitle">Are you sure to sync data both system?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Member data sync both membership and digital system.</p>
					<label class="form-check-label" for="100-records" cursorshover="true"> Sync Per Records: </label>
					<div class="row">
						<div class="col-md-4">
							<div class="form-check form-check-secondary">
							  	<input name="records" class="form-check-input" type="radio" value="100" checked="">
							  	<label class="form-check-label" for="100-records" cursorshover="true"> 100 Records</label>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-check form-check-secondary">
							  	<input name="records" class="form-check-input" type="radio" value="200" >
							  	<label class="form-check-label" cursorshover="true"> 200 Records</label>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-check form-check-secondary">
							  	<input name="records" class="form-check-input" type="radio" value="400" >
							  	<label class="form-check-label" cursorshover="true"> 400 Records</label>
							</div>
						</div>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sync">Sync</button>
                </div>
            </div>
        </div>
    </div>    

	<!-- Register Modal -->
    <div class="modal modal-top modal-md fade" id="DeleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopTitle">Are you sure to delete member at membership system?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Member data register at digital system.
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger btn-delete">Delete</button>
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
    <script src="{{ asset('_backend/_js/custom.js') }}"></script>
	<!-- END: Page Vendor JS-->
	<!-- BEGIN: Theme JS-->
	<script src="{{ asset('_backend/_js/main.js') }}"></script>
	<!-- END: Page JS-->

	<script type="text/javascript">
    	$(document).ready(function(){
	        var url      = $("#url").val();
	        var json  	= $("#json").val();

	        var load_json      		= url+'/'+json;
	        var token       		= $("#token").val();

	        var fetched_data = function(){
				$("#fetched-data").empty();

		        $.ajax({
		            url: load_json,
		            type: 'GET',
		            data: {},
		            success: function(data){
						if(data.total > 0){
		                    $.each(data.data, function (i, item) {
		                       	$("#fetched-data").append('<tr>'
									+'<td><span class="text-muted"><span class="fw-semibold">'+item.created_at.substring(0, 10)+'</span><br>'+item.created_at.substring(10, 19)+'</span></td>'
		                            +'<td class="text-muted">'+item.digital_id+'</td>'
		                            +'<td><span class="fs-16 fw-bold '+(item.active == 1 ? 'text-primary':'text-danger')+'">'+(item.icode != '' ? item.icode:'...')+'</span></td>'
		                            +'<td class="text-primary">'+item.name+'<br>'+item.mobile+'</td>'
		                            +'<td><span class="text-muted">'+item.user_level+'</span></td>'
		                            +'<td>'+item.nrc+'</td>'
		                            +'<td>'+member_status(item.status)+'</td>'
		                            +'<td>'
		                                +'<div class="btn-group">'
                        					+'<button type="button" class="btn btn-icon btn-sm btn-outline-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false" cursorshover="true"><i class="bx bx-dots-vertical-rounded" cursorshover="true"></i></button>'
                        					+'<ul class="dropdown-menu dropdown-menu-end" style="">'
                        						+'<li><a class="dropdown-item text-success load-id" href="'+url+'/members/view/'+item.id+'" cursorshover="true"><span class="tf-icons bx bx-search" cursorshover="true"></span> View Member</a></li>'
                        					+'</ul>'
                        				+'</div>'
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

							$(".loading").addClass('hide');
                            $(".empty-data").addClass('hide');
                            $(".results").removeClass('hide');
                        }else{
                            $(".loading").addClass('hide');
                            $(".results").removeClass('hide');
                            $(".empty-data").removeClass('hide');
                            $("#prev-btn").attr('disabled',true);
                            $("#next-btn").attr('disabled',true);
                        }
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
								+'<td><span class="text-muted">'+item.created_at+'</span></td>'
		                        +'<td class="text-muted">'+item.digital_id+'</td>'
		                        +'<td><span class="badge '+(item.active == 1 ? 'bg-primary':'bg-danger')+'">'+(item.icode != '' ? item.icode:'...')+'</span></td>'
		                        +'<td class="text-primary">'+item.name+'<br>'+item.mobile+'</td>'
		                        +'<td><span class="text-muted">'+item.user_level+'</span></td>'
		                         +'<td>'+item.nrc+'</td>'
		                        +'<td>'+member_status(item.status)+'</td>'
		                        +'<td>'
		                            +'<div class="btn-group">'
                        				+'<button type="button" class="btn btn-icon btn-sm btn-outline-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false" cursorshover="true"><i class="bx bx-dots-vertical-rounded" cursorshover="true"></i></button>'
                        				+'<ul class="dropdown-menu dropdown-menu-end" style="">'
                        					+'<li><a class="dropdown-item text-success load-id" href="'+url+'/members/view/'+item.id+'" cursorshover="true"><span class="tf-icons bx bx-search" cursorshover="true"></span> View Member</a></li>'
                        				+'</ul>'
                        			+'</div>'
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

			
			$('body').delegate(".load-id","click",function () {
				id = $(this).attr('title');

				$("#item").val(id);
			});
			
			$('body').delegate(".btn-delete","click",function () {
				id 		= $("#item").val();
				user    = $("#user").val();
				$('#DeleteModal').modal('hide');
				
				$.ajax({
		        	url: url+'/api/delete-member',
		            type: 'POST',
		            data: {
						id:id,
						user:user
					},
		            success: function(data){
						if(data.success == 1){
							$("#success-message").text(data.message);
							$("#successToast").toast("show");
						}else{
							$("#error-message").text(data.message);
							$("#errorToast").toast("show");
						}

						fetched_data();
					}
				});
			});

			$('body').delegate(".btn-sync","click",function () {
				$('#SyncModal').modal('hide');
				$(".loading").removeClass('hide');
                $(".empty-data").addClass('hide');
                $(".results").addClass('hide');

				limit 	= $("input[name=records]:checked").val();

				$.ajax({
		        	url: url+'/synced-data-with-digital',
		            type: 'POST',
		            data: {
						'limit':limit,
						'_token':token
					},
		            success: function(data){
						if(data.success == 1){
							$("#success-message").text(data.message);
							$("#successToast").toast("show");
						}else{
							$("#error-message").text(data.message);
							$("#errorToast").toast("show");
						}

						fetched_data();
					}
				});
			});


			$("#search").keyup(function(){
				term = $("#search").val();
				$("#fetched-data").empty();

				if(term != ''){
					$.ajax({
						url: url+'/search/members/'+term,
						type: 'GET',
						data: {},
						success: function(data){
							if(data.total > 0){
								$.each(data.data, function (i, item) {
									$("#fetched-data").append('<tr>'
										+'<td><span class="text-muted">'+item.created_at+'</span></td>'
										+'<td class="text-muted">'+item.digital_id+'</td>'
										+'<td><span class="badge '+(item.active == 1 ? 'bg-primary':'bg-danger')+'">'+(item.icode != '' ? item.icode:'...')+'</span></td>'
										+'<td class="text-primary">'+item.name+'<br>'+item.mobile+'</td>'
										+'<td><span class="text-muted">'+item.user_level+'</span></td>'
										+'<td>'+item.nrc+'</td>'
										+'<td>'+member_status(item.status)+'</td>'
										+'<td>'
											+'<div class="btn-group">'
												+'<button type="button" class="btn btn-icon btn-sm btn-outline-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false" cursorshover="true"><i class="bx bx-dots-vertical-rounded" cursorshover="true"></i></button>'
												+'<ul class="dropdown-menu dropdown-menu-end" style="">'
													+'<li><a class="dropdown-item text-success load-id" href="'+url+'/members/view/'+item.id+'" cursorshover="true"><span class="tf-icons bx bx-search" cursorshover="true"></span> View Member</a></li>'
													+'<li><a class="dropdown-item text-danger load-id" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#DeleteModal" title='+item.id+' cursorshover="true"><span class="tf-icons bx bx-trash" cursorshover="true"></span> Delete Member</a></li>'
												+'</ul>'
											+'</div>'
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

								$(".loading").addClass('hide');
								$(".empty-data").addClass('hide');
								$(".results").removeClass('hide');
							}else{
								$(".loading").addClass('hide');
								$(".results").removeClass('hide');
								$(".empty-data").removeClass('hide');
								$("#prev-btn").attr('disabled',true);
								$("#next-btn").attr('disabled',true);
							}
						}
					});
				}else{
					fetched_data();  
				}
			});
			
            fetched_data();   
        
		});
  	</script>
</body>
</html>
