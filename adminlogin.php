<?php 
session_start();
include("include/connection.php"); 

if (isset($_POST['login'])) { 

	$username = $_POST['uname']; 
	$password = $_POST['pass']; 

	$error = array(); 

	if (empty($username)) { 
		$error['admin'] = "Enter Username"; 
	}else if(empty($password)){ 
		$error['admin'] = "Enter Password"; 
	} 

	if (count($error)==0) { 

		$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'"; 

		$result = mysqli_query($connect,$query); 

		if (mysqli_num_rows($result) == 1) { 
			echo "<script>alert('You have Login As an admin')</script>"; 
			$_SESSION['admin'] = $username; 

			header("Location:admin/index.php");
			exit();
			
		}else{ 
			echo "<script>alert('Invaild Username or Password')</script>"; 
		}
	} 
}
?>

<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login Page</title> 
</head>
<body style="background-image: url(img/back.jpg); background-size: cover; height: 100vh;">

	<?php 
	include("include/header.php"); 
	?> 

	<div class="container" style="margin-top: 20px;"> 
		<div class="col-md-12"> 
			<div class="d-flex flex-row justify-content-center"> 
				<div class="col-md-6 mt-4 p-5 bg-light rounded"> 
					<img src="img/admin.png" class="col-md-12 center" style="display: block; width: 60%; margin-right: auto; margin-left: auto;"> 
					<form method="post" class="my-2">
						<div> 
							<?php 
								if (isset($error['admin'])) { 
									$sh = $error['admin']; 
									$show = "<h4 class='alert alert-danger'>$sh</h4>";

								}else{ 
									$show = ""; 
								} 
								echo $show; 
							?> 
						</div>

						<div class="form-group"> 
							<label>Username</label> 
							<input type="text" name="uname" class="form-control" 
							autocomplete="off" placeholder="Enter Username">
						</div> 
						<div class="form-group"> 
							<label>Password</label> 
							<input type="password" name="pass" class="form-control"> 
						</div> 
						<input type="submit" name="login" class="btn btn-success my-2" value="login">
					</form> 
				</div> 
			</div> 
		</div> 
	</div>
</body>
</html>