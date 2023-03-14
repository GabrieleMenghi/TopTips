<?php
require_once("../bootstrap.php");
$post = $_POST["idpost"];
$autore = $_POST["author"];;
$testo = $_POST["commenttext"];
//Se autore è 0 significa che non è stato fatto un login: non si può commentare un post
if($autore != 0){
    $dbh->addComment($post, $autore, $testo);

    $params["user"] = $dbh->getUsernameByIdUtente($autore);
    foreach($params["user"] as $user){
        $testonotifica = "L'utente " . $user["username"] . " ha commentato un tuo post";
    }
    $params["postinfo"] = $dbh->getPostById($post);
    foreach($params["postinfo"] as $postinfo){
        $dbh->insertNotify($testonotifica, $autore, $postinfo["utente"]);
    }
}
?>