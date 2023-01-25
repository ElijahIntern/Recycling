<?php
//login_success.php  
session_start();
if (isset($_SESSION["username"])) {
    echo '<h3>ingelogd als - ' . $_SESSION["username"] . '</h3>';
    echo '<br /><br /><a href="logout.php">Logout</a>';
} else {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>\</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h3>test</h3>
        
        <script src="" async defer></script>
    </body>
</html>