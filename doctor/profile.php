<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor's Profile</title>
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
					<div class="container-fluid">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">

									<?php 
										$doc = $_SESSION['doctor']; 
										$query = "SELECT * FROM doctors WHERE username='$doc'"; 
										$res = mysqli_query($connect,$query); 
										$row = mysqli_fetch_array($res);

									?> 
									<h4><?php echo $row['username']; ?>'s Profile</h4>
									<form method="post"> 
										<?php 
											echo "<img src='img/doctorlogo.png' style='width: 250px;' class='col-md-12 my-3'>"; 
										?> 
									</form>
									
									<div class="my-3">
										<table class="table table-bordered">
											<tr>
												<th colspan="2" class="text-center">Details</th>
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
												<td>Phone No.</td>
												<td><?php echo $row['phone']; ?></td>
											</tr>

											<tr>
												<td>Firstname</td>
												<td><?php echo $row['firstname']; ?></td>
											</tr>

											<tr>
												<td>Gender</td>
												<td><?php echo $row['gender']; ?></td>
											</tr>

											<tr>
												<td>Salary</td>
												<td><?php echo "₹".$row['salary']; ?></td>
											</tr>
										</table>
									</div>	
								</div>
								<div class="col-md-6"> 
									<br><h5 class="text-center my-2">Change Username</h5>

									<?php 
										if (isset($_POST['change_uname'])) { 
											$uname = $_POST['uname']; 
											if (empty($uname)) {

											}else{ 
												$query = "UPDATE doctors SET username='$uname' WHERE username='$doc'"; 
												$res = mysqli_query($connect,$query); 
												if ($res) { 
													$_SESSION['doctor'] = $uname; 
												} 
											} 
										} 
									?>


									<form method="post"> 
										<label>Change Username</label> 
										<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"> 
										<input type="submit" name="change_uname" class="btn btn-success mt-2" value="Change Username"> 
									</form><br> 
									<h5 class="text-center my-2">Change Password</h5> 

									<?php 
										if (isset($_POST['change_pass'])) { 
											$old = $_POST['old']; 
											$new = $_POST['new']; 
											$con = $_POST['con']; 
											$error = array();
											$ol = "SELECT * FROM doctors WHERE username='$doc'"; 
											$ols = mysqli_query($connect,$ol); 
											$row = mysqli_fetch_array($ols); 
											$pass = $row['password'];


											if (empty($old)) { 
												$error['p'] = "Enter old password"; 
											}else if(empty($new)){ 
												$error['p'] = "Enter New Password"; 
											}else if(empty($con)){ 
												$error['p'] = "Confirm Password"; 
											}else if($old != $pass){ 
												$error['p'] = "Invalid Old Password"; 
											}else if($new != $con){
												$error['p'] = "Both password does not match";
											}

											if (count($error)==0) { 
												$query = "UPDATE doctors SET password='$new' WHERE username='$doc'"; 
												mysqli_query($connect,$query); 
											} 
										}
										if (isset($error['p'])) { 
											$e = $error['p']; 
											$show = "<h5 class='text-center alert alert-danger'>$e</h5>"; 
										}else{ 
											$show = ""; 
										}
									?>

									<form method="post"> 
										<div>
											<?php 
												echo $show;
											?>
										</div>
										<div class="form-group"> 
											<label>Old Password</label> 
											<input type="password" name="old" class="form-control" autocomplete="off" placeholder="Enter Old Password"> 
										</div>
										<div class="form-group"> 
											<label>New Password</label> 
											<input type="password" name="new" class="form-control" autocomplete="off" placeholder="Enter New Password"> 
										</div>
										<div class="form-group"> 
											<label>Confirm Password</label> 
											<input type="password" name="con" class="form-control" autocomplete="off" placeholder="Enter Confirm Password"> 
										</div>
										<input type="submit" name="change_pass" class="btn btn-info mt-2" value="Change Password">
									</form>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>