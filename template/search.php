<?php

if(count($templateParams["utentiTrovati"])==0){ ?>
    <h2 class="py-3">Nessun risultato trovato</h2>
<?php
}
else{
    foreach($templateParams["utentiTrovati"] as $ricerca): ?>
    <h2> 
        <?php if($ricerca["username"]==$_SESSION["user"]):
        ?>
        <?php else: ?>
            <a href="profilo.php?username=<?php echo $ricerca["username"];?>"><?php echo $ricerca["username"];?></a>
        <?php endif; ?>
    </h2>
<?php endforeach;
}

?>