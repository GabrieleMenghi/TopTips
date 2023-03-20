<div class="container-fluid">
    <form action="#" method="POST" autocomplete="off">
        <h2>Accedi</h2>  
        <p class="py-2 error"><?php echo @$response ?></p>    
        <p>Per favore riempi questi campi per accedere al tuo account</p>
        <div class="py-1">
            <div class="div-input-post">
                <input id="username" type="text" name="username" value="<?php echo @$_POST['username']; ?>" class="input-post" placeholder="Inserisci il tuo username" required/>
                <label for="username" class="post-label">Username</label>
            </div>
            <div class="div-input-post">
                <input id="password" type="password" name="password" value="<?php echo @$_POST['password']; ?>" class="input-post" placeholder="Inserisci la tua password" required/>
                <label for="password" class="post-label">Password</label>
            </div>
        </div>
        <input type="submit" name="submit" value="Invia"></input>
        <p class="pt-3">
            Nessun account?
            <a href="registrazione.php">Creane uno!</a>
        </p>
    </form>
</div>