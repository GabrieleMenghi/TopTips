<?php

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateParams["titolo"] = "TopTips - Logout";
    $templateParams["nome"] = "template/exit-process.php";
}
else{
    header("location: login.php");
}

require("template/base.php");

?>