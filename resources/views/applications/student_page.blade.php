@extends('layouts.main')

@section('content')
<?php
if (session('log_status') !== true) {
    // Log status is false, redirect to login page
    echo "<script>console.error('Redirecting to /studentlogin'); location.href = '/studentlogin';</script>";
    exit();
}
?>

<div class="course-student-header" style="margin-top:100px;">

    <div class="container">

        <div class="student-group">
            <div class="course-group ">
                <div class="course-group-img d-flex">
                    <a href="#"><img src="/admissions/applicant_images/{{$data[0]->applicant_image}}" alt class="img-fluid"></a>
                    <div class="d-flex align-items-center">
                        @if(session('log_status'))
                        <div class="course-name">
                            <h4><a href="#">{{$data[0]->applicant_name}}</a></h4>
                            <p>{{$data[0]->aadhar_number}}</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="course-share">
                    <a href="/student_logout" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
        <div class="my-student-list">
            <ul>
                <!-- admission link starts -->
                @if(count($admissionevent)>0 && in_array($admissionevent[0]->status,['Running','Closed']))
                @if($hasEmptyAppliedYear)
                <li><a href="/printpdf/{{$data[0]->id}}">Print Admission Application</a></li>
                @else
                @if($admissionevent[0]->status=="Running")
                <li><a href="/admission"> Apply for Hostel admission</a></li>
                @endif
                @endif
                @endif
                <!-- admission link ends -->

                <!-- scholarship link starts -->
                @if(count($scholarshipevent)>0 && in_array($scholarshipevent[0]->status,['Running','Closed']))
                @if($scholarship)
                <li><a href="/printscholarship/{{$data[0]->id}}">Print Scholarship Application</a></li>
                @else
                @if($scholarshipevent[0]->status=="Running")
                <li><a href="/scholarship">Apply for Hostel Scholarship</a></li>
                @endif
                @endif
                @endif
                <!-- scholarship link ends -->
            </ul>
        </div>
    </div>
</div>

<!-- admission related -->
@if(count($admissionevent)>0 && ($admissionevent[0]->status=="Running"))
<div style="margin-top: 30px; margin-left:30px;">
    <label><b>Required document and instructions to apply for hostel admission:</b></label>
    <ul>
        <li>
            1. SSLC marks card <br>
            2. PUC marks card <br>
            3. Aadhar card <br>
            4. applicant photo <br>
            5. applicant signature <br>
            6. Income and caste certificate <br>
            7. Character certificate <br>
            8. College fee paid receipt <br>
            9. Parent/Guardian signature <br>
        </li>
    </ul>
    <label><b>Additional requirements based on circumstances:</b></label>
    <ul>
        <li>
            If the applicant is a single parent, a death certificate is required.
        </li>
        <li>
            If the applicant is an orphan, both mother and father's death certificates are necessary.
        </li>
        <li>
            For disabled applicants, a disability certificate is required.
        </li>
        <li>
            If the parents of the applicant are disabled, parent disability certificates are needed.
        </li>
        <li>
            For postgraduate applicants, a graduation marks card (transcript) is mandatory.
        </li>
        <li>
            If the applicant studied in a rural area until SSLC, a rural certificate is required.
        </li>
        <li>
            Ensure that all documents are in .jpg, .jpeg, or .png format and are less than 500kb.
        </li>
    </ul>
</div>
@endif

<!-- Scholarship related  -->
@if(count($scholarshipevent)>0 && ($scholarshipevent[0]->status=="Running"))
<div style="margin-top: 30px; margin-left:30px;">
    <label><b>Required document and instructions to apply for hostel admission:</b></label>
    <ul>
        <li>
            1. SSLC marks card <br>
            2. PUC marks card <br>
            3. Aadhar card <br>
            4. applicant photo <br>
            5. applicant signature <br>
            6. Income and caste certificate <br>
            7. Character certificate <br>
            8. College fee paid receipt <br>
            9. Parent/Guardian signature <br>
        </li>
    </ul>
    <label><b>Additional requirements based on circumstances:</b></label>
    <ul>
        <li>
            If the applicant is a single parent, a death certificate is required.
        </li>
        <li>
            If the applicant is an orphan, both mother and father's death certificates are necessary.
        </li>
        <li>
            For disabled applicants, a disability certificate is required.
        </li>
        <li>
            If the applicant is studying UG, upload UG marks cards.
        </li>
        <li>
            If the applicant is studying PG, upload both UG & PG marks cards.
        </li>
        <li>
            If the applicant studied in a rural area until SSLC, a rural certificate is required.
        </li>
        <li>
            If the applicant has taken any education loan, the related documents are required.
        </li>
        <li>
            Ensure that all documents are in .jpg, .jpeg, or .png format and are less than 500kb.
        </li>
    </ul>
</div>
@endif

@endsection