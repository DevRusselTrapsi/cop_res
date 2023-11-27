<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$resort_id = $_SESSION['res_id'];

include('../dbcon.php');

if(isset($_POST['delete'])){

$req = $_GET['del'];
	

	$q = "DELETE FROM tbl_accommodation WHERE accom_id = $req";

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
	<title>Delete Accommodation</title>
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
	<div class="d-block justify-content-center text-center">
		<h2 class="bg-danger pt-1 pb-1 mt-2">Are you sure?</h2>
		<div class="mt-5">
			<h5>Accommodations</h5>
		</div>


	</div>
				<?php 
				include('../dbcon.php');

				$req = $_GET['del'];

				$q = "SELECT *
							FROM tbl_accommodation
							-- RIGHT JOIN tbl_accommodation
							WHERE accom_id = '$req'";



				$res = mysqli_query($conn,$q);

				if (mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $row = mysqli_fetch_assoc($res);
   				 
   				?>

   			<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Type of Accommodation :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['type_of_room'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">No of Units :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['no_accom_units'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Capacity :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['accom_capacity'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Rates :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['accom_rates'];?>" style="font-size: 20px;">
    			</div>
			</div>
			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-danger me-4" name="delete" >Delete</button>
			</div>

		</div>
	</form>
			<?php } ?>	

</body>
</html>