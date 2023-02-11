<?php

require_once("bootstrap.php");
$templateParams["titolo"] = "TopTips - Ricerca utente";
$templateParams["keyword"] = $_POST["keyword"];
$templateParams["utentiTrovati"] = $dbh->searchUser($templateParams["keyword"]);
$templateParams["nome"] = "template/search.php";
require("template/base.php");

?>