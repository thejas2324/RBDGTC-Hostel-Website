@extends('layouts.main')

@section('content')

<section class="home-slide d-flex align-items-center">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/img/hostel_images/hostel_image.jpg" style="max-width:100%" id="img1" alt>
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:bisque">Rao Bahadur Dharmapravartha Gubbi Thotadappa Charities, Bengaluru-23</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/assets/img/hostel_images/suggi.jpeg" style="max-width:100%" id="img1" alt>
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:bisque">Suggi Fest-2023</h1>
                    </div>
                </div>
                <!-- <div class="carousel-item">
                    <img src="/assets/img/hostel_images/finalyearstd.jpg" style="max-width:100%;" id="img1" alt>
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Final year students, Batch 2022-23</h1>
                    </div>
                </div> -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<div class="col-md-12 card" style=" background-color:#d6e1f1; margin-top:10px; padding-top:15px;">
    <div class="row">
        <!-- <div class="col-md-2 text-center">
            <h3>Update</h3>
        </div>
     -->
        <div class="col-md-12">
            <marquee behavior="scroll" direction="left" id="myMarquee">
                <ul>
                    <!-- <li>
                        <a href="/studentregister"> Hostel application open for the year 2023-24</a>
                    </li> -->
                    <li>
                        <a href="/studentregister">scholarship for deserved students open for the year 2023-24</a>
                    </li>
                </ul>
            </marquee>
        </div>
    </div>
