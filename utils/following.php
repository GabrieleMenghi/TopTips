<?php
require_once("../bootstrap.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toptips";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$idseguitore = $_POST["seguitore"];
$idseguito = $_POST["seguito"];

if($dbh->isFollowing($idseguito, $idseguitore)) {
    $dbh->unfollowUser($idseguito, $idseguitore);
} else {
    $dbh->followUser($idseguito, $idseguitore);
}

$conn->close();
?>