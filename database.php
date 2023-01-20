<?php
$host = "localhost";
$uname = "root";
$password = "";

$db_name = "login_db";

try {
    $conn = new PDO("mysql:host=$host;dbname=login_db", $uname, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>