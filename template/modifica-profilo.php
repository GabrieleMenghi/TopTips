<?php 
    $profilo = $templateParams["profilo"];
?>

<!-- form che si diversifica se utente nuovo (e quindi crea profilo) o utente esistente (e quindi modifica) -->
<div class="container-fluid">
    <form action="processa-profilo.php" method="POST" enctype="multipart/form-data">
        <h2>Modifica profilo</h2>
        <?php if($profilo==null): ?>
        <p class="mt-3">Crea e modifica il tuo profilo a tuo piacimento!</p>
        <ul class="mt-4">
            <li class="d-flex justify-content-center">
                <div class="div-input-modifica">
                    <textarea id="datipersonali" name="datipersonali" class="input-modifica" placeholder="Inserire dati personali" required></textarea>
                    <label for="datipersonali" class="modifica-label">Dati personali</label>
                </div>
            </li>
            <li class="py-4 text-center">
                <label for="imgprofilo">Immagine profilo</label>
                <input type="file" name="imgprofilo" id="imgprofilo"/>
            </li>
            <li class="py-1">
                <label for="salvaprofilo" class="visually-hidden">Salva profilo</label>
                <input id="salvaprofilo" class="submitImage" type="submit" name="submit" value="Salva profilo" disabled/>
                <label for="annulla" class="visually-hidden">Annulla</label>
                <input id="annulla" type="button" name="submit" value="Annulla" onclick="location.href='login.php'" />
            </li>
        </ul>

        <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>" />

        <?php else: ?>
            <ul class="mt-5">
                <li class="d-flex justify-content-center">
                    <div class="div-input-modifica">
                        <textarea id="datipersonali" name="datipersonali" class="input-modifica"><?php echo $profilo["datipersonali"]; ?></textarea>
                        <label for="datipersonali" class="modifica-label">Dati personali</label>
                    </div>
                </li>
                <li class="py-4 text-center">
                    <label for="imgprofilo">Immagine profilo:</label>
                    <input type="file" name="imgprofilo" id="imgprofilo" />
                    <div class="mt-3 text-center">
                        <img class="profileimg text-center" src="<?php echo UPLOAD_DIR.$profilo["imgprofilo"]; ?>" alt="" />
                    </div>
                </li>
                <li class="py-1">
                    <label for="modificaprofilo" class="visually-hidden">Modifica profilo</label>
                    <input id="modificaprofilo" type="submit" name="submit" value="Modifica profilo" />
                    <a href="login.php">
                        <label for="annulla" class="visually-hidden">Annulla</label>
                        <input id="annulla" type="button" name="submit" value="Annulla" />
                    </a>
                </li>
            </ul>

            <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>" />
            <input type="hidden" name="idprofilo" value="<?php echo $profilo["idprofilo"]; ?>" />
            <input type="hidden" name="oldimg" value="<?php echo $profilo["imgprofilo"]; ?>" />
        <?php endif;?>
    </form>
</div>