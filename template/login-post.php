<h1 class="px-5 py-4"><?php echo $_SESSION["user"]?></h1>

<?php if(isset($templateParams["formmsg"])):?>
    <p><?php echo $templateParams["formmsg"]; ?></p>
<?php endif; ?>

<div class="col-11 mx-3 my-3">
    <table class="table border">
        <tr>
            <th class="border-white border-2 py-3">Immagine profilo</th>
            <th class="border-white border-2 py-3">Informazioni personali</th>
            <th class="border-white border-2 py-3">Seguiti</th>
            <th class="border-white border-2 py-3">Seguaci</th>
        </tr>
        <!-- distinguo se è nuovo oppure no: se lo è allora metto un immagine di default -->
        <tr class="border-white border-2">
        <?php if($templateParams["profilo"]==null) :?>
            <td class="border-white border-2 text-center align-middle"><img src="./upload/fotoProfiloDefault.jpg" style="max-width:100%;max-height:100%;" alt="Foto profilo" class="profileimg"/></td>
            <td class="custom-font border-white border-2 text-center align-middle">Inserisci le tue informazioni</td>
        <?php else: ?>
            <?php foreach($templateParams["profilo"] as $profilo): ?>
                <td class="border-white border-2 text-center align-middle"><img src="<?php echo UPLOAD_DIR.$profilo["imgprofilo"]; ?>" alt="Foto profilo" style="max-width:100%;max-height:100%;" class="profileimg"/></td>
                <td class="border-white border-2 text-center align-middle"><?php echo $profilo["datipersonali"]; ?></td>
            <?php endforeach; ?>
        <?php endif;?>
            <td class="border-white border-2 text-center align-middle"><a class="text-dark fw-bold" href="elenco-utenti-seguiti.php"><?php foreach ($dbh->getNumberOfSeguitiById($_SESSION["idutente"]) as $num_seguiti) { echo $num_seguiti["num_seguiti"]; }?></a></td>
            <td class="border-white border-2 text-center align-middle"><a class="text-dark fw-bold" href="elenco-utenti-seguaci.php"><?php foreach ($dbh->getNumberOfSeguaciById($_SESSION["idutente"]) as $num_seguaci) { echo $num_seguaci["num_seguaci"]; }?></a></td>
        </tr>
    </table>
</div>

<?php if($templateParams["profilo"]==null) :?>
    <a href="gestione-profilo.php?action=1&id=<?php echo $_SESSION["idutente"]; ?>">
        <input type="submit" name="submit" value="Inserisci profilo"></input>
    </a>
<?php else: ?>
    <a href="gestione-profilo.php?action=2&id=<?php echo $_SESSION["idutente"]; ?>">
        <input type="submit" name="submit" value="Modifica profilo"></input>
    </a>
<?php endif;?>

<h2 class="py-4">Post personali</h2>

<div class="col-11 mx-3 mb-5">
    <table class="table border">
        <tr>
            <th class="border-white border-2 py-3">Domanda / Consiglio</th>
            <th class="border-white border-2 py-3">Immagini</th>
            <th class="border-white border-2 py-3">Gestisci</th>
        </tr>
        <?php foreach($templateParams["post"] as $post): ?>
        <tr class="border-white border-2">
            <td class="border-white border-2 text-center align-middle"><?php echo $post["titolopost"]; ?></td>
            <td class="py-2">
                <div class="profileimages" style="max-width:300px;max-height:170px;">
                    <img src="<?php echo UPLOAD_DIR.$post["file1"]; ?>" alt="<?php echo $post["desc1"]; ?>" style="max-width:300px;max-height:170px;"/>
                    <div class="text-center"><?php echo $post["votes1"] . " voti"; ?></div>
                </div>
                <div class="profileimages" style="max-width:300px;max-height:170px;">
                    <img src="<?php echo UPLOAD_DIR.$post["file2"]; ?>" alt="<?php echo $post["desc2"]; ?>" style="max-width:300px;max-height:170px;"/>
                    <div class="text-center"><?php echo $post["votes2"] . " voti"; ?></div>
                </div>
                <div class="profileimages" <?php if(!isset($post["file3"])) echo "style='display: none;'"; else echo "style='max-width:300px;max-height:170px;'";?>>
                    <img src="<?php echo UPLOAD_DIR.$post["file3"]; ?>" alt="<?php echo $post["desc3"]; ?>" style="max-width:300px;max-height:170px;"/>
                    <div class="text-center"><?php echo $post["votes3"] . " voti"; ?></div>
                </div>
                <div class="profileimages" <?php if(!isset($post["file4"])) echo "style='display: none;'"; else echo "style='max-width:300px;max-height:170px;'";?> >
                    <img src="<?php echo UPLOAD_DIR.$post["file4"]; ?>" alt="<?php echo $post["desc4"]; ?>" style="max-width:300px;max-height:170px;"/>
                    <div class="text-center"><?php echo $post["votes4"] . " voti"; ?></div>
                </div>
            </td>
            <td class="border-white border-2 text-center align-middle">
                <a href="gestione-post.php?id=<?php echo $post["idpost"]; ?>">Cancella</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>