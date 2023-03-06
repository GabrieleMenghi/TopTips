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
        <div class="col-12">
            <label for="Email">Email*</label>
            <input type="email" name="email" value="<?php echo @$_POST['email']; ?>" required>
        </div>
        <div class="col-12 pt-3">
            <label for="Username">Username*</label>
            <input type="text" name="username" value="<?php echo @$_POST['username']; ?>" required>
        </div>
        <div class="col-12 pt-3">
            <label for="Password">Password*</label>
            <input type="password" name="password" value="<?php echo @$_POST['password']; ?>" required>
        </div>
        <div class="col-12 py-3">
            <label for="Confirm Password">Conferma Password*</label>
            <input type="password" name="confirm-password" value="<?php echo @$_POST['confirm-password']; ?>" required>
        </div>
    </div>

    <input type="submit" name="submit" value="Invia"></input>
    
    <p class="pt-3">
        Hai già un account? 
        <a href="login.php">Login qui</a>
    </p>

</form>