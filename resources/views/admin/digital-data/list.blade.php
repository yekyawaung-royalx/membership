<!DOCTYPE html>
<html lang="en" class="light-style layout-compact  layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-base-url="" data-framework="laravel" data-template="horizontal-menu-theme-default-light">
<head>
  	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  	<title>Membership | Digital Data</title>
  	<meta name="csrf-token" content="{{ csrf_token() }}">
  	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('_backend/_images/favicon.ico') }}">

  	<!-- BEGIN: Theme CSS-->
	<!-- Fonts -->
	<link rel="stylesheet" href="{{ asset('_backend/_css/boxicons.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/fontawesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/flag-icons.css') }}" />
	<!-- Core CSS -->
	<link rel="stylesheet" href="{{ asset('_backend/_css/core.css') }}" class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/theme-default.css') }}" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{ asset('_backend/_css/demo.css') }}" />

	<link rel="stylesheet" href="{{ asset('_backend/_css/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('_backend/_css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_backend/_css/form-flat-pickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_backend/_css/form-pickadate.min.css') }}">
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
					@include('layouts.admin-aside')
        				<!-- Content -->
		                  	<div class="container-xxl flex-grow-1 container-p-y">
						<div class="row">
				                      	<div class="col-md-4">
				                        	<h5 class="py-2 mb-2">
				                  			<a href="{{ url('admin/dashboard') }}" class="text-primary fw-light">Dashboard </a> 
                                                                        <span class="text-muted fw-light text-capitalize">> Digital Data </span> 
				              			</h5>
				                      	</div>
				                      	<div class="col-md-8">
											<div class="pull-right">
												<button type="button" class="btn btn-primary v-top" data-bs-toggle="modal" data-bs-target="#DownloadModal" cursorshover="true" >
													<span class="tf-icons bx bx-download me-1" cursorshover="true"></span>Download Digital Data
												</button>
												<input type="text" class="form-control form-inline border-secondary me-1" id="terms" placeholder="ရှာရန်" aria-describedby="defaultFormControlHelp">
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
                                                                <th class="text-muted unset">Digital Id</th>
        					                                    <th class="text-muted unset">Name</th>
        					                                    <th class="text-muted unset">I-Code</th>
        					                                    <th class="text-muted unset">Mobile</th>
        					                                    <th class="text-muted unset">NRC</th>
        					                                    <th class="text-muted unset">Active</th>
        					                                    <th class="text-muted unset">Synced</th>
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

	<div class="bs-toast toast toast-placement-ex toast-top-right fade bg-primary" id="successToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
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

    <!-- UnSync Modal -->
    <div class="modal modal-top modal-md fade" id="DownloadModal" tabindex="-1">
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
                    <button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger btn-primary btn-download">Download</button>
                </div>
            </div>
        </div>
    </div> 

	<!-- UnSync Modal -->
    <div class="modal modal-top modal-md fade" id="UnSyncModal" tabindex="-1">
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
                    <button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger btn-primary">Un Sync</button>
                </div>
            </div>
        </div>
    </div> 

	<!-- Delete Modal -->
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
                    <button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">Close</button>
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

	<script src="{{ asset('_backend/_js/picker.js') }}"></script>
    <script src="{{ asset('_backend/_js/picker.date.js') }}"></script>
    <script src="{{ asset('_backend/_js/picker.time.js') }}"></script>
    <script src="{{ asset('_backend/_js/flatpickr.min.js') }}"></script>
	<script src="{{ asset('_backend/_js/form-pickers.min.js') }}"></script>
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
					$("#links").empty();
					
		                $.ajax({
		                  	url: load_json,
		                  	type: 'GET',
		                  	data: {},
		                  	success: function(data){
                                if(data.total > 0){
		                    	$.each(data.data, function (i, item) {
		                       		$("#fetched-data").append('<tr>'
		                                +'<td class="text-muted">'+item.id+'</td>'
		                                +'<td class="text-primary">'+item.name+'<br>'+item.mobile+'</td>'
		                                +'<td><span class="badge bg-label-primary">'+(item.icode != 'null' ? item.icode:'...')+'</span></td>'
		                                +'<td><span class="text-muted">'+item.mobile+'</span></td>'
		                                +'<td>'+item.nrc+'</td>'
		                                +'<td>'+item.active+'</td>'
										+'<td>'+synced_status(item.sync)+'</td>'
										+'<td>'
											+'<div class="btn-group">'
												+'<button type="button" class="btn btn-icon btn-sm btn-outline-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false" cursorshover="true"><i class="bx bx-dots-vertical-rounded" cursorshover="true"></i></button>'
												+'<ul class="dropdown-menu dropdown-menu-end" style="">'
													+'<li><a class="dropdown-item text-primary load-id" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#UnSyncModal" title='+item.id+' cursorshover="true"><span class="tf-icons bx bx-refresh" cursorshover="true"></span> Change Unsync</a></li>'
													+'<li><a class="dropdown-item text-danger load-id" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#DeleteModal" title='+item.id+' cursorshover="true"><span class="tf-icons bx bx-trash" cursorshover="true"></span> Delete Member</a></li>'
												+'</ul>'
											+'</div>'
										+'</td>'
		                            +'</tr>');
		                       	});

		                    	//$(".data-loading").hide();

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
											+'<td class="text-muted">'+item.id+'</td>'
											+'<td class="text-primary">'+item.name+'<br>'+item.mobile+'</td>'
											+'<td><span class="badge bg-label-primary">'+(item.icode != 'null' ? item.icode:'...')+'</span></td>'
											+'<td><span class="text-muted">'+item.mobile+'</span></td>'
											+'<td>'+item.nrc+'</td>'
											+'<td>'+item.active+'</td>'
											+'<td>'+synced_status(item.sync)+'</td>'
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


					
					$('body').delegate(".btn-download","click",function () {
						start 	= $("input[name=start_date]").val();
						end 	= $("input[name=end_date]").val();
						$('#DownloadModal').modal('hide');

						$(".loading").removeClass('hide');
                        $(".empty-data").addClass('hide');
                        $(".results").addClass('hide');

						$.ajax({
		                    url: url+'/download-digital-data',
		                    type: 'POST',
		                    data: {
								'start_date':start,
								'end_date':end,
								'_token':token
							},
		                    success: function(data){
								fetched_data();
								$("#success-message").text(data.message);
								$("#successToast").toast("show");
							}
						});

						
					});
          
            		fetched_data();   
        	});
  	</script>
</body>
</html>
