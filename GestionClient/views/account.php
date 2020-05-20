<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Registration Carbone Restaurant</title>  
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
    <script type="text/javascript" src="script/login.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style type="text/css">
    	input[type='button']{
    		border-radius: 10px ;
    		color: white ;
    		background-color: #b34700 ;
    		width: 250px;
    	}

    	input[type='button']:hover{
    		color: white ;
    		background-color: #262626 ;
    		cursor: pointer;
    	}
    </style>

</head>

<body>
	<!-- Start header -->
      <?php
      include "header.php" ; 
      ?>
	<!-- End header -->
	
	<!-- Start Contact -->
	<div class="contact-box" >
		<div class="container" style="margin-top: 100px;">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Creer un Compte</h2>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p id="Error" style="text-align: center;color: darkred">*</p>
					<form id="registerForm" method="POST" action="register.php">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="nom" name="nom" placeholder="Votre Nom "  data-error="svp entrer votre nom " style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre Prenom"  data-error="svp entrer votre prenom " style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Votre Email"  data-error="svp enter votre email" style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group" style="">
									<input type="password" placeholder= "Mot de passe" id="pwd" class="form-control" name="password"  data-error="svp entrer un mot de passe" style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group" style="">
									<input type="password" placeholder="Confirmer Votre Mot de passe" id="password1" class="form-control" name="password1"  data-error="svp  confirmer votre mot de passe" style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="address" name="address" placeholder="Votre Addresse"  data-error="svp entrer votre Addresse " style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="number" class="form-control" id="phone" name="phone" placeholder="Votre Telephone"  data-error="svp entrer votre numero " style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="submit-button text-center">
									<input type="button" name="login" value="Enregistrer" onclick="registerValidation();">
								</div>
							</div>
						</div>            
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Vous avez dejà un Compte ?</h2>
						<p><a href="login.php" style="color: darkred">Se Connecter</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->
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
	<script src="js/jquery.mapify.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
	<script>
		$('.map-full').mapify({
			points: [
				{
					lat: 40.7143528,
					lng: -74.0059731,
					marker: true,
					title: 'Marker title',
					infoWindow: 'Live Dinner Restaurant'
				}
			]
		});	
	</script>
</body>
</html>