<div class="container-fluid">
    <h2>Lista utenti seguaci</h2>
    <div>
        <?php if(count($templateParams["seguaci"])==0): ?>
            <p class="esitoricerca mt-5 py-2">Nessun seguace!</p>
        <?php else: ?>
            <div class="d-flex justify-content-center">
                <ul class="ricercacontainer">
                    <?php foreach($templateParams["seguaci"] as $seguaci): ?>
                        <div class="text-start">
                            <li class="py-4 ricercautente">
                                <img src="<?php if(!isset($seguaci['imgprofilo'])) echo UPLOAD_DIR."fotoProfiloDefault.jpg";
                                else echo UPLOAD_DIR.$seguaci['imgprofilo']; ?>" alt="Immagine profilo"/>
                                <a class="linkutente" href="profilo-cercato.php?username=<?php echo $seguaci["username"];?>"><?php echo $seguaci["username"];?></a>
                            </li>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>