 <?php
session_start();

if(!isset($_SESSION['email'])){

header("Location: ./u_a_login.php");
	exit();
}

$fname = $_SESSION["fname"];
$user_id = $_SESSION["user_id"];
$resort_id = $_SESSION["resort_id"];


include('dbcon.php');

if (isset($_POST['submit'])) {
    $verif = "unverified";
    
    // Get the uploaded file details
    $file_name = $_FILES['permit_url']['name'];
    $file_tmp = $_FILES['permit_url']['tmp_name'];
    
    // Specify the folder where you want to store the uploaded images
    $upload_dir = "permit_img/";

    // Move the uploaded file to the specified folder
    if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
        $file_path = $upload_dir . $file_name;
        
        // Insert the file path into the database
        $sql = "UPDATE SET permit_url =  verification (resort_id, verified, business_url) VALUES ('$verif', '$file_path')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Submission complete";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "File upload failed.";
    }
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
	<link rel="stylesheet" href="./css/user_bps.css">

	<title>User Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="./user_addresort.php" class="brand">
			<i><img src="./assets/img/tourism.jpg" class="logo"></i>
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
			<li>
				<a href="./user_res_table.php">
					<i class='bx bx-list-ul'></i>
					<span class="text">Resort List Table</span>
				</a>
			</li>
			<li  class="active">
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
		<form method="POST" action="user_bps.php" enctype="multipart/form-data">

			<div class="container">
				<div class="top2">
					<div>
						<h1>Business Permit Submission</h1>
					</div>
					
				</div>
				
				
				<div class="list-table">
					<?php
						include('dbcon.php');

						$q = "SELECT resort_id, resort_name, verification, resort_url FROM tbl_resort WHERE user_id = '$user_id'";

						$res = mysqli_query($conn, $q);
						
						if (mysqli_num_rows($res) > 0){

							while ($row = mysqli_fetch_assoc($res)) {
								
								$resort_url = $row['resort_url'];
								$verif = $row['verification'];

								echo"<div class='list'>
						<div class='text'>
							<div>

								<h1 style='font-size: 2.5rem;'><a href='bp_submit.php?get=".$row['resort_id']."'>".$row['resort_name']."</a></h1>
							</div>
					<div>
						";?>
						<?php 
					// this id must be change to id of the user for checking the image from the user

   				 if ($verif == 'verified'){

   				 	
   				 	echo '<div class="status" style="background-color: rgba(67, 255, 32, 1);">Verified</div>';

   				 }else{

   				     echo '<div class="status" style="background-color: red;">Not Verified</div>';
   				 }
	   			
   				 ?>
					</div>
					</div>
					<?php
							}
						
						}
					?>
				</div>
				
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