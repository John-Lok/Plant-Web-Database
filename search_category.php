<?php 
    include('inc_header.php');
    include('inc_configurations.php'); 
    include('inc_back_button.php'); 

   $category = $_GET["category"]; 
   $details = $config[$category];

    //Logic to retrieve the data from what the user selected through URL Parameters
    if ($category === "useCategory") {

        $sqlQuery = "SELECT * FROM " . $details["tableName"]; 

    } elseif ($category === "family") {

        $sqlQuery = "SELECT * FROM " . $details["tableName"]; 

    } elseif ($category === "location") {

        $sqlQuery = "SELECT * FROM " . $details["tableName"]; 

    } elseif ($category === "allSpecies") {

        $sqlQuery = "SELECT * FROM '$category'"; 
        //LINK IT TO RESULTS.PHP

    } else {
        echo "<strong>Invalid search category, please go back to the home page by clicking on the top-left icon (3 stacked lines)</strong>"; 
    } 

//NOTE: This logic is on the top most so that the variables declared in the logic can be used with the HTML below
?>

<!DOCTYPE html>
<head>

    <title><?php echo $details["pageTitle"] ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tab_box.css">    

</head>
<body>

    <!--Displays the title of the search category-->
    <?php echo "<h1>".$details["pageTitle"]."</h1>"; ?>

    <div class='tab-box-container'>    
        <?php
            //DB Connection and Query Setup
            include('database_conn.php'); 
            $result = mysqli_query($conn, $sqlQuery);

            

            //Displays the query result from DB
            //Attaches the corresponding ID, pageTitle and keyName from DB into the "data-" attribute
            while($row = mysqli_fetch_assoc($result)) { 
                echo "<div class='tab-box' 
                       data-id=" . $row[$details["pkKey"]] . 
                       " data-user-search='" . $row[$details["attriKey"]] . 
                       "' data-category='" . $details["pageTitle"] . "'>" .  
                        $row[$details["attriKey"]]
                    . "</div>"; 
            }
        ?>
    </div>

    <!--Takes the value of "data-id" and puts it into a URL Parameter for the next page (result.php)-->
    <script>
        const tabBox = document.querySelectorAll(".tab-box"); 
        
        
        tabBox.forEach( box => {

            box.onclick = function() {

                //For the breadcrumbs navigation
                let category = encodeURIComponent(this.dataset.category); 
                let userSearch = encodeURIComponent(this.dataset.userSearch); 

                //For querying in the next page
                let id = parseInt(this.dataset.id); 
                
                //Passes all the info into the URL parameters
                window.location.href = "result.php?category=" + category + "&id=" + id + "&search=" + userSearch;
            }
        }) 
    </script>

    <!--CSS styling of parent tab-box container-->
    <!--For this page file only-->
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

<?php include('inc_footer.php')?>