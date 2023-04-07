<?php
require_once("bootstrap.php");

if(isset($_POST["submit"])){
    $response = loginUser($_POST["username"], $_POST["password"]);
}

if(isUserLoggedIn()){
    $templateParams["titolo"] = "TopTips - Profilo personale";
    if(isset($_GET["page"])){
        header("location: " . $_GET["page"]);
    } else {
        $templateParams["nome"] = "template/login-post.php";
    }
    $templateParams["profilo"] = $dbh->getProfileByUserId($_SESSION["idutente"]);
    $templateParams["post"] = $dbh->getPostByUserId($_SESSION["idutente"]);
    $_SESSION["isUserLoggedIn"] = true;
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
}
else {
    $templateParams["titolo"] = "TopTips - Login";
    $templateParams["nome"] = "template/login-form.php";
    $_SESSION["isUserLoggedIn"] = false;
}

require("template/base.php");
?>