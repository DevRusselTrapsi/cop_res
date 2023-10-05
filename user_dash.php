<?php
session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./user_login.php");
	exit();
}

$user_email = $_SESSION["email"];
$fname = $_SESSION["fname"];




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/user_dashboard.css">

	<title>User Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="./user_dash.php" class="brand">
			<i><img src="./assets/img/tourism.jpg" class="logo"></i>
			<p>WELCOME!</p>
			
			<span class="text"><?php echo $fname;?></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="./user_resortinfo.php">
					<i class='bx bxs-info-circle'></i>
					<span class="text">Resort Info</span>
				</a>
			</li>
			<li>
				<a href="./user_addresort.php">
					<i class='bx bxs-plus-circle'></i>
					<span class="text">Add Resort</span>
				</a>
			</li>
			<li>
				<a href="./logout.php">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
		</nav>
		<!-- NAVBAR -->



		<!-- MAIN -->
		<main>
			<div class="form-content">
				<h1>User Information</h1>
				<div class="content">
					<div>
						<p>Firstname:</p>
						<p> Mark Russel</p>
					</div>
					<div>
						<p>Lastname:</p>
						<p> Trapsi</p>
					</div>
					<div>
						<p>Email:</p>
						<p>mark@gmail.com</p>
					</div>
					<div>
						<p>Address:</p>
						<p>Porac Botolan Zambales</p>
					</div>
				</div>

				<h1>Owner Information</h1>
				
				<div class="content">
					<div>
						<p>Name:</p>
						<p>Mark Russel Trapsi</p>
					</div>
					<div>
						<p>Address:</p>
						<p>Porac Botolan Zambales</p>
					</div>
					<div>
						<p>Email:</p>
						<p>mark@gmail.com</p>
					</div>
					<div>
						<p>Address:</p>
						<p>Porac Botolan Zambales</p>
					</div>
				</div>

				<h1>Contact Information</h1>
				
				<div class="content">
					<div>
						<p>Owner's Contact:</p>
						<p>0976 - 249 - 9708</p>
					</div>
					<div>
						<p>Office Contact:</p>
						<p>0976 - 249 - 9708</p>
					</div>
					<div>
						<p>Resort's Contact:</p>
						<p>0976 - 249 - 9708</p>
					</div>
					<div>
						<p>Manager's Contacts:</p>
						<p>0976 - 249 - 9708</p>
					</div>
				</div>
			</div>
		</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>