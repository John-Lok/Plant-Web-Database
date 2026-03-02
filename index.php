<?php include('inc_header.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alice's Plant Database</title>
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/home.css">

    </head>
    <body>
        <div id="container">
            <!--Write the main pgae contents in this div-->
            <div id="main">

                <h1 class="homeTitle">Useful Plants of <br>Orang Asli in Peninsula Malaysia</h1>
            
                <!--Get Started button and its div container-->
                <div class="startButtonContainer">
                    <button class="startButton" onclick="window.location.href='village.php'"><strong>GET STARTED</strong></button>
                </div>
                
            </div>
            
            <!--linking of footer.php at bottom of main content-->
            <?php include('inc_footer.php'); ?>

        </div>
    </body>

<!--
--HOW THE FOOTER IS STRUCTURED HERE--

 <div id="container">
    <div id="main">
        [MAIN CONTENT GOES HERE]
    </div>

    [LINK TO THE footer.php FILE]
</div>
-->

</html>