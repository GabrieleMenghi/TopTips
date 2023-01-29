<?php

require_once("bootstrap.php");

$templateParams["titolo"] = "TopTips - Home";
$templateParams["nome"] = "template/lista-post.php";


if(isUserLoggedIn()){
    $seguiti= $dbh->getFollowedBy($_SESSION["idutente"]);
    $templateParams["posts"] = $dbh->getPostsOfUsers($seguiti);
} else {
    $templateParams["posts"] = $dbh->getPosts();
}
$templateParams["commenti"] = $dbh->getComments();
require("template/base.php");
?>