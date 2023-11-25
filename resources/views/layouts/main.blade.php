<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RBDGTC</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.svg">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="/assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="/assets/plugins/slick/slick-theme.css">

    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/assets/plugins/swiper/css/swiper.min.css">

    <link rel="stylesheet" href="/assets/plugins/aos/aos.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function bachelors() {
            if ($("#bachelor_status").val() == "Yes") {
                // If "Yes" is selected, show the related fields
                $("#bachelor_fields").show();
                $("#upload_marks_card").show();
                $("#masters").show();
            } else {
                // If "No" is selected, hide the related fields
                $("#bachelor_fields").hide();
                $("#upload_marks_card").hide();
                $("#masters").hide();
            }
        }

        function masters() {
            if ($("#masters_status").val() == "Yes") {
                // If "Yes" is selected, show the related fields
                $("#masters_fields").show();
                $("#upload_masters_card").show();

            } else {
                // If "No" is selected, hide the related fields
                $("#masters_fields").hide();
                $("#upload_masters_card").hide();
            }
        }
        $(document).ready(function() {
            // Initially hide the fields
            $("#bachelor_fields").hide();
            $("#upload_marks_card").hide();
            // Detect changes in the dropdown
            $("#masters_fields").hide();
            $("#upload_masters_card").hide();
            $("#masters").hide();
        });
    </script>

    <style>
        #video-container {
            display: none;
        }

        .tab-indent {
            text-indent: 60px;
        }

        .justified-text {
            text-align: justify;
        }


        @media (max-width: 767px) {
            #img {
                width: 120px;
                height: auto;
            }
        }

        @media(min-width: 768px) {
            #img {
                max-width: 150px;
                height: auto;
            }

            #img1 {
                height: 100%;
                width: 100%;
                margin-top: 100px;
            }
        }

        .cap {
            margin-top: -20px;
        }

        .marquee-container {
            width: 300px;
            /* Set the width of the marquee container */
            overflow: hidden;
            /* Hide the overflow to create the scrolling effect */
        }

        /* Style the marquee text when it's not being hovered */
        marquee {
            width: 100%;
        }

        /* Style the marquee text when it's being hovered */
        marquee:hover {
            animation-play-state: paused;
            /* Pause the animation on hover */
        }
    </style>
    <style>
        /* Add custom CSS for mobile view */
        @media (max-width: 768px) {
            .testimonial-image img {
                max-width: 100%;
                /* Make images full-width on mobile screens */
                height: auto;
                /* Maintain aspect ratio */
            }
        }
    </style>


</head>

<body>

    <div class="main-wrapper">

        @include('layouts.header')


        @yield('content')


        @include('layouts.footer')
    </div>

    <script>
        const playVideoLink = document.getElementById('play-video-link');
        const videoContainer = document.getElementById('video-container');

        playVideoLink.addEventListener('click', function(event) {
            event.preventDefault();
            videoContainer.style.display = 'block';
        });
    </script>

    <script>
        var marquee = document.getElementById("myMarquee");

        // Add an event listener to pause the marquee on hover
        marquee.addEventListener("mouseover", function() {
            marquee.stop();
        });

        // Add an event listener to resume the marquee when not hovered
        marquee.addEventListener("mouseout", function() {
            marquee.start();
        });
    </script>



    <script data-cfasync="false" src="/assets/js/email-decode.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/owl.carousel.min.js"></script>

    <script src="/assets/plugins/aos/aos.js"></script>

    <script src="/assets/js/jquery.waypoints.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>

    <script src="/assets/plugins/select2/js/select2.min.js"></script>

    <script src="/assets/plugins/slick/slick.js"></script>

    <script src="/assets/plugins/swiper/js/swiper.min.js"></script>

    <script src="/assets/js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>