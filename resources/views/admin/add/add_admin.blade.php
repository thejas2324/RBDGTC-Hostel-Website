@extends('admin.layouts.ad_main')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Admin</h5>
                    </div>
                    <div class="card-body">
                        <form action="/adminreg_check" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">Admin Photo<span class="required">*</span></label>
                                                <input type="file" name="image" class="form-control" placeholder="Hostel Photo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">Admin Name<span class="required">*</span></label>
                                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Admin Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Phone Number<span class="required">*</span></label>
                                                <input type="tel" name="mobile" class="form-control" id="exampleFormControlInput1" placeholder="Admin Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">E-mail<span class="required">*</span></label>
                                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Admin Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">User Type?<span class="required">*</span></label>
                                                <select value="" name="usertype" required class="default-select form-control wide">
                                                    <option value="" selected disabled>Select</option>
                                                    <option>Developer</option>
                                                    <option>Hostel Administrator</option>
                                                    <option>Trustee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Password<span class="required">*</span></label>
                                                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Address<span class="required">*</span></label>
                                                <textarea name="address" class="form-control" id="" cols="30" rows="2"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="">
                                        <button type="submit" value="submit" class="btn btn-outline-primary me-3">Add Admin</button>
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