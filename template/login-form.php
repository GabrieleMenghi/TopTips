<form action="#" method="POST" autocomplete="off">
    <h2>Accedi</h2>
    
    <?php if(isset($templateParams["errorelogin"])): ?>
    <p class="error py-1"><?php echo $templateParams["errorelogin"]; ?></p>
    <?php endif; ?>

    <p class="error"><?php echo @$response ?></p>
    
    <p class="py-2">Per favore riempi questi campi per accedere al tuo account</p>

    <div class="grid text-start py-1">
        <div>
            <label class="col-5 text-end" for="username">Username</label>
            <input type="text" name="username" value="<?php echo @$_POST['username']; ?>">
        </div>
        <div class="pt-3">
            <label class="col-5 text-end" for="password">Password</label>
            <input type="password" name="password" value="<?php echo @$_POST['password']; ?>">
        </div>
    </div>

    <button type="submit" name="submit">Invia</button>

    <p>
        Nessun account?
        <a href="registrazione.php">Creane uno!</a>
    </p>

    <p>
        <a href="forgot-password.php">Password dimenticata?</a>
    </p>

</form>