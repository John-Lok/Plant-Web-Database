<?php require('inc_header.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/components.css">

    </head>
    <body>           
        <h1 class="homeTitle">Useful Plants of <br>Orang Asli in Peninsula Malaysia</h1>
            
        <!--Get Started button and its div container-->
        <div class="startButtonContainer">
            <button id="startButton" class="blue-btn" onclick="window.location.href='after_start_button.php'"><strong>GET STARTED</strong></button>
        </div>
    </body>

<?php require('inc_footer.php'); ?>

<!--
===HOW THE HEADER AND FOOTER IS STRUCTURED HERE===
[LINK TO THE inc_header.php FILE HERE] <- first line in a new page file

<head>
    [LINK TO THE HEADER AND FOOTER CSS FILES] <- below the <title>
</head>
<body>
    [MAIN CONTENT GOES HERE]
</body>

[LINK TO THE footer.php FILE] <- last line in the new page file
-->

</html>