<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}


include('../dbcon.php');

if(isset($_POST['delete'])){

$id = $_GET['id'];
	

	$q = "DELETE FROM tbl_user WHERE user_id = $id";

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
	<link rel="icon" type="image/x-icon" href="../assets/img/tourism-favicon.png">
	<title>Delete Accommodation</title>
</head>
<body>

<form method="POST">
	<div class="container-lg border border-5-warning mt-5 mb-5 p-4 shadow">
			<div>
				<a href="../user_table.php" type="submit" class="btn btn-secondary">BACK</a>
				
			</div>

		<?php  
			include('../dbcon.php');

			$id = $_GET['id'];

			$q = "SELECT *
					FROM tbl_user 
					WHERE user_id = $id";

			$res = mysqli_query($conn, $q);

			if($res && mysqli_num_rows($res) > 0){

				$row = mysqli_fetch_assoc($res);

		?>
		<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Name :</label>
    			<div class="col-lg-4">
      				<input type="text" class="form-control-plaintext text-center" id="staticEmail" value="<?php echo ucwords($row['fname']).ucwords($row['lname']);?>" style="font-size: 20px;">
    			</div>
			</div>

		<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Email :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['email'];?>" style="font-size: 20px;">
    			</div>
			</div>

		<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Contact :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['contact'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 col-form-label" style="font-size: 20px;">Addres :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo ucwords($row['user_address']);?>" style="font-size: 20px;">
    			</div>
			</div>

	</div>
</form>
			<?php } ?>	

</body>
</html>