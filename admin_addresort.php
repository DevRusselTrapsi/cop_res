<?php
session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
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
	<link rel="stylesheet" href="./css/user_addresort.css">
	
	<title>Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="./user_addresort.php" class="brand">
			<i><img src="./assets/img/tourism.jpg" class="logo"></i>
			<p>WELCOME!</p>
			<span>ADMIN</span>
		</a>
        <ul class="side-menu top">
            <li>
                <a href="./admin_dash.php">
                    <i class='bx bxs-shopping-bag-alt' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="./admin_addresort.php">
                    <i class='bx bxs-plus-circle'></i>
                    <span class="text">Add Resort</span>
                </a>
            </li>
            <li>
                <a href="./admin_search.php">
                    <i class='bx bxs-search-alt-2' ></i>
                    <span class="text">Search</span>
                </a>
            </li>
            <li>
                <a href="./owner_register.php">
                    <i class='bx bxs-user-plus' ></i>
                    <span class="text">Add Owner Account</span>
                </a>
            </li>
            <li>
				<a href="./user_table.php">
					<i class='bx bx-list-ul'></i>
					<span class="text">Owner List</span>
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
				
			<form method="post" action="./backend-addresort.php" enctype="multipart/form-data">

		<div class="container">

			<h1>SURVEY FORM</h1>

			<div class="content">

					<!-- FIRST FORM STRUCTURE-->

					<div class="first-form">
						
						<div class="input-form">

						<h3>Information</h3>
							<div class="col-2">
								<div>
									<label>Name of the Establishment:</label>
								</div>
								<div>
									<input type="text" class="input" name="resort_name" required>
								</div>
							</div>

							<div class="col-2">
								<div>
									<label>Address:</label>
								</div>
								<div>
									<input type="text" class="input" name="resort_address" placeholder="Establishment's Address">
								</div>
							</div>
							<div class="col-2">
								<div>
									<label>Owner:</label>
								</div>
								<div>
									<input type="text" class="input" name="owner_name" placeholder="(Firstname, Middlename, Lastname)">
								</div>
							</div>
							<div class="col-2">
								<div>
									<label>Address:</label>
								</div>
								<div>
									<input type="text" class="input" name="owner_address" placeholder="(Owner's Address)" required>
								</div>
							</div>
									
							<p>Contacts:</p>

							<div class="col-2">
								<div>
									<label>Office Contact:</label>
								</div>
								<div>
									<input type="text" name="resort_office" class="input" placeholder="09********" required>
								</div>
							</div>							
							<div class="col-2">
								<div>
									<label>Home Contact:</label>
								</div>
								<div>
									<input type="text" name="resort_contact" class="input" placeholder="09********" required>
								</div>
							</div>
							<div class="col-2">
								<div>
									<label>Owner Contact:</label>
								</div>
								<div>
									<input type="text" name="owner_contact" class="input" placeholder="09********" required>
								</div>
							</div>
							<div class="col-2">
								<div>
									<label>Manager Contact:</label>
								</div>
								<div>											<input type="text" name="manager_contact" class="input" placeholder="09********" required>
									</div>

							</div>						
							<div class="col-2">
								<div>
									<label>Upload image of the establishment:</label>
								</div>
								<div>
									<input type="file" class="insert_img" name="resort_url"  style="background-color: white; cursor: pointer;" required>
								</div>
							</div>
					</div>
				</div>
					<!-- SECOND FORM STRUCTURE-->

				<div class="second-form">

					<p>Accommodation</p>

					<div class="input-form">
						<div class="header-accom">
							<div><label>Type of Room:</label></div>
							<div><label>No. of Rooms:<label></div>
							<div><label>Capacity:</label></div>
							<div><label>Price:</label></div>
							<div><label>Insert Image of the Room:</label></div>
						</div>
						<div class="accom_section" id="formContainer3">
							<div class="input_group3" >
								<div class="input_group3">
    								<div>
        								<input type="text" class="input-1" name="type_of_room">
    								</div>
    								<div>
        								<input type="text" class="input-1" name="no_accom_units">
    								</div>
    								<div>
       								 <input type="text" class="input-1" name="accom_capacity">
    								</div>
    								<div>
        								<input type="text" class="input-1" name="accom_rates">
    								</div>
    								<div>
        								<input type="file" class="insert_img2" id="input_file" name="accom_url" accept="image/png, image/jpg, image/jpeg, image/PNG" style="background-color: white; cursor: pointer;">
   								 </div>
								</div>

							</div>
						</div>
					</div>
				</div>

					<!-- THIRD FORM STRUCTURE-->

				<div class="third-form">

					<div class="input-form">
						<div class="header-faci">
							<div><label>Type of Facility:</label></div>
							<div><label>No. of Units:<label></div>
							<div><label>Capacity:</label></div>
							<div><label>Price:</label></div>
							<div><label>Insert Image of the Room:</label></div>
						</div>
						<div class="faci_section" id="formContainer2">
							<div class="input_group2">
								<div>
									<input type="text" class="input-1" name="type_of_facility" required>
								</div>
								<div>
									<input type="text" class="input-1" name="no_faci_units" required>
								</div>
								<div>
									<input type="text" class="input-1" name="faci_capacity" required>
								</div>
								<div>
									<input type="text" class="input-1" name="faci_rates" required>
								</div>
								<div>
									<input type="file" class="insert_img2" name="faci_url" accept="image/png, image/jpg, image/jpeg, image/PNG" style="background-color: white; cursor: pointer;" required>
								</div>
							</div>
						</div>
					</div>
				</div>


					<!-- FOURTH FORM STRUCTURE-->

				<div class="fourth-form">

					<p>Services</p>

					<div class="input-form" id="input-form">
						<div  class="header-service">
							<div><label>Type of Service:</label></div>
							<div><label>Description:<label></div>
							<div><label>Price:</label></div>
						</div>
						<div class="service_section" id="formContainer">
							<div class="input_group">
								<div>
									<input type="text" class="input-1" name="type_of_service">
								</div>
								<div>
									<input type="text" class="input-1" name="description">
								</div>
								<div>
									<input type="text" class="input-1" name="service_rates">
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- end -->
				
				<input type="submit" class="btn_save" name="submit" value="Add Resort">
			</div>
		</div>

	</form>
						<!-- add and remove -->

			<div class="hover-tool">
					<div>
						<div>
							<img src="./assets/icons/add-circle-black.svg" alt="" style=" margin-left: -2.5px; margin-top: 5px;">
						</div>
					</div>
					<div class="accom">
						<div>
							<p>Service</p>
						</div>
						<div>
							<button id="addButton" class="btn-add" name="add" type="submit">+</button>
						</div>
						<div>
							<button id="removeButton" class="btn-remove" name="remove" type="submit">-</button>
						</div>      
        			</div>
					<div class="facility">
						<div>
							<p>Facility</p>
						</div>
						<div>
							<button id="addfaci" class="btn-add" name="add" type="submit">+</button>
						</div>
						<div>
							<button id="removefaci" class="btn-remove" name="remove" type="submit">-</button>
						</div>
        			</div>
					<div class="service">
						<div>
							<p>Accommodation</p>
						</div>
						<div>
							<button id="addaccom" class="btn-add" name="add" type="submit">+</button>
						</div>
						<div>
							<button id="removeaccom" class="btn-remove" name="remove" type="submit">-</button>
						</div>
					</div>
				</div>	
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="./script.js"></script>
	<script src="./js/addservice.js"></script>
	<script src="./js/addaccom.js"></script>
	<script src="./js/addfaci.js"></script>
</body>
</html>