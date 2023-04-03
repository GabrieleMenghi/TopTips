<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toptips";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE immagine SET votes = votes + 1 WHERE immagine.image_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i',$_POST["immagine"]);
$stmt->execute();

$conn->close();
?>