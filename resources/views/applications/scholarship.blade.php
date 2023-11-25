<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RBDGTC</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.svg">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="/assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="/assets/plugins/slick/slick-theme.css">

    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/assets/plugins/swiper/css/swiper.min.css">

    <link rel="stylesheet" href="/assets/plugins/aos/aos.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function dependentstatus() {
            if ($('#dependent').val() == "Single parent") {
                $('#singleparentstatus').show();
                $('#orphanstatus1').hide();
                $('#orphanstatus2').hide();
            } else if ($('#dependent').val() == "Orphan") {
                $('#singleparentstatus').hide();
                $('#orphanstatus1').show();
                $('#orphanstatus2').show();
            } else {
                $('#singleparentstatus').hide();
                $('#orphanstatus1').hide();
                $('#orphanstatus2').hide();
            }
        }

        function disability() {
            if ($("#disability_status").val() == "Yes") {
                // If "Yes" is selected, show the related fields
                $("#disability").show();
            } else {
                // If "No" is selected, hide the related fields
                $("#disability").hide();
            }
        }

        function bachelors() {
            if ($("#bachelor_status").val() == "Yes") {
                // If "Yes" is selected, show the related fields
                $("#bachelor_fields").show();
                $("#upload_marks_card").show();
                $("#masters").show();
            } else {
                // If "No" is selected, hide the related fields
                $("#bachelor_fields").hide();
                $("#upload_marks_card").hide();
                $("#masters").hide();
            }
        }

        function masters() {
            if ($("#masters_status").val() == "Yes") {
                // If "Yes" is selected, show the related fields
                $("#masters_fields").show();
                $("#upload_masters_card").show();

            } else {
                // If "No" is selected, hide the related fields
                $("#masters_fields").hide();
                $("#upload_masters_card").hide();
            }
        }

        function rural() {
            if ($("#rural_status").val() == "Yes") {
                // If "Yes" is selected, show the related fields
                $("#rural").show();
            } else {
                // If "No" is selected, hide the related fields
                $("#rural").hide();
            }
        }

        function loan() {
            if ($("#loan_status").val() == "Yes") {
                // If "Yes" is selected, show the related fields
                $("#loan").show();
            } else {
                // If "No" is selected, hide the related fields
                $("#loan").hide();
            }
        }

        $(document).ready(function() {
            // Initially hide the fields
            $("#bachelor_fields").hide();
            $("#upload_marks_card").hide();
            $("#masters_fields").hide();
            $("#upload_masters_card").hide();
            $("#masters").hide();
            $('#singleparentstatus').hide();
            $('#orphanstatus1').hide();
            $('#orphanstatus2').hide();

            $('#disability').hide();
            $('#rural').hide();
            $('#loan').hide();


            let progressVal = 0;
            let businessType = 0;

            // Aadhar File Input
            $('#aadhar_card').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#aadhar_card-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Image File Input
            $('#image').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#image-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Applicant Signature File Input
            $('#applicant-signature').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#applicant-signature-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Caste and Income Certificate File Input
            $('#caste-income-certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#caste-income-certificate-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // singleparent Certificate File Input
            $('#singleparent').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#singleparent-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // mother death Certificate File Input
            $('#orphan1').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#orphan1-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // father death Certificate File Input
            $('#orphan2').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#orphan2-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // disability Certificate File Input
            $('#disability_certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#disability_certificate-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // SSLC Markscard File Input
            $('#sslc-markscard').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#sslc-markscard-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // PUC Markscard File Input
            $('#puc-markscard').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; //Maximum file size in KB
                var errorMessageElement = $('#puc-markscard-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Bachelor's Markscard File Input
            $('#bachelors-markscard').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#bachelors-markscard-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Masters Markscard File Input
            $('#masters-markscard').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#masters-markscard-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Character Certificate File Input
            $('#character-certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#character-certificate-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // CET Ranking Copy File Input
            $('#cet-ranking-copy').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#cet-ranking-copy-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // College Admission File Input
            $('#college-admission').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#college-admission-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // loan certificate File Input
            $('#loan_certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#loan_certificate-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });


            // Parent Signature File Input
            $('#parent-signature').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#parent-signature-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Generic function for file validation
            function validateFile(fileInput, maxFileSizeKB, errorMessageElement) {
                // Check if any file is selected
                if (fileInput.files.length > 0) {
                    var fileSizeKB = fileInput.files[0].size / 1024; // Calculate file size in KB

                    // Display an error message if the file size exceeds the limit
                    if (fileSizeKB > maxFileSizeKB) {
                        errorMessageElement.text("File size exceeds the maximum limit (" + maxFileSizeKB + " KB).");
                        fileInput.value = ""; // Clear the file input (for some browsers)
                        $(fileInput).val(''); // Clear the file input (for all browsers)
                    } else {
                        errorMessageElement.text(""); // Clear the error message
                    }
                }
            }

            //tab 1
            $('#personaltab').click(function() {
                let dob = $('#dob').val();
                let aadhar_number = $('#aadhar_number').val();
                let aadhar_card = $('#aadhar_card').val();
                let applicant_mobile = $('#applicant_mobile').val();
                let alternative_mobile = $('#alternative_mobile').val();
                let applicant_father_name = $('#applicant_father_name').val();
                let dependent = $('#dependent').val();
                let singleparent = $('#singleparent').val();
                let orphan1 = $('#orphan1').val();
                let orphan2 = $('#orphan2').val();
                let address = $('#address').val();
                let state = $('#state').val();
                let district = $('#district').val();
                let taluk = $('#taluk').val();
                let pincode = $('#pincode').val();
                let residential_address = $('#residential_address').val();
                let income_range = $('#income_range').val();
                let disability_status = $('#disability_status').val();
                let disability_certificate = $('#disability_certificate').val();
                let image = $('#image').val();
                let applicant_signature = $('#applicant-signature').val();
                let caste_income_certificate = $('#caste-income-certificate').val();


                if (dob == "") {
                    $('#dob-error').html('Please enter the Date of Birth');
                    $('#dob-error').show('fast');
                    $('#dob').focus();
                } else if (aadhar_number == "") {
                    $('#aadhar_number-error').html('Please enter the Aadhar Number');
                    $('#aadhar_number-error').show('fast');
                    $('#aadhar_number').focus();
                } else if (aadhar_card == "") {
                    $('#aadhar_card-error').html('Please Upload Aadhar Card');
                    $('#aadhar_card-error').show('fast');
                    $('#aadhar_card').focus();
                } else if (image == "") {
                    $('#image-error').html('Please upload applicant image');
                    $('#image-error').show('fast');
                    $('#image').focus();
                } else if (applicant_mobile == "") {
                    $('#applicant_mobile-error').html('Please enter the Mobile Number');
                    $('#applicant_mobile-error').show('fast');
                    $('#applicant_mobile').focus();
                } else if (alternative_mobile == "") {
                    $('#alternative_mobile-error').html('Please enter the Alternative Mobile number');
                    $('#alternative_mobile-error').show('fast');
                    $('#alternative_mobile').focus();
                } else if (applicant_signature == "") {
                    $('#applicant-signature-error').html('Please upload applicant Signature');
                    $('#applicant-signature-error').show('fast');
                    $('#applicant-signature').focus();
                } else if (applicant_father_name == "") {
                    $('#applicant_father_name-error').html('Please enter the Father Name');
                    $('#applicant_father_name-error').show('fast');
                    $('#applicant_father_name').focus();
                } else if (dependent == "") {
                    $('#dependent-error').html('Please select the option');
                    $('#dependent-error').show('fast');
                    $('#dependent').focus();
                } else if (dependent == "Single parent" && singleparent == "") {
                    $('#singleparent-error').html('Please Upload Certificate');
                    $('#singleparent-error').show('fast');
                    $('#singleparent').focus();
                } else if (dependent == "Orphan" && orphan1 == "") {
                    $('#orphan1-error').html('Please Upload Certificate');
                    $('#orphan1-error').show('fast');
                    $('#orphan1').focus();
                } else if (dependent == "Orphan" && orphan2 == "") {
                    $('#orphan2-error').html('Please Upload Certificate');
                    $('#orphan2-error').show('fast');
                    $('#orphan2').focus();
                } else if (address == "") {
                    $('#address-error').html('Please enter the Address');
                    $('#address-error').show('fast');
                    $('#address').focus();
                } else if (state == "") {
                    $('#state-error').html('Please enter the state');
                    $('#state-error').show('fast');
                    $('#state').focus();
                } else if (district == "") {
                    $('#district-error').html('Please enter the district');
                    $('#district-error').show('fast');
                    $('#district').focus();
                } else if (taluk == "") {
                    $('#taluk-error').html('Please enter the taluk');
                    $('#taluk-error').show('fast');
                    $('#taluk').focus();
                } else if (pincode == "") {
                    $('#pincode-error').html('Please enter the pincode');
                    $('#pincode-error').show('fast');
                    $('#pincode').focus();
                } else if (residential_address == "") {
                    $('#residential_address-error').html('Please fill the residential address');
                    $('#residential_address-error').show('fast');
                    $('#residential_address').focus();
                } else if (income_range == "") {
                    $('#income_range-error').html('Please select the option');
                    $('#income_range-error').show('fast');
                    $('#income_range').focus();
                } else if (caste_income_certificate == "") {
                    $('#caste-income-certificate-error').html('Please Upload Income Certificate');
                    $('#caste-income-certificate-error').show('fast');
                    $('#caste-income-certificate').focus();
                } else if (disability_status == "") {
                    $('#disability_status-error').html('Please select the option');
                    $('#disability_status-error').show('fast');
                    $('#disability_status').focus();
                } else if (disability_status == "Yes" && disability_certificate == "") {
                    $('#disability_certificate-error').html('Please upload the disability certificate');
                    $('#disability_certificate-error').show('fast');
                    $('#disability_certificate').focus();
                } else {
                    console.log($(this).parent().parent().parent().next().show("fast"));
                    $(this).parent().parent().parent().css({
                        display: "none"
                    });
                    progressVal = progressVal + 1;
                    $(".progress-active")
                        .removeClass("progress-active")
                        .addClass("progress-activated")
                        .next()
                        .addClass("progress-active");

                    $('#present_course').show('fast');
                    $('#present_course').focus();
                }
            });

            //tab 2
            $('#acadamictab').click(function() {
                let present_college_name = $('#present_college_name').val();
                let present_course = $('#present_course').val();
                let fee = $('#fee').val();
                let sslcmarks = $('#sslcmarks').val();
                let sslcmarkscard = $('#sslc-markscard').val();
                let puc_dip = $('#puc_marks').val();
                let puc_dip_markscard = $('#puc-markscard').val();
                let bachelor_status = $('#bachelor_status').val();
                let ug_marks = $('#ug_marks').val();
                let bachelors_markscard = $('#bachelors-markscard').val();
                let masters_status = $('#masters_status').val();
                let pg_marks = $('#pg_marks').val();
                let masters_markscard = $('#masters-markscard').val();
                let previous_course = $('#previous_course').val();
                let character_certificate = $('#character-certificate').val();
                let rural_status = $('#rural_status').val();
                let rural_certificate = $('#rural_certificate').val();

                if (present_course == "") {
                    $('#present_course-error').html('Please Fill Present Course');
                    $('#present_course-error').show('fast');
                    $('#present_course').focus();
                } else if (present_college_name == "") {
                    $('#present_college_name-error').html('Please Fill College Name');
                    $('#present_college_name-error').show('fast');
                    $('#present_college_name').focus();
                } else if (fee == "") {
                    $('#fee-error').html('Please Fill The amount');
                    $('#fee-error').show('fast');
                    $('#fee').focus();
                } else if (sslcmarks == "") {
                    $('#sslcmarks-error').html('Please Fill SSLC Marks');
                    $('#sslcmarks-error').show('fast');
                    $('#sslcmarks').focus();
                } else if (sslcmarkscard == "") {
                    $('#sslc-markscard-error').html('Please Fill SSLC Markscard');
                    $('#sslc-markscard-error').show('fast');
                    $('#sslc-markscard').focus();
                } else if (puc_dip == "") {
                    $('#puc_marks-error').html('Please Fill PUC/Diploma Marks');
                    $('#puc_marks-error').show('fast');
                    $('#puc_marks').focus();
                } else if (puc_dip_markscard == "") {
                    $('#puc-markscard-error').html('Please Fill PUC/Diploma Markscard');
                    $('#puc-markscard-error').show('fast');
                    $('#puc-markscard').focus();
                } else if (bachelor_status == "") {
                    $('#bachelor_status-error').html('Please Select the option');
                    $('#bachelor_status-error').show('fast');
                    $('#bachelor_status').focus();
                } else if (bachelor_status == "Yes" && ug_marks == "") {
                    $('#ug_marks-error').html('Please Fill Bachelors Marks');
                    $('#ug_marks-error').show('fast');
                    $('#ug_marks').focus();
                } else if (bachelor_status == "Yes" && bachelors_markscard == "") {
                    $('#bachelors-markscard-error').html('Please Fill Bachelors Markscard');
                    $('#bachelors-markscard-error').show('fast');
                    $('#bachelors-markscard').focus();
                } else if (bachelor_status == "Yes" && masters_status == "") {
                    $('#masters_status-error').html('Please select the option');
                    $('#masters_status-error').show('fast');
                    $('#masters_status').focus();
                } else if (bachelor_status == "Yes" && masters_status == "Yes" && pg_marks == "") {
                    $('#pg_marks-error').html('Please Fill Masters Marks');
                    $('#pg_marks-error').show('fast');
                    $('#pg_marks').focus();
                } else if (bachelor_status == "Yes" && masters_status == "Yes" && masters_markscard == "") {
                    $('#masters-markscard-error').html('Please Fill Masters Markscard');
                    $('#masters-markscard-error').show('fast');
                    $('#masters-markscard').focus();
                } else if (character_certificate == "") {
                    $('#character-certificate-error').html('Please select the character certificate');
                    $('#character-certificate-error').show('fast');
                    $('#character-certificate').focus();
                } else if (rural_status == "") {
                    $('#rural_status-error').html('Please select the option');
                    $('#rural_status-error').show('fast');
                    $('#rural_status').focus();
                } else if (rural_status == "Yes" && rural_certificate == "") {
                    $('#rural_certificate-error').html('Please upload Rural Certificate');
                    $('#rural_certificate-error').show('fast');
                    $('#rural_certificate').focus();
                } else {
                    console.log($(this).parent().parent().parent().next().show("fast"));
                    $(this).parent().parent().parent().css({
                        display: "none"
                    });
                    progressVal = progressVal + 1;
                    $(".progress-active")
                        .removeClass("progress-active")
                        .addClass("progress-activated")
                        .next()
                        .addClass("progress-active");

                    $('#loan_status').show('fast');
                    $('#loan_status').focus();
                }
            });

            //tab 3
            $('#othertab').click(function() {
                let loan_status = $('#loan_status').val();
                let loan_certificate = $('#loan_certificate').val();
                let cur_hostel_name = $('#cur_hostel_name').val();
                let amount_paying = $('#amount_paying').val();
                let govt_org_name = $('#govt_org_name').val();
                let duration = $('#duration').val();
                let granted_amount = $('#granted_amount').val();
                let utilized = $('#utilized').val();
                let course = $('#course').val();
                let college_name1 = $('#college_name1').val();
                let parent_signature = $('#parent-signature').val();

                if (loan_status == "") {
                    $('#loan_status-error').html('Please Select the option');
                    $('#loan_status-error').show('fast');
                    $('#loan_status').focus();
                } else if (loan_status == "Yes" && loan_certificate == "") {
                    $('#loan_certificate-error').html('Please upload Documents');
                    $('#loan_certificate-error').show('fast');
                    $('#loan_certificate').focus();
                } else if (cur_hostel_name == "") {
                    $('#cur_hostel_name-error').html('Please fill Hostel name and address');
                    $('#cur_hostel_name-error').show('fast');
                    $('#cur_hostel_name').focus();
                } else if (amount_paying == "") {
                    $('#amount_paying-error').html('Please mention amount need to pay');
                    $('#amount_paying-error').show('fast');
                    $('#amount_paying').focus();
                } else if (govt_org_name == "") {
                    $('#govt_org_name-error').html('Please fill Govt/org name');
                    $('#govt_org_name-error').show('fast');
                    $('#govt_org_name').focus();
                } else if (duration == "") {
                    $('#duration-error').html('Please mention duration');
                    $('#duration-error').show('fast');
                    $('#duration').focus();
                } else if (granted_amount == "") {
                    $('#granted_amount-error').html('Please mention amount');
                    $('#granted_amount-error').show('fast');
                    $('#granted_amount').focus();
                } else if (utilized == "") {
                    $('#utilized-error').html('Please mention how it has been utilized');
                    $('#utilized-error').show('fast');
                    $('#utilized').focus();
                } else if (course == "") {
                    $('#course-error').html('Please fill Course');
                    $('#course-error').show('fast');
                    $('#course').focus();
                } else if (college_name1 == "") {
                    $('#college_name1-error').html('Please fill College name');
                    $('#college_name1-error').show('fast');
                    $('#college_name1').focus();
                } else if (parent_signature == "") {
                    $('#parent-signature-error').html('Please fill Guardian name');
                    $('#parent-signature-error').show('fast');
                    $('#parent-signature').focus();
                } else {
                    console.log($(this).parent().parent().parent().next().show("fast"));
                    $(this).parent().parent().parent().css({
                        display: "none"
                    });
                    progressVal = progressVal + 1;
                    $(".progress-active")
                        .removeClass("progress-active")
                        .addClass("progress-activated")
                        .next()
                        .addClass("progress-active");
                }
            });
        });
    </script>
</head>

<body>
    <?php
    if (session('log_status') !== true) {
        // Log status is false, redirect to login page
        echo "<script>console.error('Redirecting to /studentlogin'); location.href = '/studentlogin';</script>";
        exit();
    }
    ?>

    <div class="main-wrapper">
        <!-- scholarship code starts -->
        <section class="page-content course-sec">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="add-course-header">
                            <h2>Apply for scholarship</h2>
                            <a href="/studentpage"><b>Back to Home </b></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="widget-set">
                                <div class="widget-setcount">
                                    <ul id="progressbar">
                                        <li class="progress-active">
                                            <p><span></span>Personal Information</p>
                                        </li>
                                        <li>
                                            <p><span></span> Academics </p>
                                        </li>
                                        <li>
                                            <p><span></span> Other details</p>
                                        </li>
                                        <li>
                                            <p><span></span>Declaration</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget-content multistep-form">
                                    <form action="/scholarshipcheck" id="applicationform" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <fieldset id="first">
                                            <div class="add-course-info">
                                                <div class="add-course-inner-header">
                                                    <h4>Personal Information</h4>
                                                </div>
                                                <div class="add-course-form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Applicant's Name</label>
                                                                <input type="text" name="id" value="{{$user->id}}" hidden> <!-- application ID -->
                                                                <input type="text" name="applicant_name" class="form-control" value="{{$user->applicant_name}}" placeholder="Student Name" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Date of Birth</label>
                                                                <input type="date" name="dob" class="form-control" value="{{$user->dob}}" id="dob" required>
                                                                <div class="error-message text-danger" id="dob-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Aadhar Number</label>
                                                                <input type="text" name="aadhar_number" class="form-control" value="{{$user->aadhar_number}}" placeholder="Aadhar Name" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Aadhar Card</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="aadhar_card" value="{{$user->aadhar_card}}" class="form-control1" id="aadhar_card" accept=".jpg, .jpeg, .png" max="500000" required>
                                                                </div>
                                                                <div class="error-message text-danger" id="aadhar_card-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Applicant's Image</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="applicant_image" value="{{$user->applicant_image}}" class="form-control1" id="image" accept=".jpg, .jpeg, .png" max="500000" required>
                                                                </div>
                                                                <div class="error-message text-danger" id="image-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Mobile Number</label>
                                                                <input type="text" name="applicant_mobile" class="form-control" value="{{$user->mobile_number}}" id="applicant_mobile" placeholder="Mobile Number" required>
                                                                <div class="error-message text-danger" id="applicant_mobile-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Alternative Mobile Number</label>
                                                                <input type="text" name="alternative_mobile" class="form-control" value="{{$user->alternative_mobile}}" id="alternative_mobile" placeholder="Alternative Mobile Number" required>
                                                                <div class="error-message text-danger" id="alternative_mobile-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Year of course</label>
                                                                <input type="text" name="year" value="<?php echo date('Y'); ?>" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Your Signature</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="applicant_sign" value="{{$user->applicant_sign}}" class="form-control1" id="applicant-signature" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="applicant-signature-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Father's Name</label>
                                                                <input type="text" class="form-control" name="applicant_father_name" value="{{$user->father_name}}" placeholder="Father's Name" id="applicant_father_name">
                                                                <div class="error-message text-danger" id="applicant_father_name-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Occupation of father</label>
                                                                <input type="text" class="form-control" name="father_occupation" id="father_occupation" value="{{$user->father_occupation}}" placeholder="Father occupation">
                                                                <div class="error-message text-danger" id="father_occupation-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Dependent Status</label>
                                                                <select name="dependent" class="form-control select" id="dependent" onchange="dependentstatus()">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Both parent living">Both Parents Living</option>
                                                                    <option value="Single parent">Single Parent</option>
                                                                    <option value="Orphan">Orphan</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="dependent-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="singleparentstatus">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If Single Parent! Upload death certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="singleparent" class="form-control1" id="singleparent" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="singleparent-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="orphanstatus1">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If Orphan! Upload Mother Death certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="orphan1" class="form-control1" id="orphan1" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="orphan1-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="orphanstatus2">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If Orphan! Upload Father death certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="orphan2" class="form-control1" id="orphan2" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="orphan2-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Address</label>
                                                                <textarea class="form-control" name="address" placeholder="Address" rows="3" id="address">{{$user->address}}</textarea>
                                                                <div class="error-message text-danger" id="address-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">State</label>
                                                                <input type="text" name="state" value="{{$user->state}}" class="form-control" placeholder="State" id="state">
                                                                <div class="error-message text-danger" id="state-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">District</label>
                                                                <input type="text" name="district" value="{{$user->district}}" class="form-control" placeholder="District" id="district">
                                                                <div class="error-message text-danger" id="district-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Taluk</label>
                                                                <input type="text" name="taluk" value="{{$user->taluk}}" class="form-control" placeholder="Taluk" id="taluk">
                                                                <div class="error-message text-danger" id="taluk-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Zip/Postal Code</label>
                                                                <input type="text" name="pincode" value="{{$user->pincode}}" class="form-control" placeholder="Pin Code" id="pincode">
                                                                <div class="error-message text-danger" id="pincode-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Residential Address</label>
                                                                <textarea class="form-control" name="residential_address" placeholder="Address" rows="2" id="residential_address"></textarea>
                                                                <div class="error-message text-danger" id="residential_address-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Income Range? per annual</label>
                                                                <select name="income_range" class="form-control select" id="income_range">
                                                                    <option value="" selected>Select</option>
                                                                    <option>Less than 50,000</option>
                                                                    <option>Between 50,000 to 1,00,000</option>
                                                                    <option>Greater Than 1,00,000</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="income_range-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Caste/Income Certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="income_cer" class="form-control1" id="caste-income-certificate" accept=".jpg, .jpeg, .png" max="500000" required>
                                                                </div>
                                                                <div class="error-message text-danger" id="caste-income-certificate-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Do you have any disability?</label>
                                                                <select class="form-control select" name="disability_status" id="disability_status" onchange="disability()">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="disability_status-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" id="disability">
                                                                <label class="add-course-label">If yes! then upload disability certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="disability_certificate" class="form-control1" id="disability_certificate" accept=" .jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="disability_certificate-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-btn">
                                                    <a class="btn btn-black">Back</a>
                                                    <a class="btn btn-info-light" id="personaltab">Continue</a>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="field-card" id="second">
                                            <div class="add-course-info">
                                                <div class="add-course-inner-header">
                                                    <h4>Academics</h4>
                                                </div>
                                                <div class="add-course-form">

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Ongoing academic program</label>
                                                                <input type="text" class="form-control" name="present_course" placeholder="Present course" id="present_course">
                                                                <div class="error-message text-danger" id="present_course-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">College Name</label>
                                                                <input type="text" class="form-control" name="present_college_name" placeholder="College Name" id="present_college_name">
                                                                <div class="error-message text-danger" id="present_college_name-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Fee payable this year</label>
                                                                <input type="text" class="form-control" name="fee" placeholder="Total fee need to pay" id="fee">
                                                                <div class="error-message text-danger" id="fee-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="add-course-inner-header mt-5">
                                                            <h4>Previous year details</h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">SSLC Percentage/CGPA</label>
                                                                <input type="text" name="sslc_marks" value="{{$user->sslc_marks}}" id="sslcmarks" class="form-control" placeholder="ex:Percentage or CGPA">
                                                                <div class="error-message text-danger" id="sslcmarks-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload SSLC Marks card</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="sslc_markscard" value="{{$user->sslc_markscard}}" class="form-control1" id="sslc-markscard" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="sslc-markscard-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">PUC/Diploma Percentage/CGPA</label>
                                                                <input type="text" name="puc_marks" value="{{$user->puc_diploma_marks}}" id="puc_marks" class="form-control" placeholder="ex:Percentage or CGPA">
                                                                <div class="error-message text-danger" id="puc_marks-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload PUC/Diploma Markscard</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="puc_markscard" value="{{$user->puc_diploma_markscard}}" class="form-control1" id="puc-markscard" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="puc-markscard-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Have you done bachelors</label>
                                                                <select name="single_parent" id="bachelor_status" onchange="bachelors()" class="form-control select">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="bachelor_status-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="bachelor_fields">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Bachelor's degree Percentage/CGPA</label>
                                                                <input type="text" name="ug_marks" class="form-control" id="ug_marks" placeholder="ex: Percentage or CGPA">
                                                                <div class="error-message text-danger" id="ug_marks-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="upload_marks_card">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Bachelor's Marks Card</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="ug_markscard" class="form-control1" id="bachelors-markscard" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="bachelors-markscard-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="masters">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Have you done masters</label>
                                                                <select name="single_parent" id="masters_status" onchange="masters()" class="form-control select">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="masters_status-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="masters_fields">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Master's Percentage/CGPA</label>
                                                                <input type="text" name="pg_marks" class="form-control" id="pg_marks" placeholder="ex:Percent or GCPA">
                                                                <div class="error-message text-danger" id="pg_marks-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="upload_masters_card">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Master's markscard</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="pg_markscard" class="form-control1" id="masters-markscard" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="masters-markscard-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Character certificate (From Current college)</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="character_cer" class="form-control1" id="character-certificate" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="character-certificate-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Are you studied in rural area till SSLC?</label>
                                                                <select class="form-control select" name="rural_status" id="rural_status" onchange="rural()">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="rural_status-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" id="rural">
                                                                <label class="add-course-label">If yes! then upload attested SSLC certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="rural_certificate" class="form-control1" id="rural_certificate" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="rural_certificate-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-btn">
                                                    <a class="btn btn-black prev_btn">Previous</a>
                                                    <a class="btn btn-info-light" id="acadamictab">Continue</a>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="field-card">
                                            <div class="add-course-info">
                                                <div class="add-course-inner-header">
                                                    <h4>Other Details</h4>
                                                </div>
                                                <div class="add-course-form">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Are you obtaining any loan amount from the bank?</label>
                                                                <select class="form-control select" name="loan_status" id="loan_status" onchange="loan()">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option Value="No">No</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="loan_status-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" id="loan">
                                                                <label class="add-course-label">If yes then upload loan documents</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="loan_certificate" class="form-control1" id="loan_certificate" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="loan_certificate-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label class="add-course-label">A student who is currently studying in any free/paid hostel,
                                                                    please specify the name and address of the hostel,
                                                                    and the amount they have paid or need to pay per month/year. (If not mention N/A)
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control mt-1" name="cur_hostel_name" id="cur_hostel_name" placeholder="Hostel name and address">
                                                                        <div class="error-message text-danger" id="cur_hostel_name-error"></div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control mt-1" name="amount_paying" id="amount_paying" placeholder="How much need to pay per month/year">
                                                                        <div class="error-message text-danger" id="amount_paying-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If a student is receiving financial assistance from the
                                                                    government or other organizations in the form of a scholarship,
                                                                    please provide details of the scholarship amount and duration. (If not mention N/A)
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control mt-1" name="govt_org_name" id="govt_org_name" placeholder="Government or Organization name">
                                                                        <div class="error-message text-danger" id="govt_org_name-error"></div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control mt-1" name="amount_govt" id="duration" placeholder="Duration if applicable">
                                                                        <div class="error-message text-danger" id="duration-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If the student has received a scholarship from our institution in previous years,
                                                                    please provide the details of the scholarship, including the amount and how it has been utilized.(If not mention N/A)
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control mt-1" name="granted_amount" id="granted_amount" placeholder="Mention amount">
                                                                        <div class="error-message text-danger" id="granted_amount-error"></div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control mt-1" name="utilized" id="utilized" placeholder="how it has been utilized">
                                                                        <div class="error-message text-danger" id="utilized-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="add-course-inner-header text-center" style="margin-top: 50px;">
                                                            <h4>Affidavit of parents</h4>
                                                        </div>
                                                        <div class="grid-container">
                                                            <div>
                                                                <label>My son/Daughter, <b> {{$user->applicant_name}} </b> the student studing</label>
                                                            </div>
                                                            <div>
                                                                <input type="text" name="course" value="" id="course" class="form-control" placeholder="Current Course Name">
                                                                <div class="error-message text-danger" id="course-error"></div>
                                                            </div>
                                                            <div>
                                                                <label>In</label>
                                                                <input type="text" name="college_name1" value="" id="college_name1" class="form-control" placeholder="College Name">
                                                                <div class="error-message text-danger" id="college_name1-error"></div>
                                                            </div>
                                                            <div>
                                                                <label>
                                                                    I hereby request to grant scholarship for the year <?php
                                                                                                                        $currentYear = date('Y');
                                                                                                                        $nextYear = $currentYear + 1;
                                                                                                                        $formattedYears = $currentYear . '/' . substr($nextYear, -2);

                                                                                                                        echo $formattedYears; // This will output something like "2023/24"
                                                                                                                        ?>
                                                                    from <b>Rao Bahadhur Dharmapravartha Gubbi Thotadappa hostel.</b>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mt-5">
                                                                    <label class="add-course-label">Upload Guardian Sign </label>
                                                                    <div class="relative-form" style="width:100%;">
                                                                        <input type="file" name="guardian_sign" class="form-control1" id="parent-signature" accept=".jpg, .jpeg, .png" max="500000">
                                                                    </div>
                                                                    <div class="error-message text-danger" id="parent-signature-error"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="widget-btn">
                                                    <a class="btn btn-black prev_btn">Previous</a>
                                                    <a class="btn btn-info-light" id="othertab">Continue</a>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="field-card">
                                            <div class="add-course-info">
                                                <div class="add-course-inner-header">
                                                    <h4>Rules and Regulations:</h4>
                                                </div>
                                                <div class="add-course-form">

                                                    <label>
                                                        1) Providing all the details and documents requested in the application within the stipulated time. Failure to do so will result in rejection of such applications. <br>

                                                        2) Only those students who have passed all the subjects of the years annual examinations are eligible to apply.<br>

                                                        3) Students availing free studentship facility and freeship, merit scholarship or any free scholarship should confirm such details and submit honestly.<br>

                                                        4) Applicant Should be Veerashaiva Lingayat students.<br>
                                                    </label>

                                                    <div class="form-check remember-me mt-5">
                                                        <label class="form-check-label mb-0">
                                                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required> I agree to the Terms and conditions
                                                            <div class="error-message text-danger" id="terms-error"></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="widget-btn">
                                                    <a class="btn btn-black prev_btn">Previous</a>
                                                    <input type="submit" name="submit" class="btn btn-success-dark" id="finaltab" value="submit">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script data-cfasync="false" src="/assets/js/email-decode.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/owl.carousel.min.js"></script>

    <script src="/assets/plugins/aos/aos.js"></script>

    <script src="/assets/js/jquery.waypoints.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>

    <script src="/assets/plugins/select2/js/select2.min.js"></script>

    <script src="/assets/plugins/slick/slick.js"></script>

    <script src="/assets/plugins/swiper/js/swiper.min.js"></script>

    <script src="/assets/js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>