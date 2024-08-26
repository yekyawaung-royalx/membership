<!DOCTYPE html>
<html lang="en" class="light-style layout-compact  layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-base-url="" data-framework="laravel" data-template="horizontal-menu-theme-default-light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Membership | Profile</title>
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/favicon/favicon.ico" />

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
                                                                        <a href="{{ url('dashboard') }}" class="text-primary fw-light">Dashboard </a> 
                                                                        <span class="text-muted fw-light">> Profile</span> 
                                                                </h5>
                                                        </div>
                                                        <div class="col-md-8">
                                                                
                                                        </div>
                                                </div>
                        <div class="row">
                        	<div class="col-md-6">
<div class="card card-border-shadow-primary h-100">
      <div class="card-body">
      	<div class="card-title mb-0 text-primary">Profile Information</div>
      	<small>Update your account's profile information and email address.</small>
<form action="{{ route('send.notification') }}" method="POST" class="mt-2">
	@csrf
      	<div class="row">
                            <div class="col mb-3">
                                <label for="new-registration-no" class="form-label text-primary">Name<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="new-registration-no" class="form-control" value="{{ $user->name }}">
                            </div>
                    </div>

                    <div class="row">
                            <div class="col mb-3">
                                <label for="new-registration-no" class="form-label text-primary">Email<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="new-registration-no" class="form-control" value="{{ $user->email }}">
                            </div>
                    </div>
                    <div class="row">
                    	<div class="col">
                    		<button type="submit"  class="btn btn-primary btn-create ">Save</button>
                    	</div>
                    </div>
            </form>
      </div>
   </div>
</div>

<div class="col-md-6">
<div class="card card-border-shadow-primary h-100">
      <div class="card-body">
      	<div class="card-title mb-0 text-primary">Update Password</div>
      	<small>Ensure your account is using a long, random password to stay secure.</small>
<form action="{{ route('send.notification') }}" method="POST" class="mt-2">
	@csrf

                    <div class="row">
                        <div class="col mb-3">
                                <label for="new-registration-no" class="form-label text-primary">New Password<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="new-registration-no" class="form-control border-danger" placeholder="******">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                                <label for="new-registration-no" class="form-label text-primary">Confirm Password<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="new-registration-no" class="form-control border-danger" placeholder="******">
                            </div>
                    </div>
                    <div class="row">
                    	<div class="col">
                    		<button type="submit"  class="btn btn-primary btn-create ">Save</button>
                    	</div>
                    </div>
            </form>
      </div>
   </div>
</div>

<div class="col-md-6">
<div class="card card-border-shadow-primary h-100 mt-4">
      <div class="card-body">
      	<div class="card-title mb-0 text-primary">Delete Account</div>
      	<small>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</small>
<form action="{{ route('send.notification') }}" method="POST" class="mt-2">
	@csrf
                    <div class="row">
                    	<div class="col">
                    		<button type="submit"  class="btn btn-danger btn-create ">Delete Account</button>
                    	</div>
                    </div>
            </form>
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

          
                    fetched_data();   
            });
    </script>
</body>
</html>
