<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Profile</title>
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
						$patient = $_SESSION['patient']; 
						$query = "SELECT * FROM patient WHERE username='$patient'"; 
						$res= mysqli_query($connect,$query); 
						$row = mysqli_fetch_array($res);
					?> 
				</div> 
			<div class="col-7 col-md-10"> 
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h4><?php echo $row['username']; ?>'s Profile</h4>
							<form method="post" enctype="multipart/form-data">
								<?php
									echo "<img src='img/patientlogo.png' class='col-md-12' style='width: 250px;'>";
								?>
							</form>

							<table class="table table-bordered"> 
								<tr> 
									<th colspan="2" class="text-center">My Details</th> 
								</tr> 
								<tr> 
									<td>Firstname</td> 
									<td><?php echo $row['firstname']; ?></td> 
								</tr> 
								<tr> 
									<td>Surname</td> 
									<td><?php echo $row['surname']; ?></td> 
								</tr> 
								<tr> 
									<td>Username</td> 
									<td><?php echo $row['username']; ?></td> 
								</tr> 
								<tr> 
									<td>Email</td> 
									<td><?php echo $row['email']; ?></td> 
								</tr>
								<tr> 
									<td>Phone Number</td> 
									<td><?php echo $row['phone']; ?></td> 
								</tr> 
								<tr> 
									<td>Gender</td> 
									<td><?php echo $row['gender']; ?></td> 
								</tr>
								<tr> 
									<td>Email</td> 
									<td><?php echo $row['email']; ?></td> 
								</tr>
							</table> 
						</div>
						<div class="col-md-6">
							<h5 class="text-center">Change Username</h5> 
							<?php 
								if (isset($_POST['update'])) { 
									$uname = $_POST['uname']; 
									if (empty($uname)) { 
										echo "<h5 class='text-center alert alert-danger'>Enter Date</h5>";
									}else{ 
										$query = "UPDATE patient SET username='$uname' WHERE username='$patient'"; 
										$res= mysqli_query($connect,$query); 
										if ($res) { 
											$_SESSION['patient'] = $uname; 
										} 
									}
								}
							?>

							<form method="post"> 
								<label>Enter Username</label> 
								<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"> 
								<input type="submit" name="update" class="btn btn-info my-2" value="Update Username"> 
							</form> 
								<?php 
									if (isset($_POST['change'])) { 
										$old = $_POST['old']; 
										$new = $_POST['new']; 
										$con = $_POST['con']; 
										$q = "SELECT * FROM patient WHERE username='$patient'"; 
										$re = mysqli_query($connect,$q); 
										$row = mysqli_fetch_array($re); 
										if (empty($old)) { 
											echo "<script>alert('Enter old Password')</script>"; 
										}else if(empty($new)){ 
											echo "<script>alert('Enter New Password')</script>"; 
										}else if(empty($con)){ 
											echo "<script>alert('Confirm Password')</script>";
										}else if ($con != $new) { 
											echo "<script>alert('Both Password do not match')</script>"; 
										}else if ($old != $row['password']) { 
											echo "<script>alert('Check the password')</script>"; 
										}else{ 
											$query = "UPDATE patient SET password='$new' WHERE username='$patient'"; 
											mysqli_query($connect,$query);
										}
									}
								?>

								<h5 class="my-4 text-center">Change Password</h5> 
								<form method="post"> 
									<label>Old Password</label> 
									<input type="password" name="old" class=" form-control" autocomplete="off" placeholder="Enter old Password"> 
									<label>New Password</label> 
									<input type="password" name="new" class="form-control" autocomplete="off" placeholder="Enter New Password"> 
									<label>Confirm Password</label> 
									<input type="password" name="con" class="form-control" autocomplete="off" placeholder="Enter Confirm Password"> 
									<input type="submit" name="change" class="btn btn-info my-2" value="Change Password">
								</form>
						</div>
					</div>
				</div>
			</div> 
		</div> 
	</div>

</body>
</html>