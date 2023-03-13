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

$idnotifica = $_POST["idnotifica"];

$sql = "DELETE FROM notifica WHERE idnotifica=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $idnotifica);
$stmt->execute();

$conn->close();
?>