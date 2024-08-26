<!DOCTYPE html>
<html lang="en" class="light-style layout-compact  layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-base-url="" data-framework="laravel" data-template="horizontal-menu-theme-default-light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Member KYC |  Dashboard</title>
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
                                                        <div class="col-md-8">
                                                                <h5 class="py-2 mb-2">
                                                                        <a href="{{ url('dashboard') }}" class="text-primary fw-light">Dashboard </a>
                                                                        <span class="text-muted fw-light">></span> 
                                                                        <a href="{{ url('api-docs') }}" class="text-primary fw-light"> API Documentation </a> 
                                                                        <span class="text-muted fw-light">> Member Login API</span> 
                                                                </h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                                
                                                        </div>
                                                </div>
                        
                        
  
                                                <div class="row">
                                                    <!-- Basic -->
                                                    <div class="col-md-6">
                                                      <div class="card mb-4">
                                                        <h5 class="card-header">Request</h5>
                                                        <div class="card-body demo-vertical-spacing demo-only-element">
                                                            <div>
                                                                <label class="form-label">Header</label>
                                                              <div class="input-group">
                                                                
                                                                <span class="input-group-text bg-primary text-white" id="basic-addon11">TOKEN</span>
                                                                <input type="text" class="form-control" value="lcSyy0KlwcgLPPrgrbSe4MhJJ/0LmmhFqv5wVEgMOSg=" aria-label="token" aria-describedby="basic-addon11">
                                                              </div>
                                                            </div>
                                                        <div>
                                                            <label class="form-label">API Endpoint</label>
                                                          <div class="input-group">
                                                            
                                                            <span class="input-group-text bg-primary text-white" id="basic-addon11">POST</span>
                                                            <input type="text" class="form-control" value="{{ url('api/login')}}" aria-label="login" aria-describedby="basic-addon11">
                                                          </div>
                                                        </div>
                                                        <div>
                                                            <label class="form-label">Request Body</label>
                                                            <div class="border rounded mb-4">
                                                                <div class="card-body">
                                                                  <p class="text-primary">
                                                                    {<br>
                                                                       <span class="text-indent-20">"login":"E0010876",</span><br>
                                                                       <span class="text-indent-20">"passcode":"182469"</span><br>
                                                                    }<br>
                                                                </p>
                                                                </div>
                                                              </div>
                                                        </div>
                                                       
                                                        <div>
                                                            <label class="form-label">Snippets</label>
                                                                <div class="nav-align-top mb-4">
                                                                  <ul class="nav nav-tabs" role="tablist">
                                                                    <li class="nav-item" role="presentation">
                                                                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true" cursorshover="true">PHP CURL</button>
                                                                    </li>
                                                                    <li class="nav-item" role="presentation">
                                                                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false" cursorshover="true" tabindex="-1">NodeJS Axios</button>
                                                                    </li>
                                                                    <li class="nav-item" role="presentation">
                                                                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false" tabindex="-1">Javascript Fetch</button>
                                                                    </li>
                                                                  </ul>
                                                                  <div class="tab-content">
                                                                    <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                                                                      <p>
                                                                        Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear
                                                                        claw
                                                                        candy topping.
                                                                      </p>
                                                                      <p class="mb-0">
                                                                        Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o
                                                                        jelly-o ice
                                                                        cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
                                                                      </p>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                                                      <p>
                                                                        Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
                                                                        halvah
                                                                        tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
                                                                      </p>
                                                                      <p class="mb-0">
                                                                        Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
                                                                        liquorice caramels.
                                                                      </p>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                                                                      <p>
                                                                        Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
                                                                        bears
                                                                        cake chocolate.
                                                                      </p>
                                                                      <p class="mb-0">
                                                                        Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
                                                                        sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                                                                        jelly.
                                                                      </p>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                        </div>
                                                  
                                                  
                                                  
                                                        </div>
                                                      </div>
                                                    </div>
                                                  
                                                    <!-- Merged -->
                                                    <div class="col-md-6">
                                                      <div class="card mb-4">
                                                        <h5 class="card-header">Response </h5>
                                                        <div class="card-body demo-vertical-spacing demo-only-element">
                                                            <div>
                                                              <label class="form-label w-100">JSON Response <span class="badge bg-label-success">Success</span> <span class="pull-right">Status: <span class="badge badge-sm badge-rounded bg-label-info">200</span></span></label>
                                                                <div class="border rounded mb-4">
                                                                    <div class="card-body">
                                                                      <p class="text-primary">
                                                                        {<br>
                                                                            <span class="text-indent-20">"success": 1,</span><br>
                                                                            <span class="text-indent-20">"message": "Member login successful",</span><br>
                                                                            <span class="text-indent-20">"data": {</span><br>
                                                                            <span class="text-indent-60">"id": 1,</span><br>
                                                                            <span class="text-indent-60">"name": "Ye Kyaw Aung",</span><br>
                                                                            <span class="text-indent-60">"mobile": "09450049715",</span><br>
                                                                            <span class="text-indent-60">"dob": "1991-07-10",</span><br>
                                                                            <span class="text-indent-60">"gender": "male",</span><br>
                                                                            <span class="text-indent-60">"ecode": "E0010876",</span><br>
                                                                            <span class="text-indent-60">"passcode": "x0BefDF+9UscUbHEJYSySA==",</span><br>
                                                                            <span class="text-indent-60">"nrc": "10/YAMANA(N)162891",</span><br>
                                                                            <span class="text-indent-60">"state": "Yangon",</span><br>
                                                                            <span class="text-indent-60">"city": "Yangon",</span><br>
                                                                            <span class="text-indent-60">"township": "Hlaing Township",</span><br>
                                                                            <span class="text-indent-60">"address": "Hlaing Township",</span><br>
                                                                            <span class="text-indent-60">"nrc_front_photo": null,</span><br>
                                                                            <span class="text-indent-60">"nrc_back_photo": null,</span><br>
                                                                            <span class="text-indent-60">"selfie_photo": null,</span><br>
                                                                            <span class="text-indent-60">"user_level": 1,</span><br>
                                                                            <span class="text-indent-60">"status": 0,</span><br>
                                                                            <span class="text-indent-60">"created_at": "2024-05-20 10:09:56",</span><br>
                                                                            <span class="text-indent-60">"updated_at": "2024-05-20 10:09:56"</span><br>
                                                                            <span class="text-indent-20">}</span><br>
                                                                        }<br>
                                                                    </p>
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
