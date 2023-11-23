<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$id = $_SESSION['res_id'];

include('../dbcon.php');


if(isset($_POST['update'])){

$req = $_GET['updt'];

	$type_of_facility = $_POST['type_of_facility'];
	$no_faci_units = $_POST['no_faci_units'];
	$faci_capacity = $_POST['faci_capacity'];
	$faci_rates = $_POST['faci_rates'];
	
	$q = "UPDATE tbl_facility 
		  SET type_of_facility = '$type_of_facility',faci_capacity = '$faci_capacity', no_faci_units = '$no_faci_units',   faci_rates = '$faci_rates' 
		  WHERE faci_id = $req";

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
	<!-- my css style -->
	<link rel="icon" type="image/x-icon" href="../assets/img/tourism-favicon.jpg">
	<title>Update Facility</title>
</head>
<body>

<form method="POST">
<div class="container-lg border border-5-warning mt-5 mb-5 p-4 shadow">
	<div>
		<?php
		echo"
		<a href='../user_resortinfo.php?request=".$id."' type='submit' class='btn btn-secondary'>Cancel</a>
		";?>
	</div>
	<div class="d-flex justify-content-center">
		<h3>Facility <?php echo $req = $_GET['updt']; ?></h3>
	</div>
				<?php 
				include('../dbcon.php');

			$req= $_GET['updt'];

					$q = "SELECT * 
					FROM tbl_facility 
					WHERE faci_id = $req";

				$res = mysqli_query($conn, $q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $row = mysqli_fetch_assoc($res);

   				?>
   			

   			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Type of Facility:</label>
  				<input type="text" name="type_of_facility" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['type_of_facility'];?>">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">No. of Units:</label>
				<input type="text" name="no_faci_units" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['no_faci_units'];?>">
			</div>
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Capacity:</label>
  				<input type="text" name="faci_capacity" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['faci_capacity'];?>">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Price:</label>
				<input type="text" name="faci_rates" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['faci_rates'];?>">
			</div>
			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-primary me-4" name="update" >Update</button>
			</div>

		</div>
	</form>
			<?php } ?>	

</body>
</html>