<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title Here -->
    <title>Student login</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="{{ asset('adminassets/css/style.css')}}" rel="stylesheet">

</head>

<body class="body  h-100">

    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-aside text-center  d-flex flex-column flex-row-auto">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <div class="text-center mb-lg-4 mb-2 pt-5 logo">
                    <img src="assets/img/thotadappa/logo4.png" alt="logo" style="width: 200px;">
                </div>
                <h3 class="mb-2 text-white">Welcome back</h3>
            </div>

        </div>
        <div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex justify-content-center h-100 align-items-center">
                <div class="authincation-content style-2">
                    <div class="row no-gutters">
                        <div class="col-xl-12 tab-content">
                            <div id="sign-up" class="auth-form tab-pane fade show active  form-validation">
                                <form method="post" action="/studentlogin_check">
                                    @csrf
                                    <div class="text-center mb-4">
                                        <h3 class="text-center mb-2 text-black">Sign In</h3>
                                        <a href="/">Back to home</a>

                                    </div>
                                    @if(session('warning'))
                                    <div class="alert alert-warning alert-dismissible fade show">
                                        {{session('warning')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Aadhar Number</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="Enter Aadhar number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Password</label>
                                        <input type="password" class="form-control" id="exampleFormControlInput2" name="password" placeholder="Enter Password">
                                    </div>
                                    <a href="/studentforgetpassword" class="text-primary float-end mb-4">Forgot Password ?</a>
                                    <input type="submit" class="btn btn-block btn-primary" value="Log In">
                                </form>
                                <div class="new-account mt-3 text-center">
                                    <p class="font-w500">New User? <a class="text-primary" href="/studentregister" data-toggle="tab">Register</a></p>
                                </div>
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