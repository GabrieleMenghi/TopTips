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

if($_POST["utente"] == 0){
    echo "";
} else {
$sql = "SELECT * FROM notifica
        WHERE letta = 0
        AND utentenotificato = ?";
$result = $conn->prepare($sql);
$result->bind_param('i', $_POST["utente"]);
$result->execute();
$result->store_result();
echo $result->num_rows;
}
$conn->close();
?>