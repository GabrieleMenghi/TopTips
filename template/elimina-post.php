<div class="container-fluid">
    <form action="processa-post.php" method="POST" enctype="multipart/form-data">
        <h2>Elimina post</h2>
        <p class="pt-4">Sei sicuro di voler eliminare il post?</p>
        <ul>
            <li class="py-1">
                <input type="submit" name="submit" value="Conferma" />
                <a href="login.php">
                    <input type="button" name="submit" value="Annulla"></input>
                </a>
            </li>
        </ul>
        <input type="hidden" name="idpost" value="<?php echo $templateParams["parameter"]; ?>" />
    </form>
</div>