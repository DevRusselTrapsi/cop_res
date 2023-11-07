<?php

session_start();

if (!isset($_SESSION['email'])) {

	header("Location: ./u_a_login.php");
	exit();
}

include './dbcon.php';
// $_SERVER['REQUEST_METHOD'] == 'POST'
//POST is connected to the input using the request method
$email="";
$password = "";
$confirm_password = "";

if (isset($_POST['submit'])) {

    $error = "";
    $success = "";
    $email = $_POST['email'];
    $password = $_POST['admin_pass'];
    $confirm_password = $_POST['confirm_pass'];

    // Use a prepared statement to check if the email already exists in the database
    $query = "SELECT * FROM `tbl_admin` WHERE `email` = ?";
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
            $query = "INSERT INTO `tbl_admin`(`email`, `admin_pass`) VALUES (?, ?)";

            // Use a prepared statement to insert data into the database
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);
            if (mysqli_stmt_execute($stmt)) {
                $success = "REGISTRATION COMPLETE";
            } else {
                $error = "REGISTRATION ERROR. TRY AGAIN";
            }
        }
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="

	">
</head>
<style type="text/css">

body {

	background-color: #7ED957;
}

button {

	cursor: pointer;
	background-color: #00BF63;
	padding: 10px 85px;
	border-radius: 20px;
	margin-bottom: -20px;
	margin-top: 25px;
	border: none;
	font-size: 20px;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	color: white;

}
.container {

	background-color: white;
	max-width: 400px;
	width: 100%;
	height: 400px;
	margin: auto;
	margin-top: 100px;
	display: grid;
	place-items: center;
	border-radius: 20px;
}

.label {

	background-color: #00BF63;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	margin-top: -45px;
	margin-bottom: 60px;
	max-width: 500px;
	width: 100%;
	height: 100px;
	text-align: center;
	font-size: 30px;
	font-family: Tahoma, Geneva, sans-serif;
	color: white;
}

.label > p {

	padding-top: 10px;

}
.contairner > p,a {

	text-align: center;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	text-decoration: none;
	color: #00BF63;
	font-size: 14px;
}

input[type=email],
input[type=password] {

	max-width: 210px;
	width: 100%;
	height: 40px;
	border-radius: 10px;
	text-align: center;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-weight: bold;
	font-size: 15px;
}

.email {

	background: url('./assets/icons/closemail-admin.svg') no-repeat left;
	background-size: 35px;
	padding-left: 37px;

}
.password {

	background: url('./assets/icons/closedlock-admin.svg') no-repeat left;
	background-size: 35px;
	padding-left: 37px;


}
/*notification CSS*/

	.error {

	background-color: rgba(255, 179, 179, 1);
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	position: absolute;
	margin-top: -205px;
	width: 100%;
	max-width: 250px;
	padding-top: 10px;
	padding-bottom: 10px;
	border-radius: 20px;
	text-align: center;

}

.success {

	background-color: rgba(145, 254, 101, 0.54);
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-weight: bold;
	position: absolute;
	margin-top: -210px;
	width: 100%;
	max-width: 250px;
	padding-top: 10px;
	padding-bottom: 10px;
	border-radius: 20px;
	text-align: center;
	}

	/*responsiveness*/
@media screen and (min-width: 370px) and (max-width: 900px){
	
	.error {
	background-color: rgba(255, 179, 179, 1);
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-weight: bold;
	position: absolute;
	margin-top: -210px;
	width: 100%;
	max-width: 250px;
	padding-top: 10px;
	padding-bottom: 10px;
	border-radius: 20px;
	text-align: center;
	}

	.success {

	background-color: rgba(145, 254, 101, 0.54);
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-weight: bold;
	position: absolute;
	margin-top: -210px;
	width: 100%;
	max-width: 250px;
	padding-top: 10px;
	padding-bottom: 10px;
	border-radius: 20px;
	text-align: center;
	}



</style>
<body>

	<form method="POST" action="./admin_register.php">
		
		<div class="container">
			<div class="label"><p>REGISTER</p></div>

				<?php 
					if (!empty($error)) {
       				 echo '<div class="error" >' . $error . '</div>';
    				}
				?>
				<?php 
					if (!empty($success)) {
       				 echo '<div class="success">' . $success . '</div>';
    				}
				?>

				<input type="email" class="email" name="email" placeholder="Email" value="<?php echo $email;?>"required>
				
				<input type="password" class="password" name="admin_pass"  placeholder="Password" value="<?php echo $password;?>"required>

				<input type="password" class="password" name="confirm_pass"  placeholder="Re-type Password" value="<?php echo $confirm_password;?>" required>
				
				<button class="submit" type="submit" name="submit">Register</button>

			<p>Already have an account? 
				<a href="./admin_login.php">LOGIN</a>
			</p>
		
		</div>
	</form>
</body>
</html>