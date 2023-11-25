@extends('layouts.main')

@section('content')

<div class="breadcrumb-bar" style="margin-top:100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="breadcrumb-list">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">Free Hostels</li>
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
            <div class="col-lg-12">
                <div class="title-sec">
                    <h2>RBDGTC Hostels in karnataka</h2>
                </div>
                <div class="category-tab">
                    <ul class="nav nav-justified">
                        <li class="nav-item"><a href="#graphics" class="nav-link active" data-bs-toggle="tab">Our Hostels</a></li>
                        <li class="nav-item"><a href="#programming" class="nav-link" data-bs-toggle="tab">Hostel Rules</a></li>
                        <li class="nav-item"><a href="#marketing" class="nav-link" data-bs-toggle="tab">Other details</a></li>
                        <li class="nav-item"><a href="#video" class="nav-link" data-bs-toggle="tab">Other details</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="graphics">
                        <div class="featured-courses-two aos">
                            <div class="row">
                                @foreach($hstl as $hostel)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 d-flex" data-aos="fade-down">
                                    <div class="featured-details-two">
                                        <div class="product-item-two">
                                            <div class="product-img-two">
                                                <a href="course-details.html">
                                                    <img class="img-fluid" alt src="/hostel/{{$hostel->hostel_photo}}" style="width:350px;">
                                                </a>
                                            </div>
                                            <div class="course-details-content">
                                                <div class="name-text featured-info-two">
                                                    <h3 class="title instructor-text">
                                                        <a href="course-details.html">{{$hostel->hostel_name}}. <br>
                                                            {{$hostel->boys_girls}}
                                                        </a>
                                                    </h3>
                                                    <p class="me-3">Total Students :<span class="text-danger ms-2">{{$hostel->total_students}}</span></p>

                                                    <p class="me-3">Location :<span class="text-danger ms-2">{{$hostel->location}}</span></p>

                                                </div>
                                                <div class="featured-info-time d-flex align-items-center">
                                                    <div class="hours-time-two d-flex align-items-center">
                                                        <span><i class="fa-regular fa-clock me-2"></i></span>
                                                        <p>Mob : {{$hostel->mobile}} </p>
                                                    </div>
                                                </div>
                                                <div class="featured-info-time d-flex align-items-center">
                                                    <div class="hours-time-two d-flex align-items-center">
                                                        <span><i class="fa-regular fa-envelope mr-2"></i></span>
                                                        <p> Email :{{$hostel->email_id}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="programming">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="plan-box ">
                                <div>
                                    <ul>
                                        <li>
                                            <p><b> ಪ್ರತಿಯೊಬ್ಬ ವಿದ್ಯಾರ್ಥಿಯು ಸದಾ ಲಿಂಗಧಾರಿಯಾಗಿರಬೇಕು. ಪ್ರತಿದಿನ ಮುಂಜಾ ಸ್ನಾನ ಮಾಡಿ ವಿಭೂತಿ ಧಾರಣೆಮಾಡಿ, ಲಿಂಗಪೂಜೆ ಮಾಡಿರಬೇಕು.</b></p>
                                        </li>
                                        <li>
                                            <p><b>ಮಕ್ಕಳು ಊಟಕ್ಕೆ ಬರುವಾಗ ಬಿಳಿ ಪಂಚೆ, ಬಿಳಿ ಬನಿಯ‌ ಮತ್ತು ಕೆಂಪು ಟವಲ್ ಹಾಕಿಕೊಂಡು ಬರಬೇಕು.</b></p>
                                        </li>
                                        <li>
                                            <p><b>ಪ್ರತಿಯೊಬ್ಬ ವಿದ್ಯಾರ್ಥಿಯೂ ಬೆಳಗ್ಗೆ 7.00 ಗಂಟೆಗೆ ಮತ್ತು ಸಂಜೆ 7.30 ಗಂಟೆಗೆ ಊಟದ ಹಾಲಿನಲ್ಲಿ ಸಮೂಹ ಪ್ರಾರ್ಥನೆಯಲ್ಲಿ ಭಾಗವಹಿಸಬೇಕು.</b></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="marketing">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-04.jpg" alt>
                                    </div>
                                    <h5>Social Media Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-05.jpg" alt>
                                    </div>
                                    <h5>Graphics for Streamers</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-06.jpg" alt>
                                    </div>
                                    <h5>Photoshop Editing</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-10.jpg" alt>
                                    </div>
                                    <h5>Icon Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-11.jpg" alt>
                                    </div>
                                    <h5>Packaging & Label Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-12.jpg" alt>
                                    </div>
                                    <h5>Presentation Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-16.jpg" alt>
                                    </div>
                                    <h5>Invitation Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-17.jpg" alt>
                                    </div>
                                    <h5>UX Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-06.jpg" alt>
                                    </div>
                                    <h5>Infographic Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="animation">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-05.jpg" alt>
                                    </div>
                                    <h5>Graphics for Streamers</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-04.jpg" alt>
                                    </div>
                                    <h5>Social Media Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-06.jpg" alt>
                                    </div>
                                    <h5>Photoshop Editing</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-11.jpg" alt>
                                    </div>
                                    <h5>Packaging & Label Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-10.jpg" alt>
                                    </div>
                                    <h5>Icon Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-12.jpg" alt>
                                    </div>
                                    <h5>Presentation Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-17.jpg" alt>
                                    </div>
                                    <h5>UX Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-16.jpg" alt>
                                    </div>
                                    <h5>Invitation Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                            <div class="category-box">
                                <div class="category-title">
                                    <div class="category-img">
                                        <img src="assets/img/category/category-06.jpg" alt>
                                    </div>
                                    <h5>Infographic Design</h5>
                                </div>
                                <div class="cat-count">
                                    <span>25</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

@endsection
{{ \Carbon\Carbon::parse($ev->date)->format('d-m-Y') }}