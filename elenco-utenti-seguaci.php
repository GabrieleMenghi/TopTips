<?php

require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$templateParams["titolo"] = "TopTips - Utenti seguaci";
if(isset($_GET["utente"])) {
    $templateParams["seguaci"] = $dbh->getListOfSeguaciById($_GET["utente"]);
} else {
    $templateParams["seguaci"] = $dbh->getListOfSeguaciById($_SESSION["idutente"]);
    
}
$templateParams["nome"] = "template/utenti-seguaci.php";
 
require("template/base.php");

?>