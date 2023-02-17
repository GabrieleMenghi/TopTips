<h1 class="px-5 py-4"><?php echo $templateParams["username"]; ?></h1>

<form action="following.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="follower_id" value="<?php echo $_SESSION["user"]; ?>" />
    <input type="hidden" name="following_id" value="<?php echo $templateParams["username"]; ?>" />
    <input type="submit" name="follow" value="Segui" />
    <input type="submit" name="unfollow" value="Smetti di seguire" /> 
</form>

<table class="mx-3">
    <tr>
        <th class="border-white border-2 px-3 py-3">Immagine profilo</th>
        <th class="border-white border-2 px-3 py-3">Informazioni personali</th>
        <th class="border-white border-2 px-3 py-3">Seguiti</th>
        <th class="border-white border-2 px-3 py-3">Seguaci</th>
    </tr>

    <?php foreach($templateParams["profilo"] as $profilo): ?>
    <tr class="border-white border-2">
        <td class="border-white border-2 px-1 py-2 text-center"><img src="<?php echo UPLOAD_DIR.$profilo["imgprofilo"]; ?>" alt="" style="max-width:100%;max-height:100%;"/></td>
        <td class="border-white border-2 py-2"><?php echo $profilo["datipersonali"]; ?></td>
        <td class="border-white border-2 py-2">Numero seguiti</td>
        <td class="border-white border-2 py-2">Numero seguaci</td>
    </tr>
    <?php endforeach; ?>
</table>

<h2 class="py-4">Post personali</h2>

<table class="mx-3 mb-5">
    <tr>
        <th class="border-white border-2 px-3 py-3">Domanda / Consiglio</th>
        <th class="border-white border-2 px-2 py-3">Immagini</th>
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
    </tr>
    <?php endforeach; ?>
</table>