<?php
    $sqlDetails = "SELECT
                       category_name, 
                       specific_use_desc, 
                       ifnull(prep_method_1, 'NOT AVAILABLE') AS prep_method_1, 
                       ifnull(prep_method_2, 'NOT AVAILABLE') AS prep_method_2, 
                       administration
                   FROM specific_use
                   JOIN use_category ON use_category.use_category_id = specific_use.use_category_id
                   LEFT JOIN administration_route ON administration_route.specific_use_id = specific_use.specific_use_id
                   WHERE plant_species_id = '$speciesID'
                       ";

    $result = mysqli_query($conn, $sqlDetails);
?>

<html lang="en">
        <div class="pdp-contents-container">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <h3 class="key">Use Category</h3> <p class="data-text"><?php echo $row["category_name"]; ?></p> <br>
                <h3 class="key">Specific Use</h3> <p class="data-text"><?php echo $row["specific_use_desc"]; ?></p> <br>
                <h3 class="key">Prep Method 1</h3> <p class="data-text"><?php echo $row["prep_method_1"]; ?></p> <br>
                <h3 class="key">Prep Method 2</h3> <p class="data-text"><?php echo $row["prep_method_2"]; ?></p> <br> 
                
                <!--If Use Category is "Medicine", Administration Route will display-->
                <?php if ($row["category_name"] === "Medicine") { ?>
                    <h3 class="key">Administration</h3> <p class="data-text"><?php echo $row["administration"]; ?></p> <br>
                <?php } ?>

                <hr style="height: 2px; background-color: black;"> 

            <?php } ?>
        </div>
</html>

<style>
    .pdp-contents-container {
        padding: 20px;
    }

    .key {
        margin: 0; 
        font-size: 30px;
        text-decoration: underline;

    }

    p.data-text {
        margin: 0; 
        font-size: 25px;
    }
</style>