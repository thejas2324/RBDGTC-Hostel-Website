@extends('admin.layouts.ad_main')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Event</h5>
                    </div>
                    <div class="card-body">
                        <form action="/addevent_check" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-xl-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                
                                                <label class="form-label text-primary">Upload Event image<span class="required">*</span></label>
                                                <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg" id="imageUpload" placeholder="Hostel Photo" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Event Name<span class="required">*</span></label>
                                                <input type="text" name="eventname" class="form-control" id="exampleFormControlInput1" placeholder="Full Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Date<span class="required">*</span></label>
                                                <input type="date" name="date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">Timing<span></span></label>
                                                <input type="time" name="time" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Location<span class="required">*</span></label>
                                                <input type="text" name="location" class="form-control" id="exampleFormControlInput1" placeholder="Event Location" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">About Event<span></span></label>
                                                <textarea name="about" class="form-control" id="" cols="30" rows="5" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" value="submit" class="btn btn-outline-primary me-3">Add Event</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection