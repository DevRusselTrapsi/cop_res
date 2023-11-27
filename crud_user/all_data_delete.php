<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$req = $_GET['del'];

include('../dbcon.php');

if(isset($_POST['update'])){

$req = $_GET['del'];
	
	$archive = "delete";

	$q1 = "UPDATE tbl_resort 
			SET archive ='$archive' 
			WHERE resort_id = $req";

	$q2 = "UPDATE tbl_accommodation
	 		SET archive ='$archive' 
	 		WHERE resort_id = $req";

	$q3 = "UPDATE tbl_facility
	 		SET archive ='$archive' 
	 		WHERE resort_id = $req";

	 $q4 = "UPDATE tbl_service
	 		SET archive ='$archive' 
	 		WHERE resort_id = $req";

	$arch_resort = mysqli_query($conn, $q1);
	$arch_accom = mysqli_query($conn, $q2);
	$arch_faci = mysqli_query($conn, $q3);
	$arch_service = mysqli_query($conn, $q4);


	if($arch_resort && $arch_accom && $arch_faci && $arch_service){

		echo"<script>alert('Delete Successfully')</script>";
	
	}else{
		echo "Error.".mysqli_error($conn);
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="../assets/img/tourism-favicon.png">
	<title>Delete Facility</title>
</head>
<body>

<form method="POST">
<div class="container-lg border border-5-warning mt-5 mb-5 p-4 shadow">

	<div>

		<a href='../user_res_table.php' type='submit' class='btn btn-secondary'>Cancel</a>
	</div>
	<div class="d-block justify-content-center text-center">
		<h2 class="bg-danger pt-1 pb-1 mt-2">Are you sure?</h2>
		<div class="mt-5">
		<h3>Resort Information</h3>
		</div>

	</div>
				<?php 
				include('../dbcon.php');

				$req = $_GET['del'];

				$q = "SELECT *
							FROM tbl_resort
							WHERE resort_id = '$req'";



				$res = mysqli_query($conn,$q);

				if (mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $row = mysqli_fetch_assoc($res);
   				 
   				?>
   		<div>

   			<div class="mb-3 row text-center d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Name of the Establishment :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['resort_name'];?>" style="font-size: 20px;">
    			</div>
			</div>

   			<div class="mb-3 row text-center d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Establishment address :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['resort_address'];?>" style="font-size: 20px;">
    			</div>
			</div>
			<div class="mb-3 row text-center d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Owners' name :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['owner_name'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-center d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Owners' address :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['owner_address'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="text-center">
				<h3>Contacts</h3>
			</div>

			<div class="mb-3 row text-center d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Office Contact :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['resort_office'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-center d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Home Contact :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['resort_contact'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-center d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Owner Contact :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['owner_contact'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-center d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Manager Contact :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['manager_contact'];?>" style="font-size: 20px;">
    			</div>
			</div>


			<div class="text-center">
				<h3>Accommodation</h3>
			</div>

<div class="table-responsive-sm d-flex justify-content-center">
	<table class="table" style="width: 100%;">
		<thead style="background-color: rgba(0, 197, 186, 0.72)">
		<tr>
			<td>Type of Room</td>

			<td>No. of Rooms</td>

			<td>Capacity</td>

			<td>Price</td>
		</tr>
	</thead>
<tbody style="background-color: rgba(84, 88, 88, 0.14);">
<?php
include('../dbcon.php');

				$req = $_GET['del'];

				$q = "SELECT * 
					FROM tbl_accommodation 
					WHERE resort_id = '$req'";

				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {
		echo"
		<tr>
			<td name='type_of_room'> ".$row['type_of_room']."</td>
			<td name='no_accom_units'>".$row['no_accom_units']." </td>
			<td name='accom_capacity'> ".$row['accom_capacity']."</td>
			<td name='accom_rates'> ".$row['accom_rates']."</td>
		</tr>

		"; 
	}
}
?>
	</tbody>
</table>
</div>


			<div class="text-center">
				<h3>Existing Facilities and Ammenities</h3>
			</div>

<div class="table-responsive-sm d-flex justify-content-center">
	<table class="table" style="width: 100%;">
		<thead style="background-color: rgba(0, 197, 186, 0.72)">
		<tr>
			<td>Type of Facility</td>

			<td>No. of Units</td>

			<td>Capacity</td>

			<td>Price</td>
		</tr>
	</thead>
<tbody style="background-color: rgba(84, 88, 88, 0.14);">
<?php
include('../dbcon.php');

				$req = $_GET['del'];

				$q = "SELECT * 
					FROM tbl_facility 
					WHERE resort_id = '$req'";

				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {
		echo"
		<tr>
			<td name='type_of_facility'> ".$row['type_of_facility']."</td>
			<td name='no_faci_units'>".$row['no_faci_units']." </td>
			<td name='faci_capacity'> ".$row['faci_capacity']."</td>
			<td name='faci_rates'> ".$row['faci_rates']."</td>
		</tr>

		"; 
	}
}
?>
	</tbody>
</table>
</div>

			<div class="text-center">
				<h3>Services</h3>
			</div>

<div class="table-responsive-sm d-flex justify-content-center">
	<table class="table" style="width: 100%;">
		<thead style="background-color: rgba(0, 197, 186, 0.72)">
		<tr>
			<td>Type of Service</td>

			<td>Descriptions</td>

			<td>Price</td>
		</tr>
	</thead>
<tbody style="background-color: rgba(84, 88, 88, 0.14);">
<?php
include('../dbcon.php');

				$req = $_GET['del'];

				$q = "SELECT * 
					FROM tbl_service 
					WHERE resort_id = '$req'";

				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 while ($row = mysqli_fetch_assoc($res)) {
		echo"
		<tr>
			<td name='type_of_service'> ".$row['type_of_service']."</td>
			<td name='description'>".$row['description']." </td>
			<td name='service_rates'> ".$row['service_rates']."</td>
		</tr>

		"; 
	}
}
?>
	</tbody>
</table>
</div>

			<!-- Delete button -->
			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-danger me-4" name="update">Delete</button>
			</div>

		</div>
	</form>
			<?php } ?>	

</body>
</html>