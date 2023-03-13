<form action="utils/ricezione-post.php" method="POST" enctype="multipart/form-data">
    <h1>Inserisci un nuovo post</h1>
    <p class="success"><?php if(isset($templateParams["formmsg"])) echo $templateParams["formmsg"]; ?></p>
    <ul>
        <li>
            <div class="div-input-post">
                <input type="hidden" name="user" value="<?php echo $_SESSION["idutente"]; ?>"/>
                <input type="text" id="titolo" name="titolo" class="input-post" placeholder="Inserisci il titolo del consiglio" autocomplete="off" required/>
                <label for="titolo" class="post-label">Titolo post</label>
            </div>
        </li>
        <li>
            <div class="div-input-post">
                <input type="text" id="testopost" name="testopost" class="input-post" placeholder="Inserisci il testo del consiglio" autocomplete="off" required/>
                <label for="testopost" class="post-label">Testo post</label>
            </div>
        </li>
        <li>
            <div class="div-filepicker">
                <label for="imagepicker">Scegli le immagini per il tuo post (min. 2 - max. 4):</label>
                <input type="file" id="imagepicker" name="imagepicker[]" accept="image/png, image/jpeg" multiple required>
            </div>
        </li>
        <li class="previews">

        </li>
        <li>
            <input class="submitpost mt-4" type="submit" name="submit" value="Inserisci post" disabled/>
            <br>
            <br>
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
                imagepreviews.innerHTML += 
                "<div class='d-flex justify-content-center'>" +
                "<img src='upload/" + files[i].name + "' class='image-preview' style='background-color: white; border: 2px solid #040470; margin: 2%; width: 200px; height: 170px; object-fit: scale-down;'/>" +
                "<div class='div-input-description'>" +
                "<input id='image" + i + "' type='text' name='imagedescription" + i + "' placeholder='Inserisci una descrizione per l`immagine' class='input-description' required/>" +
                "<label for='image" + i + "' class='description-label'>Descrizione</label></div>" +
                "<input type='hidden' name='image" + i + "' value='" + files[i].name + "'/></div><br>";
            }
        }
        
        let files2 = filepicker.files;
        const previews = document.querySelectorAll('.image-preview');
        for (let i = 0; i < n; i++) {
            let reader = new FileReader();
            reader.readAsDataURL(files2[i]);
            reader.onload = function () {
                previews[i].src = reader.result;
            }
        }
    });

</script>