<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$templateParams["titolo"] = "TopTips - Utenti seguiti";
if(isset($_GET["utente"])) {
    // Lista seguiti dell'utente cercato
    $templateParams["seguiti"] = $dbh->getListOfSeguitiById($_GET["utente"]);
}
else {
    // Lista dei propri seguiti
    $templateParams["seguiti"] = $dbh->getListOfSeguitiById($_SESSION["idutente"]);
}

$templateParams["nome"] = "template/utenti-seguiti.php";
require("template/base.php");
?>