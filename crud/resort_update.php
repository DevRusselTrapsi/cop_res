<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

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


	$q = "UPDATE tbl_resort SET resort_name = '$resort_name', owner_name = '$owner_name', owner_address = '$owner_address', owner_contact = '$owner_contact', resort_office = '$resort_office', resort_contact = '$resort_contact', manager_contact = '$manager_contact', resort_address = '$resort_address' WHERE resort_id = $req";

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
	<link rel="icon" type="image/x-icon" href="../assets/img/tourism-favicon.jpg">
	<link rel="stylesheet" type="text/css" href="./crud/css/resort.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Update Resort</title>
</head>
<body>

<form method="POST">

<div class="container-lg border border-5-warning mt-5 mb-5 p-4 shadow">
	<!-- returning  to the admin_resortinfo by id -->
	<div>
		<?php
		echo"
		<a href='../admin_resortinfo.php?get=".$req= $_GET['updt']."' type='submit' class='btn btn-secondary'>Cancel</a>
		";?>
	</div>
	<div class="d-flex justify-content-center">
		<h3 >Resort Information</h3>
	</div>
<?php 
		include('../dbcon.php');

			// use session resort_id to the user_addresort to get the data from the tbl_resort 
			$req = $_GET['updt'];

			$sql = "SELECT *
					FROM tbl_resort
        			WHERE resort_id = '$req'";

					$res = mysqli_query($conn, $sql);

					if($res && mysqli_num_rows($res) > 0){

						$row_resort = mysqli_fetch_assoc($res)
					?>
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Name of the Establishment:</label>
  				<input type="text" name="resort_name" class="form-control" id="exampleFormControlInput1" value="<?php echo $row_resort['resort_name'];?>">
			</div>
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Establishment Address:</label>
  				<input type="text" name="resort_address" class="form-control" id="exampleFormControlInput1" value="<?php echo $row_resort['owner_address'];?>">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Owners' name:</label>
				<input type="text" name="owner_name" class="form-control" id="exampleFormControlInput1" value="<?php echo $row_resort['owner_name'];?>">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Owners' address:</label>
				<input type="text" name="owner_address" class="form-control" id="exampleFormControlInput1" value="<?php echo $row_resort['owner_address'];?>">
				</div>

			<h3>Contacts</h3>

			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Office Contact:</label>
				<input type="text" name="resort_office" class="form-control" id="exampleFormControlInput1" value="<?php echo $row_resort['resort_office'];?>">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Home Contact:</label>
				<input type="text" name="resort_contact" class="form-control" id="exampleFormControlInput1" value="<?php echo $row_resort['resort_contact'];?>">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Owner Contact:</label>
				<input type="text" name="owner_contact" class="form-control" id="exampleFormControlInput1" value="<?php echo $row_resort['owner_contact'];?>">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Manager Contact:</label>
				<input type="text" name="manager_contact" class="form-control" id="exampleFormControlInput1" value="<?php echo $row_resort['manager_contact'];?>">
			</div>
			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-primary me-4" name="update" >Update</button>
			</div>
	</div>

		<?php 
	} 
?>
</form>
</body>
</html>