<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Generate OTP
$otp = mt_rand(100000, 999999);


if (isset($_POST['submit'])){


// Get the email address from the form submission
$email = $_POST['email'];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com;';
$mail->SMTPAuth = true;
$mail->Username = 'markrusseltrapsi@pcb.edu.ph';
$mail->Password = 'TrapsiPCB2023';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Email content
$mail->From = 'markrusseltrapsi@pcb.edu.ph';
$mail->FromName = 'PCB Alumni System';
$mail->addAddress($email);
$mail->Subject = 'OTP Verification';
$mail->Body = 'Your OTP is: ' . $otp;

// Send the email
if (!$mail->send()) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
} else {
    // Store the generated OTP in the session
    session_start();
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;

    // Redirect to the OTP verification page
    // header('Location: verify.php');
    exit;
}
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Pre-Registration Verification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Pre-Registration Verification</h1>
        <form method="POST" action="otp.php">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Send OTP</button>
        </form>
    </div>
</body>
</html>