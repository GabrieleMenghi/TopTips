<h1 class="px-5 py-4"><?php echo $_SESSION["user"]?></h1>

<?php if(isset($templateParams["formmsg"])):?>
    <p><?php echo $templateParams["formmsg"]; ?></p>
<?php endif; ?>

<table class="mx-3">
    <tr>
        <th class="border-white border-2 px-3 py-3">Immagine profilo</th>
        <th class="border-white border-2 px-3 py-3">Informazioni personali</th>
        <th class="border-white border-2 px-3 py-3">Seguiti</th>
        <th class="border-white border-2 px-3 py-3">Seguaci</th>
    </tr>
    <!-- distinguo se è nuovo oppure no: se lo è allora metto un immagine di default -->
    <?php if($templateParams["profilo"]==null) :?>
    <tr class="border-white border-2">
        <td class="border-white border-2 px-1 py-2 text-center"><img src="./upload/fotoProfiloDefault.jpg" alt=""/></td>
        <td class="custom-font border-white border-2 py-2">Inserisci le tue informazioni</td>
        <td class="border-white border-2 py-2"><a href="elenco-utenti-seguiti.php"><?php foreach ($dbh->getNumberOfSeguitiById($_SESSION["idutente"]) as $num_seguiti) { echo $num_seguiti["num_seguiti"]; }?></a></td>
        <td class="border-white border-2 py-2"><a href="elenco-utenti-seguaci.php"><?php foreach ($dbh->getNumberOfSeguaciById($_SESSION["idutente"]) as $num_seguaci) { echo $num_seguaci["num_seguaci"]; }?></a></td>
    </tr>
    <?php else: ?>
        <?php foreach($templateParams["profilo"] as $profilo): ?>
        <tr class="border-white border-2">
            <td class="border-white border-2 px-1 py-2 text-center"><img src="<?php echo UPLOAD_DIR.$profilo["imgprofilo"]; ?>" alt="" style="max-width:100%;max-height:100%;"/></td>
            <td class="border-white border-2 py-2"><?php echo $profilo["datipersonali"]; ?></td>
            <td class="border-white border-2 py-2"><a href="elenco-utenti-seguiti.php"><?php foreach ($dbh->getNumberOfSeguitiById($_SESSION["idutente"]) as $num_seguiti) { echo $num_seguiti["num_seguiti"]; }?></a></td>
            <td class="border-white border-2 py-2"><a href="elenco-utenti-seguaci.php"><?php foreach ($dbh->getNumberOfSeguaciById($_SESSION["idutente"]) as $num_seguaci) { echo $num_seguaci["num_seguaci"]; }?></a></td>
        </tr>
        <?php endforeach; ?>
    <?php endif;?>
</table>

<?php if($templateParams["profilo"]==null) :?>
    <button class="bg-grey border-1">
        <a href="gestione-profilo.php?action=1&id=<?php echo $_SESSION["idutente"]; ?>">Inserisci profilo</a>
    </button>
<?php else: ?>
    <button class="bg-grey border-1">
        <a href="gestione-profilo.php?action=2&id=<?php echo $_SESSION["idutente"]; ?>">Modifica profilo</a>
    </button>
<?php endif;?>

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
            <img src="<?php echo UPLOAD_DIR.$post["file1"]; ?>" alt="" style="max-width:300px;max-height:170px;" />
            <img src="<?php echo UPLOAD_DIR.$post["file2"]; ?>" alt="" style="max-width:200px;max-height:170px;" />
            <img src="<?php echo UPLOAD_DIR.$post["file3"]; ?>" alt="" style="max-width:300px;max-height:170px;" />
            <img src="<?php echo UPLOAD_DIR.$post["file4"]; ?>" alt="" style="max-width:300px;max-height:170px;" />
        </td>
        <td class="border-white border-2">
            <a href="gestione-post.php?id=<?php echo $post["idpost"]; ?>">Cancella</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>