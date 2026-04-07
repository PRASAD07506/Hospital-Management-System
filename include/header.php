<?php
	$hmsBasePath = '';
	$currentDirectory = basename(dirname($_SERVER['SCRIPT_NAME']));
	if (in_array($currentDirectory, array('admin', 'doctor', 'patient'))) {
		$hmsBasePath = '../';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hospital Management System</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $hmsBasePath; ?>css/theme.css">

	<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-info bg-info px-3 py-2">
		<h5 class="text-white">Hospital Management System</h5>

		<div class="ms-auto"></div>

		<ul class="navbar-nav d-flex flex-row">
			<?php
				if (isset($_SESSION['admin'])) {

					$user = $_SESSION['admin'];

					echo'
					<li class="nav-item me-2"><a href="#" class="nav-link text-white"><i class="fa fa-user-shield me-1"></i>'.$user.'</a></li>
					<li class="nav-item me-2"><a href="logout.php" class="nav-link text-white"><i class="fa fa-right-from-bracket me-1"></i>Logout</a></li> ';
				 }

				 else if(isset($_SESSION['doctor'])){
					$user = $_SESSION['doctor'];
					echo'
					<li class="nav-item me-2"><a href="#" class="nav-link text-white"><i class="fa fa-user-doctor me-1"></i>'.$user.'</a></li>
					<li class="nav-item me-2"><a href="logout.php" class="nav-link text-white"><i class="fa fa-right-from-bracket me-1"></i>Logout</a></li>';
				  }

				  else if(isset($_SESSION['patient'])){
					$user = $_SESSION['patient'];
					echo'
					<li class="nav-item me-2"><a href="#" class="nav-link text-white"><i class="fa fa-hospital-user me-1"></i>'.$user.'</a></li>
					<li class="nav-item me-2"><a href="logout.php" class="nav-link text-white"><i class="fa fa-right-from-bracket me-1"></i>Logout</a></li>';
				  }

				 else{
					echo'

					<li class="nav-item me-2"><a href="index.php" class="nav-link text-white">Home</a></li>
					<li class="nav-item me-2"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
					<li class="nav-item me-2"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
					<li class="nav-item me-2"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';


				 }
			?>

		</ul>
	</nav>

</body>
</html>