</div>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="knowledge-img aos" data-aos="fade-up">
                    <img src="/assets/img/hostel_images/hostel_image.jpg" alt class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="join-mentor aos" data-aos="fade-up">
                    <h2>Our mission</h2>
                    <p class="tab-indent">
                        "Gubbi Thotadappa Charities," established in the year 1903, holds a remarkable history of contributing to society for over 120 years.<br>
                        This enduring philanthropic organization has been steadfastly dedicated to its mission of extending a helping hand to the underprivileged Veerashaiva Lingayatha rural boys and girls who aspire for an education.
                    </p>

                    <!-- <div class="all-btn all-category d-flex align-items-center">
                        <a href="/aboutrbdgtc" class="btn btn-primary">Read More</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="home-three-transform mt-5">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="cta-content">
                    <h2>Student Dashboard</h2>
                    <p>Login for Apply Admission and Scholarship Applications</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="transform-button-three">
                    <a href="/studentregister" class="btn btn-action">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section how-it-works">
    <div class="container">
        
        <div class="owl-carousel mentoring-course owl-theme aos" data-aos="fade-up">
            <a data-toggle="modal" data-target=".bd-example-modal-lg">
                <div class="feature-box text-center" style="background-color: #f7ebd6;">
                    <div class="feature-bg">
                        <div class="feature-header">
                            <div class="feature-icon">
                                <img src="/assets/img/responsibility/02.png" alt>
                            </div>
                            <div class="feature-cont">
                                <div class="feature-text">Free Boarding and lodging</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <div class="feature-box text-center" style="background-color: #f7ebd6;">
                <a data-toggle="modal" data-target=".bd-example-modal-lg1">
                    <div class="feature-bg">
                        <div class="feature-header">
                            <div class="feature-icon">
                                <img src="/assets/img/responsibility/01.png" alt="empty">
                            </div>
                            <div class="feature-cont">
                                <div class="feature-text">Scholarship facility</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="feature-box text-center" style="background-color: #f7ebd6;">
                <a data-toggle="modal" data-target=".bd-example-modal-lg2">
                    <div class="feature-bg">
                        <div class="feature-header">
                            <div class="feature-icon">
                                <img src="/assets/img/responsibility/04.png" alt>
                            </div>
                            <div class="feature-cont">
                                <div class="feature-text">Library Facility</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="feature-box text-center" style="background-color: #f7ebd6;">
                <a data-toggle="modal" data-target=".bd-example-modal-lg3">
                    <div class="feature-bg">
                        <div class="feature-header">
                            <div class="feature-icon">
                                <img src="/assets/img/responsibility/03.png" alt>
                            </div>
                            <div class="feature-cont">
                                <div class="feature-text">Pooja and centenary hall</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="section new-course">
    <div class="container">
        <div class="row" style="margin-top:-20px;">
            <div class="col-md-4 row">
                <div class="section-header aos" data-aos="fade-up">
                    <div class="section-sub-head">
                        <h2>RBDGTC Events
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <marquee behavior="scroll" direction="left" id="myMarquee">
                    <a href="" id="play-video-link">
                        <h3>Play Event Video</h3>
                    </a>
                </marquee>
            </div>
        </div>
        <div class="course-feature">
            <div class="row">
                @foreach($evnt as $ev)
                <div class="col-lg-3">
                    <div class="course-box d-flex aos" data-aos="fade-up">
                        <div class="product">
                            <div class="product-img">
                                <a href="course-details.html">
                                    <img class="img-fluid" alt src="/events/{{$ev->event_image}}" style="height:150px; width:500px;">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="title instructor-text"><a href="course-details.html">{{$ev->event_name}}</a></h3>
                                <div class="course-info d-flex align-items-center">
                                    <div class="rating-img d-flex align-items-center">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <p>{{ \Carbon\Carbon::parse($ev->date)->format('d-m-Y') }}</p>
                                    </div>
                                    <div class="course-view d-flex align-items-center" data-date="2023/7/31">
                                        <img src="/assets/img/icon/icon-02.svg" alt>
                                        <p>{{$ev->time}}</p>
                                    </div>
                                </div>
                                <div class="all-btn all-category d-flex align-items-center">
                                    <a href="checkout.html" class="btn btn-primary">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div id="video-container">
                    <video controls style="width:100%">
                        <source src="/assets/img/video/suggi.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section user-love">
    <div class="container">
        <div class="section-header white-header aos" data-aos="fade-up">
            <div class="section-sub-head feature-head text-center">
                <!-- <span>Check out these real reviews</span> -->
                <h2 style="margin-top: -50px;">Our Student reviews</h2>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-four">
    <div class="review">
        <div class="container">
            <div class="testi-quotes">
                <img src="assets/img/qute.png" alt>
            </div>
            <div class="mentor-testimonial lazy slider aos" data-aos="fade-up" data-sizes="50vw">
                @foreach($reviews as $review)
                <div class="d-flex justify-content-center">
                    <div class="testimonial-all d-flex justify-content-center">
                        <div class="testimonial-two-head text-center align-items-center d-flex">
                            <div class="testimonial-four-saying ">
                                <div class="testi-right">
                                    <img src="assets/img/qute-01.png" alt>
                                </div>
                                <p>{{$review->message1}}<br>
                                    {{$review->message2}}
                                </p>
                                <div class="four-testimonial-founder">
                                    <div class="fount-about-img">
                                        <a><img src="/review/{{$review->image}}" alt class="img-fluid" style="width: 150px; height:150px"></a>
                                    </div>
                                    <h3><a>{{$review->fullname}}</a></h3>
                                    <span>{{$review->qualification}}</span> <br>
                                    <span>{{$review->year}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section student-course" style="margin-top: 380px;">
    <div class="container">
        <div class="course-widget">
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos colorchange" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center colorchange">
                                <div class="course-img">
                                    <img src="/assets/img/gratuate-icon.svg" alt>
                                </div>
                                <div class="course-inner-content">
                                    <h4><span>445</span></h4>
                                    <p>Present Students</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="course-full-width">
                        <div class="blur-border course-radius align-items-center aos colorchange" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center colorchange">
                                <div class="course-img">
                                    <img src="/assets/img/pencil-icon.svg" alt>
                                </div>
                                <div class="course-inner-content">
                                    <h4><span>15</span></h4>
                                    <p>Number of Hostels</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos colorchange" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center colorchange">
                                <div class="course-img">
                                    <img src="/assets/img/cources-icon.svg" alt>
                                </div>
                                <div class="course-inner-content">
                                    <h4><span>200</span>+</h4>
                                    <p>Commitee members</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos colorchange" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center colorchange">
                                <div class="course-img">
                                    <img src="/assets/img/certificate-icon.svg" alt>
                                </div>
                                <div class="course-inner-content">
                                    <h4><span>1 Lack</span>+</h4>
                                    <p>overall students</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 
<section class="section become-instructors aos" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 d-flex">
                <div class="student-mentor cube-instuctor ">
                    <h4>Become An Instructor</h4>
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="top-instructors">
                                <p>Top instructors from around the world teach millions of students on Mentoring.</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="mentor-img">
                                <img class="img-fluid" alt src="/assets/img/become-02.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-flex">
                <div class="student-mentor yellow-mentor">
                    <h4>Transform Access To Education</h4>
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="top-instructors">
                                <p>Create an account to receive our newsletter, course recommendations and promotions.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="mentor-img">
                                <img class="img-fluid" alt src="/assets/img/become-01.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


<!-- <section class="section latest-blog">
    <div class="container">
        <div class="section-header aos" data-aos="fade-up">
            <div class="section-sub-head feature-head text-center mb-0">
                <h2>Latest Blogs</h2>
                <div class="section-text aos" data-aos="fade-up">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget aenean accumsan bibendum gravida maecenas augue elementum et neque. Suspendisse imperdiet.</p>
                </div>
            </div>
        </div>
        <div class="owl-carousel blogs-slide owl-theme aos" data-aos="fade-up">
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-01.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">Attract More Attention Sales And Profits</a></h5>
                    <p>Marketing</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Jun 15, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-02.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">11 Tips to Help You Get New Clients</a></h5>
                    <p>Sales Order</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>May 20, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-03.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">An Overworked Newspaper Editor</a></h5>
                    <p>Design</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>May 25, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-04.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">A Solution Built for Teachers</a></h5>
                    <p>Seo</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Jul 15, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-02.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">Attract More Attention Sales And Profits</a></h5>
                    <p>Marketing</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Sep 25, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-03.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">An Overworked Newspaper Editor</a></h5>
                    <p>Marketing</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>May 25, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-04.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">A Solution Built for Teachers</a></h5>
                    <p>Analysis</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>May 15, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-02.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">11 Tips to Help You Get New Clients</a></h5>
                    <p>Development</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Jun 20, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-03.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">An Overworked Newspaper Editor</a></h5>
                    <p>Sales</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>May 25, 2022</span>
                    </div>
                </div>
            </div>
            <div class="instructors-widget blog-widget">
                <div class="instructors-img">
                    <a href="blog-list.html">
                        <img class="img-fluid" alt src="/assets/img/blog/blog-04.jpg">
                    </a>
                </div>
                <div class="instructors-content text-center">
                    <h5><a href="blog-list.html">A Solution Built for Teachers</a></h5>
                    <p>Marketing</p>
                    <div class="student-count d-flex justify-content-center">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>April 15, 2022</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="enroll-group aos" data-aos="fade-up">
            <div class="row ">
                <div class="col-lg-4 col-md-6">
                    <div class="total-course d-flex align-items-center">
                        <div class="blur-border">
                            <div class="enroll-img ">
                                <img src="/assets/img/icon/icon-07.svg" alt class="img-fluid">
                            </div>
                        </div>
                        <div class="course-count">
                            <h3><span class="counterUp">253,085</span></h3>
                            <p>STUDENTS ENROLLED</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="total-course d-flex align-items-center">
                        <div class="blur-border">
                            <div class="enroll-img ">
                                <img src="/assets/img/icon/icon-08.svg" alt class="img-fluid">
                            </div>
                        </div>
                        <div class="course-count">
                            <h3><span class="counterUp">1,205</span></h3>
                            <p>TOTAL COURSES</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="total-course d-flex align-items-center">
                        <div class="blur-border">
                            <div class="enroll-img ">
                                <img src="/assets/img/icon/icon-09.svg" alt class="img-fluid">
                            </div>
                        </div>
                        <div class="course-count">
                            <h3><span class="counterUp">127</span></h3>
                            <p>COUNTRIES</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lab-course">
            <div class="section-header aos" data-aos="fade-up">
                <div class="section-sub-head feature-head text-center">
                    <h2>Unlimited access to 360+ courses <br>and 1,600+ hands-on labs</h2>
                </div>
            </div>
            <div class="icon-group aos" data-aos="fade-up">
                <div class="offset-lg-1 col-lg-12">
                    <div class="row">
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-09.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-10.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-16.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-12.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-13.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-14.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-15.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-16.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-17.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-3">
                            <div class="total-course d-flex align-items-center">
                                <div class="blur-border">
                                    <div class="enroll-img ">
                                        <img src="/assets/img/icon/icon-18.svg" alt class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- model for boarding and loading -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Free Boarding and Lodging</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="student-img mt-2">
                <img class="img-fluid" alt="Trustees'photo" src="assets/img/hostel_images/room.png" style="width: 400px;">
            </div>
            <div class="modal-body">
                <p class="tab-indent">
                    Gubbi Thotadappa Charities, established in 1903,
                    has served our society for over 120 years by providing free boarding & lodging facilities to Veerashaiva Lingayath students
                    from rural & economically poor backgrounds. The trust also provide personal and career guidance to the students to become resposnsible and successful citizens in our soceity. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Scholarship Facility</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="student-img mt-2">
                        <img class="img-fluid" alt="Trustees'photo" src="assets/img/hostel_images/scholarshipb.jpg" style="width: 350px; height:250px;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="student-img mt-2">
                        <img class="img-fluid" alt="Trustees'photo" src="assets/img/hostel_images/scholarshipg.jpg" style="width: 350px; height:250px;">
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <p class="tab-indent">
                    Gubbi Thotadappa Hostel offers annual scholarships to deserving students,
                    with a specific focus on single-parent households and strong academic performance.

                    Through financial support and a supportive environment, the hostel encourages academic
                    excellence and personal growth among scholarship recipients, fostering a positive impact
                    on both individuals and the society.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Library Facility</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="student-img mt-2">
                <img class="img-fluid" alt="Trustees'photo" src="assets/img/hostel_images/library.jpg" style="width: 450px; height:280px;">
            </div>
            <div class="modal-body">
                <p class="tab-indent">
                    At Gubbi Thotadappa Hostel, we are proud to house a specialized species library complemented by free 24/7 WiFi connectivity,
                    fostering an optimal environment for focused study. Our extensive collection encompasses diverse subjects, notably computer science,
                    biology, and business-related literature. The adjoining computer room, available round the clock, further enhances our students learning experience,
                    providing a comprehensive hub for both research and study endeavors.
                </p>
            </div>

            <div class="student-img">
                <img class="img-fluid" alt="Trustees'photo" src="assets/img/hostel_images/books.jpeg" style="width: 450px; height:200px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pooja Room & Centenary hall</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="student-img mt-2">
                        <img class="img-fluid" alt="Trustees'photo" src="assets/img/hostel_images/nagatemple.jpg" style="width: 270px; height:300px">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="student-img mt-2">
                        <img class="img-fluid" alt="Trustees'photo" src="assets/img/hostel_images/students.jpg" style="width: 350px; height:300px">
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <p class="tab-indent">
                    At Gubbi Thotadappa Hostel, a daily morning ritual unfolds in the tranquil pooja room. Here,
                    students from diverse backgrounds come together to participate in the morning pooja,
                    fostering a sense of unity and spirituality.
                    The pooja room becomes a serene space where students start their day with devotion.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection