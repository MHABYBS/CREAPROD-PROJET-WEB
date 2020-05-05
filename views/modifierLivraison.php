<?php
include "../core/livraisonC.php";

  if(isset($_POST['state']) && isset($_POST['id']))
  {
  	//echo $_POST['state'] ;
  	$liv = new livraisonc() ;
  	$liv->setEtatLivraison($_POST['state'],$_POST['id']) ;
  	//header('Location : listeLivraison.php') ;?>
  	<script type="text/javascript">
  		window.location = "listeLivraison.php" ;
  	</script>

  	<?php

  }

?>