<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Profil Carbonne Restaurant</title>  
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
    <script type="text/javascript" src="script/EditUser.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	input[type='button'],input[type='submit']{
    		border-radius: 10px ;
    		color: white ;
    		background-color: #b34700 ;
    		width: 40% ;
    		height: 50px;
    	}

    	input[type='button']:hover,input[type='submit']:hover{;
    		color: white ;
    		background-color: #262626 ;
    		cursor: pointer;
    	}

    	/* The Modal (background) */
		.modal {
			margin: auto;
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  padding-top: 10px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 40%; /* Full width */
		  height: 40%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  /*background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  background-color: #fefefe;
		  margin: auto;
		  padding: 10px;
		  border: 1px solid #888;
		  width: 99%;
		}

		/* The Close Button */
		.close {
		  color: #aaaaaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #000;
		  text-decoration: none;
		  cursor: pointer;
		}

		.formDelete{
			text-align: center;
		}
		.formDelete input{
			margin-left: 10px;
		}
    </style>

</head>

<body>
	<!-- Start header -->
	<?php
	include "header.php" ;
	include "../core/ClientC.php" ;
	?>

	<!-- End header -->
	<?php 
           if (isset($_SESSION["ID"])){
               $Cl = new ClientC() ;
                $result=$Cl->recupererClient($_SESSION["ID"]);
              foreach($result as $row){
                $id=$row['id'];
                $nom=$row['nom'];
                $prenom=$row['prenom'];
                $password=$row['password'];
                $email=$row['email'];
                $phone=$row['phone'] ;
                $address = $row['address'] ;

      }
     }

  ?>
	
	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Profil </h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->


	
<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">				
				<div class="col-lg-12">
					<img src="avatar.png" style="width: 100px ; height: 100px;margin-left: 65px;"><br>
					<p style="margin-left: 60px;"><?php echo $prenom .' '.$nom ?></p>
				</div>
			</div>
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active"   href="profile.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Profil</a>
						<a class="nav-link " id="myBtn" role="tab" aria-controls="v-pills-home" aria-selected="true">Supprimer</a>
						<a class="nav-link "   href="profile.php?cmd" role="tab" aria-controls="v-pills-home" aria-selected="true">Mes Commandes</a>			
					</div>
				</div>
				<!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
			    <span class="close">&times;</span>
			     <h1 style="text-align: center;">Voulez-vouz vraiment supprimer votre compte ?</h1>
			        <p style="text-align: center;">En supprimant le compte vous risquez de perdre </p>
			     	<p style="text-align: center;">toutes vos données tel que vos commandes</p>
			     	<form id="formDelete" method="POST" action="deleteAccount.php">
			     		<input type="hidden" name="idd" value="<?php echo $id ?>">
			     		<input style="margin-left: 25px;background-color: #262626;" type="button" name="non" id="non" value="Non">
			     		<input style="margin-left: 55px;background-color: #b34700;" type="submit" name="delete" id="delete" value="Oui">
			     	</form>
			  </div>

			</div>

			<script>
				// Get the modal
				var modal = document.getElementById("myModal");

				// Get the button that opens the modal
				var btn = document.getElementById("myBtn");

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				var non = document.getElementById("non");

				// When the user clicks the button, open the modal 
				btn.onclick = function() {
				  modal.style.display = "block";
				}

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				  modal.style.display = "none";
				}

				non.onclick = function() {
				  modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal) {
				    modal.style.display = "none";
				  }
				}
		</script>
				
				<div class="col-9" sty>
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="">
								<form style="margin-left: 75px;" id="information" method="POST" action="userEdit.php">
									<span id="Error" style="text-align: center;color: darkred">*</span>
									<div class="col-md-12">
										<div class="form-group">
											NOM :<input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom ?>" style="width: 100%;margin: auto;">
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											Prenom :<input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom ?>" style="width: 100%;margin: auto;">											
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											Email :<input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"   style="width: 100%;margin: auto;">											
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											Mot de passe :<input type="text" class="form-control" id="pwd" name="pwd" value="<?php echo $password ?>"   style="width: 100%;margin: auto;">											
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											Telephone :<input type="number" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>"   style="width: 100%;margin: auto;">											
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											Adresse :<input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>"   style="width: 100%;margin: auto;">											
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="submit-button text-center">
											<input type="hidden" name="idd" value="<?php echo $id ?>">
											<input type="button" name="enregistrer" value="Enregistrer" onclick="modifierUser();">
										</div>
									</div>
								</form>	

								<?php
								     if(isset($_GET['cmd']))
								     { ?>
								     	<script type="text/javascript">
                                            document.getElementById("information").style.display= "none";  ;
                                           // alert("cmd") ;								     		
								       	</script>
								       	<?php 
								       	  $client = new ClientC() ;
								       	  $liste = $client->afficherlivraisonsClient($_SESSION['ID']) ;
								       	  if (!empty($liste)) {
								       	?>
								       	<table class="table" style="margin: auto;width: 95%;text-align: center;" >
								       	<thead>
								       		<th>article</th>
								       		<th>nom</th>
								       		<th>prenom</th>
								       		<th>nom prod</th>
								       		<th>date livraison</th>
								       		<th>qte</th>
								       		<th>montant total</th>
								       		<th>status</th>
								       	</thead> 			
							             <tbody>
							              <?php
							                  foreach ($liste as $value) {
							              ?>
							              <tr style="text-align: center;">
							                <td><img  width="50" height="50" src="img/<?php echo $value['image'] ?>" class="rounded-circle m-r-5" alt=""></td>
							                  <td><?php echo $value['nom'] ?></td>
							                  <td><?php echo $value['prenom'] ?></td>
							                  <td><?php echo $value['nomprod'] ?></td>
							                  <td><?php echo $value['date_liv'] ?> </td>
							                  <td><?php echo $value['qt'] ?></td>
							                  <td><?php echo $value['prix_total'] ?> DNT</td>
							                  <?php
							                    if($value['etat'] == 0) {
							                    ?>
							                    <td style="color: darkred">non livrée</td> 
							                    <?php
							                      }
							                    else {?>
							                   <td style="color: darkgreen">livrée</td> <?php } 
							                    ?> 
							              </tr>	
							              <?php } ?>						    
							        </tbody>
							      </table>

							   <?php
							     } else echo "<p>vous n'avez pas encore commandé</p>";
							   }

							   ?>				           
																													
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	
	
	<!-- Start Footer -->
	   <?php 
	   include "footer.html";
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