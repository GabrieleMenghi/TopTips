<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    $templateParams["titolo"] = "TopTips - Account eliminato";
    $templateParams["nome"] = "template/delete-message.php";
}
else {
    header("location: exit.php");
}
require("template/base.php");
?>