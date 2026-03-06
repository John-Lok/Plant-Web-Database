<?php include('inc_header.php') ?>

<!DOCTYPE html>
<head>
    <title>All Species</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/all_species.css"></head>
<body>
    <div id="container">
        <div id="main">

            <p style="font-size: 50px;"><strong>All Species</strong></p>

            <?php

                $results_per_page = 4; 

            ?>        
            

            <!--JAVASCRIPT
            <script>

                let cardsArray = document.querySelectorAll(".PlantCard");
                let navBtnArray = document.querySelectorAll(".nav-btn");
              
                function pagination(pageNum) {
                    const cardsPerPage = 4;
                    const startShowIndex = (pageNum - 1) * cardsPerPage; 
                    const endShowIndex = startShowIndex + cardsPerPage;

                    for(let i=0; i < cardsArray.length; i++) {
                        if (i < startShowIndex || i >= endShowIndex) {
                            cardsArray[i].style.display = "none";
                        } else {
                            cardsArray[i].style.display = "block"; 
                        }
                    }
                }

            </script>

                        <div class="pagination-nav-bar">
                <div><a>Prev</a></div>
                <div><a onclick="pagination(1); pageHighlight(1)" class="nav-btn">1</a></div>
                <div><a onclick="pagination(2)" class="nav-btn">2</a></div>
                <div><a onclick="pagination(3)" class="nav-btn">3</a></div>
                <div><a onclick="pagination(4)" class="nav-btn">4</a></div>
                <div><a onclick="pagination(5)" class="nav-btn">5</a></div>
                <div><a>Next</a></div>
            </div>

            -->
            <?php include('go_back_button.php'); ?>
        </div>
        <?php include('inc_footer.php') ?>
    </div>
</body>
</html>