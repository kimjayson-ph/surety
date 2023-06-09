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
    <title>Motorbike Rental Portal | My Testimonials </title>
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
    <section class="page-header profile_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>My Testimonial</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>My Testimonial</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <?php
    $useremail = $_SESSION['login'];
    $sql = "SELECT * from tblusers where EmailId=:useremail";
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
                  <?php echo htmlentities($result->City); ?>&nbsp;<?php echo '';
                                                                }
                                                              } ?></p>
              </div>
            </div> -->

            <div class="row">
              <div class="col-md-3 col-sm-3">
                <?php include('includes/sidebar.php'); ?>
                <div class="col-md-8 col-sm-8">



                  <div class="profile_wrap">
                    <h5 class="uppercase underline">My Testimonial </h5>
                    <div class="my_vehicles_list">
                      <ul class="vehicle_listing">
                        <?php
                        $useremail = $_SESSION['login'];
                        $sql = "SELECT * from tbltestimonial where UserEmail=:useremail";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        if ($cnt = $query->rowCount() > 0) {
                          foreach ($results as $result) { ?>

                            <li>

                              <div>
                                <p><?php echo htmlentities($result->Testimonial); ?> </p>
                                <p><b>Posting Date:</b><?php echo htmlentities($result->PostingDate); ?> </p>
                              </div>
                              <?php if ($result->status == 1) { ?>
                                <div class="vehicle_status"> <a class="btn  btn-xs btn-success">Active</a>

                                  <div class="clearfix"></div>
                                </div>
                              <?php } else { ?>
                                <div class="vehicle_status"> <a href="#" style="background-color: yellow;" class="btn outline btn-xs">Pending Approval</a>
                                  <div class="clearfix"></div>
                                </div>
                              <?php } ?>
                            </li>
                        <?php }
                        } ?>

                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <!--/my-vehicles-->

        <!--Chatbot-->                
        <script type='text/javascript'>
          (function(I, L, T, i, c, k, s) {if(I.iticks) return;I.iticks = {host:c, settings:s, clientId:k, cdn:L, queue:[]};var h = T.head || T.documentElement;var e = T.createElement(i);var l = I.location;e.async = true;e.src = (L||c)+'/client/inject-v2.min.js';h.insertBefore(e, h.firstChild);I.iticks.call = function(a, b) {I.iticks.queue.push([a, b]);};})(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', 'HK3hq2em6gmh6mxAJ_c', {});
        </script>
        <!--End of Chatbot-->

        <<!--Footer -->
          <?php include('includes/footer.php'); ?>
          <!-- /Footer-->

          <!--Back to top-->
          <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

          <!-- Scripts -->
          <script src="assets/js/jquery.min.js"></script>
          <script src="assets/js/bootstrap.min.js"></script>
          <script src="assets/js/interface.js"></script>

          <!--bootstrap-slider-JS-->
          <script src="assets/js/bootstrap-slider.min.js"></script>
          <!--Slider-JS-->
          <script src="assets/js/slick.min.js"></script>
          <script src="assets/js/owl.carousel.min.js"></script>

  </body>

  </html>
<?php } ?>