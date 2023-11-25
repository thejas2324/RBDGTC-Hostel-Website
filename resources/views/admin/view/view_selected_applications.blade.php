@extends('admin.layouts.ad_main')

@section('content')
<script>
    function degreefilter() {
        if ($('#filtercolumn').val() == "degree") {
            $('#filter').show();
        } else {
            $('#filter').hide();
        }
    }
    $(document).ready(function() {
        $('#filter').hide();

        $('#filterButton').on('click', function() {
            // Get selected values from the filters
            var pucFilter = $('#pucFilter').val();
            var degreeFilter = $('#degreeFilter').val();
            var dependentFilter = $('#dependentFilter').val();
            var disabilityFilter = $('#disabilityFilter').val();

            var data = {
                "puc": pucFilter,
                "degree": degreeFilter,
                "dependent": dependentFilter,
                "disability": disabilityFilter,
                _token: '{{csrf_token()}}'
            }

            // Send AJAX request to the server with selected filters
            $.ajax({
                url: '/applications/filter', // Replace with your server endpoint
                type: 'post', // or 'GET' depending on your server setup
                data: data,
                success: function(result) {
                    // Update the table with the filtered data
                    console.log(result);
                    var htmldata = "";
                    for (i = 0; i < result.length; i++) {
                        htmldata += `<tr>
                                        <td><span class="text-primary font-w600">${result[i].application_id}</span></td>
                                        <td>
                                            <h6 class="mb-0">${result[i].applicant_name}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].puc_diploma_marks}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].ug_marks}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].dependent_status}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${result[i].disability_status}</h6>
                                        </td>
                                        
                                        <td class="text-center">
                                            <a href="/adminprintadmission/${result[i].s_id}" class="btn btn-success"><i class="fa-solid fa-print fa-lg"></i> Print</a>
                                        </td>
                                    </tr>`;
                    }
                    $('#admission_data_div').html(htmldata);
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        });
    });
</script>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title flex-wrap">
                            <h2 class="mt-1">Selected Admission Applications</h2>
                        </div>
                    </div>
                    <!-- filter -->
                    <div class="row">
                        <div class="col-md-2">
                            <select class="default-select form-control wide mt-3" id="filtercolumn" onchange="degreefilter()">
                                <option value="" disabled selected>Select</option>
                                <option value="puc">PUC</option>
                                <option value="degree">Degree</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select id="pucFilter" multiple class="default-select form-control wide mt-3">
                                <option value="0-100">All</option>
                                <option value="50-60">PUC: 50% - 60%</option>
                                <option value="60-70">PUC: 60% - 70%</option>
                                <option value="70-80">PUC: 70% - 80%</option>
                                <option value="80-90">PUC: 80% - 90%</option>
                                <option value="90-100">PUC: 90% - 100%</option>
                            </select>
                        </div>
                        <div class="col-md-3" id="filter">
                            <select id="degreeFilter" multiple class="default-select form-control wide mt-3">
                                <option value="0-100">All</option>
                                <option value="50-60">Degree: 50% - 60%</option>
                                <option value="60-70">Degree: 60% - 70%</option>
                                <option value="70-80">Degree: 70% - 80%</option>
                                <option value="80-90">Degree: 80% - 90%</option>
                                <option value="90-100">Degree: 90% - 100%</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="dependentFilter" multiple class="default-select form-control wide mt-3">
                                <option value="Both Parent Living">Both Parents Living</option>
                                <option value="Single Parent">Single Parent</option>
                                <option value="Orphan">Orphan</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="disabilityFilter" multiple class="default-select form-control wide mt-3">
                                <option value="Yes">Disability</option>
                                <option value="No">No Disability</option>
                            </select>
                        </div>
                        <div class="col-md-2 mt-3">
                            <button id="filterButton" type="submit" value="submit" class="btn btn-outline-primary me-3">Filter</button>
                        </div>
                    </div>

                    <!--column-->
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                        <div class="table-responsive full-data">
                            <table id="example" class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer">
                                <thead>
                                    <tr>
                                        <!-- <th>image</th> -->
                                        <th>Application ID</th>
                                        <th>Applicant Name</th>
                                        <th>PUC Percentage</th>
                                        <th>Degree Percentage</th>
                                        <th>Parental Status</th>
                                        <th>Disability</th>
                                        <th>Status</th>
                                        <th class="text-end">Print</th>
                                    </tr>
                                </thead>
                                <tbody id="admission_data_div">
                                    <!-- code -->
                                    @foreach($data as $dt)
                                    <tr>
                                        <!-- <td>
                                            <div class="trans-list">
                                                <img src="/admissions/applicant_images/{{$dt->applicant_image}}" alt="" class="avatar avatar-sm me-3">
                                                <h4></h4>
                                            </div>
                                        </td> -->
                                        <td><span class="text-primary font-w600">{{$dt->application_id}}</span></td>
                                        <td>
                                            <h6 class="mb-0">{{$dt->applicant_name}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$dt->puc_diploma_marks}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$dt->ug_marks}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$dt->dependent_status}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$dt->disability_status}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                {{$dt->status}}
                                            </h6>
                                        </td>
                                        <td class="text-center">
                                            <a href="/adminprintadmission/{{$dt->s_id}}" class="btn btn-success"><i class="fa-solid fa-print fa-lg"></i> Print</a>
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
@endsection