<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header("location: ../index.php");
} else {
?>
  <!DOCTYPE HTML>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Motorbike Rental Portal - My Booking</title>
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
    <!-- Google-Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

  </head>

  <body>



    <!--Header-->
    <?php include('includes/header.php'); ?>
    <!--Page Header-->
    <!-- /Header -->

    <!--Page Header-->
    <section class="page-header profile_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>My Booking</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>My Booking</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <?php
    $useremail = $_SESSION['login'];
    $sql = "SELECT * from tblusers where EmailId=:useremail ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
      foreach ($results as $result) { ?>
        <section class="user_profile inner_pages">
          <div class="container">
            <!-- <div class="user_profile_info gray-bg padding_4x4_40">
              <div class="upload_user_logo"> <img src="assets/images/surety/headerlogo.png" alt="image">
              </div>

              <div class="dealer_info">
                <h5><?php echo htmlentities($result->FullName); ?></h5>
                <p><?php echo htmlentities($result->Address); ?><br>
                  <?php echo htmlentities($result->City); ?>&nbsp;<?php echo htmlentities($result->Country);
                                                                }
                                                              } ?></p>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-3 col-sm-3">
                <?php include('includes/sidebar.php'); ?>

                <div class="col-md-8 col-sm-8">
                  <div class="profile_wrap">
                    <h5 class="uppercase underline">My Booking </h5>
                    <div class="my_vehicles_list">
                      <ul class="vehicle_listing">
                        <?php
                        $useremail = $_SESSION['login'];
                        $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblbooking.driverid,tblvehicles.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail order by tblbooking.id desc";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                          foreach ($results as $result) {  ?>

                            <li>
                              <h4 style="color:red">Booking No #<?php echo htmlentities($result->BookingNumber); ?></h4>
                              <div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="image"></a> </div>
                              <div class="vehicle_title">

                                <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"> <?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                                <p><b>From </b> <?php echo htmlentities($result->FromDate); ?> <b>To </b> <?php echo htmlentities($result->ToDate); ?></p>
                                <div style="float: left">
                                  <p><b>Message:</b> <?php echo htmlentities($result->message); ?> </p>
                                </div>
                              </div>
                              <?php if ($result->Status == 1) { ?>
                                <div class="vehicle_status"> <a href="#" style="background-color: #7bc41d;" class="btn btn-xs active-btn">Approved</a>
                                  <div class="clearfix"></div>
                                </div>

                              <?php } else if ($result->Status == 2) { ?>
                                <div class="vehicle_status"> <a href="#" style="background-color: red;" class="btn outline btn-xs ">Rejected</a>
                                  <div class="clearfix"></div>
                                </div>



                              <?php } else { ?>
                                <div class="vehicle_status"> <a href="#" style="background-color: yellow;" class="btn outline btn-xs">Pending Approval</a>
                                  <div class="clearfix"></div>
                                </div>
                              <?php } ?>

                            </li>

                            <h5 style="color:blue">Invoice</h5>
                            <table>
                              <tr>
                                <th>Motorbike Name</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Total Days</th>
                                <th>Rent / Day</th>
                                <th>Drivers License</th>

                              </tr>
                              <tr>
                                <td><?php echo htmlentities($result->VehiclesTitle); ?>, <?php echo htmlentities($result->BrandName); ?></td>
                                <td><?php echo htmlentities($result->FromDate); ?></td>
                                <td> <?php echo htmlentities($result->ToDate); ?></td>
                                <td><?php echo htmlentities($tds = $result->totaldays); ?></td>
                                <td> <?php echo htmlentities($ppd = $result->PricePerDay); ?></td>
                                <td> <img width="70px" src="./img/id/<?php echo htmlentities($result->driverid); ?>" alt="image"></td>
                              </tr>
                              <tr>
                                <th colspan="4" style="text-align:center;"> Grand Total</th>
                                <th><?php echo htmlentities($tds * $ppd); ?></th>
                              </tr>
                            </table>
                            <hr />
                          <?php }
                        } else { ?>
                          <h5 align="center" style="color:red">No booking yet</h5>
                        <?php } ?>


                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <!--/my-vehicles-->
        <?php include('includes/footer.php'); ?>

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
        <script src="assets/switcher/js/switcher.js"></script>
        <!--bootstrap-slider-JS-->
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <!--Slider-JS-->
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
  </body>

  </html>
<?php } ?>