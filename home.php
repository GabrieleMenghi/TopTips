<?php

require_once("./bootstrap.php");
$templateParams["titolo"] = "TopTips - Home";
$templateParams["nome"] = "template/lista-post.php";
$templateParams["posts"] = $dbh->getPost();
$templateParams["commenti"] = $dbh->getComments();
require("template/base.php");

?>