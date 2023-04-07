<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$username_cercato = $_GET["username"];
$templateParams["username"] = $username_cercato;
$templateParams["idutente"] = $dbh->getIdByUsername($username_cercato);
foreach ($templateParams["idutente"] as $ricercato){
    $templateParams["profilo"] = $dbh->getProfileByUserId($ricercato["idutente"]);
    $templateParams["post"] = $dbh->getPostByUserId($ricercato["idutente"]);
}
$templateParams["titolo"] = "TopTips - Profilo di ".$username_cercato;
$templateParams["nome"] = "template/segui-profilo.php";

require("template/base.php");
?>