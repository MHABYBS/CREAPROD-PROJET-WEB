<?PHP
include "../core/produitC.php";
$prodC=new ProduitC();
if (isset($_GET["id"])){
	$prodC->supprimerProduit($_GET["id"]);
	header('Location: listeProd.php');
}

?>