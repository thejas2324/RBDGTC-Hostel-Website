<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title Here -->
    <title>Student Register</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="{{ asset('adminassets/css/style.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<script>
    function validate_aadhar(mobile) {
        var pattern = /^[0-9]+$/;
        if (!pattern.test(mobile) || mobile.length != 12) {
            return false;
        }
        return true;
    }

    function validate_name(name) {
        var namePattern = /^[a-zA-Z\s]+$/;
        if (!namePattern.test(name)) {
            return false;
        }
        return true;
    }

    function validate_password(password) {
        var minLength = 8; // At least one password length
        var hasUppercase = /[A-Z]/.test(password); // At least one uppercase letter
        var hasLowercase = /[a-z]/.test(password); // At least one lowercase letter
        var hasDigit = /[0-9]/.test(password); // At least one digit
        var hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(password); // At least one special character

        // Check if the password meets all criteria
        if (password.length >= minLength && hasUppercase && hasLowercase && hasDigit && hasSpecialChar) {
            return true;
        }
        return false;
    }
    $(document).ready(function() {
        $('.error-message').hide('fast');
        $('#register').click(function() {
            $('.error-message').hide('fast');
            let name = $('#name').val();
            let aadhar = $('#aadhar').val();
            let password = $('#password').val();
            if (name == '') {
                $('#name').focus();
                $('#name-error').html('Please enter the Name');
                $('#name-error').show('fast');
            } else if (!validate_name(name)) {
                $('#name').focus();
                $('#name-error').html('Numbers and Special Characters are not allowed.');
                $('#name-error').show('fast');
            } else if (!validate_aadhar(aadhar)) {
                $('#aadhar').focus();
                $('#aadhar-error').html('Invalid Aadhar Number');
                $('#aadhar-error').show('fast');
            } else if (!validate_password(password)) {
                $('#password').focus();
                $('#password-error').html('Password is not valid. Please follow the password requirements.');
                $('#password-error').append('At least 8 Characters. At least one Special Character, one digit, one Uppercase, one Lowercase');
                $('#password-error').show('fast');
            } else {
                $('#registerform').submit();
            }
        })
    });
</script>

<body class="body  h-100">
    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-aside text-center  d-flex flex-column flex-row-auto">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <div class="text-center mb-lg-4 mb-2 pt-5 logo">
                    <img src="assets/img/thotadappa/logo4.png" alt="logo" style="width: 200px;">
                </div>

                <!-- <p class="mb-4">To download application PDF</p> -->
            </div>

        </div>
        <div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex justify-content-center h-100 align-items-center">
                <div class="authincation-content style-2">
                    <div class="row no-gutters">
                        <div class="col-xl-12 tab-content">
                            <div id="sign-up" class="auth-form tab-pane fade show active  form-validation">
                                <form method="post" action="/studentregister_check" id="registerform">
                                    @csrf
                                    <div class="text-center mb-4">
                                        <h3 class="text-center mb-2 text-black">Register</h3>
                                        <a href="/">Back to home</a>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Student name</label>
                                        <input type="text" class="form-control" id="name" name="studentname" placeholder="Enter Student name" required>
                                        <div class="error-message text-danger" id="name-error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Aadhar Number</label>
                                        <input type="text" class="form-control" id="aadhar" name="aadhar" placeholder="Enter Aadhar number" maxlength="12" format="1234 1234 1234" required>
                                        <div class="error-message text-danger" id="aadhar-error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                        <div class="error-message text-danger" id="password-error"></div>
                                    </div>

                                    <button type="button" id="register" name="register" class="btn btn-block btn-primary">Register</button>
                                </form>
                                <div class="new-account mt-3 text-center">
                                    <p class="font-w500">Already have an account? <a class="text-primary" href="/studentlogin" data-toggle="tab">Sign in</a></p>
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