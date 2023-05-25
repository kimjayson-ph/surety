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
      <h4> <?php echo $result->detail; ?> </h4>
      </div>
  <?php }
  } ?>
  </div>
  </section>
  <!-- /About-us-->

  <!--FAQ's-->

  <body>
    <!-- SUPPORT ICONS -->
    <section class="section1">
      <div class="container clearfix">
        <div class="content col-lg-12 col-md-12 col-sm-12 clearfix">

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="dmbox">
              <div class="service-icon">
                <div class="dm-icon-effect-1" data-effect="slide-bottom">
                  <i class="dm-icon fa fa-book fa-3x"></i>
                </div>
              </div>
              <h4>Get Quote</h4>
              <p>Interested in Surety Motorbike rental services? Check out our available bikes or send inquiries to info@suretymotorental.com</p>
            </div>
          </div>
          <!-- end dmbox -->

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="dmbox">
              <div class="service-icon">
                <div class="dm-icon-effect-1" data-effect="slide-bottom">
                  <i class="dm-icon fa fa-comments fa-3x"></i>
                </div>
              </div>
              <h4>2. Live Chat!</h4>
              <p>You can escalate your issue to our representative, if you feel you’re not getting the service you deserve.</p>
            </div>
          </div>
          <!-- end dmbox -->

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="dmbox">
              <div class="service-icon">
                <div class="dm-icon-effect-1" data-effect="slide-bottom">
                  <i class="dm-icon fa fa-envelope-o fa-3x"></i>
                </div>
              </div>
              <h4>3. Report a Bug</h4>
              <p>
                Make statements that demonstrate your dissatisfaction. You should articulate your dissatisfaction in a forceful way</p>
            </div>
          </div>
          <!-- end dmbox -->
          <!-- end support icons -->


          <div class="clearfix"></div>
          <div class="divider"></div>

          <div class="general-title text-center">
            <h3>Most Asked Questions</h3>
            <hr>
          </div>

          <div class="clearfix"></div>
          <div class="divider"></div>

          <div class="row">
            <div class="col-lg-7">
              <div class="accordion" id="accordion2">
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseOne">
                      <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>What are the requirements for renting a motorbike?
                    </a>
                  </div>
                  <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                      <p>Renting a motorbike requires a valid driver's license, a credit card, and a minimum age of 18 years old. Some rental companies may have additional requirements such as a motorcycle endorsement on your driver's license or a certain amount of riding experience.
                        It is important to also have proper safety gear such as a helmet, gloves, and protective clothing when renting a motorbike. Make sure to check with the rental company beforehand if they provide these items or if you need to bring your own.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseTwo">
                      <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>What type of motorbikes are available for rent?
                    </a>
                  </div>
                  <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <p>Most rental companies offer a variety of motorbikes to choose from, including standard, cruiser, sport, and adventure bikes. The availability of specific models may vary depending on the rental location and season.
                        It is important to choose a motorbike that fits your skill level and intended use. For example, if you plan on doing a lot of highway riding, a cruiser or touring bike may be more comfortable than a sport bike.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseThree">
                      <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>Do I need insurance when renting a motorbike?
                    </a>
                  </div>
                  <div id="collapseThree" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <p>Most rental companies offer insurance options for their motorbikes, but it is important to check what is included and what additional coverage may be needed. Some insurance policies may have restrictions on where you can ride or may not cover certain types of damage.
                        It is also a good idea to check with your own insurance provider to see if they offer any coverage for rental vehicles, including motorbikes. This can help you avoid any unexpected expenses in case of an accident.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseFour">
                      <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>Can I take a rented motorbike across country borders?
                    </a>
                  </div>
                  <div id="collapseFour" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <p>Crossing country borders with a rented motorbike can be complicated and may not be allowed by some rental companies. It is important to check with the rental company beforehand to see if cross-border travel is permitted and what additional requirements may be needed.
                        If cross-border travel is allowed, you may need to obtain additional documentation such as a temporary import permit or an international driving permit. It is also important to research the traffic laws and customs regulations of the countries you plan on visiting.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseFive">
                      <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>What should I do in case of an accident or breakdown?
                    </a>
                  </div>
                  <div id="collapseFive" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <p>In case of an accident or breakdown, the first priority is to ensure your own safety and seek medical attention if needed. It is important to also contact the rental company immediately to report the incident and follow their instructions.
                        Depending on the severity of the situation, the rental company may provide a replacement motorbike or arrange for repairs. It is important to document the incident with photos and written descriptions to provide to the rental company and insurance providers.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseFive">
                      <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>What are the rental rates and payment options?
                    </a>
                  </div>
                  <div id="collapseSix" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <p>Rental rates for motorbikes vary depending on the location, season, and type of motorbike. Most rental companies offer daily, weekly, and monthly rates, with discounts for longer rentals.
                        Payment options typically include credit cards and cash, but it is important to check with the rental company beforehand to see what payment methods are accepted. It is also important to understand any additional fees or charges that may apply, such as late return fees or damage fees.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end accordion -->
            </div>
            <!-- end col-lg-7 -->

            <div class="col-lg-5 text-center">
              <h4>Need Support?</h4>
              <img src="img/support2.jpg" width="300px" alt="">
              <p>We are available 24/7 to help you<br />with any doubt you may have.</p>
              <p>
                <i class="fa fa-mobile"></i> +63 9196760589<br />
                <i class="fa fa-envelope-o"></i>info@suretymotorental.com<br />
              </p>
            </div>
            <!-- end col-lg-5 -->

          </div>
          <!-- end row -->
        </div>
        <!-- end content -->
      </div>
      <!-- end container -->
    </section>
    <!-- end section -->


    <!--/FAQ's-->

    <!--Footer-->
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
    <!-- JavaScript Libraries -->
    <script src="lib/php-mail-form/validate.js"></script>
    <script src="lib/prettyphoto/js/prettyphoto.js"></script>
    <script src="lib/isotope/isotope.min.js"></script>
    <script src="lib/hover/hoverdir.js"></script>
    <script src="lib/hover/hoverex.min.js"></script>
    <script src="lib/unveil-effects/unveil-effects.js"></script>
    <script src="lib/owl-carousel/owl-carousel.js"></script>
    <script src="lib/jetmenu/jetmenu.js"></script>
    <script src="lib/animate-enhanced/animate-enhanced.min.js"></script>
    <script src="lib/jigowatt/jigowatt.js"></script>
    <script src="lib/easypiechart/easypiechart.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>





  </body>



</html>