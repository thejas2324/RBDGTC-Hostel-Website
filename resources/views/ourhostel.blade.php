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
                        <li class="nav-item"><a href="#marketing" class="nav-link" data-bs-toggle="tab">Our Events</a></li>
                        <li class="nav-item"><a href="#video" class="nav-link" data-bs-toggle="tab">Hostel Prayer</a></li>
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
                                                <a href="#">
                                                    <img class="img-fluid" alt src="/hostel/{{$hostel->hostel_photo}}" style="width:350px; height:200px;">
                                                </a>
                                            </div>
                                            <div class="course-details-content">
                                                <div class="name-text featured-info-two">
                                                    <h3 class="title instructor-text">
                                                        <a href="#">{{$hostel->hostel_name}}. <br>
                                                            {{$hostel->boys_girls}}
                                                        </a>
                                                    </h3>
                                                    <p class="me-3">Total Students :<span class="text-danger ms-2">{{$hostel->total_students}}</span></p>

                                                    <p class="me-3">Location :<span class="text-danger ms-2"> {{$hostel->location}}</span></p>
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
                                                        <p> Email : {{$hostel->email_id}}</p>
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
                    <div class="tab-pane fade" id="programming">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="plan-box ">
                                    <div>
                                        <ul>
                                            <li>
                                                <p class="mt-3"><b> ಪ್ರತಿಯೊಬ್ಬ ವಿದ್ಯಾರ್ಥಿಯು ಸದಾ ಲಿಂಗಧಾರಿಯಾಗಿರಬೇಕು. ಪ್ರತಿದಿನ ಮುಂಜಾ ಸ್ನಾನ ಮಾಡಿ ವಿಭೂತಿ ಧಾರಣೆಮಾಡಿ, ಲಿಂಗಪೂಜೆ ಮಾಡಿರಬೇಕು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b> ಗಂಡು ಮಕ್ಕಳು ಊಟಕ್ಕೆ ಬರುವಾಗ ಬಿಳಿ ಪಂಚೆ, ಬಿಳಿ ಬನಿಯ‌ ಮತ್ತು ಕೆಂಪು ಟವಲ್ ಹಾಕಿಕೊಂಡು ಬರಬೇಕು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ಪ್ರತಿಯೊಬ್ಬ ವಿದ್ಯಾರ್ಥಿಯೂ ಬೆಳಗ್ಗೆ 7.00 ಗಂಟೆಗೆ ಮತ್ತು ಸಂಜೆ 7.30 ಗಂಟೆಗೆ ಊಟದ ಹಾಲಿನಲ್ಲಿ ಸಮೂಹ ಪ್ರಾರ್ಥನೆಯಲ್ಲಿ ಭಾಗವಹಿಸಬೇಕು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ವಿದ್ಯಾರ್ಥಿಗಳು ಅವರವರ ಕೊಠಡಿಗಳನ್ನು ಅಚ್ಚುಕಟ್ಟಾಗಿ ಮತ್ತು ಸ್ವಚ್ಛವಾಗಿ ಇಟ್ಟುಕೊಂಡಿರಬೇಕು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ತಂಡಗಳ ಪ್ರಕಾರ ಗಂಟೆ ಹೊಡೆದ ಕೂಡಲೇ ಊಟಕ್ಕೆ ಆ ತಂಡದವರೆಲ್ಲಾ ಹಾಜರಾಗಬೇಕು. ಕಾಲ ಮೀರಿ ಒಬ್ಬೊಬ್ಬರಾಗಿ ಊಟಕ್ಕೆ ಬರುವುದಕ್ಕೆ ಅವಕಾಶವಿಲ್ಲ.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ಊಟದ ಸಮಯದಲ್ಲಿ ನೆಲದ ಮೇಲೆ ಊಟದ ಪದಾರ್ಥಗಳನ್ನು ಚೆಲ್ಲಬಾರದು. ಊಟ ಮುಗಿದ ನಂತರ ತಟ್ಟೆಯ ಸುತ್ತ ಬಿದ್ದಿರುವುದನ್ನು ಎತ್ತಿಕೊಂಡು ಹೋಗಬೇಕು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ಊಟದ ವೇಳೆಯಲ್ಲಿ ಗಲಾಟೆ ಮಾಡದೆ ಶಾಂತಿಯಿಂದ ಊಟ ಮಾಡಬೇಕು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ಅಡುಗೆಯವರೊಂದಿಗೆ, ನೌಕರರನೊಂದಿಗೆ ಒರಟು ಭಾಷೆ ಉಪಯೋಗಿಸಬಾರದು, ವಾಗ್ವಾದದಲ್ಲಿ ತೊಡಗಬಾರದು. ಕೆಟ್ಟ ಭಾಷೆ ಬಳಸಬಾರದು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ವಿದ್ಯಾರ್ಥಿಗಳು ಯಾವ ಕಾರಣದಿಂದಾಗಲಿ ಅಡುಗೆ ಮನೆ ಪ್ರವೇಶಿಸಕೂಡದು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ಊಟದ ಮನೆಯಲ್ಲಿ ಅವಶ್ಯಕತೆಯಿದ್ದಾಗ ವಿದ್ಯಾರ್ಥಿಗಳು ಊಟದ ವ್ಯವಸ್ಥೆಯಲ್ಲಿ ಸಹಾಯ ಮಾಡಲು ಸಹಕರಿಸಬೇಕು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ಪ್ರತಿಯೊಬ್ಬ ವಿದ್ಯಾರ್ಥಿಯೂ ಸಂಜೆ 7.00 ಗಂಟೆಯೊಳಗಾಗಿ ವಿದ್ಯಾರ್ಥಿನಿಲಯದಲ್ಲಿ ಹಾಜರಿರಬೇಕು. ಅನಿವಾರ್ಯ ಸಂದರ್ಭಗಳಲ್ಲಿ 9.00 ಗಂಟೆಯವರೆಗೆ ಅನುಮತಿ ಪಡೆಯಬಹುದು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ಕಾರ್ಯದರ್ಶಿಗಳ/ಮುಖ್ಯ ಕಾರ್ಯನಿರ್ವಹಣಾಧಿಕಾರಿಗಳ ಅನುಮತಿ ಇಲ್ಲದೆ ಕೊಠಡಿಗಳನ್ನು ಬದಲಾಯಿಸಕೂಡದು.</b></p>
                                            </li>
                                            <li>
                                                <p class="mt-3"><b>ಕೊಠಡಿಗಳಲ್ಲಿ ನೆಂಟರಿಷ್ಟರನ್ನಾಗಲಿ, ಸ್ನೇಹಿತರನ್ನಾಗಲಿ ಬೇರೆ ಯಾರನ್ನೂ ಸೇರಿಸಬಾರದು. ಕೊಠಡಿಯಲ್ಲಿ ಯಾರು ಇಲ್ಲದ ಮೇಲೆ ದೀಪಗಳನ್ನು ಉರಿಸಬಾರದು ಮತ್ತು ಇಸ್ತ್ರಿ ಪೆಟ್ಟಿಗೆ, ಸ್ಟವ್, ವಾಟರ್ ಹೀಟಿಂಗ್ ಕಾಯಲ್ ಉಪಯೋಗಿಸಬಾರದು.</b></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="marketing">
                        <div class="row">
                            <div class="title-sec text-center mt-5">
                                <h2>All Events</h2>
                            </div>
                            @foreach($evnt as $ev)
                            <div class="col-md-6 col-sm-12">
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a><img class="img-fluid" src="/events/{{$ev->event_image}}" style="height:350px;" alt="Post Image"></a>
                                    </div>
                                    <div class="blog-grid-box">
                                        <div class="blog-info clearfix">
                                            <div class="post-left">
                                                <ul>
                                                    <li><img class="img-fluid" src="assets/img/icon/icon-22.svg" alt>{{ \Carbon\Carbon::parse($ev->date)->format('d-m-Y') }}
                                                    </li>
                                                    <li><img class="img-fluid" src="assets/img/icon/icon-23.svg" alt>{{$ev->location}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h3 class="blog-title">{{$ev->event_name}}</h3>
                                        <div class="blog-content blog-read">
                                            <p>{{$ev->about_event}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="text-center ">
                                    <h2>ಅನ್ನದಾತಪುಂಗವ</h2>
                                    <audio controls class="mt-5">
                                        <source src="audio_file.mp3" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>

                                    <p class="mt-4">ಭಜಿಸಿ ನಿಮ್ಮ ಗುಬ್ಬಿ ತೋಟದಪ್ಪ ದೇವಮಾನವ<br> ಭುಜಿಸುತಿಹವು ನಿತ್ಯ ನಾವು ನಿಮ್ಮ ಸುಪ್ರಸಾದವ </p>
                                    <p>ಪುತ್ರ ಪುತ್ರಿಪೌತ್ರರಂತೆ ಬಡವರನ್ನು ಭಾವಕೆ<br> ಖಾತ್ರಿಯಿಂದ ತೆಗೆದುಕೊಂಡು ನಿಲಯ ನೀಡಿ ಕಾಣಿಕೆ<br> ಛತ್ರಲಗ್ನ ಮಂಟಪಗಳನ್ನು ಕಟ್ಟಿ ಲೋಕಕೆ<br> ದಾತ್ಮವೆನಿಸಿ ಮೆರೆದ ನಿಮ್ಮನಭವನೊಯ ಸ್ವರ್ಗಕೆ</p>
                                    <p>ನೀವು ಕಷ್ಟಪಟ್ಟು ದುಡಿದು ಕಟ್ಟಿದಂಥ ಟ್ರಸ್ಟನು<br> ಜೀವದಂತ ಕಾಯ್ತು ನಿಷ್ಠೆಯಿಂದಲದರ ಸೂಕ್ಷ್ಮನು <br>ಯಾವ ವಿಧದ ನ್ಯೂನ ಬಾರದಂತೆ ನಡೆಸುತಿಹರನು<br> ದೇವರಂದ ತಿಳಿದು ಸಾಗುತಿಹವು ನೆನೆಯುತವರನು</p>
                                    <p>ಇಟ್ಟಿ, ಆಸ್ತಿಯುಳಿಸಿ ಬೆಳೆಸಿ ನಿಷ್ಠೆ ಯಾಳದ ನಡೆಸುವ<br> ಶ್ರೇಷ್ಠಗುಣದ ಟ್ರಸ್ಟಿಗಳನು ನೆನೆಯುತನ್ನ ಭುಜಿಸುವ <br>ಶಿಷ್ಟಶೀಲಗಳನ್ನು ಬಿಡದೆ ನಿತ್ಯ ನಿಮ್ಮ ನೆನೆಯುವ <br>ಬಟ್ಟಿ ಬಡವರೆಮ್ಮ ಹರಸಿರನ್ನ ದಾತಪುಂಗವ</p>
                                    <h6 align="right">ಕುಮಾರನಿಜಗುಣ<br>25-9-2003</h6>
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
</div>

@endsection