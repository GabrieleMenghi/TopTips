<!DOCTYPE html>
<html lang="it">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="utf-8"/>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css" />
<!-- BoxIcons v2.1.2 -->
<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
<title><?php echo $templateParams["titolo"]; ?></title>
</head>
<body>
    <div class="conteiner-fluid m-0 p-0 overflow-hidden">
        <div class="row">
            <div class="col-12">
                <!-- controllo il valore della variabile di sessione -->
                <?php $isUserLoggedIn = isset($_SESSION["isUserLoggedIn"]) && $_SESSION["isUserLoggedIn"] == true; ?>
                
                <header class="fixed-top bg-dark d-flex align-items-center">
                    <!-- Toggle-menu (desktop) -->
                    <div class="solodesktop col-1 text-center">
                        <i class="toggle bx bx-menu"></i>
                    </div>
                    <!-- Logo (desktop) -->
                    <div class="col-1 solodesktop">
                        <div class="logo">
                            <div class="icons">
                                <div class="icon">
                                    <a href="home.php">
                                        <div class="bg"></div>
                                        <div class="glass">
                                            <img src="./immagini/logo.png" class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <!-- Logo (mobile) -->
                    <div class="col-2 solomobile">
                        <div class="logo">
                            <div class="icons">
                                <div class="icon">
                                    <a href="home.php">
                                        <div class="bg"></div>
                                        <div class="glass">
                                            <img src="./immagini/logo.png" class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <!-- TopTips (desktop) -->
                    <div class="solodesktop col-3">
                        <h1 class="text-white text-start titlename">TopTips</h1>
                    </div>
                    <!-- Spazio conteggio colonne mobile: varia se sono loggato o meno -->
                    <?php if ($isUserLoggedIn): ?>
                        <div class="solomobile col-1"></div>
                    <?php else: ?>
                        <div class="solomobile col-2"></div>
                    <?php endif; ?>
                    <!-- Ricerca (desktop) -->
                    <div class="solodesktop ricerca col-3">
                        <form class="d-flex form-inline" action="processa-ricerca.php" method="POST">
                            <input class="formricerca me-1" type="text" name="keyword" placeholder="Ricerca utente">
                            <button class="btn btn-dark" type="submit"><i class="bx bx-search"></i></button>
                        </form>
                    </div>
                    <!-- Ricerca (mobile) -->
                    <div class="solomobile ricerca col-4">
                        <form class="d-flex form-inline" action="processa-ricerca.php" method="POST">
                            <input class="formricerca me-1" type="text" name="keyword" placeholder="Ricerca utente">
                            <button class="btn btn-dark" type="submit"><i class="bx bx-search"></i></button>
                        </form>
                    </div>
                    <!-- Spazio conteggio colonne desktop -->                  
                    <div class="solodesktop col-4"></div> 
                    <!-- Spazio conteggio colonne mobile: varia se sono loggato o meno -->
                    <?php if ($isUserLoggedIn): ?>
                        <div class="solomobile col-1"></div>
                    <?php else: ?>
                        <div class="solomobile col-2"></div>
                    <?php endif; ?>
                    <!-- Solo se loggato vedo icona exit in mobile -->
                    <?php if ($isUserLoggedIn): ?>
                        <!-- Exit (mobile) -->
                        <div class="solomobile col-2">
                            <a class="pagebutton" href="./exit.php">
                                <li class="i-exit">
                                    <i class="bx bx-log-out"></i>
                                </li>
                            </a>
                        </div>
                    <?php else: ?>
                        <!-- se non sono loggato: niente -->
                    <?php endif; ?>
                    <!-- Notifiche (mobile) -->                  
                    <div class="solomobile base col-2">
                        <a class="pagebutton" href="./notifications.php">
                            <li class="i-bell">
                                <i class="bx bxs-bell"></i>
                                <p class="notifications_number" style="display: none;"></p>
                            </li>
                        </a>
                    </div>
                </header>
            </div>
        </div>
    </div>
    
    <div class="sidebar" user="<?php if(isset($_SESSION["idutente"])) echo $_SESSION["idutente"]; else echo 0; ?>">        
        <nav>
            <div class="nav-title">
                Menù
            </div>        
            <ul>
                <a class="pagebutton pagebuttonhome" href="./home.php">
                    <li class="nav-item i-home">
                        <i class="bx bxs-home text-white"></i>
                        <span>Home</span>
                    </li>
                </a>
                <a class="pagebutton" href="./notifications.php">
                    <li class="nav-item i-bell">
                        <i class="bx bxs-bell text-white"></i>
                        <span>Notifications</span>
                        <p class="notifications_number" style="display: none;"></p>
                    </li>
                </a>
                <a class="pagebutton" href="./creazione-post.php">
                    <li class="nav-item i-post">
                        <i class="bx bx-plus-circle text-white"></i>
                        <span>New Post</span>
                    </li>
                </a>
                <a class="pagebutton" href="./login.php">
                    <li class="nav-item i-user">
                        <i class="bx bxs-user text-white"></i>
                        <span>Profile</span>
                    </li>
                </a>
                <!-- Solo se loggato vedo icona exit nel menù laterale (desktop) -->
                <?php if ($isUserLoggedIn): ?>
                    <a class="pagebutton" href="./exit.php">
                        <li class="nav-item i-exit">
                            <i class="bx bx-log-out text-white"></i>
                            <span>Exit</span>
                        </li>
                    </a>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    
    <!--Main da riempire al dipendere dal parametro di nome-->
    <main>
        <?php 
            if (isset($templateParams["nome"])){
                require($templateParams["nome"]);
            }               
        ?>
    </main>

    <!--Mobile footer-->
    <div class="conteiner-fluid m-0 p-0 overflow-hidden">
        <div class="row">
            <div class="col-12">
                <footer class="solomobile bg-dark fixed-bottom">
                    <ul class="nav nav-pills">
                        <a class="pagebutton pagebuttonhome col-2 text-center" href="./home.php">
                            <li class="nav-item i-home">
                                <i class="bx bxs-home text-white"></i>
                            </li>
                        </a>
                        <div class="col-3"></div>
                        <a class="pagebutton col-2 text-center" href="./creazione-post.php">
                            <li class="nav-item i-post">
                                <i class="bx bx-plus-circle text-white"></i>
                            </li>
                        </a>
                        <div class="col-3"></div>
                        <a class="pagebutton col-2 text-center" href="./login.php">
                            <li class="nav-item i-user">
                                <i class="bx bxs-user text-white"></i>
                            </li>
                        </a>
                    </ul>
                </footer> 
            </div>
        </div>  
    </div>

    <!-- JS File -->
    <script type="text/javascript" src="./javascript/script.js"></script>
    <script type="text/javascript">
        function loadDoc() {
            setInterval(function(){
            const bells = document.querySelectorAll('.notifications_number');
            var xhttp = new XMLHttpRequest();
            const sidebar = document.querySelector('.sidebar');
            let user = "utente=" + sidebar.getAttribute('user');

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    bells.forEach(b => {
                        if(this.responseText > 0){
                            b.removeAttribute('style');
                            b.innerHTML = this.responseText;
                        } else {
                            b.innerHTML = "";
                            b.setAttribute('style', 'display: none;');
                        }
                    });
                }
            };
            xhttp.open("POST", "utils/notification-number.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(user);

            },1000);
        }
        loadDoc();
    </script>
</body>
</html>