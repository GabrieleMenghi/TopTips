<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$templateParams["titolo"] = "TopTips - Utenti seguiti";
if(isset($_GET["utente"])) {
    $templateParams["seguiti"] = $dbh->getListOfSeguitiById($_GET["utente"]);
} else {
    $templateParams["seguiti"] = $dbh->getListOfSeguitiById($_SESSION["idutente"]);
}

$templateParams["nome"] = "template/utenti-seguiti.php";
require("template/base.php");
?>