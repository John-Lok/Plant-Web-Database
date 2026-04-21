<?php require('inc_header.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Your Search Category</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/after_start_button.css">
    <link rel="stylesheet" href="css/components.css">

</head>
<body>
    <h1>What would you like to search?</h1>

    <!--The tab boxes-->
    <div class="tab-box-container">
        <div class="tab-box" onclick="window.location.href='search_category.php?category=' + encodeURI('Use Category')">Use Category</div>
        <div class="tab-box" onclick="window.location.href='search_category.php?category=' + encodeURI('Family')">Family</div>
        <div class="tab-box" onclick="window.location.href='search_category.php?category=' + encodeURI('Location')">Location</a></div>
        <div class="tab-box" onclick="window.location.href='result.php?category=' + encodeURI('All Species')">All Species</a></div>
        <!--A URL parameter with "category" key is passed to next page-->
        <!--A specific value is assigned to that key depending on which tab box the user clicks-->
    </div>
</body>

    <!--CSS Styling for this page only-->
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        h1 {
            text-align: center;
            position: relative;
            font-size: 60px;
        }

        .tab-box-container {
            display: flex;
            justify-content: center;
            align-items: center; 
            flex-wrap: wrap;
            margin: 120px;
            gap: 30px;
        }
    </style>

</html>

<?php require('inc_footer.php') ?>