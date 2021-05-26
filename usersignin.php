<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Minion</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/minion.png" rel="icon" />
  <link href="assets/img/minion.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" />
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />

  <!-- Main CSS -->
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex justify-content-between">
      <div class="contact-info">
        <ul>
          <li>
            <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
          </li>
          <li><i class="icofont-phone"></i> +880-17123456789</li>
          </li>
          <li><i class="icofont-address-book"></i> Bashundhara, Dhaka-1229</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex justify-content-between">
      <div class="logo">
        <h1 class="text-light">
          <a href="index.php"><span>MINION</span></a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#job">Job</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="drop-down"><a href="login.html">Login</a>
            <ul>
              <li class="drop-down"><a href="usersignin.php">As User</a></li>
              <li class="drop-down"><a href="workersignin.php">As Worker</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="register.html" class="btn btn-outline-primary">Sign Up</a>
            <ul>
              <li class="drop-down"><a href="usersignup.php">As User</a></li>
              <li class="drop-down"><a href="Workersignup.php">As Worker</a></li>
            </ul>
          </li>
        </ul>
        <!-- .nav-menu -->
    </div>
  </header>
  <!-- End Header -->
  <div class="container" style="padding: 50px; justify-content: center;">
    <a class="btn btn-outline-info" href="usersignin.php" role="button" style="margin-top: 20px; margin-bottom: 20px; margin-left: 46%;">User Sing In</a>

    <?php require_once 'processuserlogin.php'; ?>
    <div class="card" style="width: 370px; padding:10px ;margin:auto">

      <form action="processuserlogin.php" method="POST" style="max-width: 350px;">

        <div class="form-group" style="padding:5px">
          <label>ID</label>
          <input type="text" name="userid" class="form-control" placeholder="Enter your Id">

        </div>

        <div class="form-group" style="padding: 5px;">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="userpassword" class="form-control" placeholder="Enter your Password">
        </div>

        <div class="form-check" style="padding: 5px; ">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-left: 5px; padding-left:4px">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>

        <button type="submit" class="btn btn-primary" name="signup">Sign In</button>
      </form>
    </div>
  </div>



  <?php
  if (@$_GET['Incorrect'] == true) {
  ?>
    <div style="text-align:center;" class="text-danger">
      <?php echo $_GET['Incorrect'] ?>

    </div>
  <?php
  }

  ?>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MINION</h3>
            <p>
              Bashundhara, Dhaka-1229<br />
              Bangladesh <br /><br />
              <strong>Phone:</strong> +88 017 123 456 789<br />
              <strong>Email:</strong> info@example.com<br />
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Home</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">About us</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Services</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Terms of service</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Privacy policy</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Web Design</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Web Development</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Product Management</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Marketing</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Graphic Design</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>
              Tamen quem nulla quae legam multos aute sint culpa legam noster
              magna
            </p>
            <form action="" method="post">
              <input type="email" name="email" /><input type="submit" value="Subscribe" />
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">
      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <strong><span>MINION</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Created by <a href="#">Group 03</a>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>