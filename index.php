<?php include('inc_header.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alice's Plant Database</title>
        <link rel="stylesheet" href="css/home.css">

    </head>
    <body>            
        <h1 class="homeTitle">Useful Plants of <br>Orang Asli in Peninsula Malaysia</h1>
            
        <!--Get Started button and its div container-->
        <div class="startButtonContainer">
            <button class="startButton" onclick="window.location.href='after_start_button.php'"><strong>GET STARTED</strong></button>
        </div>
    </body>

<?php include('inc_footer.php'); ?>


<!--

===HOW THE HEADER AND FOOTER IS STRUCTURED HERE===
[LINK TO THE inc_header.php FILE HERE] <- first line in a new page file
<head>
    [LINK TO THE HEADER AND FOOTER CSS FILES] <- below the <title>
</head>
<body>
    <div id="container">
        <div id="main">
            [MAIN CONTENT GOES HERE]
        </div>
    </div>
</body>

[LINK TO THE footer.php FILE] <- last line in the new page file

-->

</html>