<?PHP
include "../core/commc.php";
$cmd=new commc();
if (isset($_GET["id"])){
	$cmd->supprimercomm($_GET["id"]);
	header('Location: listeComm.php');
}

?>