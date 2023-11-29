@extends('admin.layouts.ad_main')

@section('content')

<style>
    hr {
        background-color: #333;
        height: 4px;
        border: none;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    .tab-indent {
        text-indent: 60px;
    }

    .tab-indent1 {
        text-indent: 80px;
    }

    .tab-indent2 {
        text-indent: 250px;
    }

    .tab-indent3 {
        text-indent: 160px;
    }

    .tab-indent4 {
        text-indent: 30px;
    }

    table {
        width: 100%;
    }

    td {
        vertical-align: top;
    }

    .hostel-info {
        width: 80%;
        border: 0px;
        padding: 10px;
    }

    .applicant-photo {
        width: 20%;
        border: 0px;
        text-align: center;
    }

    .date {
        width: 70%;
        border: 0px;
        padding: 10px;
    }

    .sign {
        width: 30%;
        border: 0px;
        text-align: center;
    }
</style>

<script>
    function degreefilter() {
        if ($('#filtercolumn').val() == "degree") {
            $('#filter').show();
        } else {
            $('#filter').hide();
        }
    }
    $(document).ready(function() {

        $('#submit').click(function() {
            var action = $('#action').val();
            var remark = $('#remark').val();
            var app_id = $('#application_id1').val();

            $.ajax({
                url: "/admission/update/" + app_id + "/" + action + "/" + remark,
                type: 'get',
                success: function(result) {
                    console.log(result);
                    $('#eventedit').modal('hide');
                    $('#filterButton').click();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 500) {
                        alert('Internal error: ' + jqXHR.responseText);
                    } else {
                        alert('Unexpected error.');
                    }
                }
            });

        });


        $('#filter').hide();

        $('#filterButton').on('click', function() {
            // Get selected values from the filters
            var pucFilter = $('#pucFilter').val();
            var degreeFilter = $('#degreeFilter').val();
            var dependentFilter = $('#dependentFilter').val();
            var disabilityFilter = $('#disabilityFilter').val();

            var data = {
                "puc": pucFilter,
                "degree": degreeFilter,
                "dependent": dependentFilter,
                "disability": disabilityFilter,
                _token: '{{csrf_token()}}'
            }

            // Send AJAX request to the server with selected filters
            $.ajax({
                url: '/rejectedapplications/filter', // Replace with your server endpoint
                type: 'post', // or 'GET' depending on your server setup
                data: data,
                success: function(result) {
                    // Update the table with the filtered data
                    console.log(result);
                    var htmldata = "";
                    for (i = 0; i < result.length; i++) {
                        htmldata += `<tr>
                                        <td><span class="text-primary font-w600">${result[i].application_id}</span></td>
                                        <td>
                                            <h6 class="mb-0">${result[i].applicant_name}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].gender}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].puc_diploma_marks}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].ug_marks}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].dependent_status}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].disability_status}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].status}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].action_taken_by}</h6>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" onclick="edit_application('${result[i].application_id}}')">
                                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #32912b;"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="/adminprintadmission/${result[i].s_id}" class="btn btn-success"><i class="fa-solid fa-print fa-lg"></i> Print</a>
                                        </td>
                                    </tr>`;
                    }
                    $('#admission_data_div').html(htmldata);
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        });
    });

    //review approve modal
    function edit_application(id) {
        $.ajax({
            url: '/applicationget/' + id,
            type: 'get',
            success: function(res) {
                console.log(res);
                $('#id').val(res[0].id);

                $('#applicant_image').attr('src', '/admissions/applicant_images/' + res[0].applicant_image);
                $('#applicant_sign').attr('src', '/admissions/applicant_sign/' + res[0].applicant_sign);


                var formattedDate = new Date(res[0].created_at).toLocaleDateString('en-US', {
                    day: 'numeric',
                    month: 'numeric',
                    year: 'numeric'
                });
                $('#date').html(formattedDate);
                $('#application_id').html(res[0].application_id);
                $('#application_id1').val(res[0].application_id);
                $('#applicant_name').html(res[0].applicant_name);
                $('#dob').html(res[0].dob);
                $('#aadhar_number').html(res[0].aadhar_number);
                $('#mobile').html(res[0].mobile_number);
                $('#parent_mobile').html(res[0].alternative_mobile);
                $('#father_name').html(res[0].father_name);
                $('#occupation').html(res[0].father_occupation);
                $('#dependent_status').html(res[0].dependent_status);
                $('#disability_status').html(res[0].disability_status);
                $('#parent_disability').html(res[0].parent_disability_status);
                $('#address').html(res[0].address + ', ' + res[0].taluk + ' Taluk, ' + res[0].district + ' District, ' + res[0].state + ' - ' + res[0].pincode);
                $('#income_range').html(res[0].income_range);
                $('#rural').html(res[0].rural_in_sslc);
                $('#sslc_marks').html(res[0].sslc_marks + '%');
                $('#puc_marks').html(res[0].puc_diploma_marks + '%');
                $('#ug_marks').html(res[0].ug_marks + '%');
                $('#pg_marks').html(res[0].pg_marks + '%');
                $('#previously_complted_course').html(res[0].previously_studied_course);
                $('#entrance_exam_type').html(res[0].entrance_exam_type);
                $('#present_year_course').html(res[0].present_year_course);
                $('#present_college').html(res[0].present_college_name);

                $('#college_join_ornot').html(res[0].college_joined_or_not);
                $('#about_achievement').html(res[0].achievement_name);
                $('#status').html('Current Application Status - ' + '<b>' + res[0].status + '</b>');

                $('#scholarship').html(res[0].scholarship_type + '<br>' + res[0].scholarship_amount);
                $('#previously_reside').html(res[0].studied_year_in_rbdgtc + '<br>' + res[0].reason_to_left);
                $('#any_sibling').html(res[0].relative_name + '<br>' + res[0].relative_studied_year);
                $('#accommodation_mode').html(res[0].applicant_lastyear_stay);

                $('#guardian_sign').attr('src', '/admissions/applicant_guardian_sign/' + res[0].upload_guardian_sign);
                $('#aadhar_card').attr('src', '/admissions/applicant_aadhar/' + res[0].aadhar_card);
                $('#income').attr('src', '/admissions/applicant_income/' + res[0].income_certificate);
                $('#sslc_markscard').attr('src', '/admissions/sslc_markscards/' + res[0].sslc_markscard);
                $('#puc_markscard').attr('src', '/admissions/puc_dip_markscards/' + res[0].puc_diploma_markscard);
                $('#ug_markscard').attr('src', '/admissions/applicant_ug_markscard/' + res[0].ug_markscard);
                $('#pg_markscard').attr('src', '/admissions/applicant_pg_markscard/' + res[0].pg_markscard);
                $('#single_parent').attr('src', '/admissions/singleparent_certificate/' + res[0].singleparent_certificate);
                $('#mother_death').attr('src', '/admissions/motherdeath_certificate/' + res[0].mother_death_cer);
                $('#father_death').attr('src', '/admissions/fatherdeath_certificate/' + res[0].father_death_cer);
                $('#disability_cer').attr('src', '/admissions/applicant_disability_certificate/' + res[0].disability_certificate);
                $('#parent_disability_cer').attr('src', '/admissions/parent_disability_certificate/' + res[0].parent_disability_certificate);
                $('#character_cer').attr('src', '/admissions/applicant_character_cer/' + res[0].character_certificate);
                $('#fee_receipt').attr('src', '/admissions/applicant_fee_receipt/' + res[0].clg_admission_receipt);
                $('#achievement_cer').attr('src', '/admissions/achievements_certificates/' + res[0].achievement_cer);


                $('#applicant_name1').html(res[0].applicant_name);
                $('#father_name1').html(res[0].father_name);

                $("#eventedit").modal('show');
            }
        })
    }
</script>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title flex-wrap">
                            <h2 class="mt-1">Rejected Admission Applications ({{count($rejectedapplications)}})</h2>
                        </div>
                    </div>
                    <!-- filter -->
                    <div class="row">
                        <div class="col-md-2">
                            <select class="default-select form-control wide mt-3" id="filtercolumn" onchange="degreefilter()">
                                <option value="" disabled selected>Select</option>
                                <option value="puc">PUC</option>
                                <option value="degree">Degree</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select id="pucFilter" multiple class="default-select form-control wide mt-3">
                                <option value="0-100">All</option>
                                <option value="50-60">PUC: 50% - 60%</option>
                                <option value="60-70">PUC: 60% - 70%</option>
                                <option value="70-80">PUC: 70% - 80%</option>
                                <option value="80-90">PUC: 80% - 90%</option>
                                <option value="90-100">PUC: 90% - 100%</option>
                            </select>
                        </div>
                        <div class="col-md-3" id="filter">
                            <select id="degreeFilter" multiple class="default-select form-control wide mt-3">
                                <option value="0-100">All</option>
                                <option value="50-60">Degree: 50% - 60%</option>
                                <option value="60-70">Degree: 60% - 70%</option>
                                <option value="70-80">Degree: 70% - 80%</option>
                                <option value="80-90">Degree: 80% - 90%</option>
                                <option value="90-100">Degree: 90% - 100%</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="dependentFilter" multiple class="default-select form-control wide mt-3">
                                <option value="Both Parent Living">Both Parents Living</option>
                                <option value="Single Parent">Single Parent</option>
                                <option value="Orphan">Orphan</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="disabilityFilter" multiple class="default-select form-control wide mt-3">
                                <option value="Yes">Disability</option>
                                <option value="No">No Disability</option>
                            </select>
                        </div>
                        <div class="col-md-2 mt-3">
                            <button id="filterButton" type="submit" value="submit" class="btn btn-outline-primary me-3">Filter</button>
                        </div>
                    </div>

                    <!--column-->
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                        <div class="table-responsive full-data">
                            <table id="example" class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer">
                                <thead>
                                    <tr>
                                        <!-- <th>image</th> -->
                                        <th>Application ID</th>
                                        <th>Applicant Name</th>
                                        <th>Gender</th>
                                        <th>PUC Percentage</th>
                                        <th>Degree Percentage</th>
                                        <th>Parental Status</th>
                                        <th>Disability</th>
                                        <th>Status</th>
                                        <th>Approved By</th>
                                        <th>Action</th>
                                        <th class="text-end">Print</th>
                                    </tr>
                                </thead>
                                <tbody id="admission_data_div">
                                    <!-- code -->
                                    @foreach($rejectedapplications as $rejectedapplication)
                                    <tr>
                                        <!-- <td>
                                            <div class="trans-list">
                                                <img src="/admissions/applicant_images/{{$rejectedapplication->applicant_image}}" alt="" class="avatar avatar-sm me-3">
                                                <h4></h4>
                                            </div>
                                        </td> -->
                                        <td><span class="text-primary font-w600">{{$rejectedapplication->application_id}}</span></td>
                                        <td>
                                            <h6 class="mb-0">{{$rejectedapplication->applicant_name}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$rejectedapplication->gender}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$rejectedapplication->puc_diploma_marks}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$rejectedapplication->ug_marks}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$rejectedapplication->dependent_status}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$rejectedapplication->disability_status}}</h6>
                                        </td>

                                        <td>
                                            <h6 class="mb-0">
                                                {{$rejectedapplication->status}}
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$rejectedapplication->action_taken_by}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" onclick="edit_application('{{$rejectedapplication->application_id}}')">
                                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #32912b;"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="/adminprintadmission/{{$rejectedapplication->s_id}}" class="btn btn-success"><i class="fa-solid fa-print fa-lg"></i> Print</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/column-->
                </div>
            </div>
        </div>
        <!--**********************************
					Footer start
				***********************************-->
    </div>
