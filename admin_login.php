<?php 
session_start();

include 'dbcon.php';

// $username ="";
$email="";
$password = "";
if (isset($_POST['submit'])) {
    $error = "";
    // $username ="";
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM tbl_admin WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        
            $error = "Invalid Email. Please Try Again";

    }else{
        	
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['admin_pass'];

        // Use password_verify() to compare the entered password with the hashed password
        if (password_verify($password, $hashed_password)) {
        	// Password is correct, redirect to the index page or perform the necessary actions

        	header("Location: admin_dash.php");
        	exit;
        } else {
        	// Login FAILED
        	$error = "Incorrect Password. Please Try Again";
        }
// Close the statement
mysqli_stmt_close($stmt);
mysqli_close($conn);
	}
}
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
	border-radius: 16px;
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
	border: none;
	box-shadow: 1px 1px 10px  grey;
	text-align: center;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-weight: bold;
	font-size: 15px;
}

.email {

	background: url('./assets/icons/closemail-admin.svg') no-repeat left;
	background-size: 40px;
	padding-left: 40px;

}
.password {

	background: url('./assets/icons/openlock-admin.svg') no-repeat left;
	background-size: 35px;
	padding-left: 40px;


}
/*Notif CSS*/
.error {

	background-color: rgba(255, 179, 179, 1);
	font-size: 15px;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	position: absolute;
	margin-top: -210px;
	width: 100%;
	max-width: 270px;
	padding-top: 15px;
	padding-bottom: 15px;
	border-radius: 20px;
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
	<a href="user_login.php"><img src="./assets/icons/user.svg"></a>

	<form method="POST" action="./admin_login.php">
		
		<div class="container">
			<div class="label"><p>LOGIN FORM</p></div>

			<?php 
					if (!empty($error)) {
       				 echo '<div class="error" >' . $error . '</div>';
    				}
				?>

				<input type="email" class="email" name="email" value="<?php echo $email ;?>" placeholder="Email">
				
				<input type="password" class="password" name="password" value="<?php echo $password ;?>" placeholder="Password">
				
				<button class="submit" type="submit" name="submit">Login</button>

			<p><a href="./otpsend_admin.php">Forgot Password?</a><br><br>
				Don't have an account?<a href="./admin_register.php"> REGISTER</a>
			</p>
		
		</div>
	</form>
</body>
</html>