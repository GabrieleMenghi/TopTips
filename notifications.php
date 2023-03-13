<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "TopTips - Notifiche";


if(isUserLoggedIn()){
    $templateParams["nome"] = "template/lista-notifiche.php";
    $templateParams["notifiche"]= $dbh->getNotificationsById($_SESSION["idutente"]);
} else {
    $templateParams["nome"] = "template/richiesta-login.php";
    $templateParams["page"] = "notifications.php";
}
require("template/base.php");
?>