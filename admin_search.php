<?php
session_start();

if(!isset($_SESSION['username'])){

	header('Location: ./admin_login.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/admin_search.css">
	<title>Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="./admin_dash.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>

				</a>
			</li>
			<li>
				<a href="./admin_resort.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Resort</span>
				</a>
			</li>
			<li class="active">
				<a href="./admin_search.php">
					<i class='bx bxs-search-alt-2' ></i>
					<span class="text">Search</span>
				</a>
			</li>
			<li>
				<a href="logout.php">
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
			
			<form class="form-content">
				<div><input type="search" name="" id="search_engine" class="search"></div>
				<div class="search_content">
					<div class="resort_rect">
						<img src="./assets/img/123.png" alt="Image">
						<div>
							<p>C & J</p>
						</div>
					</div>
					<div class="resort_rect">
						<img src="./assets/img/123.png" alt="Image">
						<div>
							<p>Sundowners</p>
						</div>
					</div>
					<div class="resort_rect">
						<img src="./assets/img/123.png" alt="Image">
						<div>
							<p>Kainomayan</p>
						</div>
					</div>
					<div class="resort_rect">
						<img src="./assets/img/123.png" alt="Image">
						<div>
							<p>Balihay</p>
						</div>
					</div>
					<div class="resort_rect">
						<img src="./assets/img/123.png" alt="Image">
						<div>
							<p>C & J</p>
						</div>
					</div>
					<div class="resort_rect">
						<img src="./assets/img/123.png" alt="Image">
						<div>
							<p>C & J</p>
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