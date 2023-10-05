<?php
include('dbcon.php');
// Assuming you have a database connection established

 $destination_accomfolder = "accom_img/";
    
    if (!is_dir($destination_accomfolder)) {
        mkdir($destination_accomfolder, 0755, true);
    }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type_of_room = $_POST['type_of_room'];
    $no_accom_units = $_POST['no_accom_units'];
    $accom_capacity = $_POST['accom_capacity'];
    $accom_rates = $_POST['accom_rates'];
    $accom_urls = $_FILES['accom_url']['tmp_name']; // Handle file uploads



    // Loop through the arrays and insert data into the database
    foreach ($type_of_room as $key => $value) {
        $sql = "INSERT INTO tbl_accommodation (type_of_room, no_accom_units, accom_capacity, accom_rates, accom_url) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Bind values to the prepared statement
        $stmt->bindParam(1, $type_of_room[$key]);
        $stmt->bindParam(2, $no_accom_units[$key]);
        $stmt->bindParam(3, $accom_capacity[$key]);
        $stmt->bindParam(4, $accom_rates[$key]);
        $stmt->bindParam(5, $accom_urls[$key]);
        
        // moving the upload files to the folder of accom_img
                move_uploaded_file($_FILES['accom_url']['tmp_name'], $destination_accomfolder . $_FILES['accom_url']['name']);
        // Execute the statement
        $stmt->execute();
    }

    echo "Success";
}
?>
