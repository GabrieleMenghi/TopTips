<?php
require_once("bootstrap.php");
$post = $_POST["idpost"];
$autore = $_POST["author"];;
$testo = $_POST["commenttext"];
//Se autore è 0 significa che non è stato fatto un login: non si può commentare un post
if($autore != 0){
    $dbh->addComment($post, $autore, $testo);
}
header("location: home.php");
?>