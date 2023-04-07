<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$templateParams["titolo"] = "TopTips - Elimina post";
$templateParams["nome"] = "template/elimina-post.php";
$templateParams["numeroIdPost"] = $_GET["id"];

require("template/base.php");
?>