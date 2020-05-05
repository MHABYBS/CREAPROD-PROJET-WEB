<?PHP
include "../entities/reclam.php";
include "../core/reclamationS.php";

if (isset($_POST['id']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mail']) and isset($_POST['raison']) and isset($_POST['msg']) and isset($_POST['date'])){
$reclam1=new reclam($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['raison'],$_POST['msg'],$_POST['date']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$reclamation1S=new reclamationS();
$reclamation1S->ajouterreclam($reclam1);
?>
 <script type="text/javascript">
 	alert("message envoyé avec success") ;
 </script>
<?php

header('Location: index.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>
