<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['send'])) {
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $contactno = $_POST['contactno'];
  $message = $_POST['message'];
  $sql = "INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name', $name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $msg = "Query Sent. We will contact you shortly";
  } else {
    $error = "Something went wrong. Please try again";
  }
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Motorbike Rental|| Contact Us Page</title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <!--Custome Style -->
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <!--slick-slider -->
  <link href="assets/css/slick.css" rel="stylesheet">
  <!--bootstrap-slider -->
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <!--FontAwesome Font Style -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">


  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/images/surety/suretyfavicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/images/surety/suretyfavicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/images/surety/suretyfavicon.png">
  <link rel="apple-touch-icon-precomposed" href="./assets/images/surety/suretyfavicon.png">
  <link rel="shortcut icon" href="./assets/images/surety/suretyfavicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
  </style>
</head>

<body>



  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!--Page Header-->
  <section class="page-header contactus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Contact Us</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Contact Us</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Contact-us-->
  <section class="contact_us section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Get in touch using the form below</h3>
          <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
          <div class="contact_form gray-bg">
            <form method="post">
              <div class="form-group">
                <label class="control-label">Name <span>*</span></label>
                <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
              </div>
              <div class="form-group">
                <label class="control-label">Email Address <span>*</span></label>
                <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
              </div>
              <div class="form-group">
                <label class="control-label">Phone Number <span>*</span></label>
                <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" required maxlength="11" pattern="[0-9]+">
              </div>
              <div class="form-group">
                <label class="control-label">Message <span>*</span></label>
                <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <button class="btn" type="submit" name="send" type="submit">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Contact Info</h3>
          <div class="contact_detail">
            <?php
            $pagetype = $_GET['type'];
            $sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) { ?>
                <ul>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><?php echo htmlentities($result->Address); ?></div>
                  </li>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><a href=""><?php echo htmlentities($result->EmailId); ?></a></div>
                  </li>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><a href=""><?php echo htmlentities($result->ContactNo); ?></a></div>
                  </li>
                </ul>
            <?php }
            } ?>
          </div>

          <h3 class="title">Social Media</h3>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="servicebox text-center">
              <div class="service-icon">
                <div class="dm-icon-effect-1" data-effect="slide-bottom">
                  <a href="https://www.facebook.com/profile.php?id=100092961292385" target="_blank" class=""> <i class="dm-icon fa fa-facebook fa-3x"></i> </a>
                </div>
              </div>
              <!-- service-icon -->
            </div>
            <!-- servicebox -->
          </div>
          <!-- large-3 -->

          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="servicebox text-center">
              <div class="service-icon">
                <div class="dm-icon-effect-1" data-effect="slide-bottom">
                  <a href="https://twitter.com/" target="_blank" class=""> <i class="dm-icon fa fa-twitter fa-3x"></i> </a>
                </div>
              </div>
              <!-- service-icon -->
            </div>
            <!-- servicebox -->
          </div>
          <!-- large-3 -->

          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="servicebox text-center">
              <div class="service-icon">
                <div class="dm-icon-effect-1" data-effect="slide-bottom">
                  <a href="https://www.google.com/" target="_blank" class=""> <i class="dm-icon fa fa-google-plus fa-3x"></i> </a>
                </div>
              </div>
              <!-- service-icon -->
            </div>
            <!-- servicebox -->
          </div>
          <!-- large-3 -->

          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="servicebox text-center">
              <div class="service-icon">
                <div class="dm-icon-effect-1" data-effect="slide-bottom">
                  <a href="https://www.youtube.com/" target="_blank" class=""> <i class="dm-icon fa fa-youtube fa-3x"></i> </a>
                </div>
              </div>
              <!-- service-icon -->
            </div>
            <!-- servicebox -->
          </div>
          <!-- large-3 -->
        </div>
      </div>
    </div>
  </section>
  <!-- /Contact-us-->
  <h1 class="text-center">
    Surety Motorbikes Satellite Map
  </h1>
  <div class="mapouter">
    <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=145 M. L. Quezon St, Taguig, 1632 Metro Manila&amp;t=p&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://capcuttemplate.org/">Capcut Template</a></div>
    <style>
      .mapouter {
        position: relative;
        text-align: right;
        width: 100%;
        height: 400px;
      }

      .gmap_canvas {
        overflow: hidden;
        background: none !important;
        width: 100%;
        height: 400px;
      }

      .gmap_iframe {
        height: 400px !important;
      }
    </style>
  </div>
  <br>

  <!--Footer -->
  <?php include('includes/footer.php'); ?>
  <!-- /Footer-->

  <!--Back to top-->
  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  <!--/Back to top-->

  <!--Login-Form -->
  <?php include('includes/login.php'); ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include('includes/registration.php'); ?>

  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include('includes/forgotpassword.php'); ?>
  <!--/Forgot-password-Form -->

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <!--Switcher-->
  <script src="assets/switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS-->
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <!--Slider-JS-->
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>



</html>