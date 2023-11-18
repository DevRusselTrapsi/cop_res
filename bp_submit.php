<?php
session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./user_index.php");
	exit();
}

$fname = $_SESSION["fname"];

$id = $_GET['get'];

	include('dbcon.php');

	$q = "SELECT * FROM tbl_resort WHERE resort_id = '$id'";
	$res= mysqli_query($conn, $q);

	if ($res && mysqli_num_rows($res) > 0) {
		
		$row = mysqli_fetch_assoc($res);
	}

if(isset($_POST['submit'])){
		
		
		$img = $_FILES['permit_url']['name'];
    	$img_file_tmp = $_FILES['permit_url']['tmp_name'];

    	$permit_dir = "permit_img/";

    	 // Move the uploaded files to the folder of estab_img
    	move_uploaded_file($img_file_tmp, $permit_dir . $img);

    	$permit_path = $permit_dir . $img;

		// UPDATE DATABASE
		$sql = "UPDATE tbl_resort SET permit_url = '$permit_path' WHERE resort_id = '$id'";

		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('Successfully Submitted');</script>";
		}else{
			echo "Error: ".mysqli_error($conn);
		}
	}

	$id = $_GET['get'];


	if (isset($_POST['delete'])) {

		$del_permit = " ";
		
		$q = "UPDATE tbl_resort SET permit_url = '$del_permit' WHERE resort_id = '$id'";

		$res = mysqli_query($conn, $q);

		if($res){

			echo "<script>alert('Successfully Deleted');</script>";
		}else{

			echo "Error: ".mysqli_error($conn);
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/user_resortinfo.css">

	<title>User Dashboard</title>
</head>
<style type="text/css">
	.content
	{
		display: inline-block;
	}
	.content > div
	{
		margin-bottom: 30px;
	}

	.img
	{
		height: 1500px;
		width: 1000px;
		box-shadow: 5px 5px 10px black;
	}
	.btn
	{
		display: inline-flex;
	}

	.btn > div:first-child
	{
		margin-right:  10px;
	}

	.btn > div:last-child > button
	{
		background-color: red ;
		padding: 7px 20px;
		border: none;
		box-shadow: 2px 2px 3px black;
		border-radius: 6px;
	}

	button
	{
		padding: 7px 20px;
		background-color: rgba(0, 236, 31, 0.8) ;
		border: none;
		box-shadow: 2px 2px 3px black;
		border-radius: 6px;

	}

</style>
<body>

	<main>
		<div class="form-content">
			<div>
				<a href="./user_bps.php">BACK</a>
			</div>

		<!-- MAIN -->
			<form method="POST" enctype="multipart/form-data">
				<div class="container">
					<h1><?php echo $row['resort_name'];?></h1>

					<div class="content">
						<div>
							<h2>Business Permit</h2>
						</div>
						<div class="col">
							<div class="input-group">
  								<input type="file" name="permit_url"  class="form-control" id="inputGroupFile01">
							</div>
						</div>
						<div>
							<?php
							include('dbcon.php');

							$q2 = "SELECT permit_url FROM tbl_resort WHERE resort_id = '$id'";

							$res_img= mysqli_query($conn, $q2);


							if ($res_img && mysqli_num_rows($res_img) > 0) {

								if(!empty($row=mysqli_fetch_assoc($res_img))){

									echo "<img src='".$row['permit_url']."' class='img'>";

								}else{

									echo '<img src="" alt="Business Permit" class="img">';
								}
							}
							?>
						</div>
		
					</div>

					<div class="btn">
						<div>
						<button type="submit" value="submit" name="submit">Submit</button>
						</div>
						<div>
							<button type="submit" value="submit" name="delete" class="delete">Delete</button>
						</div>
					</div>
				</div>
			</form>
		</div>

	</main>
	<!-- CONTENT -->

</body>
</html>