<?php
session_start();

if(!isset($_SESSION['email'])){

	header("Location: ./login.php");
	exit();
}

$fname = $_SESSION["fname"];
$user_id = $_SESSION["user_id"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/user_list.css">
	<link rel="icon" type="image/x-icon" href="./assets/img/tourism-favicon.png">
	<title>Resort Table</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="./user_addresort.php" class="brand">
			<i><img src="./assets/img/tourism-favicon.png" class="logo"></i>
			<p>WELCOME!</p>
			<span><?php echo ucwords($fname);?></span>
		</a>

		<ul class="side-menu top">
			<li>
				<a href="./user_addresort.php">
					<i class='bx bxs-plus-circle'></i>
					<span class="text">Add Resort</span>
				</a>
			</li>
			<!-- <li>
				<a href="./user_resortinfo.php">
					<i class='bx bxs-info-circle'></i>
					<span class="text">Resort Info</span>
				</a>
			</li> -->
			<li class="active">
				<a href="./user_res_table.php">
					<i class='bx bx-list-ul'></i>
					<span class="text">Resort List Table</span>
				</a>
			</li>
			<li>
				<a href="./user_bps.php">
					<i class='bx bxs-send'></i>
					<span class="text">Business Permit Submission</span>
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

			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn" >
					Profile
				</button>
				<div id="myDropdown" class="dropdown-content">
    				<a href="#about">User Account</a>
					<a href="#home">Change Email</a>
				</div>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<form>
		<div id="table-list" class="table-list">
			<?php 

					include './dbcon.php';

					$q = "SELECT archive FROM tbl_resort WHERE user_id = '$user_id'";

					$res = mysqli_query($conn, $q);

					if ($res && mysqli_num_rows($res) > 0){

$q = "SELECT * FROM tbl_resort WHERE user_id = '$user_id'";

					$res2 = mysqli_query($conn, $q);

					if ($res2 && mysqli_num_rows($res2) > 0){

						while($row = mysqli_fetch_assoc($res)){

								if ($row['archive'] == "show"){

								$_SESSION['res_id'] = $row['resort_id'];
							
								echo"
									<a href='./user_resortinfo.php?request=".$row['resort_id']."'>
										<div class='res_name'>".ucwords($row['resort_name'])."

										<a href='./crud_user/all_data_delete.php?del=".$row['resort_id']."' type='button' class='button'><img src='./assets/icons/trash-2.svg'></a>
										</div>
									</a>";
						 		break;
						 		
						 		}
						}
					}
				} ?>
		</div>

		</form>
	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
	<script type="text/javascript">
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
		function myFunction() {
  		document.getElementById("myDropdown").classList.toggle("show");
		}

// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
  		if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

	</script>
</body>
</html>