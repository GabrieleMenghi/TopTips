<?php if(count($templateParams["posts"])==0): ?>
    <div class="container-fluid">
    <h2><?php echo $_SESSION["user"]; ?>, questa è la tua pagina home.</h2>
    <p>Al momento la tua home risulta essere vuota.</p> 
    <p>Inizia a seguire qualche utente e attendi che qualcuno pubblichi qualche domanda!</p>
    <p>Dopodichè non ti resta che esprimere i tuoi consigli!</p>
</div>

<?php endif; ?>
<?php $postv = [];
        $immaginevotata = null;
    foreach($templateParams["postvotati"] as $postvotati):
        array_push($postv, $postvotati["idpost"]);
    endforeach;
    $i=0;
    foreach ($templateParams["posts"] as $post):
        $totvotes = intval($post["votes1"]) + intval($post["votes2"]) + intval($post["votes3"]) + intval($post["votes4"]);
    ?>
    <article>
        <?php $i++;?> 
        <header>
            <div class="headerpost">
                <img src="<?php echo UPLOAD_DIR.$post["imgprofilo"]; ?>" alt="Immagine profilo"/>
                <div class="d-flex justify-content-start usernamecontainer postheader">    
                    <a href="profilo-cercato.php?username=<?php echo $post["username"]; ?>"><?php echo $post["username"]; ?></a>
                </div>
                <p><?php echo $post["datadiff"] . " giorni fa"; ?></p>
            </div>
        </header>

        <?php foreach($templateParams["postvotati"] as $postvotati):
            if($postvotati["idprofilo"]==$_SESSION["idutente"] && $postvotati["idpost"]==$post["idpost"]){
                $immaginevotata = $postvotati["immaginevotata"];
            }
        endforeach; ?>

        <div class="divpostimages">
            <h2><?php echo $post["titolopost"]; ?></h2>
            <p><?php echo $post["testopost"]; ?></p>

            <!-- Immagine 1 -->
            <img id="imgpost<?php echo $post["img1"]; ?>" class="imgpost 
            <?php if(in_array($post["idpost"], $postv)) 
                echo 'notvoteable';?>"
                postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"];?>" owner="<?php if(isset($post["utente"])) echo $post["utente"];?>"
                src="<?php echo UPLOAD_DIR.$post["file1"]; ?>" longdesc="<?php if(isset($post["desc1"])) echo $post["desc1"]; ?>" style="width: 25%" />
                <!-- Label 1 -->
                <label for="imgpost<?php echo $post["img1"]; ?>" 
                <?php if(isset($immaginevotata) && $immaginevotata==$post["img1"]) { echo "style='font-weight: bold' voted='yes'"; } else { echo "style='display: none;'";} ?>>
                <?php if($totvotes!=0) echo round(intval($post["votes1"])/$totvotes*100, 2) . '%'; ?></label>
            <!-- Immagine 2 -->
            <img id="imgpost<?php echo $post["img2"]; ?>" class="imgpost 
            <?php if(in_array($post["idpost"], $postv))  
                echo 'notvoteable';?>"
                postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"];?>" owner="<?php if(isset($post["utente"])) echo $post["utente"];?>"
                src="<?php echo UPLOAD_DIR.$post["file2"]; ?>" longdesc="<?php if(isset($post["desc2"])) echo $post["desc2"]; ?>" style="width: 25%"/>
                <!-- Label 2 -->
                <label for="imgpost<?php echo $post["img2"]; ?>" 
                <?php if(isset($immaginevotata) && $immaginevotata==$post["img2"]) { echo "style='font-weight: bold' voted='yes'"; } else { echo "style='display: none;'";} ?>>
                <?php if($totvotes!=0) echo round(intval($post["votes2"])/$totvotes*100, 2) . '%'; ?></label>
            <!-- Immagine 3 -->
            <img id="imgpost<?php echo $post["img3"]; ?>" class="imgpost 
            <?php if(in_array($post["idpost"], $postv)) 
                echo 'notvoteable';?>"
                postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"];?>" owner="<?php if(isset($post["utente"])) echo $post["utente"];?>"
                src="<?php echo UPLOAD_DIR.$post["file3"]; ?>" longdesc="<?php if(isset($post["desc3"])) echo $post["desc3"]; ?>" style="width: 25%"/>
                <!-- Label 3 -->
                <label for="imgpost<?php echo $post["img3"]; ?>" 
                <?php if(isset($immaginevotata) && $immaginevotata==$post["img3"]) { echo "style='font-weight: bold' voted='yes'"; } else { echo "style='display: none;'";} ?>>
                <?php if($totvotes!=0) echo round(intval($post["votes3"])/$totvotes*100, 2) . '%'; ?></label>
            <!-- Immagine 4 -->
            <img id="imgpost<?php echo $post["img4"]; ?>" class="imgpost 
            <?php if(in_array($post["idpost"], $postv)) 
                echo 'notvoteable';?>"
                postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"];?>" owner="<?php if(isset($post["utente"])) echo $post["utente"];?>"
                src="<?php echo UPLOAD_DIR.$post["file4"]; ?>" longdesc="<?php if(isset($post["desc4"])) echo $post["desc4"]; ?>" style="width: 25%"/>
                <!-- Label 4 -->
                <label for="imgpost<?php echo $post["img4"]; ?>" 
                <?php if(isset($immaginevotata) && $immaginevotata==$post["img4"]) { echo "style='font-weight: bold' voted='yes'"; } else { echo "style='display: none;'";} ?>>
                <?php if($totvotes!=0) echo round(intval($post["votes4"])/$totvotes*100, 2) . '%'; ?></label>
        </div>

        <footer>
            <h3>Commenti</h3>
            <?php foreach($templateParams["commenti"] as $commento): 
                if($commento["post"]==$post["idpost"]): ?>
                <div class="d-flex justify-content-center usernamecontainer">  
                    <a href="profilo-cercato.php?username=<?php echo $commento["username"]; ?>"><p><?php echo $commento["username"]; ?></p></a><p><?php echo ": &nbsp" . $commento["testo"]; ?></p>
                </div>
                <?php endif ?>
            <?php endforeach ?>
            <!--Aggiunta di un commento-->
            <form action="" method="POST" enctype="multipart/form-data" target="_blank">
                <div class="d-flex justify-content-center mb-4">
                <div class="input-comment me-3">
                    <input id="comment<?php echo $i; ?>" type="text" autocomplete="off" name="commenttext" placeholder="Aggiungi un commento" required/>
                    <label for="comment<?php echo $i; ?>" class="commentlabel">Commento</label>
                </div>
                <input class="commentidpost<?php echo $i; ?>" type="hidden" name="idpost" value="<?php echo $post["idpost"]; ?>"/>
                <input class="commentauthor<?php echo $i; ?>" type="hidden" name="author" value="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"]; else echo 0; ?>" class="autorecommento"/>
                <input type="submit" name="submit" value="Aggiungi commento" onclick="addComment(<?php echo $i; ?>)"/>
            </div>
            <p><?php if(!isset($_SESSION["idutente"])) echo "Per commentare è necessario effettuare login"; ?></p>
            </form>
        </footer>
    </article>
<?php endforeach; ?>

<script>
    function addComment(index) {
        const commentinput = document.querySelector('#comment' + index);
        const commentidpost = document.querySelector('.commentidpost' + index);
        const commentauthor = document.querySelector('.commentauthor' + index);

        var xhttp = new XMLHttpRequest();
        let parameters = "idpost=" + commentidpost.value + "&author=" + commentauthor.value + "&commenttext=" + commentinput.value;
        xhttp.open("POST", "utils/aggiungi-commento.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(parameters);
        document.location.reload(true);
    }
</script>