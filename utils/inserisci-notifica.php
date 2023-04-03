<?php
require_once("../bootstrap.php");
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

$testo = "";
$tiponotifica = $_POST["tiponotifica"];
$utentenotificante = $_POST["utentenotificante"];
$utentenotificato = $_POST["utentenotificato"];
if(isset($_POST["idpost"])){
    $idpost = $_POST["idpost"];
}

//Inserimento notifica
$sql = "INSERT INTO notifica (`testo`, `letta`, `utentenotificante`, `utentenotificato`, `datanotifica`)
        VALUES (?, 0, ?, ?, NOW())";

if($tiponotifica =="votazione"){
    $params["user"] = $dbh->getUsernameByIdUtente($utentenotificante);
    $params["title"] = $dbh->getTitleByIdPost($idpost);
    foreach($params["user"] as $user){
        foreach($params["title"] as $title){
            $testo = "L'utente " . $user["username"] . " ha votato il tuo post '" . $title["titolopost"] . "'";
        }
    }
} else if($tiponotifica =="follow"){
    $params["user"] = $dbh->getUsernameByIdUtente($utentenotificante);
    foreach($params["user"] as $user){
        $testo = "L'utente " . $user["username"] . " ha iniziato a seguirti";
    }
}

$stmt = $conn->prepare($sql);
$stmt->bind_param('sii', $testo, $utentenotificante, $utentenotificato);
$stmt->execute();

$conn->close();
?>