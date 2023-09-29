<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/user_addresort.css">

	<title>User Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">User Admin</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="./user_dash.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Owner & User Info</span>

				</a>
			</li>
			<li>
				<a href="./user_resortinfo.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Resort Info</span>
				</a>
			</li>
			<li class="active">
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

			<form class="row g-2 mt-3 m-5"method="post" action="./backend-addresort.php" enctype="multipart/form-data">

		<div class="container">

			<h1>SURVEY FORM</h1>

			<div class="content">

				<div class="first-form">

					<p>Accommodation</p>

					<button class="btn-add" name="add_more" type="submit" >Add more</button>

					<div class="input-form">
						<div class="header-accom row">
							<div><label>Type of Room:</label></div>
							<div><label>No. of Rooms:<label></div>
							<div><label>Capacity:</label></div>
							<div><label>Rate:</label></div>
							<div><label>Insert Image of the Room:</label></div>
						</div>
						<div class="accom_section">
							<div>
								<input type="text" class="input" name="type_of_room" required>
							</div>
							<div>
								<input type="text" class="input" name="no_accom_units" required>
							</div>
							<div>
								<input type="text" class="input" name="accom_capacity" required>
							</div>
							<div>
								<input type="text" class="input" name="accom_rates" required>
							</div>
							<div>
								<input type="file" class="input" id="input_file" name="accom_url" accept="image/png, image/jpg, image/jpeg, image/PNG" style="background-color: white; cursor: pointer;">
							</div>
						</div>
					</div>
				</div>

					<!-- THIRD FORM STRUCTURE-->

				<div class="third-form">

					<p>Existing Facilities and Ammenities</p>
					<button class="btn-add" name="add_more" type="submit" >Add more</button>

					<div class="input-form">
						<div class="header-faci">
							<div><label>Type of Facility:</label></div>
							<div><label>No. of Units:<label></div>
							<div><label>Capacity:</label></div>
							<div><label>Rate:</label></div>
							<div><label>Insert Image of the Room:</label></div>
						</div>
						<div class="faci_section">
							<div>
								<input type="text" class="input" name="type_of_facility" required>
							</div>
							<div>
								<input type="text" class="input" name="no_faci_units" required>
							</div>
							<div>
								<input type="text" class="input" name="faci_capacity" required>
							</div>
							<div>
								<input type="text" class="input" name="faci_rates" required>
							</div>
							<div>
								<input type="file" class="input" name="faci_url" accept="image/png, image/jpg, image/jpeg, image/PNG" style="background-color: white; cursor: pointer;" required>
							</div>
						</div>
					</div>
				</div>


					<!-- FOURTH FORM STRUCTURE-->

				<div class="fourth-form">

					<p>Services</p>
					<button class="btn-add" name="add_more" type="submit" >Add more</button>

					<div class="input-form">
						<div class="header-service">
							<div><label>Type of Service:</label></div>
							<div><label>Description:<label></div>
							<div><label>Rates:</label></div>
						</div>
						<div class="service_section">
							<div>
								<input type="text" class="input" name="type_of_service" required>
							</div>
							<div>
								<input type="text" class="input" name="description" required>
							</div>
							<div>
								<input type="text" class="input" name="service_rates" required>
							</div>
							
						</div>
					</div>
				</div>


				<!-- end -->
				
				<input type="submit" class="btn-save" name="submit" value="Add Resort">
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