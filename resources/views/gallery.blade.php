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

                            <li class="breadcrumb-item">Gallery</li>
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

                <!-- <div class="showing-list">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <div class="view-icons">
                                    <a href="students-grid.html" class="grid-view active"><i class="feather-grid"></i></a>
                                    <a href="students-list.html" class="list-view"><i class="feather-list"></i></a>
                                </div>
                                <div class="show-result">
                                    <h4>Showing 1-9 of 50 results</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    @foreach($photos as $photo)
                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="student-box flex-fill">
                            <div class="student-img">
                                <img class="img-fluid" src="/photos/{{$photo->photo}}" alt="Click Me" class="popup-image" id="popupImage" style="width:200px; height:150px;">
                            </div>
                            <!-- <div id="modal" class="modal">
                                <span class="close" id="closeBtn">&times;</span>
                                <img src="assets/img/gallery/ganesha.png" alt="Popup Image" class="modal-content">
                            </div> -->
                            <script src="script.js"></script>
                            <div class="student-content pb-0">
                                <h5><a href="">{{$photo->photo_name}}</a></h5>
                                <!-- <h6>Student</h6> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @php
                $currentPage = $photos->currentPage();
                $nextPage = $photos->nextPageUrl() ? $currentPage + 1 : null;
                $previousPage = $photos->previousPageUrl() ? $currentPage - 1 : null;
                @endphp
                <div class="row">
                    <div class="col-md-12">
                        <ul class="pagination lms-page">
                            @if($previousPage!=null)
                            <li class="page-item prev">
                                <a class="page-link" href="/gallery?page={{$previousPage}}" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                            </li>
                            @endif
                            <li class="page-item first-page active">
                                <a class="page-link" href="">{{$currentPage}}</a>
                            </li>
                            @if($nextPage!=null)
                            <li class="page-item next">
                                <a class="page-link" href="/gallery?page={{$nextPage}}"><i class="fas fa-angle-right"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection