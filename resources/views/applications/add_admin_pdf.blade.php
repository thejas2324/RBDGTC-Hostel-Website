<html>

<head>
    <title>
        Application printout
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
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
            text-indent: 130px;
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
</head>

<body>

    <h2 class="tab-indent4">Rao Bahadur Dharmapravartha Gubbi Thotadappa Hostel</h2>
    <table>
        <tr>
            <td class="hostel-info">
                <h4 class="tab-indent1">(Near City railway station) Thotadappa Road, Bengaluru-23</h4>
                <p class="tab-indent2">Call: 22879665</p>
                <h1 class="tab-indent3">Hostel Application Form</h1> <br>
            </td>
            <td class="applicant-photo">
                <img src="admissions/applicant_images/{{$data[0]->applicant_image}}" width="120" height="130px">
            </td>
        </tr>
    </table>
    <div>
        <div class="tab-indent" style="text-align: justify;">
            I, the undersigned, have submitted this application to join the above-mentioned free student hostel. For this, I have provided the details below.
            I agree to abide by the rules and regulations framed by the Dharmadarshis to control the conduct of the students and any that may be framed hereafter.
            I agree to leave the hostel if I receive any kind of salary or other assistance from any other source as needed.
            I affirm that all the details I have mentioned in this application are true, and if they are not true in the future,
            I agree to leave the hostel immediately, pay the outstanding amount that has been spent on me till then,
            and also agree to face the punishment imposed by the institution for the mistake of entering false and incorrect facts in the application,
            including showing the marks obtained in the examination indicating my efficiency and qualifications.
        </div>
        <table>
            <tr>
                <td class="date">
                    place : Bengaluru-23 <br>
                    <br>
                    Date: {{ $data[0]->created_at->format('d-m-Y') }}
                </td>
                <td class="sign">
                    Your Faithfull
                    <br>
                    <img src="admissions/applicant_sign/{{$data[0]->applicant_sign}}" width="80" height="40px" style="margin-top: 10px;"> <br>
                    Applicant's Signature
                </td>
            </tr>
        </table>
    </div>

    <table border="1" class="mt-3">
        <tr>
            <td>Application ID</td>
            <td style="color: red;">{{$data[0]->application_id}}</td>
        </tr>
        <tr>
            <td>applied Hostel</td>
            <td>{{$data[0]->applying_hostel}}</td>
        </tr>
        <tr>
            <td>Applicant's Name</td>
            <td>{{$data[0]->applicant_name}}</td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>{{ \Carbon\Carbon::parse($data[0]->dob)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{$data[0]->gender}}</td>
        </tr>
        <tr>
            <td>Aadhar Number</td>
            <td>{{$data[0]->aadhar_number}}</td>
        </tr>
        <tr>
            <td>Mobile Number</td>
            <td>{{$data[0]->mobile_number}}</td>
        </tr>
        <tr>
            <td>Alternative Number</td>
            <td>{{$data[0]->mobile_number}}</td>
        </tr>
        <tr>
            <td>Father's Name</td>
            <td>{{$data[0]->father_name}}</td>
        </tr>
        <tr>
            <td>Father's Occupation</td>
            <td>{{$data[0]->father_occupation}}</td>
        </tr>
        <tr>
            <td>Dependent status</td>
            <td>{{$data[0]->dependent_status}}</td>
        </tr>
        <tr>
            <td>Disability</td>
            <td>{{$data[0]->disability_status}}</td>
        </tr>
        <tr>
            <td>Parent Disability</td>
            <td>{{$data[0]->parent_disability_status}}</td>
        </tr>
        <tr>
            <td width="138">
                <p>Address </p>
            </td>
            <td width="228">{{$data[0]->address}}, {{$data[0]->taluk}} taluk, {{$data[0]->district}} district - {{$data[0]->pincode}}</td>
        </tr>
        <tr>
            <td>Income Range</td>
            <td>{{$data[0]->income_range}}</td>
        </tr>
        <tr>
            <td>Rural in SSLC</td>
            <td>{{$data[0]->rural_in_sslc}}</td>
        </tr>
        <tr>
            <td>SSLC Percentage</td>
            <td>{{$data[0]->sslc_marks}}</td>
        </tr>
        <tr>
            <td>PUC/Diploma Percentage</td>
            <td>{{$data[0]->puc_diploma_marks}}</td>
        </tr>
        <tr>
            <td>Bachelor Degree Percentage</td>
            <td>{{$data[0]->ug_marks}}</td>
        </tr>
        <tr>
            <td>Master Degree Percentage</td>
            <td>{{$data[0]->pg_marks}}</td>
        </tr>
        <tr>
            <td>Previously Completed course</td>
            <td>{{$data[0]->previously_studied_course}}</td>
        </tr>
        <tr>
            <td>Type of Entrance exam</td>
            <td>{{$data[0]->entrance_exam_type}}</td>
        </tr>
        <tr>
            <td>Are you joined for college</td>
            <td>{{$data[0]->college_joined_or_not}}</td>
        </tr>
        <tr>
            <td>Course name</td>
            <td>{{$data[0]->present_year_course}}</td>
        </tr>
        <tr>
            <td>Present College</td>
            <td>{{$data[0]->present_college_name}}</td>
        </tr>
        <tr>
            <td>If the applicant has been awarded any scholarship or financial assistance from an institute or organization,
                kindly specify the amount and the respective source of funding
            </td>
            <td>{{$data[0]->scholarship_type}}, {{$data[0]->scholarship_amount}}</td>
        </tr>
        <tr>
            <td>If the applicant has previously resided in our Gubbi Thotadappa hostel,
                please mention the specific year and reason</td>
            <td>{{$data[0]->studied_year_in_rbdgtc}} <br> {{$data[0]->reason_to_left}} </td>
        </tr>
        <tr>
            <td>If the applicant has any relatives who have currently resided in our hostel,
                kindly provide the relevant details of those individuals</td>
            <td>{{$data[0]->relative_name}} <br> {{$data[0]->relative_studied_year}} </td>
        </tr>
        <tr>
            <td>mode of accommodation last year?</td>
            <td>{{$data[0]->relative_name}} <br> {{$data[0]->relative_studied_year}}</td>
        </tr>
    </table>
    <div class="mt-5">
        <h2 class="text-center"> Affidavit of parents</h2>
        <p class="tab-indent" start="6">I, &nbsp; <b>{{$data[0]->father_name}}</b> &nbsp; Confirm that I have thoroughly reviewed the application for my Son/Daughter Mr/Ms &nbsp;<b>{{$data[0]->applicant_name}}</b>&nbsp;.
            The provided Documents are accurate. I am aware that any false information may lead to rejection/termination of hostel facilities provided.</p>
        <img style="margin-left: 550px;" src="admissions/applicant_guardian_sign/{{$data[0]->upload_guardian_sign}}" width="80px" height="40px">
        <h6 align="right" style="margin-top:10px"> Signature of Parents/Guardian </h5>
    </div>
    <div>
        <?php
        $aadhar_card = $data[0]->aadhar_card;
        try {
            $size = getimagesize("admissions/applicant_aadhar/$aadhar_card");
            echo "<img src='admissions/applicant_aadhar/$aadhar_card' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $sslc_markscard = $data[0]->sslc_markscard;
        try {
            $size = getimagesize("admissions/sslc_markscards/$sslc_markscard");
            echo "<img src='admissions/sslc_markscards/$sslc_markscard' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $puc_diploma_markscard = $data[0]->puc_diploma_markscard;
        try {
            $size = getimagesize("admissions/puc_dip_markscards/$puc_diploma_markscard");
            echo "<img src='admissions/puc_dip_markscards/$puc_diploma_markscard' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $ug_markscard = $data[0]->ug_markscard;
        try {
            $size = getimagesize("admissions/applicant_ug_markscard/$ug_markscard");
            echo "<img src='admissions/applicant_ug_markscard/$ug_markscard' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $pg_markscard = $data[0]->pg_markscard;
        try {
            $size = getimagesize("admissions/applicant_pg_markscard/$pg_markscard");
            echo "<img src='admissions/applicant_pg_markscard/$pg_markscard' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $rural_certificate = $data[0]->rural_certificate;
        try {
            $size = getimagesize("admissions/rural_certificate/$rural_certificate");
            echo "<img src='admissions/rural_certificate/$rural_certificate' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $special_achievement = $data[0]->special_achievement;
        try {
            $size = getimagesize("admissions/achievements_certificates/$special_achievement");
            echo "<img src='admissions/achievements_certificates/$special_achievement' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $singleparent_certificate = $data[0]->singleparent_certificate;
        try {
            $size = getimagesize("admissions/singleparent_certificate/$singleparent_certificate");
            echo "<img src='admissions/singleparent_certificate/$singleparent_certificate' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $mother_death_cer = $data[0]->mother_death_cer;
        try {
            $size = getimagesize("admissions/motherdeath_certificate/$mother_death_cer");
            echo "<img src='admissions/motherdeath_certificate/$mother_death_cer' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $father_death_cer = $data[0]->father_death_cer;
        try {
            $size = getimagesize("admissions/fatherdeath_certificate/$father_death_cer");
            echo "<img src='admissions/fatherdeath_certificate/$father_death_cer' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $disability_certificate = $data[0]->disability_certificate;
        try {
            $size = getimagesize("admissions/applicant_disability_certificate/$disability_certificate");
            echo "<img src='admissions/applicant_disability_certificate/$disability_certificate' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <?php
        $parent_disability_certificate = $data[0]->parent_disability_certificate;
        try {
            $size = getimagesize("admissions/parent_disability_certificate/$parent_disability_certificate");
            echo "<img src='admissions/parent_disability_certificate/$parent_disability_certificate' width='100%' height='1000px'>";
        } catch (Exception $e) {
            echo "";
        }
        ?>
    </div>
    <div>
        <img src="admissions/applicant_fee_receipt/{{$data[0]->clg_admission_receipt}}" width="100%" height="1000px">
    </div>
    <div>
        <img src="admissions/applicant_income/{{$data[0]->income_certificate}}" width="100%" height="1000px">
    </div>
    <div>
        <img src="admissions/applicant_character_cer/{{$data[0]->character_certificate}}" width="100%" height="1000px">
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>