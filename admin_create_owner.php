<?php
session_start();

if (!isset($_SESSION['email'])) {

    header("Location: ./login.php");
    exit();
}
$_SESSION['name'];

include './dbcon.php';

    $email = "";
    $fname = "";
    $lname = "";
    $address = "";
    $contact = "";
    $password = "";
    $confirm_password = "";

if (isset($_POST['submit'])) {

    $error = "";
    $success = "";
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['user_address'];
    $contact = $_POST['contact'];
    $password = $_POST['user_pass'];
    $confirm_password = $_POST['confirm_pass'];

    // Use a prepared statement to check if the email already exists in the database
    $query = "SELECT * FROM `tbl_user` WHERE `email` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Check if the email already exists
    if ($row) {
        $error = "Email is already Exist";
    } else {
        // check if both passwords are correct
        if ($password != $confirm_password) {

            $error = "Password does not match";
        
        } else {
        
            // hashed_password variable turns the password into a hash for security
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO `tbl_user` (`fname`, `lname`, `email`, `contact`, `user_address`, `user_pass`) VALUES (?, ?, ?, ?, ?, ?)";

            // Use a prepared statement to insert data into the database
            $stmt = mysqli_prepare($conn, $query);
            // note: when using hashed_password make sure that stmt_bind_param of the hashed is "s" not "i"
            mysqli_stmt_bind_param($stmt, "sssiss" ,$fname, $lname, $email, $contact,$address, $hashed_password);

             if (mysqli_stmt_execute($stmt)){

                echo "<script>alert('REGISTRATION COMPLETE')</script>";

            } else {
                echo "<script>alert('REGISTRATION ERROR. TRY AGAIN')</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
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
	<title>Admin Create User</title>
</head>
	<style type="text/css">
		.container
		{
			/*border: 1px solid black;*/
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
		}
		.registration-form
		{
			background-color: whitesmoke;
			border-radius: 20px;
			box-shadow: 1px 1px 4px black;
			display: block;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			max-width: 900px;
			width: 100%;
		}
	
		.label
		{
			background-color:#2980B9 ;
			border-top-left-radius: 20px;
			border-top-right-radius: 20px;
			padding: 20px;
			text-align: center;
			margin-bottom: 50px;
		}
		.label > p
		{
			font-size: 2rem;
		}
		.col-2
		{
			/*border: 1px solid green;*/
			display: flex;
			justify-content: space-around;
			font-size: 1.2rem;
			font-weight: bold;
			width: 100%;
			flex-wrap: wrap;
		}

		.col-2 > div:first-child
		{
			width: 150px;
			margin-bottom: 30px;

		}

		input[type=email],
		input[type=text],
		input[type=password]
		{
			width: 250px;
			height: 35px;
			border-radius: 10px;
			border: .5px solid black;
			text-indent: 15px;
			font-size: 16px;
		}

		.footer
		{
			width: 100%;
			display: flex;
			justify-content: flex-end;
		}

		.footer-text
		{

			text-indent: 50px;
			padding-bottom: 20px;

		}

		.btn_save
		{
			margin-top: 20px;
			margin-bottom: 44px;
			padding: 5px 20px;
			margin-right: 50px;
			border-radius: 10px;
			border: .5px solid black;
			cursor: pointer;
			background-color: rgba(0, 236, 31, 0.8);
		}
		.btn_save:hover
		{
			transform: scale(1.4);	
			transition: ease-in-out, .3s;

		}

		.error {
    background-color: rgba(255, 179, 179, 1);
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-weight: bold;
    position: absolute;
    margin-top: -210px;
    width: 100%;
    max-width: 280px;
    padding-top: 20px;
    padding-bottom: 20px;
    border-radius: 25px;
    text-align: center;
    }

		@media screen and (min-width: 370px) and (max-width: 900px){
    
    .error {
    background-color: rgba(255, 179, 179, 1);
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-weight: bold;
    position: absolute;
    margin-top: -210px;
    width: 100%;
    max-width: 280px;
    padding-top: 20px;
    padding-bottom: 20px;
    border-radius: 25px;
    text-align: center;
    }

	</style>
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
            <li>
                <a href="./admin_search.php">
                    <i class='bx bxs-search-alt-2' ></i>
                    <span class="text">Search</span>
                </a>
            </li>
            <li class="active">
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
	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<form method="POST" action="./owner_register.php">
			
			<div class="container">
				<div class="registration-form">
					<div class="label">
						<p>Create User Account</p>
					</div>
					<?php 
                    if (!empty($error)) {
                     echo '<div class="error" >' . $error . '</div>';
                    }
                ?>
					<div class="input-section">
						<div class="col-2">
							<div>
								<label>Firstname:</label>
							</div>
							<div>
								<input type="text" name="fname" required>
							</div>
						</div>
						<div class="col-2">
							<div>
								<label>Lastname:</label>
							</div>
							<div>
								<input type="text" name="lname" required>
							</div>
						</div>
						<div class="col-2">
							<div>
								<label>Email:</label>
							</div>
							<div>
								<input type="email" name="email" required>
							</div>
						</div>
						<div class="col-2">
							<div>
								<label>Contact:</label>
							</div>
							<div>
								<input type="text" name="contact" required>
							</div>
						</div>
						<div class="col-2">
							<div>
								<label>Address:</label>
							</div>
							<div>
								<input type="text" name="user_address" required>
							</div>
						</div>
						<div class="col-2">
							<div>
								<label>Password:</label>
							</div>
							<div>
								<input type="password" name="user_pass" required>
							</div>
						</div>
						<div class="col-2">
							<div>
								<label>Confirm Password:</label>
							</div>
							<div>
								<input type="password" name="confirm_pass" required>
							</div>
						</div>
						<div class="footer"> 
							<input type="submit" name="submit" value="Submit" class="btn_save">
						</div>
					</div>
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