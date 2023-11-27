<?php 
	
	session_start();

	if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$name = $_SESSION['name'];

include('dbcon.php');



if (isset($_GET['get'])) {

    $resort_id = $_GET['get'];

    if (isset($_POST['submit'])) {

        $q_check = "SELECT permit_url FROM tbl_resort WHERE resort_id = '$resort_id'";

		$res = mysqli_query($conn, $q_check);

		if ($res && mysqli_num_rows($res)){

			$row = mysqli_fetch_assoc($res);

			if($row['permit_url'] == 'no_permit'){

				echo"<script>alert('Cannot Verify. No Image Found');</script>";
			}else{

				$verified = 'verified';
				$comment = '';

        		$q = "UPDATE tbl_resort SET verification = '$verified', verifiedby = '$name', comment = '' WHERE resort_id = '$resort_id'";
        
        		if (mysqli_query($conn, $q)) {

          	 		echo "<script>alert('Verified Permit');</script>";

       		 	} else {
            	
            		echo "Error: " . mysqli_error($conn);
       	 		}
			}
		}else{

			echo "Error: " . mysqli_error($conn);
		}

	}

} else {

    echo "Parameter 'get' is missing.";
}



$comment = "";

if (isset($_POST['delete'])) {

 	$resort_id = $_GET['get'];

		$not_verif = "not_verified";
		$currentDate = date('Y-m-d');
		$comment = $_POST['comment'];


$q2 = "SELECT permit_url FROM tbl_resort WHERE resort_id = $resort_id"; // query for the permit_url

$res_check = mysqli_query($conn, $q2);

	if($res_check && mysqli_num_rows($res_check) > 0){

	$row_check = mysqli_fetch_assoc($res_check);

		if($row_check['permit_url'] == 'no_permit'){
			// if there is no permit admin is not allow to verify the status
			echo"<script>alert('Cannot Unverify. No Image Found');</script>";

		}else{

			$q = "UPDATE tbl_resort SET verification = ?, event_date = ?, verifiedby = ?, comment = ? WHERE resort_id = ?";
			$stmt = mysqli_prepare($conn, $q);

			if ($stmt) {

    			mysqli_stmt_bind_param($stmt, "ssssi", $not_verif, $currentDate, $name, $comment, $resort_id);
    			$not_verif = "not_verified";
    			$currentDate = date('Y-m-d');
    			$comment = $_POST['comment'];
			
				if (mysqli_stmt_execute($stmt)) {

        			echo "<script>alert('Permit Unverified');</script>";

   				 } else {

        			echo "Error: " . mysqli_error($conn);
    			}

			} else {

    			echo "Error in preparing statement: " . mysqli_error($conn);
			}

		}

	}
}

// sub_comment

if(isset($_POST['sub_comment'])){

$resort_id = $_GET['get'];

		$comment = $_POST['comment'];
		$date_event = date('Y-m-d');

			$q = "INSERT INTO tbl_notif (comment, resort_id, date_event) VALUES (?, ?, ?)";
			$stmt = mysqli_prepare($conn, $q);

			if ($stmt) {

    			mysqli_stmt_bind_param($stmt, "sis", $comment, $resort_id, $date_event);

    			$comment = $_POST['comment'];
				$date_event = date('Y-m-d');
			
				if (mysqli_stmt_execute($stmt)) {

        			echo "<script>alert('Message Sent');</script>";

   				 } else {

        			echo "Error: " . mysqli_error($conn);
    			}

			} else {

    			echo "Error in preparing statement: " . mysqli_error($conn);
			}

		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="./assets/img/tourism-favicon.png">
	<title>Verification</title>
</head>
<style type="text/css">
	body
	{
		font-family: 'Lato', sans-serif;;
		background-color: lightgrey;
	}
	.content > div > img
	{
		height: 800px;
		width: 600px;
		filter: drop-shadow(1px 1px 5px black);
		border: 1px solid black;
	}
	.content
	{
		
		display: inline-block;
		flex-wrap: wrap;
	}
	
	.btn2
	{
		margin-top: 50px;
		margin-bottom: 10px;
		display: inline-flex;
		width: 100%;
		display: flex;
		justify-content: flex-end;
	}

	
</style>
<body>

<form method="POST">

<div class="container-lg border border-5-warning bg-light mt-5 mb-5 p-4 d-block justify-content-center text-center shadow">

	<div class="d-flex justify-content-start">
		<a href="./admin_dash.php" type="submit" class="btn btn-primary">Cancel</a>

	</div>
	<?php 

		include('dbcon.php');
		
		$resort_id = $_GET['get'];

		$q = "SELECT * FROM tbl_resort WHERE resort_id = '$resort_id'";

		$res = mysqli_query($conn, $q);

		if($res && mysqli_num_rows($res) > 0) {

			$row = mysqli_fetch_assoc($res);

		?>

	<h1><?php echo $row['resort_name'];?></h1>

	<div class="content">
		<div>
			<h2>Business Permit</h2>
		</div>
		<div>
			<?php
			if($row['permit_url'] == 'no_permit'){
				
				echo"
			
			<p class='mt-5 border p-5 shadow'>NO PERMIT SUBMITTED</p>";

			}else{

				
			echo"
			
			<img src='".$row['permit_url']."'>";
			}
			?>
		</div>
		
	</div>
<div class="d-flex justify-content-center">

	<div class="form-floating mt-3 col-5">
  		<textarea class="form-control " name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  	<label for="floatingTextarea2">Comments</label>
  		<div class="mb-1 fs-6">
			<span >Note: Click the sent icon if you want to send notification to the user</span>
  		</div>
  		<div class="d-flex justify-content-end">
  			<button type="submit" name="sub_comment" class="btn btn-primary mt-1 pe-3 ps-3 shadow">
  				<img src="./assets/icons/send_light.svg">
  			</button>
  		</div>
	</div>
</div>

	<?php } ?>

		<div class="btn2">
			<div>
			<button type="submit" value="submit" name="submit" class="btn btn-success pe-5 ps-5 me-3">Verify</button>
			</div>
			<div>
				<button type="submit" value="submit" name="delete" class="btn btn-danger pe-4 ps-4 me-3">Unverified</button>
			</div>
		</div>
	</div>
</form>

<script src="./js/sweetalert.min.js"></script>
</body>
</html>