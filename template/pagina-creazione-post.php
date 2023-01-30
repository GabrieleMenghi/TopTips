<form action="pagina-creazione-post.php" method="POST" enctype="multipart/form-data">
    <h1>Inserisci un nuovo post</h1>
    <ul>
        <li>
            <label for="titolo">Inserisci il titolo del consiglio</label><input type="text" id="titolo" name="titolo"/>
        </li>
        <li>
            <label for="testopost">Testo post:</label><textarea id="testopost" name="testopost" cols="50"></textarea>
        </li>
        <li>
            <label for="numeropost">Numero di post (min. 2 - max. 4):</label><input type="number" id="numeropost" name="numeropost" min="2" max="4" value="2" />
        </li>
        <li>
            <label for="immagine">Scegli una immagine</label><input type="file" id="immagine" name="immagine" accept="image/png, image/jpeg">
        </li>
        <!--<li>
            <label for="anteprimaarticolo">Anteprima Articolo:</label><textarea id="anteprimaarticolo" name="anteprimaarticolo"></textarea>
        </li>-->
        <li>
            <input type="submit" name="submit" value="Inserisci post" />
        </li>
    </ul>
        <!--</*?php if($templateParams["azione"]!=1): ?>
        <input type="hidden" name="idarticolo" value="</*?php echo $articolo["idarticolo"]; ?>" />
        <input type="hidden" name="categorie" value="</*?php echo implode(",", $articolo["categorie"]); ?>" />
        <input type="hidden" name="oldimg" value="</*?php echo $articolo["imgarticolo"]; ?>" />
        </*?php endif;?>
        -->
</form>