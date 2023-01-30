<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "TopTips - Nuovo Post";


if(isUserLoggedIn()){
    $templateParams["nome"] = "template/pagina-creazione-post.php";
    //$templateParams["notifiche"]= $dbh->getNotificationsById($_SESSION["idutente"]);
} else {
    $templateParams["nome"] = "template/richiesta-login.php";
}
require("template/base.php");
?>