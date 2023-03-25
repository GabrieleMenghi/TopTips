<div class="container-fluid">
    <?php if(empty($templateParams["keyword"])): ?>
        <h2>Risultati ricerca</h2>
    <?php else: ?> 
        <h2>Risultati ricerca per: "<?php echo $templateParams["keyword"]; ?>"</h2>
    <?php endif; ?>

    <div class="d-flex justify-content-center">
        <?php if(count($templateParams["utentiTrovati"]) > 0): ?>
            <ul class="ricercacontainer">
                <?php foreach($templateParams["utentiTrovati"] as $utente): ?>
                    <?php if($utente["username"] != $_SESSION["user"]): ?>
                        <div class="text-start">
                            <li class="py-4 ricercautente">
                                <img src="<?php if(!isset($utente["imgprofilo"])) echo UPLOAD_DIR."fotoProfiloDefault.jpg"; else echo UPLOAD_DIR.$utente["imgprofilo"]; ?>" alt="Immagine profilo"/>
                                <a class="linkutente" href="profilo-cercato.php?username=<?php echo $utente["username"];?>"><?php echo $utente["username"];?></a>
                            </li>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="esitoricerca mt-5 py-2">Nessun utente trovato!</p>
        <?php endif; ?>
    </div>
</div>