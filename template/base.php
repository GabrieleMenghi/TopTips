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
                            <li class="nav-item i-bell">
                                <!--'bx-tada': animazione campanella-->
                                <i class="bx bxs-bell"></i>
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
                <li class="nav-item i-home active">
                    <i class="bx bxs-home"></i>
                    <span>Home</span>
                </li>
                <li class="nav-item i-bell">
                    <i class="bx bxs-bell"></i>
                    <span>Notifications</span>
                </li>
                <li class="nav-item i-post">
                    <i class='bx bx-plus-circle'></i>
                    <span>New Post</span>
                </li>
                <li class="nav-item i-user">
                    <i class="bx bxs-user"></i>
                    <span>Profile</span>
                </li>
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
                            <i class="bx bxs-home"></i>
                        </li>
                        <div class="col-3"></div>
                        <li class="nav-item i-post col-2 text-center">
                            <i class='bx bx-plus-circle'></i>
                        </li>
                        <div class="col-3"></div>
                        <li class="nav-item i-user col-2 text-center">
                            <i class="bx bxs-user"></i>
                        </li>
                    </ul>
                </footer> 
            </div>
        </div>  
    </div>

    <!-- JS File -->
    <script type="text/javascript" src="./javascript/script.js"></script>
</body>
</html>