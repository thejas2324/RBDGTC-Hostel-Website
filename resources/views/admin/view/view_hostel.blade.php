@extends('admin.layouts.ad_main')

<script>
    function confirmDelete(id, hostel_name) {
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


    //edit hostel
    // function edit_hostel(id) {
    //     $.ajax({
    //         url: '/hostelget/' + id,
    //         type: 'get',
    //         success: function(res) {
    //             console.log(res);
    //             $('#id1').val(res[0].id);
    //             $('#imagePreview').attr('src', '/hostel/' + res[0].hostel_photo);
    //             $('#hostelname1').val(res[0].hostel_name);
    //             $('#type1').val(res[0].boys_girls);
    //             $('#totalstd1').val(res[0].total_students);
    //             $('#location1').val(res[0].location);
    //             $('#mobile1').val(res[0].mobile);
    //             $('#email1').val(res[0].email_id);
    //             $('#mobil').val(parseInt(res[0].mobile));

    //             $("#hosteledit").modal('show');
    //         }
    //     })
    // }
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
                            <h2>Our hostels details</h2>
                            <div>

                                <a href="/addhostel" type="button" class="btn btn-primary">
                                    + New Hostel
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
                                        <th>Total Students</th>
                                        <th>Location</th>
                                        <th>Mobile</th>
                                        <th>Email_id</th>
                                        <th>Edit</th>
                                        <th class="text-end">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- code -->
                                    @foreach($hstl as $hostel)
                                    <tr>
                                        <td>
                                            <div class="trans-list">
                                                <img src="/hostel/{{$hostel->hostel_photo}}" alt="" class="avatar avatar-sm me-3">
                                                <h4></h4>
                                            </div>
                                        </td>
                                        <td><span class="text-primary font-w600">{{$hostel->hostel_name}}</span></td>
                                        <td>
                                            <div class="date">{{$hostel->total_students}}</div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$hostel->location}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$hostel->mobile}}</h6>
                                        </td>

                                        <td>
                                            <h6 class="mb-0">{{$hostel->email_id}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#hosteledit{{$hostel->id}}"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #32912b;"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger" onclick="confirmDelete('{{$hostel->id}}','{{$hostel->hostel_name}}')">Delete</button> </a>
                                        </td>
                                    </tr>

                                    <!-- model -->
                                    <div class="modal fade" id="hosteledit{{$hostel->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-center model-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Hostel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/hostel/update" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="avatar-upload text-center">
                                                                    <div class="avatar-preview">
                                                                        <img src="/hostel/{{$hostel->hostel_photo}}" id="imagePreview" alt="" style="width: 10.5rem; height: 7.5rem; border-radius: 10%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <input type="text" name="id1" value="{{$hostel->id}}" hidden>
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">Hostel Name</label>
                                                                    <input type="text" class="form-control" name="hostelname" value="{{$hostel->hostel_name}}" id="hostelname1">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label text-primary">For Boys or Girls?<span class="required">*</span></label>
                                                                    <select name="type" id="type1" required class="default-select form-control wide">
                                                                        <option value="{{$hostel->boys_girls}}" selected style="display:none">{{$hostel->boys_girls}}</option>
                                                                        <option value="Boys Hostel">Boys Hostel</option>
                                                                        <option value="Girls Hostel">Girls Hostel</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">Add new image</label>
                                                                    <input type="file" class="form-control" name="imageupload" id="imageupload1">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">Total Students</label>
                                                                    <input type="text" class="form-control" name="totalstd" value="{{$hostel->total_students}}" id="totalstd1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">Location</label>
                                                                    <input type="text" class="form-control" name="location" value="{{$hostel->location}}" id="location1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">Mobile</label>
                                                                    <input type="text" class="form-control" name="mobile" value="{{$hostel->mobile}}" id="mobile1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">E-mail</label>
                                                                    <input type="mail" name="email" class="form-control" name="email" value="{{$hostel->email_id}}" id="email1">
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