<?php

function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function isUserLoggedIn(){
    return !empty($_SESSION["idutente"]);
}

function registerLoggedUser($user){
    $_SESSION["idutente"] = $user["idutente"];
    $_SESSION["username"] = $user["username"];
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

    if(strlen($password) > 50){
        return "Password troppo lunga";
    }

    if($password != $confirm_password){
        return "Password non corrisponde";
    }

    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO utente(email, username, password) VALUES(?,?,?)");
    $stmt->bind_param("sss", $email, $username, $password); //$hashed_password
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

    $username = filter_var($username, FILTER_UNSAFE_RAW); //FILTER_SANITIZE_STRING deprecata
    $password = filter_var($password, FILTER_UNSAFE_RAW); //FILTER_SANITIZE_STRING deprecata

    $query = "SELECT username, password FROM utente WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if($data == NULL){
        return "Username o password errati";
    }

    if(password_verify($password, $data["password"] == FALSE)){
        return "Username o password errati";
    }
    else{
        $_SESSION["user"] = $username;
    }

}

function logoutUser(){
    session_destroy();
    header("location: login.php");
    exit();
}

function deleteAccount(){
    $mysqli = connect();

    if(!$mysqli){
        return FALSE;
    }

    $query = "DELETE FROM utente WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $_SESSION["user"]);
    $stmt->execute();

    if($stmt->affected_rows != 1){
        return "Si è verificato un errore. Per favore, riprova";
    }
    else{
        session_destroy();
        header("location: delete-account.php");
        exit;
    }
}

?>