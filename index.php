<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ITilria - Home of Website development and Software services that you can trust</title>
  <meta content="Home of Website development and Software services that you can trust. Our goal lies in creating crucial software solutions that deliver efficiency, creating secure proprietary softwares" name="description" />
  <meta name="keywords" content="custom software development company, php development, java development, south africa, enteprise, commerce, ITilria, itilria, desktop application development, website development, website design, graphic design, mobile application development" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!--CSS File Link -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/desktop_main.css" media="(max-width: 1449px) and (min-width: 769px)" type="text/css">
  <link rel="stylesheet" href="./assets/css/mobile_ip6_main.css" media="(max-width: 768px) and (min-width: 415px)" type="text/css">
  <link rel="stylesheet" href="./assets/css/mobile_main.css" media="(max-width: 414px) and (min-width: 100px)" type="text/css">
</head>

<body>
<?php

  if(isset($_SESSION['success_message']) && !empty($_SESSION['success_message']))
  {
    ?>
    <div id='mail-success'>
      <?php echo $_SESSION['message']; ?>
    </div>
    <script type="text/javascript">
      setTimeout(function(){
        document.getElementById("mail-success").style.display = "block";
      }, 1500);

      setTimeout(function(){
        document.getElementById("mail-success").style.display = "none";
      }, 20000);
    </script>
    <?php
    unset($_SESSION['message']);
    unset($_SESSION['success_message']);
  }

  if(isset($_SESSION['error_message']) && !empty($_SESSION['error_message']))
  {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    unset($_SESSION['error_message']);
  }
