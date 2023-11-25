@extends('layouts.main')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .user-details {
        padding: 20px;
        border-radius: 5px;
        /* box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.3); */
        width: 100%;
    }

    #container {
        width: 100%;
        height: 100vh;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    var jQuery = $.noConflict();
    jQuery(document).ready(function($) {
        function viewtrustee(id) {
            $.ajax({
                url: "/trusteeview/" + id,
                type: "GET",
                success: function(trustee) {
                    console.log(trustee);
                    $('#trustee_image').attr('src', '/trustee/' + trustee[0].trustee_image);
                    $('#name').html(trustee[0].fullname);
                    $('#name1').html(trustee[0].fullname);
                    $('#desi').html(trustee[0].Designation);
                    var fromDate = new Date(trustee[0].from_date);
                    var year = fromDate.getFullYear();

                    // Display the year in the 'from_date' element
                    $('#from_date').text(year);
                    $('#status').html(trustee[0].trustee_status);
                    $('#about').html(trustee[0].about);

                    $('#quickViewModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + status + ", " + error);
                }
            });
        }

        window.viewtrustee = viewtrustee; // Expose the function in the global scope
    });
</script>

@section('content')
<div class="breadcrumb-bar" style="margin-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="breadcrumb-list">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item">Present trustees</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-2">
                <h2 style="margin-top:-40px;"><b>Board of Trustees</b></h2>
                <div class="row mt-5">
                    @foreach($view as $vi)
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="student-box flex-fill">
                            <div class="student-img">
                                <a>
                                    <img class="img-fluid" alt="Students Info" src="/trustee/{{$vi->trustee_image}}" style="width:300px; height:300px;">
                                </a>
                            </div>
                            <div class="student-content pb-0">
                                <h4>{{$vi->fullname}}</h4>
                                <div class="loc-blk d-flex align-items-center justify-content-center">
                                    <h5>{{$vi->Designation}}</h5>
                                </div>
                                <h6 class="mt-1">{{ \Carbon\Carbon::parse($vi->from_date)->format('Y') }} to {{$vi->trustee_status}}</h6>
                            </div>
                            <div class="all-btn all-category align-items-center text-center mt-4">
                                <button onclick="viewtrustee('{{$vi->id}}')" class="btn btn-primary text-center" data-toggle="modal" data-target=".bd-example-modal-lg">See More</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- model -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="name"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container" id="container">

                <div class="student-img mt-2">
                    <img class="img-fluid" id="trustee_image" alt="Trustees'photo" src="" style="width:400px; height:300px;">
                </div>
                <div class="modal-body">
                    <!-- <table align="center">
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td id="name1"></td>
                    </tr>
                    <tr>
                        <td>
                            Designation :
                        </td>
                        <td id="desi"></td>
                    </tr>
                    <tr>
                        <td>
                            Year :
                        </td>
                        <td id="year"></td>
                    </tr>
                </table> -->

                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="user-details">
                                <dl class="row text-center">
                                    <!-- <dt class="col-sm-4" id="design">Name :</dt> -->
                                    <dd class="col-sm-12" id="name1"></dd>
                                    <dd class="col-sm-12" id="desi"></dd>
                                    <!-- <dt class="col-sm-5" id="design">Year :</dt> -->
                                    <table style="margin-left: 20px;">
                                        <th class="text-right" id="from_date"></th>
                                        <th class="text-center">-</th>
                                        <th class="text-left" id="status"></th>
                                    </table>

                                    <!-- Add more key-value pairs as needed -->
                                </dl>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: -50px;">
                            <div class="user-details">
                                <dl class="row text-center">
                                    <dd class="col-sm-12" id="about"></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-2">
                        Name          :
                    </div>
                    <div class="col-md-6">
                        <h5 id="name1"></h5>
                    </div>
                </div> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection