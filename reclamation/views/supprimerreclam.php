<?PHP
include "../core/reclamationS.php";
$reclamationS=new reclamationS();
if (isset($_POST["id"])){
	$employeC->supprimerreclam($_POST["id"]);
	header('Location: afficherreclam.php');
}

?>