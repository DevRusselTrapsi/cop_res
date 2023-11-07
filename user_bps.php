 <?php
session_start();

if(!isset($_SESSION['email'])){

header("Location: ./u_a_login.php");
	exit();
}

$fname = $_SESSION["fname"];
$user_id = $_SESSION["user_id"];



include('dbcon.php');

if (isset($_POST['submit'])) {
    $verif = "unverified";
    
    // Get the uploaded file details
    $file_name = $_FILES['business_url']['name'];
    $file_tmp = $_FILES['business_url']['tmp_name'];
    
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
			<span><?php echo $fname;?></span>
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
					<div>
						<div class="status" style="background-color: red;">Not Verified</div>
						<?php 
					include('dbcon.php');

					// this id must be change to id of the user for checking the image from the user
					$verify_id = 4;

						$q = "SELECT verified FROM verification WHERE verify_id = $verify_id";
						$verif = mysqli_query($conn, $q);

					if ($verif && mysqli_num_rows($verif) > 0) {
    				// Fetch the first row from the result set as an associative array.
   				 $status = mysqli_fetch_assoc($verif);
   				 $stats = $status['verified'];

   				 if ($stats == 'verified'){

   				 	
   				 		echo '<div class="status" style="background-color: rgba(67, 255, 32, 1);">Verified</div>';

   				 }else{

   				 		echo '<div class="status" style="background-color: red;">Not Verified</div>';
   				 	       
   				 }
	   			}
   				
   				 ?>

						
					</div>
				</div>
				<div>
					<input type="file" name="business_url" >
				</div>
				
				
				<div>
					<div>
						<button name="submit" class="button">Submit</button>
					</div>
				</div>
			</div>
		</form>
		<div class="img_content">
					<?php
include('dbcon.php');

$verify_id = 11; // Replace with the actual verif_id you want to use.

$q = "SELECT business_url FROM verification WHERE verify_id = $verify_id";
$res = mysqli_query($conn, $q);

if ($res && mysqli_num_rows($res) > 0) {
    // Fetch the first row from the result set as an associative array.
    $img = mysqli_fetch_assoc($res);

    // Check if the image URL is not empty before displaying it.
    if (!empty($img['business_url'])) {
        ?>
        <img src="<?php echo $img['business_url']; ?>" alt="Business Image">
        <?php
    } else {
        echo "Image URL is empty.";
    }
} else {
    echo "No records found for verify_id $verify_id.";
}
?>
				</div>
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