<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    <meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management">
    <meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
    <meta property="og:title" content="Akademi : School and Education Management Admin Dashboard Template">
    <meta property="og:description" content="Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
    <meta property="og:image" content="https://akademi.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title Here -->
    <title>RBDGTC management</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="/adminassets/vendor/wow-master/css/libs/animate.css" rel="stylesheet">
    <link href="/adminassets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminassets/vendor/bootstrap-select-country/css/bootstrap-select-country.min.css">
    <link rel="stylesheet" href="/adminassets/vendor/jquery-nice-select/css/nice-select.css">
    <link href="/adminassets/vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="/adminassets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--swiper-slider-->
    <link rel="stylesheet" href="/adminassets/./vendor/swiper/css/swiper-bundle.min.css">
    <!-- Style css -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('/adminassets/css/style.css') }}" rel="stylesheet">

    <link href="/adminassets/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.10/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- <script>
        $(document).ready(function() {
            $("#tableId").DataTable({
                dom: 'Bfrtip',
                "pageLength": 100,
                buttons: [{
                        extend: 'print',
                    },
                    {
                        extend: 'copyHtml5',
                    },
                    {
                        extend: 'excelHtml5',
                    },
                    {
                        extend: 'csvHtml5',
                    },
                    {
                        extend: 'pdfHtml5',
                    }
                ],
                initComplete: function() {
                    var btns = $('.dt-button');
                    btns.addClass('btn btn-info');
                    btns.removeClass('dt-button');
                }
            });

            // Initially hide the toDate column
            $("#toDateColumn").hide();
            // Detect changes in the dropdown
            $("#status").change(function() {
                if ($(this).val() === "Present") {
                    // If "Present" is selected, hide the toDate column
                    $("#toDateColumn").hide();
                } else {
                    // If "Past" is selected, show the toDate column
                    $("#toDateColumn").show();
                }
            });
        });
    </script> -->
</head>

<body>
    @if(!session('admin_log_status'))
    <script>
        location.href = "/adminlogin";
    </script>
    @endif

    @include('sweetalert::alert')
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <div class="dots">
                <div class="dot mainDot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="wallet-open active">

        @include('admin.layouts.ad_header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        @include('admin.layouts.navbar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--****
		Wallet Sidebar
		****-->
        @yield('content')


        <!--**********************************
			Footer start
		***********************************-->
        @include('admin.layouts.ad_footer')

    </div>


    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--***********************************-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recent Student title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label mb-2">Student Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="James">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label mb-2">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="hello@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-2">Gender</label>
                                <select class="default-select wide" aria-label="Default select example">
                                    <option selected>Select Option</option>
                                    <option value="1">Male</option>
                                    <option value="2">Women</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput4" class="form-label mb-2">Entery Year</label>
                                <input type="number" class="form-control" id="exampleFormControlInput4" placeholder="EX: 2023">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput5" class="form-label mb-2">Student ID</label>
                                <input type="number" class="form-control" id="exampleFormControlInput5" placeholder="14EMHEE092">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput6" class="form-label mb-2">Phone Number</label>
                                <input type="number" class="form-control" id="exampleFormControlInput6" placeholder="+123456">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
		Modal
	***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/adminassets/vendor/global/global.min.js"></script>
    <script src="/adminassets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/adminassets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Apex Chart -->
    <script src="/adminassets/vendor/apexchart/apexchart.js"></script>
    <!-- Chart piety plugin files -->
    <script src="/adminassets/vendor/peity/jquery.peity.min.js"></script>
    <script src="/adminassets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <!--swiper-slider-->
    <script src="/adminassets/vendor/swiper/js/swiper-bundle.min.js"></script>

    <script src="/adminassets/vendor/lightgallery/js/lightgallery-all.min.js"></script>

    <!-- Datatable -->
    <script src="/adminassets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/adminassets/js/plugins-init/datatables.init.js"></script>

    <!-- Dashboard 1 -->
    <script src="/adminassets/js/dashboard/dashboard-1.js"></script>
    <script src="/adminassets/vendor/wow-master/dist/wow.min.js"></script>
    <script src="/adminassets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="/adminassets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/adminassets/vendor/bootstrap-select-country/js/bootstrap-select-country.min.js"></script>

    <script src="/adminassets/js/dlabnav-init.js"></script>
    <script src="/adminassets/js/custom.min.js"></script>
    <script src="/adminassets/js/demo.js"></script>
    <script src="/adminassets/js/styleSwitcher.js"></script>

    <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="js/plugins-init/sweetalert.init.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>


</body>

</html>