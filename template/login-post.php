<h1><?php echo $_SESSION["user"]; ?></h1>

<?php if(isset($templateParams["formmsg"])):?>
    <p class="py-2 success"><?php echo $templateParams["formmsg"]; ?></p>
<?php endif; ?>

<div class="d-flex justify-content-center">
    <div class="col-11 pt-2 my-3">
        <table class="table">
            <thead>
                <tr>
                    <th id="img_profilo" scope="col" class="border-white border-2 py-3">Immagine profilo</th>
                    <th id="info_personali" scope="col" class="border-white border-2 py-3">Informazioni personali</th>
                    <th id="seguiti" scope="col" class="border-white border-2 py-3">Seguiti</th>
                    <th id="seguaci" scope="col" class="border-white border-2 py-3">Seguaci</th>
                </tr>
            </thead>
            <!-- Distinzione se utente nuovo oppure no: se lo è allora vi sarà un immagine di profilo di default -->
            <tbody>
                <tr class="border-white border-2">
                    <?php if($templateParams["profilo"]==null) :?>
                        <td headers="img_profilo" class="border-white border-2 text-center align-middle"><img src="./upload/fotoProfiloDefault.jpg" style="max-width:100%;max-height:100%;" alt="Foto profilo" class="profileimg"/></td>
                        <td headers="info_personali" class="custom-font border-white border-2 text-center align-middle">Inserisci le tue informazioni</td>
                    <?php else: ?>
                        <?php foreach($templateParams["profilo"] as $profilo): ?>
                            <td headers="img_profilo" class="border-white border-2 text-center align-middle"><img src="<?php echo UPLOAD_DIR.$profilo["imgprofilo"]; ?>" alt="Foto profilo" style="max-width:100%;max-height:100%;" class="profileimg"/></td>
                            <td headers="info_personali" class="border-white border-2 text-center align-middle"><?php echo nl2br($profilo["datipersonali"]); ?></td>
                        <?php endforeach; ?>
                    <?php endif; ?>
                        <td headers="seguiti" class="border-white border-2 text-center align-middle"><a style="font-size: 18px" href="elenco-utenti-seguiti.php"><?php foreach ($dbh->getNumberOfSeguitiById($_SESSION["idutente"]) as $num_seguiti) { echo $num_seguiti["num_seguiti"]; }?></a></td>
                        <td headers="seguaci" class="border-white border-2 text-center align-middle"><a style="font-size: 18px" href="elenco-utenti-seguaci.php"><?php foreach ($dbh->getNumberOfSeguaciById($_SESSION["idutente"]) as $num_seguaci) { echo $num_seguaci["num_seguaci"]; }?></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php if($templateParams["profilo"]==null) :?>
    <a href="gestione-profilo.php?action=1&id=<?php echo $_SESSION["idutente"]; ?>">
    <label for="inserisciprofilo" class="visually-hidden">Inserisci profilo</label>
    <input id="inserisciprofilo" type="submit" name="submit" value="Inserisci profilo" />
    </a>
<?php else: ?>
    <a href="gestione-profilo.php?action=2&id=<?php echo $_SESSION["idutente"]; ?>">
    <label for="modificaprofilo" class="visually-hidden">Modifica profilo</label>
    <input id="modificaprofilo" type="submit" name="submit" value="Modifica profilo" />
    </a>
<?php endif;?>

<h2 class="mt-3 py-3">Post personali</h2>

<div class="d-flex justify-content-center">
    <div class="col-11 mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th id="domanda_consiglio" scope="col" class="border-white border-2 py-3">Domanda / Consiglio</th>
                    <th id="images" scope="col" class="border-white border-2 py-3">Immagini</th>
                    <th id="gestione" scope="col" class="border-white border-2 py-3">Gestisci</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($templateParams["post"] as $post): ?>
                    <tr class="border-white border-2">
                        <th id="domanda_consiglio_testo<?php echo $post['idpost']; ?>" headers="domanda_consiglio" scope="row" class="border-white border-2 text-center align-middle"><?php echo $post["titolopost"]; ?></th>
                        <td headers="images domanda_consiglio_testo<?php echo $post['idpost']; ?>" class="py-2">
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
                        <td headers="gestione" class="border-white border-2 text-center align-middle">
                            <a href="gestione-post.php?id=<?php echo $post["idpost"]; ?>">Cancella</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>