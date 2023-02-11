<?php

if(count($templateParams["utentiTrovati"])==0){ ?>
    <h2>Nessun risultato trovato</h2>
<?php
}
else{
    foreach($templateParams["utentiTrovati"] as $ricerca): ?>
    <h2><?php echo $ricerca["username"];?></h2>
<?php endforeach;
}

?>