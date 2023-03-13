<?php

if(count($templateParams["utentiTrovati"])==0){ ?>
    <h2 class="pt-4">Nessun risultato trovato</h2>
<?php
}
else{
    foreach($templateParams["utentiTrovati"] as $ricerca): ?>
    <h3>
        <?php if($ricerca["username"]==$_SESSION["user"]):
        ?>
        <?php else: ?>
            <p class="py-2"><a href="profilo-cercato.php?username=<?php echo $ricerca["username"];?>"><?php echo $ricerca["username"];?></a></p>
        <?php endif; ?>
    </h3>
<?php endforeach;
}

?>