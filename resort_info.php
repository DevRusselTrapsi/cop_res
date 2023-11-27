<?php
session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$req = $_GET['get'];

$_SESSION['res_id'] = "$req";

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/user_resortinfo.css">
	<link rel="icon" type="image/x-icon" href="./assets/img/tourism-favicon.jpg">
	<title>User Dashboard</title>
</head>
<body>


	<!-- <form> -->
		<div class="form-content mb-4">
			<div>
				<a href="./admin_search.php">BACK</a>
			</div>
			<div class="profile">
				<?php 
include('./dbcon.php');

				$req = $_GET['get'];

							$sql = "SELECT resort_url
											FROM tbl_resort
        							WHERE resort_id = '$req'";

        			$r = mysqli_query($conn, $sql);

							if($r && mysqli_num_rows($r) > 0){

								while($profile = mysqli_fetch_assoc($r)) {
									?>
					<!-- this is where the image will popout -->
				<img src='<?php echo $profile['resort_url']; ?>' alt="Image">
				
				<?php 
					}}
			?>
			</div>

	<div class="container">
				<p>Resorts Info</p>

		<div class="res_content">
				<?php 

							include('./dbcon.php');

							// use session resort_id to the user_addresort to get the data from the tbl_resort 
							$req = $_GET['get'];

							$sql = "SELECT *
											FROM tbl_resort
        							WHERE resort_id = '$req'";

							$res = mysqli_query($conn, $sql);

							if($res && mysqli_num_rows($res) > 0){

								while($row_resort = mysqli_fetch_assoc($res)) {



							?>

			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Name of the Establishment :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row_resort['resort_name'];?>" style="font-size: 20px;">
    			</div>
			</div>
			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Establishment address :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row_resort['resort_address'];?>" style="font-size: 20px;">
    			</div>
			</div>
			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Owners' name :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row_resort['owner_name'];?>" style="font-size: 20px;">
    			</div>
			</div>
			
			<div class="mb-4 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Owners' address :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row_resort['owner_address'];?>" style="font-size: 20px;">
    			</div>
			</div>
		
			<h2>Contacts</h2>


			<div class="mb-3 mt-4 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Office Contact :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="+63 <?php echo $row_resort['resort_office'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Home Contact :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="+63 <?php echo $row_resort['resort_contact'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Owner Contact :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="+63 <?php echo $row_resort['owner_contact'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Manager Contact :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="+63 <?php echo $row_resort['manager_contact'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="d-flex justify-content-end">
				<?php 
				echo "
				<a href='./crud/resort_update.php?updt=".$row_resort['resort_id']."' type='submit' class='btn btn-success pe-3 ps-3 pt-1 pb-1 update' style='color:black;' name='res_update'>Edit</a>
				";?>
			</div>
		</div>
		<?php
				} 

			}else{ 

				?>
	
				<!-- this will show if there is no data -->

	<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Name of the Establishment :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="No Data Found" style="font-size: 20px;">
    			</div>
			</div>
			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Establishment address :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="No Data Found" style="font-size: 20px;">
    			</div>
			</div>
			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Owners' name :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="No Data Found" style="font-size: 20px;">
    			</div>
			</div>
			
			<div class="mb-4 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Owners' address :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="No Data Found" style="font-size: 20px;">
    			</div>
			</div>
		
			<h2>Contacts</h2>


			<div class="mb-3 mt-4 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Office Contact :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="No Data Found" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Home Contact :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="No Data Found" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Owner Contact :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="No Data Found" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px; border-bottom: 1px solid black;">Manager Contact :</label>
    			<div class="col-lg-4" style="border-bottom: 1px solid black; border-bottom-right-radius: 10px;">
      				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="No Data Found" style="font-size: 20px;">
    			</div>
			</div>
			<div class="col-3">
				<?php 
				echo "
				<a href='./crud/resort_update.php?get=".$row_resort['resort_id']."' type='submit' class='btn btn-success pe-3 ps-3 pt-1 pb-1 update' name='res_update'>Update</a>
				 ";?>
			</div>
		</div>
				 <?php 
						} 
					?>

	<!-- END OF tbl_resort -->

				<!-- Accommodations -->

				<h3>Accommodations</h3>

<div class="table-responsive-md d-flex justify-content-center">
			<table class="table" style="width: 100%;">
	<thead style="background-color: rgba(0, 197, 186, 0.72)">
		<tr>
			<td>Type of Room</td>

			<td>No. of Rooms</td>

			<td>Capacity</td>

			<td>Price</td>

			<td>Action</td>
		</tr>
	</thead>
	<tbody style="background-color: rgba(84, 88, 88, 0.14);">
<?php
include('dbcon.php');

				$req = $_GET['get'];

				$q = "SELECT * 
					FROM tbl_accommodation 
					WHERE resort_id = '$req'";
				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {
		echo"
		<tr>
			<td> ".$row['type_of_room']."</td>
			<td>".$row['no_accom_units']." </td>
			<td> ".$row['accom_capacity']."</td>
			<td> ".$row['accom_rates']."</td>
			<td>
			<a href='./crud/accom_update.php?updt=".$row['accom_id']."' type='submit' class='btn btn-success pe-3 ps-3 pt-1 pb-1 update' style='color:black;' name='res_update'>Edit</a>

				<a href='./crud/accom_delete.php?del=".$row['accom_id']."' type='submit' class='btn btn-danger pe-2 ps-2 pt-1 pb-1 delete' style='color:black;' name='res_delete'>Delete</a>
			</td>
		</tr>

		"; }
	}else{

		echo"
		<tr>
			<td>No data Found</td>
			<td>No data Found</td>
			<td>No data Found</td>
			<td>No data Found</td>
			<td>
			<a href='./crud/service_update.php?updt=".$row['accom_id']."' type='submit' class='btn btn-success pe-3 ps-3 pt-1 pb-1 update' style='color:black;' name='res_update'>Edit</a>

				<a href='./crud/service_delete.php?del=".$row['accom_id']."' type='submit' class='btn btn-danger pe-2 ps-2 pt-1 pb-1 delete' style='color:black;' name='res_delete'>Delete</a>
			</td>
		</tr>";
}
?>
	</tbody>
</table>
</div>

<!-- end of Accommodation Table -->

				<!-- Facilities -->

		<h3>Existing Facilities and Amenities</h3>


<div class="table-responsive-md d-flex justify-content-center">
			<table class="table" style="width: 100%;">
	<thead style="background-color: rgba(0, 197, 186, 0.72)">
		<tr>
			<td>Type of Facility</td>

			<td>No. of Units</td>

			<td>Capacity</td>

			<td>Price</td>

			<td>Action</td>
		</tr>
	</thead>
	<tbody style="background-color: rgba(84, 88, 88, 0.14);">
<?php
include('dbcon.php');

				$req = $_GET['get'];

				$q = "SELECT * 
					FROM tbl_facility 
					WHERE resort_id = '$req'";
				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {
		echo"
		<tr>
			<td> ".$row['type_of_facility']."</td>
			<td>".$row['no_faci_units']." </td>
			<td> ".$row['faci_capacity']."</td>
			<td> ".$row['faci_rates']."</td>
			<td>
			<a href='./crud/faci_update.php?updt=".$row['faci_id']."' type='submit' class='btn btn-success pe-3 ps-3 pt-1 pb-1 update' style='color:black;' name='res_update'>Edit</a>

				<a href='./crud/faci_delete.php?del=".$row['faci_id']."' type='submit' class='btn btn-danger pe-2 ps-2 pt-1 pb-1 delete' style='color:black;' name='res_delete'>Delete</a>
			</td>
		</tr>

		"; }
	}else{

		echo"
		<tr>
			<td>No data Found</td>
			<td>No data Found</td>
			<td>No data Found</td>
			<td>No data Found</td>
			<td>
			<a href='./crud/service_update.php?updt=".$row['faci_id']."' type='submit' class='btn btn-success pe-3 ps-3 pt-1 pb-1 update' style='color:black;' name='res_update'>Edit</a>

				<a href='./crud/service_delete.php?del=".$row['faci_id']."' type='submit' class='btn btn-danger pe-2 ps-2 pt-1 pb-1 delete' style='color:black;' name='res_delete'>Delete</a>
			</td>
		</tr>";
}
?>
	</tbody>
</table>
</div>

				<!-- End of Facilities -->

			<!-- table Service -->

				<h3>Services</h3>

<div class="table-responsive-md d-flex justify-content-center">
			<table class="table" style="width: 100%;">
	<thead style="background-color: rgba(0, 197, 186, 0.72)">
		<tr>
			<td>Type of Service</td>

			<td>Descriptions</td>

			<td>Price</td>

			<td>Action</td>
		</tr>
	</thead>
	<tbody style="background-color: rgba(84, 88, 88, 0.14);">
<?php
include('dbcon.php');

				$req = $_GET['get'];

				$q = "SELECT * 
					FROM tbl_service 
					WHERE resort_id = '$req'";
				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {
		echo"
		<tr>
			<td> ".$row['type_of_service']."</td>
			<td>".$row['description']." </td>
			<td> ".$row['service_rates']."</td>
			<td>
			<a href='./crud/service_update.php?updt=".$row['service_id']."' type='submit' class='btn btn-success pe-3 ps-3 pt-1 pb-1 update' style='color:black;' name='res_update'>Edit</a>

				<a href='./crud/service_delete.php?del=".$row['service_id']."' type='submit' class='btn btn-danger pe-2 ps-2 pt-1 pb-1 delete' style='color:black;' name='res_delete'>Delete</a>
			</td>
		</tr>

		"; }
	}else{

		echo"
		<tr>
			<td>No data Found</td>
			<td>No data Found</td>
			<td>No data Found</td>
			<td>
			<a href='./crud/service_update.php?updt=".$row['service_id']."' type='submit' class='btn btn-success pe-3 ps-3 pt-1 pb-1 update' style='color:black;' name='res_update'>Edit</a>

				<a href='./crud/service_delete.php?del=".$row['service_id']."' type='submit' class='btn btn-danger pe-2 ps-2 pt-1 pb-1 delete' style='color:black;' name='res_delete'>Delete</a>
			</td>
		</tr>";
}
?>
	</tbody>
</table>
</div>
				<!-- service table end -->

			<div class="d-flex justify-content-lg-end mt-4">
				<a type="submit" class="btn btn-danger pe-2 ps-2 delete">Delete</a>
			</div>
		</div>
	</div>


	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

</body>
</html>