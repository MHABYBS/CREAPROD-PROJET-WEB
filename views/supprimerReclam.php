<?PHP
include "../core/reclamationS.php";
$reclamationS=new reclamationS();
if (isset($_GET["id"])){
	$reclamationS->supprimerreclam($_GET["id"]);
	header('Location: listeReclam.php');
}

?>