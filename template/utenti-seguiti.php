<div class="container">
    <h2 class="card-header">Lista utenti seguiti</h2>
    <div class="card-body">
        <?php if(count($templateParams["seguiti"])==0): ?>
            <h3 class="card-title">Inizia a seguire qualche utente!</h3>
        <?php else: ?>
            <ul class="list-group list-group-flush">
                <?php foreach($templateParams["seguiti"] as $seguiti): ?>
                    <li class="py-4 ricercautente"> 
                        <a class="text-dark text-decoration-underline" href="profilo-cercato.php?username=<?php echo $seguiti["username"];?>"><?php echo $seguiti["username"];?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>