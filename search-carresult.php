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

  <title>Bike Rental Portal | Bike Listing</title>
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
</head>

<body>



  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!--Page Header-->
  <section class="page-header listing_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Motorbike Listing</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Motorbike Listing</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Listing-->
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">
              <?php
              //Query for Listing count
              $brand = $_POST['brand'];
              $fueltype = $_POST['fueltype'];
              $sql = "SELECT id from tblvehicles where tblvehicles.VehiclesBrand=:brand and tblvehicles.FuelType=:fueltype";
              $query = $dbh->prepare($sql);
              $query->bindParam(':brand', $brand, PDO::PARAM_STR);
              $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = $query->rowCount();
              ?>
              <p><span><?php echo htmlentities($cnt); ?> Listings</span></p>
            </div>
          </div>

          <?php

          $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:brand and tblvehicles.FuelType=:fueltype";
          $query = $dbh->prepare($sql);
          $query->bindParam(':brand', $brand, PDO::PARAM_STR);
          $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {  ?>
              <div class="product-listing-m gray-bg">
                <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="Image" /> </a>
                </div>
                <div class="product-listing-content">
                  <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h5>
                  <p class="list-price">&#x20B1;<?php echo htmlentities($result->PricePerDay); ?> Per Day</p>
                  <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?> Helmet</li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> model</li>

                  </ul>
                  <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                </div>
              </div>
          <?php }
          } ?>
        </div>

        <!--Side-Bar-->
        <aside class="col-md-3 col-md-pull-9">
          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Motorbike </h5>
            </div>
            <div class="sidebar_filter">
              <form action="#" method="get">
                <div class="form-group select">
                  <select class="form-control">
                    <option>Select Brand</option>

                    <?php $sql = "SELECT * from  tblbrands ";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                      foreach ($results as $result) {       ?>
                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?></option>
                    <?php }
                    } ?>

                  </select>
                </div>


                <div class="form-group">
                  <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i>Search Motorbike</button>
                </div>
              </form>
            </div>
          </div>

          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><img src="./assets/images/surety/suretyfavicon.png" alt=""> Recently Listed Motorbike</h5>
            </div>
            <div class="recent_addedcars">
              <ul>
                <?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by id desc limit 4";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {  ?>

                    <li class="gray-bg">
                      <div class="recent_post_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="image"></a> </div>
                      <div class="recent_post_title"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a>
                        <p class="widget_price">&#x20B1;<?php echo htmlentities($result->PricePerDay); ?> Per Day</p>
                      </div>
                    </li>
                <?php }
                } ?>

              </ul>
            </div>
          </div>
        </aside>
        <!--/Side-Bar-->
      </div>
    </div>
  </section>
  <!-- /Listing-->

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