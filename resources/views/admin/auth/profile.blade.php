@extends('admin.layouts.ad_main')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-10">
                <div class="card h-auto">
                    <div class="card-header p-0">
                        <div class="user-bg w-100">
                            <div class="user-svg">
                                <svg width="261" height="109" viewBox="0 0 261 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.6521" width="261" height="275.13" rx="130.5" fill="#FCC43E" />
                                </svg>
                            </div>
                            <div class="user-svg-1">
                                <svg width="261" height="63" viewBox="0 0 261 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="261" height="275.13" rx="130.5" fill="#FB7D5B" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    @if($details->count() > 0)
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="user">
                                <div class="user-media">
                                    <img src="/admin_photos/{{session('admin_image')}}" alt="" class="avatar avatar-xxl" style="width:250px; height:250px;">
                                </div>
                                <div>
                                    <h2 class="mb-0">{{$details[0]->admin_name}}</h2>
                                    <p class="text-primary">Admin</p>
                                </div>
                            </div>
                            <div class="dropdown custom-dropdown">
                                <div class="btn sharp tp-btn " data-bs-toggle="dropdown">
                                    <svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z" fill="#A098AE" />
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#adminedit">Edit Profile</a>
                                    <a class="dropdown-item" href="/admin_logout">Logout</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-3 col-xxl-6 col-sm-6">
                                <ul class="student-details">
                                    <li class="me-2">
                                        <a class="icon-box bg-secondary">
                                            <img src="/adminassets/images/profile.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <span>User type:</span>
                                        <h5 class="mb-0">{{$details[0]->user_type}}</h5>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-3 col-xxl-6 col-sm-6">
                                <ul class="student-details">
                                    <li class="me-2">
                                        <a class="icon-box bg-secondary">
                                            <img src="/adminassets/images/svg/phone.svg" alt="">
                                        </a>
                                    </li>
                                    <li><span>Phone:</span>
                                        <h5 class="mb-0">{{$details[0]->mobile_number}}</h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-xxl-6 col-sm-6">
                                <ul class="student-details">
                                    <li class="me-2">
                                        <a class="icon-box bg-secondary">
                                            <img src="/adminassets/images/svg/email.svg" alt="">
                                        </a>
                                    </li>
                                    <li><span>Email:</span>
                                        <h5 class="mb-0">{{$details[0]->email_id}}</h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-xxl-6 col-sm-6">
                                <ul class="student-details">
                                    <li class="me-2">
                                        <a class="icon-box bg-secondary">
                                            <img src="/adminassets/images/svg/location.svg" alt="">
                                        </a>
                                    </li>
                                    <li><span>Address:</span>
                                        <h5 class="mb-0">{{$details[0]->address}}</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<!-- model -->
@if($details->count() > 0)
<div class="modal fade" id="adminedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center model-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="avatar-upload text-center">
                                <div class="avatar-preview">
                                    <img src="/admin_photos/{{$details[0]->image}}" id="imagePreview" alt="" style="width: 9.5rem; height: 8.5rem; border-radius: 10%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mt-3">
                            <div class="mb-3">
                                <input type="text" name="id1" value="{{$details[0]->id}}" hidden>
                                <label for="exampleFormControlInput2" class="form-label mb-2">Admin Name</label>
                                <input type="text" name="name" value="{{$details[0]->name}}" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label mb-2">Mobile Number</label>
                                <input type="text" name="mobile" value="{{$details[0]->mobile_number}}" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-xl-6 mt-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label mb-2">E mail</label>
                                <input type="text" name="email" value="{{$details[0]->email_id}}" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary">User Type?<span class="required">*</span></label>
                                <select value="" name="type" required class="default-select form-control wide">
                                    <option value="{{$details[0]->user_type}}" selected disabled>{{$details[0]->user_type}}</option>
                                    <option value="Developer">Developer</option>
                                    <option value="Hostel Administrator">Hostel Administrator</option>
                                    <option value="Trustee">Trustee</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput4" class="form-label mb-2">Add new Photo</label>
                                <input type="file" class="form-control" id="" name="imageupload1">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput4" class="form-label mb-2">Address</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="1">{{$details[0]->address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection