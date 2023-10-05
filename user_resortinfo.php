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
	<link rel="stylesheet" href="./css/user_resortinfo.css">

	<title>User Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="./user_dash.php" class="brand">
			<i><img src="./assets/img/tourism.jpg" class="logo"></i>
			<p class="wc">WELCOME!</p>
			<span><?php echo $fname;?></span>
		</a>

		<ul class="side-menu top">
			<li>
				<a href="./user_addresort.php">
					<i class='bx bxs-plus-circle'></i>
					<span class="text">Add Resort</span>
				</a>
			</li>
			<li  class="active">
				<a href="./user_resortinfo.php">
					<i class='bx bxs-info-circle'></i>
					<span class="text">Resort Info</span>
				</a>
			</li>
			<li>
				<a href="./index.php">
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
			<form>
		<div class="form-content">
			<div class="profile">
				<img src="./assets/img/123.png" alt="Image">
				<h2>Kainomayan</h2>
				<!-- this is where the image will popout -->

			</div>
				<h3>Accommodations</h3>

				<div class="content">
					<div>
						<p>Type of Room:</p>
						<p>Queen Bed size</p>
					</div>
					<div>
						<p>no. of Rooms:</p>
						<p>2</p>
					</div>
					<div>
						<p>Capacity:</p>
						<p>4</p>
					</div>
					<div>
						<p>Price:</p>
						<p>1500</p>
					</div>
				</div>

				<h3>Existing Facilities and Amenities</h3>
				
				<div class="content">
					<div>
						<p>Type of Facility:</p>
						<p>basketball</p>
					</div>
					<div>
						<p>no. of Units:</p>
						<p>1</p>
					</div>
					<div>
						<p>Capacity:</p>
						<p>10</p>
					</div>
					<div>
						<p>Price:</p>
						<p>150</p>
					</div>
				</div>

				<h3>Services</h3>
				
				<div class="content">
					<div>
						<p>Type of Service:</p>
						<p>Laundry</p>
					</div>
					<div>
						<p>Descriptions:</p>
						<p>The service that we provide is we collect your laundry in every two days for 1 month.</p>
					</div>
					<div>
						<p>Price:</p>
						<p>150</p>
					</div>
				</div>
			<div class="btn_section">
				<button type="submit" class="update">Update</button>&nbsp&nbsp&nbsp
				<button type="submit" class="delete">Delete</button>
			</div>
			</div>
		</div>
		</form>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>