<?php

require_once("bootstrap.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        $templateParams["errorelogin"] = "Errore!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isset($_POST["submit"])){
    $response = loginUser($_POST["username"], $_POST["password"]);
}


if(isUserLoggedIn()){
    $templateParams["titolo"] = "TopTips - Profilo admin";
    $templateParams["nome"] = "login-post.php";
    $templateParams["profilo"] = $dbh->getProfileByUserId($_SESSION["idutente"]);
    $templateParams["post"] = $dbh->getPostByUserId($_SESSION["idutente"]);
}
else{
    $templateParams["titolo"] = "TopTips - Login";
    $templateParams["nome"] = "login-form.php";    
}

require("template/base.php");

?>