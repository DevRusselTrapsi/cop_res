<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resort Info</title>
</head>
<style type="text/css">
	body
	{
		font-family: 'Lato', sans-serif;;
		background-color: #eee;

	}

	body > .container
	{
		margin-left: 6%;
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
		border: 1px solid black;
		filter: drop-shadow(1px 1px 5px black);
		max-width: 1200px;
		width: 100%;
		background-color: white;
		display: inline-block;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
		text-align: center;
	}

	.profile
	{
		border: 1px solid black;
		width: 100%;
		height: 350px;
		background: url('./assets/pictures_resort/haya.jpg');
		background-size: cover;
		background-attachment: fixed;
		background-repeat: no-repeat;
		position: relative;
		overflow: hidden;
	}

	.profile > h2 
	{
		margin-top: 150px;
		font-size: 4.5rem;
	}

	.form-content
	{
		text-align: center;
		display: inline-block;
		justify-content: center;
		align-items: center;
	}

	.content
	{
		display: flex;
		width: 100%;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
	}

	/*Resort Info CSS*/

	.res_content
	{
		width: 90%;
		display: block;
		justify-content: center;
		align-items: center;
		text-align: left;
		margin-top: 50px;
		margin-left: 5%;
	}

	.col-2
	{
		border-bottom: 1px solid black;
		background-color: rgba(84, 88, 88, 0.05);
		border-radius: 10px;
		width: 100%;
		display: inline-flex;
		word-wrap: break-word;
		justify-content: space-between;
		margin-bottom: 5px;
		text-indent: 10px;
	}


	.col-2 > div
	{
		width: 100%;
	}

	.col-2 >div:first-child
	{
		font-weight: bold;

	}
	/*Resort Info CSS*/


	/* ACCOMMODATION CSS  */
	.header_accom
	{
		display: flex;
		justify-content: space-between;
		width: 90%;
		border: 1px solid black;
		background-color: rgba(0, 197, 186, 0.72);
	}

	.accom_section
	{
		display: flex;
		justify-content: space-between;
		background-color: rgba(84, 88, 88, 0.14);
		width: 90%;
	}

	.header_accom > div
	{
		width: 100%;
	}

	.accom_section > div
	{
		width: 100%;
	}

		/* ACCOMMODATION CSS  */

		/* SERVICE CSS  */

	.header_service
	{
		display: flex;
		justify-content: space-between;
		background-color: rgba(0, 197, 186, 0.72);
		border: 1px solid black;
		width: 90%;
	}

	.service_section
	{
		display: flex;
		justify-content: space-between;
		width: 90%;
		margin-bottom: 50px;
	}

	.header_service > div
	{
		width: 100%;
	}

	.service_section > div
	{
		background-color: rgba(84, 88, 88, 0.14);
		width: 100%;
	}

		/* SERVICE CSS  */

		/* FACILITY CSS  */

	.header_faci
	{
		display: flex;
		justify-content: space-between;
		width: 90%;
		background-color: rgba(0, 197, 186, 0.72);
		border: 1px solid black;
	}

	.faci_section
	{
		display: flex;
		justify-content: space-between;
		background-color: rgba(84, 88, 88, 0.14);
		width: 90%;
	}

	.header_faci > div
	{

		width: 100%;
	}

	.faci_section > div
	{

		width: 100%;
	}

		/* FACILITY CSS  */


	button[type=submit]{
		padding: 5px 10px;
		border-radius: 3px;
		margin-bottom: 10px;
		margin-top: 20px;
		cursor: pointer;
		border: none;
		filter: drop-shadow(1px 1px 5px grey);
		font-weight: bold;

	}
	.update
	{
		background-color: rgba(0, 236, 31, 0.8);

	}

	.delete
	{
		background-color: orangered;
	}

	.btn_section
	{
		display: flex;
		justify-content: flex-end;
		width: 100%;
		margin-right: 50px;
	}

</style>
<body>

<nav class="navbar">
	<div>
		<a href="./admin_search.php"><img src="./assets/icons/arrow-back.svg"></a>
	</div>
</nav>

