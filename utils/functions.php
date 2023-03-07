<?php
function isUserLoggedIn(){
    return !empty($_SESSION["idutente"]);
}

function connect(){
    $mysqli = new mysqli("localhost", "root", "", "toptips", 3306);
    if($mysqli->connect_errno != 0){
        die("Connessione fallita al db");
        return false;
    }
    else{
        return $mysqli;
    }
}

function registerUser($email, $username, $password, $confirm_password){
    $mysqli = connect();

    if(!$mysqli){
        return FALSE;
    }

    $args = func_get_args();

    $args = array_map(function($value){
        return trim($value);
    }, $args);

    foreach($args as $value) {
        if(empty($value)){
            return "Tutti i campi sono richiesti";
        }
    }

    foreach($args as $value){
        if(preg_match("/([<|>])/", $value)){
            return "<> sono caratteri non consentiti";
        }
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return "Email non valida";
    }

    $stmt = $mysqli->prepare("SELECT email FROM utente WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if($data != NULL){
        return "Email già esistente, perfavore usa un username diverso";
    }

    if(strlen($username) > 50){
        return "Username troppo lungo";
    }

    $stmt = $mysqli->prepare("SELECT username FROM utente WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if($data != NULL){
        return "Username già esistente, per favore usa un username diverso";
    }

    if(strlen($password) > 50){
        return "Password troppo lunga";
    }

    if($password != $confirm_password){
        return "Password non corrisponde";
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO utente(email, username, password) VALUES(?,?,?)");
    $stmt->bind_param("sss", $email, $username, $hashed_password);
    $stmt->execute();
    if($stmt->affected_rows != 1){
        return "Si è verificato un errore. Perfavore, riprova";
    }
    else{
        return "success";
    }
}

function loginUser($username, $password){
    $mysqli = connect();

    if(!$mysqli){
        return FALSE;
    }

    $username = trim($username);
    $password = trim($password);

    if($username == "" || $password == ""){
        return "Entrambi i campi sono richiesti";
    }

    $username = filter_var($username, FILTER_UNSAFE_RAW);
    $password = filter_var($password, FILTER_UNSAFE_RAW); 

    $query = "SELECT idutente, username, password FROM utente WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if($data == NULL){
        return "Username o password errati";
    }

    if(password_verify($password, $data["password"]) == FALSE){
        return "Username o password errati";
    }
    else{
        $_SESSION["user"] = $data["username"];
        $_SESSION["idutente"] = $data["idutente"];
    }

}

function logoutUser(){
    session_destroy();
    echo "<script>window.location.href='login.php';</script>";
    //header("location: login.php");
    exit();
}

function deleteAccount(){
    $mysqli = connect();

    if(!$mysqli){
        return FALSE;
    }

    $queryUtente = "DELETE FROM utente WHERE idutente = ?";
    $queryProfilo = "DELETE FROM profilo WHERE utente = ?";
    //Rimozione utente seguito e seguace quando l'utente elimina l'account
    $querySeguito = "DELETE FROM followers WHERE seguito = ?";
    $querySeguitore = "DELETE FROM followers WHERE seguitore = ?";

    $stmtUtente = $mysqli->prepare($queryUtente);
    $stmtUtente->bind_param("i", $_SESSION["idutente"]);
    $stmtUtente->execute();

    $stmtProfilo = $mysqli->prepare($queryProfilo);
    $stmtProfilo->bind_param("i", $_SESSION["idutente"]);
    $stmtProfilo->execute();

    $stmtSeguito = $mysqli->prepare($querySeguito);
    $stmtSeguito->bind_param("i", $_SESSION["idutente"]);
    $stmtSeguito->execute();   
    
    $stmtSeguitore = $mysqli->prepare($querySeguitore);
    $stmtSeguitore->bind_param("i", $_SESSION["idutente"]);
    $stmtSeguitore->execute(); 

    if($stmtUtente->affected_rows != 1 || $stmtProfilo->affected_rows != 1){
        return "Si è verificato un errore. Per favore, riprova";
    }
    else{
        session_destroy();
        echo "<script>window.location.href='delete-account.php';</script>";
        //header("location: delete-account.php");
        exit;
    }
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";

    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}
?>