<?PHP
include "../core/livraisonc.php";
$livraisonc=new livraisonc();
if (isset($_POST["id"])){
	$livraisonc->supprimerlivraison($_POST["id"]);
	header('Location: afficherlivraison.php');
}

?>