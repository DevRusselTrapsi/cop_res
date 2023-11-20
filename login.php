<?php 
session_start();

// session_start();

include './dbcon.php';

$email="";
$password = "";

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="./assets/img/tourism-favicon.jpg">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title>Admin Login</title>
</head>
<style type="text/css">

body {

	background: url(./assets/img/login_bg.jpg);
	background-size: cover;
	background-attachment: fixed;
	background-repeat: no-repeat;
}

button {

	cursor: pointer;
	background-color: #0097B2;
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

	background-color: rgba(236, 236, 236, 0.45);
	border: 1px solid black;
	max-width: 400px;
	width: 100%;
	height: 400px;
	margin: auto;
	margin-top: 150px;
	display: grid;
	place-items: center;
	border-radius: 20px;
}
.label {

	background-color: #0097B2;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	margin-top: -45px;
	margin-bottom: 60px;
	max-width: 500px;
	width: 100%;
	height: 90px;
	text-align: center;
	font-size: 30px;
	font-family: Tahoma, Geneva, sans-serif;
	color: white;
}
.label > p {

	padding-top: 10px;

}

.container > p
{
	margin-top: 30px;
	color: black;
}

input[type=text],
input[type=password]
 {

	max-width: 210px;
	margin-top: 10px;
	width: 100%;
	height: 40px;
	border-radius: 10px;
	border: none;
	box-shadow: 1px 1px 10px;
	text-align: center;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-weight: bold;
	font-size: 15px;
	background-color: white;
}

select
{
	width: 250px;
	height: 40px;
	border-radius: 10px;
	border: none;
	margin-bottom: 10px;
	padding-left: 35px;
	box-shadow: 1px 1px 10px;
	text-align: center;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-weight: bold;
	font-size: 15px;
	background-color: white;
}

.username {

	background: url('./assets/icons/person.svg') no-repeat left;
	background-size: 40px;
	padding-left: 40px;

}
.password {

	background: url('./assets/icons/lock-closed.svg') no-repeat left;
	background-size: 35px;
	padding-left: 40px;


}

input[type=radio]
{
	width: 40px;
	height: 20px;
}

.radio
{
	display: flex;
	margin-bottom: 10px;
}

#radio:after {
  content: "";
  display: none;
}
/*Notif CSS*/
.error {

	background-color: rgba(255, 179, 179, 1);
	font-size: 15px;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	position: absolute;
	margin-top: -250px;
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
	<form method="POST" action="./login.php">
		
		<div class="container">
			<div class="label"><p>LOGIN FORM</p></div>
			<?php 
					if (!empty($error)) {
       				 echo '<div class="error" >' . $error . '</div>';
    				}
				?>
				<input type="text" class="username" name="email" value="<?php echo $email;?>" placeholder="email">
				
				<input type="password" class="password" name="password" value="<?php echo $password ;?>" placeholder="Password">
				
				<button class="submit" type="submit" name="submit">Login</button>

			<p>Forgot Password?<a href="./otpsend_admin.php" style="font-weight: bold; color: #0097B2; text-decoration: none;">&nbspEMAIL/PASSWORD </a><br><br>
			Don't have an account?<a href="./user_register.php" style="font-weight: bold; color: #0097B2; text-decoration: none; text-shadow: 2px 2px 4px white;">&nbsp REGISTER</a></p>
		</div>
	</form>

<!-- sweetalert js -->
<script src="./js/sweetalert.min.js"></script>

<?php
// $username ="";


if (isset($_POST['submit'])) {

    $error = "";
    $email = $_POST['email'];
    $password = $_POST['password'];

// check email of the admin
    $q_email = "SELECT * FROM tbl_admin  WHERE email = '$email'";
	$result = mysqli_query($conn, $q_email);

 	$q_email2 = "SELECT * FROM tbl_user  WHERE email = '$email'";
 	$result2 = mysqli_query($conn, $q_email2);

 	// checking the email from the admin
    if($result && mysqli_num_rows($result) > 0){

    	$row_admin = mysqli_fetch_assoc($result);

    	$status = $row_admin['status'];
		
    	if($status === 'admin'){

			$hashed_password = $row_admin['admin_pass'];

			if (password_verify($password, $hashed_password)) {
				
				$_SESSION['email'] = $row_admin['email'];

				header("Location: admin_dash.php");

			}else{

				?>
					<!-- Sweet alert Code = if the password does not match sweetalert warning will show-->
			<script>
				swal({
  					title: "Password does not match, Please Try again",
  					// text: "You clicked the button!",
  					icon: "error",
					});
			</script>
<?php
				// echo "Password does not match, Please Try again";
			}
    	}

   	// checking the email from the user
    }elseif ($result2 && mysqli_num_rows($result2) > 0) {
    	
    	$row_user = mysqli_fetch_assoc($result2);

    	// insert the user_id and the email to the session after login
		$_SESSION['user_id'] = $row_user['user_id'];
		$_SESSION['email'] = $row_user['email'];
		$_SESSION['fname'] = $row_user['fname'];

			$hashed_password_user = $row_user['user_pass'];

			if (password_verify($password, $hashed_password_user)) {
				
				header("Location: user_addresort.php");

			}else{
				?>

				<!-- Sweet alert Code = if the password does not match sweetalert warning will show-->
			<script>
				swal({
  					title: "Password does not match, Please Try again",
  					// text: "You clicked the button!",
  					icon: "error",
					});
			</script>
				<!-- echo "Password does not match, Please Try again"; -->
				<?php
			}
    }else{

    	?>
    	<!-- Sweet alert Code = if the password does not match sweetalert warning will show-->
			<script>
				swal({
  					title: "Invalid Email, Please Try again",
  					// text: "You clicked the button!",
  					icon: "error",
					});
			</script>

<!--     	echo "Invalid Email, Please Try again"; -->
    	<?php
    }
}
?>

</body>
</html>

