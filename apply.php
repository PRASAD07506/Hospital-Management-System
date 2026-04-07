<?php 
	include("include/connection.php"); 
	if (isset($_POST['apply'])) { 
		$firstname = $_POST['fname']; 
		$surname = $_POST['sname'];  
		$username = $_POST['uname'];
		$email = $_POST['email']; 
		$gender = $_POST['gender']; 
		$phone = $_POST['phone'];  
		$password = $_POST['pass']; 
		$confirm_password = $_POST['con_pass']; 
		$error = array(); 
		if (empty($firstname)) { 
			$error['apply'] = "Enter Firstname"; 
		}else if(empty($surname)){ 
			$error['apply'] = "Enter Surname"; 
		}else if(empty($username)){ 
			$error['apply'] = "Enter username";
		}else if(empty($email)){ 
			$error['apply'] = "Enter Email Address"; 
		}else if($gender == ""){ 
			$error['apply'] = "Select Your Gender"; 
		}else if(empty($phone) or strlen($phone) != 10) { 
			$error['apply'] = "Enter Valid Phone Number"; 
		}else if(empty($password)){ 
			$error['apply'] = "Enter Password"; 
		}else if($confirm_password != $password) { 
			$error['apply'] = "Both Password do not match"; 
		}

		if (count($error) == 0) {
			$date_reg = new DateTime('now', new DateTimeZone('Asia/Kolkata')); // IST timezone
            $date_reg_str = $date_reg->format('Y-m-d H:i:s');

			$query = "INSERT INTO doctors (firstname, surname, username, email, gender, phone, password, salary, data_reg, status) VALUES ('$firstname', '$surname', '$username', '$email', '$gender', '$phone', '$password', '0 ', '$date_reg_str', 'Pending')"; 
			$result = mysqli_query($connect,$query);
			if ($result) {
				echo "<script>alert('Thank you for creating account')</script>"; 
			}else{ 
				echo "<script>alert('Failed')</script>"; 
			}
		}
	}



	if (isset($error['apply'])){
		$s = $error['apply'];
		$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
	}else{
		$show = "";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apply Now!!!</title>
</head>
<body style="background-image: url(img/back.jpg); background-size: cover; height: 100vh;">

	<?php 
		include("include/header.php");
	?>

	<div class="container">
		<div class="col-md-12"> 
			<div class="row"> 
				<div class="col-md-3"></div> 
				<div class="col-md-6 my-3 mt-4 p-5 bg-light rounded"> 
					<h5 class="text-center">Apply Now!!!</h5> 
					<div>
						<?php echo $show; ?>
					</div> 
					<form method="post"> 
						<div class="form-group"> 
							<label>Firstname</label> 
							<input type="text" name="fname" class="form-control" 
							autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"> 
						</div> 
						<div class="form-group"> 
							<label>Surname</label> 
							<input type="text" name="sname" class="form-control" 
							autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>"> 
						</div> 
						<div class="form-group"> 
							<label>Username</label> 
							<input type="text" name="uname" class="form-control" 
							autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>"> 
						</div> 
						<div class="form-group"> 
							<label>Email</label> 
							<input type="email" name="email" class="form-control" 
							autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"> 
						</div> 
						<div class="from-group"> 
							<label>Select Gender</label> 
							<select name="gender" class="form-control"> 
								<option value="">Select Gender</option> 
								<option value="Male">Male</option> 
								<option value="Female">Female</option> 
							</select> 
						</div>
						<div class="form-group"> 
							<label>Phone Number</label> 
							<input type="number" name="phone" class="form-control" 
							autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"> 
						</div> 
						<div class="form-group"> 
							<label>Password</label> 
							<input type="password" name="pass" class="form-control" 
							autocomplete="off" placeholder="Enter Password"> 
						</div> 
						<div class="form-group"> 
							<label>Confirm Password</label> 
							<input type="password" name="con_pass" class="form-control" 
							autocomplete="off" placeholder="Enter Confirm Password"> 
						</div> 
						<input type="submit" name="apply" value="Apply Now" class="btn 
						btn-success mt-2"> 
						<p>Already have an account?<a href="doctorlogin.php">Click 
						here</a></p> 
					</form> 
				</div>
			</div>
		</div>
	</div>
</body>
</html>