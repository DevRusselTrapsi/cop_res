<?php
session_start();

include('./dbcon.php');


$input = $_POST['input'];
$input = mysqli_real_escape_string($conn, $input);

$sql = "SELECT 
            resort_id, 
            resort_name, 
            owner_name, 
            owner_address, 
            owner_contact, 
            resort_office, 
            resort_contact, 
            manager_contact, 
            resort_address, 
            resort_url, 
            '' as type_of_room, 
            '' as no_accom_units, 
            '' as accom_capacity, 
            '' as accom_rates, 
            '' as type_of_facility, 
            '' as no_faci_units, 
            '' as faci_capacity, 
            '' as faci_rates
        FROM 
            tbl_resort 
        WHERE 
            resort_name LIKE '%$input%' 
            OR owner_name LIKE '%$input%' 
            OR owner_address LIKE '%$input%'
            OR owner_contact LIKE '%$input%'
            OR resort_office LIKE '%$input%' 
            OR resort_contact LIKE '%$input%'
            OR manager_contact LIKE '%$input%' 
            OR resort_address LIKE '%$input%' 

        UNION 

        SELECT 
            '' as resort_id, 
            '' as resort_name, 
            '' as owner_name, 
            '' as owner_address, 
            '' as owner_contact, 
            '' as resort_office, 
            '' as resort_contact, 
            '' as manager_contact, 
            '' as resort_address, 
            '' as resort_url, 
            type_of_room, 
            no_accom_units, 
            accom_capacity, 
            accom_rates, 
            '' as type_of_facility, 
            '' as no_faci_units, 
            '' as faci_capacity, 
            '' as faci_rates
        FROM 
            tbl_accommodation 
        WHERE 
            type_of_room LIKE '%$input%' 
            OR no_accom_units LIKE '%$input%'
            OR accom_capacity LIKE '%$input%'
            OR accom_rates LIKE '%$input%'

        UNION 

        SELECT 
            '' as resort_id, 
            '' as resort_name, 
            '' as owner_name, 
            '' as owner_address, 
            '' as owner_contact, 
            '' as resort_office, 
            '' as resort_contact, 
            '' as manager_contact, 
            '' as resort_address, 
            '' as resort_url, 
            '' as type_of_room, 
            '' as no_accom_units, 
            '' as accom_capacity, 
            '' as accom_rates, 
            type_of_facility, 
            no_faci_units, 
            faci_capacity, 
            faci_rates
        FROM 
            tbl_facility 
        WHERE 
            type_of_facility LIKE '%$input%' 
            OR faci_capacity LIKE '%$input%'
            OR no_faci_units LIKE '%$input%'
            OR faci_rates LIKE '%$input%'";





$res = mysqli_query($conn, $sql);


if($res && mysqli_num_rows($res) > 0){

	while ($row = mysqli_fetch_assoc($res)){


	echo "<div class='resort_rect'>
			<a href='./admin_resortinfo.php?get=".$row['resort_id']."'>
				<div class='img_container'>
					<img src='".$row['resort_url']."'>
					<div class='overlay'>
						<div class='txt'>Resort:".$row['resort_name']."<br>Barangay: ".ucwords($row['resort_address'])."<br>Owner: ".ucwords($row['owner_name'])."
						</div>
						
					</div>
					</div>
						</a>
					</div>
					";
	}

}else{

	echo "Error".mysqli_error($conn);
}
?>