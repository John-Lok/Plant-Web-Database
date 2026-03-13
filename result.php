<?php 
    include('inc_header.php'); 
    include('inc_back_button.php');
    include('database_conn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header_footer.php.css">
</head>
<body>
    
    <?php

        $category = $_GET["category"];
        $name = $_GET["search"];
        $id = $_GET["id"];
        
        //Breadcrumbs navigation
        echo "<h1>{$category} > {$name}</h1>"; 

        $sql = "SELECT *
                FROM plant_species
                WHERE plant_species_id =
                (SELECT plant_species_id 
                 FROM specific_use
                 WHERE $id = specific_use.use_category_id);"; 
        $result = mysqli_query($conn, $sql); 

        while($row = mysqli_fetch_assoc($result)) {
            echo $row["scientific_name"]."<br>"; 
            echo $row["vegetation_type"];  
        }
    ?>



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
            height: 450px; 
            width: 300px; 
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
-->