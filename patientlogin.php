<?php
session_start();

include("include/connection.php");

if (isset($_POST['login'])) {

	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	if (empty($uname)) { 
		echo "<script>alert('Enter Username')</script>"; 
	}else if (empty($pass)) { 
		echo "<script>alert('Enter Password')</script>"; 
	}else{ 
		$query = "SELECT * FROM patient WHERE username='$uname' AND password='$pass'"; 
		$res = mysqli_query($connect, $query); 
		if (mysqli_num_rows($res)==1) { 
			header("Location: patient/index.php");
			$_SESSION['patient'] = $uname;
		}else{ 
			echo "<script>alert('Invailed Account')</script>"; 
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Login Page</title>
</head>
<body style="background-image: url(img/back.jpg); background-size: cover; height: 100vh;">
	<?php 
	include("include/header.php"); 
	?>

	<div class="container"  style="margin-top: 20px;"> 
		<div class="col-md-12"> 
			<div class="d-flex flex-row justify-content-center"> 
				<div class="col-md-6 mt-4 p-5 bg-light rounded"> 
					<img src="img/patientlogo.png" class="col-md-12 text-center" style="display: block; width: 40%; margin-right: auto; margin-left: auto; ;">
					<h5 class="text-center my-2">Patient Login</h5> 
					<form method="post"> 
						<div class="form-group"> 
							<label>Username</label> 
							<input type="text" name="uname" class="form-control" 
							autocomplete="off" placeholder="Enter Username"> 
						</div> 
						<div class="form-group"> 
							<label>Password</label> 
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password"> 
						</div> 
						<input type="submit" name="login" class="btn btn-info my-2" value="Login"> 
						<p>Don't have an account? <a href="account.php">Click here.</a></p> 
					</form> 
				</div>
			</div>
		</div>
	</div>

</body>
</html>