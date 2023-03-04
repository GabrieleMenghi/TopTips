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
                <header class="fixed-top bg-dark d-flex align-items-center">
                    <div class="solodesktop col-1 text-center ms-2">
                        <i class="toggle bx bx-menu text-dark"></i>
                    </div>
                    <div class="col-1 ms-2 px-4 d-flex justify-content-center align-items-center border border-4">
                        <div class="text-center">
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
                    </div>
                    <div class="solodesktop col-3">
                        <h1 class="text-white text-start ">TopTips</h1>
                    </div>

                    <div class="col-1 solomobile border border-4"></div>

                    <div class="solodesktop col-3 border border-4">
                        <form class="d-flex form-inline" action="processa-ricerca.php" method="POST">
                            <input class="form-control" type="text" name="keyword" placeholder="Ricerca utente">
                            <button class="btn btn-dark" type="submit"><i class='bx bx-search'></i></button>
                        </form>
                    </div>

                    <div class="solomobile col-4 border border-4">
                        <form class="d-flex form-inline" action="processa-ricerca.php" method="POST">
                            <input class="form-control" type="text" name="keyword" placeholder="Ricerca utente">
                            <button class="btn btn-dark" type="submit"><i class='bx bx-search'></i></button>
                        </form>
                    </div>

                    <div class="solodesktop col-4"></div> 

                    <div class="solomobile col-1 border border-4"></div> 

                    <div class="solomobile col-2 border border-4">
                        <a class="pagebutton" href="./exit.php">
                            <li class="nav-item exit i-exit">
                                <i class="bx bx-log-out"></i>
                            </li>
                        </a>
                    </div>

                    <div class="solomobile base col-2 border border-4">
                        <a class="pagebutton footerbell" href="./notifications.php">
                            <li class="nav-item i-bell">
                                <i class="bx bxs-bell"></i>
                                <p class="notifications_number" style="display: none;"></p>
                            </li>
                        </a>
                    </div>

                    <div class="col-1 solomobile border border-4"></div>

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
                        <i class="bx bxs-bell"></i>
                        <span>Notifications</span>
                        <p class="notifications_number" style="display: none;"></p>
                    </li>
                </a>
                <a class="pagebutton" href="./creazione-post.php">
                    <li class="nav-item i-post">
                        <i class='bx bx-plus-circle'></i>
                        <span>New Post</span>
                    </li>
                </a>
                <a class="pagebutton" href="./login.php">
                    <li class="nav-item i-user">
                        <i class="bx bxs-user text-white"></i>
                        <span>Profile</span>
                    </li>
                </a>
                <a class="pagebutton" href="./exit.php">
                    <li class="nav-item i-exit">
                        <i class="bx bx-log-out text-white"></i>
                        <span>Exit</span>
                    </li>
                </a>
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

    <div>
        <!--Mobile footer-->
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
                                <i class='bx bx-plus-circle text-white'></i>
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
            xhttp.open("POST", "notification-number.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(user);

            },1000);
        }
        loadDoc();
    </script>
</body>
</html>