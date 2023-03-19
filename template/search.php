<div class="container-fluid">
    <h2>Risultati ricerca</h2>
    <div>
        <?php if(count($templateParams["utentiTrovati"])==0): ?>
            <p class="esitoricerca mt-5 py-2">Nessun risultato trovato!</p>
        <?php else: ?>
            <div class="d-flex justify-content-center">
                <ul class="ricercacontainer">
                    <?php foreach($templateParams["utentiTrovati"] as $ricerca): ?>
                        <?php if($ricerca["username"]!=$_SESSION["user"]): ?>
                            <div class="text-start">
                                <li class="py-4 ricercautente">
                                    <img src="<?php if(!isset($ricerca['imgprofilo'])) echo UPLOAD_DIR."fotoProfiloDefault.jpg";
                                    else echo UPLOAD_DIR.$ricerca['imgprofilo']; ?>" alt="Immagine profilo"/>
                                    <a class="linkutente" href="profilo-cercato.php?username=<?php echo $ricerca["username"];?>"><?php echo $ricerca["username"];?></a>
                                </li>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>