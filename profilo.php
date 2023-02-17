<?php

require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$username = $_GET["username"];
$templateParams["idutente"] = $dbh->getIdByUsername($username);
foreach ($templateParams["idutente"] as $ricercato){
    $templateParams["profilo"] = $dbh->getProfileByUserId($ricercato["idutente"]);
    $templateParams["post"] = $dbh->getPostByUserId($ricercato["idutente"]);
}

$templateParams["username"] = $username;
$templateParams["titolo"] = "TopTips - Profilo di ".$username;
$templateParams["nome"] = "template/segui-profilo.php";

require("template/base.php");

?>