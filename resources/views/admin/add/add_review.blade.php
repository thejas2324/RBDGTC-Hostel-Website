@extends('admin.layouts.ad_main')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Review</h5>
                    </div>
                    <div class="card-body">
                        <form action="/addreview_check" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-4">
                                    <label class="form-label text-primary">Photo<span class="required">*</span></label>
                                    <div class="avatar-upload">
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(adminassets/images/no-img-avatar.png);">
                                            </div>
                                        </div>
                                        <div class="change-btn mt-2 mb-lg-0 mb-3">
                                            <input type="file" class="form-control d-none" id="imageUpload" name="image" class="required" accept=".png, .jpg, .jpeg">
                                            <label for="imageUpload" class="dlab-upload mb-0 btn btn-primary btn-sm">Choose File</label>
                                            <a href="javascript:void" class="btn btn-danger light remove-img ms-2 btn-sm">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Title<span class="required">*</span></label>
                                            <select id="prefixSelect" name="prefix" required class="default-select form-control wide">
                                                <option value="" selected disabled>Choose</option>
                                                <option>Mr.</option>
                                                <option>Ms.</option>
                                                <option>Mrs.</option>
                                                <option>Dr.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Full Name<span class="required">*</span></label>
                                                <input type="text" name="fullname" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Qualification<span class="required">*</span></label>
                                                <input type="text" name="quali" class="form-control" id="exampleFormControlInput1" placeholder="Qualification">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">From year - to year in our hostel<span class="required">*</span></label>
                                                <input type="text" name="year" class="form-control" id="exampleFormControlInput1" placeholder="ex: 2021-2023">
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Enter message1<span></span></label>
                                                <textarea name="msg1" class="form-control" id="" cols="30" rows="5" placeholder="message 1"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Enter message2<span></span></label>
                                                <textarea name="msg2" class="form-control" id="" cols="30" rows="5" placeholder="message 2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" value="submit" class="btn btn-outline-primary me-3">Add Review</button>
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