<?php

require_once("bootstrap.php");

if(!isUserLoggedIn() || !isset($_POST["action"])){
    header("location: login.php");
}

if($_POST["action"]==1){
    $utente = $_SESSION["idutente"];
    $datipersonali = htmlspecialchars($_POST["datipersonali"]);

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgprofilo"]);
    if($result != 0){
        $imgprofilo = $msg;
        $id = $dbh->insertProfile($datipersonali, $imgprofilo, $utente);
        if($id!=false){
            $msg = "Profilo creato correttamente!";
        }
        else{
            $msg = "Errore nella creazione del profilo!";
        }    
    }
    header("location: login.php?formmsg=".$msg);
}

if($_POST["action"]==2){
    $utente = $_SESSION["idutente"];
    $datipersonali = htmlspecialchars($_POST["datipersonali"]);

    if(isset($_FILES["imgprofilo"]) && strlen($_FILES["imgprofilo"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgprofilo"]);
        if($result == 0){
            header("location: login.php?formmsg=".$msg);
        }
        $imgprofilo = $msg;
    }
    else{
        $imgprofilo = $_POST["oldimg"];
    }
    $dbh->updateProfile($datipersonali, $imgprofilo, $utente);

    $msg = "Modifica del profilo avvenuta correttamente!";
    header("location: login.php?formmsg=".$msg);
}

?>