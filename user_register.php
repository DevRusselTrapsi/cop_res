<?php
session_start();



include './dbcon.php';
// $_SERVER['REQUEST_METHOD'] == 'POST'
//POST is connected to the input using the request method

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
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $password = $_POST['admin_pass'];
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
            $stmt = mysqli_prepare($con, $query);
            // note: when using hashed_password make sure that stmt_bind_param of the hashed is "s" not "i"
            mysqli_stmt_bind_param($stmt, "sssiss" ,$fname, $lname, $email, $contact,$address, $hashed_password);

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
			<!-- 	<php 
					if (!empty($error)) {
       				 echo '<div class="error" id="error">' . $error . '</div>';
    				}
				?>
				<php 
					if (!empty($success)) {
       				 echo '<div class="success" id="success">' . $success . '</div>';
    				}
				?>
 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="./css/user_register.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<form class="row g-2 mt-3 m-5" method="POST" action="./user_register.php">
		
		<div class="container row g-2 mt-3">

			<div class="register">
				<h3>REGISTER</h3>
			</div>

			<div>
				<h4>User Information</h4>
			</div>

				<div class="col-md-5">
    				<label for="inputEmail4" class="form-label">FirstName:</label>
    				<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" required>
  				</div>
  				<div class="col-md-5">
    				<label for="inputEmail4" class="form-label">Address:</label>
    				<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" required>
  				</div>
  				<div class="col-md-5">
    				<label for="inputEmail4" class="form-label">LastName:</label>
    				<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" required>
  				</div>
  				<div class="col-md-5">
    				<label for="inputEmail4" class="form-label">Password:</label>
    				<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" required>
  				</div>
  				<div class="col-md-5">
    				<label for="inputEmail4" class="form-label">Contact:</label>
    				<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" required>
  				</div>
  				<div class="col-md-5">
    				<label for="inputEmail4" class="form-label">Re-type password:</label>
    				<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" required>
  				</div>
  				<div class="col-md-5">
    				<label for="inputEmail4" class="form-label">Email:</label>
    				<input type="email" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" required>
  				</div>

				<!-- Contacts and Resort info -->
				<div>
					<h3>Resort and Owner Information</h3>
				</div>

		<div class="section-2 row g-2 mt-3">

					<div class="col-md-5">
    					<label for="inputEmail4" class="form-label">Name of the Establishment:</label>
    					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" name="resort_name" required>
  					</div>
  					<div class="col-md-5">
    					<label for="inputEmail4" class="form-label">Address:</label>
    					<input type="text" class="form-control" id="inputEmail4" placeholder="Establishment's Address" value="<?php echo $fname;?>" name="resort_address" required>
  					</div>
  					<div class="col-md-5">
    					<label for="inputEmail4" class="form-label">Owner:</label>
    					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" name="owner_name" required>
  					</div>
  					 <div class="col-md-5">
    					<label for="inputEmail4" class="form-label">Address:</label>
    					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" name="owner_address" placeholder="(Owner's Address)" required>
  					</div>
									
							<h4>Contacts:</h4>
  					 <div class="col-md-5">
    					<label for="inputEmail4" class="form-label">Office Contact</label>
    					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" name="resort_office" placeholder="09********" required>
  					</div>
  					 <div class="col-md-5">
    					<label for="inputEmail4" class="form-label">Home Contact:</label>
    					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" name="resort_contact" placeholder="09********" required>
  					</div>
					<div class="col-md-5">
    					<label for="inputEmail4" class="form-label">Owner Contact:</label>
    					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" name="owner_contact" placeholder="09********" required>
  					</div>
  					 <div class="col-md-5">
    					<label for="inputEmail4" class="form-label">Manager Contact:</label>
    					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fname;?>" name="manager_contact" placeholder="09********" required>
  					</div>
  					<div class="input-group mb-4">
  						<input type="file" class="form-control" name ="resort_url" id="inputGroupFile02">
  						<label class="input-group-text" for="inputGroupFile02">image establishment:</label>
					</div>


					<div class="d-grid gap-2 col-6 mx-auto">
							<input class="btn btn-primary mb-3" type="submit" name="submit" value="Submit">
					</div>

					<div>
						<p>Already have an account? 
							<a href="./user_login.php">LOGIN</a>
						</p>
					</div>
		</div>
	</form>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>