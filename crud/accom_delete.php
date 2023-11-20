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
	<title>Delete Accommodation</title>
</head>
<body>

	<h3>Accommodations</h3>

				<div class="content">
					<div class="accom_header">
						<div>
							<p>Type of Room:</p>
						</div>
						<div>
							<p>No. of Rooms:</p>
						</div>
						<div>
							<p>Capacity:</p>
						</div>
						<div>
							<p>Price:</p>
						</div>
						<div>
							Action:
					</div>
					
						</div><div class="accom_section">
				<?php 
				include('../dbcon.php');

				$req = $_GET['get'];

				$q = "SELECT type_of_room, no_accom_units, accom_capacity, accom_rates
							FROM tbl_accommodation
							-- RIGHT JOIN tbl_accommodation
							WHERE resort_id = '$req'";



				$res = mysqli_query($conn,$q);

				if (mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {
   				 
   				 echo"
   				 <div class='col'>
							<div>
								<p>".$row['type_of_room']."</p>
							</div>
							<div>
								<p>".$row['no_accom_units']."</p>
							</div>
							<div>
								<p>".$row['accom_capacity']."</p>
							</div>
							<div>
								<p>".$row['accom_rates']."</p>
							</div>
							<div>
								<a type='submit' class='update' name='accom_update'>Update</a>
								<a type='submit' class='delete' name='accom_delete'>Delete</a>
							</div>
						</div>
					";
					
					 }
					}else{

					?>
					<div class='col'>
							<div>
								<p>No data input</p>
							</div>
							<div>
								<p>No data input</p>
							</div>
							<div>
								<p>No data input</p>
							</div>
							<div>
								<p>No data input</p>
							</div>
							<div>
						<a type="submit" class="update" name="accom_update" >Update</a>
						<a type="submit" class="delete" name="accom_delete" >Delete</a>
					</div>

						<?php 
							} 
						?>

					</div>
				</div>

</body>
</html>