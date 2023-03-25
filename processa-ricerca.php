<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$templateParams["titolo"] = "TopTips - Ricerca utente";
$templateParams["keyword"] = $_GET["keyword"];
$templateParams["utentiTrovati"] = $dbh->searchUser($templateParams["keyword"]);
$templateParams["nome"] = "template/search.php";

require("template/base.php");
?>