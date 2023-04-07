<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    $templateParams["titolo"] = "TopTips - Registrazione";
    $templateParams["nome"] = "template/registrazione-form.php";
}
else {
    header("location: exit.php");
}

require("template/base.php");
?>