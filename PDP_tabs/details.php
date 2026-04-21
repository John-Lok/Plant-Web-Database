<?php
    $sqlDetails = "SELECT 
                        scientific_name, 
                        GROUP_CONCAT(english_name SEPARATOR ', ') AS 'english_name', 
                        vegetation_type, 
                        soil, 
                        ifnull(height, 'NOT AVAILABLE') AS height, 
                        ifnull(diameter, 'NOT AVAILABLE') AS diameter, 
                        ifnull(flowering_desc, 'NOT AVAILABLE') AS flowering_desc, 
                        ifnull(fruiting_desc, 'NOT AVAILABLE') AS fruiting_desc
                   FROM plant_species
                   JOIN plant_english_name ON plant_english_name.plant_species_id = plant_species.plant_species_id
                   WHERE plant_species.plant_species_id = '$speciesID'";

    $result = mysqli_query($conn, $sqlDetails);
?>

<html lang="en">
        <div class="pdp-contents-container">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <h3 class="key">Scientific Name</h3> <p class="data-text"><i><?php echo $row["scientific_name"]; ?></i></p> <br>
                <h3 class="key">English Name</h3> <p class="data-text"><?php echo $row["english_name"]; ?></p> <br>
                <h3 class="key">Vegetation Type</h3> <p class="data-text"><?php echo $row["vegetation_type"]; ?></p> <br>
                <h3 class="key">Soil Type</h3> <p class="data-text"><?php echo $row["soil"]; ?></p> <br>
                <h3 class="key">Height</h3> <p class="data-text"><?php echo $row["height"]; ?></p> <br>
                <h3 class="key">Diameter</h3> <p class="data-text"><?php echo $row["diameter"]; ?></p> <br>
                <h3 class="key">Flowering Description</h3> <p class="data-text"><?php echo $row["flowering_desc"]; ?></p> <br>
                <h3 class="key">Fruiting Desription</h3> <p class="data-text"><?php echo $row["fruiting_desc"]; ?></p> <br>   
            
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