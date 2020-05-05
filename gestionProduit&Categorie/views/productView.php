<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Menu carbonne restaurant</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	input[type='submit']{
    		border-radius: 10px ;
    		color: white ;
    		background-color: #b34700 ;
    	}

    	input[type='submit']:hover{;
    		color: white ;
    		background-color: #262626 ;
    		cursor: pointer;
    	}

     #Menu a{
            background-color: #cc5200; 
            color: white ;
        }
        i{
        	color: #b34700 ;
        }
        i:hover{
        	color: #262626 ;
        }
         #clockdiv{ 
            font-family: sans-serif; 
            color: #fff; 
            display: inline-block; 
            font-weight: 100; 
            text-align: center; 
            font-size: 30px; 
        } 
        #clockdiv > div{ 
            padding: 10px; 
            border-radius: 3px; 
            background: #262626; 
            display: inline-block; 
        } 
        #clockdiv div > span{ 
            padding: 15px; 
            border-radius: 3px; 
            background: #b34700; 
            display: inline-block; 
        } 
        .smalltext{ 
            padding-top: 5px; 
            font-size: 16px; 
        } 
    </style>

</head>

<body>
	<!-- Start header -->
	<?php
	include "header.php" ;
    include "../core/produitC.php" ;
	?>	

	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Special Menu</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
    <div class="menu-box">
        <div class="container">
            <?php 
           if (isset($_GET['id'])){
               $prodC = new ProduitC() ;
                $result=$prodC->recupererProduit($_GET['id']);
              foreach($result as $row){
                $id=$row['id'];
                $nom=$row['nom'];
                $prix=$row['prix'];
                $categorie=$row['category'];
                $image=$row['image'];
                $description=$row['description'] ;
                $quantite = $row['quantite'] ;
                $etatPromo = $row['etatPromo'] ;
          ?>


          <?php
      }
       }

          ?>
          <div class="details">
          <div class="sometext" style="float: left;margin-left: 100px;margin-top: 50px;margin-bottom: 200px;">
              <h1><?php echo $nom ?></h1>
              <p>description : <?php echo $description ?></p>
              <p>categorie :<?php echo $categorie ?></p>
              <?php 
               if(!$etatPromo)
                     { 
                      $finalprice = $prix;
                        ?>
                      <h5><?php echo $prix ?> DNT  </h5>                                                       
                     <?php
                    }else{  
                        $promo = new ProduitC() ;
                        $listPromo = $promo->getProductsFromPromo($id) ;
                        if(!empty($listPromo))
                        {
                            foreach ($listPromo as $p) {
                               $finalDate = $p['dateFin'] ;

                               ?>  
                                <h5><?php echo $p['remise'] ?>% off</h5>
                          <h5><span style="font-size: 10px;"><i><s><?php echo $prix ; ?> DNT </s></i></span>
                           <?php echo ($prix-(($prix*$p['remise'])/100)) ?> DNT</h5>
                           <div id="clockdiv"> 
                            <h1>Temps restant </h1>
                              <div> 
                                <span class="days" id="day"></span> 
                                <div class="smalltext">Days</div> 
                              </div> 
                              <div> 
                                <span class="hours" id="hour"></span> 
                                <div class="smalltext">Hours</div> 
                              </div> 
                              <div> 
                                <span class="minutes" id="minute"></span> 
                                <div class="smalltext">Minutes</div> 
                              </div> 
                              <div> 
                                <span class="seconds" id="second"></span> 
                                <div class="smalltext">Seconds</div> 
                              </div> 
                          </div>
                          <input type="hidden" name="" id="date" value="<?php echo $finalDate ; ?>"> 
                        <p id="demo"></p>
                        <?php
                          $finalprice = ($prix-(($prix*$p['remise'])/100)) ;
                        }
                       }
                     }
                    ?>
                <form method="POST" action="panier.php?action=add&id=<?php echo $id; ?>">
                         <input type="number" name="quantity" value="1" style="width: 40px;"> : quantite <br>    
                        <br><input type="hidden" name="idd" value="<?php echo $id ; ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $finalprice ; ?>">
                        <input type="hidden" name="hidden_name" value="<?php echo $nom ; ?>">                                            
                        <input style="margin-bottom: 20px;" type="submit" name="add_to_cart" value="ajouter au panier" id="add_to_cart">
                </form>

          </div>                   
             <img src="img/<?php echo $image ?>" alt="Image" style="height: 500px;width: 400px;margin-left: 150px">
          </div>

        </div>
    </div>

    <script> 

        var date = document.getElementById("date").value ;
        var deadline = new Date(date).getTime(); 
          
        var x = setInterval(function() { 
          
        var now = new Date().getTime(); 
        var t = deadline - now; 
        var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
        var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
        var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
        var seconds = Math.floor((t % (1000 * 60)) / 1000); 
        document.getElementById("day").innerHTML =days ; 
        document.getElementById("hour").innerHTML =hours; 
        document.getElementById("minute").innerHTML = minutes;  
        document.getElementById("second").innerHTML =seconds;  
        if (t < 0) { 
                clearInterval(x); 
                document.getElementById("demo").innerHTML = "TIME UP"; 
                document.getElementById("day").innerHTML ='0'; 
                document.getElementById("hour").innerHTML ='0'; 
                document.getElementById("minute").innerHTML ='0' ;  
                document.getElementById("second").innerHTML = '0'; 
                document.getElementById('add_to_cart').type = 'hidden' ;
            } 
        }, 1000); 
        </script>



        <!-- Start QT -->
    <div class="qt-box qt-background">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <p class="lead ">
                        " If you're not the one cooking, stay out of the way and compliment the chef. "
                    </p>
                    <span class="lead">Michael Strahan</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End QT -->
    
    <!-- Start Customer Reviews -->
    <div class="customer-reviews-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Customer Reviews</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <div id="reviews" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner mt-4">
                            <div class="carousel-item text-center active">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
                                <h6 class="text-dark m-0">Web Developer</h6>
                                <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
                                <h6 class="text-dark m-0">Web Designer</h6>
                                <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
                                <h6 class="text-dark m-0">Seo Analyst</h6>
                                <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Customer Reviews -->
    
    <!-- Start Footer -->
        <?php 
        include "footer.html" ;
        ?>
    <!-- End Footer -->
    
    <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>