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

<div class="container-fluid">
    <h2><?php echo $_SESSION["user"]; ?>, stai per uscire da TopTips!</h2>

    <p class="mt-4">
        Cliccando su logout ti disconnetterai da TopTips.
    </p>
    <p class="mt-2">
        Se lo ritieni necessario, puoi eliminare il tuo account ma perderai tutto ciò che avevi creato.
    </p>

    <p>
        <a href="?logout">Logout</a>
    </p>
    
    <?php if(isset($_GET["delete-account"])): ?>
        <p>
            Sei sicuro di voler eliminare il tuo account?
            <a href="?confirm-account-deletion">Elimina account</a>
        </p>
    <?php else: ?>
        <a href="?delete-account">Elimina account</a>
    <?php endif; ?>
</div>