<?PHP
include "../core/clientC.php";
$clt=new ClientC();
if (isset($_GET["id"])){
	$clt->supprimerClient($_GET["id"]);
	header('Location: listeClient.php');
}

?>