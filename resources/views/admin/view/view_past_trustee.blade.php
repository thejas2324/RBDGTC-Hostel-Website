@extends('admin.layouts.ad_main')

<script>
    function confirmDelete(id, trustee_name) {
        Swal.fire({
            title: 'Are you sure? delete' + '\n' + trustee_name,
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/deletepasttrustee/" + id;
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
                            <h2 class="mt-1">Our Past trustees details</h2>
                            <div>
                                <a href="/addtrustee" class="btn btn-primary" >
                                    + New Trustee
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--column-->
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                        <div class="table-responsive full-data">
                            <table id="tableId" class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Edit</th>
                                        <th class="text-end">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- code -->
                                    @foreach($view as $vi)
                                    <tr>

                                        <td>
                                            <div class="trans-list">
                                                <img src="/trustee/{{$vi->trustee_image}}" alt="" class="avatar avatar-sm me-3">
                                                <h4></h4>
                                            </div>
                                        </td>
                                        <td><span class="text-primary font-w600"> {{$vi->fullname}}</span></td>
                                        <td>
                                            <h6 class="mb-0">{{$vi->Designation}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$vi->from_date}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$vi->to_date}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#past_trustee_edit{{$vi->id}}"><i class="fa-solid fa-user-pen fa-lg" style="color: #5cb955;"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger" onclick="confirmDelete('{{$vi->id}}','{{$vi->fullname}}')">Delete</button> </a>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="past_trustee_edit{{$vi->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-center model-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Trustee Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/trustee/update" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="avatar-upload text-center">
                                                                    <div class="avatar-preview">
                                                                        <img src="/trustee/{{$vi->trustee_image}}" id="imagePreview" alt="" style="width: 10.5rem; height: 7.5rem; border-radius: 10%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <input type="text" name="id1" id="id1" value="{{$vi->id}}" hidden>
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">Full Name</label>
                                                                    <input type="text" name="fullname" value="{{$vi->fullname}}" class="form-control" id="fullname1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">Add new image</label>
                                                                    <input type="file" name="imageupload1" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Present or Past*</label>
                                                                    <select name="status" class="default-select form-control wide" required>
                                                                        <option value="{{$vi->trustee_status}}" selected style="display:none;">{{$vi->trustee_status}}</option>
                                                                        <option value="Present">Present</option>
                                                                        <option value="Past">Past</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">E-mail ID</label>
                                                                    <input type="mail" class="form-control" value="{{$vi->email_id}}" name="email" id="email1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">Designation</label>
                                                                    <input type="text" class="form-control" value="{{$vi->Designation}}" name="des" id="des1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">From Date</label>
                                                                    <input type="date" class="form-control" value="{{$vi->from_date}}" name="fromdate" id="fromdate1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">To Date</label>
                                                                    <input type="date" class="form-control" value="{{$vi->to_date}}" name="todate">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 mt-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">About Trustee</label>
                                                                    <textarea class="form-control" name="about" id="about1" cols="30" rows="2">{{$vi->about}}</textarea>
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