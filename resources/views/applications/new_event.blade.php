@extends('admin.layouts.ad_main')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success">
                        <p>{{session('success')}}</p>
                    </div>
                    @endif
                    <div class="card-header">
                        <h5 class="mb-0">Add New Event</h5>
                    </div>
                    <div class="card-body">
                        <form action="/newevent_check" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">Title<span class="required">*</span></label>
                                                <select value="" name="title" required class="default-select form-control wide">
                                                    <option value="" selected disabled>Select</option>
                                                    <option>Admission Application</option>
                                                    <option>Scholarship Application</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label text-primary">Year<span class="required">*</span></label>
                                                <input type="text" name="academicyear" class="form-control" id="exampleFormControlInput1" value="<?php echo date('Y') ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label text-primary">Hostels<span class="required">*</span></label>
                                                <select value="" name="hostels[]" id="hostels" multiple required class="default-select form-control wide">
                                                    <option value="" disabled>Select</option>
                                                    @foreach($hostels as $hostel)
                                                    <option value="{{$hostel->id}}">{{$hostel->hostel_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Application Open Date<span class="required">*</span></label>
                                                <input type="date" name="opendate" class="form-control" id="opendate">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Application Close Date<span class="required">*</span></label>
                                                <input type="date" name="closedate" class="form-control" id="closedate">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="">
                                        <button type="submit" value="submit" class="btn btn-outline-primary me-3">Add</button>
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