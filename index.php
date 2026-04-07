<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HMS Home page</title>
	<style>
		a:link {
			text-decoration: none;
		}
	</style>
</head>
<body style="background-image: url(img/back.jpg); background-size: cover; height: 100vh;">
	<?php
include("include/header.php");
?>
<div style="margin-top: 50px"></div> 
<div class="container"> 
	<div class="col-md-12"> 
		<div class="d-flex flex-column flex-md-row justify-content-center" > 
			<div class="col-md-4 col-12 mb-4 mx-1 shadow bg-light rounded"> 
				<img src="img/info.jpg" style="width: 100%; height: 250px"> 
				<h5 class="text-center">Click on the button for more infomation</h5> 
				<a href="#" class="d-flex flex-row justify-content-center"> 
					<button class="btn btn-success my-3"> 
					More Information</button> 
				</a> 
			</div> 
			<div class="col-md-4 col-12 mb-4 mx-1 shadow bg-light rounded">
				<img src="img/patient.jpg" style="width: 100%;"> 
				<h5 class="text-center">Create Account so that we can take good care of you.</h5> 
				<a href="account.php" class="d-flex flex-row justify-content-center"> 
					<button class="btn btn-success my-3"> 
					Create Account!!!</button> 
				</a> 
			</div> 
			<div class="col-md-4 col-12 mb-4 mx-1 shadow bg-light rounded">
				<img src="img/doctor.jpg" style="width: 100%;"> 
				<h5 class="text-center">We are employing for doctors</h5> 
				<a href="apply.php" class="d-flex flex-row justify-content-center"> 
					<button class="btn btn-success my-3"> 
					Apply Now!!!</button> 
				</a>
			</div>
		</div>
	</div>
</div>

</body>
</html>