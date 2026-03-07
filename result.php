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

        $id = $_GET["id"];
        $name = $_GET["search"];
        
        echo $name; 

    ?>

</body>
</html>

<?php include('inc_footer.php') ?>