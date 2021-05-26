<?php
include_once('connection.php');
$query = "select * from users";

session_start();
if (isset($_SESSION['userid'])) {

  $userid = $_SESSION['userid'];

?>


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
            <li><a href="processlogout.php?logout" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Logout</a></li>
          </ul>
          <!-- .nav-menu -->
      </div>
    </header>
    <!-- End Header -->

    <div class="container" style="padding: 100px;">

      <?php

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "workerreview";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM `contract`, worker WHERE userid='$userid' and contract.workerid = worker.workerid";
      $result = mysqli_query($conn, $sql) or die(mysqli_erro($mysqli));
      ?>
      <?php
      if (isset($_POST['reviewbtn'])) {
        $workerid = $_SESSION['workerid'];
        $userid = $_SESSION['userid'];
        $review = $_POST['review'];

        $sql = "INSERT INTO `workerreview`(`userid`, `workerid`, `review`) VALUES ('$userid','$workerid','$review')";
        if ($conn->query($sql) === TRUE) {
      ?> <h2 style="padding: 20px 0px;"> Thanks For The Review! </h2><?php

                                                                      //check if the records exist to delete or not
                                                                      $check = "SELECT * from `contract` where userid='$userid' and workerid= '$workerid'";
                                                                      $result2 = mysqli_query($conn, $check) or die(mysqli_erro($mysqli));
                                                                      //$check = mysql_query("Select * from contract where workerid= '$workerid'") or die("not found".mysql_error());

                                                                      //if ($conn->query($check) === TRUE) {
                                                                      if ($result2) {
                                                                        //means record found and can be deleted
                                                                        $sql2 = "DELETE FROM `contract` WHERE userid='$userid' and workerid='$workerid'";
                                                                        //$queryDelete = mysql_query("DELETE FROM `contract` WHERE userid='$userid' and workerid='$workerid'") or die("not deleted".mysql_error());
                                                                        if ($conn->query($sql2) === TRUE) {
                                                                        }
                                                                      } else {
                                                                        //record doesn't exists warning
                                                                      }
                                                                    } else {
                                                                      echo "Error: " . $sql . "<br>" . $conn->error;
                                                                    }
                                                                  }


                                                                      ?>





      <?php
      if (isset($_POST['endjobbtn'])) {
        $workerid = $_POST['endjobbtn'];
        $_SESSION['workerid'] = $workerid;
        $userid = $_SESSION['userid'];
      ?>
        <form action="" method="POST">

          <div class="form-group">
            <h2 style="padding: 20px 0px;"> Please Give Review for <?php echo $workerid ?> </h2>
            <input type="text" name="review" class="form-control" placeholder="Give review in details..">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin:20px 0px;" name="reviewbtn" value="<?php echo $row['workerid']; ?>">Save Review</button>
          </div>
        </form>

      <?php } ?>

      <div class="rpw justify-content-center">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Adress</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Worker Type</th>
              <th>End Job</th>
            </tr>
          </thead>
          <?php
          while ($row = $result->fetch_assoc()) : ?>

            <tr>
              <form action="" method="POST" role="form">
                <td><?php echo $row['workername']; ?></td>
                <td><?php echo $row['workerphone']; ?></td>
                <td><?php echo $row['workeradress']; ?></td>
                <td><?php echo $row['workerage']; ?></td>
                <td><?php
                    if ($row['workergender'] == 1) {
                      echo "Male";
                    } else {
                      echo "Female";
                    }
                    ?></td>
                <td><?php
                    if ($row['wtype'] == 1) {
                      echo "Driver";
                    } else {
                      echo "Maid";
                    }
                    ?></td>
                <td>

                  <button type="submit" class="btn btn-danger btn-lg active" role="button" style="margin-top:10px" name=" endjobbtn" value="<?php echo $row['workerid']; ?>">End Job</button>

                </td>
              </form>
            </tr>

          <?php endwhile; ?>
        </table>
        <a href="user.php" class="btn btn-dark btn-lg active" role="button" style="margin:20px 0px;" aria-pressed="true">Go Back</a>
      </div>
    </div>
    <?php
    function pre_r($array)
    {
      echo '<pre>';
      print_r($array);
      echo '</pre>';
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


<?php } ?>