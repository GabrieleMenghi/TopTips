<div class="container-fluid">
    <form action="processa-post.php" method="POST" enctype="multipart/form-data">
        <h2>Elimina post</h2>
        <p class="pt-4">Sei sicuro di voler eliminare il post?</p>
        <ul>
            <li class="py-1 me-4">
                <label for="conferma" class="visually-hidden">Conferma:</label>
                <input id="conferma" type="submit" name="submit" value="Conferma" />
                <a href="login.php">
                    <label for="annulla" class="visually-hidden">Annulla:</label>
                    <input id="annulla" type="button" name="submit" value="Annulla" />
                </a>
            </li>
        </ul>
        <input type="hidden" name="idpost" value="<?php echo $templateParams["numeroIdPost"]; ?>" />
    </form>
</div>