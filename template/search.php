<div class="container">
    <h2 class="card-header">Risultati ricerca</h2>
    <div class="card-body">
        <?php if(count($templateParams["utentiTrovati"])==0): ?>
            <h3 class="card-title">Nessun risultato trovato!</h3>
        <?php else: ?>
            <ul class="list-group list-group-flush">
                <?php foreach($templateParams["utentiTrovati"] as $ricerca): ?>
                    <?php if($ricerca["username"]==$_SESSION["user"]): ?>
                        <!-- non mi devo autocercare --> 
                    <?php else: ?>
                        <li class="py-4 ricercautente">
                            <img src="<?php echo UPLOAD_DIR.$ricerca['imgprofilo']; ?>" alt="Immagine profilo"/>
                            <a class="text-dark text-decoration-underline" href="profilo-cercato.php?username=<?php echo $ricerca["username"];?>"><?php echo $ricerca["username"];?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>