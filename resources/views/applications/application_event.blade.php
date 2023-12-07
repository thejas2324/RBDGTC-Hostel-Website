@extends('admin.layouts.ad_main')

<script>
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Are you sure? delete' + "\n" + name,
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/deleteapplicationevent/" + id;
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

    <!-- container starts -->
    <div class="container-fluid">
        <!-- row -->
        <div class="element-area">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header flex-wrap d-flex justify-content-between">
                        <div>
                            <h3 class="card-title"> {{$status}} Application Events</h3>
                        </div>
                        <div class="dropdown ms-auto text-end c-pointer">
                            <button class="btn btn-primary" data-bs-toggle="dropdown">
                                Status <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/manage_application">All</a>
                                <a class="dropdown-item" href="/manage_application/Pending">Pending</a>
                                <a class="dropdown-item" href="/manage_application/Running">Running</a>
                                <a class="dropdown-item" href="/manage_application/Closed">Closed</a>
                            </div>
                        </div>
                    </div>
                    <!-- tab-content -->
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="bordered" role="tabpanel" aria-labelledby="home-tab-1">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="example" class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Open Date</th>
                                                <th>Close Date</th>
                                                <th>Application Year</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($events as $event)
                                            <tr>
                                                <td>{{$event->title}}</td>
                                                <td>{{$event->open_date}}</td>
                                                <td>{{$event->close_date}}</td>
                                                <td>{{$event->application_year}}</td>
                                                <?php
                                                $color = "";
                                                if ($event->status == 'Pending') {
                                                    $color = "warning";
                                                } else if ($event->status == "Running") {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                                ?>
                                                <td><span class="badge light badge-{{$color}}">{{$event->status}}</span></td>
                                                <td>
                                                    @if($event->status=="Pending")
                                                    <a href="/eventupdate/{{$event->id}}/Running" class="btn btn-success">Open Application <i class="fa-solid fa-lock-open"></i> </a>
                                                    @elseif($event->status=="Running")
                                                    <a href="/eventupdate/{{$event->id}}/Closed" class="btn btn-danger">Close Application <i class="fa-solid fa-lock"></i> </a>
                                                    @else
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a data-bs-toggle="modal" data-bs-target="#eventedit{{$event->id}}"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #32912b;"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger" onclick="confirmDelete('{{$event->id}}','{{$event->title}}')"><i class="fa fa-trash"></i></button> </a>
                                                </td>
                                            </tr>

                                            <!-- model -->
                                            <div class="modal fade" id="eventedit{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-center model-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Application Event</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="/applicationevent/update" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-xl-6 mt-3">
                                                                        <div class="mb-3">
                                                                            <label class="form-label mb-2">Title<span class="required">*</span></label>
                                                                            <select name="title" required class="default-select form-control wide">
                                                                                <option value="{{$event->title}}" selected>{{$event->title}}</option>
                                                                                <option value="Admission Application">Admission Application</option>
                                                                                <option value="Scholarship Application">Scholarship Application</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <input type="text" name="event_table_id" value="{{$event->id}}" hidden>
                                                                            <label for="exampleFormControlInput2" class="form-label mb-2">Year</label>
                                                                            <input type="text" name="year" value="{{$event->application_year}}" class="form-control" id="" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 mt-3">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput4" class="form-label mb-2">Application open date</label>
                                                                            <input type="date" class="form-control" value="{{$event->open_date}}" id="" name="open_date">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput4" class="form-label mb-2">Application close date</label>
                                                                            <input type="date" class="form-control" id="" value="{{$event->close_date}}" name="close_date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 mt-3">
                                                                        <div class="mb-3">
                                                                            <label class="form-label mb-2">Hostel names<span class="required">*</span></label>
                                                                            <select name="hostels[]" required multiple class="default-select form-control wide">
                                                                                @foreach($hostelnames as $hn)
                                                                                <option value="{{$hn->id}}">{{$hn->hostel_name}} - {{$hn->boys_girls}} - {{$hn->hostel_taluk_district}}</option>
                                                                                @endforeach
                                                                            </select>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection