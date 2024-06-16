<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Company Safety Reporting</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="{{asset('assets/images/iconk3.png')}}">

    <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <!-- ======= Top Bar 
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
        </div>
    </div> ======= -->

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="">CSR<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#procedures">Procedures</a></li>
                    <li><a href="{{url('user/report/add')}}">Report</a></li>
                    <li><a href="{{url('admin/login')}}">Admin</a></li>


                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1><span>Company Safety Reporting</spa>
            </h1>
            <h2>Drop your problem report here, we'll process it quickly.</h2>
            <a href="{{url('user/report/add')}}" class="btn btn-primary btn-lg">Report</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="procedures" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">1. Write a Report</a></h4>
                            <p class="description">Write your complaint report clearly.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">2. Verification Process</a></h4>
                            <p class="description">Wait until your report is verified.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">3. Follow up</a></h4>
                            <p class="description">Your report is being followed up.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">4. Done</a></h4>
                            <p class="description">The complaint report has been prosecuted.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Featured Services Section -->





    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">




        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Ogie Kukuh Y</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                Designed by <a href="#">Ogie Kukuh Y</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>

</html>