<?php foreach($templateParams["notifiche"] as $notifica): ?>
    <p><?php echo $notifica["testo"]; ?></p>
    <input class="check" type="checkbox" id="read_notify<?php echo $notifica["idnotifica"];?>" name="read_notify" value="Read" <?php if ($notifica["letta"] == '1') echo "checked='checked'"; ?>>
<?php endforeach; ?>

<script type="text/javascript">
    function loadDoc() {
        setInterval(function(){
        const checks = document.querySelectorAll('.check');
        //var parameters = "notifica=";
        checks.forEach(c => {
            if(c.checked == true){
                var xhttp = new XMLHttpRequest();
                var url = "refresh-notify.php";
                c.setAttribute('checked', 'true');
                c.setAttribute('disabled', 'true');
                
                let value = c.getAttribute('id').substring(11, c.getAttribute('id').length);
                let parameters = "notifica=" + value;
                console.log(parameters);
                xhttp.open("POST", url);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send(parameters);
            }
        });
        /*xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
        };*/

        },1000);
    }
    loadDoc();
</script>