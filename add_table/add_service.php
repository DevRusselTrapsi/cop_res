<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$res_id = $_GET['add'];


include('../dbcon.php');

if(isset($_POST['submit'])){

	$type_of_service = $_POST['type_of_service'];
    $description = $_POST['description'];
    $service_rates = $_POST['service_rates'];
    $archive ="show";

	$q = "INSERT INTO tbl_service 
	      (resort_id, type_of_service, description, service_rates, archive) VALUES ('$res_id','$type_of_service','$description', '$service_rates','$archive')";

	$res = mysqli_query($conn, $q);

	if($res){

		echo"<script>alert('Service Added Successfully')</script>";
	
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
	<title>Update Service</title>
</head>
<body>

<form method="POST" method="add_accom.php">
<div class="container-lg border border-5-warning mt-5 mb-5 p-4 shadow">
	<div>
		<?php
		echo"
		<a href='../user_resortinfo.php?request=".$res_id ."' type='submit' class='btn btn-secondary'>Cancel</a>
		";?>
	</div>
	<div class="d-flex justify-content-center">
		<h3>Service</h3>
	</div>
   				 	
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Type of Service :</label>
  				<input type="text" name="type_of_service" class="form-control" id="exampleFormControlInput1" >
			</div>
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Descriptions :</label>
  				<input type="text" name="description" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Price :</label>
				<input type="text" name="service_rates" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-primary me-4" name="submit" >+ Add</button>
			</div>
		</div>
	</form>
</body>
</html>