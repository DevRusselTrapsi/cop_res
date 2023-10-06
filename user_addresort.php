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

			<form method="post" action="./backend-addresort.php" enctype="multipart/form-data">

		<div class="container">

			<h1>SURVEY FORM</h1>

			<div class="content">

					<!-- FIRST FORM STRUCTURE-->

					<div class="first-form">
						
						<div class="input-form">

						<h3>Information</h3>
							<div>
								<label>Name of the Establishment:</label>
								<input type="text" class="input" name="resort_name" required>
							</div>

							<div>
							<label>Address:</label>
								<input type="text" class="input" name="resort_address" placeholder="Establishment's Address" required>

							</div>
							<div>
								<label>Owners Fullname:</label>
								<input type="text" class="input" name="owner_name" placeholder="Enter your Name" required>
							</div>
							<div>
								<label>Address:</label>
								<input type="text" class="input" name="owner_address" placeholder="(Owner's Address)" required>
							</div>
									
							<p>Contacts:</p>

							<div>
								<label>Office Contact:</label>
								<input type="text" name="resort_office" class="input" placeholder="09********" required><br>
							</div>							
							<div>
								<label>Home Contact:</label>
								<input type="text" name="resort_contact" class="input" placeholder="09********" required>
							</div>
							<div>
								<label>Owner Contact:</label>
								<input type="text" name="owner_contact" class="input" placeholder="09********" required>
							</div>
							<div>
								<label>Manager Contact:</label>
								<input type="text" name="manager_contact" class="input" placeholder="09********" required>
							</div>						
							<div>
								<label>Upload image of the establishment:</label>
								<input type="file" class="insert_img" name="resort_url"  style="background-color: white; cursor: pointer;" required>
							</div>
					</div>
				</div>
					<!-- SECOND FORM STRUCTURE-->

				<div class="second-form">

					<p>Accommodation</p>

					<button class="btn-add" name="add_more" type="submit" >Add more</button>

					<div class="input-form">
						<div class="header-accom">
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
								<input type="file" class="insert_img" id="input_file" name="accom_url" accept="image/png, image/jpg, image/jpeg, image/PNG" style="background-color: white; cursor: pointer;">
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
								<input type="file" class="insert_img" name="faci_url" accept="image/png, image/jpg, image/jpeg, image/PNG" style="background-color: white; cursor: pointer;" required>
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
				
				<input type="submit" class="btn_save" name="submit" value="Add Resort">
			</div>
		</div>

	</form>
				
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
	<script>
        // Function to add the input form
        function addInputForm() {
            const formContainer = document.getElementById('formContainer');
            const inputForm = document.createElement('div');
            inputForm.className = 'inputform';
            inputForm.innerHTML = `
                <div class="service_section">
                    <div>
                    <input type="text" class="input" name="service_name">
                    </div>
                    <div>
                    <input type="text" class="input" name="description">
                    </div>
                    <div>
                    <input type="text" class="input" name="rates">
                    </div>
                </div>
            `;
            formContainer.appendChild(inputForm);
        }

        // Function to remove the last input form
        function removeInputForm() {
            const formContainer = document.getElementById('formContainer');
            const inputForms = formContainer.getElementsByClassName('inputform');
            if (inputForms.length > 0) {
                formContainer.removeChild(inputForms[inputForms.length - 1]);
            }
        }

        // Add event listeners to the buttons
        document.getElementById('addButton').addEventListener('click', addInputForm);
        document.getElementById('removeButton').addEventListener('click', removeInputForm);
    </script>
</body>
</html>