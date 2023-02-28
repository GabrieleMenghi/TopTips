<h2>Lista utenti seguiti:</h2>
<?php

if(count($templateParams["seguiti"])==0){ ?>
    <h2 class="pt-4">Inizia a seguire qualche utente!</h2>
<?php
}
else{
    foreach($templateParams["seguiti"] as $seguiti): ?>
    <h3> 
        <p class="py-2"><a href="profilo-cercato.php?username=<?php echo $seguiti["username"];?>"><?php echo $seguiti["username"];?></a></p>
    </h3>
<?php endforeach;
}

?>