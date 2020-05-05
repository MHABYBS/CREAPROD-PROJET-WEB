<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Login Carbone Restaurant</title>  
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
						<h2>Login</h2>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p id="Error" style="text-align: center;color: darkred">*</p>
					<form id="loginFom" method="POST" action="">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Your Email"  data-error="svp entrer votre email" style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group" style="">
									<input type="password" placeholder="Your Password" id="password" class="form-control" name="password"  data-error="svp entrer votre mot de passe" style="width: 60%;margin: auto;">
									<div class="help-block with-errors" style="width: 60%;margin: auto;"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="submit-button text-center">
									<input type="button" name="login" value="Connecter" onclick="loginValidation();">
								</div>
							</div>
						</div>            
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Vous n'avez pas de Compte ?</h2>
						<p><a href="account.php" style="color: darkred">CREEZ-EN UN</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	       <?php
          include '../core/clientC.php';
            if(isset($_POST['email']) && isset($_POST['password']))
            {
              if(!empty($_POST['email']) && !empty($_POST['password']))
              {
                 $userC = new ClientC() ;
                 $mail=$_POST['email'] ;
                 $pwd=$_POST['password'] ;
                 $client=$userC->login("client",$mail,$pwd);
                 $admin=$userC->login("admin",$mail,$pwd); 
                 $row1 = $userC->loginRow("admin",$email,$pwd);
                $row2 = $userC->loginRow("client",$email,$pwd) ;             

                 if(!empty($admin)){
                   foreach ($admin as $value) {
                    if($mail == $value['email'] && $pwd==$value['password'])
                    { 

                      //session_start();
                      $_SESSION['AD_ID'] = $value['id'] ;
                      $_SESSION['AD_nom'] = $value['nom'] ;
                      $_SESSION['AD_prenom'] = $value['prenom'];
                      $_SESSION['AD_login']=$mail;
                      $_SESSION['AD_password']=$pwd;
                      $_SESSION['AD_role']="admin";

                      ?>
                       <script type="text/javascript">
                         window.location = "dashboard.php" ;
                       </script>
              
                   <?php }
                  } 
                }
              if(!empty($client))
                {
                  foreach ($client as  $row) {
                    if($mail == $row['email'] && $pwd==$row['password'])
                    { 
                        //session_start();
                        $_SESSION['ID'] = $row['id'] ;
                        $_SESSION['nom'] = $row['nom'] ;
                        $_SESSION['prenom'] = $row['prenom'];
                        $_SESSION['login']=$mail;
                        $_SESSION['password']=$pwd;
                        $_SESSION['role']="client";

                      ?>
                       <script type="text/javascript">
                         window.location="index.php" ; // replace location by the target page
                       </script>
              
                   <?php }
                    } 
                  }
                 if(!$row1 && !$row2){?>
                <script type="text/javascript">
                   var error=document.getElementById("Error") ;
                   error.innerHTML="email ou mot de passe incorrect *" ;
                </script>

               <?php
                }

                }                                        
              }
         ?>  

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