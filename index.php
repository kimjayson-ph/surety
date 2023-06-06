<?php
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Surety Moto Rental</title>
  <!--Bootstrap -->

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
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
  <!-- /Header -->

  <!-- Banners -->
  <section id="banner" class="banner-section">
    <div class="container">
      <div class="div_zindex">
        <div class="row">
          <div class="col-md">
            <div class="banner_content">
              <div class="backdrop">
                <h1>EASY & AFFORDABLE</h1>
                <p>Find the perfect motorcycle for rent today!</p>
              </div>
              <a href="motorbike-listing.php" class="btn" style="background-color: #7bc41d;">Rent a Ride</a>
              <a href="#funFacts" class="btn" style="background-color: #7bc41d; margin-left: 10px;">Learn more</a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Banners -->
  <div class="container ">
    <div class="section-header choose-section text-center">
      <h2>Choose the Best <span>MotorBike</span></h2>
      <p>Surety Motorbikes Rental is a company that provides top-of-the-line motorbikes for rent. Our mission is to provide customers with the best possible experience when it comes to renting a motorbike. We believe that everyone should have access to high-quality, reliable transportation.</p>
      <p>Safety First At Surety Motorbikes Rental, safety is our top priority. All of our motorbikes are regularly maintained and inspected to ensure they are in top working condition. We also provide customers with helmets and other safety gear to ensure their protection while riding. </p>
    </div>
  </div>

  <!-- Fun Facts-->
  <section class="fun-facts-section" id="funFacts">
    <div class="container div_zindex">
      <div align="center">
        <h1 style="color: white;">It's easier to rent!</h1>
        <h5 style="color: white;">We can rent different kinds of motorcycles at a low price</h5>
      </div>
      <div><img src="" alt=""></div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-xs col-sm-3">
          <div>
            <div align="center" class="cell">
              <img src="./assets/images/surety/1.png" style="width: 280px; margin: 10px 10px" alt="">

            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs col-sm-3">
          <div>
            <div align="center" class="cell">
              <img src="./assets/images/surety/2.png" style="width: 280px; margin: 10px 10px" alt="">

            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-3 col-xs col-sm-3">
          <div>
            <div align="center" class="cell">
              <img src="./assets/images/surety/3.png" style="width: 280px; margin: 10px 10px" alt="">

            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs col-sm-3">
          <div>
            <div align="center" class="cell">
              <img src="./assets/images/surety/4.png" style="width: 280px; margin: 10px 10px" alt="">

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Fun Facts-->

  <!-- Resent bike-->
  <section class="section-padding gray-bg">
    <div class="container">

      <div class="row">

        <!-- Nav tabs -->
        <div class="recent-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#resentnewcar" style="background-color: #7bc41d;" role="tab" data-toggle="tab">New MotorBike</a></li>
          </ul>
        </div>


        <!-- Recently Listed New MotorBikes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="resentnewcar">
            <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.displacement,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit 9";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {
            ?>

                <div class="col-list-3">
                  <div class="recent-car-list">
                    <div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"></a>
                      <ul>
                        <li><img src="./assets/images/surety/suretyfavicon.png" alt=""></li>
                        <li><?php echo htmlentities($result->BrandName); ?></li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> Model</li>

                      </ul>
                    </div>
                    <div class="car-title-m">
                      <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                      <span class="price">&#x20B1;<?php echo htmlentities($result->PricePerDay); ?> /Day</span>
                    </div>
                    <div class="inventory_info_m">
                      <p><?php echo substr($result->VehiclesOverview, 0, 70); ?></p>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>


          </div>
        </div>
      </div>
  </section>
  <!-- /Resent bike -->




  <!--Testimonial -->
  <section class="section-padding testimonial-section parallex-bg">
    <div class="container div_zindex">
      <div class="section-header white-text text-center">
        <h2>Our Satisfied <span>Customers</span></h2>
      </div>
      <div class="row">
        <div id="testimonial-slider">
          <?php
          $tid = 1;
          $sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid limit 4";
          $query = $dbh->prepare($sql);
          $query->bindParam(':tid', $tid, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {  ?>


              <div class="testimonial-m">

                <div class="testimonial-content">
                  <div class="testimonial-heading">
                    <h5><?php echo htmlentities($result->FullName); ?></h5>
                    <p><?php echo htmlentities($result->Testimonial); ?></p>
                  </div>
                </div>
              </div>
          <?php }
          } ?>



        </div>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Testimonial-->




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
  <script type='text/javascript'>
		(function(I, L, T, i, c, k, s) {if(I.iticks) return;I.iticks = {host:c, settings:s, clientId:k, cdn:L, queue:[]};var h = T.head || T.documentElement;var e = T.createElement(i);var l = I.location;e.async = true;e.src = (L||c)+'/client/inject-v2.min.js';h.insertBefore(e, h.firstChild);I.iticks.call = function(a, b) {I.iticks.queue.push([a, b]);};})(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', 'HK3hq2em6gmh6mxAJ_c', {});
  </script>
  <!--End of Chatbot-->               




  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <!--Switcher-->

  <!--bootstrap-slider-JS-->
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <!--Slider-JS-->
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>



</html>