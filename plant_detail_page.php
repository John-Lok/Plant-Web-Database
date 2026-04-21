<?php 
    require('inc_header.php'); 
    require('database_conn.php'); 
    $tab = $_GET["tab"];
    $speciesID = $_GET["speciesID"]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Details</title>
</head>
<body>
    <div class="pdp-nav-container">
        <p class="pdp-nav-tab <?php echo $tab == 'Details' ? 'active' : '' ?>"
           onclick="window.location.href='plant_detail_page.php?speciesID=' + <?php echo $speciesID; ?> + '&tab=Details'"
        >Details</p>

        <p class="pdp-nav-tab <?php echo $tab == 'Uses' ? 'active' : '' ?>" 
           onclick="window.location.href='plant_detail_page.php?speciesID=' + <?php echo $speciesID; ?> + '&tab=Uses'"
        >Uses</p>

        <p class="pdp-nav-tab <?php echo $tab == 'Photos' ? 'active' : '' ?>" 
           onclick="window.location.href='plant_detail_page.php?speciesID=' + <?php echo $speciesID; ?> + '&tab=Photos'"    
        >Photos</p>
    </div>

    <!--Controls the contents based on the tab the user is on-->
    <?php
        if ($tab === "Details") {
            include('PDP_tabs/details.php'); 
        } elseif ($tab === "Uses") {
            include('PDP_tabs/uses.php'); 
        } elseif ($tab === "Photos") {
            include('PDP_tabs/photos.php'); 
        } else { ?>    
            <script> window.location.href="index.php"; </script>
        <?php }
    ?>

</body>
</html>

<?php require('inc_footer.php'); ?>

<style>

    .pdp-nav-container {
        display: flex;
        border-bottom: 4px solid black;
        padding: 0; 
    }

    .pdp-nav-container p {
        
        margin: 0;
        padding: 5px; 
        padding-left: 10px; 
        padding-right: 10px; 

        font-size: 25px;
    }

    .pdp-nav-container p:hover {
        text-decoration: underline;
    }

    p.active {
        background-color: rgb(155, 155, 155);
    }

</style>