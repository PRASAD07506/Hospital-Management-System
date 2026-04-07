<?php 
	include("include/connection.php");
	if (isset($_POST['create'])) {

		$fname = $_POST['fname']; 
		$sname = $_POST['sname']; 
		$uname = $_POST['uname']; 
		$email = $_POST['email']; 
		$phone = isset($_POST['phone']) ? $_POST['phone'] : '';  
		$gender = $_POST['gender'];  
		$password = $_POST['pass']; 
		$con_pass = $_POST['con_pass'];

		$error = array(); 

		if (empty($fname)) { 
			$error['ac'] = "Enter Firstname"; 
		}else if(empty($sname)){ 
			$error['ac'] = "Enter Surname"; 
		}else if(empty($uname)) { 
			$error['ac'] = "Enter Username"; 
		}else if(empty($email)){ 
			$error['ac'] = "Enter Email"; 
		}else if(empty($phone) or strlen($phone) != 10){ 
			$error['ac'] = "Enter valid Phone Number"; 
		}else if($gender == ""){ 
			$error['ac'] = "Enter Your Gender"; 
		}else if(empty($password)){ 
			$error['ac'] = "Enter Password";
		}else if($con_pass != $password){ 
			$error['ac'] = "Both password do not match"; 
		}

		if (count($error)==0) { 

			$date_reg = new DateTime('now', new DateTimeZone('Asia/Kolkata')); // IST timezone
            $date_reg_str = $date_reg->format('Y-m-d H:i:s');

			$query = "INSERT INTO patient (firstname, surname, username, email, phone, gender, password, date_reg, profile) VALUES ('$fname', '$sname', '$uname', '$email', '$phone', '$gender', '$password', '$date_reg_str', 'patient.jpg')"; 
			$res = mysqli_query($connect,$query); 
			if ($res) {
				echo "<script>alert('Thank you for creating account')</script>";
			}else{ 
				echo "<script>alert('failed')</script>";
			}
		}
	}

	if (isset($error['apply'])){
		$s = $error['ac'];
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
	<title>Create Account</title>
</head>
<body>

	<?php
		include("include/header.php");
	?>

	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-2 mt-4 p-5 bg-light rounded">
					<h5 class="text-center text-info my-2">Create Patient Account</h5>

					<?php // Display errors above the form
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>"; // Use Bootstrap alert
                            foreach ($error as $message) {
                                echo "<p>$message</p>";
                            }
                            echo "</div>";
                        }
                    ?>

					<form method="post">
						<div class="form-group">
							<lable>Firstname</lable>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
						</div>

						<div class="form-group"> 
							<label>Surname</label> 
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname"> 
						</div> 

						<div class="form-group"> 
							<label>Username</label> 
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"> 
						</div> 

						<div class="form-group"> 
							<label>Email</label> 
							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email"> 
						</div>

						<div class="form-group"> 
							<label>Phone No</label> 
							<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number"> 
						</div>

						<div class="form-group"> 
							<label>Gender</label> 
							<select name="gender" class="form-control"> 
								<option value="">Select Your Gender</option> 
								<option value="Male">Male</option> 
								<option value="Female">Female</option> 
							</select> 
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
							<input type="submit" name="create" value="Create Account" class="btn btn-info mt-2"> 
							<p>I already have an account <a href="patientlogin.php">Click Here</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>