</div>



<!-- review application modal -->
<div class="modal fade" id="eventedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center model-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reviewing Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admission/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <table>
                            <tr>
                                <td class="hostel-info">
                                    <h4 class="tab-indent4">Rao Bahadur Dharmapravartha Gubbi Thotadappa Charities</h4>
                                    <h5 class="tab-indent1">(Near City railway station) Thotadappa Road, Bengaluru-23</h5>
                                    <p class="tab-indent2">Call: 22879665</p>
                                    <h3 class="tab-indent3">Hostel Application Form</h3> <br>
                                </td>
                                <td class="applicant-photo">
                                    <img src="" id="applicant_image" width="120" height="130px">
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td class="date">
                                    place : Bengaluru-23 <br>
                                    <br>
                                    Date: <label id="date"></label>
                                </td>
                                <td class="sign">
                                    Your Faithfull
                                    <br>
                                    <img src="" id="applicant_sign" width="80" height="40px" style="margin-top: 10px;"> <br>
                                    Applicant's Signature
                                </td>
                            </tr>
                        </table>
                        <table border="1" class="mt-3">
                            <tr>
                                <td>Application ID</td>
                                <td style="color: red;" id="application_id"></td>
                            </tr>
                            <tr>
                                <td>Applicant's Name</td>
                                <td style="color: black;" id="applicant_name"></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td id="dob"></td>
                            </tr>
                            <tr>
                                <td>Aadhar Number</td>
                                <td id="aadhar_number"></td>
                            </tr>
                            <tr>
                                <td>Mobile Number</td>
                                <td id="mobile"></td>
                            </tr>
                            <tr>
                                <td>Parent Mobile Number</td>
                                <td id="parent_mobile"></td>
                            </tr>
                            <tr>
                                <td>Father's Name</td>
                                <td id="father_name"></td>
                            </tr>
                            <tr>
                                <td>Father's Occupation</td>
                                <td id="occupation"></td>
                            </tr>
                            <tr>
                                <td>Parental status</td>
                                <td id="dependent_status"></td>
                            </tr>
                            <tr>
                                <td>Disability</td>
                                <td id="disability_status"></td>
                            </tr>
                            <tr>
                                <td>Parent Disability</td>
                                <td id="parent_disability"></td>
                            </tr>
                            <tr>
                                <td width="138">
                                    <p>Address </p>
                                </td>
                                <td width="228" id="address"></td>
                            </tr>
                            <tr>
                                <td>Income Range</td>
                                <td id="income_range"></td>
                            </tr>
                            <tr>
                                <td>Rural in SSLC</td>
                                <td id="rural"></td>
                            </tr>
                            <tr>
                                <td>SSLC Percentage</td>
                                <td id="sslc_marks"></td>
                            </tr>
                            <tr>
                                <td>PUC/Diploma Percentage</td>
                                <td id="puc_marks"></td>
                            </tr>
                            <tr>
                                <td>Bachelor Degree Percentage</td>
                                <td id="ug_marks"></td>
                            </tr>
                            <tr>
                                <td>Master Degree Percentage</td>
                                <td id="pg_marks"></td>
                            </tr>
                            <tr>
                                <td>Previously Completed course</td>
                                <td id="previously_complted_course"></td>
                            </tr>
                            <tr>
                                <td>Entrance exam type</td>
                                <td id="entrance_exam_type"></td>
                            </tr>
                            <tr>
                                <td>Present Year Course</td>
                                <td id="present_year_course"></td>
                            </tr>
                            <tr>
                                <td>College Join Status</td>
                                <td id="college_join_ornot"></td>
                            </tr>
                            <tr>
                                <td>Present College</td>
                                <td id="present_college"></td>
                            </tr>
                            <tr>
                                <td>About Achievement</td>
                                <td id="about_achievement"></td>
                            </tr>
                            <tr>
                                <td>If the applicant has been awarded any scholarship or financial assistance from an institute or organization,
                                    kindly specify the amount and the respective source of funding
                                </td>
                                <td id="scholarship"></td>
                            </tr>
                            <tr>
                                <td>If the applicant has previously resided in our Gubbi Thotadappa hostel,
                                    please mention the specific year and reason to left</td>
                                <td id="previously_reside"> </td>
                            </tr>
                            <tr>
                                <td>If the applicant has any sibling who have currently resided in our hostel,
                                    kindly provide the relevant details of those individuals</td>
                                <td id="any_sibling"> <br> </td>
                            </tr>
                            <tr>
                                <td>mode of accommodation last year?</td>
                                <td id="accommodation_mode"><br> </td>
                            </tr>
                        </table>
                        <div class="mt-5">
                            <h2 class="text-center"> Affidavit of parents</h2>
                            <p class="tab-indent" start="6">I, <b id="father_name1"></b> Confirm that I have thoroughly reviewed the application for my Son/Daughter Mr/Ms &nbsp;<b id="applicant_name1"></b>&nbsp;.
                                The provided Documents are accurate. I am aware that any false information may lead to rejection/termination of hostel facilities provided.</p>
                            <img style="margin-left: 550px;" src="" id="guardian_sign" width="80px" height="40px">
                            <h6 align="right" style="margin-top:10px"> Signature of Parents/Guardian </h5>
                        </div>
                        <div>
                            <label>Aadhar Card</label> <br>
                            <img src="" id="aadhar_card" width="80%" height="80%" style="margin-top: 10px;" alt='Aadhar Card not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Caste & Income Certificate</label> <br>
                            <img src="" id="income" width="100%" height="90%" alt='Income Certificate not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>SSLC marks card</label> <br>
                            <img src="" id="sslc_markscard" width="100%" height="90%" alt='SSLC Marks Card not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>PUC Mards card</label> <br>
                            <img src="" id="puc_markscard" width="100%" height="90%" alt='PUC Marks Card not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Graduation Marks card</label> <br>
                            <img src="" id="ug_markscard" width="100%" height="90%" alt='Graduation Marks Card not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Post Graduation Marks card</label> <br>
                            <img src="" id="pg_markscard" width="100%" height="90%" alt='Post Graduation marks Card not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Single Parent Certificate</label> <br>
                            <img src="" id="single_parent" width="100%" height="90%" alt='Single Parent Certificate not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Mother Death Certificate</label> <br>
                            <img src="" id="mother_death" width="100%" height="90%" alt='Mother Death Certificate not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Father Death Certificate</label> <br>
                            <img src="" id="father_death" width="100%" height="90%" alt='Father Death Certificate not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Disability Certificate</label> <br>
                            <img src="" id="disability_cer" width="100%" height="90%" alt='Disability Certificate not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Parent Disability Certificate</label> <br>
                            <img src="" id="parent_disability_cer" width="100%" height="90%" alt='Parent disability Certificate not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Character Certificate</label> <br>
                            <img src="" id="character_cer" width="100%" height="90%" alt='Character Certificate not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>College Admission Fee Receipt</label> <br>
                            <img src="" id="fee_receipt" width="100%" height="90%" alt='College fee receipt not Uploaded'>
                        </div>
                        <hr>
                        <div>
                            <label>Achievement Certificate</label> <br>
                            <img src="" id="achievement_cer" width="100%" height="90%" alt='Achievement Certificate not Uploaded'>
                        </div>
                        <hr>
                        <h3 class="mt-2" id="status"></h3>

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="mb-3">
                                    <label class="form-label text-primary">Action<span class="required">*</span></label>
                                    <select value="" name="action" id="action" required class="default-select form-control wide">
                                        <option value="" selected disabled>Select</option>
                                        <option value="Approved">Select</option>
                                        <option value="Rejected">Reject</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="mb-3">
                                    <label class="form-label text-primary">Remark<span class="required">*</span></label>
                                    <input type="text" name="modified_reason" class="form-control" id="remark" placeholder="" required>
                                </div>
                            </div>
                            <input type="text" id="application_id1" name="application_id" hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit">Made Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection