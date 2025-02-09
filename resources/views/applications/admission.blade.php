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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function validate_marks(mobile) {
            var pattern = /^[0-9]+$/;
            if (!pattern.test(mobile) || mobile.length > 3) {
                return false;
            }
            return true;
        }

        function dependentstatus() {
            if ($('#dependent').val() == "Single Parent") {
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

        function parentdisability() {
            if ($("#parentdisability_status").val() == "Yes") {
                // If "Yes" is selected, show the related fields
                $("#parentdisability").show();
            } else {
                // If "No" is selected, hide the related fields
                $("#parentdisability").hide();
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

        function joinstatus() {
            if ($("#join_status").val() == "Joined") {
                // If "Yes" is selected, show the related fields
                $("#college_name").show();
                $('#fee_receipt').show();
            } else {
                // If "No" is selected, hide the related fields
                $("#college_name").hide();
                $('#fee_receipt').hide();
            }
        }

        function achievementstatus() {
            if ($('#achievement_status').val() == "Yes") {
                $('#achievement_type').show();
                $('#achievement_certificate').show();
            } else {
                $('#achievement_type').hide();
                $('#achievement_certificate').hide();
            }
        }

        $(document).ready(function() {
            // Initially hide the fields
            $("#bachelor_fields").hide();
            $("#upload_marks_card").hide();
            // Detect changes in the dropdown
            $("#masters_fields").hide();
            $("#upload_masters_card").hide();
            $("#masters").hide();

            $('#singleparentstatus').hide();
            $('#orphanstatus1').hide();
            $('#orphanstatus2').hide();

            $("#disability").hide();
            $('#parentdisability').hide();

            $('#rural').hide();

            $('#college_name').hide();
            $('#fee_receipt').hide();

            $('#achievement_type').hide();
            $('#achievement_certificate').hide();

            let progressVal = 0;
            let businessType = 0;

            // Image File Input
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

            // Single parent file input
            $('#singleparent').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#singleparent-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // orphan1 file input
            $('#orphan1').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#orphan1-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Orphan2 file input
            $('#orphan2').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#orphan2-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // doctor_certificate file input
            $('#disability_certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#disability_certificate-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // parentdisability_status file input
            $('#parentdisability_certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#parentdisability_certificate-error');
                validateFile(fileInput, maxFileSizeKB, errorMessageElement);
            });

            // Caste and Income Certificate File Input
            $('#caste-income-certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#caste-income-certificate-error');
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

            // Rural Certificate File Input
            $('#rural_certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#rural_certificate-error');
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

            // achievements_certificate File Input
            $('#achievements_certificate').on('change', function() {
                var fileInput = this;
                var maxFileSizeKB = 500; // Maximum file size in KB
                var errorMessageElement = $('#achievements_certificate-error');
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

            $('#personaltab').click(function() {
                //tab 1
                let selecthostel = $('#selecthostel').val();
                let dob = $('#dob').val();
                let gender = $('#gender').val();
                let aadhar_card = $('#aadhar_card').val();
                let applicant_mobile = $('#applicant_mobile').val();
                let applicant_alter_mobile = $('#applicant_alter_mobile').val();
                let applicant_father_name = $('#applicant_father_name').val();
                let father_occupation = $('#father_occupation').val();
                let dependent = $('#dependent').val();
                let singleparent = $('#singleparent').val();
                let orphan1 = $('#orphan1').val();
                let orphan2 = $('#orphan2').val();
                let address = $('#address').val();
                let state = $('#state').val();
                let district = $('#district').val();
                let taluk = $('#taluk').val();
                let pincode = $('#pincode').val();
                let income_range = $('#income_range').val();
                let disability_status = $('#disability_status').val();
                let doctor_certificate = $('#doctor_certificate').val();
                let parentdisability_status = $('#parentdisability_status').val();
                let parentdisability_certificate = $('#parentdisability_certificate').val();
                let image = $('#image').val();
                let applicant_signature = $('#applicant-signature').val();
                let caste_income_certificate = $('#caste-income-certificate').val();

                if (selecthostel == "") {
                    $('#selecthostel-error').html('Please Select which hostel you are applying');
                    $('#selecthostel-error').show('fast');
                    $('#selecthostel').focus();
                } else if (dob == "") {
                    $('#dob-error').html('Please enter the Date of Birth');
                    $('#dob-error').show('fast');
                    $('#dob').focus();
                } else if (gender == "") {
                    $('#gender-error').html('Please select Gender')
                    $('#gender-error').show('fast');
                    $('#gender').focus();
                } else if (aadhar_card == "") {
                    $('#aadhar_card-error').html('Please Upload Aadhar Card')
                    $('#aadhar_card-error').show('fast');
                    $('#aadhar_card').focus();
                } else if (image == "") {
                    $('#image-error').html('Please Upload applicant image');
                    $('#image-error').show('fast');
                    $('#image').focus();
                } else if (applicant_mobile == "") {
                    $('#applicant_mobile-error').html('Please enter the Mobile Number');
                    $('#applicant_mobile-error').show('fast');
                    $('#applicant_mobile').focus();
                } else if (applicant_alter_mobile == "") {
                    $('#applicant_alter_mobile-error').html('Please enter the Alternative Mobile Number');
                    $('#applicant_alter_mobile-error').show('fast');
                    $('#applicant_alter_mobile').focus();
                } else if (applicant_signature == "") {
                    $('#applicant-signature-error').html('Please upload applicant Signature');
                    $('#applicant-signature-error').show('fast');
                    $('#applicant-signature').focus();
                } else if (applicant_father_name == "") {
                    $('#applicant_father_namel-error').html('Please enter the Father Name');
                    $('#applicant_father_namel-error').show('fast');
                    $('#applicant_father_name').focus();
                } else if (father_occupation == "") {
                    $('#father_occupation-error').html('Please enter the Father Occupation');
                    $('#father_occupation-error').show('fast');
                    $('#father_occupation').focus();
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
                } else if (income_range == "") {
                    $('#income_range-error').html('Please select the income_range');
                    $('#income_range-error').show('fast');
                    $('#income_range').focus();
                } else if (caste_income_certificate == "") {
                    $('#caste-income-certificate-error').html('Please Upload the Income Certificate');
                    $('#caste-income-certificate-error').show('fast');
                    $('#caste-income-certificate').focus();
                } else if (disability_status == "") {
                    $('#disability_status-error').html('Please select the option');
                    $('#disability_status-error').show('fast');
                    $('#disability_status').focus();
                } else if (disability_status == "Yes" && doctor_certificate == "") {
                    $('#doctor_certificate-error').html('Please upload the doctor certificate');
                    $('#doctor_certificate-error').show('fast');
                    $('#doctor_certificate').focus();
                } else if (parentdisability_status == "") {
                    $('#parentdisability_status-error').html('Please select the option');
                    $('#parentdisability_status-error').show('fast');
                    $('#parentdisability_status').focus();
                } else if (parentdisability_status == "Yes" && parentdisability_certificate == "") {
                    $('#parentdisability_certificate-error').html('Please upload the doctor certificate');
                    $('#parentdisability_certificate-error').show('fast');
                    $('#parentdisability_certificate').focus();
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

                    $('#sslcmarks').show('fast')
                    $('#sslcmarks').focus();
                }
            });

            //tab 2
            $('#acadamictab').click(function() {
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
                let cet_type = $('#cet_type').val();
                let present_course = $('#present_course').val();
                let join_status = $('#join_status').val();
                let present_college_name = $('#present_college_name').val();
                let college_admission = $('#college-admission').val();

                if (sslcmarks == "") {
                    $('#sslcmarks-error').html('Please Fill SSLC Marks');
                    $('#sslcmarks-error').show('fast');
                    $('#sslcmarks').focus();
                } else if (!validate_marks(sslcmarks)) {
                    $('#sslcmarks-error').html('Dont Include % symbol');
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
                } else if (!validate_marks(puc_dip)) {
                    $('#puc_marks-error').html('Dont Include % symbol');
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
                } else if (bachelor_status == "Yes" && !validate_marks(ug_marks)) {
                    $('#ug_marks-error').html('Dont Include % symbol');
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
                } else if (bachelor_status == "Yes" && masters_status == "Yes" && !validate_marks(pg_marks)) {
                    $('#pg_marks-error').html('Dont Include % symbol');
                    $('#pg_marks-error').show('fast');
                    $('#pg_marks').focus();
                } else if (bachelor_status == "Yes" && masters_status == "Yes" && masters_markscard == "") {
                    $('#masters-markscard-error').html('Please Fill Masters Markscard');
                    $('#masters-markscard-error').show('fast');
                    $('#masters-markscard').focus();
                } else if (previous_course == "") {
                    $('#previous_course-error').html('Please Fill Previously studied course');
                    $('#previous_course-error').show('fast');
                    $('#previous_course').focus();
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
                } else if (cet_type == "") {
                    $('#cet_type-error').html('Please Select the option');
                    $('#cet_type-error').show('fast');
                    $('#cet_type').focus();
                } else if (present_course == "") {
                    $('#present_course-error').html('Please Fill Present Course');
                    $('#present_course-error').show('fast');
                    $('#cpresent_course').focus();
                } else if (join_status == "") {
                    $('#join_status-error').html('Please Select the option');
                    $('#join_status-error').show('fast');
                    $('#join_status').focus();
                } else if (join_status == "Joined" && present_college_name == "") {
                    $('#present_college_name-error').html('Please Fill College Name');
                    $('#present_college_name-error').show('fast');
                    $('#present_college_name').focus();
                } else if (join_status == "Joined" && college_admission == "") {
                    $('#college-admission-error').html('Please select CET or Admission fee receipt');
                    $('#college-admission-error').show('fast');
                    $('#college-admission').focus();
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

                    $('#achievement_status').show('fast')
                    $('#achievement_status').focus();
                }
            });
            //tab 3
            $('#othertab').click(function() {
                let achievement_status = $('#achievement_status').val();
                let scholar_financial = $('#scholar_financial').val();
                let scholar_amount = $('#scholar_amount').val();
                let previous_ourhstl = $('#previous_ourhstl').val();
                let leave_reason = $('#leave_reason').val();
                let relatives = $('#relatives').val();
                let studied_year = $('#studied_year').val();
                let last_year_stay = $('#last_year_stay').val();
                let guardian_name = $('#guardian_name').val();
                let parent_signature = $('#parent-signature').val();

                if (achievement_status == "") {
                    $('#achievement_status-error').html('Please Select the Option');
                    $('#achievement_status-error').show('fast');
                    $('#achievement_status').focus();
                } else if (scholar_financial == "") {
                    $('#scholar_financial-error').html('Please Fill Relavent information');
                    $('#scholar_financial-error').show('fast');
                    $('#scholar_financial').focus();
                } else if (scholar_amount == "") {
                    $('#scholar_amount-error').html('Please Fill Relavent information');
                    $('#scholar_amount-error').show('fast');
                    $('#scholar_amount').focus();
                } else if (previous_ourhstl == "") {
                    $('#previous_ourhstl-error').html('Please Fill Relavent information');
                    $('#previous_ourhstl-error').show('fast');
                    $('#previous_ourhstl').focus();
                } else if (leave_reason == "") {
                    $('#leave_reason-error').html('Please Fill Relavent information');
                    $('#leave_reason-error').show('fast');
                    $('#leave_reason').focus();
                } else if (relatives == "") {
                    $('#relatives-error').html('Please Fill Relavent information');
                    $('#relatives-error').show('fast');
                    $('#relatives').focus();
                } else if (studied_year == "") {
                    $('#studied_year-error').html('Please Fill Relavent information');
                    $('#studied_year-error').show('fast');
                    $('#studied_year').focus();
                } else if (last_year_stay == "") {
                    $('#last_year_stay-error').html('Please Fill Relavent information');
                    $('#last_year_stay-error').show('fast');
                    $('#last_year_stay').focus();
                } else if (guardian_name == "") {
                    $('#guardian_name-error').html('Please fill Guardian name');
                    $('#guardian_name-error').show('fast');
                    $('#guardian_name').focus();
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

                    $('#rules').show('fast')
                    $('#rules').focus();
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

    <!-- <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script> -->

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <div class="main-wrapper">
        <!-- application secction starts -->
        <section class="page-content course-sec">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="add-course-header">
                            <h2>Apply here</h2>
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
                                    <form action="/applicationcheck" id="applicationform" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <fieldset id="first">
                                            <div class="add-course-info">
                                                <div class="add-course-inner-header">
                                                    <h4>Hostel Details</h4>
                                                </div>
                                                <div class="add-course-form">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Select Hostel</label>
                                                                <select name="selecthostel" class="form-control select" id="selecthostel">
                                                                    <option value="" selected>Select</option>
                                                                    @foreach($admission_hostels as $ah)
                                                                    <option value="{{$ah->hostel_name}} - {{$ah->boys_girls}} - {{$ah->hostel_taluk_district}}">{{$ah->hostel_name}} - {{$ah->boys_girls}} - {{$ah->hostel_taluk_district}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="error-message text-danger" id="selecthostel-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li>Online applications are open only for the hostels listed above.
                                                            For hostels that are not accessible online, require applicants to contact their respective hostel office and submit applications manually.
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="add-course-inner-header mt-3">
                                                    <h4>Personal Information</h4>
                                                </div>
                                                <div class="add-course-form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Applicant Name</label>
                                                                <input type="text" name="id" value="{{$user->id}}" hidden> <!-- application ID -->
                                                                <input type="text" name="applicant_name" class="form-control" value="{{$user->applicant_name}}" placeholder="Student Name" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Date of Birth</label>
                                                                <input type="date" name="dob" class="form-control" value="{{$user->dob}}" id="dob" placeholder="Select a date" required>
                                                                <div class="error-message text-danger" id="dob-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Gender</label>
                                                                <select name="gender" class="form-control select" id="gender">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Male">Male</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="gender-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Aadhar Number</label>
                                                                <input type="text" name="aadhar_number" class="form-control" value="{{$user->aadhar_number}}" placeholder="Student Name" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Aadhar Card</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="aadhar_card" id="aadhar_card" value="{{$user->aadhar_card}}" class="form-control1" id="image" accept=".jpg, .jpeg, .png" max="500000" required>
                                                                </div>
                                                                <div class="error-message text-danger" id="aadhar_card-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Applicant Photo</label>
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
                                                            </div>
                                                            <div class="error-message text-danger" id="applicant_mobile-error"></div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Parent Mobile Number</label>
                                                                <input type="text" name="applicant_alter_mobile" class="form-control" value="{{$user->alternative_mobile}}" id="applicant_alter_mobile" placeholder="Parent Mobile Number">
                                                                <div class="error-message text-danger" id="applicant_alter_mobile-error"></div>
                                                            </div>
                                                        </div>

                                                        <input type="text" name="year" value="<?php echo date('Y'); ?>" class="form-control" readonly hidden>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Applicant Signature</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="applicant_sign" value="admission/{{$user->applicant_sign}}" class="form-control1" id="applicant-signature" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="applicant-signature-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Father's Name</label>
                                                                <input type="text" name="applicant_father_name" value="{{$user->father_name}}" id="applicant_father_name" class="form-control" placeholder="Father's Name">
                                                                <div class="error-message text-danger" id="applicant_father_name-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Occupation of father</label>
                                                                <input type="text" name="father_occupation" value="{{$user->father_occupation}}" id="father_occupation" class="form-control" placeholder="Occupation of father">
                                                                <div class="error-message text-danger" id="father_occupation-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Parental Status</label>
                                                                <select name="dependent" class="form-control select" id="dependent" onchange="dependentstatus()">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Both Parent Living">Both Parents Living</option>
                                                                    <option value="Single Parent">Single Parent</option>
                                                                    <option value="Orphan">Orphan</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="dependent-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="singleparentstatus">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If Single Parent, Upload death certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="singleparent" class="form-control1" id="singleparent" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="singleparent-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="orphanstatus1">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If Orphan, Upload Mother Death certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="orphan1" class="form-control1" id="orphan1" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="orphan1-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="orphanstatus2">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If Orphan, Upload Father death certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="orphan2" class="form-control1" id="orphan2" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="orphan2-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Address</label>
                                                                <textarea class="form-control" name="address" placeholder="Address" id="address" rows="3">{{$user->address}}</textarea>
                                                                <div class="error-message text-danger" id="address-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">State</label>
                                                                <input type="text" name="state" value="{{$user->state}}" id="state" class="form-control" placeholder="State">
                                                                <div class="error-message text-danger" id="state-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">District</label>
                                                                <input type="text" name="district" value="{{$user->district}}" id="district" class="form-control" placeholder="District">
                                                                <div class="error-message text-danger" id="district-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Taluk</label>
                                                                <input type="text" name="taluk" value="{{$user->taluk}}" id="taluk" class="form-control" placeholder="Taluk">
                                                                <div class="error-message text-danger" id="taluk-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Zip/Postal Code</label>
                                                                <input type="text" name="pincode" value="{{$user->pincode}}" id="pincode" class="form-control" placeholder="Pin Code">
                                                                <div class="error-message text-danger" id="pincode-error"></div>
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
                                                                <label class="add-course-label">Upload Caste and Income Certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="income_image" class="form-control1" id="caste-income-certificate" accept=".jpg, .jpeg, .png" max="500000" required>
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
                                                        <div class="col-md-6" id="disability">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If Yes, Upload disability certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="disability_certificate" class="form-control1" id="disability_certificate" accept=" .jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="disability_certificate-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Do your parents have a disability?</label>
                                                                <select class="form-control select" name="parentdisability_status" id="parentdisability_status" onchange="parentdisability()">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="parentdisability_status-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="parentdisability">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If Yes, Upload parent disability certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="parentdisability_certificate" class="form-control1" id="parentdisability_certificate" accept=" .jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="parentdisability_certificate-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-btn">
                                                    <a class="btn btn-danger">Back</a>
                                                    <a class="btn btn-info-light" id="personaltab">Continue</a>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset id="second">
                                            <div class="add-course-info">
                                                <div class="add-course-inner-header">
                                                    <h4>Academics</h4>
                                                </div>
                                                <div class="add-course-form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">SSLC Percentage (Convert CGPA/SGPA into Percentage)</label>
                                                                <input type="text" name="sslc_marks" value="{{$user->sslc_marks}}" id="sslcmarks" class="form-control" placeholder="Ex: Percentage (Don't include % symbol)">
                                                                <div class="error-message text-danger" id="sslcmarks-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload SSLC Marks card</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="sslc_markscard" class="form-control1" id="sslc-markscard" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="sslc-markscard-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">PUC/Diploma Percentage (Convert CGPA/SGPA into Percentage)</label>
                                                                <input type="text" name="puc_marks" value="{{$user->puc_diploma_marks}}" id="puc_marks" class="form-control" placeholder="ex:Percentage (Don't include % symbol)">
                                                                <div class="error-message text-danger" id="puc_marks-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload PUC/Diploma Marks Card</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="puc_markscard" class="form-control1" id="puc-markscard" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="puc-markscard-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Have you done Graduation</label>
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
                                                                <label class="add-course-label">Graduation Percentage (Convert CGPA/SGPA into Percentage)</label>
                                                                <input type="text" name="ug_marks" class="form-control" id="ug_marks" placeholder="Ex: Percentage (Don't include % symbol)">
                                                                <div class="error-message text-danger" id="ug_marks-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="upload_marks_card">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Under Graduation Marks Card</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="ug_markscard" class="form-control1" id="bachelors-markscard" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="bachelors-markscard-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="masters">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Have you done Post Graduation</label>
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
                                                                <label class="add-course-label">Post Graduation Percentage (Convert CGPA/SGPA into Percentage)</label>
                                                                <input type="text" name="pg_marks" class="form-control" id="pg_marks" placeholder="ex:Percent (Don't include % symbol)">
                                                                <div class="error-message text-danger" id="pg_marks-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="upload_masters_card">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Upload Post Graduation marks card</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="pg_markscard" class="form-control1" id="masters-markscard" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="masters-markscard-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Previously completed course & class</label>
                                                                <input type="text" name="previous_course" class="form-control" id="previous_course" placeholder="Ex: 2nd PUC">
                                                                <div class="error-message text-danger" id="previous_course-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Character certificate (From Previously studied college)</label>
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
                                                                <label class="add-course-label">If yes, Upload rural certificate</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="rural_certificate" class="form-control1" id="rural_certificate" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="rural_certificate-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="add-course-inner-header mt-5">
                                                            <h4>Course applying for</h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Admission Type</label>
                                                                <select name="cet_type" id="cet_type" class="form-control select">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Other">Other</option>
                                                                    <option value="Management">Management</option>
                                                                    <option value="COMED-K">COMED-K</option>
                                                                    <option value="DCET">D-CET</option>
                                                                    <option value="KCET">K-CET</option>
                                                                    <option value="PGCET">PGCET</option>
                                                                    <option value="NEET">NEET</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="cet_type-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Course name</label>
                                                                <input type="text" name="present_course" class="form-control" id="present_course" placeholder="Ex: Bachelor of Engineering">
                                                                <div class="error-message text-danger" id="present_course-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Are you joined for college</label>
                                                                <select name="college_joined_ornot" id="join_status" class="form-control select" onchange="joinstatus()">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Joined">Joined</option>
                                                                    <option value="Waiting for results">Waiting for results</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="join_status-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="college_name">
                                                            <div class="form-group">
                                                                <label class="add-course-label">College Name</label>
                                                                <input type="text" name="present_college_name" class="form-control" id="present_college_name" placeholder="College Name">
                                                                <div class="error-message text-danger" id="present_college_name-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="fee_receipt">
                                                            <div class="form-group">
                                                                <label class="add-course-label">CET or College Admission fee receipt</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="fee_receipt" class="form-control1" id="college-admission" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                                <div class="error-message text-danger" id="college-admission-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-btn">
                                                    <a class="btn btn-danger prev_btn">Previous</a>
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
                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label class="add-course-label">Have you done any achievements (Ex:Sports(Minimum State level), Academics,etc)</label>
                                                                <select name="achievement_status" id="achievement_status" class="form-control select" onchange="achievementstatus()">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="error-message text-danger" id="achievement_status-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="achievement_type">
                                                            <div class="form-group">
                                                                <label class="add-course-label">achievement </label>
                                                                <input type="text" name="achievement_name" class="form-control" id="achievement_name" placeholder="Ex: State level Volley ball player">
                                                                <div class="error-message text-danger" id="achievement_name-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="achievement_certificate">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If yes, Upload achievement document</label>
                                                                <div class="relative-form" style="width:100%;">
                                                                    <input type="file" name="achievements_certificate" class="form-control1" id="achievements_certificate" accept=".jpg, .jpeg, .png" max="500000">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If the applicant has been awarded any scholarship or financial assistance from an institute or organization, <br>kindly specify the amount and the respective source of funding (if not mention N/A).</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 mt-2">
                                                                        <input type="text" name="scholarship_type" class="form-control" id="scholar_financial" placeholder="Mention source of funding">
                                                                        <div class="error-message text-danger" id="scholar_financial-error"></div>
                                                                    </div>
                                                                    <div class="col-md-6 mt-2">
                                                                        <input type="text" name="scholarship_amount" class="form-control" id="scholar_amount" placeholder="Mention Amount">
                                                                        <div class="error-message text-danger" id="scholar_amount-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If the applicant has previously resided in our Gubbi Thotadappa hostel, <br>please mention the specific year and reason to left(if not mention N/A).</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 mt-2">
                                                                        <input type="text" name="specific_year" class="form-control" id="previous_ourhstl" placeholder="Mention specific year">
                                                                        <div class="error-message text-danger" id="previous_ourhstl-error"></div>
                                                                    </div>
                                                                    <div class="col-md-6 mt-2">
                                                                        <input type="text" name="left_reason" class="form-control" id="leave_reason" placeholder="Reason">
                                                                        <div class="error-message text-danger" id="leave_reason-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label class="add-course-label">If the applicant has any sibling who have currently resided in our hostel, kindly provide the relevant details of those individuals (if not mention N/A).</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 mt-2">
                                                                        <input type="text" name="relative_name" class="form-control" id="relatives" placeholder="Student Name">
                                                                        <div class="error-message text-danger" id="relatives-error"></div>
                                                                    </div>
                                                                    <div class="col-md-6 mt-2">
                                                                        <input type="text" name="studied_year" class="form-control" id="studied_year" placeholder="Mention Specific year">
                                                                        <div class="error-message text-danger" id="studied_year-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="add-course-label">What was your mode of accommodation last year?</label>
                                                                <input type="text" name="applicant_lastyear_stay" class="form-control" id="last_year_stay" placeholder="Provide address">
                                                                <div class="error-message text-danger" id="last_year_stay-error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="add-course-inner-header text-center" style="margin-top: 50px;">
                                                            <h4>Affidavit of parents</h4>
                                                        </div>
                                                        <div class="grid-container">
                                                            <div>
                                                                <label>I,</label>
                                                                <input type="text" name="guardian_name" class="form-control" id="guardian_name" placeholder="Applicant's Parent/guardian name">
                                                                <div class="error-message text-danger" id="guardian_name-error"></div>
                                                            </div>
                                                            <div>
                                                                <label>Confirm that I have thoroughly reviewed the application for my Son/Daughter Mr/Ms <b> {{session('applicant_name')}} </b>,
                                                                    The provided Documents are accurate. I am aware that any false information may lead to rejection/termination of hostel facilities provided.
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mt-3">
                                                                    <label class="add-course-label">Upload Parent/Guardian Sign </label>
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
                                                    <a class="btn btn-danger prev_btn">Previous</a>
                                                    <a class="btn btn-info-light" id="othertab">Continue</a>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="field-card">
                                            <div class="add-course-info">
                                                <div class="add-course-inner-header">
                                                    <h4>Terms and conditions:</h4>
                                                </div>
                                                <div class="add-course-form">

                                                    <!-- <div class="form-group form-group-tagsinput">
                                                <input type="text" data-role="tagsinput" class="input-tags form-control" name="html" value="jquery, bootstrap" id="html">
                                            </div> -->
                                                    <label>
                                                        1. The application will not be considered and will be rejected if the Applicant does not provide currect documents.<br>

                                                        2. The applicant should be a Veerashaiva. <br>

                                                        3. Admission to the boys hostel in Bangalore is only for BE/B.Tech, BSc Nursing, BSc Agriculture, MBBS, B.Pharma, Paramedical, and all PG courses. <br>

                                                        4. The applicant should have at least passed SSLC. <br>

                                                        5. Those who have stayed in RBDGTC hostel before should also submit the admit card along with the eligibility documents. <br>

                                                        6. The applicant is required to upload all the marks cards obtained in the examination. <br>

                                                        7. The applicant must provide a complete address and be prepared to attend the interview. The interview schedule will be posted in the hostel office. <br>

                                                        8. Students should not change the technical or other courses chosen at the time of admission without the permission of the hostel officers. <br>

                                                        9. If the student receives any other accommodation assistance for the aforementioned studies, they must promptly inform and vacate the dormitory. <br>
                                                    </label>
                                                    <div class="form-check remember-me mt-5">
                                                        <label class="form-check-label mb-0">
                                                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required> I agree to the Terms and conditions
                                                            <div class="error-message text-danger" id="terms-error"></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="widget-btn">
                                                    <a class="btn btn-danger prev_btn">Previous</a>
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
    </div>
    </section>
    <!-- application secction ends -->
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