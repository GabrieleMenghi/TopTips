<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$idpost = $_POST["idpost"];
$dbh->deletePost($idpost);

$msg = "Cancellazione del post avvenuta correttamente!";
header("location: login.php?formmsg=".$msg);

require("template/base.php");
?>