<div class="container">
	<div class="profile">
		<h2>Kainomayan</h2>
	</div>
	<div class="form-content">

		<!-- Resort Information -->
	<h2>Resorts Info</h2>
		<div class="res_content">
			<div class="col-2">
				<div>
					<p>Name of the Establishment:</p>
				</div>
				<div>
					<p>Kainomayan</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Establishment address:</p>
				</div>
				<div>
					<p>San Juan Botolan Zambales</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners' name:</p>
				</div>
				<div>
					<p>Mark RUssel Trapsi</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owners' address:</p>
				</div>
				<div>
					<p>Porac Botolan Zambales</p>
				</div>
			</div>

			<h2>Contacts</h2>

			<div class="col-2">
				<div>
					<p>Office Contact:</p>
				</div>
				<div>
					<p>0978787878</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Home Contact:</p>
				</div>
				<div>
					<p>0978787878</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Owner Contact:</p>
				</div>
				<div>
					<p>0978787878</p>
				</div>
			</div>
			<div class="col-2">
				<div>
					<p>Manager Contact:</p>
				</div>
				<div>
					<p>0978787878</p>
				</div>
			</div>
		</div>
							<!-- ACCOMMODATION SECTION -->


				<h2>Accommodations</h2>

				<div class="content">
						<div class="header_accom">
						<div>
							<label>Type of Accommodation:</label>
						</div>
						<div>
							<label>No. of Units:</label>
						</div>	
						<div>
							<label>Capacity:</label>
						</div>	
						<div>	
							<label>Price:</label>
						</div>
						<div>
							Action
						</div>
					</div>

				<div class="accom_section">	
			<?php 
				include('dbcon.php');

				$q = "SELECT type_of_room, no_accom_units, accom_capacity, accom_rates FROM tbl_accommodation";
				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $row = mysqli_fetch_assoc($res);
   				 ?>
   				 		<div>
							<p><?php echo $row['type_of_room'];?></p>
						</div>
						<div>
							<p><?php echo $row['no_accom_units'];?></p>
						</div>
						<div>
							<p><?php echo $row['accom_capacity'];?></p>
						</div>
						<div>
							<p><?php echo $row['accom_rates'];?></p>
						</div>
						<div>	
							<button type="submit" class="update">Update</button>&nbsp&nbsp&nbsp
							<button type="submit" class="delete">Delete</button>
						</div>
					<?php }else{ ?>
						<div>
							<p>No Data input</p>
						</div>
						<div>
							<p>No Data input</p>
						</div>
						<div>
							<p>No Data input</p>
						</div>
						<div>
							<p>No Data input</p>
						</div>
						<div>	
							<button type="submit" class="update">Update</button>&nbsp&nbsp&nbsp
							<button type="submit" class="delete">Delete</button>
						</div>
					</div>
				
					<?php } ?>
				</div>


				<!-- FACILITY SECTION -->


		<h2>Existing Facilities and Amenities</h2>


   				 <div class="content">
			
					<div class="header_faci">
						<div>
							<label>Type of Facility:</label>
						</div>
						<div>
							<label>no. of Units:</label>
						</div>	
						<div>
							<label>Capacity:</label>
						</div>	
						<div>	
							<label>Price:</label>
						</div>
						<div>
							Action
						</div>
					</div>

				<div class="faci_section">	
			<?php 
				include('dbcon.php');

				$q = "SELECT type_of_facility, faci_capacity, no_faci_units, faci_rates FROM tbl_accommodation";
				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $row = mysqli_fetch_assoc($res);
   				 ?>
   				 		<div>
							<p><?php echo $row['type_of_facility']; ?></p>
						</div>
						<div>
							<p><?php echo $row['faci_capacity']; ?></p>
						</div>
						<div>
							<p><?php echo $row['no_faci_units']; ?></p>
						</div>
						<div>
							<p><?php echo $row['faci_rates']; ?></p>
						</div>
						<div>	
							<button type="submit" class="update">Update</button>&nbsp&nbsp&nbsp
							<button type="submit" class="delete">Delete</button>
						</div>

				<?php }else{ ?>
						<div>
							<p>No Data input</p>
						</div>
						<div>
							<p>No Data input</p>
						</div>
						<div>
							<p>No Data input</p>
						</div>
						<div>
							<p>No Data input</p>
						</div>
						<div>	
							<button type="submit" class="update">Update</button>&nbsp&nbsp&nbsp
							<button type="submit" class="delete">Delete</button>
						</div>
					<?php } ?>
				</div>
			</div>

								<!-- SERVICE SECTION -->

			<h2>Services</h2>


   				 <div class="content">
			
					<div class="header_service">
						<div>
							<label>Type of Service:</label>
						</div>
						<div>
							<label>Descriptions:</label>
						</div>	
						<div>
							<label>Price:</label>
						</div>
						<div>
							Action
						</div>
					</div>
				<div class="service_section">
			<?php 
				include('dbcon.php');

				$q = "SELECT type_of_facility, faci_capacity, no_faci_units, faci_rates FROM tbl_accommodation";
				$res = mysqli_query($conn,$q);

				if ($res && mysqli_num_rows($res) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $row = mysqli_fetch_assoc($res);
   				 ?>
						<div>
							<p><?php echo $row['type_of_service']; ?></p>
						</div>
						<div>
							<p><?php echo $row['description']; ?></p>
						</div>
						<div>
							<p><?php echo $row['service_rates']; ?></p>
						</div>
						<div>	
							<button type="submit" class="update">Update</button>&nbsp&nbsp&nbsp
							<button type="submit" class="delete">Delete</button>
						</div>

				<?php }else {?> 

					<div>
						<p>No Data input</p>
					</div>
					<div>
						<p>No Data input</p>
					</div>
					<div>
						<p>No Data input</p>
					</div>
					<div>	
						<button type="submit" class="update">Update</button>&nbsp&nbsp&nbsp
						<button type="submit" class="delete">Delete</button>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Carousel Input here -->

</body>
</html>