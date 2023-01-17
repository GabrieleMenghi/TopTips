<?php

if(!isset($_SESSION["user"])){
    header("location: login.php");
    exit();
}

if(isset($_GET["logout"])){
    logoutUser();
}

if(isset($_GET["confirm-account-deletion"])){
    deleteAccount();
}

?>
<div class="py-4">
    <h1>Benvenuto, <?php echo $_SESSION["user"]?></h1>

    <p class="mx-5 py-1">
        Questa pagina è visibile solo se si è loggati.
        Una volta loggati allora si permetterà all'utente la possibilità di effettuare logout o, alla peggio,
        di eliminare il proprio account.
    </p>

    <p>
        <a href="?logout">Logout</a>
    </p>
    
    <?php
        if(isset($_GET["delete-account"])){
            ?>
                <p class="confirm-deletion">
                    Sei sicuro di voler eliminare il tuo account?
                    <a class="confirm-deletion" href="?confirm-account-deletion">Elimina account</a>
                </p>
            <?php
        }
        else{
            ?>
                <a href="?delete-account">Elimina account</a>
            <?php
        }
    ?>
    
</div>