<?php
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

$sql = "INSERT INTO post_profilo_voti 
        VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iii',$_POST["post"], $_POST["profilo"], $_POST["immaginevotata"]);
$stmt->execute();

$conn->close();
?>