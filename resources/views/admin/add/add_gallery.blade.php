@extends('admin.layouts.ad_main')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Photos</h5>
                    </div>
                    <div class="card-body">
                        <form action="/addgallery_check" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Photo<span class="required">*</span></label>
                                                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Function Name<span class="required">*</span></label>
                                                <input type="text" name="pn" class="form-control" id="exampleFormControlInput1" placeholder="What kind of event photo" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Date<span class="required">*</span></label>
                                                <input type="date" name="date" class="form-control" id="exampleFormControlInput1" placeholder="ex: 2021-2023" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">About Photo<span></span></label>
                                                <textarea name="about" class="form-control" id="" cols="30" rows="5" placeholder="message 1" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" value="submit" class="btn btn-outline-primary me-3">Add Photo</button>
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