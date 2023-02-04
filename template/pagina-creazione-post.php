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
            <label for="imagepicker">Scegli le immagini per il tuo post (min. 2 - max. 4):</label><input type="file" id="imagepicker" name="immagine" accept="image/png, image/jpeg" multiple>
            <h2 class="postcreationmessages" style="color: red; font-size: 18px;"></h2>
        </li>
        <li>
            <input class="submitpost" type="submit" name="submit" value="Inserisci post" />
        </li>
    </ul>
</form>