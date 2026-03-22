<?php 
    include('inc_header.php');
    include('inc_configurations.php'); 
    include('inc_back_button.php'); 

    //Grabs the URL Params value and assign it to $category
    $category = $_GET["category"]; 

    /*
    If-else stmt is to check what value is in the URL Param 

    Assigns the values of:  
        1) Table Name
        2) PK Attribute Name
        3) Normal Attribute Name 
    IN ACCORDance to the value of URL Param

    NOTE: This logic is on the top most so that the variables declared in the logic can be used for everything below
    */
    if ($category === "Use Category") {
        $tableName = "use_category";
        $pkKey = "use_category_id"; 
        $attriKey = "category_name";
    } elseif ($category === "Family") {
        $tableName = "plant_family";
        $pkKey = "plant_family_id"; 
        $attriKey = "family_name";
    } elseif ($category === "Location") {
        $tableName = "location_area";
        $pkKey = "location_area_id"; 
        $attriKey = "area_name";
    } else {
        echo "<h1>Invalid URL Parameter!</h1>"; 
        echo "<h1>Please go back to the 'Home' page by clicking the 3 lines icon on the top-left corner</h1>";
    }

    //SQL query
    $sqlQuery = "SELECT * FROM " . $tableName; 
?>

<!DOCTYPE html>
<head>

    <title><?php echo $category; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tab_box.css">    

</head>
<body>

    <!--Displays the title of the search category-->
    <h1> <?php echo $category; ?> </h1>

    <div class='tab-box-container'>    
        <?php
            //DB Connection and Query Setup
            include('database_conn.php'); 
            $result = mysqli_query($conn, $sqlQuery);

            //Loops through every record in the DB till no more record left
            //Sets the table as an associative array: Puts the attribute names as the KEY & for one record, the VALUE of it
            while($row = mysqli_fetch_assoc($result)) { 
        ?>

            <!--For every one record in the DB: 
                1) Outputs the "$attriKey" value into the tab box
                2) Puts data into URL Params: 
                    a) The same "category" value from what the user previously clicked on
                    b) The "$attriKey" value (the text in the tab box) of the specific tab box clicked on
                    c) The "$pkKey" value (that text's ID) of the specific tab box clicked on
            -->

            <div class="tab-box" 
                onclick="window.location.href='result.php?category=<?php echo urlencode($category); ?>&subCategory=<?php echo urlencode($row[$attriKey]); ?>&subCategoryId=<?php echo $row[$pkKey] ?>'"> 
                
                <?php echo $row[$attriKey]; ?>

            </div>

        <!--Closing bracket for the while loop-->
        <?php 
            }; 
        ?>
    </div>

    <!--CSS styling of parent tab-box container-->
    <!--This CSS is only for this page file-->
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .tab-box-container {
            display: flex; 
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px; 
            margin: 120px; 
        }
    </style>

</body>

<?php include('inc_footer.php'); ?>