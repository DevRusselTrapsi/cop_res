<?php
session_start();

include('./dbcon.php');


$input = $_POST['input'];
$input = mysqli_real_escape_string($conn, $input);

$sql = "SELECT DISTINCT tbl_resort.* 
        FROM tbl_resort 
        LEFT JOIN tbl_accommodation ON tbl_resort.resort_id = tbl_accommodation.resort_id
        LEFT JOIN tbl_facility ON tbl_resort.resort_id = tbl_facility.resort_id
        LEFT JOIN tbl_service ON tbl_resort.resort_id = tbl_service.resort_id 
        WHERE tbl_resort.resort_id 
        AND (
            tbl_resort.resort_name LIKE '%$input%' 
            OR tbl_resort.owner_name LIKE '%$input%' 
            OR tbl_resort.resort_office LIKE '%$input%' 
            OR tbl_resort.manager_contact LIKE '%$input%'
            OR tbl_resort.owner_address LIKE '%$input%'
            OR tbl_resort.resort_address LIKE '%$input%'
            OR tbl_accommodation.type_of_room LIKE '%$input%'
            OR tbl_accommodation.no_accom_units LIKE '%$input%'
            OR tbl_accommodation.accom_capacity LIKE '%$input%'
            OR tbl_accommodation.accom_rates LIKE '%$input%'
            -- Add columns from tbl_accommodation
            OR tbl_facility.type_of_facility LIKE '%$input%'
            OR tbl_facility.faci_capacity LIKE '%$input%'
            OR tbl_facility.no_faci_units LIKE '%$input%'
            OR tbl_facility.faci_rates LIKE '%$input%' 
            -- Add columns from tbl_facility
            OR tbl_service.type_of_service LIKE '%$input%'
            OR tbl_service.description LIKE '%$input%'
            OR tbl_service.service_rates LIKE '%$input%'
            -- Add columns from tbl_service
        )";








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