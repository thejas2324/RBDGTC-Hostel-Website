@extends('admin.layouts.ad_main')

<script>
    function confirmDelete(id, event_name) {
        Swal.fire({
            title: 'Are you sure? delete' + "\n" + event_name,
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/deleteevent/" + id;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
    //edit event
    function edit_application(id) {
        $.ajax({
            url: '/applicationget/' + id,
            type: 'get',
            success: function(res) {
                console.log(res);
                $('#id1').val(res[0].id);
                $('#imagePreview').attr('src', '/events/' + res[0].event_image);
                $('#eventname1').val(res[0].event_name);
                $('#location1').val(res[0].location);
                $('#date1').val(res[0].date);
                $('#time1').val(res[0].time);
                $('#about1').val(res[0].about_event);

                $("#eventedit").modal('show');
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
                            <h2>Event details</h2>
                            <div>
                                <a href="/addevent" class="btn btn-primary">
                                    + New Event
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
                                        <th>Event Name</th>
                                        <th>Date</th>
                                        <th>Timing</th>
                                        <th>Location</th>
                                        <th>About</th>
                                        <th>Edit</th>
                                        <th class="text-end">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- code -->
                                    @foreach($evnt as $ev)
                                    <tr>
                                        <td>
                                            <div class="trans-list">
                                                <img src="/events/{{$ev->event_image}}" alt="img" class="avatar avatar-sm me-3">
                                                <h4></h4>
                                            </div>
                                        </td>
                                        <td><span class="text-primary font-w600">{{$ev->event_name}}</span></td>
                                        <td>
                                            <div class="date">{{$ev->date}}</div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$ev->time}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$ev->location}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$ev->about_event}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" onclick="edit_application('{{$ev->id}}')">
                                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #32912b;"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger" onclick="confirmDelete('{{$ev->id}}','{{$ev->event_name}}')">Delete</button> </a>
                                        </td>
                                    </tr>
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

<div class="modal fade" id="eventedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center model-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/event/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="avatar-upload text-center">
                                <div class="avatar-preview">
                                    <img src="" id="imagePreview" style="width: 10.5rem; height: 7.5rem; border-radius: 10%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mt-3">
                            <div class="mb-3">
                                <input type="text" name="id1" id="id1" hidden>
                                <label for="exampleFormControlInput2" class="form-label mb-2">Event Name</label>
                                <input type="text" name="eventname" class="form-control" id="eventname1">
                            </div>
                        </div>
                        <div class="col-xl-6 mt-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput4" class="form-label mb-2">Add new image</label>
                                <input type="file" class="form-control" name="imageupload1" id="imageupload1">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput4" class="form-label mb-2">Location</label>
                                <input type="text" class="form-control" name="location" id="location1">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput4" class="form-label mb-2">Date</label>
                                <input type="date" class="form-control" name="date" id="date1">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput4" class="form-label mb-2">Time</label>
                                <input type="time" class="form-control" name="time" id="time1">
                            </div>
                        </div>
                        <div class="col-xl-12 mt-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label mb-2">About Event</label>
                                <input type="text" name="about" class="form-control" id="about1">
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
@endsection