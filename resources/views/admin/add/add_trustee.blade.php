@extends('admin.layouts.ad_main')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Trustee</h5>
                    </div>
                    <div class="card-body">
                        <form action="/addtrustee_check" method="post" enctype="multipart/form-data">
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
                                            <input type="file" class="form-control d-none" id="imageUpload" name="image" accept=".png, .jpg, .jpeg">
                                            <label for="imageUpload" class="dlab-upload mb-0 btn btn-primary btn-sm">Choose File</label>
                                            <a href="javascript:void" class="btn btn-danger light remove-img ms-2 btn-sm">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Tital<span class="required">*</span></label>
                                            <select id="inputState" name="prefix" required class="default-select form-control wide">
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
                                                <label for="exampleFormControlInput1" class="form-label text-primary">E Mail<span>*</span></label>
                                                <input type="mail" name="email" class="form-control" id="exampleFormControlInput1" placeholder="abc@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Designation<span class="required">*</span></label>
                                                <input type="mail" name="designation" class="form-control" id="exampleFormControlInput1" placeholder="designation">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="status" class="form-label">Present or Past</label>
                                            <select id="status" name="trusteestatus" required class="default-select form-control wide">
                                                <option value="" selected disabled>Choose</option>
                                                <option value="Present">Present</option>
                                                <option value="Past">Past</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">From Date<span>*</span></label>
                                                <input type="date" name="fdate" class="form-control" id="fromdate">
                                            </div>
                                        </div>
                                        <div class="col-md-5" id="toDateColumn">
                                            <div class="mb-3">
                                                <label for="todate" class="form-label text-primary">To Date<span></span></label>
                                                <input type="date" name="tdate" class="form-control" id="todate">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Enter About Our Trustee<span></span></label>
                                                <textarea name="about" class="form-control" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" value="submit" class="btn btn-outline-primary me-3">Add Trustee</button>
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