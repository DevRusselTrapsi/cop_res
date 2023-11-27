<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$res_id = $_GET['add'];


include('./dbcon.php');

if(isset($_POST['submit'])){

	$type_of_room = $_POST['type_of_room'];
    $no_accom_units = $_POST['no_accom_units'];
    $accom_capacity = $_POST['accom_capacity'];
    $accom_rates = $_POST['accom_rates'];
    $accom_url = $_FILES['acom_url']['name'];
    $accom_file_tmp = $_FILES['acom_url']['tmp_name'];
    $archive ="show";
    $upload_dir = "../accom_img/";

    // Move the uploaded files to the folder of estab_img
    move_uploaded_file($accom_file_tmp, $upload_dir . $accom_url);

    $upload_dir = $upload_dir . $accom_url;
	

	$q = "INSERT INTO tbl_accommodation 
	      (resort_id, type_of_room, no_accom_units, accom_capacity, accom_rates, acom_url, archive) VALUES ('$res_id','$type_of_room','$no_accom_units', '$accom_capacity', '$accom_rates','$upload_dir','$archive')";

	$res = mysqli_query($conn, $q);

	if($res){

		echo"<script>alert('Accommodate Added Successfully')</script>";
	
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
	<title>Update Accommodation </title>
</head>
<body>

<form method="POST" method="add_accom.php" enctype="multipart/form-data">
<div class="container-lg border border-5-warning mt-5 mb-5 p-4 shadow">
	<div>
		<?php
		echo"
		<a href='../resort_info_admin.php?get=".$res_id ."' type='submit' class='btn btn-secondary'>Cancel</a>
		";?>
	</div>
	<div class="d-flex justify-content-center">
		<h3>Accommodations</h3>
	</div>

   			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Type of Accommodation :</label>
  				<input type="text" name="type_of_room" class="form-control" id="exampleFormControlInput1" >
			</div>
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">No of Units :</label>
  				<input type="text" name="no_accom_units" class="form-control" id="exampleFormControlInput1" >
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Capacity :</label>
				<input type="text" name="accom_capacity" class="form-control" id="exampleFormControlInput1" >
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Rates :</label>
				<input type="text" name="accom_rates" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Insert Image :</label>
				<input type="file" name="acom_url" class="form-control" id="exampleFormControlInput1"  accept="image/png, image/jpg, image/jpeg, image/PNG">
			</div>
			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-primary me-4" name="submit">+ Add</button>
			</div>

		</div>
	</form>
</body>
</html>