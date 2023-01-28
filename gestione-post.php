<?php

require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("location: login.php");
}

$templateParams["titolo"] = "TopTips - Elimina post";
$templateParams["nome"] = "elimina-post.php";
$templateParams["parameter"] = $_GET["id"];

require("template/base.php");

?>