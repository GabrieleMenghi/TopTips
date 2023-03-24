<?php if($templateParams["notifiche"]==[]){ ?>
    <section class="container-fluid">
        <h2 class="mb-3"><?php echo $_SESSION["user"]; ?>, non hai ancora ricevuto notifiche.</h2>
        <p>Per ricevere notifiche è necessario che altri utenti ti seguano o votino o commentino un tuo post.</p>
        <a href="creazione-post.php">Crea subito un nuovo post!</a>
    </section>
<?php } 
else{?>

<div class="conteiner-fluid container-notify">
    <div class="col-12 pb-4">
        <div class="d-flex">
            <h2 class="col-8 m-auto">Testo della notifica</h2>
            <h2 class="col-2 m-auto">Letta</h2>
            <h2 class="col-2 m-auto">Elimina</h2>
        </div>
    </div>
</div>
<?php foreach($templateParams["notifiche"] as $notifica): ?>
    <div class="col-12 my-1 py-2 divnotifica">
        <div class="d-flex justify-content-center align-items-center">
            <p class="col-8 m-auto" id="notifytext<?php echo $notifica['idnotifica']; ?>" <?php if ($notifica["letta"] == '1') echo "style='font-weight: normal;'"; else echo "style='font-weight: bold;'"; ?> ><?php echo $notifica["testo"]; ?></p>
            <input class="check col-2 check-notify" type="checkbox" id="read_notify<?php echo $notifica["idnotifica"];?>" name="read_notify" <?php if ($notifica["letta"] == '1') echo "checked"; ?> onchange="readNotify(<?php echo $notifica['idnotifica'];?>)"/>
            <div class="col-2">    
                <i class="bx bx-trash" idnotify="<?php echo $notifica["idnotifica"];?>" onclick="deleteNotify(<?php echo $notifica['idnotifica'];?>)" aria-label="Delete notify"></i>
            </div>
        </div>
    </div>
<?php endforeach; 
}?>

<script type="text/javascript">
    function readNotify(idnotify) {
        const notifytext = document.querySelector('#notifytext' + idnotify);
        const checker = document.querySelector('#read_notify' + idnotify);
        
        if(checker.getAttribute('checked') == '') {
            checker.removeAttribute('checked');
        } else {
            checker.setAttribute('checked', '');
        }

        if(checker.getAttribute('checked') == '') {
            notifytext.setAttribute('style', 'font-weight: normal;');
        } else {
            notifytext.setAttribute('style', 'font-weight: bold;');
        }

        var xhttp = new XMLHttpRequest();
        var url = "utils/refresh-notify.php";
        let parameters = "notifica=" + idnotify;
        if(checker.getAttribute('checked') == ''){
            parameters += "&valore=1";
        } else {
            parameters += "&valore=0";
        }
        xhttp.open("POST", url);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(parameters);
    }

    function deleteNotify(notifyid){
        var xhttp = new XMLHttpRequest();
        let parameters = "idnotifica=" + notifyid;
        xhttp.open("POST", "utils/elimina-notifica.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(parameters);
        document.location.reload(true);
    }
</script>