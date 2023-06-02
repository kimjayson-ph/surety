<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Motorbike Rental Portal | Page details</title>
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



</head>

<body>


  <!--Header-->
  <?php include('includes/header.php'); ?>
  <?php
  $pagetype = $_GET['type'];
  $sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
  $query = $dbh->prepare($sql);
  $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) { ?>
      <section class="page-header aboutus_page">
        <div class="container">
          <div class="page-header_wrap">
            <div class="page-heading">
              <h1><?php echo htmlentities($result->PageName); ?></h1>
            </div>
            <ul class="coustom-breadcrumb">
              <li><a href="#">Home</a></li>
              <li><?php echo htmlentities($result->PageName); ?></li>
            </ul>
          </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
      </section>
      <!-- <section class="about_us section-padding">
        <div class="container">
          <div class="section-header text-center"> -->


      <!-- <h2><?php echo htmlentities($result->PageName); ?></h2> -->
      <!-- <h4><?php echo $result->detail; ?> </h4> -->
      </div>
  <?php }
  } ?>
  </div>
  </section>
  <!-- /About-us-->

  <!-- P -->
  <section class="section1">
    <div class="container clearfix">
      <div class="content col-lg-12 col-md-12 col-sm-12 clearfix">
        <div class="general-title text-center">
          <h1>WELCOME TO SURETY MOTORBIKES</h1>
          <p>Learn more about us</p>
          <hr>
        </div>
        <div class="divider"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="he-wrap tpl2">
            <img src="img/office.png" alt="" class="img-responsive">
            <!-- <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <div class="center-bar">
                  <a href="#" class="twitter a0" data-animate="elasticInDown"></a>
                  <a href="#" class="facebook a1" data-animate="elasticInDown"></a>
                  <a href="#" class="google a2" data-animate="elasticInDown"></a>
                </div>
              </div>
            </div> -->
          </div>
          <!-- he wrap -->
        </div>
        <!-- end col-6 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <p><?php echo $result->detail; ?>

          </p>
        </div>
        <!-- end col-6 -->
      </div>
    </div>
    <!-- end container -->
  </section>
  <!-- end section 1 -->

  <div class="clearfix"></div>
  <div class="divider"></div>

  <div class="container">
    <div class="general-title text-center">
      <h3>WHAT WE DO</h3>
      <hr>
    </div>

    <div class="skills text-center">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <img src="img/support1.png" class="img-fluid">
        <h4 class="title">24/7 MOTORBIKE RENTAL SUPPORT</h4>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <img src="img/motorbike.png" class="img-fluid">
        <h4 class="title">MOTORBIKE RESERVATION ANYTIME</h4>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <img src="img/map.png" class="img-fluid">
        <h4 class="title">LOTS OF PICKUP LOCATIONS ANYWHERE</h4>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <img src="img/rate.png" class="img-fluid">
        <h4 class="title">BOOK AT THE BASE PRICE AND ENJOY</h4>
      </div>
    </div>
    <!-- end skills -->
  </div>
  <!-- end container -->

  <div class="clearfix"></div>
  <div class="divider"></div>

  <section class="section1">
    <div class="container">
      <div class="general-title text-center">
        <h3>SOME STATS</h3>
        <p>Important information about us</p>
        <hr>
      </div>

      <div class="stat f-container">
        <div class="f-element col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <i class="fa fa-motorcycle fa-4x"></i>
          <div class="milestone-counter">
            <span class="stat-count highlight">6</span>
            <div class="milestone-details">Motorbikes</div>
          </div>
        </div>
        <div class="f-element col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <i class="fa fa-laptop fa-4x"></i>
          <div class="milestone-counter">
            <span class="stat-count highlight">10</span>
            <div class="milestone-details">Completed Transaction</div>
          </div>
        </div>
        <div class="f-element col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <i class="fa fa-comments-o fa-4x"></i>
          <div class="milestone-counter">
            <span class="stat-count highlight">20</span>
            <div class="milestone-details">Questions Answered</div>
          </div>
        </div>
        <div class="f-element col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <i class="fa fa-smile-o fa-4x"></i>
          <div class="milestone-counter">
            <span class="stat-count highlight">10</span>
            <div class="milestone-details">Happy Clients</div>
          </div>
        </div>
      </div>
      <!-- end stat -->

    </div>
    <!-- end container -->
  </section>
  <!-- end section -->
  <section class="section3 withpadding">
    <div class="container">
      <div class="message">
        <div class="col-lg-9 col-md-9 col-sm-9">
          <h3>Grab the attention of your customers!</h3>
          <p>Once you rent the motorcycle your destinations are limited because the Philippines is an archipelago.</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
          <a class="dmbutton button large pull-right" href="motorbike-listing.php"><i class="fa fa-download"></i> BOOK NOW !</a>
        </div>
      </div>
      <!-- end message -->
    </div>
    <!-- end container -->
  </section>
  <!-- end section3 -->

  <!-- P -->


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

  <!--Chatbot-->
  <script>
  window.addEventListener('mouseover', initLandbot, { once: true });
  window.addEventListener('touchstart', initLandbot, { once: true });
  var myLandbot;
  function initLandbot() {
    if (!myLandbot) {
      var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
      s.addEventListener('load', function() {
        myLandbot = new Landbot.Popup({
          configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-1617561-DJ8S7ZNEIFJAHEEL/index.json',
        });
      });
      s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    }
  }
  </script>
  <!--/Chatbot-->

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