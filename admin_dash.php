<?php 
	session_start();
    
    if (!isset($_SESSION['email'])) {

    header("Location: ./login.php");
    exit();
}

$name =$_SESSION['name'];
    // Implement session later after you manage to fix the login system
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Add Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/tourism-favicon.png">
    <title>Admin</title>
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="./admin_dash.php" class="brand">
            <i><img src="./assets/img/tourism.jpg" class="logo"></i>
            <p>WELCOME!</p>
            <span><?php echo ucwords($name);?></span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="./admin_dash.php">
                    <i class='bx bxs-shopping-bag-alt' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <!-- <li>
                <a href="./admin_addresort.php">
                    <i class='bx bxs-plus-circle'></i>
                    <span class="text">Add Resort</span>
                </a>
            </li> -->
            <li>
                <a href="./admin_search.php">
                    <i class='bx bxs-search-alt-2' ></i>
                    <span class="text">Search</span>
                </a>
            </li>
            <li>
                <a href="./owner_register.php">
                    <i class='bx bxs-user-plus' ></i>
                    <span class="text">Add Owner Account</span>
                </a>
            </li>
            <li>
                <a href="./user_table.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="text">Owner List</span>
                </a>
            </li>
            <li>
                <a href="./logout.php">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <!-- Box Info -->
            <ul class="box-info">
                <!-- Replace the values with your data -->
                <a href="#1#" style="text-decoration: none; color: none;">
                <li>
                    <i class='bx bxs-building-house'></i>
                    <span class="text">
                        <?php
                        require('dbcon.php');

                        $query = "SELECT resort_id FROM tbl_resort ORDER BY resort_id";
                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_num_rows($query_run);	

                        echo '<h3> '.$row. '</h3>'

                        ?>
                        <p>Establishment</p>
                    </span>
                </li>
                 </a>
                <a href="#2#">
                <li> 
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <?php
                        require('dbcon.php');

                        $query = "SELECT user_id FROM tbl_user ORDER BY user_id";
                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_num_rows($query_run);	

                        echo '<h3> '.$row. '</h3>'

                        ?>
                        <p>User</p>

                    </span>
                </li>
                </a>
                <a href="#3#">
                <li>
                    <i class='bx bxs-user-pin'></i>
                    <span class="text">
                        <?php
                        require('dbcon.php');

                        $query = "SELECT DISTINCT owner_name FROM tbl_resort ORDER BY owner_name";
                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_num_rows($query_run);	

                        echo '<h3> '.$row. '</h3>'

                        ?>
                        <p>Owner</p>
                    </span>
                </li>
                 </a>
                 <a href="#4#">
                <li>
                    <i class='bx bxs-show'></i>
                    <span class="text">
                        <?php
                        require('dbcon.php');

                        $query = "SELECT SUM(view_count) AS counts FROM page_views";
                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_fetch_assoc($query_run);
                        $view_count = $row['counts'];     

                        ?>

                       <h3>
                        <?php
                        if ($view_count == null){
                            echo "0";
                        }else{
                            echo $view_count;    
                        }
                         

                        ?>        
                        </h3>
                        <p>Views</p>
                    </span>
                </li>
                 </a>
            </ul>
            <!-- End Box Info -->

            <!-- Table Data -->
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Resort</h3>
                        
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Barangay</th>
                                <th>Owner</th>
                                <th>Status</th>
                                <th></th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add your table rows with resort data here -->
                            <?php

                            include("dbcon.php");

                            $q = "SELECT * FROM tbl_resort";

                            $res = mysqli_query($conn, $q);

                            if ($res && mysqli_num_rows($res) > 0) {

                            
                                while($row = mysqli_fetch_assoc($res)){


                                     echo "
                            <tr>
                                <td>
                                    <img src='".$row['resort_url']."'>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                    <p>".$row['resort_name']."</p></a>
                                </td>";

                                    // check if there is an image submission
                                    if($row['permit_url'] == 'no_permit'){

                                        //Pending

                                        echo"
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."' style='font-size: 12px;'>
                                        ".ucwords($row['resort_address'])."
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                        ".ucwords($row['owner_name'])."
                                   </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                        <span class='status pending'>Pending</span>
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                    
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                    
                                    </a>
                                </td>
                            </tr>";

                            }else{
                                // if there is a permit submission proceed on checking the verification

                                    $currentDate = $row['event_date'];

                                    $formattedDate = date('m-d-Y', strtotime($currentDate));
                           

                                if($row['verification'] === 'verified'){
                            echo"
                                 <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."' style='font-size: 12px;'>
                                        ".ucwords($row['resort_address'])."
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                        ".ucwords($row['owner_name'])."
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                        <span class='status verified'>Verified</span>
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."' style='font-size: 10px;'>
                                        verified by ".ucwords($row['verifiedby'])." on ".$formattedDate."
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                        ".ucwords($row['comment'])."
                                    </a>
                                </td>
                            </tr>";
                                        // Not Verified
                                    }elseif($row['verification'] === 'not_verified'){

                            echo"
                                 <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."' style='font-size: 12px;'>
                                        ".ucwords($row['resort_address'])."
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                   ".ucwords($row['owner_name'])."
                                   </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                        <span class='status unverified'>Unverified</span>
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."' style='font-size: 10px;'>
                                        Unverified by ".ucwords($row['verifiedby'])." on ".$formattedDate."
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."' style='font-size: 10px; word-wrap: break-word; font-weight: bold;'>
                                        ".ucfirst($row['comment'])."
                                    </a>
                                </td>
                            </tr>";
                            }else{
                            // end of checking if there is image submitted
                            
                            // pending if there is an image but hasn't verified yet

                            echo"
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."' style='font-size: 12px;'>
                                        ".ucwords($row['resort_address'])."
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                        ".ucwords($row['owner_name'])."
                                   </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                        <span class='status pending'>Pending</span>
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                    
                                    </a>
                                </td>
                                <td>
                                    <a href='./admin_verif.php?get=".$row['resort_id']."'>
                                    
                                    </a>
                                </td>
                            </tr>";
                                    }
                                }
                            }
                        }
                            ?>

                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Data -->
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- Include your custom JavaScript file -->
    <script src="script.js"></script>
</body>
</html>
