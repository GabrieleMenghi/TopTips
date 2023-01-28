<h1 class="px-5 py-4"><?php echo $_SESSION["user"]?></h1>

<?php if(isset($templateParams["formmsg"])):?>
    <p><?php echo $templateParams["formmsg"]; ?></p>
<?php endif; ?>

<table class="mx-3">
    <tr>
        <th class="border-white border-2 px-3 py-3">Immagine profilo</th>
        <th class="border-white border-2 px-3 py-3">Seguiti</th>
        <th class="border-white border-2 px-3 py-3">Seguaci</th>
    </tr>
    <?php foreach($templateParams["profilo"] as $profilo): ?>
    <tr class="border-white border-2">
        <td class="img border-white border-2 px-1 py-2 text-start"><img src="<?php echo UPLOAD_DIR.$profilo["imgprofilo"]; ?>" alt="" />
            Qui si troveranno tutte le "caratteristiche" dell'utente
        </td>
        <td class="border-white border-2 py-2">Numero seguiti</td>
        <td class="border-white border-2 py-2">Numero seguaci</td>
    </tr>
    <?php endforeach; ?>
</table>

<button class="bg-grey border-1"> <!-- mi serve prendere l'id dell'utente per permettergli la modifica del profilo -->
    <a href="modifica-profilo.php?id=<?php echo $_SESSION["idutente"]; ?>">Modifica profilo</a>
</button>

<h2 class="py-4">Post personali</h2>

<table class="mx-3 mb-5">
    <tr>
        <th class="border-white border-2 px-3 py-3">Domanda / Consiglio</th>
        <th class="border-white border-2 px-2 py-3">Immagini</th>
        <th class="border-white border-2 px-2 py-3">Gestisci</th>
    </tr>
    <?php foreach($templateParams["post"] as $post): ?>
    <tr class="border-white border-2">
        <td class="border-white border-2"><?php echo $post["titolopost"]; ?></td>
        <td class="border-white border-2 py-2">
            <img src="<?php echo UPLOAD_DIR.$post["file1"]; ?>" alt="" />
            <img src="<?php echo UPLOAD_DIR.$post["file2"]; ?>" alt="" />
            <img src="<?php echo UPLOAD_DIR.$post["file3"]; ?>" alt="" />
            <img src="<?php echo UPLOAD_DIR.$post["file4"]; ?>" alt="" />
        </td>
        <td class="border-white border-2">
            <a href="gestione-post.php?id=<?php echo $post["idpost"]; ?>">Cancella</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>