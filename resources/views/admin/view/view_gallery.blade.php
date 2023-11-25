@extends('admin.layouts.ad_main')
<script>
    function confirmDelete(id, photo_name) {
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
                location.href = "/deletephoto/" + id;
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
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title">
                    <h2 class=" mt-1">Event Photos</h2>
                    <div>
                        <a href="/addgallery" class="btn btn-primary">
                            + New Photo
                        </a>
                    </div>
                </div>
            </div>
            @foreach($images as $image)
            <div class="col-xl-3 wow fadeInUp" data-wow-delay="1.5s">
                <div class="table-responsive full-data">
                    <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer" id="tableId">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>Event</th>
                                <th>Date</th>
                                <th>About</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- code -->
                            <tr>
                                <td>
                                    <div class="trans-list">
                                        <img style="width: 200px; height:150px" src="/photos/{{$image->photo}}" alt="">
                                    </div>
                                    <button class="btn btn-danger mt-2" style="margin-left: 70px;" onclick="confirmDelete('{{$image->id}}','{{$image->photo_name}}')">Delete</button> </a>
                                </td>
                                <td>
                                    <div class="date">{{$image->date}}</div>
                                </td>
                                <td>
                                    <div class="mb-0">{{$image->photo_name}}</div>
                                </td>
                                <td>
                                    <div class="mb-0">{{$image->about}}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection