<?php 
session_start();

	require('./dbcon.php');

$user_id = $_SESSION["user_id"];


// initialize service variables
$type_service = "";
$description = "";
$service_rates = "";

// initialize facility variables
$faci_type = "";
$faci_capacity = "";
$faci_units = "";
$faci_rates = "";
$faci_tmp_name = "";

// initialize accommodation variables
$room_type = "";
$num_accom = "";
$accom_capacity = "";
$accom_rates = "";
$accom_tmp_name = "";

// initialize resort
$resort_name = "";
$resort_address = "";
$owner_name = "";
$owner_address = "";
$resort_office = "";
$resort_contact = "";
$owner_contact = "";
$manager_contact = "";
$resort_url = "";


if (isset($_POST['submit'])) {

	mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    // initialize of tbl service
    $type_service = $_POST['type_of_service'];
    $description = $_POST['description'];
    $service_rates = $_POST['service_rates'];

    // Create the directory if it doesn't exist
    $destination_estabfolder = "estab_img/";
    $destination_accomfolder = "accom_img/";
  	$destination_facifolder = "faci_img/";

    // $destination_estabfolder = "estab_img/";
    if (!is_dir($destination_estabfolder)) {
        mkdir($destination_estabfolder, 0755, true);
    }

    if (!is_dir($destination_accomfolder)) {
        mkdir($destination_accomfolder, 0755, true);
    }
    if (!is_dir($destination_facifolder)) {
        mkdir($destination_facifolder, 0755, true);
    }

	//query for the tbl service
    $query = "INSERT INTO tbl_service (type_of_service, description, service_rates) VALUES ('$type_service','$description','$service_rates')";

 	if (mysqli_query($conn,$query)) {

		// Retrieve the auto-generated primary key value
 		$service_id = $conn->insert_id;
 		$resort_id = $conn->insert_id;


 		// Initialize for the faci table
    	$faci_type = $_POST['type_of_facility'];
    	$faci_capacity = $_POST['faci_capacity'];
    	$faci_units = $_POST['no_faci_units'];
    	$faci_rates = $_POST['faci_rates'];
    	$faci_tmp_name = $_FILES['faci_url']['tmp_name'];;

 	//query for the tbl facility
    $query2 = "INSERT INTO tbl_facility (resort_id, type_of_facility, faci_capacity, no_faci_units, faci_rates, faci_url) VALUES ('$resort_id','$faci_type','$faci_capacity','$faci_units','$faci_rates','$faci_tmp_name')";


    	if (mysqli_query($conn, $query2)){

 			// moving the upload files to the folder of faci_img
    	move_uploaded_file($_FILES['faci_url']['tmp_name'], "faci_img/".$_FILES['faci_url']['name']);


    	// Retrieve the auto-generated primary key value
    	$faci_id = $conn->insert_id;
    	$resort_id = $conn->insert_id;

    	//Initialize for the accom table 
		$type_of_room = $_POST['type_of_room'];
    $no_accom_units = $_POST['no_accom_units'];
    $accom_capacity = $_POST['accom_capacity'];
    $accom_rates = $_POST['accom_rates'];
    $accom_urls = $_FILES['accom_url']['tmp_name']; // Handle file uploads


	//query for the tbl_accom
 	$query3 = "INSERT INTO tbl_accommodation (resort_id, type_of_room, no_accom_units, accom_capacity, accom_rates, acom_url) VALUES ('$resort_id','$room_type', '$num_accom', '$accom_capacity', '$accom_rates', '$destination_accomfolder".$_FILES['accom_url']['name']."')";


 			// check if the query3 is true
 			if(mysqli_query($conn, $query3)) {

 				// moving the upload files to the folder of accom_img
    			move_uploaded_file($_FILES['accom_url']['tmp_name'], $destination_accomfolder . $_FILES['accom_url']['name']);


    			// Retrieve the auto-generated primary key value
    			$accom_id = $conn->insert_id;
    			$resort_id = $conn->insert_id;
    			$user_id = $conn->insert_id;

    			// initialize for the resort table
				$resort_name = $_POST['resort_name'];
				$resort_address = $_POST['resort_address'];
				$owner_name = $_POST['owner_name'];
				$owner_address = $_POST['owner_address'];
				$resort_office = $_POST['resort_office'];
				$resort_contact = $_POST['resort_contact'];
				$owner_contact = $_POST['owner_contact'];
				$manager_contact = $_POST['manager_contact'];
				$resort_url = $_FILES['resort_url']['tmp_name'];


				// query to the table resort
				$query4 = "INSERT INTO tbl_resort (user_id, resort_name, owner_name, owner_address, owner_contact, resort_office, resort_contact, manager_contact, resort_url, resort_address, accom_id, faci_id, service_id) VALUES ('$user_id', '$resort_name', '$owner_name', '$owner_address', '$owner_contact', '$resort_office', '$resort_contact', '$manager_contact', '$resort_url', '$resort_address', '$accom_id', '$faci_id', '$service_id')";

				if (mysqli_query($conn, $query4)){

    				// moving the upload files to the folder of estab_img
    				move_uploaded_file($_FILES['resort_url']['tmp_name'], "estab_img/".$_FILES['resort_url']['name']);

    				 

    				echo"<script>alert('Registration Complete')</script>";

    				
    				// query4
				}else{
					echo"<script>alert('Error: ')</script>".mysqli_error($conn);
				}

				// query3
 			}else{

 				echo"<script>alert('Error: ')</script>".mysqli_error($conn);
 			}

    	// query 2
    	}else{  

    		echo"<script>alert('Error: ')</script>".mysqli_error($conn);
    	}
    	// query
	}else{

		echo"<script>alert('Error: ')</script>".mysqli_error($conn);
	}

} else {

	echo "Error: ".mysqli_error($conn);
	}
