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

@endsection