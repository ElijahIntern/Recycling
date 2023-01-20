<?php
session_start();
include "database.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if (empty($uname)) {
    header("location: index3.php?errorUser name is required");
    exit();
} 

else if (empty($pass)) {
    header("location index3.php? error=Pasword is required");
    exit();
}

$sql = "SELECT * FROM users WHERE user_name = '".$uname."' AND password = '".$pass."' ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['user_name'] === $uname && $row['password'] === $pass) {
        echo "logged In!";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("location: home.php");
        exit();

    } else {
        header("location: index3.php?error=Incorrect User Name or password");
        exit();
    }
} else {
    header("location: index3.php");
    exit();
}