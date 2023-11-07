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

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title>Admin Login</title>
    </head>
<style type="text/css">

        *
        {
            font-family: 'Lato', sans-serif;
        }

        body
        {
            background-color: #38B6FF;
        }

        .container
        {
            display: flex;
            justify-content: center;
            align-items: center;
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
            width: 600px;
        }

        .label
        {
            background-color: #0097B2;
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
        }

        .footer
        {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer-text
        {

            text-indent: 50px;
            padding-bottom: 20px;


        }
        .footer-text > p > a
        {
            color: #0097B2;
            text-decoration: none;
        }

        .btn_save
        {
            margin-bottom: 10px;
            margin-left: 400px;
            padding: 10px 25px;
            width: 100px;
            margin-right: 50px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            background-color: #0097B2;
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
    margin-top: 210px;
    width: 100%;
    max-width: 280px;
    padding-top: 20px;
    padding-bottom: 20px;
    border-radius: 25px;
    text-align: center;
    }
    </style>
<body>
        <form method="POST" action="./user_register.php">
            
            <div class="container">
                <div class="registration-form">
                    <div class="label">
                        <p>Registration</p>
                    </div>
                    
                    <div class="input-section">
                        <?php 
                    if (!empty($error)) {
                     echo '<div class="error" >' . $error . '</div>';
                    }
                ?>
                        <div class="col-2">
                            <div>
                                <label>Firstname:</label>
                            </div>
                            <div>
                                <input type="text" name="fname" value="<?php echo $fname ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <label>Lastname:</label>
                            </div>
                            <div>
                                <input type="text" name="lname" value="<?php echo $lname ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <label>Email:</label>
                            </div>
                            <div>
                                <input type="email" name="email" value="<?php echo $email ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <label>Contact:</label>
                            </div>
                            <div>
                                <input type="text" name="contact" value="<?php echo $contact ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <label>Address:</label>
                            </div>
                            <div>
                                <input type="text" name="user_address" value="<?php echo $address ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <label>Password:</label>
                            </div>
                            <div>
                                <input type="password" name="user_pass" value="<?php echo $password ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <label>Confirm Password:</label>
                            </div>
                            <div>
                                <input type="password" name="confirm_pass" value="<?php echo $confirm_password ?>" required>
                            </div>
                        </div>
                        <div class="footer"> 
                            <input type="submit" name="submit" value="Submit" class="btn_save">
                        </div>
                        <div class="footer-text">
                                <p>Already have an account? 
                                <a href="./login.php">LOGIN</a>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        
        </form>

<script src="./js/sweetalert.min.js"></script>
</body>
</html>

<?php

if (isset($_POST['submit'])) {

    $error = "";
    $success = "";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['user_address'];
    $contact = $_POST['contact'];
    $password = $_POST['user_pass'];
    $confirm_password = $_POST['confirm_pass'];

    // Use a prepared statement to check if the email already exists in the database
   $query_user = "SELECT * FROM tbl_user WHERE email = ?";
    $query_admin = "SELECT * FROM tbl_admin WHERE email = ?";

    $stmt_user = mysqli_prepare($conn, $query_user);
    $stmt_admin = mysqli_prepare($conn, $query_admin);

    mysqli_stmt_bind_param($stmt_user, "s", $email);
    mysqli_stmt_bind_param($stmt_admin, "s", $email);

    mysqli_stmt_execute($stmt_user);
    mysqli_stmt_execute($stmt_admin);

    $result_user = mysqli_stmt_get_result($stmt_user);
    $result_admin = mysqli_stmt_get_result($stmt_admin);

    // Check if the email exists in either tbl_user or tbl_admin
    if (mysqli_num_rows($result_user) > 0 && mysqli_num_rows($result_admin) > 0) {
        ?>
        <script>
            swal({
                title: "Email is already in use!",
                icon: "error",
            });
        </script>
        <?php
    } else {
        // Check if the password matches
        if ($password === $confirm_password) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO tbl_user (fname, lname, email, contact, user_address, user_pass) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $contact, $address, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                ?>
                <script>
                    swal({
                        title: "REGISTRATION COMPLETE",
                        icon: "success",
                    });
                </script>
                <?php
            } else {
                $_SESSION['error'] = "Error: " . mysqli_error($conn);
                ?>
                <script>
                    swal({
                        title: "<?php echo $_SESSION['error']; ?>",
                        icon: "error",
                    });
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                swal({
                    title: "Password does not match",
                    icon: "error",
                });
            </script>
            <?php
        }
    }
}

?>