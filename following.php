<?php

require_once("bootstrap.php");
// in questa pagina mi arrivano i dati relativi alla ricerca

//Prima delle due azioni devo controllare che non vi sia già un legame tra i due

// devo distinguere due azioni: 1) inizia a seguire   ;    2) smetti di seguire
$idricevuto_follower = $_POST["follower_id"];
$parameter["follower"]= $dbh->getIdByUsername($idricevuto_follower);
$idricevuto_following = $_POST["following_id"];
$parameter["following"] = $dbh->getIdByUsername($idricevuto_following);
foreach ($parameter["following"] as $seguito) {
    foreach ($parameter["follower"] as $seguace) 
    $dbh->followUser($seguito["idutente"], $seguace["idutente"]);
    //$dbh->unfollowUser($idricevuto_unfollow, $_SESSION["user"]);
}

?>