mysqli_close($conn);
?>




<!-- 
	EXAMPLE FROM CHATGPT


	LOOPING USING ARRAY



	<php
session_start();

require('./dbcon.php');

$user_id = $_SESSION["user_id"];

if (isset($_POST['submit'])) {
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    // Initialize service arrays
    $type_service = $_POST['type_of_service'];
    $description = $_POST['description'];
    $service_rates = $_POST['service_rates'];

    // Initialize facility arrays
    $faci_type = $_POST['type_of_facility'];
    $faci_capacity = $_POST['faci_capacity'];
    $faci_units = $_POST['no_faci_units'];
    $faci_rates = $_POST['faci_rates'];
    $faci_tmp_names = $_FILES['faci_url']['tmp_name'];

    // Loop through the arrays to insert multiple records
    foreach ($type_service as $index => $service_type) {
        $description_value = $description[$index];
        $service_rate_value = $service_rates[$index];

        // Insert into tbl_service
        $query = "INSERT INTO tbl_service (type_of_service, description, service_rates) 
                  VALUES ('$service_type', '$description_value', '$service_rate_value')";

        if (mysqli_query($conn, $query)) {
            $service_id = $conn->insert_id;

            // Get corresponding values from the facility arrays
            $faci_type_value = $faci_type[$index];
            $faci_capacity_value = $faci_capacity[$index];
            $faci_units_value = $faci_units[$index];
            $faci_rate_value = $faci_rates[$index];
            $faci_tmp_name = $faci_tmp_names[$index];

            // Insert into tbl_facility
            $query2 = "INSERT INTO tbl_facility (resort_id, type_of_facility, faci_capacity, no_faci_units, faci_rates, faci_url) 
                       VALUES ('$service_id', '$faci_type_value', '$faci_capacity_value', '$faci_units_value', '$faci_rate_value', '$faci_tmp_name')";

            if (mysqli_query($conn, $query2)) {
                // Move the upload files to the folder of faci_img
                move_uploaded_file($faci_tmp_name, "faci_img/" . basename($faci_tmp_name));
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
        }
    }

    // Rest of your code for other tables (tbl_accommodation, tbl_resort) follows the same pattern as above.

} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>








 -->