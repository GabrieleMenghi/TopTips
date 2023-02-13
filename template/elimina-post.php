<form action="processa-post.php" method="POST" enctype="multipart/form-data">
    <h2>Elimina post</h2>
    <p class="pt-4">Sei sicuro di voler eliminare il post?</p>
    <ul>
        <li class="py-1">
            <input type="submit" name="submit" value="Conferma" />
            <button class="bg-grey border-1 mx-3"><a href="login.php">Annulla</a></button>
        </li>
    </ul>
    <input type="hidden" name="idpost" value="<?php echo $templateParams["parameter"]; ?>" />
</form>