<?php
session_start();

if(!isset($_SESSION['email'])){

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
	<link rel="stylesheet" href="./css/user_table.css">

	<title>Owner Table</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="./user_addresort.php" class="brand">
			<i><img src="./assets/img/tourism.jpg" class="logo"></i>
			<p>WELCOME!</p>
			<span>Admin</span>
		</a>

		<ul class="side-menu top">
      <li>
        <a href="./admin_dash.php">
          <i class='bx bxs-shopping-bag-alt' ></i>
            <span class="text">Dashboard</span>
                </a>
      </li>
      <li>
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
			<li class="active">
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
		<form>
		<div class="table-list">
			<?php 
					include './dbcon.php';

					$q = "SELECT * FROM tbl_user";

					$res = mysqli_query($conn, $q);

					if ($res && mysqli_num_rows($res) > 0){

						while($row = mysqli_fetch_assoc($res)){

							echo"
									<div class='res_name'>
										<div>
											<a href='./resort_info.php?request=".$row['user_id']."'>".ucwords($row['fname'])." ".ucwords($row['lname'])."</a>
										</div>
									</div>
									";
						 }
						} 
						?>
		</div>

		</form>
	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>