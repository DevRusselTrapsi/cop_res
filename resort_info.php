<?php
session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./user_index.php");
	exit();
}

$fname = $_SESSION["fname"];
$user_id = $_SESSION["user_id"];
 
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

	<title>User Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="./user_addresort.php" class="brand">
			<i><img src="./assets/img/tourism.jpg" class="logo"></i>
			<p>WELCOME!</p>
			<span><?php echo $fname ?></span>
		</a>

		<ul class="side-menu top">
			<li>
				<a href="./user_addresort.php">
					<i class='bx bxs-plus-circle'></i>
					<span class="text">Add Resort</span>
				</a>
			</li>
			<li class="active">
				<a href="./user_resortinfo.php">
					<i class='bx bxs-info-circle'></i>
					<span class="text">Resort Info</span>
				</a>
			</li>
			<li >
				<a href="./user_res_table.php">
					<i class='bx bx-list-ul'></i>
					<span class="text">Resort List Table</span>
				</a>
			</li>
			<li>
				<a href="./user_bps.php">
					<i class='bx bxs-send'></i>
					<span class="text">Business Permit Submission</span>
				</a>
			</li>
			<li>
				<a href="./logout.php">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>

			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn" >
					Profile
				</button>
				<div id="myDropdown" class="dropdown-content">
    				<a href="#about">User Account</a>
					<a href="#home">Change Email</a>
				</div>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<form style="border: 1px solid black">
		<div class="form-content">
			
			<div class="profile">
				<img src="./assets/pictures_resort/Sundowners.jpg" alt="Image">
				<h2>Kainomayan</h2>
				<!-- this is where the image will popout -->

			</div>

	<div class="container">
				<h2>Resorts Info</h2>

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
				<button type="submit" class="update" name="res_update">Update</button>
				<button type="submit" class="delete" name="res_delete">Delete</button>
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
				<button type="submit" class="update" name="res_update" disabled>Update</button>
				<button type="submit" class="delete" name="res_delete" disabled>Delete</button>
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
								<button type='submit' class='update' name='accom_update'>Update</button>
								<button type='submit' class='delete' name='accom_delete'>Delete</button>
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
						<button type="submit" class="update" name="accom_update" >Update</button>
						<button type="submit" class="delete" name="accom_delete" >Delete</button>
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
								<button type='submit' class='update' name='faci_update' href='update.php'>Update</button>
								<button type='submit' class='delete' name='faci_delete' href='delete.php'>Delete</button>
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
						<button type="submit" class="update" name="faci_update" >Update</button>
						<button type="submit" class="delete" name="faci_delete" >Delete</button>
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
								<button type='submit' class='update' name='faci_update' href='update.php'>Update</button>
								<button type='submit' class='delete' name='faci_delete' href='delete.php'>Delete</button>
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
						<button type="submit" class="update" name="service_update" >Update</button>
						<button type="submit" class="delete" name="service_delete" >Delete</button>
					</div>

				<?php } ?>
				</div>
			</div>
			<div class="btn_section">
				<button type="submit" class="delete">Delete</button>
			</div>
		</div>
	</div>
</form>
	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="script.js"></script>
	<script type="text/javascript">
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
		function myFunction() {
  		document.getElementById("myDropdown").classList.toggle("show");
		}

// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
  		if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
	</script>
</body>
</html>