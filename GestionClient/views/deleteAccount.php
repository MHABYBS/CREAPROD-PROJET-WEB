<?PHP
session_start() ;
include "../core/clientC.php";
$clt=new ClientC();
if (isset($_SESSION["ID"])){
	$clt->supprimerClient($_SESSION["ID"]);
	// On dÃ©truit les variables de notre session
	session_unset ();

	// On dÃ©truit notre session
	session_destroy ();
	header('Location: index.php');
}

?>