<?php foreach($templateParams["posts"] as $post): ?>
    <article>
        <img id="imgpost<?php echo $post["img1"]; ?>" class="imgpost" src="<?php echo UPLOAD_DIR.$post["file1"]; ?>" alt="" style="width: 25%" />
            <label for="imgpost<?php echo $post["img1"]; ?>" style="display: none"><?php echo $post["votes1"]; ?></label>
        <img id="imgpost<?php echo $post["img2"]; ?>" class="imgpost" src="<?php echo UPLOAD_DIR.$post["file2"]; ?>" alt="" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img2"]; ?>" style="display: none"><?php echo $post["votes2"]; ?></label>
        <img id="imgpost<?php echo $post["img3"]; ?>" class="imgpost" src="<?php echo UPLOAD_DIR.$post["file3"]; ?>" alt="" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img3"]; ?>" style="display: none"><?php echo $post["votes3"]; ?></label>
        <img id="imgpost<?php echo $post["img4"]; ?>" class="imgpost" src="<?php echo UPLOAD_DIR.$post["file4"]; ?>" alt="" style="width: 25%"/>
            <label for="imgpost<?php echo $post["img4"]; ?>" style="display: none"><?php echo $post["votes4"]; ?></label>
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