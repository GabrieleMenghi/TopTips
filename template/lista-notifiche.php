<div class="conteiner-fluid m-0 p-0 overflow-hidden container-notify">
    <div class="col-12">
        <div class="d-flex">
            <p class="col-8 fs-5 m-auto">Testo della notifica</p>
            <p class="col-2 fs-5 m-auto">Letta</p>
            <p class="col-2 fs-5 m-auto">Elimina</p>
        </div>
    </div>
</div>
<?php foreach($templateParams["notifiche"] as $notifica): ?>
    <div class="col-12 my-1">
        <div class="d-flex justify-content-center align-items-center">
            <p class="col-8 m-auto"><?php echo $notifica["testo"]; ?></p>
            <input class="check col-2 check-notify" type="checkbox" id="read_notify<?php echo $notifica["idnotifica"];?>" name="read_notify" value="Read" <?php if ($notifica["letta"] == '1') echo "checked='true'"; ?>/>
            <div class="col-2">    
                <i class="bx bx-trash" idnotify="<?php echo $notifica["idnotifica"];?>" onclick="deleteNotify(<?php echo $notifica['idnotifica'];?>)"></i>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript">
    function loadDoc() {
        setInterval(function(){
        const checks = document.querySelectorAll('.check');
        checks.forEach(c => {
            if(c.checked == true){
                var xhttp = new XMLHttpRequest();
                var url = "refresh-notify.php";
                c.setAttribute('checked', 'true');
                c.setAttribute('disabled', 'true');
                
                let value = c.getAttribute('id').substring(11, c.getAttribute('id').length);
                let parameters = "notifica=" + value;
                xhttp.open("POST", url);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send(parameters);
            }
        });
        },1000);
    }
    loadDoc();

    function deleteNotify(notifyid){
        var xhttp = new XMLHttpRequest();
        let parameters = "idnotifica=" + notifyid;
        xhttp.open("POST", "elimina-notifica.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(parameters);
        document.location.reload(true);
    }
</script>