<?PHP

include "../entities/livraison.php";
include "../core/livraisonC.php";

if (isset($_POST['id']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['numero']) and isset($_POST['adresse'])){
$livraison=new livraison($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['numero'],$_POST['adresse']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$livraison1C=new livraisonC();
$livraison1C->sendSms();
$livraison1C->ajouterlivraison($livraison);
header('Location: afficherlivraison.php');
	
}else{

	echo "vérifier les champs";
}
?>
