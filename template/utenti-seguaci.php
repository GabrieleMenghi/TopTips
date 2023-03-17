<div class="container">
    <h2 class="card-header">Lista utenti seguaci</h2>
    <div class="card-body">
        <?php if(count($templateParams["seguaci"])==0): ?>
            <h3 class="card-title">Qualcuno deve iniziare a seguirti!</h3>
        <?php else: ?>
            <ul class="list-group list-group-flush">
                <?php foreach($templateParams["seguaci"] as $seguaci): ?>
                    <li class="py-4 ricercautente">
                        <img src="<?php if(!isset($seguaci['imgprofilo'])) echo UPLOAD_DIR."fotoProfiloDefault.jpg";
                        else echo UPLOAD_DIR.$seguaci['imgprofilo']; ?>" alt="Immagine profilo"/>
                        <a class="text-dark text-decoration-underline" href="profilo-cercato.php?username=<?php echo $seguaci["username"];?>"><?php echo $seguaci["username"];?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>