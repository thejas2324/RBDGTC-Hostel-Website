@extends('admin.layouts.ad_main')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Hostel</h5>
                    </div>
                    <div class="card-body">
                        <form action="/addhostel_check" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">Hostel Photo<span class="required">*</span></label>
                                                <input type="file" name="image" class="form-control" placeholder="Hostel Photo" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">Hostel Name<span class="required">*</span></label>
                                                <input type="text" name="hostelname" class="form-control" id="exampleFormControlInput1" placeholder="Hostel Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">For Boys or Girls?<span class="required">*</span></label>
                                                <select value="" name="boysorgirls" required class="default-select form-control wide">
                                                    <option value="" selected disabled>Select</option>
                                                    <option>Boys Hostel</option>
                                                    <option>Girls Hostel</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Total students<span class="required">*</span></label>
                                                <input type="text" name="total" class="form-control" id="exampleFormControlInput1" placeholder="Total No of students" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Location<span class="required">*</span></label>
                                                <input type="text" name="location" class="form-control" id="exampleFormControlInput1" placeholder="Location with pincode" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Hostel Mobile<span class="required">*</span></label>
                                                <input type="tel" name="mobile" class="form-control" id="exampleFormControlInput1" placeholder="Hostel Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">E-mail<span class="required">*</span></label>
                                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Hostel Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Hostel exact City Location (For application reference)<span class="required">*</span></label>
                                                <input type="text" name="exact_city" class="form-control" id="" placeholder="Ex1: Majestic, Bengaluru              Ex2: K R Nagara, Mysuru" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" value="submit" class="btn btn-outline-primary me-3">Add Hostel</button>
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