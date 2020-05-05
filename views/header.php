<?php
  session_start();  
?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <style type="text/css">
       .userIcon:hover{
          color: white ;
        }

        /* width */
            ::-webkit-scrollbar {
              width: 15px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
              box-shadow: inset 0 0 5px darkred; 
              border-radius: 10px;
            }
             
            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: #b34700 ; 
              border-radius: 10px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: #262626;
              opacity: 0.7; 
              cursor: pointer;
            }


    </style>
</head>
<body>
    <header class="top-navbar">
        <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" id="Home"><a class="nav-link" href="index.php">Acceuil</a></li>
                        <li class="nav-item" id="Menu"><a class="nav-link" href="menu.php">Menu</a></li>
                        <li class="nav-item" id="About"><a class="nav-link" href="about.php">About</a></li>                        
                        <li class="nav-item dropdown" id="Blog">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="blog.php">blog</a>
                                <a class="dropdown-item" href="blog-details.php">blog Single</a>
                            </div>
                        </li>
                        <li class="nav-item " id="Contact"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item" id="Panier"><a class="nav-link" href="panier.php"> <i class="fa fa-shopping-cart" style="font-size: 22px;color: #ff6600;" > <span style="font-size: 16px;">
                            <?php 
                            if(isset($_SESSION["shopping_cart"])){
                                echo count($_SESSION["shopping_cart"]);
                            }
                            else{
                               echo "0" ;
                            }

                            ?>
                            </span></i></a></li>
                        <li class="nav-item dropdown" id="Compte">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i class="fa fa-user userIcon " style="font-size: 22px;color: #ff6600;" ></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <?php 
                                   if(!isset($_SESSION['nom'])){
                                ?>
                                <a class="dropdown-item" href="login.php">Login</a>
                                 <?php
                                 }

                                if(isset($_SESSION['nom'])){
                                ?> 
                                <a class="dropdown-item" href="profile.php">Profil</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            <?php } ?>
                            </div>
                        </li> 
                        <li class="nav-item ">
                              <a class="nav-link" href="" style="color: black;">
                                <?php
                                if(isset($_SESSION['nom']))
                                    echo $_SESSION['nom'] ;
                                ?>                               
                              </a>
                       </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    </header>
</body>
</html>