<?php
$servername = "localhost";
$database = "site_car";
$username = "root";
$password = "root";
$host=3307;

$conn = mysqli_connect($servername, $username, $password, $database,$host);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>