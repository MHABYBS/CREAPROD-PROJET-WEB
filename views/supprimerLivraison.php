<?PHP
include "../core/livraisonC.php";
$livC=new livraisonc();
if (isset($_GET["id"])){
	$livC->supprimerlivraison($_GET["id"]);
	header('Location: listeLivraison.php');
}

?>