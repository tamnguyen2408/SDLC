<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tune-source</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mixtape template project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"> --}}
    <!-- ... các thẻ link khác ... -->
</head>

<body>

    <div class="super_container">

        <!-- Header -->
      @include('layouts.header')

        <!-- Menu -->

        <div class="menu">
            <div>
                <div class="menu_overlay"></div>
                <div class="menu_container d-flex flex-column align-items-start justify-content-center">
                    <div class="menu_log_reg">
                        <ul class="d-flex flex-row align-items-start justify-content-start">
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
                    </div>
                    <nav class="menu_nav">
                        <ul class="d-flex flex-column align-items-start justify-content-start">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="music.html">Music</a></li>
                            <li><a href="blog.html">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Home -->

       @include('layouts.slide')
        <!-- Featured Album -->

        @include('layouts.featured_album')




        <!-- Artist -->

        @include('layouts.artist')

        <!-- Footer -->

      @include('layouts.footer')
    </div>
    <script src="js/clear_searchbox.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap-4.1.2/popper.js"></script>
    <script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/progressbar/progressbar.min.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    {{-- <script src="plugins/jPlayer/jquery.jplayer.min.js"></script> --}}
    {{-- <script src="plugins/jPlayer/jplayer.playlist.min.js"></script> --}}
    <script src="js/custom.js"></script>
</body>

</html>
