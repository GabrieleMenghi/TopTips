<?php
require_once("bootstrap.php");

if(!isUserLoggedIn() || !isset($_GET["action"])){
    header("location: login.php");
}

$risultato = $dbh->getProfileByUserId($_SESSION["idutente"]);
if(count($risultato)==0){
    $templateParams["profilo"] = null;
}
else{
    $templateParams["profilo"] = $risultato[0];
}

$templateParams["titolo"] = "TopTips - Modifica profilo";
$templateParams["nome"] = "template/modifica-profilo.php";
$templateParams["azione"] = $_GET["action"];

require("template/base.php");
?>