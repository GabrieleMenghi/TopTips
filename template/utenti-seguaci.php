<h2>Lista utenti seguaci:</h2>
<?php

if(count($templateParams["seguaci"])==0){ ?>
    <h2 class="pt-4">Qualcuno deve iniziare a seguirti!</h2>
<?php
}
else{
    foreach($templateParams["seguaci"] as $seguaci): ?>
    <h3> 
        <p class="py-2"><a href="profilo-cercato.php?username=<?php echo $seguaci["username"];?>"><?php echo $seguaci["username"];?></a></p>
    </h3>
<?php endforeach;
}

?>