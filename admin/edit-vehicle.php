<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['alogin'])) {
	header("location: ../index.php");
} else {

	if (isset($_POST['submit'])) {
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$priceperday = $_POST['priceperday'];
		$fueltype = $_POST['fueltype'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$helmet = $_POST['helmet'];
		$powerdoorlocks = $_POST['powerdoorlocks'];
		$raincoat = $_POST['raincoat'];
		$brakeassist = $_POST['brakeassist'];
		$phoneholder = $_POST['phoneholder'];
		$driverairbag = $_POST['driverairbag'];
		$passengerairbag = $_POST['passengerairbag'];
		$phonecharger = $_POST['phonecharger'];
		$ndhelmet = $_POST['ndhelmet'];
		$centrallocking = $_POST['centrallocking'];
		$crashcensor = $_POST['crashcensor'];
		$ndraincoat = $_POST['ndraincoat'];
		$id = intval($_GET['id']);

		$sql = "update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,helmet=:helmet,PowerDoorLocks=:powerdoorlocks,raincoat=:raincoat,BrakeAssist=:brakeassist,phoneholder=:phoneholder,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,phonecharger=:phonecharger,ndhelmet=:ndhelmet,CentralLocking=:centrallocking,CrashSensor=:crashcensor,ndraincoat=:ndraincoat where id=:id ";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':helmet', $helmet, PDO::PARAM_STR);
		$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
		$query->bindParam(':raincoat', $raincoat, PDO::PARAM_STR);
		$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
		$query->bindParam(':phoneholder', $phoneholder, PDO::PARAM_STR);
		$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
		$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
		$query->bindParam(':phonecharger', $phonecharger, PDO::PARAM_STR);
		$query->bindParam(':ndhelmet', $ndhelmet, PDO::PARAM_STR);
		$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
		$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
		$query->bindParam(':ndraincoat', $ndraincoat, PDO::PARAM_STR);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$msg = "Data updated successfully";
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

		<title>Motorbike Rental Portal | Admin Edit Vehicle Info</title>

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

							<h2 class="page-title">Edit Vehicle</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>
										<div class="panel-body">
											<?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
											<?php
											$id = intval($_GET['id']);
											$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
											$query = $dbh->prepare($sql);
											$query->bindParam(':id', $id, PDO::PARAM_STR);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {	?>

													<form method="post" class="form-horizontal" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="vehicletitle" class="form-control" value="<?php echo htmlentities($result->VehiclesTitle) ?>" required>
															</div>
															<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<select class="selectpicker" name="brandname" required>
																	<option value="<?php echo htmlentities($result->bid); ?>"><?php echo htmlentities($bdname = $result->BrandName); ?> </option>
																	<?php $ret = "select id,BrandName from tblbrands";
																	$query = $dbh->prepare($ret);
																	//$query->bindParam(':id',$id, PDO::PARAM_STR);
																	$query->execute();
																	$resultss = $query->fetchAll(PDO::FETCH_OBJ);
																	if ($query->rowCount() > 0) {
																		foreach ($resultss as $results) {
																			if ($results->BrandName == $bdname) {
																				continue;
																			} else {
																	?>
																				<option value="<?php echo htmlentities($results->id); ?>"><?php echo htmlentities($results->BrandName); ?></option>
																	<?php }
																		}
																	} ?>

																</select>
															</div>
														</div>

														<div class="hr-dashed"></div>
														<div class="form-group">
															<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
															<div class="col-sm-10">
																<textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo htmlentities($result->VehiclesOverview); ?></textarea>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-2 control-label">Price Per Day(&#x20B1;)<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay); ?>" required>
															</div>
															<label class="col-sm-2 control-label">Select Transmission<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<select class="selectpicker" name="fueltype" required>
																	<option value="<?php echo htmlentities($result->FuelType); ?>"> <?php echo htmlentities($result->FuelType); ?> </option>

																	<option value="Automatic">Automatic</option>
																	<option value="Semi Automatic">Semi Automatic</option>
																	<option value="Manual">Manual</option>
																</select>
															</div>
														</div>


														<div class="form-group">
															<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="modelyear" class="form-control" value="<?php echo htmlentities($result->ModelYear); ?>" required>
															</div>
															<label class="col-sm-2 control-label">--<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->SeatingCapacity); ?>" required>
															</div>
														</div>
														<div class="hr-dashed"></div>
														<div class="form-group">
															<div class="col-sm-12">
																<h4><b>Vehicle Images</b></h4>
															</div>
														</div>


														<div class="form-group">
															<div class="col-sm-4">
																Image 1 <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 1</a>
															</div>
															<div class="col-sm-4">
																Image 2<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 2</a>
															</div>
															<div class="col-sm-4">
																Image 3<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 3</a>
															</div>
														</div>


														<div class="form-group">
															<div class="col-sm-4">
																Image 4<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 4</a>
															</div>


														</div>
														<div class="hr-dashed"></div>
										</div>
									</div>
								</div>
							</div>



							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Accessories & extras</div>
										<div class="panel-body">


											<div class="form-group">
												<div class="col-sm-3">
													<?php if ($result->helmet == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="helmet" name="helmet" checked value="1">
															<label for="helmet"> Helmet </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="helmet" name="helmet" value="1">
															<label for="helmet"> Helmet </label>
														</div>
													<?php } ?>
												</div>

												<div class="col-sm-3">
													<?php if ($result->raincoat == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="raincoat" name="raincoat" checked value="1">
															<label for="raincoat">Rain Coat </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="raincoat" name="raincoat" value="1">
															<label for="raincoat"> Rain Coat</label>
														</div>
													<?php } ?>
												</div>


												<div class="form-group">
													<?php if ($result->phoneholder == 1) {
													?>
														<div class="col-sm-3">
															<div class="checkbox checkbox-inline">
																<input type="checkbox" id="phoneholder" name="phoneholder" checked value="1">
																<label for="phoneholder">Phone Holder</label>
															</div>
														<?php } else { ?>
															<div class="col-sm-3">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" id="phoneholder" name="phoneholder" value="1">
																	<label for="phoneholder"> Phone Holder</label>
																</div>
															<?php } ?>
															</div>


															<div class="col-sm-3">
																<?php if ($result->phonecharger == 1) {
																?>
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" id="phonecharger" name="phonecharger" checked value="1">
																		<label for="phonecharger"> Phone Charger </label>
																	</div>
																<?php } else { ?>
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" id="phonecharger" name="phonecharger" value="1">
																		<label for="phonecharger"> Phone Charger</label>
																	</div>
																<?php } ?>
															</div>


															<div class="form-group">
																<div class="col-sm-3">
																	<?php if ($result->ndhelmet == 1) {
																	?>
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox" id="inlineCheckbox1" name="ndhelmet" checked value="1">
																			<label for="inlineCheckbox1"> 2nd Helmet </label>
																		</div>
																	<?php } else { ?>
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox" id="inlineCheckbox1" name="ndhelmet" value="1">
																			<label for="inlineCheckbox1"> 2nd Helmet </label>
																		</div>
																	<?php } ?>
																</div>


																<div class="col-sm-3">
																	<?php if ($result->ndraincoat == 1) {
																	?>
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox" id="ndraincoat" name="ndraincoat" checked value="1">
																			<label for="ndraincoat"> 2nd Rain Coat </label>
																		</div>
																	<?php } else { ?>
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox" id="ndraincoat" name="ndraincoat" value="1">
																			<label for="ndraincoat"> 2nd Rain Coat </label>
																		</div>
																	<?php } ?>
																</div>
															</div>

													<?php }
											} ?>


													<div class="form-group">
														<center>
															<div class="col-sm-8 col-sm-offset-2">

																<button class="btn btn-success" name="submit" type="submit" style="margin-top:4%">Update</button>
																<a href="manage-vehicles.php" class="btn btn-danger" style="margin-top:4%">Cancel</a>
															</div>
														</center>
													</div>

													</form>
														</div>
												</div>
											</div>
										</div>



									</div>
								</div>



							</div>
						</div>
					</div>

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