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

$testo = "";
$tiponotifica = $_POST["tiponotifica"];
$utentenotificante = $_POST["utentenotificante"];
$utentenotificato = $_POST["utentenotificato"];

$sql = "INSERT INTO notifica (`testo`, `letta`, `utentenotificante`, `utentenotificato`, `datanotifica`)
        VALUES (?, 0, ?, ?, NOW())";

if($tiponotifica =="votazione"){
    $testo = "L'utente " . $utentenotificante . " ha votato un tuo post";
}
$stmt = $conn->prepare($sql);
$stmt->bind_param('sii', $testo, $utentenotificante, $utentenotificato);
$stmt->execute();

$conn->close();
?>