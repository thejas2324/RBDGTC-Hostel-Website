<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title Here -->
    <title>Forget password</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="{{ asset('adminassets/css/style.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#passwordfield').hide();
            $('#update').hide('fast');

            $('#continue').on('click', function() {
                // Get selected values from the filters
                var fullname = $('#fullname').val();
                var email = $('#email').val();
                var usertype = $('#usertype').val();

                var data = {
                    "fullname": fullname,
                    "email": email,
                    "usertype": usertype,
                    _token: '{{csrf_token()}}'
                }

                // Send AJAX request to the server with selected filters
                $.ajax({
                    url: '/adminforgetpassword', // Replace with your server endpoint
                    type: 'post', // or 'GET' depending on your server setup
                    data: data,
                    success: function(result) {
                        // Update the table with the filtered data
                        console.log(result);
                        if (result.length > 0) {
                            $('#passwordfield').show('fast');
                            $('#errormessage').html('');
                            $('#continue').hide('fast');
                            $('#update').show('fast');
                        } else {
                            $('#passwordfield').hide('fast');
                            $('#errormessage').html('Name, Email ID and Usertype does not matching');
                            $('#continue').show('fast');
                            $('#update').hide('fast');
                        }
                    },
                    error: function() {
                        alert('Error fetching data');
                    }
                });
            });
        });
    </script>
</head>

<body class="body  h-100">

    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-aside text-center  d-flex flex-column flex-row-auto">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <div class="text-center mb-lg-4 mb-2 pt-5 logo">
                    <img src="assets/img/thotadappa/logo4.png" alt="logo" style="width: 200px;">
                </div>
            </div>
        </div>
        <div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex justify-content-center h-100 align-items-center">
                <div class="authincation-content style-2">
                    <div class="row no-gutters">
                        <div class="col-xl-12 tab-content">
                            <div id="sign-up" class="auth-form tab-pane fade show active  form-validation">
                                <form method="post" action="/adminresetpassword">
                                    @csrf
                                    <div class="text-center mb-4">
                                        <h3 class="text-center mb-2 text-black">Forget Password!</h3>
                                        <a href="/adminlogin">Back to LogIn</a>
                                        <p class="text-danger" id="errormessage"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Fullname</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Fullname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Email ID</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email ID">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">User Type</label>
                                        <input type="text" class="form-control" id="usertype" name="usertype" placeholder="Enter User Type">
                                    </div>
                                    <div class="mb-3" id="passwordfield">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Set new Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                    </div>
                                    <input type="button" class="btn btn-block btn-primary" id="continue" value="Continue">
                                    <input type="submit" class="btn btn-block btn-primary" id="update" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>

</body>

</html>