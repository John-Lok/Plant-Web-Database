<body>

    <!--Links the CSS file to style the header-->
    <link rel="stylesheet" href="css/header_footer.css">

    <!--Off screen menu container and tabs-->
    <div class="off-screen-dropdown-menu">
        <ul style="list-style: none; padding: 0; margin: 0;">

            <li><a href="index.php">Home</a></li><hr>
            <li><a onclick="window.location.href='search_category.php?category=' + encodeURI('Use Category')">Use Category</a></li><hr>
            <li><a onclick="window.location.href='search_category.php?category=' + encodeURI('Family')">Family</a></li><hr>
            <li><a onclick="window.location.href='search_category.php?category=' + encodeURI('Location')">Location</a></li><hr>
            <li><a onclick="window.location.href='result.php?category=' + encodeURI('All Species')">All Species</a></li><hr>

        </ul>
    </div>

    <!--Navigation Header Container-->
    <div class="topnav">

        <!--Hamburger Menu Icon-->
        <div class="hamburger-menu-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!--JS logic when clicking the Hamburger Icon-->
        <script>
            const hamMenuIcon = document.querySelector(".hamburger-menu-icon"); 
            const offScreenMenu = document.querySelector(".off-screen-dropdown-menu"); 

            hamMenuIcon.addEventListener("click", () => {
                offScreenMenu.classList.toggle("active");
                hamMenuIcon.classList.toggle("active");
            })
        </script>

        <!--Navigation Header Title-->
        <p style="font-size: 50px; color: white; margin: 0px; padding: 0px; ">TITLE</p>

    </div>

</body>

<!--                        
            <button class="register-login-btn" style="margin-left: auto;">
                <strong>Register</strong>
            </button>
            <button class="register-login-btn" style="margin-left: 8px; margin-right: 8px;">
                <strong>Log in</strong>
            </button>
-->            
<!--
            <a style="margin-left: auto;">
                <div class="profile-container" >
                    <img src="images/profile_pic.png" class="profile-pic">
                    <p style="size: 20px; color: white; text-align: center; margin-top: 0px;"><strong>My Account</strong></p>
                </div>
            </a>
-->