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
           postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php echo $_SESSION["idutente"];?>"
           src="<?php echo UPLOAD_DIR.$post["file1"]; ?>" alt="" style="width: 25%" />
           <label for="imgpost<?php echo $post["img1"]; ?>" style="display: none"><?php if($totvotes!=0) echo round(intval($post["votes1"])/$totvotes*100, 2) . '%'; ?></label>
        <img id="imgpost<?php echo $post["img2"]; ?>" class="imgpost 
        <?php 
            if(in_array($post["idpost"], $postv))  
            echo 'notvoteable';
            ?>"
            postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php echo $_SESSION["idutente"];?>"
            src="<?php echo UPLOAD_DIR.$post["file2"]; ?>" alt="" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img2"]; ?>" style="display: none"><?php if($totvotes!=0) echo round(intval($post["votes2"])/$totvotes*100, 2) . '%'; ?></label>
        <img id="imgpost<?php echo $post["img3"]; ?>" class="imgpost 
        <?php if(in_array($post["idpost"], $postv)) 
            echo 'notvoteable';
            ?>"
            postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php echo $_SESSION["idutente"];?>"
            src="<?php echo UPLOAD_DIR.$post["file3"]; ?>" alt="" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img3"]; ?>" style="display: none"><?php if($totvotes!=0) echo round(intval($post["votes3"])/$totvotes*100, 2) . '%'; ?></label>
        <img id="imgpost<?php echo $post["img4"]; ?>" class="imgpost 
        <?php 
            if(in_array($post["idpost"], $postv)) 
            echo 'notvoteable';
            ?>"
            postnumber="<?php echo $post["idpost"];?>" profilenumber="<?php echo $_SESSION["idutente"];?>"
            src="<?php echo UPLOAD_DIR.$post["file4"]; ?>" alt="" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img4"]; ?>" style="display: none"><?php if($totvotes!=0) echo round(intval($post["votes4"])/$totvotes*100, 2) . '%'; ?></label>
        <h2><?php echo $post["titolopost"]; ?></h2>
        <p><?php echo $post["datapost"] ?> - <?php echo $post["username"]; ?></p>
        <p><?php echo $post["anteprimapost"]; ?></p>
        <h3>Commenti</h3>
        <?php foreach($templateParams["commenti"] as $commento): 
            if($commento["post"]==$post["idpost"]): ?>
                <p><?php echo $commento["username"]; ?> - <?php echo $commento["testo"]; ?></p>
            <?php endif ?>
        <?php endforeach ?>
        <a href="#">Vedi post</a>
    </article>
<?php endforeach; ?>