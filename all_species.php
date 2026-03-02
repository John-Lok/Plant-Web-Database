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

            <div class="PLantCardContainer">
                <div class="PlantCard">Plant 1</div>
                <div class="PlantCard">Plant 2</div>
                <div class="PlantCard">Plant 3</div>
                <div class="PlantCard">Plant 4</div>
                <div class="PlantCard">Plant 5</div>
                <div class="PlantCard">Plant 6</div>
                <div class="PlantCard">Plant 7</div>
                <div class="PlantCard">Plant 8</div>
                <div class="PlantCard">Plant 9</div>
                <div class="PlantCard">Plant 10</div>
                <div class="PlantCard">Plant 11</div>
                <div class="PlantCard">Plant 12</div>
                <div class="PlantCard">Plant 13</div>
                <div class="PlantCard">Plant 14</div>
                <div class="PlantCard">Plant 15</div>
                <div class="PlantCard">Plant 16</div>
                <div class="PlantCard">Plant 17</div>
                <div class="PlantCard">Plant 18</div>
                <div class="PlantCard">Plant 19</div>
                <div class="PlantCard">Plant 20</div>
            </div>

            <div class="pagination-nav-bar">
                <div><a>Prev</a></div>
                <div><a onclick="pagination(1); pageHighlight(1)" class="nav-btn">1</a></div>
                <div><a onclick="pagination(2)" class="nav-btn">2</a></div>
                <div><a onclick="pagination(3)" class="nav-btn">3</a></div>
                <div><a onclick="pagination(4)" class="nav-btn">4</a></div>
                <div><a onclick="pagination(5)" class="nav-btn">5</a></div>
                <div><a>Next</a></div>
            </div>

            <!--UPM-->
            <!--JAVASCRIPT-->
            <script>

                let cardsArray = document.querySelectorAll(".PlantCard");
                let navBtnArray = document.querySelectorAll(".nav-btn");

                /*We have pages so we assign them to numbers (index), then we have to go thru each page, then we do the if to compare index with a syarat to fufill required action
                function pageHighlight(pageNum) {
                    for(let i=)
                    if (pageNum === ) {
                            navBtnArray.style.backgroundColor = "grey";
                        
                    }
                }
                */
              
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

        </div>
        <?php include('inc_footer.php') ?>
    </div>
</body>
</html>