<form action="template/ricezione-post.php" method="POST" enctype="multipart/form-data">
    <h1>Inserisci un nuovo post</h1>
    <p class="success"><?php if(isset($templateParams["formmsg"])) echo $templateParams["formmsg"]; ?></p>
    <ul>
        <li>
            <input type="hidden" name="user" value="<?php echo $_SESSION["idutente"]; ?>"/>
            <label for="titolo">Inserisci il titolo del consiglio</label><input type="text" id="titolo" name="titolo"/>
        </li>
        <li>
            <label for="testopost">Testo post:</label><input type="text" id="testopost" name="testopost" cols="50"></input>
        </li>
        <li>
            <label for="imagepicker">Scegli le immagini per il tuo post (min. 2 - max. 4):</label><input type="file" id="imagepicker" name="imagepicker[]" accept="image/png, image/jpeg" multiple required>
            <h2 class="postcreationmessages" style="color: red; font-size: 18px;"></h2>
        </li>
        <li class="previews">

        </li>
        <li>
            <input class="submitpost" type="submit" name="submit" value="Inserisci post" />
        </li>
    </ul>
</form>

<script>
    const filepicker = document.getElementById('imagepicker');
    const imagepreviews = document.querySelector('.previews');

    filepicker.addEventListener("change", () => {
        imagepreviews.innerHTML = "";
        let n = filepicker.files.length;
        let files = filepicker.files;
        if(n >= 2 && n <= 4){
            for (let i = 0; i < n; i++) {
                imagepreviews.innerHTML += "<img src='upload/" + files[i].name + "' style='background-color: white; border: 2px solid #040470; margin: 2%; width: 200px; height: 170px; object-fit: scale-down;'/><input type='text' name='imagedescription" + i + "' size='40' placeholder='Inserisci una descrizione per l`immagine'><input type='hidden' name='image" + i + "' value='" + files[i].name + "'/><br>";
            }
        }
    });
</script>