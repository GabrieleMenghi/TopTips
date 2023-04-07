<?php
require_once("bootstrap.php");
$templateParams["titolo"] = "TopTips - Nuovo Post";

if(isUserLoggedIn()){
    $templateParams["nome"] = "template/pagina-creazione-post.php";
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
} 
else {
    $templateParams["nome"] = "template/richiesta-login.php";
    $templateParams["page"] = "creazione-post.php";
}
require("template/base.php");
?>