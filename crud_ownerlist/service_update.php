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

	$type_of_service = $_POST['type_of_service'];
	$description = $_POST['description'];
	$service_rates = $_POST['service_rates'];

	$q = "UPDATE tbl_service SET type_of_service = '$type_of_service', description = '$description', service_rates = '$service_rates' WHERE resort_id = $req";

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
	<title>Update Service</title>
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

		<h3>Services</h3>
	</div>

			<?php 
				include('../dbcon.php');

				$req = $_GET['updt'];

				$q = "SELECT * 
					FROM tbl_service 
					WHERE service_id = $req";
				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $row = mysqli_fetch_assoc($res);

   				 ?>
   				 	
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Type of Service :</label>
  				<input type="text" name="type_of_service" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['type_of_service'];?>">
			</div>
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Descriptions :</label>
  				<input type="text" name="description" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['description'];?>">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Price :</label>
				<input type="text" name="service_rates" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['service_rates'];?>">
			</div>
			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-primary me-4" name="update" >Update</button>
			</div>
		</div>
	</form>
					
				<?php } ?>
</body>
</html>