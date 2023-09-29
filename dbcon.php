<?php 

$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "new_tourism";

$conn = mysqli_connect($servername, $username, $pwd, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>