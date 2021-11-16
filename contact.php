<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact - ITilria</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

  <!-- CSS File Link -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/desktop_main.css" media="(max-width: 1449px) and (min-width: 769px)" type="text/css">
  <link rel="stylesheet" href="./assets/css/mobile_ip6_main.css" media="(max-width: 768px) and (min-width: 415px)" type="text/css">
  <link rel="stylesheet" href="./assets/css/mobile_main.css" media="(max-width: 414px) and (min-width: 100px)" type="text/css">
  <style>
    #error{
      position: absolute;
      width: 100%;
      background-color: red;
      padding: 20px;
      z-index: 1000;
      color: white;
    }

    #success{
      position: absolute;
      width: 100%;
      background-color: green;
      padding: 20px;
      z-index: 1000;
      color: white;
    }

    #contant-form-submit
    {
      border: 1px solid cyan;
      border-radius: 10px;
      background-color: #68A4C4;
      color: white;
      font-weight: bold;
    }

    
  </style>
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
  
</head>

<body>
  <!-- GLASS PANE -->
  <div id="glass-pane">
  </div>
  <!-- END GLASS PANE-->

  <!-- ==================== -START- FLASH MESSAGES ============================= -->
    <?php 
      if(isset($_SESSION['success']))
      {
        ?>
        <div id="<?php if(isset($_SESSION['class_val'])){echo $_SESSION['class_val']; }?>">
          <?php
            echo $_SESSION['success']; 
          ?>
        </div>
        
    <?php
      unset($_SESSION['success']);
      }else if(isset($_SESSION['error'])){
        ?>
        <div id="<?php if(isset($_SESSION['class_val'])){echo $_SESSION['class_val']; }?>">
          <?php
            echo $_SESSION['error'];
          ?>
        </div>
        <script>
          var error_msg = document.getElementById("<?php echo $_SESSION['class_val']; ?>");
          alert(error_msg.innerText);
        </script>
    <?php
      }
      unset($_SESSION['error']);
      unset($_SESSION['class_val']);
      session_destroy();
    ?>
  <!-- -END- Status Popup Reponse -->

  <!-- ==================== -START- Meeting Form Status Popup Reponse =============================-->
  <div id="rm-container">
    <div id="rm-header">
      <h3 id="rm-h-text"></h3>
    </div>
    <div id="rm-body">
      <p id="rm-b-message"></p>
    </div>
    <div id="rm-footer">
      <center><button id="rm-f-btn">OK</button></center>
    </div>
  </div>
<!-- -END- Status Popup Reponse -->
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
      <h2 class="text-light"><a href="index.php"><img src="/header-index.png"/></a></h2>
        
      </div>
      <!--Start of navbar -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="" href="./index.php">Home</a></li>
          <li><a href="./about.html">About</a></li>
          <li><a href="./services.html">Services</a></li>
          <li><a href="./team.html">Team</a></li>
          <li><a class="active" href="./contact.php">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!--End of navbar -->

    </div>
  </header>
  <!-- End Header -->

  <main id="main">
    
    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section>
    <!-- End Contact Section -->
 
    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      
      <div class="container">
     
        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>2 Wanderers St, Johannesburg, Gauteng</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>contact@itilria.co.za</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+27 81 262 4772</p>
                </div>
              </div>
            </div>

          </div>
 
          <div class="col-lg-6">
            <form action="./forms/contact.php" method="POST" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><input id="contant-form-submit" type="submit" value="Send Message"></div>
            </form>
          </div>

        </div>

      </div>



<!-- ==================== -START- Schedule Call Meeting Section ====================-->
<div id="schedule-call-container">

<div id="sc-headerpanel">
  <div class="modal-header-panel"><h2>Schedule A <span id="call-word">Call</span></h2></div>
  <div id="sc-headerpanel-close">X</div>
  <div class="clear-float"></div>
</div>

<form method="POST" id="form_f">
  <div id="sc-main">
    <div class="sc-field-div" id="sc-name-div">
    <span id="msgName"></span>
      <center><input type="text" placeholder="Enter Name" id="sc-name" name="name"/></center>
    </div>
    <div class="sc-field-div">
    <span id="msgEmail"></span>
    <center><input type="email" placeholder="Enter Email" id="sc-email" name="email"/></center>
    </div>
    <div class="sc-field-div">
    <span id="msgContact"></span>
      <center><input type="text" placeholder="phone number: +27 81 262 4772" id="sc-contact" name="contact"/></center>
    </div>
    <div class="sc-date-div time-div">
      <center><label for="sc-time">Time</label></center>  
      <center><input type="time" name="time" id="sc-time"/></center>
    </div>
    <div class="sc-date-div date-div">
      <center><label for="sc-date">Date</label></center>
      <center><input type="date" name="date" id="sc-date"></center>
  </div>
  </div>

<div id="sc-button-div">
  <input type="button" id="sc-submit-btn" value="Proceed"/>
  <div class="clear-float"></div>
</div>

</form>
</div>
<!-- ================= -END- Schedule Call Meeting Section ===================== -->

<!-- ================= -START- Schedule Zoom Meeting Section ===================== -->
<div id="schedule-zoom-container">

<div id="szc-headerpanel">
  <div class="modal-header-panel"><h2>Schedule Zoom Meeting</h2></div>
  <div id="szc-headerpanel-close">X</div>
  <div class="clear-float"></div>
</div>

<form method="POST" >
  <div id="szc-main">
    <div class="szc-field-div"><input type="text" placeholder="Enter Name" id="szc-name" name="name"/></div>
    <div class="szc-field-div"><input type="email" placeholder="Enter Email" id="szc-email" name="email"/></div>
    <div class="szc-date-div">
      <label for="szc-time">Time: </label> 
      <input type="time" name="time" id="szc-time"/>
    </div>
    <div class="szc-date-div">
      <label for="szc-date">Date: </label>
      <input type="date" name="date" id="szc-date">
    </div>
  </div>

  <div id="szc-button-div">
    <input type="button" id="szc-submit-btn" value="proceed"/>
    <div class="clear-float"></div>
  </div>

</form>
</div>
<!-- ================= -END- Schedule Zoom Meeting Section ===================== -->



<!-- ============ -START- Scedule Meeting Section ============== -->
<div id="schedule-meeting-container">
  <h2>Schedule A Meeting</h2>
  <div class="b-c-d"><center><button id="schedulezoom_btn">Zoom Meeting</button></center></div>
  <div class="b-c-d"><center><button id="schedulecall_btn">Call Meeting</button></center></div>
</div>
<!-- ============ -END- Scedule Meeting Section ============== -->

</section>
    <!-- End Contact Section -->

    <!-- ======= Map Section ======= -->
    <section class="map mt-2">
      <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.8886585281616!2d28.043151315029984!3d-26.20029998343961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e950e9e4e014407%3A0x31b0a1c07ca6505b!2s2%20Wanderers%20St%2C%20Johannesburg%2C%202000!5e0!3m2!1sen!2sza!4v1619152626931!5m2!1sen!2sza" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </section>
    <!-- End Map Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="index-2.html">Home</a></li>
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
            <p>We are a group of individuals incorporating our skills to form an organisation that functions as one a body. 
              Our aim is to provides the best of services to our clients and become a part their loyal family with best solutions to their problems as we work together. </p>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="./assets/js/schedulemeeting.js"></script>
  
</body>
</html>
