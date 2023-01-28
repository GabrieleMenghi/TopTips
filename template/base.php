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
    <div class="conteiner-fluid m-0 p-0 overflow-hidden" >
        <div class="row">
            <div class="col-12">
                <header class="fixed-top bg-dark">
                    <div class="d-flex align-items-center">
                        <div class="toggle text-dark">
                            <i class="bx bx-menu"></i>
                        </div>
                        <div class="logo col-2">
                            <div class="icons">
                                <div class="icon">
                                    <div class="bg"></div>
                                    <div class="glass">
                                        <img src="./immagini/logo.png"/>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <h1 class="text-white text-start col-3">TopTips</h1>
                        <div class="search-nav col-2 bg-dark">
                            <i class='bx bx-search'></i>
                        </div>
                        <div class="col-3"></div>
                        <ul class="col-2 notification nav nav-pills align-content-center">
                            <a href="./notifications.php">
                            <li class="nav-item i-bell">
                                <!--'bx-tada': animazione campanella-->
                                <i class="bx bxs-bell notifications_number"></i>
                            </li>
                            </a>
                            <li class="nav-item exit i-exit">
                                <a <?php isActive("./exit.php"); ?> href="./exit.php"><i class="bx bx-log-out text-white"></i></a>
                            </li>
                        </ul>
                    </div>
                </header>
            </div>
        </div>
    </div>
    
    <div class="sidebar">        
        <nav>
            <div class="nav-title">
                Menù
            </div> 
            
            <ul>
                <a <?php isActive("./home.php"); ?> href="./home.php">
                <li class="nav-item i-home active">
                    <i class="bx bxs-home text-white"></i>
                    <span>Home</span>
                </li>
                </a>
                <a href="./notifications.php">
                <li class="nav-item i-bell">
                    <i class="bx bxs-bell notifications_number"></i>
                    <span>Notifications</span>
                </li>
                </a>
                <li class="nav-item i-post">
                    <i class='bx bx-plus-circle'></i>
                    <span>New Post</span>
                </li>
                <a <?php isActive("./login.php"); ?> href="./login.php">
                <li class="nav-item i-user">
                    <i class="bx bxs-user text-white"></i>
                    <span>Profile</span>
                </li>
                </a>
                <a <?php isActive("./exit.php"); ?> href="./exit.php">
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
                <footer class="footer-mobile bg-dark fixed-bottom">
                    <ul class="nav nav-pills">
                        <li class="nav-item i-home col-2 text-center active">
                            <a <?php isActive("./home.php"); ?> href="./home.php"><i class="bx bxs-home text-white"></i></a>
                        </li>
                        <div class="col-3"></div>
                        <li class="nav-item i-post col-2 text-center">
                            <a <?php isActive("./crea-post.php"); ?> href="./crea-post.php"><i class='bx bx-plus-circle text-white'></i></a>
                        </li>
                        <div class="col-3"></div>
                        <li class="nav-item i-user col-2 text-center">
                            <a <?php isActive("./login.php"); ?> href="./login.php"><i class="bx bxs-user text-white"></i></a>
                        </li>
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
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    bells.forEach(b => {
                        b.innerHTML = this.responseText;
                    });
                }
            };
            xhttp.open("GET", "notification-number.php", true);
            xhttp.send();

            },1000);
        }
        loadDoc();
    </script>
</body>
</html>