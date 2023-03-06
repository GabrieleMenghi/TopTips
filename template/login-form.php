<form action="#" method="POST" autocomplete="off">
    <h2>Accedi</h2>
    
    <p class="error"><?php echo @$response ?></p>
    
    <p class="py-2">Per favore riempi questi campi per accedere al tuo account</p>

    <div class="py-1">
        <div class="col-12">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo @$_POST['username']; ?>">
        </div>
        <div class="col-12 py-3">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo @$_POST['password']; ?>">
        </div>
    </div>

    <input type="submit" name="submit" value="Invia"></input>

    <p class="pt-3">
        Nessun account?
        <a href="registrazione.php">Creane uno!</a>
    </p>

</form>