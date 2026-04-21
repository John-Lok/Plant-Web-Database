<?php 
    require('inc_header.php'); 
    include('inc_back_button.php');
    require('database_conn.php');

    /*
    Uses of each URL param value: 
        1) $category
            - Use as the "identifier" to determine which SQL query to execute
            - To display the page's title according to what the user had clicked on
        2) $subCategory
            - The many categories within a "Search Category" (e.g. Family -> Zingiberaceae [Zingiberaceae is the $subCategory])
            - For querying the correct results
            - To be apart of displaying the breadcrumbs navigation
        3) $subCategoryId
            - For querying the correct results

    Contains 2 nested if-else logic: 
        1st if-else use: 
            - Check if $catergory is "All Species" or not
            - Assigns an SQL query that doesn't recieve data from 2) and 3) URL params
            - Displays a page title
        2nd if-else use: 
            - Check what value is in $catergory
            - Assigns a given SQL query that uses data from 3) param to query the right results 
            - Displays a breadcrumbs navigation

    Reason for 1st if-else: 
    "All Species" is a special case as it doesn't go through "search_category.php" unlike the others
    */
    $category = $_GET["category"]; 
    if ($category === "All Species") {
        //Breadcrumbs Nav
        echo "<h1>{$category}</h1>"; 

        $sqlQuery = "SELECT 
                        photo, 
                        scientific_name, 
                        SUBSTRING_INDEX(
                            GROUP_CONCAT(DISTINCT plant_english_name.english_name SEPARATOR ', '), 
                            ', ', 
                            3) AS english_name, 
                        plant_species.plant_species_id

                    FROM plant_species 

                    INNER JOIN plant_english_name
                        ON plant_species.plant_species_id = plant_english_name.plant_species_id

                    LEFT JOIN plant_photo
                        ON plant_species.plant_species_id = plant_photo.plant_species_id
                        AND plant_photo.is_thumbnail_photo = 1
                        
                    GROUP BY plant_species.plant_species_id";

        $result = mysqli_query($conn, $sqlQuery); 
        
    } else {
        //Grabbing of the 2 ohter URL params are here to avoid a "WARNING" message if user clicked "All Species"
        $subCategory = $_GET["subCategory"]; 
        $subCategoryId = $_GET["subCategoryId"]; 

        //Breadcrumbs Nav
        echo "<h1>{$category} > {$subCategory}</h1>"; 

        if ($category === "Use Category") {
            $sqlQuery = "SELECT  
                            photo, 
                            scientific_name, 
                            SUBSTRING_INDEX(
                                GROUP_CONCAT(DISTINCT plant_english_name.english_name SEPARATOR ', '), 
                                ', ', 
                                3
                            ) AS english_name, 
                            use_category.category_name, 
                            plant_species.plant_species_id

                        FROM plant_species 

                        INNER JOIN specific_use 
                            ON plant_species.plant_species_id = specific_use.plant_species_id

                        INNER JOIN use_category 
                            ON use_category.use_category_id = specific_use.use_category_id

                        INNER JOIN plant_english_name 
                            ON plant_species.plant_species_id = plant_english_name.plant_species_id 

                        LEFT JOIN plant_photo
                            ON plant_species.plant_species_id = plant_photo.plant_species_id
                            AND plant_photo.is_thumbnail_photo = 1

                        WHERE specific_use.use_category_id = ?

                        GROUP BY plant_species.plant_species_id";
                        
        } elseif ($category === "Location") {
            $sqlQuery = "SELECT 
                            photo, 
                            scientific_name, 
                            SUBSTRING_INDEX(
                                GROUP_CONCAT(DISTINCT plant_english_name.english_name SEPARATOR ', '), 
                                ', ', 
                                3) AS english_name, 
                            plant_species.plant_species_id

                        FROM plant_species

                        INNER JOIN plant_record 
                            ON plant_species.plant_species_id = plant_record.plant_species_id

                        INNER JOIN plant_english_name 
                            ON plant_species.plant_species_id = plant_english_name.plant_species_id

                        LEFT JOIN plant_photo
                            ON plant_species.plant_species_id = plant_photo.plant_species_id
                            AND plant_photo.is_thumbnail_photo = 1

                        WHERE plant_record.location_area_id = ?
                        
                        GROUP BY plant_species.plant_species_id";

        } elseif ($category === "Family") {
            $sqlQuery = "SELECT
                            photo, 
                            scientific_name, 
                            SUBSTRING_INDEX(
                                GROUP_CONCAT(DISTINCT plant_english_name.english_name SEPARATOR ', '),
                                ', ', 
                                3) AS english_name, 
                            plant_species.plant_species_id

                        FROM plant_species

                        INNER JOIN plant_english_name 
                            ON plant_species.plant_species_id = plant_english_name.plant_species_id 

                        LEFT JOIN plant_photo
                            ON plant_species.plant_species_id = plant_photo.plant_species_id
                            AND plant_photo.is_thumbnail_photo = 1
                        
                        WHERE plant_family_id = ?
                        
                        GROUP BY plant_species.plant_species_id";
                        
        } else { ?>
            <script>
                window.location.href="index.php"; 
            </script>
        <?php }

        //Prepared statement
        $stmt = mysqli_stmt_init($conn);
        //Prepare the prepared statement 
        //Checks if it works
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "<h1>ERROR! Prepared statement function did not work. Return to the Home page and try again</h1>";
        } else {
            //Binds parameters
            mysqli_stmt_bind_param($stmt, "i", $subCategoryId);
            //Executes the prepared statement
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $category; ?></title>
    <link rel="stylesheet" href="css/result.css">
</head>
<body>

    <div class="result-card-container">
        <?php 
        $id = "plant_species_id"; 
        while ($row = mysqli_fetch_assoc($result)) { ?> 
    
            <div class='result-card' onclick="window.location.href='plant_detail_page.php?speciesID=' + <?php echo $row[$id]; ?> + '&tab=' + encodeURI('Details')">
                <div class="img-container"><img src="<?php echo $row["photo"]; ?>" alt="Plant Thumbnail Photo"></div>
                <p><strong><u>Scientific Name: </u></strong><br><i><?php echo $row["scientific_name"]; ?></i></p>
                <p><strong><u>Common Name: </u></strong><br><?php echo $row["english_name"]; ?></p>
            </div>

    <?php } ?>           
    </div>

</body>
</html>

<?php require('inc_footer.php') ?>