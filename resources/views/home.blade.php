<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('navbar-assets/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('navbar-assets/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('navbar-assets/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('navbar-assets/css/style.css') }}">

    <title>Website Menu #4</title>
</head>

<body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="px-5">
            <div class="row align-items-center position-relative">


                <div class="site-logo">
                    <a href="index.html" class="text-black"><span class="text-primary">ZEA LAUNDRY</a>
                </div>

                <div class="col-12">
                    <nav class="site-navigation text-right ml-auto " role="navigation">

                        <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                            <li><a href="#home-section" class="nav-link">Home</a></li>
                            <li><a href="#services-section" class="nav-link">Services</a></li>


                            <li class="has-children">
                                <a href="#about-section" class="nav-link">About Us</a>
                                <ul class="dropdown arrow-top">
                                    <li><a href="#team-section" class="nav-link">Team</a></li>
                                    <li><a href="#pricing-section" class="nav-link">Pricing</a></li>
                                    <li><a href="#faq-section" class="nav-link">FAQ</a></li>
                                    <li class="has-children">
                                        <a href="#">More Links</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Menu One</a></li>
                                            <li><a href="#">Menu Two</a></li>
                                            <li><a href="#">Menu Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="#why-us-section" class="nav-link">Why Us</a></li>

                            <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                            {{-- <li> --}}
                                <a href="/login" class="nav-link">
                                    <button type="button" class="btn btn-outline-primary">Masuk</button>
                                </a>
                                <a href="/register" class="nav-link">
                                    <button type="button" class="btn btn-primary">Daftar</button>
                                </a>
                            {{-- </li> --}}
                        </ul>
                    </nav>

                </div>

                <div class="toggle-button d-inline-block d-lg-none"><a href="#"
                        class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>

            </div>
        </div>

    </header>

    <script src="{{ asset('navbar-assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('navbar-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('navbar-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('navbar-assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('navbar-assets/js/main.js') }}"></script>
</body>

</html>
