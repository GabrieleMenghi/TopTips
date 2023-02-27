<?php $postv = [];
    foreach($templateParams["postvotati"] as $postvotati):
    array_push($postv, $postvotati["idpost"]);
    endforeach; 
    foreach ($templateParams["posts"] as $post):
        $totvotes = intval($post["votes1"]) + intval($post["votes2"]) + intval($post["votes3"]) + intval($post["votes4"]);
    ?>
    <article>
        <img id="imgpost<?php echo $post["img1"]; ?>" class="imgpost 
        <?php if(in_array($post["idpost"], $postv)) 
            echo 'notvoteable';
           ?>"
           postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"];?>" owner="<?php if(isset($post["utente"])) echo $post["utente"];?>"
           src="<?php echo UPLOAD_DIR.$post["file1"]; ?>" alt="<?php if(isset($post["desc1"])) echo $post["desc1"]; ?>" style="width: 25%" />
           <label for="imgpost<?php echo $post["img1"]; ?>" style="display: none"><?php if($totvotes!=0) echo round(intval($post["votes1"])/$totvotes*100, 2) . '%'; ?></label>
        <img id="imgpost<?php echo $post["img2"]; ?>" class="imgpost 
        <?php 
            if(in_array($post["idpost"], $postv))  
            echo 'notvoteable';
            ?>"
            postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"];?>" owner="<?php if(isset($post["utente"])) echo $post["utente"];?>"
            src="<?php echo UPLOAD_DIR.$post["file2"]; ?>" alt="<?php if(isset($post["desc2"])) echo $post["desc2"]; ?>" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img2"]; ?>" style="display: none"><?php if($totvotes!=0) echo round(intval($post["votes2"])/$totvotes*100, 2) . '%'; ?></label>
        <img id="imgpost<?php echo $post["img3"]; ?>" class="imgpost 
        <?php if(in_array($post["idpost"], $postv)) 
            echo 'notvoteable';
            ?>"
            postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"];?>" owner="<?php if(isset($post["utente"])) echo $post["utente"];?>"
            src="<?php echo UPLOAD_DIR.$post["file3"]; ?>" alt="<?php if(isset($post["desc3"])) echo $post["desc3"]; ?>" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img3"]; ?>" style="display: none"><?php if($totvotes!=0) echo round(intval($post["votes3"])/$totvotes*100, 2) . '%'; ?></label>
        <img id="imgpost<?php echo $post["img4"]; ?>" class="imgpost 
        <?php 
            if(in_array($post["idpost"], $postv)) 
            echo 'notvoteable';
            ?>"
            postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"];?>" owner="<?php if(isset($post["utente"])) echo $post["utente"];?>"
            src="<?php echo UPLOAD_DIR.$post["file4"]; ?>" alt="<?php if(isset($post["desc4"])) echo $post["desc4"]; ?>" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img4"]; ?>" style="display: none"><?php if($totvotes!=0) echo round(intval($post["votes4"])/$totvotes*100, 2) . '%'; ?></label>
        <h2><?php echo $post["titolopost"]; ?></h2>
        <div class="d-flex justify-content-center usernamecontainer">    
            <p><?php echo $post["datapost"] . " -"; ?></p><a href="profilo-cercato.php?username=<?php echo $post["username"]; ?>"><?php echo "&nbsp" . $post["username"]; ?></a>
        </div>
        <p><?php echo $post["testopost"]; ?></p>
        <h3>Commenti</h3>
        <?php foreach($templateParams["commenti"] as $commento): 
            if($commento["post"]==$post["idpost"]): ?>
            <div class="d-flex justify-content-center usernamecontainer">  
                <a href="profilo-cercato.php?username=<?php echo $post["username"]; ?>"><p><?php echo $commento["username"] . " - "; ?></p></a><p><?php echo "&nbsp" . $commento["testo"]; ?></p>
            </div>
            <?php endif ?>
        <?php endforeach ?>
        <!--Aggiunta di un commento-->
        <form action="aggiunta-commento.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="commenttext" placeholder="Aggiungi un commento" size="40" required/>
            <input type="hidden" name="idpost" value="<?php echo $post["idpost"]; ?>"/>
            <input type="hidden" name="author" value="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"]; else echo 0; ?>" class="autorecommento"/>
            <input type="submit" name="submit" value="Aggiungi commento"/>
            <p><?php if(!isset($_SESSION["idutente"])) echo "Per commentare è necessario effettuare login"; ?></p>
        </form>
        <a href="#">Vedi post</a>
    </article>
<?php endforeach; ?>