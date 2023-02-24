<h1 class="pt-4"><?php echo $templateParams["username"]; ?></h1>

<?php 
$seguitore = $_SESSION["user"];
$id["seguitore"] = $dbh->getIdByUsername($seguitore);
$seguito = $templateParams["username"];
$id["seguito"]= $dbh->getIdByUsername($seguito);

foreach ($id["seguitore"] as $seguitore) {
    foreach ($id["seguito"] as $seguito) {
        $idseguitore = $seguitore["idutente"];
        $idseguito = $seguito["idutente"];
    }
}
?>

<input class="btn btn-primary btnfollow py-2 mt-1 mb-3" type="submit" name="follow" value="<?php if ($dbh->isFollowing($idseguito, $idseguitore)) { echo "Smetti di seguire"; } else { echo "Segui"; } ?>" 
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
        
        xhttp.open("POST", "following.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(parameters);
        window.location.reload();
    });
</script>

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