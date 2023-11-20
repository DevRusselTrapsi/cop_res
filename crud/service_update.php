<?php

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Service</title>
</head>
<body>

	<h3>Services</h3>

				<div class="content">

					<div class="service_header">
						<div>
							<p>Type of Service:</p>
						</div>
						<div>
							<p>Descriptions:</p>
						</div>
						<div>
							<p>Price:</p>
						</div>
						<div>
							Action:
						</div>
					</div>
					<div class="service_section">
			<?php 
				include('../dbcon.php');

				$req = $_GET['get'];

				$q = "SELECT * 
					FROM tbl_service 
					WHERE resort_id = '$req'";
				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {
   				 	
   				 echo"
   				 <div class='col'>
							<div>
								<p>".$row['type_of_service']."</p>
							</div>
							<div>
								<p>".$row['description']."</p>
							</div>
							<div>
								<p>".$row['service_rates']."</p>
							</div>
						</div>
					";

						}
								?>
					</div>
					
				<?php } ?>
				</div>
			</div>
</body>
</html>