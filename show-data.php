<?php
session_start();

$name = $_SESSION['name'];

include('dbcon.php');

$fetch_query = mysqli_query($conn, "SELECT * FROM tbl_resort ORDER BY resort_name ASC");

$row = mysqli_num_rows($fetch_query);

if($row > 0){

	while ($res = mysqli_fetch_array($fetch_query)) {

		?>
            <tr>
                <td>
                    <img src="<?php echo $res['resort_url'];?>">
                    <?php echo "
                    <a href='./admin_verif.php?get=".$res['resort_id']."'>
                    <p>".$res['resort_name']."</p></a>
                </td>
                    ";

        if($res['permit_url'] == 'no_permit'){

                     echo"
                <td>
                    <a href='./admin_verif.php?get=".$res['resort_id']."' style='font-size: 12px;'>".ucwords($res['resort_address'])."</a>
                </td>

                <td>
                    <a href='./admin_verif.php?get=".$res['resort_id']."'>".ucwords($res['owner_name'])."</a>
                </td>
                <td>
                    <a href='./admin_verif.php?get=".$res['resort_id']."'><span class='status no_permit'>No Permit</span>
                    </a>
                </td>
                <td>
                    <a href='./admin_verif.php?get=".$res['resort_id']."'></a>
                </td>
                <td>
                    <a href='./admin_verif.php?get=".$res['resort_id']."'></a>
                </td>
            </tr>";                  
        }else{

            // if there is a permit submission proceed on checking the verification

            $currentDate = $res['event_date'];

            $formattedDate = date('m-d-Y', strtotime($currentDate));
                           
            if($res['verification'] === 'verified'){

            echo"
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."' style='font-size: 12px;'>".ucwords($res['resort_address'])."</a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'>".ucwords($res['owner_name'])."</a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'><span class='status verified'>Verified</span>
                </a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."' style='font-size: 10px;'>verified by ".ucwords($res['verifiedby'])." on ".$formattedDate."</a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'>".ucwords($res['comment'])."</a>
            </td>
        </tr>";

            }elseif($res['verification'] === 'not_verified'){

            echo"
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."' style='font-size: 12px;'>".ucwords($res['resort_address'])."</a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'>".ucwords($res['owner_name'])."</a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'><span class='status unverified'>Unverified</span>
                </a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."' style='font-size: 10px;'>Unverified by ".ucwords($res['verifiedby'])." on ".$formattedDate."</a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."' style='font-size: 10px; word-wrap: break-word; font-weight: bold;'>".ucfirst($res['comment'])."
                </a>
            </td>
        </tr>";

            }else{
        // end of checking if there is image submitted
                            
        // pending if there is an image but hasn't verified yet

            echo"
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."' style='font-size: 12px;'>".ucwords($res['resort_address'])."</a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'>".ucwords($res['owner_name'])."</a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'><span class='status pending'>Pending</span></a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'></a>
            </td>
            <td>
                <a href='./admin_verif.php?get=".$res['resort_id']."'></a>
            </td>
        </tr>";
                }
            }

        }
    }
 ?>