<?PHP
include "../core/promotionC.php";
$promoC=new PromotionC();
if (isset($_GET["idpromo"]) && isset($_GET["idprod"]))
{
	$state = 0 ;
	$id_prod = $_GET["idprod"] ;
	$promoC->supprimerPromo($_GET["idpromo"]);
	$promoC->setEtatPromo($state,$id_prod) ;
	header('Location: listePromo.php');
}

?>