?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
 
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h2 class="text-light"><a href="index.php"><span>ITilria</span></a></h2>

      </div>
      <!--Start of navbar -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="./index.php">Home</a></li>
          <li><a href="./about.html">About</a></li>
          <li><a href="./services.html">Services</a></li>
          <li><a href="./team.html">Team</a></li>
          <li><a href="./contact.php">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!--End of navbar -->

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero No Slider Section ======= -->
  <section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1>Powerful Software Solutions With ITilria</h1>
          <p><strong>Home of Website development and Software services that you can trust</strong></p>
          <a href="" class="btn-get-started ">Read More</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero No Slider Section -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    
    <section class="services">
    <div id="services-header">HOW MAY WE HELP YOU!</div>
    
    <!-- learn more modal box -->
    <div id="close-lm-modal">X</div>
    <div id="learn-more-modal">
      <h2 id="service-title">Web Design</h2>
      <div>
        <p>RATE</p>
        <p id="service-rate">R30/hr</p>
      </div>
      <div class="b-c-d"><button id="contactus_btn">Contact Us</button></div>
      
      <div class="b-c-d"><button id="a-s">Add another Service</button></div>
    </div>  
    


    <!-- This section enables a client to select multiple services-->
   <div id="services-select">
   <div id="header-panel"><center><h2>Add Another Service</h2></center></div>
   <div id="as-main">
    <ul id="as-main-ul">
      <li>
        <div class="label-add"><label for="web-development">Web Development</label></div>
        <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="web-development" value="Web Development"/></div>
      </li>

      <li>
        <div class="label-add"><label for="logo-design">Logo Design</label></div>
        <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="logo-design" value="Logo Design"/></div>
      </li>

      <li>
      <div class="label-add"><label for="mobile-design">Mobile Application Design</label></div>
      <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="mobile-design" value="Mobile Application Design"/></div>
      </li>

      <li>
      <div class="label-add"><label for="mobile-app">Mobile Application Development</label></div>
      <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="mobile-app" value="Mobile Application Development"/></div>
      </li>

      <li>
      <div class="label-add"><label for="hosting">Hosting</label></div>
        <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="hosting" value="Hosting"/></div>
      </li>

      <li>
      <div class="label-add"><label for="domain">Domain Registration</label></div>
        <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="domain" value="Domain Registration"/></div>
      </li>

      <li>
      <div class="label-add"><label for="seo">SEO</label></div>
        <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="hosting" value="SEO"/></div>
      </li>
      <li>
      <div class="label-add"><label  for="data-viz">Data Visualization</label></div>
        <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="data-viz" value="data Vizualisation"/></div>
      </li>
      <li>
      <div class="label-add"><label for="database-design">Database Design</label></div>
        <div class="service-checkbox"><input type="checkbox" name="add-service" class="service-check-box" id="database-design" value="Database Design & Implementation"/></div>
      </li>
    </ul>
    <div id="done-div">
      <button id="done-btn">Done</button>
    </div>
  </div>
  </div>

    <!-- contact-us modal-->
    <div id="contact-modal">
    <div id="header-panel">
      <h2>Contact Us</h2>
      <div id="hpc-modal">X</div>
      <div class="clear-float"></div>
  </div>
      <div id="contact-modal-container">
        <form method="POST" action="./forms/contactMail.php">
          <div class="name-div"><input type="text" name="name" placeholder="name"></div>
          <div class="email-div"><input type="email" name="email" placeholder="email@example.com"></div>
          <div class="body-div"><textarea name="message" placeholder="Type your message here ..." id="service-textarea"></textarea></div>
          <div class="button-div"><input type="submit" value="Send"></div>
        </form>
      </div>
    </div>

      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title">Web Design</h4>
              <p class="description">
              We are a team of well skilled web designers, who in their 
              skills encompass the broad field of webdesign. From web
              graphic design, user interface design, <span class="h-t-isp">user experience design,
              proprietory software to search engine optimization.
              They are here to conqure and bring your ideas to life.</span></p>
              <div class="t-m-t-d"><button class="t-m-t">Read More</button></div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title">Web Development</h4>
              <p class="description">Bring your content to life. It does not matter
              what kind of website you need either static or dynamic web site with 
              different functions. We can develop a website <span class="h-t-isp">for you ranging from 
              the simplest to more complicated websites such as: web application, 
              e-commerce, electronic business, to social network services and 
              content management systems we do it all inhouse.</span></p>
              
            <div class="t-m-t-d"><button class="t-m-t">Read More</button></div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title">Software Engineering</h4>
              <p class="description">Need a software to handle heavy processing
                within your business model or a customised software
                program to handle certain task within your <span class="h-t-isp">
                organisation, well look no further
                we are the right folks to go to. As we develop
                scalable softwares that are well engineered and documented
                .We know it can be difficult to find a solution to a certain
                problem or repeating the same task over and over again, thus
                a software applicatin becomes a vauable asset to your business
                by collecting data and computing tha data to come up with
                meaningful information, or manage a very large set of data
                to management software, we have got you covered.</span></p>
                
            <div class="t-m-t-d"><button class="t-m-t">Read More</button></div>
            
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Mobile Application Design</a></h4>
              <p class="description">We have a group of talented Mobile Application Design with a work ethics is nothing is beyond our capabilities within our domain.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Mobile Application Development</a></h4>
              <p class="description">We have a group of talented Mobile Application Development with a work ethics is nothing is beyond our capabilities within our domain.</p>
              
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Graphic Design</a></h4>
              <p class="description">ITilria has professionals dealing in 
                graphic visual representations of information, data if required</p>
            
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="assets/img/joshua.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">IT Support</a></h4>
              <p class="description">ITilria has professionals that provide help with any technology products ranging from computers and phones to televisions and software</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Info Graph</a></h4>
              <p class="description">ITilria has professionals dealing in graphic visual representations of information, data if required</p>
            </div>

          </div>
        </div>

      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2>Our Mission</h2>
          <p>ITilria is a Software company service provider, providing crucial business solutions in the industry, Our aim is to offer solutions to the growing problems impacting business and social communities. 
            We are driven by relentless ambition to grow, expand and see our dear clients happy and successful. We believe that there is no problem too big to solve with the right solution.</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/img1.svg" class="img-fluid" alt="">
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/img2.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <p class="fst-italic">
              ITilria is also looking at creating jobs for young people through giving them job opportunities in any development, design and engineering skils that an individual has required in the Information Technology environment.
            </p>
            <p>
              ITilria core values as an organization is respect, safety and healthy, ethnical behavior, excellence, integrity, understanding and honesty.
            </p>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/img4.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5">
            <h3>Goals and Aims for ITilria </h3>
            <p>In the near future we aim for Itilria to be a fully fledged IT company covering all branches within the IT field and to also venture into robotics. Itilria is a company developed to solve challenges, enhance business operations and solve problems being faced in both business and social communities.</p>
           
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/img3.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <p class="fst-italic">
              Our focus is for Itilria to have a firm basis in Africa, to fully utilise African resources and be a corner stone for African businesses that will come afterwards. We aim to then spread to other continents and be a prominent company that holds influence within the world
            </p>
          </div>
        </div>

      </div>
    </section>
    <!-- End Features Section -->
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Page Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.html">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.html">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.html">Contact</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="team.html">Team</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Mobile Application Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Mobile Application Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Application Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Application Development</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              2 Wanderers St <br>
              Johannesburg, Gauteng<br>
              South Africa <br><br>
              <strong>Phone:</strong> +27 81 262 4772<br>
              <strong>Email:</strong> contact@itilria.co.za<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About ITilria</h3>
            <p>We are a group of individuals incorporating our skills to form an organisation that functions as one body. 
              Our aim is to provides the best of services to our clients and become a part of their loyal family by providing crucial solutions to their problems as we work together. </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>ITilria</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <a href="https://bootstrapmade.com/"></a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <!-- GLASS PANE -->
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/buttons.js"></script>
  <script src="./assets/js/learnMore.js"></script>
</body>

</html>
