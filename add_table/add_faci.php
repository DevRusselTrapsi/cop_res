<?php
session_start();

if (!isset($_SESSION['email'])) {
	header("Location: ./login.php");
	exit();
}

$res_id = $_GET['add'];

include('../dbcon.php');

if (isset($_POST['submit'])) {

	$type_of_facility = $_POST['type_of_facility'];
	$no_faci_units = $_POST['no_faci_units'];
	$faci_capacity = $_POST['faci_capacity'];
	$faci_rates = $_POST['faci_rates'];
	$faci_url = $_FILES['faci_url']['name'];
	$faci_file_tmp = $_FILES['faci_url']['tmp_name'];
	$archive = "show";

	$upload_dir = "../faci_img/";

	if (move_uploaded_file($faci_file_tmp, $upload_dir . $faci_url)) {

        $file_path = $upload_dir . $faci_url;

		$q = "INSERT INTO tbl_facility 
		      (resort_id, type_of_facility, no_faci_units, faci_capacity, faci_rates, faci_url, archive) 
		      VALUES ('$res_id','$type_of_facility','$no_faci_units', '$faci_capacity', '$faci_rates','$file_path','$archive')";

		$res = mysqli_query($conn, $q);

		if ($res) {
			echo "<script>alert('Facility Added Successfully')</script>";
		} else {
			echo "Error: " . mysqli_error($conn);
		}
	} else {

		echo "<script>alert('File upload failed. Check permissions and directory existence.')</script>";
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
	<link rel="icon" type="image/x-icon" href="../assets/img/tourism-favicon.png">
	<title>Update Facility</title>
</head>
<body>

<form method="POST" method="add_faci.php" enctype="multipart/form-data">
<div class="container-lg border border-5-warning mt-5 mb-5 p-4 shadow">
	<div>
		<?php
		echo"
		<a href='../user_resortinfo.php?request=".$res_id ."' type='submit' class='btn btn-secondary'>Cancel</a>
		";?>
	</div>
	<div class="d-flex justify-content-center">
		<h3>Facility</h3>
	</div>

   			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Type of Facility:</label>
  				<input type="text" name="type_of_facility" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">No. of Units:</label>
				<input type="text" name="no_faci_units" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="mb-3">
 		 		<label for="exampleFormControlInput1" class="form-label fs-5">Capacity:</label>
  				<input type="text" name="faci_capacity" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Price:</label>
				<input type="text" name="faci_rates" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label fs-5">Insert Image :</label>
				<input type="file" name="faci_url" class="form-control" id="exampleFormControlInput1"  accept="image/png, image/jpg, image/jpeg, image/PNG">
			</div>
			<div class="mb-3 d-flex justify-content-end mt-5">
				<button type="submit" class="btn btn-primary me-4" name="submit" >+ Add</button>
			</div>

		</div>
	</form>
</body>
</html>