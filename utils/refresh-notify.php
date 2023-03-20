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
        SET letta = ?
        WHERE idnotifica=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $_POST["valore"], $_POST["notifica"]);
$stmt->execute();

$conn->close();
?>