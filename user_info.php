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
	<link rel="stylesheet" href="./css/user_info.css">

	<title>User Information</title>
</head>
<body>


	<form>
		<div class="form-content">
			<div>
				<a href="./user_table.php">BACK</a>
			</div>

	<div class="container">
	</div>
</form>
	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

</body>
</html>