@extends('admin.layouts.ad_main')

<script>
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Are you sure? delete',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/deletehostel/" + id;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
</script>

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title flex-wrap">
                            <h2>Our admin details</h2>
                            <div>

                                <a href="/addadmin" type="button" class="btn btn-primary">
                                    + New admin
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--column-->
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                        <div class="table-responsive full-data">
                            <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer" id="tableId">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email Id</th>
                                        <th>User type</th>
                                        <th>Edit</th>
                                        <th class="text-end">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- code -->
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>
                                            <div class="trans-list">
                                                <img src="/admin_photos/{{$admin->image}}" alt="" class="avatar avatar-sm me-3">
                                                <h4></h4>
                                            </div>
                                        </td>
                                        <td><span class="text-primary font-w600">{{$admin->name}}</span></td>
                                        <td>
                                            <div class="date">{{$admin->mobile_number}}</div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$admin->email_id}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$admin->user_type}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#adminedit{{$admin->id}}">
                                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #32912b;"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger" onclick="confirmDelete('{{$admin->id}}','{{$admin->name}}')">Delete</button> </a>
                                        </td>
                                    </tr>
                                    <!-- model -->
                                    <div class="modal fade" id="adminedit{{$admin->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-center model-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/admin/update" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="avatar-upload text-center">
                                                                    <div class="avatar-preview">
                                                                        <img src="/admin_photos/{{$admin->image}}" id="imagePreview" alt="" style="width: 9.5rem; height: 8.5rem; border-radius: 10%;">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <input type="text" name="id1" value="{{$admin->id}}" hidden>
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">Admin Name</label>
                                                                    <input type="text" name="name" value="{{$admin->name}}" class="form-control" id="">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">Mobile Number</label>
                                                                    <input type="text" name="mobile" value="{{$admin->mobile_number}}" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label mb-2">User Type?<span class="required">*</span></label>
                                                                    <select name="type" required class="default-select form-control wide">
                                                                        <option value="{{$admin->user_type}}" selected>{{$admin->user_type}}</option>
                                                                        <option value="Developer">Developer</option>
                                                                        <option value="Hostel Administrator">Hostel Administrator</option>
                                                                        <option value="Trustee">Trustee</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">E mail</label>
                                                                    <input type="text" name="email" value="{{$admin->email_id}}" class="form-control" id="">
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
                                                                    <textarea name="address" class="form-control" id="" cols="30" rows="1">{{$admin->address}}</textarea>
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/column-->
                </div>
            </div>
        </div>
        <!--**********************************
					Footer start
				***********************************-->
    </div>
</div>


@endsection