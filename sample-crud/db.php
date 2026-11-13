<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crud_db";

$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `$dbname`");
mysqli_select_db($conn, $dbname);

$tableSql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL
)";
mysqli_query($conn, $tableSql);
?>