<?php
session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

include('../dbcon.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="../assets/img/tourism-favicon.jpg">
	<title>Delete Resort</title>
</head>
<body>

<div class="res_content">
	
<?php 
		include('../dbcon.php');

			// use session resort_id to the user_addresort to get the data from the tbl_resort 
			$req = $_GET['del'];

			$sql = "SELECT *
					FROM tbl_resort
        			WHERE resort_id = '$req'";

					$res = mysqli_query($conn, $sql);

					if($res && mysqli_num_rows($res) > 0){

						while($row_resort = mysqli_fetch_assoc($res)) {
					?>

			<div class="col-2">
			
				<div>
					<p>Name of the Establishment:</p>
				</div>
				<div>
					<p><?php echo $row_resort['resort_name'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Establishment address:</p>
				</div>
				<div>
					<p><?php echo $row_resort['resort_address'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners' name:</p>
				</div>
				<div>
					<p><?php echo $row_resort['owner_name'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners' address:</p>
				</div>
				<div>
					<p><?php echo $row_resort['owner_address'];?></p>
				</div>
			</div>

			<h3>Contacts</h3>

			<div class="col-2">
				<div>
					<p>Office Contact:</p>
				</div>
				<div>
					<p><?php echo $row_resort['resort_office'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Home Contact:</p>
				</div>
				<div>
					<p><?php echo $row_resort['resort_contact'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owner Contact:</p>
				</div>
				<div>
					<p><?php echo $row_resort['owner_contact'];?></p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Manager Contact:</p>
				</div>
				<div>
					<p><?php echo $row_resort['manager_contact'];?></p>
				</div>
			</div>
			<?php
				} 

			}else{ 

				?>
	
				<!-- this will show if there is no data -->

	<div class="col-2">
				<div>
					<p>Name of the Establishment:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Establishment address:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners name:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners address:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>

			<h3>Contacts</h3>

			<div class="col-2">
				<div>
					<p>Office Contact:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Home Contact:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owner Contact:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Manager Contact:</p>
				</div>
				<div>
					<p>No Data Input</p>
				</div>
			</div>
			<div class="col-3">
				<a type="submit" class="update" name="res_update" >Update</a>
				<a type="submit" class="delete" name="res_delete" >Delete</a>
			</div>
		</div>
				 <?php 
						} 
					?>



</body>
</html>