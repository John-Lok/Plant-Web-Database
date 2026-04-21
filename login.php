<?php require("inc_header.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/components.css">
        <title>Log in</title>
    </head>
    <body>
        <div class="form-container">
            <h1>Welcome back!</h1>
            <h2>Login</h2>
            <form action='' method="POST">
                <!--the "name" attribute in the <input> is the key for the $_POST SGV-->
                <div class="label-input-container">
                    <label for="user-name">Username</label><br>
                    <input type=text class="input-field" id="user-name" name="username" required>
                </div>

                <div class="label-input-container">
                    <label>Password</label><br>
                    <input type="password" class="input-field" id="user-password" name="password" required>
                </div>

                <input type="submit" id="submit-btn" class="green-btn" value="Login">
            </form>
        </div>
    </body>
</html>

<?php
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"]; 

        $sql = "SELECT username, password, role_name, role_rank 
                FROM user_account
                JOIN user_role ON user_account.role_id = user_role.role_id
                WHERE username = '$username' AND password = '$password' LIMIT 1";

        include("database_conn.php"); 
        $result = mysqli_query($conn, $sql); 

        if (mysqli_num_rows($result) > 0) { 
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $_SESSION["username"] =  $row["username"]; 
                $password = $_SESSION["password"] = $row["password"]; 
                $roleName = $_SESSION["roleName"] = $row["role_name"];
                $roleRank = $_SESSION["roleRank"] = $row["role_rank"]; 
            } 

            exit("<script>
                    window.alert('Successfully logged in'); 
                    window.location.href='index.php'; 
                  </script>;"
                ); 
        } else {
            echo "<script>
                    window.alert('Failed to login, either the username or the password did not match'); 
                  </script>";
        }
    } 

    require("inc_footer.php");
?>