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
                                                    <button class="btn btn-danger" onclick="confirmDelete('{{$event->id}}','{{$event->title}}')"><i class="fa fa-trash"></i></button> </a>
                                                </td>
                                            </tr>
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