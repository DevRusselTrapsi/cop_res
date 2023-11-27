<?php
// Establish a database connection (you should replace these with your own credentials)

$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "new_tourism";

$conn = mysqli_connect($servername, $username, $pwd, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// Get the current page name (you may need to adjust this based on your website structure)
$page_name = $_SERVER['REQUEST_URI'];

// Check if the page name exists in the database
$sql = "SELECT * FROM page_views WHERE page_name = '$page_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If the page exists, update the view count
    $row = $result->fetch_assoc();
    $view_count = $row['view_count'] + 1;
    $sql = "UPDATE page_views SET view_count = $view_count WHERE page_name = '$page_name'";
    $conn->query($sql);
} else {
    // If the page doesn't exist, insert a new record
    $sql = "INSERT INTO page_views (page_name, view_count) VALUES ('$page_name', 1)";
    $conn->query($sql);
}

// Close the database connection
$conn->close();
?>
