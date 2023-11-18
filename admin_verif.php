<?php 
	
	session_start();

	if (!isset($_SESSION['email'])) {

	header("Location: ./u_a_login.php");
	exit();
}

include('dbcon.php');

if (isset($_GET['get'])) {
    $resort_id = $_GET['get'];

    // Rest of your code remains unchanged...

    if (isset($_POST['submit'])) {
        $verified = 'verified';
        $q = "UPDATE tbl_resort SET verification = '$verified' WHERE resort_id = '$resort_id'";
        
        if (mysqli_query($conn, $q)) {

           echo "<script>alert('Verified Permit');</script>";

        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo "Parameter 'get' is missing.";
}


   $resort_id = $_GET['get'];

if (isset($_POST['delete'])) {


		$not_verif = "not_verified";
		
		$q = "UPDATE tbl_resort SET verification = '$not_verif' WHERE resort_id = '$resort_id'";

		$res = mysqli_query($conn, $q);

		if($res){

			echo "<script>alert('Permit Unverified');</script>";
		}else{

			echo "Error: ".mysqli_error($conn);
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
	<title>Verification</title>
</head>
<style type="text/css">
	body
	{
		font-family: 'Lato', sans-serif;;
		background-color: lightgrey;
	}
	.navbar
	{
		position: absolute;
		top: 0;
		left: 0;
		background-color: white;
		width: 100%;
		height: 50px;
	}
	.container
	{
		margin-top: 100px;
		border: 2px solid black;
		/*width: 70%;*/
		min-width: 200px;
		max-width: 1200px;
		width: 100%;
		background-color: white;
		display: inline-block;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
		text-align: center;
	}
	.content > div > img
	{
		height: 1500px;
		width: 1000px;
		filter: drop-shadow(1px 1px 5px black);
		border: 1px solid black;
	}
	.content
	{
		
		display: inline-block;
		flex-wrap: wrap;
	}
	
	button[type=submit]{
		background-color: rgba(0, 236, 31, 0.8);
		padding: 10px 25px;
		border-radius: 10px;
		cursor: pointer;
		border: none;
		filter: drop-shadow(1px 1px 5px grey);
		font-weight: bold;

	}
	.btn
	{
		margin-top: 50px;
		margin-bottom: 10px;
		display: inline-flex;
		width: 100%;
		display: flex;
		justify-content: flex-end;
	}

	.btn > div:last-child > button
	{
		background-color: red;
		padding: 10px 20px;
		border-radius: 10px;
		margin-left: 10px;
		margin-right: 24px;
		cursor: pointer;
		border: none;
		filter: drop-shadow(1px 1px 5px grey);
		font-weight: bold;
	}
	
</style>
<body>

<nav class="navbar">
	<div>
		<a href="./admin_dash.php"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path></svg></a>
	</div>
</nav>

<form method="POST">
<div class="container">
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
			if(!empty($row['permit_url'])){
				
				echo"
			
			<img src='".$row['permit_url']."'>";

			}else{

				echo"
			
			<h1>NO PERMIT SUBMITTED</h1>";
			}
			?>
		</div>
		
	</div>
	<?php 
	
	}
	?>
	<div class="btn">
		<div>
			<button type="submit" value="submit" name="submit">Verify</button>
		</div>
		<div>
			<button type="submit" value="submit" name="delete" class="delete">Unverified</button>
		</div>
	</div>
</div>
</form>

<script src="./js/sweetalert.min.js"></script>
</body>
</html>