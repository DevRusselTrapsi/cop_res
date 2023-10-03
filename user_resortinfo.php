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
		<a href="#" class="brand">
			<i><img src="./assets/img/tourism.jpg" class="logo"></i>
			<span class="text">User Admin</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="./user_dash.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Owner & User Info</span>

				</a>
			</li>
			<li  class="active">
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
			
		<div class="form-content">
			<div class="profile">
				<h1>(Resort's Name)</h1>
				<img src="" alt="Image">
				<!-- this is where the image will popout -->
			</div>
				<h1>Accommodations</h1>
				<div class="content">
					<div>
						<p>Type of Room:</p>
						<p> Mark Russel</p>
					</div>
					<div>
						<p>No. of Rooms:</p>
						<p> Trapsi</p>
					</div>
					<div>
						<p>Capacity:</p>
						<p>mark@gmail.com</p>
					</div>
					<div>
						<p>Rate:</p>
						<p>Porac Botolan Zambales</p>
					</div>
				</div>

				<h1>Existing Facilities and Amenities</h1>
				
				<div class="content">
					<div>
						<p>Type of Facility:</p>
						<p>Mark Russel Trapsi</p>
					</div>
					<div>
						<p>No. of Units:</p>
						<p>Porac Botolan Zambales</p>
					</div>
					<div>
						<p>Capacity:</p>
						<p>mark@gmail.com</p>
					</div>
					<div>
						<p>Rate:</p>
						<p>Porac Botolan Zambales</p>
					</div>
				</div>

				<h1>Services</h1>
				
				<div class="content">
					<div>
						<p>Type of Service:</p>
						<p>0976 - 249 - 9708</p>
					</div>
					<div>
						<p>Descriptions:</p>
						<p>The service that we provide is we collect your laundry in every two days for 1 month.</p>
					</div>
					<div>
						<p>Rate:</p>
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