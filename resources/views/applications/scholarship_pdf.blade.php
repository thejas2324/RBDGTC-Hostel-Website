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
            text-indent: 100px;
        }

        .tab-indent2 {
            text-indent: 20px;
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

        .thotadappa-photo {
            width: 20%;
            border: 0px;
            text-align: center;
        }

        .hostel-info {
            width: 60%;
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
            <td class="thotadappa-photo">
                <img src="./assets/img/thotadappa/founder.jpg" width="120" height="130px">
            </td>
            <td class="hostel-info">
                <h4 class="tab-indent1">No.88 Thotadappa Road </h4>
                <h5 class="tab-indent2">Near City railway station, Bengaluru-23</h5>
                <p class="tab-indent3">Call: 22879665</p>
                <h2 class="tab-indent4">Scholarship Application Form</h2> <br>
            </td>
            <td class="applicant-photo">
                <img src="admissions/applicant_images/{{$data[0]->applicant_image}}" width="120" height="130px">
            </td>
        </tr>
    </table>

    <table border="1" class="mt-3">
        <tr>
            <td>Application ID</td>
            <td style="color: red;">{{$data[0]->application_id}}</td>
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
            <td>Aadhar Number</td>
            <td>{{$data[0]->aadhar_number}}</td>
        </tr>
        <tr>
            <td>Mobile Number</td>
            <td>{{$data[0]->mobile_number}}</td>
        </tr>
        <tr>
            <td>Alternative Mobile Number</td>
            <td>{{$data[0]->mobile_number}}</td>
        </tr>
        <tr>
            <td>Father's Name</td>
            <td>{{$data[0]->father_name}}</td>
        </tr>
        <tr>
            <td>Father occupation</td>
            <td>{{$data[0]->father_occupation}}</td>
        </tr>
        <tr>
            <td>Dependent status</td>
            <td>{{$data[0]->dependent_status}}</td>
        </tr>
        <tr>
            <td width="138">
                <p>Address </p>
            </td>
            <td width="228">{{$data[0]->address}}, {{$data[0]->taluk}} taluk, {{$data[0]->district}} district - {{$data[0]->pincode}}</td>
        </tr>
        <tr>
            <td width="138">
                <p>Residential Address</p>
            </td>
            <td width="228">
                {{$data[0]->residential_address}}
            </td>
        </tr>
        <tr>
            <td>Disability</td>
            <td>{{$data[0]->disability}}</td>
        </tr>
        <tr>
            <td>Income Range</td>
            <td>{{$data[0]->income_range}}</td>
        </tr>
        <!-- second page-->
        <tr>
            <td>Ongoing academic program</td>
            <td>{{$data[0]->current_course}}</td>
        </tr>
        <tr>
            <td>College Name</td>
            <td>{{$data[0]->college_name}}</td>
        </tr>
        <tr>
            <td>Amount paid this year</td>
            <td>{{$data[0]->college_fee_paid}}</td>
        </tr>
        <tr>
            <td>SSLC Percentage/CGPA</td>
            <td>{{$data[0]->sslc_marks}}</td>
        </tr>
        <tr>
            <td>PUC/Diploma Percentage/CGPA</td>
            <td>{{$data[0]->puc_diploma_marks}}</td>
        </tr>
        <tr>
            <td>Bachelor Degree Percentage/CGPA</td>
            <td>{{$data[0]->ug_marks}}</td>
        </tr>
        <tr>
            <td>Master Degree Percentage/CGPA</td>
            <td>{{$data[0]->pg_marks}}</td>
        </tr>
        <tr>
            <td>Rural in SSLC</td>
            <td>{{$data[0]->rural_in_sslc}}</td>
        </tr>
        <tr>
            <td>Are you obtaining any loan amount from the bank?</td>
            <td>{{$data[0]->loan_from_bank}}</td>
        </tr>
        <tr>
            <td>A student who is currently studying in any free/paid hostel,
                please specify the name and address of the hostel,
                and the amount they have paid or need to pay per month/year.</td>
            <td>{{$data[0]->current_hostel}}, <br> {{$data[0]->hostel_fee_paid}}</td>
        </tr>
        <tr>
            <td>If a student is receiving financial assistance from the
                government or other organizations in the form of a scholarship,
                please provide details of the scholarship amount and duration.</td>
            <td>{{$data[0]->scholarship_from_govt_org}}, <br> {{$data[0]->amount_from_govt_org}}</td>
        </tr>
        <tr>
            <td>If the student has received a scholarship from our institution in previous years,
                please provide the details of the scholarship,
                including the amount and how it has been utilized.</td>
            <td>{{$data[0]->scholarship_from_rbdgtc}}, <br> {{$data[0]->how_utilized}}</td>
        </tr>
    </table>
    <table style="margin-top: 20px;">
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
    <div class="mt-5">
        <h2 class="text-center"> Affidavit of parents</h2>
        <p class="tab-indent" start="6">My son/Daughter,&nbsp;<b>{{$data[0]->applicant_name}}</b> &nbsp;the student studing &nbsp;<b>{{$data[0]->course}}. In &nbsp;<b>{{$data[0]->college_name1}}</b>.
                I hereby request to grant scholarship from Rao Bahadhur Dharmapravartha Gubbi Thotadappa hostel.</p>

        <img style="margin-left: 550px;" src="admissions/applicant_guardian_sign/{{$data[0]->guardian_sign}}" width="80px" height="40px">
        <h6 align="right" style="margin-top:10px"> Signature of Parents/Guardian </h5>
    </div>
    <div>
        <h2 align="left" style="margin-top:50px;">Points to be noted by applicants</h2>
        <ol>
            <li>Hostel rooms assigned to the students cannot be changed without written permission from the authorities responsible
                for accommodation management. <br>
            </li>
            <li>Students are not allowed to accommodate relatives, friends, or any other person in their hostel rooms.<br>
            </li>
            <li>Lighting open flames (such as candles, incense sticks) and using electrical appliances, heaters, stoves, water
                heating coils, etc., are strictly prohibited in the rooms.<br>
            </li>
            <li>Only during specified hours (5 PM to 7 PM), parents, guardians, or friends can visit the students in their
                individual rooms.<br>
            </li>
        </ol>
    </div>
    <div class="mt-5">
        <h2>Important Points</h2>
        <ol>
            <li>
                Do attach all year marks cards Income certificate.
            </li>
            <li>
                Do attach Character certificate.
            </li>
            <li>
                Come with all required documents at the time of interview.
            </li>
        </ol>
    </div>
    <script type="text/php">
        if ( isset($pdf) ) {
        $font = Font_Metrics::get_font("helvetica", "bold");
        $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
    }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>