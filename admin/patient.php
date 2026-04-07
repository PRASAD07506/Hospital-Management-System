<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Total Patient</title>
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
					<h5 class="text-center my-3">Total Patient</h5>
					<?php 
						$query = "SELECT * FROM patient"; 
						$res = mysqli_query($connect, $query); 
						$output = ""; 
						$output .= "
						<table class='table table-bordered'> 
							<tr> 
								<td>ID</td> 
								<td>Firstname</td> 
								<td>Surname</td> 
								<td>Username</td> 
								<td>Email</td> 
								<td>Phone </td> 
								<td>Gender</td> 
								<td>Date Reg.</td> 
							</tr> 
						"; 
						if (mysqli_num_rows($res) < 1) { 
							$output .= " 
							<tr> 
							<td class='text-center' colspan='10'> No Patient Yet</td> 
							</tr>
							";
						}

						while($row = mysqli_fetch_array($res)){ 
							$id = $row['id'];

							$output .="
							<tr> 
							<td>".$row['id']."</td>
							<td>".$row['firstname']."</td>
							<td>".$row['surname']."</td>
							<td>".$row['username']."</td> 
							<td>".$row['email']."</td> 
							<td>".$row['phone']."</td> 
							<td>".$row['gender']."</td>  
							<td>".$row['date_reg']."</td> 
							<td> 
								<a href='view.php?id=".$row['id']."'> 
								 	<button class='btn btn-info'>View</button> 
								</a>
								<a href='patient.php?id=$id'>
									<button id='$id' class='btn btn-danger remove'>Remove</button>
								</a> 
							</td>
							";
						}

						$output .="
						</tr>
						</table>";

						echo $output;

						if (isset($_GET['id'])){
							$id = $_GET['id'];

							$query = "DELETE FROM patient WHERE id='$id'";
							mysqli_query($connect,$query);
						}
					?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>