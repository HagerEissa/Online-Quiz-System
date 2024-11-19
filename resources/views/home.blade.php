@extends('layouts.app')

@section('content')
        <!-- End of Navbar -->

    <!-- Start of loading page -->
    <div id="loading-screen">
        <div id="loading-content">
            <div id="loading-spinner"></div>
            <h2>Loading QuizMaster...</h2>
        </div>
    </div>

    <!-- Background video during loading -->
    <video id="background-video" autoplay muted loop style=" fixed; width: 100%; height: 100%; object-fit: cover;">
        <source src="./Assets/Videos/v2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
        <!-- Carousel -->
    <div id="content" style="display: none;">
        <div style="margin-top: 60px;" id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- First Slide -->
                <div class="carousel-item active">
                    <img src="./Assets/Images/p1.jpg" class="d-block w-100" alt="First Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Blast Off into the World of Numbers</h5>
                        <p>Challenge your math skills with quizzes that take you from basic arithmetic to complex
                            calculus.</p>
                    </div>
                </div>
                <!-- Second Slide -->
                <div class="carousel-item">
                    <img src="./Assets/Images/p2.jpg" class="d-block w-100" alt="Second Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Explore the Universe of Science</h5>
                        <p>From biology to physics, dive into science quizzes that will test your understanding of the
                            natural world.</p>
                    </div>
                </div>
                <!-- Third Slide -->
                <div class="carousel-item">
                    <img src="./Assets/Images/p3.jpg" class="d-block w-100" alt="Third Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Travel Through Time with History</h5>
                        <p>Test your knowledge of historical events, from ancient civilizations to modern times.</p>
                    </div>
                </div>
                <!-- Fourth Slide -->
                <div class="carousel-item">
                    <img src="./Assets/Images/p4.jpg" class="d-block w-100" alt="Fourth Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Journey Through the Stars of Literature</h5>
                        <p>Dive into the world of literature with quizzes on famous authors, literary genres, and
                            classic works.</p>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    

        <!-- About Us Section -->
        <section style="background-color: #edf2f2; margin-top: -70px;" id="about" class="parallax-section py-5">
            <div class="container d-flex align-items-center">
                <div class="text-section" data-aos="fade-right">
                    <h2>About Us</h2>
                    <p
                        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                        "Our online quiz platform is designed to provide an engaging and interactive learning
                        experience,
                        enabling users to test
                        their knowledge across a variety of topics. With features like personalized score tracking,
                        performance history, and
                        insightful reports, our system empowers both learners and educators to track progress and
                        achieve their learning goals.
                        Built with advanced technology and a user-friendly interface, our platform offers a seamless
                        experience for both
                        administrators and users alike."</p>
                </div>
                <div class="image-section" data-aos="fade-left">
                    <img src="./Assets/Images/pexels-leeloothefirst-5428830.webp" alt="About Image" class="img-fluid">
                </div>
            </div>
        </section>
        <!-- end of About Us Section -->

        <!-- Categories Section -->
        <section style="background-color: #edf2f2; margin-top: 0px; " id="categories" class="py-5">
            <div class="container text-center">
                <h2>Categories</h2>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="category">
                            <i class='bx bxl-html5'></i>
                            <span style="font-family: 'Roboto Slab', serif; font-weight: 700;">Front-End</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category">
                            <i class='bx bx-brain'></i>
                            <span style="font-family: 'Roboto Slab', serif; font-weight: 700;">Artificial
                                inalligence</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category">
                            <i class='bx bxl-flutter'></i>
                            <span style="font-family: 'Roboto Slab', serif; font-weight: 700;">Mobil App</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category">
                            <i class='bx bxl-php'></i>
                            <span style="font-family: 'Roboto Slab', serif; font-weight: 700;">Back-End</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of Categories Section -->

        <!-- Blog Section -->
        <section style="background-color: #edf2f2; margin-top: 0px;" id="blogs" class="py-5">
            <div class="container text-center">
                <h2>Latest Blogs</h2>
                <div class="row mt-4">
                    <div class="col-md-4 mb-4">
                        <article class="blog-post">
                            <img src="./Assets/Images/1.jpg" alt="Blog 1" class="img-fluid rounded">
                            <h3>How to Improve Your Web development Skills</h3>
                            <p>Discover tips and techniques to boost your Web understanding and ace those
                                quizzes!</p>
                        </article>
                    </div>
                    <div class="col-md-4 mb-4">
                        <article class="blog-post">
                            <img src="./Assets/Images/istockphoto-1518485475-612x612.webp" alt="Blog 2"
                                class="img-fluid rounded">
                            <h3>The AI Behind Effective Studying</h3>
                            <p>Learn how to apply AI principles to make your study sessions more productive.</p>
                        </article>
                    </div>
                    <div class="col-md-4 mb-4">
                        <article class="blog-post">
                            <img src="./Assets/Images/3.jpg" alt="Blog 3" class="img-fluid rounded">
                            <h3>Mobile App’s Greatest Inventions</h3>
                            <p>Explore the inventions that changed the course of Mobile App and continue to influence
                                our
                                world today.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of Blog Section -->

        <!-- Start Service Area -->
        <section style="background-color: #edf2f2;" class="services section">
            <div style=" margin-top: -33px;" class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <div style="margin-bottom: -10px;" class="section-title">
                            <h2 style="text-align: center; margin-top: 10px;" class="wow fadeInUp" data-wow-delay=".4s">
                                Our Services</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                            <div class="serial">
                                <span><i class="fas fa-code"></i></span>
                            </div>
                            <h3><a style="text-decoration: none;" href="service-single.html">Web Solution</a></h3>
                            <p style="font-family: sans-serif;">Need A Project Completed By An
                                Expert? Let’s Go! Access A Human Resources Consultant To
                                Answer Questions
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".3s">
                            <div class="serial">
                                <span><i class="fas fa-paint-brush"></i></span>
                            </div>
                            <h3><a style="text-decoration: none;" href="service-single.html">Graphics Design</a></h3>
                            <p style="font-family: sans-serif;">Need A Project Completed By An
                                Expert? Let’s Go! Access A Human Resources Consultant To
                                Answer Questions
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".4s">
                            <div class="serial">
                                <span><i class="fas fa-mobile-alt"></i></span>
                            </div>
                            <h3><a style="text-decoration: none;" href="service-single.html">UI/UX Design</a></h3>
                            <p style="font-family: sans-serif;">Need A Project Completed By An
                                Expert? Let’s Go! Access A Human Resources Consultant To
                                Answer Questions
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".5s">
                            <div class="serial">
                                <span><i class="fas fa-lightbulb"></i></span>
                            </div>
                            <h3><a style="text-decoration: none;" href="service-single.html">Strategy & Research</a>
                            </h3>
                            <p style="font-family: sans-serif;">Need A Project Completed By An
                                Expert? Let’s Go! Access A Human Resources Consultant To
                                Answer Questions
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".6s">
                            <div class="serial">
                                <span><i class="fas fa-search"></i></span>
                            </div>
                            <h3><a style="text-decoration: none;" href="service-single.html">SEO & Marketing</a></h3>
                            <p style="font-family: sans-serif;">Need A Project Completed By An
                                Expert? Let’s Go! Access A Human Resources Consultant To
                                Answer Questions
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".7s">
                            <div class="serial">
                                <span><i class="fas fa-chart-line"></i></span>
                            </div>
                            <h3><a style="text-decoration: none;" href="service-single.html">Growth Tracking</a></h3>
                            <p style="font-family: sans-serif;">Need A Project Completed By An
                                Expert? Let’s Go! Access A Human Resources Consultant To
                                Answer Questions
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /End Services Area -->


        <!-- How to Use and Contact Us Sections -->
        <section style="background-color: #edf2f2; margin-top: 0px;" id="how-to-contact" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">How to Use QuizMaster</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-4">
                        <div class="step">
                            <i class="fas fa-user-plus"></i>
                            <h5>Sign Up or Login</h5>
                            <p style="font-family: sans-serif; font-size: revert;">Create an account or log in to access
                                our quizzes.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="step">
                            <i class="fas fa-th-list"></i>
                            <h5>Browse Categories</h5>
                            <p style="font-family: sans-serif; font-size: revert;">Explore our diverse range of quiz
                                categories.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="step">
                            <i class="fas fa-trophy"></i>
                            <h5>Complete Quizzes</h5>
                            <p style="font-family: sans-serif; font-size: revert;">Take quizzes, track progress, and
                                improve your skills!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="contact_us_2">
            <div class="responsive-container-block big-container">
              <div class="blueBG">
              </div>
              <div class="responsive-container-block container">
                <form class="form-box">
                  <div class="container-block form-wrapper">
                    <p class="text-blk contactus-head">
                      Contact Us
                    </p>
                    <p class="text-blk contactus-subhead">
                      Feel Free To Talk With Us
                    </p>
                    <div class="responsive-container-block">
                      <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6" id="i10mt">
                        <p class="text-blk input-title">
                          FIRST NAME
                        </p>
                        <input class="input" id="ijowk" name="FirstName" placeholder="Please enter first name...">
                      </div>
                      <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                        <p class="text-blk input-title">
                          LAST NAME
                        </p>
                        <input class="input" id="indfi" name="Last Name" placeholder="Please enter last name...">
                      </div>
                      <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                        <p class="text-blk input-title">
                          EMAIL
                        </p>
                        <input class="input" id="ipmgh" name="Email" placeholder="Please enter email...">
                      </div>
                      <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                        <p class="text-blk input-title">
                          PHONE NUMBER
                        </p>
                        <input class="input" id="imgis" name="PhoneNumber" placeholder="Please enter phone number...">
                      </div>
                      <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i634i">
                        <p class="text-blk input-title">
                          WHAT DO YOU HAVE IN MIND
                        </p>
                        <textarea class="textinput" id="i5vyy" placeholder="Please enter query..."></textarea>
                      </div>
                    </div>
                    <button class="submit-btn">
                      Submit
                    </button>
                  </div>
                  <div class="social-media-links">
                    <a href="#" id="ix94i-2">
                      <img class="link-img" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-twitter.png">
                    </a>
                    <a href="#">
                      <img class="link-img" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-facebook.png">
                    </a>
                    <a href="#">
                      <img class="link-img" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-google.png">
                    </a>
                    <a href="#" id="izldf-2">
                      <img class="link-img" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-instagram.png">
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>



          <footer style="background-color: #f2f4f7;" class="footer">
            <!-- Start Middle Top -->
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-12">
                            <!-- Single Widget -->
                            <div class="f-about single-footer">
                                <div class="logo">
                                    <a class="navbar-brand" href="#">
                                        <i class="fas fa-brain" style="color: #5BC0BE !important; font-size: 35px;"></i>
                                        <!-- Changed to a working icon -->
                                        Quizify
                                    </a>
                                </div>
                                <p style="font-family: sans-serif; font-size: revert;">no one belives in you lost agian
                                    and agian and agian the lights are cut off but you
                                    still looking for at the dreams
                                    reivew every day and say your self it is not over until i win.</p>
                                <div style="margin-top: 20px; position: relative; left: -25px;" class="footer-social">
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
    
                                        <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-5 col-md-7 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-6">
                                    <!-- Single Widget -->
                                    <div class="single-footer f-link">
                                        <h3>Company</h3>
                                        <ul style="font-family: sans-serif; font-size: revert;">
                                            <li><a href="#">About Comapny</a></li>
                                            <li><a href="#">World Wide Clients</a></li>
                                            <li><a href="#">Happy People’s</a></li>
                                            <li><a href="#">Winning Awards</a></li>
                                            <li><a href="#">Company Statics</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                    <!-- End Single Widget -->
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <!-- Single Widget -->
                                    <div class="single-footer f-contact f-link">
                                        <h3>Contact Us</h3>
                                        <p style="font-family: sans-serif; font-size: revert;">Untrammelled & nothing
                                            preven our being able</p>
                                        <ul class="footer-contact">
                                            <li><i class="fa-solid fa-phone"></i><a href="#">01118551826</a></li>
                                            <li><i class="fa-regular fa-envelope"></i> <a
                                                    href="mailto:support@gmail.com">support@gmail.com</a></li>
                                            <li><i class="fa-solid fa-location-dot"></i> Egypt_Cairo </li>
                                            <li><i class="fa-solid fa-globe"></i><a href="#">www.Quizify.com</a></li>
                                        </ul>
                                    </div>
                                    <!-- End Single Widget -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer gallery">
                                <h3>Instagram Feed</h3>
                                <ul class="list">
                                    <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151427_m.jpg')}}">
                                    <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151428_m.jpg')}}">
                                    <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151429_m.jpg')}}">
                                    <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151430_m.jpg')}}">
                                    <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151431_m.jpg')}}">
                                    <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151428_m.jpg')}}">
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Footer Middle -->
        </footer>
        <!-- end of How to Use and Contact Us Sections -->

       @endsection