<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$resort_id = $_SESSION['res_id'];


include('../dbcon.php');


if(isset($_POST['update'])){

$req = $_GET['updt'];

	$resort_name = $_POST['resort_name'];
    $resort_address = $_POST['resort_address'];
    $owner_name = $_POST['owner_name'];
    $owner_address = $_POST['owner_address'];
    $resort_office = $_POST['resort_office'];
    $resort_contact = $_POST['resort_contact'];
    $owner_contact = $_POST['owner_contact'];
    $manager_contact = $_POST['manager_contact'];

	$q = "UPDATE tbl_resort 
	      SET resort_name = '$resort_name', 
	      		resort_address = '$resort_address', 
	      		owner_name = '$owner_name', 
	      		owner_address = '$owner_address', 
	      		resort_office = '$resort_office', 
	      		resort_contact = '$resort_contact', 
	      		owner_contact = '$owner_contact', 
	      		manager_contact = '$manager_contact'
	      WHERE resort_id = $req";

	$res = mysqli_query($conn, $q);

	if($res){

		echo"<script>alert('Update Successfully')</script>";
	
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
	<link rel="icon" type="image/x-icon" href="../assets/img/tourism-favicon.jpg">
	<title>Update Accommodation</title>
</head>
<body>

<form method="POST">
<div class="container-lg border border-5-warning mt-5 mb-5 p-4 shadow">
	<div>
		<?php
		echo"
		<a href='../resort_info_admin.php?get=".$resort_id."' type='submit' class='btn btn-secondary'>Cancel</a>
		";?>
	</div>
	<div class="d-flex justify-content-center">
		<h3>Accommodations</h3>
	</div>
				<?php 
				include('../dbcon.php');

				$req = $_GET['updt'];

				$q = "SELECT *
							FROM tbl_resort
							-- RIGHT JOIN tbl_accommodation
							WHERE resort_id = $req";



				$res = mysqli_query($conn,$q);

				if (mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $row = mysqli_fetch_assoc($res);
   				 
   				?>

   			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Name of the Establishment :</label>
  				<input type="text" name="resort_name" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['resort_name'];?>">
			</div>

			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Establishment Address :</label>
  				<input type="text" name="resort_address" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['resort_address'];?>">
			</div>

			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Owner's :</label>
  				<input type="text" name="owner_name" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['owner_name'];?>">
			</div>

			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Owner's Address :</label>
  				<input type="text" name="owner_address" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['owner_address'];?>">
			</div>

			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Office Contact :</label>
  				<input type="text" name="resort_office" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['resort_office'];?>">
			</div>

			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Home Contact :</label>
  				<input type="text" name="resort_contact" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['resort_contact'];?>">
			</div>

			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Owner Contact :</label>
				<input type="text" name="owner_contact" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['owner_contact'];?>">
			</div>

			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Manager Contact :</label>
				<input type="text" name="manager_contact" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['manager_contact'];?>">
			</div>

			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-primary me-4" name="update" >Update</button>
			</div>
		</div>
	</form>
			<?php } ?>	

</body>
</html>