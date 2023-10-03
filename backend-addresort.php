<?php 
session_start();

	require('./dbcon.php');
if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];

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

 		echo "Error: " . mysqli_error($conn);
		// Retrieve the auto-generated primary key value
 		$service_id = $conn->insert_id;

 		// Initialize for the faci table
    	$faci_type = $_POST['type_of_facility'];
    	$faci_capacity = $_POST['faci_capacity'];
    	$faci_units = $_POST['no_faci_units'];
    	$faci_rates = $_POST['faci_rates'];
    	$faci_url = $_FILES['faci_url'];

 	//query for the tbl facility
    $query2 = "INSERT INTO tbl_facility (type_of_facility, faci_capacity, no_faci_units, faci_rates, faci_url) VALUES ('$faci_type','$faci_capacity','$faci_units','$faci_rates','$faci_url')";


    	if (mysqli_query($conn, $query2)){

 			// moving the upload files to the folder of faci_img
    	move_uploaded_file($_FILES['faci_url']['tmp_name'], "faci_img/".$_FILES['faci_url']['name']);

    	// Retrieve the auto-generated primary key value
    	$faci_id = $conn->insert_id;

    	//Initialize for the accom table 
		$room_type = $_POST['type_of_room'];
		$num_accom = $_POST['no_accom_units'];
		$accom_capacity = $_POST['accom_capacity'];
		$accom_rates = $_POST['accom_rates'];
		$accom_tmp_name = $_FILES['accom_url']['tmp_name'];

	//query for the tbl_accom
 	$query3 = "INSERT INTO tbl_accommodation (type_of_room, no_accom_units, accom_capacity, accom_rates, acom_url) VALUES ('$room_type', '$num_accom', '$accom_capacity', '$accom_rates', '$destination_accomfolder".$_FILES['accom_url']['name']."')";


 			// check if the query3 is true
 			if(mysqli_query($conn, $query3)) {

 				// moving the upload files to the folder of accom_img
    			move_uploaded_file($_FILES['accom_url']['tmp_name'], $destination_accomfolder . $_FILES['accom_url']['name']);


    			// Retrieve the auto-generated primary key value
    			$accom_id = $conn->insert_id;

    			$user_id = $_SESSION['user_id'];    			
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

    				

				}else{
					echo"<script>alert('Error: ')</script>".mysqli_error($conn);
				}

 			}else{

 				echo"<script>alert('Error: ')</script>".mysqli_error($conn);
 			}

    	}else{

    		echo"<script>alert('Error: ')</script>".mysqli_error($conn);
    	}
	}else{

		echo"<script>alert('Error: ')</script>".mysqli_error($conn);
	}
}
mysqli_close($conn);
} else {

	echo "<script>alert('User not logged in')</script>";
}


?>