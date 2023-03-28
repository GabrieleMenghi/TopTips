<h1><?php echo $templateParams["username"]; ?></h1>

<?php 
$seguitore = $_SESSION["user"];
$id["seguitore"] = $dbh->getIdByUsername($seguitore);
$seguito = $templateParams["username"];
$id["seguito"] = $dbh->getIdByUsername($seguito);

foreach ($id["seguitore"] as $seguitore) {
    foreach ($id["seguito"] as $seguito) {
        $idseguitore = $seguitore["idutente"];
        $idseguito = $seguito["idutente"];
    }
}
?>

<?php if($idseguito != $_SESSION["idutente"]): ?>

    <label for="followutente" class="visually-hidden">Follow utente</label>
    <input id="followutente" class="btnfollow py-2 my-3" type="submit" name="follow" value="<?php if ($dbh->isFollowing($idseguito, $idseguitore)) { echo "Smetti di seguire"; } else { echo "Segui"; } ?>" 
    style="<?php if ($dbh->isFollowing($idseguito, $idseguitore)) { echo "background:red"; } else { echo "background:green"; } ?>" />
    <input type="hidden" id="seguitore" name="seguitore" value="<?php echo $idseguitore; ?>" />
    <input type="hidden" id="seguito" name="seguito" value="<?php echo $idseguito; ?>" />

    <script>
        const btnFollow = document.querySelector(".btnfollow");
        const seguitore = document.querySelector("#seguitore");
        const seguito = document.querySelector("#seguito");

        btnFollow.addEventListener("click", ()=>{
            var xhttp = new XMLHttpRequest();
            let parameters = "seguitore=" + seguitore.value + "&seguito=" + seguito.value;
            
            xhttp.open("POST", "utils/following.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Aggiorna il valore del pulsante
                    if (btnFollow.value == "Segui") {
                        btnFollow.value = "Smetti di seguire";
                        btnFollow.style.background = "red";
                    } else {
                        btnFollow.value = "Segui";
                        btnFollow.style.background = "green";
                    }
                }
            };

            xhttp.send(parameters);
            
            //Inserimento notifica su database
            if(btnFollow.value == "Segui"){
                var xhttpnot = new XMLHttpRequest();
                let parametersnot = "tiponotifica=follow&utentenotificante=" + seguitore.value + "&utentenotificato=" + seguito.value;
                
                xhttpnot.open("POST", "utils/inserisci-notifica.php", true);
                xhttpnot.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttpnot.send(parametersnot);
            }
            document.location.reload(true);
        });

    </script>

<?php else: header("location: login.php"); exit(); ?>

<?php endif; ?>

<div class="d-flex justify-content-center">
    <div class="col-11">
        <table class="table">
            <thead>
                <tr>
                    <th id="img_profilo" scope="col" class="border-white border-2 py-3">Immagine profilo</th>
                    <th id="info_personali" scope="col" class="border-white border-2 py-3">Informazioni personali</th>
                    <th id="seguiti" scope="col" class="border-white border-2 py-3">Seguiti</th>
                    <th id="seguaci" scope="col" class="border-white border-2 py-3">Seguaci</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-white border-2">
                    <?php if($templateParams["profilo"]==null) :?>
                        <td headers="img_profilo" class="border-white border-2 text-center align-middle"><img src="./upload/fotoProfiloDefault.jpg" style="max-width:100%;max-height:100%;" alt="Foto profilo" class="profileimg"/></td>
                        <td headers="info_personali" class="custom-font border-white border-2 text-center align-middle">Informazioni personali non ancora aggiunte</td>
                    <?php else: ?>
                        <?php foreach($templateParams["profilo"] as $profilo): ?>
                            <td headers="img_profilo" class="border-white border-2 text-center align-middle"><img src="<?php echo UPLOAD_DIR.$profilo["imgprofilo"]; ?>" alt="Foto profilo" style="max-width:100%;max-height:100%;" class="profileimg"/></td>
                            <td headers="info_personali" class="border-white border-2 text-center align-middle"><?php echo $profilo["datipersonali"]; ?></td>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <td headers="seguiti" class="border-white border-2 text-center align-middle"><a class="text-dark fw-bold" href="elenco-utenti-seguiti.php?utente=<?php echo $idseguito; ?>"><?php foreach ($dbh->getNumberOfSeguitiById($idseguito) as $num_seguiti) { echo $num_seguiti["num_seguiti"]; }?></a></td>
                    <td headers="seguaci" class="border-white border-2 text-center align-middle"><a class="text-dark fw-bold" href="elenco-utenti-seguaci.php?utente=<?php echo $idseguito; ?>"><?php foreach ($dbh->getNumberOfSeguaciById($idseguito) as $num_seguaci) { echo $num_seguaci["num_seguaci"]; }?></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h2 class="mt-2 py-3">Post personali</h2>

<div class="d-flex justify-content-center">
    <div class="col-11 mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th id="domanda_consiglio" scope="col" class="border-white border-2 py-3">Domanda / Consiglio</th>
                    <th id="images" scope="col" class="border-white border-2 py-3">Immagini</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($templateParams["post"] as $post): ?>
                    <tr class="border-white border-2">
                        <th id="domanda_consiglio_testo<?php echo $post['idpost']; ?>" headers="domanda_consiglio" scope="row" class="border-white border-2 text-center align-middle"><?php echo $post["titolopost"]; ?></th>
                        <td headers="images domanda_consiglio_testo<?php echo $post['idpost']; ?>" class="border-white border-2 text-center align-middle">
                            <img src="<?php echo UPLOAD_DIR.$post["file1"]; ?>" alt="<?php echo $post["desc1"]; ?>" class="profileimagesnovotes" style="max-width:300px;max-height:170px;" />
                            <img src="<?php echo UPLOAD_DIR.$post["file2"]; ?>" alt="<?php echo $post["desc2"]; ?>" class="profileimagesnovotes" style="max-width:300px;max-height:170px;" />
                            <img src="<?php echo UPLOAD_DIR.$post["file3"]; ?>" alt="<?php echo $post["desc3"]; ?>" class="profileimagesnovotes" <?php if(!isset($post["file3"])) echo "style='display: none;'"; else echo "style='max-width:300px;max-height:170px;'"; ?> />
                            <img src="<?php echo UPLOAD_DIR.$post["file4"]; ?>" alt="<?php echo $post["desc4"]; ?>" class="profileimagesnovotes" <?php if(!isset($post["file4"])) echo "style='display: none;'"; else echo "style='max-width:300px;max-height:170px;'"; ?> />
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>