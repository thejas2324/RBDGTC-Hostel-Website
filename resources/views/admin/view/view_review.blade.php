@extends('admin.layouts.ad_main')

<script>
    function confirmDelete(id, fullname) {
        Swal.fire({
            title: 'Are you sure? delete' + '\n' + fullname,
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/deletereview/" + id;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }


    //edit review
    //     function edit_review(id) {
    //         $.ajax({
    //             url: '/reviewget/' + id,
    //             type: 'get',
    //             success: function(res) {
    //                 console.log(res);
    //                 $('#id1').val(res[0].id);
    //                 $('#imagePreview').attr('src', '/review/' + res[0].image);
    //                 $('#fullname1').val(res[0].fullname);
    //                 $('#qua1').val(res[0].qualification);
    //                 $('#year1').val(res[0].year);
    //                 $('#prefix1').val(res[0].prefix);
    //                 $('#msg1').val(res[0].message1);
    //                 $('#msg2').val(res[0].message2);
    //                 var optionval = 1;
    //                 var drop = document.getElementById("prefix1");
    //                 drop.value = optionval;

    //                 $("#reviewedit").modal('show');
    //             }
    //         })
    //     }
    // 
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
                        <div class="page-title">
                            <h2 class=" mt-1">Our Student Reviews</h2>
                            <div>
                                <a href="/addreview" class="btn btn-primary">
                                    + New Review
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--column-->
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                        <div class="table-responsive full-data">
                            <table id="tableId" class="table-responsive-lg table display student-tab no-footer">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>Name</th>
                                        <th>Qualification</th>
                                        <th>Year In hostel</th>
                                        <th>Edit</th>
                                        <th class="text-end">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- code -->
                                    @foreach($data as $dt)
                                    <tr>
                                        <td>
                                            <div class="trans-list">
                                                <img src="/review/{{$dt->image}}" alt="" class="avatar avatar-sm me-3">
                                                <h4></h4>
                                            </div>
                                        </td>
                                        <td><span class="text-primary font-w600">{{$dt->fullname}}</span></td>
                                        <td>
                                            <div class="date">{{$dt->qualification}}</div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$dt->year}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#reviewedit{{$dt->id}}"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #32912b;"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger" onclick="confirmDelete('{{$dt->id}}','{{$dt->fullname}}')">Delete</button> </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="reviewedit{{$dt->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-center model-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit student review</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/review/update" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="avatar-upload text-center">
                                                                    <div class="avatar-preview">
                                                                        <img src="/review/{{$dt->image}}" id="imagePreview" style="width: 7.5rem; height: 6.5rem; border-radius: 10%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mt-3">
                                                                <label for="exampleFormControlInput1" class="form-label">Title<span class="required">*</span></label>
                                                                <select name="prefix1" required class="default-select form-control wide">
                                                                    <option value="{{$dt->prefix}}" selected style="display: none;">{{$dt->prefix}}</option>
                                                                    <option value="Mr.">Mr.</option>
                                                                    <option value="Ms.">Ms.</option>
                                                                    <option value="Mrs.">Mrs.</option>
                                                                    <option value="Dr.">Dr.</option>
                                                                </select>
                                                            </div>
                                                            <div class=" col-xl-9 mb-3 mt-3">
                                                                <input type="text" name="id1" value="{{$dt->id}}" hidden>
                                                                <label class="form-label mb-2">Full Name</label>
                                                                <input type="text" name="fullname1" value="{{$dt->fullname}}" id="fullname1" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput2" class="form-label mb-2">Year</label>
                                                                    <input type="text" name="year1" value="{{$dt->year}}" class="form-control" id="year1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label mb-2">Add new image</label>
                                                                    <input type="file" name="imageupdate1" class="form-control" id="imageupdate1">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 mt-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">Qualification</label>
                                                                    <input type="text" class="form-control" value="{{$dt->qualification}}" name="qua1" id="qua1">
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">message 1</label>
                                                                    <textarea name="msg1" id="msg1" class="form-control" cols="30" rows="3">{{$dt->message1}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput4" class="form-label mb-2">message 2</label>
                                                                    <textarea name="msg2" id="msg2" class="form-control" cols="30" rows="3">{{$dt->message2}}</textarea>
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