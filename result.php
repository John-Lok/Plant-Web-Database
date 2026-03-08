<?php 
    include('inc_header.php'); 
    include('inc_back_button.php');
?>

<!DOCTYPE html>
<html>
<head>
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



    ?>

    <div class="result-card-container">
        <div class="result-card">
            <img src="css/images/home_background.jpg">
            <p style="text-decoration: underline; ">Scientific Name: </p><br> <p>Zingiber Otensii Alpha Beta Omega bomboclad</p>
            <p></p>
            <p>Eng. Name: Malaysian Ginger</p>
            <p>Use Category: Spiritual</p>
            <p>Specific Use: Exorcism</p>
        </div>
        <div class="result-card">
            <img src="css/images/home_background.jpg">
            <p>Zingiberaceae Otensii</p>
            <p>Eng. Name: Malaysian Ginger</p>
            <p>Use Category: Spiritual</p>
            <p>Specific Use: Exorcism</p>
        </div>
        <div class="result-card">
            <img src="css/images/home_background.jpg">
            <p>Zingiberaceae Otensii</p>
            <p>Eng. Name: Malaysian Ginger</p>
            <p>Use Category: Spiritual</p>
            <p>Specific Use: Exorcism</p>
        </div>
        <div class="result-card">
            <img src="css/images/home_background.jpg">
            <p>Zingiberaceae Otensii</p>
            <p>Eng. Name: Malaysian Ginger</p>
            <p>Use Category: Spiritual</p>
            <p>Specific Use: Exorcism</p>
        </div>
    </div>

    <style>
        .result-card-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 10px; 

            margin: 30px;
        }

        .result-card {
            border: 4px solid black;
            border-radius: 15px;
            padding: 20px;
            height: 450px; 
            width: 300px; 

            display: flex;
            flex-direction: column;
            align-items: center; 

            overflow: hidden;
        }
            

        img {
            width: 160px; 
            height: 160px; 
            object-fit: cover;
            background-position: center;
            flex-shrink: 0;
        }
    </style>

</body>
</html>

<?php include('inc_footer.php') ?>