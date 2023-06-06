<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];
  $message = $_POST['message'];
  $driverid = $_FILES["driverslicense"]["name"];
  $useremail = $_SESSION['login'];
  $status = 0;
  $vhid = $_GET['vhid'];
  move_uploaded_file($_FILES["driverslicense"]["tmp_name"], "./img/id/" . $_FILES["driverslicense"]["name"]);
  $bookingno = mt_rand(100000000, 999999999);
  $ret = "SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
  $query1 = $dbh->prepare($ret);
  $query1->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query1->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
  $query1->bindParam(':todate', $todate, PDO::PARAM_STR);
  $query1->execute();
  $results1 = $query1->fetchAll(PDO::FETCH_OBJ);

  if ($query1->rowCount() == 0) {

    $sql = "INSERT INTO  tblbooking(BookingNumber,userEmail,VehicleId,FromDate,ToDate,message,Status,driverid) VALUES(:bookingno,:useremail,:vhid,:fromdate,:todate,:message,:status,:driverid)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingno', $bookingno, PDO::PARAM_STR);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
    $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
    $query->bindParam(':todate', $todate, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);

    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':driverid', $driverid, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      echo "<script>alert('Booking successfull.');</script>";
      echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again');</script>";
      echo "<script type='text/javascript'> document.location = 'motorbike-listing.php'; </script>";
    }
  } else {
    echo "<script>alert('Motorbike already booked for these days');</script>";
    echo "<script type='text/javascript'> document.location = 'motorbike-listing.php'; </script>";
  }
}

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Motorbike Rental | Vehicle Details</title>
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

  <!--Listing-Image-Slider-->

  <?php
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['brndid'] = $result->bid;
  ?>

      <section id="listing_img_slider">
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <?php if ($result->Vimage5 == "") {
        } else {
        ?>
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <?php } ?>
      </section>
      <!--/Listing-Image-Slider-->


      <!--Listing-detail-->
      <section class="listing-detail">
        <div class="container">
          <div class="listing_detail_head row">
            <div class="col-md-9">
              <h2><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></h2>
            </div>
            <div class="col-md-3">
              <div class="price_info">
                <p>&#x20B1;<?php echo htmlentities($result->PricePerDay); ?> </p>Per Day

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="main_features">
                <ul>

                  <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->ModelYear); ?></h5>
                    <p>Reg.Year</p>
                  </li>
                  <li> <i class="fa fa-motorcycle" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->displacement); ?></h5>
                    <p>Displacement</p>
                  </li>
                  <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->transmission); ?></h5>
                    <p>Transmission</p>
                  </li>


                </ul>
              </div>
              <div class="listing_more_info">
                <div class="listing_detail_wrap">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs gray-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>

                    <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories & Extras</a></li>
                    <li role="presentation"><a href="#rentalrequirements" aria-controls="rentalrequirements" role="tab" data-toggle="tab">Rental Requirements</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- vehicle-overview -->
                    <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                      <p><?php echo htmlentities($result->VehiclesOverview); ?></p>
                    </div>

                    <!-- Rental requirements -->
                    <div role="tabpanel" class="tab-pane" id="rentalrequirements">

                      <ul>
                        <li>Motorcycle Drivers license</li>
                        <li>Deposit 1 Valid ID</li>


                      </ul>
                    </div>


                    <!-- Accessories -->
                    <div role="tabpanel" class="tab-pane" id="accessories">

                      <table>
                        <thead>
                          <tr>
                            <!-- <th colspan="2">Accessories</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <h5>Included</h5>

                            <?php if ($result->helmet == 1) {
                            ?>
                              <td>Helmet</td>
                              <!-- <td><i class="fa fa-check" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!-- <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>

                          <tr>

                            <?php if ($result->raincoat == 1) {
                            ?>
                              <td>Rain Coat</td>
                              <!--  <td><i class="fa fa-check" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!-- <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>

                          <tr>

                            <?php if ($result->phoneholder == 1) {
                            ?>
                              <td>Phone Holder</td>
                              <!--  <td><i class="fa fa-check" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!--    <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>


                          <tr>



                            <?php if ($result->Phonecharger == 1) {
                            ?>
                              <td>Phone Charger</td>
                              <!--  <td><i class="fa fa-check" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!--  <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>

                          <tr>

                            <?php if ($result->ndhelmet == 1) {
                            ?>
                              <td>2nd Helmet</td>
                              <!--  <td><i class="fa fa-check" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!-- <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>

                          <tr>

                            <?php if ($result->ndraincoat == 1) {
                            ?>
                              <td>2nd Rain Coat</td>
                              <!-- <td><i class="fa fa-check" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!--   <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>



                        </tbody>

                      </table>
                      <!--   2 -->
                      <table>
                        <thead>
                          <tr>
                            <!-- <th colspan="2">Accessories</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <h5>Extras</h5>

                            <?php if ($result->helmet == 0) {
                            ?>
                              <td>Helmet</td>

                              <!--  <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!-- <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>

                          <tr>

                            <?php if ($result->raincoat == 0) {
                            ?>
                              <td>Rain Coat</td>

                              <!--  <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!--  <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>

                          <tr>

                            <?php if ($result->phoneholder == 0) {
                            ?>
                              <td>Phone Holder</td>

                              <!--  <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!--   <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>


                          <tr>



                            <?php if ($result->Phonecharger == 0) {
                            ?>
                              <td>Phone Charger</td>

                              <!--  <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!--   <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>

                          <tr>

                            <?php if ($result->ndhelmet == 0) {
                            ?>
                              <td>2nd Helmet</td>

                              <!-- <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!--    <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>

                          <tr>

                            <?php if ($result->ndraincoat == 0) {
                            ?>
                              <td>2nd Rain Coat</td>

                              <!-- <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } else { ?>
                              <!-- <td><i class="fa fa-close" aria-hidden="true"></i></td> -->
                            <?php } ?>
                          </tr>



                        </tbody>

                      </table>
                    </div>
                    <!--Accessories-->
                  </div>
                </div>

              </div>
          <?php }
      } ?>

            </div>

            <!--Side-Bar-->
            <aside class="col-md-3">

              <div class="share_vehicle">
                <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
              </div>
              <div class="sidebar_widget">
                <div class="widget_heading">
                  <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
                </div>
                <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>From Date:</label>
                    <input type="date" class="form-control" name="fromdate" placeholder="From Date" required>
                  </div>
                  <div class="form-group">
                    <label>To Date:</label>
                    <input type="date" class="form-control" name="todate" placeholder="To Date" required>
                  </div>
                  <div class="form-group">
                    <label>Upload Driver's License</label>
                    <input type="file" class="form-control" name="driverslicense" required>
                  </div>
                  <div class="form-group">
                    <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                  </div>
                  <?php if ($_SESSION['login']) { ?>
                    <div class="form-group">
                      <input type="submit" class="btn" name="submit" value="Book Now">
                    </div>
                  <?php } else { ?>
                    <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

                  <?php } ?>
                </form>
              </div>
            </aside>
            <!--/Side-Bar-->
          </div>

          <div class="space-20"></div>
          <div class="divider"></div>

          <!--Similar-Motorbike-->
          <div class="similar_cars">
            <h3>Similar Motorbike</h3>
            <div class="row">
              <?php
              $bid = $_SESSION['brndid'];
              $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.transmission,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.displacement,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:bid";
              $query = $dbh->prepare($sql);
              $query->bindParam(':bid', $bid, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) { ?>
                  <div class="col-md-3 grid_listing">
                    <div class="product-listing-m gray-bg">
                      <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image" /> </a>
                      </div>
                      <div class="product-listing-content">
                        <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h5>
                        <p class="list-price">&#x20B1;<?php echo htmlentities($result->PricePerDay); ?></p>

                        <ul class="features_list">

                          <li><img src="./assets/images/surety/suretyfavicon.png" alt=""><?php echo htmlentities($result->BrandName); ?> </li>
                          <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> model</li>

                        </ul>
                      </div>
                    </div>
                  </div>
              <?php }
              } ?>

            </div>
          </div>
          <!--/Similar-Motorbike-->

        </div>
      </section>
      <!--/Listing-detail-->

      <!--Chatbot-->
      <script type='text/javascript'>
        (function(I, L, T, i, c, k, s) {
          if (I.iticks) return;
          I.iticks = {
            host: c,
            settings: s,
            clientId: k,
            cdn: L,
            queue: []
          };
          var h = T.head || T.documentElement;
          var e = T.createElement(i);
          var l = I.location;
          e.async = true;
          e.src = (L || c) + '/client/inject-v2.min.js';
          h.insertBefore(e, h.firstChild);
          I.iticks.call = function(a, b) {
            I.iticks.queue.push([a, b]);
          };
        })(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', 'HK3hq2em6gmh6mxAJ_c', {});
      </script>
      <!--End of Chatbot-->

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

      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/interface.js"></script>

      <script src="assets/js/bootstrap-slider.min.js"></script>
      <script src="assets/js/slick.min.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>