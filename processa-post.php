<?php

require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$idpost = $_POST["idpost"];
$dbh->deletePost($idpost);

$msg = "Cancellazione completata correttamente!";
header("location: login.php?formmsg=".$msg);

?>