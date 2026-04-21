<?php
    $sqlPhoto = "SELECT photo, is_thumbnail_photo
                 FROM plant_photo
                 WHERE plant_species_id = '$speciesID'"; 

    $result = mysqli_query($conn, $sqlPhoto); 
?>

<html lang="en">
    <h2>Click any one of the photos to get a full view of it</h2>

    <div class="pdp-photo-tab-container">
        
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <a target="_blank" href="<?php echo $row["photo"] ?>">
                <img src="<?php echo $row["photo"] ?>" alt="Image of plant not available" class="plant-photo">
            </a>
        <?php } ?>

    </div>
</html>

<style>
    h2 {
        margin-left: 20px;
    }

    .pdp-photo-tab-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;

        padding: 20px;
    }

    img.plant-photo {
        width: 200px;
    }

    img.plant-photo:hover {
        filter: brightness(50%);
        transition: ease-in 0.1s;
    }
</style>