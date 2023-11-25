@extends('layouts.main')

@section('content')
<div class="breadcrumb-bar" style="margin-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="breadcrumb-list">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item">Past trustee's</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-2">
                <h2 style="margin-top:-40px;"><b>Our Past Trustees</b></h2>
                <div class="row mt-5">
                    @foreach($data as $dt)
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="student-box flex-fill">
                            <div class="student-img">
                                <a href="#">
                                    <img class="img-fluid" alt="Students Info" src="/trustee/{{$dt->trustee_image}}" style="height:300px; width:300px;">
                                </a>
                            </div>
                            <div class="student-content pb-0">
                                <h4><a href="#">{{$dt->fullname}}</a></h4>
                                <div class="loc-blk d-flex align-items-center justify-content-center">
                                    <h5>{{$dt->Designation}}</h5>
                                </div>
                                <div class="loc-blk d-flex align-items-center justify-content-center mt-2">
                                    <h6>{{\Carbon\Carbon::parse($dt->from_date)->format('Y') }} - {{\Carbon\Carbon::parse($dt->to_date)->format('Y') }}</h6>
                                </div>
                            </div>
                            <!-- <div class="all-btn all-category align-items-center text-center mt-4">
                                <button href="checkout.html" class="btn btn-primary">See More</button>
                            </div> -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection