<?php foreach($templateParams["posts"] as $post): ?>
    <article>
        <img class="imgpost" src="<?php echo UPLOAD_DIR.$post["img1"]; ?>" alt="" />
        <img class="imgpost" src="<?php echo UPLOAD_DIR.$post["img2"]; ?>" alt="" />
        <img class="imgpost" src="<?php echo UPLOAD_DIR.$post["img3"]; ?>" alt="" />
        <img class="imgpost" src="<?php echo UPLOAD_DIR.$post["img4"]; ?>" alt="" />
        <h2><?php echo $post["titolopost"]; ?></h2>
        <p><?php echo $post["datapost"] ?> - <?php echo $post["nome"]; ?></p>
        <p><?php echo $post["anteprimapost"]; ?></p>
        <h3>Commenti</h3>
        <?php foreach($templateParams["commenti"] as $commento): 
            if($commento["post"]==$post["idpost"]): ?>
                <p><?php echo $commento["nome"]; ?> - <?php echo $commento["testo"]; ?></p>
            <?php endif ?>
        <?php endforeach ?>
        <a href="#">Vedi post</a>
    </article>
<?php endforeach; ?>