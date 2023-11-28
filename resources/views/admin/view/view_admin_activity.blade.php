@extends('admin.layouts.ad_main')

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
                            <h3 class="card-title">Admin Activity</h3>
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email ID</th>
                                                <th>Login Time</th>
                                                <th>Action Time</th>
                                                <th>Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($activity as $ac)
                                            <tr>
                                                <td>
                                                    <div class="trans-list">
                                                        <img src="/admin_photos/{{$ac->image}}" alt="" class="avatar avatar-sm me-3">
                                                        <h4></h4>
                                                    </div>
                                                </td>
                                                <td>{{$ac->name}}</td>
                                                <td>{{$ac->email_id}}</td>
                                                <td>{{$ac->login_time}}</td>
                                                <td>{{$ac->activity_time}}</td>
                                                <td>{{$ac->activity}}</td>
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