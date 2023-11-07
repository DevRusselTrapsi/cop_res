 <?php 
session_start();

$_SESSION['email'];

    require('./dbcon.php');

$uploadSuccess = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    $user_id = $_SESSION["user_id"];

    // Initialize variables for the resort table

    $resort_name = $_POST['resort_name'];
    $resort_address = $_POST['resort_address'];
    $owner_name = $_POST['owner_name'];
    $owner_address = $_POST['owner_address'];
    $resort_office = $_POST['resort_office'];
    $resort_contact = $_POST['resort_contact'];
    $owner_contact = $_POST['owner_contact'];
    $manager_contact = $_POST['manager_contact'];
    $verif = "not_verified";

    // resort image upload
    $resort_url = $_FILES['resort_url']['name'];
    $resort_url_tmp = $_FILES['resort_url']['tmp_name'];
    // permit image upload
    $permit_url = $_FILES['permit_url']['name'];
    $permit_url_tmp = $_FILES['permit_url']['tmp_name'];


    $estab_dir = "estab_img/";

    // Move the uploaded files to the folder of estab_img
    move_uploaded_file($resort_url_tmp, $estab_dir . $resort_url);

    $resort_path = $estab_dir . $resort_url;

    // Insert data into the tbl_resort table
    $query_resort = "INSERT INTO tbl_resort (user_id, resort_name, owner_name, owner_address, owner_contact, resort_office, resort_contact, manager_contact, resort_url, verification, resort_address) VALUES ('$user_id', '$resort_name', '$owner_name', '$owner_address', '$owner_contact', '$resort_office', '$resort_contact', '$manager_contact', '$resort_path','$verif', '$resort_address')";

    $result = mysqli_query($conn, $query_resort);

    // Check if the query_resort is true
    if ($result){
        
        // accommodation query
    $type_of_room = $_POST['type_of_room'];
    $no_accom_units = $_POST['no_accom_units'];
    $accom_capacity = $_POST['accom_capacity'];
    $accom_rates = $_POST['accom_rates'];
    $accom_url = $_FILES['acom_url']['name']; // Correct the file input name
    $accom_file_tmp = $_FILES['acom_url']['tmp_name'];

     $resort_id = $conn->insert_id; // Replace with the actual resort_id if applicable

     $_SESSION['resort_id'] = $conn->insert_id;


    foreach ($type_of_room as $key => $value) {
       
        // Retrieve values from arrays
        $type_of_room_value = $type_of_room[$key];
        $no_accom_units_value = $no_accom_units[$key];
        $accom_capacity_value = $accom_capacity[$key];
        $accom_rates_value = $accom_rates[$key];
        $accom_url_value = $accom_url[$key]; // Correct the array access
        $accom_file_tmp_value = $accom_file_tmp[$key]; // Correct the array access

        $upload_dir = "accom_img/";

        // Move the uploaded file to the specified folder
        if (move_uploaded_file($accom_file_tmp_value, $upload_dir . $accom_url_value)) {
            
            $file_path = $upload_dir . $accom_url_value;

            // Insert the file path into the database
            $stmt = $conn->prepare("INSERT INTO `tbl_accommodation` (resort_id, type_of_room, no_accom_units, accom_capacity, accom_rates, acom_url) VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("isiids", $resort_id, $type_of_room_value, $no_accom_units_value, $accom_capacity_value, $accom_rates_value, $file_path);

            $stmt->execute();

            if ($stmt->affected_rows > 0) { // Check the number of affected rows
                // Do nothing if the insertion is successful
            } else {
                $uploadSuccess = false; // Set the flag to false if there's an error
            }
        } else {
            $uploadSuccess = false; // Set the flag to false if there's an error during file upload
        }
    }
    // accommodation end of query

    // facility query
        $type_of_facility = $_POST['type_of_facility'];
        $no_faci_units = $_POST['no_faci_units'];
        $faci_capacity = $_POST['faci_capacity'];
        $faci_rates = $_POST['faci_rates'];
        $faci_url = $_FILES['faci_url']['name']; // Correct the file input name
        $faci_file_tmp = $_FILES['faci_url']['tmp_name'];

        foreach ($faci_url as $key => $value) {

        // Retrieve values from type_of_facility
        $type_of_facility_value = $type_of_facility[$key];
        $no_faci_units_value = $no_faci_units[$key];
        $faci_capacity_value = $faci_capacity[$key];
        $faci_rates_value = $faci_rates[$key];
        $faci_url_value = $faci_url[$key]; // Correct the array access
        $faci_file_tmp_value = $faci_file_tmp[$key]; // Correct the array access

        $upload_dir = "faci_img/";

        // Move the uploaded file to the specified folder
        if (move_uploaded_file($faci_file_tmp_value, $upload_dir . $faci_url_value)) {
            
            $file_path = $upload_dir . $faci_url_value;

            // Insert the file path into the database
            $stmt = $conn->prepare("INSERT INTO `tbl_facility` (resort_id, type_of_facility, no_faci_units, faci_capacity, faci_rates, faci_url) VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("isiids", $resort_id, $type_of_facility_value, $no_faci_units_value, $faci_capacity_value, $faci_rates_value, $file_path);

            $stmt->execute();

            if ($stmt->affected_rows > 0) { // Check the number of affected rows
                // Do nothing if the insertion is successful
            } else {
                $uploadSuccess = false; // Set the flag to false if there's an error
            }
        } else {
            $uploadSuccess = false; // Set the flag to false if there's an error during file upload
        }
    }
    // facility end query

     // service query
        $type_of_service = $_POST['type_of_service'];
        $description = $_POST['description'];
        $service_rates = $_POST['service_rates'];

        foreach ($type_of_service as $key => $value) {

        // Retrieve values from type_of_facility
        $type_of_service_value = $type_of_service[$key];
        $description_value = $description[$key];
        $service_rates_value = $service_rates[$key];   

            // Insert the file path into the database
            $stmt = $conn->prepare("INSERT INTO `tbl_service` (resort_id, type_of_service, description, service_rates) VALUES (?, ?, ?, ?)");

            $stmt->bind_param("issd", $resort_id, $type_of_service_value, $description_value, $service_rates_value);

            $stmt->execute();

            if ($stmt->affected_rows > 0) { // Check the number of affected rows
                // Do nothing if the insertion is successful
            } else {
                 echo "Error".mysqli_error($conn); // Set the flag to false if there's an error
            }
    }
    // service end query

    if ($uploadSuccess) {

        $_SESSION['status'] = "success"; 
        $_SESSION['success'] = "Survey Form Uploaded Successfuly";
        header("Location: ./user_addresort.php");
        

    } else {

        
        $_SESSION['status'] = "error";
        $_SESSION['error'] = "Some of the files are unable to upload";
        header("Location: ./user_addresort.php");
    }

        if ($stmt !== null) {
            $stmt->close();
        }
    }
}
        
?>