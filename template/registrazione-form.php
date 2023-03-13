<form action="#" method="POST" autocomplete="off">
    <h2>Crea account</h2>
    
    <?php
    if(isset($_POST['submit'])){
        $response = registerUser($_POST['email'], $_POST['username'], $_POST['password'], $_POST['confirm-password']);
    }
    ?>
    
    <?php
    if(@$response == "success"){
        ?>
            <p class="success py-2">Registrazione avvenuta con successo! <a href="login.php">Login qui</a></p>
        <?php
    }else{
        ?>
            <p class="error py-2"><?php echo @$response; ?></p>
        <?php
    }
    ?>

    <p>Riempi tutti questi campi per creare un account.</p>

    <div class="py-1">
        <div class="div-input-post">
            <input id="email" type="text" name="email" value="<?php echo @$_POST['email']; ?>" class="input-post" placeholder="Inserisci la tua mail" required/>
            <label for="email" class="post-label">Email*</label>
        </div>
        <div class="div-input-post">
            <input id="username" type="text" name="username" value="<?php echo @$_POST['username']; ?>" class="input-post" placeholder="Inserisci uno username" required/>
            <label for="username" class="post-label">Username*</label>
        </div>
        <div class="div-input-post">
            <input id="password" type="password" name="password" value="<?php echo @$_POST['password']; ?>" class="input-post" placeholder="Inserisci una password" required/>
            <label for="password" class="post-label">Password*</label>
        </div>
        <div class="div-input-post">
            <input id="confirm-password" type="password" name="confirm-password" value="<?php echo @$_POST['confirm-password']; ?>" class="input-post" placeholder="Conferma la password inserita" required/>
            <label for="confirm-password" class="post-label">Conferma Password*</label>
        </div>
    </div>

    <input type="submit" name="submit" value="Invia"></input>
    
    <p class="pt-3">
        Hai già un account? 
        <a href="login.php">Login qui</a>
    </p>

</form>