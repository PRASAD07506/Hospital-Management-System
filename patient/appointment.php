<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Appointment</title>
</head>
<body>

	<?php 
		include("../include/header.php"); 
		include("../include/connection.php"); 
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
					<h5 class="text-center my-2">Book Appointment</h5> 
					<?php 
						$pat = $_SESSION['patient']; 
						$sel = mysqli_query($connect,"SELECT * FROM patient WHERE username='$pat'");
						$row = mysqli_fetch_array($sel);
						$firstname = $row['firstname'];
						$surname = $row['surname'];
						$gender = $row['gender'];
						$phone = $row['phone'];

						if (isset($_POST['book'])) {
							$date = $_POST['date'];
							$sym = $_POST['sym'];

							if (empty($date)) {
								echo "<h5 class='text-center alert alert-danger'>Enter Date</h5>";

							}else if (empty($sym)) {
								echo "<h5 class='text-center alert alert-danger'>Enter Symptoms</h5>";

							}else{
								$date_reg = new DateTime('now', new DateTimeZone('Asia/Kolkata')); // IST timezone
        					    $date_reg_str = $date_reg->format('Y-m-d H:i:s');

								$query = "INSERT INTO appointment(firstname,surname,gender,phone,appointment_date, symptoms,status,date_booked) VALUES('$firstname','$surname','$gender','$phone','$date','$sym','Pending','$date_reg_str')";

								$res = mysqli_query($connect,$query);

								if ($res) {
									echo "<script>alert('You have booked an appointment.')</script>";
								}
							}
						}
					?>

					<div class="d-none d-md-block col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6 mt-4 p-5 bg-light rounded">
								<form method="post">
									<label>Appointment Date</label>
									<input type="date" name="date" class="form-control">

									<label>Symptoms</label>
									<input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">
									<input type="submit" name="book" class="btn btn-info my-2" value="Book Appointments">
								</form>
							</div>
						</div>
					</div>

					<div class="d-block d-md-none col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="mt-4 p-3 bg-light rounded">
								<form method="post">
									<label>Appointment Date</label>
									<input type="date" name="date" class="form-control">

									<label>Symptoms</label>
									<input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">
									<input type="submit" name="book" class="btn btn-info my-2" value="Book Appointments">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>