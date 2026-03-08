<?php 
    include('inc_header.php');
    include('inc_back_button.php'); 

    //Logic to retrieve the data from what the user selected through URL Parameters
    if ($_GET["category"] ==="useCategory") {
        $sqlQuery = "SELECT * FROM use_category"; 
        $pageTitle = "Use Category"; 
        $keyName = "use_category";
        $id = "use_category_id";
    } elseif ($_GET["category"] === "family") {
        $sqlQuery = "SELECT * FROM plant_family";
        $pageTitle = "Plant Family";
        $keyName = "family_name"; 
        $id = "plant_family_id";
    } elseif ($_GET["category"] === "location") {
        $sqlQuery = "SELECT * FROM location_area"; 
        $pageTitle = "Location Area";
        $keyName = "area_name";
        $id = "location_area_id";
    } elseif ($_GET["category"] === "allSpecies") {
        $sqlQuery = "SELECT * FROM plant_species"; 
        //LINK IT TO RESULTS.PHP
    } else {
        echo "<strong>Invalid search category, please go back to the home page by clicking on the top-left icon (3 stacked lines)</strong>"; 
    } 

//NOTE: This logic is on the top most so that the variables declared in the logic can be used with the HTML below
?>

<!DOCTYPE html>
<head>

    <title><?php echo $pageTitle ?></title>
    <link rel="stylesheet" href="css/tab_box.css">

</head>
<body>

    <!--Displays the title of the search category-->
    <?php echo "<h1>".$pageTitle."</h1>"; ?>

    <div class='tab-box-container'>    
        <?php
            //DB Connection and Query Setup
            include('database_conn.php'); 
            $result = mysqli_query($conn, $sqlQuery);

            //Displays the query result from DB
            //Attaches the corresponding ID from DB into "data-id"
            while($row = mysqli_fetch_assoc($result)) { 
                echo "<div class='tab-box' 
                       data-id=" . $row["$id"] . 
                       " data-user-search='" . $row["$keyName"] . 
                       "' data-category='" . $pageTitle . "'>" .  
                        $row["$keyName"]
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
                let userChoice = encodeURIComponent(this.dataset.userSearch); 

                //For querying in the next page
                let id = parseInt(this.dataset.id); 
                
                //Passes all the info into the URL parameters
                window.location.href = "result.php?category=" + category + "&id=" + id + "&search=" + encodeURIComponent(this.dataset.userSearch);
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