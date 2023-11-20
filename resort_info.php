<?php
session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/user_resortinfo.css">
	<link rel="icon" type="image/x-icon" href="./assets/img/tourism-favicon.jpg">
	<title>Resort Information</title>
</head>
<body>


	<form>
		<div class="form-content">
			<div>
				<a href="./user_res_table.php">BACK</a>
			</div>
			<div class="profile">
				<?php 

				include('./dbcon.php');

				$req = $_GET['request'];

							$sql = "SELECT resort_url
											FROM tbl_resort
        							WHERE resort_id = '$req'";

        			$r = mysqli_query($conn, $sql);

							if($r && mysqli_num_rows($r) > 0){

								while($profile = mysqli_fetch_assoc($r)) {
									
									echo"
					<!-- this is where the image will popout -->
				<img src='".$profile['resort_url']."' alt='Image'>";
				
					}
				}
			?>
			</div>

	<div class="container">
				<p>Resorts Info</p>

		<div class="res_content">
				<?php 

							include('./dbcon.php');

							// use session resort_id to the user_addresort to get the data from the tbl_resort 
							$req = $_GET['request'];

							$sql = "SELECT *
											FROM tbl_resort
        							WHERE resort_id = '$req'";

							$res = mysqli_query($conn, $sql);

							if($res && mysqli_num_rows($res) > 0){

								while($row_resort = mysqli_fetch_assoc($res)) {
							?>
			<div class="col-2">
			
				<div>
					<p>Name of the Establishment:</p>
				</div>
				<div>
					<p><?php echo $row_resort['resort_name'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Establishment address:</p>
				</div>
				<div>
					<p><?php echo $row_resort['resort_address'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners' name:</p>
				</div>
				<div>
					<p><?php echo $row_resort['owner_name'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners' address:</p>
				</div>
				<div>
					<p><?php echo $row_resort['owner_address'];?></p>
				</div>
			</div>

			<h3>Contacts</h3>

			<div class="col-2">
				<div>
					<p>Office Contact:</p>
				</div>
				<div>
					<p><?php echo $row_resort['resort_office'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Home Contact:</p>
				</div>
				<div>
					<p><?php echo $row_resort['resort_contact'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owner Contact:</p>
				</div>
				<div>
					<p><?php echo $row_resort['owner_contact'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Manager Contact:</p>
				</div>
				<div>
					<p><?php echo $row_resort['manager_contact'];?></p>
				</div>
			</div>

			<div class="col-3">
				<a type="submit" class="update" name="res_update">Update</a>
				<a type="submit" class="delete" name="res_delete">Delete</a>
			</div>
		</div>
		<?php
				} 

			}else{ 

				?>
	
				<!-- this will show if there is no data -->

	<div class="col-2">
				<div>
					<p>Name of the Establishment:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Establishment address:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners name:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners address:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>

			<h3>Contacts</h3>

			<div class="col-2">
				<div>
					<p>Office Contact:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Home Contact:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owner Contact:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Manager Contact:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-3">
				<a type="submit" class="update" name="res_update" >Update</a>
				<a type="submit" class="delete" name="res_delete" >Delete</a>
			</div>
		</div>
				 <?php 
						} 
					?>

	<!-- END OF tbl_resort -->

				<!-- Accommodations -->

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
					</div>
					<div class="accom_section">
				<?php 
				include('dbcon.php');

				$req = $_GET['request'];

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

		<h3>Existing Facilities and Amenities</h3>


				<div class="content">
					<div class="faci_header">
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
					</div>
					<div class="faci_section">

					<?php 

				include('dbcon.php');

				$q = "SELECT type_of_facility, faci_capacity, no_faci_units, faci_rates FROM tbl_facility WHERE resort_id = '$req'";

				$res = mysqli_query($conn, $q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {

   				 echo"
   				 <div class='col'>
							<div>
								<p>".$row['type_of_facility']."</p>
							</div>
							<div>
								<p>".$row['faci_capacity']."</p>
							</div>
							<div>
								<p>".$row['no_faci_units']."</p>
							</div>
							<div>
								<p>".$row['faci_rates']."</p>
							</div>
							<div>
								<a type='submit' class='update' name='faci_update' href='update.php'>Update</a>
								<a type='submit' class='delete' name='faci_delete' href='delete.php'>Delete</a>
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
						<a type="submit" class="update" name="faci_update" >Update</a>
						<a type="submit" class="delete" name="faci_delete" >Delete</a>
					</div>

					<?php } ?>
				</div>
			</div>

			<!-- Service -->

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
				include('dbcon.php');

				$req = $_GET['request'];

				$q = "SELECT type_of_service, description, service_rates FROM tbl_service WHERE resort_id = '$req'";
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
							<div>
								<a type='submit' class='update' name='faci_update' href='update.php'>Update</a>
								<a type='submit' class='delete' name='faci_delete' href='delete.php'>Delete</a>
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
						<a type="submit" class="update" name="service_update" >Update</a>
						<a type="submit" class="delete" name="service_delete" >Delete</a>
					</div>

				<?php } ?>
				</div>
			</div>
			<div class="btn_section">
				<a type="submit" class="delete">Delete</a>
			</div>
		</div>
	</div>
</form>
	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

</body>
</html>