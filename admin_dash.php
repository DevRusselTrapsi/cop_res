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

    <title>Admin</title>
    <!-- Add Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/tourism-favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                <a href="./admin_user_table.php">
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
            <!-- Box Info -->
            <ul class="box-info">
                <!-- Replace the values with your data -->
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
                        <p>Resorts</p>
                    </span>
                </li>
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
                <li>
                    <i class='bx bx-user-pin'></i>
                    <span class="text">
                        <?php
                        require('dbcon.php');

                        $query = "SELECT DISTINCT owner_name FROM tbl_resort ORDER BY owner_name";
                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_num_rows($query_run);	

                        echo '<h3> '.$row. '</h3>'

                        ?>
                        <p>Resort Owner</p>
                    </span>
                </li>
                <li>
                    <i class='bx bx-show'></i>
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
            </ul>
            <!-- End Box Info -->

            <!-- Table Data -->
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Business Permit Submission</h3>

                      <?php
                include('./dbcon.php');

                // in this query COUNT() is a function the counts all the value from the verification note: use count when you want to see how many value are there in one column of you database
                $query = "SELECT 
                            COUNT(CASE WHEN verification = 'verified' THEN 1 END) AS verified_count,
                            COUNT(CASE WHEN verification = 'not_verified' THEN 1 END) AS unverified_count,
                            COUNT(CASE WHEN verification = 'pending' THEN 1 END) AS pending_count,
                            COUNT(CASE WHEN verification = 'no_permit' THEN 1 END) AS no_permit_count
                        FROM tbl_resort";

                        $result = $conn->query($query);

                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }

                        if (mysqli_num_rows($result) > 0) {
                            // Fetch result as an associative array
                            $row = $result->fetch_assoc();

                            // Access counts for each status
                            $verifiedCount = $row['verified_count'];
                            $unverifiedCount = $row['unverified_count'];
                            $pendingCount = $row['pending_count'];
                            $noPermitCount = $row['no_permit_count'];
                        ?>
                        <!-- HTML Output -->
                        <p style="margin-right: 30px; color: rgba(32, 232, 42, 1); text-align: center;">verified: 
                            <span style='font-weight: bold;'><?php echo $verifiedCount; ?></span>
                        </p>
                        <p style="margin-right: 50px; color: red; text-align: center;">unverified: 
                            <span style='font-weight: bold;'><?php echo $unverifiedCount; ?></span>
                        </p>
                        <p style="margin-right: 50px; color: orange; text-align: center;">pending: 
                            <span style='font-weight: bold;'><?php echo $pendingCount; ?></span>
                        </p>
                        <p style="margin-right: 50px; color:rgba(210, 211, 49, 1); text-align: center;">no permit: 
                            <span style='font-weight: bold;'><?php echo $noPermitCount; ?></span>
                        </p>
                        <?php 
                        } else {
                            echo "No results found";
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                            <div>
                                <span>Status</span>
                                <select onchange="selectdata(this.options[this.selectedIndex].value)">
                                    <option value="all">All status</option>
                                    <option value="verified">Verified</option>
                                    <option value="not_verified">Unverified</option>
                                    <option value="pending">Pending</option>
                                    <option value="no_permit">No Permit</option>
                                </select>
                            </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Resort Name</th>
                                <th>Location</th>
                                <th>Owner</th>
                                <th>Submission Status</th>
                                <th></th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                            <!-- Add your table rows with resort data here -->

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
    <script type="text/javascript">
        
        $(document).ready(function(){
            showdata();
        });

        function showdata()
        {

            $.ajax({
                url: 'show-data.php',
                method: 'post',
                success: function(result)
                {
                    $("#result").html(result);
                }
            });
        }

// function to the filter where
        function selectdata(cat)
        {
            $.ajax({
                // - the code from select-data will be executed
                url: 'select-data.php',
                // the type of method from the select is given as post
                method: 'post',
                // initializing a variable cat_name for the variable function cat that contains the value of the select tag from the html
                data: 'cat_name='+cat,
                // this will display the result after querying the $("#result") is from the id of the table
                success: function(result)
                {
                    $("#result").html(result);
                }
            });
        }

    </script>
</body>
</html>
