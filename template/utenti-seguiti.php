<div class="container-fluid">
    <h2>Lista utenti seguiti</h2>
    <div>
        <?php if(count($templateParams["seguiti"])==0): ?>
            <p class="esitoricerca mt-5 py-2">Nessun utente seguito!</p>
        <?php else: ?>
            <div class="d-flex justify-content-center">
                <ul class="ricercacontainer">
                    <?php foreach($templateParams["seguiti"] as $seguiti): ?>
                        <div class="text-start">
                            <li class="py-4 ricercautente">
                                <img src="<?php if(!isset($seguiti['imgprofilo'])) echo UPLOAD_DIR."fotoProfiloDefault.jpg";
                                else echo UPLOAD_DIR.$seguiti['imgprofilo']; ?>" alt="Immagine profilo"/>
                                <a class="linkutente" href="profilo-cercato.php?username=<?php echo $seguiti["username"];?>"><?php echo $seguiti["username"];?></a>
                            </li>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>