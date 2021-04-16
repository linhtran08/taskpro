<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Task Pro</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('js/vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('js/vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('js/vendors/images/favicon-16x16.png') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Component -->
    <x-style-common />
    <link rel="stylesheet" href="{{ asset('js/plugins/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>
<body id="tv_login" class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="{{ asset('images/deskapp-logo.svg') }} " alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7" data-aos="fade-right">
                    <img src="{{ asset('js/vendors/images/login-page-img.png') }}" alt="">
                </div>
                <div class="col-md-6 col-lg-5" data-aos="fade-left">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Task Pro</h2>
                        </div>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
{{--                            <div class="select-role">--}}
{{--                                <div class="btn-group btn-group-toggle" data-toggle="buttons">--}}
{{--                                    <label class="btn active">--}}
{{--                                        <input type="radio" name="options" id="admin">--}}
{{--                                        <div class="icon"><img src="{{ asset('js/vendors/images/briefcase.svg') }}" class="svg" alt=""></div>--}}
{{--                                        <span>I'm</span>--}}
{{--                                        Manager--}}
{{--                                    </label>--}}
{{--                                    <label class="btn">--}}
{{--                                        <input type="radio" name="options" id="user">--}}
{{--                                        <div class="icon"><img src="{{ asset('js/vendors/images/person.svg') }}" class="svg" alt=""></div>--}}
{{--                                        <span>I'm</span>--}}
{{--                                        Employee--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="input-group custom">
                                <input type="text" name="emp_id" class="form-control form-control-lg" placeholder="Email"
                                value="{{ old('emp_id') }}">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom text-danger">
                                @error('emp_id')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
{{--                            <div class="row pb-30">--}}
{{--                                <div class="col-6">--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
{{--                                        <label class="custom-control-label" for="customCheck1">Remember</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-6">--}}
{{--                                    <div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="input-group custom text-danger">
                                @if(session('status'))
                                    {{ session('status') }}
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <!--
                                            use code for form submit
                                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                        -->
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
{{--                                        <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a>--}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
            <h1>Welcome to TaskPro</h1>
            <h2>We are team of talented designers making Task Management Application</h2>
            <a href="#about" class="btn-get-started">Get Started</a>
        </div>
    </section><!-- End Hero Section -->

    <!-- ======= About Section ======= -->
    <section id="about">
        <div class="container" data-aos="fade-up">
            <div class="row about-container">

                <div class="col-lg-6 content order-lg-1 order-2">
                    <h2 class="title">Few Words About Us</h2>
                    <p>
                        TaskPro delivers digital workflows that create great experiences and unlock productivity. This is the future of work.
                        Behind every great experience is a great workflow.
                    </p>

                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                        <h4 class="title"><a href="">Deliver ITSM on a single platform</a></h4>
                        <p class="description">Use built-in best practices to rapidly consolidate disparate tools to a single system of action in the cloud. Harness your shared data and analytics with the most trusted IT service workflows.</p>
                    </div>

                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fa fa-photo"></i></div>
                        <h4 class="title"><a href="">Improve IT productivity</a></h4>
                        <p class="description">Boost agent efficiency with AI-assisted recommendations and automatically assign incidents to the correct resolution team.</p>
                    </div>

                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="fa fa-bar-chart"></i></div>
                        <h4 class="title"><a href="">Create resilient service experiences</a></h4>
                        <p class="description">Shape service experiences for employees anywhere, with always-on IT services. Automate support for common requests with virtual agents that understand simple, human language.</p>
                    </div>

                </div>

                <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
        <div class="container">
            <div class="row" data-aos="zoom-in">
{{--                <div class="col-lg-9 text-center text-lg-left">--}}
{{--                    <h3 class="cta-title">Call To Action</h3>--}}
{{--                    <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 cta-btn-container text-center">--}}
{{--                    <a class="cta-btn align-middle" href="#">Call To Action</a>--}}
{{--                </div>--}}
            </div>

        </div>
    </section>
    <!-- End Call To Action Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Team</h3>
                <p class="section-description">4 young members from all walks of life have gathered here for this project</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="pic"><img src="{{ asset('images/login/trung_ava.jpg') }}" alt=""></div>
                        <h4>Trung Nguyen</h4>
                        <span>Team leader</span>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <div class="pic"><img src="{{ asset('images/login/team-2.jpg') }}" alt=""></div>
                        <h4>Linh Tran</h4>
                        <span>Team member</span>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member" data-aos="fade-up" data-aos-delay="300">
                        <div class="pic"><img src=" {{ asset('images/login/team-3.jpg') }}" alt=""></div>
                        <h4>Nhung Phan</h4>
                        <span>Team member</span>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member" data-aos="fade-up" data-aos-delay="400">
                        <div class="pic"><img src=" {{ asset('images/login/team-4.jpg') }}" alt=""></div>
                        <h4>Nam Nguyen</h4>
                        <span>Team member</span>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">Contact</h3>
                <p class="section-description">Please contact us under below form</p>
            </div>
        </div>

        <!-- Uncomment below if you wan to use dynamic maps -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1385.6873264808733!2d106.6664137272078!3d10.787120946489539!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd2ecb62e0d050fe9!2sFPT-Aptech%20Computer%20Education%20HCM!5e0!3m2!1svi!2s!4v1616612789196!5m2!1svi!2s" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="container mt-5">
            <div class="row justify-content-center">

                <div class="col-lg-3 col-md-4">

                    <div class="info">
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p>CMT8 Street<br>HO CHI MINH</p>
                        </div>
                        <div>
                            <i class="fa fa-envelope"></i>
                            <p>taskpro@pro.vn</p>
                        </div>

                        <div>
                            <i class="fa fa-phone"></i>
                            <p>0909999999</p>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-5 col-md-8">
                    <div class="form">
{{--                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">--}}
                        <form action="{{ route('login') }}" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Task Pro</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
              -->
                Designed by <a href="https://bootstrapmade.com/">Task Pro Team</a>
            </div>
        </div>
    </footer><!-- End Footer -->


    <a href="#" class="tv-back-to-top"><i class="fa fa-chevron-up"></i></a>


    <!-- js -->
    <script src="{{ asset('js/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('js/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('js/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('js/vendors/scripts/layout-settings.js') }}"></script>

    <script src="{{ asset('js/plugins/aos/aos.js') }}"></script>
    <script src="{{ asset('js/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/components/login.js') }}"></script>
</body>
</html>


