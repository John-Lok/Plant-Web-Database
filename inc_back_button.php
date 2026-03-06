<body>

    <button id="back-btn">Go Back</button>

    <!--JS Code-->
    <script>
        const backBtn = document.getElementById("back-btn"); 

        //If user didn't have a page before in the history, will auto direct to Home
        backBtn.addEventListener("click", () => {
        
        if (window.history.length > 1) {
            window.history.back();
        } else {
            window.location.href = "index.php"; 
        }
    
        }); 
    </script>

    <!--CSS Code-->
    <style>
        #back-btn {
            position: fixed;
            top: 85%; 
            left: 2%; 

            background-color: rgb(74, 146, 255);
            height: 45px; 
            width: 90px;
            border: 4px solid rgb(12, 67, 150);
            border-radius: 10px;
            box-shadow: 1px 1px 6px black;

            font-weight: bold; 
            font-size: 17px;
        }

        #back-btn:hover {
            color: rgb(74, 146, 255); 
            background-color: black;           
        }
    </style>

</body>

<!--
NOTE: 
- All the css and javascript code is directly in this file and not seperated unlike the other files
- This button appears only for when the user has selected a category to search by and so on 
("START" button frm Home -> Select a category -> ["Go Back" button will appear from there on])
-->