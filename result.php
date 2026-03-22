<?php 
    include('inc_header.php'); 
    include('inc_back_button.php');
    include('database_conn.php');

    $category = $_GET["category"]; 
    /*
    Uses of each URL param value: 
        1) $category
            - Use as the "identifier" to determine which SQL qeury to execute
            - To display the page's title according to what the user had clicked on
        2) $subCategory
            - For querying the correct results
            - To be apart of displaying the breadcrumbs navigation
        3) $subCategory
            - For querying the correct results
            - To be apart of displaying the breadcrumbs navigation

    Contains 2 nested if-else logic: 
        1st if-else use: 
            - Check if $catergory is "All Species" or not
            - Assigns an SQL query that doesn't recieve data from 2) and 3) URL params
            - Displays a page title
        2nd if-else use: 
            - Check what value is in $catergory
            - Assigns a given SQL query that uses data from $subCategoryId to query the right results 
            - Displays a breadcrumbs navigation

    Reason for 1st if-else: 
    "All Species" is a special case as it doesn't go through "search_category.php" unlike the others
    */
    if ($category === "All Species") {
        //Breadcrumbs Nav
        echo "<h1>{$category}</h1>"; 

        $sqlQuery = "SELECT 
                        photo, 
                        scientific_name, 
                        SUBSTRING_INDEX(
                            GROUP_CONCAT(DISTINCT plant_english_name.english_name SEPARATOR ', '), 
                            ', ', 
                            3) AS english_name

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
                            use_category.category_name

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
            $sqlQuery = "SELECT DISTINCT 
                            photo, 
                            scientific_name, 
                            SUBSTRING_INDEX(
                                GROUP_CONCAT(DISTINCT plant_english_name.english_name SEPARATOR ', '), 
                                ', ', 
                                3) AS english_name

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
                                3) AS english_name

                        FROM plant_species

                        INNER JOIN plant_english_name 
                            ON plant_species.plant_species_id = plant_english_name.plant_species_id 

                        LEFT JOIN plant_photo
                            ON plant_species.plant_species_id = plant_photo.plant_species_id
                            AND plant_photo.is_thumbnail_photo = 1
                        
                        WHERE plant_family_id = ?
                        
                        GROUP BY plant_species.plant_species_id";
                        
        } else {
            echo "<h1>ERROR! Invalid category value. Return to Home page and try again</h1>";
        }

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
    <link rel="stylesheet" href="css/header_footer.php.css">
</head>
<body>

    <div class="result-card-container">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?> 
    
            <div class='result-card'>
                <div class="img-container"><img src="<?php echo $row["photo"]; ?>" alt="Plant Thumbnail Photo"></div>
                <p><strong><u>Scientific Name: </u></strong><br><i><?php echo $row["scientific_name"]; ?></i></p>
                <p><strong><u>Common Name: </u></strong><br><?php echo $row["english_name"]; ?></p>
            </div>

    <?php } ?>           
    </div>

</body>
</html>

<?php include('inc_footer.php') ?>


<!--
    <div class="result-card-container">
        <div class="result-card">
            <div class="img-container"><img src="https://static.wixstatic.com/media/ef1aa2_8b8cbbc712a745a88832a5835d18166f.jpg/v1/fill/w_250,h_333,al_c,q_90,enc_auto/ef1aa2_8b8cbbc712a745a88832a5835d18166f.jpg"></div>
            <p><u><strong>Scientific Name: </strong></u><br><i>Zingiber Otensii Alpha Beta Omega</i></p>
            <p><u><strong>Common Name: </strong></u><br>Malaysian Ginger</p>
            <p><u><strong>Use Category: </strong></u><br>Spiritual</p>
            <p><u><strong>Specific Use: </strong></u><br>Exorcism</p>
        </div>
    </div>
-->

    <style>
        .result-card-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px; 
            margin: 30px;
        }

        .result-card {
            border: 4px solid black;
            border-radius: 15px;
            padding: 20px;
            height: 300px; 
            width: 250px; 
            overflow: hidden;
        }
            
        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .result-card img {
            width: 160px; 
            height: 160px; 
            object-fit: cover;

            /*Stops the image from resizing on it's own when browser width becomes very small*/
            flex-shrink: 0;
        }

        strong {
            font-family: 'Arial'; 
        }

        p {
            font-size: 18px;
        }
    </style>

    <!--



    -->