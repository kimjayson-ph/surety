<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['alogin'])) {
	header("location: ../index.php");
} else {
	if (isset($_REQUEST['eid'])) {
		$eid = intval($_GET['eid']);
		$status = "2";
		$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Booking Successfully Rejected";
	}


	if (isset($_REQUEST['aeid'])) {
		$aeid = intval($_GET['aeid']);
		$status = 1;

		$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Booking Successfully Approved";
	}

	if (isset($_REQUEST['del'])) {
		$delid = intval($_GET['del']);
		$sql = "delete from tblbooking  WHERE  id=:delid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':delid', $delid, PDO::PARAM_STR);
		$query->execute();
		$msg = "Booking deleted successfully";
	}


?>

	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/surety/suretyfavicon.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/images/surety/suretyfavicon.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/surety/suretyfavicon.png">
		<link rel="apple-touch-icon-precomposed" href="../assets/images/surety/suretyfavicon.png">
		<link rel="shortcut icon" href="../assets/images/surety/suretyfavicon.png">

		<title>Motorbike Rental Portal |Admin Manage testimonials </title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
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
		<?php include('includes/header.php'); ?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Manage Bookings</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">Bookings Info</div>
								<div class="panel-body">
									<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>

												<th>Vehicle</th>
												<th>From Date</th>
												<th>To Date</th>
												<th>Message</th>
												<th>Drivers License</th>
												<th>Posting date</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>#</th>
												<th>Name</th>

												<th>Vehicle</th>
												<th>From Date</th>
												<th>To Date</th>
												<th>Message</th>
												<th>Drivers License</th>
												<th>Posting date</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</tfoot>
										<tbody>

											<?php $sql = "SELECT  tblvehicles.PricePerDay,tblusers.City,tblusers.Address,tblusers.ContactNo,tblusers.EmailId,tblusers.FullName,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.BookingNumber,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totalnodays,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.driverid,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id  ";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {				?>
													<tr>
														<td><?php echo htmlentities($cnt); ?></td>
														<td><?php echo htmlentities($result->FullName); ?></td>

														<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></td>
														<td><?php echo htmlentities($result->FromDate); ?></td>
														<td><?php echo htmlentities($result->ToDate); ?></td>
														<td><?php echo htmlentities($result->message); ?></td>
														<td> <img width="60px" src="../img/id/<?php echo htmlentities($result->driverid); ?>" alt="image"></td>

														<td><?php echo htmlentities($result->PostingDate); ?></td>
														<td><?php
															if ($result->Status == 0) {
																echo htmlentities('Pending approval');
															} else if ($result->Status == 1) {
																echo htmlentities('Approved');
																$mail_send =  ($result->EmailId);
																$booking_number = ($result->BookingNumber);
																$booking_name = ($result->FullName);
																$booking_email = ($result->EmailId);
																$booking_contact = ($result->ContactNo);
																$booking_address = ($result->Address);
																$booking_city = ($result->City);
																$booking_brand = ($result->BrandName);
																$booking_motorname = ($result->VehiclesTitle);
																$booking_date = ($result->PostingDate);
																$booking_todate = ($result->ToDate);
																$booking_fromdate = ($result->FromDate);
																$booking_totaldays = ($result->totalnodays);
																$booking_perday = ($result->PricePerDay);
																$booking_total = ($result->PricePerDay);
															} else {
																echo htmlentities('Rejected');
															}
															?></td>
														<td><a href="manage-bookings.php?aeid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to Approve this booking')"> Approve</a> /


															<a href="manage-bookings.php?eid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to Reject this Booking')"> Reject</a> /

															<a href="manage-bookings.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete');"><i style="color: #7bc41d;" class="fa fa-trash"></i></a>
														</td>

													</tr>

											<?php $cnt = $cnt + 1;
												}
											}
											?>


										</tbody>
									</table>



								</div>
							</div>


						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- 	phpmailer -->
		<?php




		//Load Composer's autoloader
		require '../vendor/autoload.php';

		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings

			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'suretymotorental@gmail.com';                     //SMTP username
			$mail->Password   = 'p3FXNxTQkUHdmt9V';                               //SMTP password

			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('suretymotorental@gmail.com', 'Suretymotorental');
			$mail->addAddress($mail_send);     //Add a recipient

			$mail->addReplyTo('suretymotorental@gmail.com', '');


			//Attachments
			/* $mail->addAttachment(path: '../assets/images/surety/headerlogo.png'); */         //Add attachments

			/* "Booking no. {$booking_number} " */
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Suretymotorental Booking Approval';
			$mail->Body    = "<h2 style='color:yellowgreen'>SuretyMotoRental </h2>
			<h3 style='color:red'>Booking Status: Approved </h3>

			<tr>
				<center><th  style='color:blue'>User Details</th></center>
			</tr>
			<tr>
				<th>Booking No.</th>
				<td>{$booking_number}</td>
				<th>Name</th>
				<td>{$booking_name}</td>
			</tr>
			<tr>
				<th>Email Id</th>
				<td>{$booking_email}</td>
				<th>Contact No</th>
				<td>{$booking_contact}</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>{$booking_address}</td>
				<th>City</th>
				<td>{$booking_city}</td>
			</tr>


			<tr>
				<center><th  style='color:blue'>Booking Details</th></center>
			</tr>
			<tr>
				<th>Motorbike Name</th>
				<td>{$booking_brand} {$booking_motorname}</td>
				<th>Booking Date</th>
				<td>{$booking_date}</td>
			</tr>
			<tr>
				<th>From Date</th>
				<td>{$booking_fromdate}</td>
				<th>To Date</th>
				<td>{$booking_todate}</td>
			</tr>
			<tr>
				<th>Total Days</th>
				<td>{$booking_totaldays}</td>
				<th>Rent Per Days</th>
				<td>{$booking_perday}</td>
			</tr>
			<tr>
				<center><th  >Grand Total</th></center>
				<td>{$booking_total}</td>
			</tr> ";



			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			/* echo 'Message has been sent'; */
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		} ?>

		<!-- 	phpmailer -->


		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>
<?php } ?>