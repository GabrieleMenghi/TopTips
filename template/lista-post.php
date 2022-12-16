<?php foreach($templateParams["posts"] as $post): ?>
    <article>
        <img src="<?php echo UPLOAD_DIR.$post["img1"]; ?>" alt="" />
        <img src="<?php echo UPLOAD_DIR.$post["img2"]; ?>" alt="" />
        <img src="<?php echo UPLOAD_DIR.$post["img3"]; ?>" alt="" />
        <img src="<?php echo UPLOAD_DIR.$post["img4"]; ?>" alt="" />  
        <h2><?php echo $post["titolopost"]; ?></h2>
        <p><?php echo $post["datapost"] ?> - <?php echo $post["nome"]; ?></p>
        <p><?php echo $post["anteprimapost"]; ?></p>
        <a href="#">Vedi post</a>
    </article>
<?php endforeach; ?>