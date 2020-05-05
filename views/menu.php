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
       .search{
       	margin-bottom: 50px;
       	margin-left: 50px;
       }
       .search input[type='search'] ,.search select{
       	width: 40%;
       	height: 45px;
       	border-radius: 5px;
       	padding-left: 10px;
       }
       .search select option:hover{
         background-color: #b34700 ;
       }
    </style>
    <script type="text/javascript">
         function rechercher(){
          var input = document.getElementById("rechercher").value ;
          window.location="menu.php?search="+input;
         }

         function trierPar()
         {
         	var input = document.getElementById("tri").value  ;
         	//alert(input) ;
         	switch(input)
         	{
         		case 0 :
         		    window.location="menu.php" ;
         		    break ;
         		case 'prix_up' :
         		  window.location="menu.php?tri="+input;
         		  break ;
         		case 'prix_down' :
         		  window.location="menu.php?tri="+input;
         		  break ;
         		case 'name_up' :
         		  window.location="menu.php?tri="+input;
         		  break ;
         		case 'name_down' :
         		  window.location="menu.php?tri="+input;
         		  break ;

         	}

         }
      </script>

</head>

<body>
	<!-- Start header -->
	<?php
	include "header.php" ;
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
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<?php 
              include "../core/produitC.php";
		          $cat = new ProduitC() ;
		          $listCat = $cat->afficherCategorie() ;
   		     ?>

			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active"   href="menu.php" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
                        <?php 
			               if(!empty($listCat))
			               {
			                foreach ($listCat as $value) {?>
			                    <a class="nav-link"   href="menu.php?cat=<?PHP echo $value['nom']; ?>" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php echo $value['nom'] ;?></a>
			               <?php
			                }
			               }
			           
			            ?>
			            <a class="nav-link"   href="menu.php?promo=1" role="tab" aria-controls="v-pills-profile" aria-selected="false">Promotions</a>						
					</div>
				</div>
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="search">
									<input type="search" name="rechercher" id="rechercher" placeholder="rechercher ..." style="margin-right: 30px;" onsearch="rechercher() ;">
									<select id="tri" onchange="trierPar();"> 
										<option value="0">-- filtrer par --</option>
										<option value="prix_up">Prix Croissant</option>
										<option value="prix_down">Prix Decroissant</option>
										<option value="name_up">Nom A .. Z</option>
										<option value="name_down">Nom Z .. A</option>
									</select>
							</div>
							<div class="row">
								<?php 
              
					               $prodC = new ProduitC() ;
					               $mylist=$prodC->afficherProduit() ; 
					               if(isset($_GET['search']))
						             {
						              $mylist = $prodC->rechercherProduit($_GET['search']) ;
						             }
					               $finalprice ;
					                 if(isset($_GET['cat']))
					                 {
					                    $mylist=$prodC->recupererProduitParCategorie($_GET['cat']);

					                 }
					                 else if(isset($_GET['promo'])){
					                 	$mylist=$prodC->recupererProduitEnPromo() ;

					                 }

					                 if(isset($_GET['tri']))
					                 {
					                 	if($_GET['tri'] == "prix_up")
					                 	{
					                 		$mylist= $prodC->TrierProduit('prix','asc') ;
					                 	}
					                 	else if($_GET['tri'] == "prix_down")
					                 	{
					                 		$mylist= $prodC->TrierProduit('prix','desc') ;
					                 	}
					                 	else if($_GET['tri'] == "name_up")
					                 	{
					                 		$mylist= $prodC->TrierProduit('nom','asc') ;
					                 	}
					                 	else if($_GET['tri'] == "name_down")
					                 	{
					                 		$mylist= $prodC->TrierProduit('nom','desc') ;
					                 	}
					                 	
					                 }



					                if (!empty($mylist)) { 
					                 foreach ($mylist as $row) {
					                   ?> 
											<div class="col-lg-4 col-md-6 special-grid drinks" >
												<div class="gallery-single fix" >
													<img src="img/<?php echo $row['image'] ?>" class="img-fluid" alt="Image" style="height: 275px;width: 275px;">
													<div class="why-text" style="border-bottom: 25px;">
														<form method="POST" action="panier.php?action=add&id=<?php echo $row['id']; ?>">	
														<h4><?php echo $row['nom'] ?><a href="productView.php?id=<?PHP echo $row['id']; ?>" style="margin-left: 80px;font-size: 24px;"><i class="fa fa-eye"></i></a></h4>
														<p><?php echo $row['description'] ?></p>														
														<?php 
														 if(!$row['etatPromo'])
														 { 
														  $finalprice = $row['prix'] ;
														 	?>
														  <h5><?php echo $row['prix'] ?> DNT  </h5>														  
														 <?php
														}else{ 	
														    $promo = new ProduitC()	;
														    $listPromo = $promo->getProductsFromPromo($row['id']) ;
														    if(!empty($listPromo))
														    {
														    	foreach ($listPromo as $p) {?>	
														    		<h5><?php echo $p['remise'] ?>% off</h5>
															  <h5><span style="font-size: 10px;"><i><s><?php echo $row['prix'] ?> DNT </s></i></span>
															   <?php echo ($row['prix']-(($row['prix']*$p['remise'])/100)) ?> DNT</h5>
															<?php
															  $finalprice = ($row['prix']-(($row['prix']*$p['remise'])/100)) ;
														    }
														   }
													     }
                                                        ?>
                                                            <input type="number" name="quantity" value="1" style="width: 40px;"> : quantite <br>    
                                                            <br><input type="hidden" name="idd" value="<?php echo $row['id'] ; ?>">
						                                    <input type="hidden" name="hidden_price" value="<?php echo $finalprice ; ?>">
						                                    <input type="hidden" name="hidden_name" value="<?php echo $row['nom'] ; ?>">											
															<input style="margin-bottom: 20px;" type="submit" name="add_to_cart" value="ajouter au panier">														
														</form>
													</div>

												</div>
											</div>	
				                        <?php
				                      }
				                    }				              

				                 ?>           																				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
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