<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Dashboard</title>
	<style>
		a:link {
			text-decoration: none;
		}
	</style>
</head>
<body>

	<?php
		include("../include/header.php");
		include("../include/connection.php")
	 ?>

	 <div class="container-fluid"> 
		<div class="col-md-12"> 
			<div class="row"> 
			<div class="col-5 col-md-2" style="margin-left: -30px;"> 
				<?php 
					include("sidenav.php"); 
				?> 
			</div> 
			<div class="col-7 col-md-10"> 
				<h5 class="my-3">Patient Dashboard</h5> 
				<div class="col-md-12"> 
					<div class="row"> 
						<div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;"> 
							<div class="col-md-12"> 
								<div class="row"> 
									<div class="col-md-8"> 
										<a href="profile.php">
											<h5 class="text-white my-4">My Profile</h5>
										</a>
									</div> 
									<div class="col-md-4"> 
									<a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a> 
									</div> 
								</div> 
							</div> 
						</div>

						<div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;"> 
							<div class="col-md-12"> 
								<div class="row"> 
									<div class="col-md-8"> 
										<a href="appointment.php">
											<h5 class="text-white my-4">Book Appointment</h5>
										</a>
									</div> 
									<div class="col-md-4"> 
									<a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a> 
									</div> 
								</div> 
							</div> 
						</div>

						<div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;"> 
							<div class="col-md-12"> 
								<div class="row"> 
									<div class="col-md-8">
										<a href="invoice.php"> 
											<h5 class="text-white my-4">My Invoice</h5> 
										</a>
									</div> 
									<div class="col-md-4"> 
										<a href="invoice.php"><i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i></a> 
									</div> 
								</div> 
							</div> 
						</div>

						<?php 
							if (isset($_POST['send'])) { 
								$title= $_POST['send']; 
								$message = $_POST['message']; 
								if (empty($title)) { 
									echo "<h5 class='text-center alert alert-danger'>Enter Title</h5>";
								}else if(empty($message)){ 
									echo "<h5 class='text-center alert alert-danger'>Enter Message</h5>";

								}else{ 
									$date_reg = new DateTime('now', new DateTimeZone('Asia/Kolkata')); // IST timezone
          							$date_reg_str = $date_reg->format('Y-m-d H:i:s');
          							
									$user = $_SESSION['patient']; 
									$query = "INSERT INTO report(title, message, username, date_send) VALUES('$title', '$message', '$user', '$date_reg_str')"; 
									$res = mysqli_query($connect,$query); 
									if ($res) { 
										echo "<script>alert('You have sent Your Report')</script>";
									}
								} 
							} 
						?>

						<div class="d-none d-md-block col-md-6 p-5 bg-info rounded bg-info my-5" style=" margin-left: auto; margin-right: auto;"> 
							<h5 class="text-center my-2">Send A Report</h5> 
							<form method="post"> 
								<label>Title</label> 
								<input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report"> 
								<label>Message</label> 
								<input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message"> 
								<input type="submit" name="send" value="Send Report" class="btn btn-success my-2"> 
							</form> 
						</div> 

						<div class="d-block d-md-none  p-3 bg-info rounded bg-info my-5" style="display: block; margin-left: auto; margin-right: auto;"> 
							<h5 class="text-center my-2">Send A Report</h5> 
							<form method="post"> 
								<label>Title</label> 
								<input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report"> 
								<label>Message</label> 
								<input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message"> 
								<input type="submit" name="send" value="Send Report" class="btn btn-success my-2" style="display: block; margin-left: auto; margin-right: auto;"> 
							</form> 
						</div> 


					</div>
				</div>
			</div> 
		</div> 
	</div>

</body>
</html>