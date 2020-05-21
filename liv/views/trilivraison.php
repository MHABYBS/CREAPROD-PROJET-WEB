<?PHP
include "../core/livraisonc.php";
$livraisonc=new livraisonc();
if (isset($_POST["id"])){
	$livraisonc->trilivraison($_POST["id"]);
	header('Location: afficherlivraison.php');
}

?>