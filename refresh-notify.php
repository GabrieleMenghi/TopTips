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

$sql = "UPDATE notifica
        SET letta = 1
        WHERE idnotifica=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i',$_POST["notifica"]);
$stmt->execute();

$conn->close();
?>