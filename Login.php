<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "recycling";
$message = "";
try {
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["login"])) {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $query = "SELECT * FROM users WHERE username = :username";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username' => $_POST["username"],
                )
            );
            
            if ($statement->rowCount() > 0) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);

                if (password_verify($_POST['password'], $row['password'])) {
                    $_SESSION["username"] = $_POST["username"];
                    header("location: login_succes.php");

                    exit;
                }
 
                $message = '<label>Wrong password</label>';
            } else {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Recycle</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'topMenu.php'; ?>
    <div class="container" style="width:100%;">
        <?php
        if (isset($message)) {
            echo '<label class="text-danger">' . $message . '</label>';
        }
        ?>
        <div class="img">
            <div class="imgs" id="img"><img src="img/recycle.jpg" width="100px" height="100px"></div>
        </div>
        <h3>Welkom bij Remas,
        </h3>
        <h4>Het Recycle Managemnt System voor het project Superior Waste van de gemeente Emserveen</h4><br />
        <form method="post" >
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="elijah" />
            <br />
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="test123"/>
            <br />
            <input type="submit" name="login" class="btn btn-info" value="Login" />
        </form>
    </div>
    <br />
</body>

</html>