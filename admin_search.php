<?php
session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./login.php");
	exit();
}

$_SESSION['name'];

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
	<link rel="icon" type="image/x-icon" href="./assets/img/tourism-favicon.png">
	<title>Admin</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
        <a href="./admin_dash.php" class="brand">
            <i><img src="./assets/img/tourism.jpg" class="logo"></i>
            <p>WELCOME!</p>
            <span><?php echo ucfirst($_SESSION['name']);?></span>
        </a>
		<ul class="side-menu top">
            <li>
                <a href="./admin_dash.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <!-- <li>
                <a href="./admin_addresort.php">
                    <i class='bx bxs-plus-circle'></i>
                    <span class="text">Add Resort</span>
                </a>
            </li> -->
            <li class="active">
                <a href="./admin_search.php">
                    <i class='bx bxs-search-alt-2' ></i>
                    <span class="text">Search</span>
                </a>
            </li>
            <li>
                <a href="./admin_create_owner.php">
                    <i class='bx bxs-user-plus' ></i>
                    <span class="text">Add Owner Account</span>
                </a>
            </li>
            <li>
				<a href="./admin_user_table.php">
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
<!-- 			<form action="" class="filter_form">
				<label>filter:</label>
				<select id="filter_barangay">
					<option value="Location">Barangay</option>
					<option value="">Danacbunga</option>
					<option value="">Panan</option>
					<option value="">Porac</option>
					<option value="">Tampo</option>
				</select>
				<label>filter:</label>
				<select id="filter_accom">
					<option value="Location">Type of Room</option>
					<option value="">bedroom</option>
					<option value="">queen bed</option>
					<option value="">king bed</option>
					<option value="">double deck</option>
				</select> 
			</form>-->
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div>
				<div class="search_container">
					<div>	
					<input type="search" name="search" id="eventSearch" class="search" placeholder="Search">
					</div>
						<button type="submit" class="search_btn" name="submit">
							<img src="./assets/icons/search.svg">
						</button>
				</div>
				</div>

			<div class="search_content" id="resort_result">

					<?php 

						include('dbcon.php');

						$q = "SELECT * FROM tbl_resort";

						$res = mysqli_query($conn, $q);

						if($res && mysqli_num_rows($res) > 0) {

							while($row = mysqli_fetch_assoc($res)){

						echo "
					<div class='resort_rect'>
					<a href='./admin_resortinfo.php?get=".$row['resort_id']."'>
						<div class='img_container'>
							<img src='".$row['resort_url']."'>
							<div class='overlay'>
								<div class='txt'>Resort: ".$row['resort_name']."<br>Barangay: ".ucwords($row['resort_address'])."<br>Owner: ".ucwords($row['owner_name'])."</div>
							</div>
						</div>
						</a>
					</div>";

						}
					}
					?>
				</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

<script src="script.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  	$('#eventSearch').on("keyup", function(){
    		var eventSearch = $(this).val();
    	$.ajax({
    		method:'POST',
    		url:'liveSearch.php',
    		data: {input:eventSearch},
    		success:function(response)
    		{
    			$("#resort_result").html(response);
    		}
    	});
    });
});
</script>
</body>
</html>