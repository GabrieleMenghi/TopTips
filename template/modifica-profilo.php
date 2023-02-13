<?php 
    $profilo = $templateParams["profilo"];
?>

<form action="processa-profilo.php" method="POST" enctype="multipart/form-data">
    <h2 class="pb-4">Modifica profilo</h2>
    <?php if($profilo==null): ?>
    <p>Crea e modifica il tuo profilo a tuo piacimento!</p>
    <ul>
        <li class="text-start">
            <label for="datipersonali">Dati personali:</label>
            <textarea id="datipersonali" name="datipersonali"></textarea>
        </li>
        <li class="py-4 text-start">
            <label for="imgprofilo">Immagine profilo</label>
            <input type="file" name="imgprofilo" id="imgprofilo" onchange="checkImage()"/>
            <p class="checkInsertImage text-center" style="color: red; font-size: 18px;"></p>  
        </li>
        <li class="py-1">
            <input class="submitImage" type="submit" name="submit" id="submitImage" value="Salva profilo" disabled />
            <button class="bg-grey border-1 mx-3"><a href="login.php">Annulla</a></button>
        </li>

        <script>
        function checkImage() {
            const input = document.getElementById("imgprofilo");
            const submitImage = document.getElementById("submitImage");
            const check = document.querySelector('.checkInsertImage');
            
            if (input.files.length > 0) {
            submitImage.removeAttribute("disabled");
            check.innerHTML="Puoi salvare!";
            } else {
            submitImage.setAttribute("disabled", "true");
            check.innerHTML="Inserire la foto profilo!";
            }
        }
        </script>

    </ul>

    <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>" />

    <?php else: ?>
        <ul>
            <li class="text-start">
                <label for="datipersonali">Dati personali:</label>
                <textarea id="datipersonali" name="datipersonali"><?php echo $profilo["datipersonali"]; ?></textarea>
            </li>
            <li class="py-4 text-start">
                <label for="imgprofilo">Immagine profilo</label>
                <input type="file" name="imgprofilo" id="imgprofilo" />
                <img src="<?php echo UPLOAD_DIR.$profilo["imgprofilo"]; ?>" alt="" />
            </li>         
            <li class="py-1">
                <input type="submit" name="submit" value="Modifica profilo" />
                <button class="bg-grey border-1 mx-3"><a href="login.php">Annulla</a></button>
            </li>       
        </ul>

        <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>" />
        <input type="hidden" name="idprofilo" value="<?php echo $profilo["idprofilo"]; ?>" />
        <input type="hidden" name="oldimg" value="<?php echo $profilo["imgprofilo"]; ?>" />
    <?php endif;?>
</form>
