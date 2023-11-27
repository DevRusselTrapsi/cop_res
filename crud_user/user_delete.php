<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}


include('../dbcon.php');

$id = $_GET['id'];

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
<style>
	.res_name
	{
		/*border: 1px solid black;*/
		height: 50px;
		margin-bottom: 5px;
		text-align: center;
		text-decoration: none;
		color: black;
		font-size: 1.3rem;
		padding: 10px;
		filter:  drop-shadow(1px 2px 3px black);
		background-color: lightgrey;
		border-radius: 5px;
		margin-top: 30px;
	}

@media screen and (max-width: 576px) {
.overflow
{
	overflow-x: scroll;
	font-size: 19px;
}


}
</style>
<body>

<form method="POST" class="overflow">
	<div class="container-lg border border-5-warning mb-5 p-4 shadow border border-5">
			<div>
				<a href="../admin_user_table.php" type="submit" class="btn btn-secondary">BACK</a>
				
			</div>
			<div class="border bg-danger text-center p-2 fs-4 rounded mt-3 mb-5">
						Are you sure you want to delete this account?			
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
    				<label for="staticEmail" class="col-lg-3 text-center col-form-label" style="font-size: 20px;">Name :</label>
    			<div class="col-lg-4">
      				<input type="text" class="form-control-plaintext text-center" id="staticEmail" value="<?php echo ucwords($row['fname']).ucwords($row['lname']);?>" style="font-size: 20px;">
    			</div>
			</div>

		<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 text-center col-form-label" style="font-size: 20px;">Email :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['email'];?>" style="font-size: 20px;">
    			</div>
			</div>

		<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 text-center col-form-label" style="font-size: 20px;">Contact :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo $row['contact'];?>" style="font-size: 20px;">
    			</div>
			</div>

			<div class="mb-3 row text-end d-flex justify-content-center">
    				<label for="staticEmail" class="col-lg-3 text-center col-form-label" style="font-size: 20px;">Addres :</label>
    			<div class="col-lg-4">
      				<input type="text" readonly class="form-control-plaintext text-center" id="staticEmail" value="<?php echo ucwords($row['user_address']);?>" style="font-size: 20px;">
    			</div>
			</div>
			<?php 

				include '../dbcon.php';

					$q = "SELECT * FROM tbl_resort WHERE user_id = $id ";

					$res = mysqli_query($conn, $q);

					if ($res && mysqli_num_rows($res) > 0){

						while($row = mysqli_fetch_assoc($res)){

								if ($row['archive'] == "show"){

								$_SESSION['res_id'] = $row['resort_id'];
							
								echo"
									<div class='res_name'>".ucwords($row['resort_name'])."</div>";
						 		}else{

						 			echo"
						 				<h1>NO DATA</h1>
						 			";
						 			break;
						 		}
						}

					} ?>

	</div>
</form>
			<?php } ?>	

</body>
</html>