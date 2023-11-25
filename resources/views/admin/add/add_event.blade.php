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
                                <div class="col-xl-3 col-lg-4">
                                    <label class="form-label text-primary">Event Photo<span class="required">*</span></label>
                                    <div class="avatar-upload">
                                        <div class="avatar-preview" >
                                            <div id=" imagePreview" style="background-image: url(adminassets/images/no-img-avata.png);">
                                        </div>
                                    </div>
                                    <div class="change-btn mt-2 mb-lg-0 mb-3">
                                        <input type="file" class="form-control d-none" id="imageUpload" name="image" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload" class="dlab-upload mb-0 btn btn-primary btn-sm">Choose File</label>
                                        <a href="javascript:void" class="btn btn-danger light remove-img ms-2 btn-sm">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Event Name<span class="required">*</span></label>
                                            <input type="text" name="eventname" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Date<span class="required">*</span></label>
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-primary">Timing<span></span></label>
                                            <input type="time" name="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Location<span class="required">*</span></label>
                                            <input type="text" name="location" class="form-control" id="exampleFormControlInput1" placeholder="Event Location">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">About Event<span></span></label>
                                            <textarea name="about" class="form-control" id="" cols="30" rows="5"></textarea>
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