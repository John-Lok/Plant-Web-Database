
<?php include('inc_header.php'); ?>


<!DOCTYPE html>
<html>
    <title>
        Village
    </title>
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/village.css">

    <body>
        <div class="container">
            <div class="main">

                <div class="village-tabs-container">
                    <?php
                        include('database_conn.php');

                        //the SQL query to retreive the full table's data
                        $sql = "SELECT * FROM location_area"; 

                        $result = mysqli_query($conn, $sql);

                        //This function is to check how many number of rows there are, so the variable stores the num. of however many num. of rows there are
                        $resultCheck = mysqli_num_rows($result);

                            //Loop: While there's X numb. of rows, display the data (as a text) utilizing the "mysqli_fetch_assoc()" function
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<div 
                                        class=villageName 
                                        
                                      >'.'<a href="#">'
                                        .$row["area_name"].
                                     '</a>'.'</div>'.'<br>';
                            }
                        mysqli_close($conn); 

                        //style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('.$row["village_image"].'); 
                        //                       background-size: cover;"

                    ?>
                </div>

            </div>
        <?php include('inc_footer.php'); ?>
        </div>
    </body>
</html>