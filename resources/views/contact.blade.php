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
                            <li class="breadcrumb-item">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 class="mb-0">Contact</h1>
            </div>
        </div>
    </div>
</div>

<section class="page-content course-sec">
    <div class="container">

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card comment-sec">
                    <div class="card-body">
                        <h5 class="subs-title">Post A comment</h5>
                        <form action="/contactcheck" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="mobile" class="form-control" required placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" required placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea rows="4" name="comment" class="form-control" required placeholder="Your Comments"></textarea>
                            </div>
                            <div class="submit-section">
                                <input type="submit" class="btn submit-btn" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection